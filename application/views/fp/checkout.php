<style type="text/css">
        .scroll{
        width: 100%;
        padding: 10px;
        overflow: scroll;
        height: 300px;
        </style>
        <style type="text/css">
        #small{
            position:fixed;
            top:0;
            left:0;
            z-index:9999;
            text-align:center;
            width:100%;
            height:100%;
            padding-top:300px;
            font:bold 20px Calibri,Arial,Sans-Serif;
            color:#000;
            display:none;
        }
        ::selection{ background-color: rgb(300, 300, 300); }
        ::moz-selection{ background-color: rgb(300, 300, 300); }
        ::webkit-selection{ background-color: rgb(300, 300, 300); }
        </style>
<!--================Checkout Area =================-->
<section class="checkout_area padding_top">
    <div class="container">
      <div class="billing_details">
      <form class="row contact_form" action="<?php echo base_url()?>Home/AddOrder" method="post">
        <div class="row">
          <div class="col-lg-8">
            <h3>Recipient Details</h3>
              <?php if(count($address)>0){?>
                <input type="hidden" name="id_address" id="id_address" value="<?php echo $address['id_address']?>" required class="form-control">
                <blockquote class="generic-blockquote" <?php if ($address['is_default'] == "1"){ echo "style='border: 2px solid #ff3368;'"; } ?> >
                    <p>
                        <?php echo $address['tag_address']?>
                        <br>
                        <?php echo $address['fullname']?>
                        <br>
                        <?php echo $address['phone']?>
                        <br>
                        <?php echo $address['address']?>
                    </p>
                </blockquote>
              <?php } else{?>
                <blockquote class="generic-blockquote">
                    Upss... Alamat Utama tidak ditemukan
                </blockquote>
              <?php } ?>
              <input type="hidden" name="ongkir_value" id="ongkir_value" required class="form-control">
              <input type="hidden" name="service_value" id="service_value" required class="form-control">
              <input type="hidden" name="total_all" id="total_all" required class="form-control">
              <div class="col-md-12 form-group">
                  <label>Bank Name</label>
                  <input type="text" name="bank_name" id="bank_name" placeholder="Bank Name" required class="form-control">
              </div>
              <div class="col-md-12 form-group">
                  <label>Bank Account Name</label>
                  <input type="text" name="bank_acc_name" id="bank_acc_name" placeholder="Bank Account Name" required class="form-control">
              </div>
              <div class="col-md-12 form-group">
                  <label>Bank Account Number</label>
                  <input type="text" name="bank_acc_number" id="bank_acc_number" placeholder="Bank Account Number" required class="form-control">
              </div>
              <div class="col-md-12 form-group">
                <select class="form-control" id="courier" name="courier" required="required" onchange="cekongkir()">
                    <option value="">--Choose Delivery Courier--</option>
                    <option value="jne">JNE</option>
                    <option value="pos">POS</option>
                    <option value="tiki">TIKI</option>
                </select>
              </div>
              <div class="col-md-12" style="background-color:#ffe5dd99;" id="listfasilitaskurir">
                <blockquote class="generic-blockquote" style="margin-top: 1rem !important;background:#eaeaff !important" >
                    <p id="ongkirp">
                        
                    </p>
                </blockquote>
              </div>
          </div>
          <div class="col-lg-4">
            <div class="order_box">
              <h2>Your Order</h2>
              <ul class="list">
                <li>
                  <a href="#">Product
                    <span>Total</span>
                  </a>
                </li>
                <?php $total_all = 0;$totalqty = 0; foreach($cart as $item){?>
                    <li>
                        <a href="#"><?php echo $item['product_name']?>
                            <span class="middle">x <?php echo $item['qty']?></span>
                            <span class="last"><?php $total_all += (int)$item['total_price_real'];$totalqty += (int)$item['qty']; echo $item['total_price']?></span>
                        </a>
                    </li>
                <?php } ?>
              </ul>
              <input type="hidden" class="form-control" id="jumqty" name="jumqty" value="<?php echo $totalqty;?>" />
              <ul class="list list_2">
                <li>
                  <a href="#">Subtotal
                    <span>
                        <?php
                            $total_alls = "Rp " . number_format($total_all,2,',','.');
                            echo $total_alls;
                        ?>
                    </span>
                  </a>
                </li>
                <li style="display:none;" id="ongkir">
                  <a href="#">Shipping
                    <span id="hargaongkir"></span>
                  </a>
                </li>
                <li>
                  <a href="#">Total
                    <span id="totalall">
                        <?php
                            $total_alls = "Rp " . number_format($total_all,2,',','.');
                            echo $total_alls;
                        ?>
                    </span>
                  </a>
                </li>
              </ul>
              
              <!-- <div class="creat_account">
                <input type="checkbox" id="f-option4" name="selector" />
                <label for="f-option4">I’ve read and accept the </label>
                <a href="#">terms & conditions*</a>
              </div> -->
              <button type="submit" class="btn_3">Checkout</button>
              <!-- <a  class="btn_3" href="#">Proceed to Paypal</a> -->
            </div>
          </div>
        </div>
        </form>
      </div>
    </div>
  </section>
  <div class="modal fade bs-modal-sm" id="small" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div>
                <img src="<?php echo base_url(); ?>assetfp/img/loading.gif"/>
                <p id="" style="color: white;"> Please Wait...</p>
            </div>
        </div>
    </div>
  <!--================End Checkout Area =================-->
  
  <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
  <script>
      $( document ).ready(function() {
        $('#listfasilitaskurir').fadeOut("fast");        
      });
      function cekongkir(){
        $('#listfasilitaskurir').fadeOut("slow");
        $('#small').modal({backdrop: 'static'});
        var id_city = <?php echo $address['id_city']?>;
        var courier = document.getElementById('courier').value;
        var jumqty = document.getElementById('jumqty').value;
        $.ajax({ 
            type: 'POST', 
            url: '<?php echo base_url()?>Home/cekongkir', 
            data: { id_to: id_city,courier:courier,qty:jumqty }, 
            dataType: 'json',
            success: function (data) { 
                $('#ongkirp').html('');
                console.log(data.rajaongkir.results[0].costs);
                var dt = data.rajaongkir.results[0].costs;
                
                // showhide('listfasilitaskurir');
                setTimeout(function(){$('#small').modal('hide')},1000);
                $('#listfasilitaskurir').fadeIn("slow");
                // var dt = data.rajaongkir.results
                var html = '';
                var no = 0;
                var hari = 'hari';
                if(courier == 'pos')
                {
                    hari = '';
                }                
                $.each(dt, function(index, element) {
                    var harga = element.cost[0].value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                    html += '<div class="switch-wrap d-flex">'+
							'<p><b style="font-weight:bold;color:black">'+element.service+'</b></p>&nbsp;&nbsp;&nbsp;&nbsp;'+
                            '<p>Rp.'+harga+'</p>&nbsp;&nbsp;&nbsp;&nbsp;'+
							'<div class="primary-radio" style="margin-top: 6px;">'+
								'<input type="radio" id="default-radio'+no+'" onchange="tambahongkir(this.value,\''+element.service+'\')" name="jeniskirim" value="'+element.cost[0].value+'">'+
								'<label for="default-radio'+no+'"></label>'+
							'</div>'+
                            
						'</div>'+
                        'Estimasi tiba '+element.cost[0].etd+' '+ hari
                        '<br>';
                        no++;
                });
                $('#ongkirp').append(html);
            }
        });
      }
      function tambahongkir(ongkir,service)
      {
          var strongkir = ongkir.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
          document.getElementById('hargaongkir').innerHTML = 'Rp.'+strongkir;
          document.getElementById('ongkir_value').value = ongkir;
          document.getElementById('service_value').value = service;
          var x = document.getElementById('ongkir');
          x.style.display = 'block';
          var totalall = <?php echo (int)$total_all; ?> + parseInt(ongkir);
          document.getElementById('total_all').value = totalall;
        //   console.log(totalall);
          document.getElementById('totalall').innerHTML ='Rp.' + totalall.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")+",00";
          


          //alert(ongkir);    
      }
  </script>
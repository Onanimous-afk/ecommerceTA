<!--================Cart Area =================-->
<section class="cart_area padding_top">
    <div class="container">
      <div class="cart_inner">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                <?php $total_all = 0;foreach($cart as $item){?>
                    <tr>
                        <td style="width: 50%;">
                        <div class="media">
                            <!-- <div class="d-flex"> -->
                                <img src="<?php echo base_url()?>gambar_produk/<?php echo $item['pictures']?>" style="width:20%;height:20%" alt="" />
                            <!-- </div> -->
                            <!-- <div class="media-body"> -->
                            <p><?php echo $item['product_name']?> size <?php echo $item['size']?> color <?php echo $item['color']?></p>
                            <!-- </div> -->
                        </div>
                        </td>
                        <td>
                        <h5><?php echo $item['total']?></h5>
                        </td>
                        <td>
                        <div class="product_count">
                            <!-- <span class="input-number-decrement"> <i class="ti-angle-down"></i></span> -->
                            <input class="input-number" onkeyup="updatehargadantotal('<?php echo $item['id_produk_detail']?>',this.value)" onmouseup="updatehargadantotal('<?php echo $item['id_produk_detail']?>',this.value)" type="number" value="<?php echo $item['qty']?>" min="1" max="<?php echo $item['qty_real']?>" id="jumorder" name="jumorder">
                            <!-- <span class="input-number-increment"> <i class="ti-angle-up"></i></span> -->
                        </div>
                        </td>
                        <td style="width: 20%;">
                            <h5 id="lbltotal<?php echo $item['id_produk_detail'];?>"><?php $total_all += (int)$item['total_price_real']; echo $item['total_price']; ?></h5>
                        </td>
                        <td>
                            <div class="icon" style="color:#ff3368">
                                <a href="javascript:deletecart('<?php echo $item['id_cart']?>');" style="color:#ff3368">
                                    <i aria-hidden="true" class="fa fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr> 
                <?php } ?>
                             
                <!-- <tr class="bottom_button">
                        <td>
                        <a class="btn_1" href="#">Update Cart</a>
                        </td>
                        <td></td>
                        <td></td>
                        <td>
                        <!-<div class="cupon_text float-right">
                            <a class="btn_1" href="#">Close Coupon</a>
                        </div> --
                        </td>
                    </tr> -->
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                        <h5>Subtotal</h5>
                        </td>
                        <td>
                        <h5 id="lbltotalall">
                            <?php
                                $total_alls = "Rp " . number_format($total_all,2,',','.');
                                echo $total_alls;
                            ?>
                        </h5>
                        </td>
                    </tr>
            </tbody>
          </table>
          <div class="checkout_btn_inner float-right">
            <a class="btn_1" href="<?php echo base_url()?>">Continue Shopping</a>
            <a class="btn_1 checkout_btn_1" href="<?php echo base_url()?>Home/checkout">Proceed to checkout</a>
          </div>
        </div>
      </div>
  </section>
  <!--================End Cart Area =================-->
  <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script>
    function updatehargadantotal(id_detail,qty){
        // console.log(qty);
        var cartjson = <?php echo $cartjson?>;
        var data = cartjson.find(dt => dt.id_produk_detail == id_detail);
        console.log(data);
        var totalnow = <?php echo $total_all;?>;
        var productpricetotal = qty * data.price_real;
        var totalnew = (totalnow - data.total_price_real) + productpricetotal;        
        $.ajax({
            type  : 'POST',
            url   : '<?php echo base_url()?>Home/updatecart',
            data : {id_cart:data.id_cart,qty:qty,total:productpricetotal},
            success : function(response){
                // console.log(response);
                var res = response;
                if(res.includes('success'))
                {
                    // window.location.reload();
                    document.getElementById('lbltotalall').innerHTML ='Rp.' + totalnew.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")+",00";
                    document.getElementById('lbltotal'+id_detail).innerHTML ='Rp.' + productpricetotal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")+",00";
                }else{
                    alert("Upss... Sedang ada maintenance silahkan hubungi store via WA yang tertera pada contact");
                }
                
            }

        });
    }
    function deletecart(id_cart){  
        var result = confirm("Are you sure want to delete this product?");  
        if(result){
            $.ajax({
                type  : 'POST',
                url   : '<?php echo base_url()?>Home/deletecart',
                data : {id_cart:id_cart},
                success : function(response){
                    // console.log(response);
                    var res = response;
                    if(res.includes('success'))
                    {
                        alert('successfully deleted cart');
                        window.location.reload();
                    }else{
                        alert("Upss... Sedang ada maintenance silahkan hubungi store via WA yang tertera pada contact");
                    }
                    
                }

            });
        }
    }
</script>
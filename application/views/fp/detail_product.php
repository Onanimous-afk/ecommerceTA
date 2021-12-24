<!--================Single Product Area =================-->
<div class="product_image_area section_padding">
    <div class="container">
      <div class="row s_product_inner justify-content-between">
        <div class="col-lg-7 col-xl-7">
          <div class="product_slider_img">
            <div id="vertical">
                <?php foreach($images as $item){?>
                    <div data-thumb="<?php echo base_url();?>gambar_produk/<?php echo $item['pictures']?>">
                        <img src="<?php echo base_url();?>gambar_produk/<?php echo $item['pictures']?>" />
                    </div>
                <?php } ?>
            </div>
          </div>
        </div>
        <div class="col-lg-5 col-xl-4">
          <div class="s_product_text">
            <!-- <h5>previous <span>|</span> next</h5> -->
            <h3><?php echo $detail['product_name']?></h3>
            <ul class="list">
              <li>
                <!-- <a class="active" href="#"> -->
                   <input type="hidden" id="id_detail_produk" name="id_detail_produk">
                  <div class="single-element-widget mt-30">
                        <span>Category</span> :
						<!-- <div class="default-select" id="default-select_2"> -->
							<select id="kategori" class="form-control col-md-6" onchange="changedropdowns('kategori')">
								
							</select>
						<!-- </div> -->
					</div>
                    <div class="single-element-widget mt-30">
                        <span>Size</span> :
						<!-- <div class="default-select" id="default-select_2"> -->
							<select id="size" class="form-control col-md-6" onchange="changedropdowns('size')">
								
							</select>
						<!-- </div> -->
					</div>
                    <div class="single-element-widget mt-30">
                        <span>Color</span> :
						<!-- <div class="default-select" id="default-select_2"> -->
							<select id="color" class="form-control col-md-6" onchange="changedropdowns('color')">
								
							</select>
						<!-- </div> -->
					</div>
                <!-- </a> -->
              </li>
              <li>
                <span>Stock</span> : <label id="qty"></label>
              </li>
            </ul>
            <h2 id="price"></h2>
            <input type="hidden" value="1" min="1" id="pricereal" name="pricereal">
            <p>
              <?php echo $detail['short_description']?>
            </p>
            <div id="divmaksqty" style="display:none;">
                <label style="color:red;font-size:8pt;" id="maksqty1">Maks.pembelian barang ini <label style="color:red;font-size:8pt;" id="maksqty"></label> item kurangi pembelianmu, ya!</label>
            </div>
            
            <div class="card_area d-flex justify-content-between align-items-center">
              <div class="product_count">
                <!-- <span class="inumber-decrement"> <i class="ti-minus"></i></span> -->
                <input class="input-number" onkeyup="getqtyhargajumorder()" type="number" value="1" min="1" max="0" id="jumorder" name="jumorder">
                <!-- <span class="number-increment"> <i class="ti-plus"></i></span> -->
              </div>
              
              <button class="btn_3" onclick="addtocart()">add to cart</button>
              <!-- <a href="#" class="btn_3">add to cart</a> -->
              <!-- <a href="#" class="like_us"> <i class="ti-heart"></i> </a> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--================End Single Product Area =================-->
   <!--================Product Description Area =================-->
   <section class="product_description_area">
    <div class="container">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
            aria-selected="true">Description</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
            aria-selected="false">Specification</a>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
          <p>
          <?php echo $detail['description']?>
          </p>
          <p>
            It is often frustrating to attempt to plan meals that are designed
            for one. Despite this fact, we are seeing more and more recipe
            books and Internet websites that are dedicated to the act of
            cooking for one. Divorce and the death of spouses or grown
            children leaving for college are all reasons that someone
            accustomed to cooking for more than one would suddenly need to
            learn how to adjust all the cooking practices utilized before into
            a streamlined plan of cooking that is more efficient for one
            person creating less
          </p>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
          <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr>
                  <td>
                    <h5>Width</h5>
                  </td>
                  <td>
                    <h5>128mm</h5>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h5>Height</h5>
                  </td>
                  <td>
                    <h5>508mm</h5>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h5>Depth</h5>
                  </td>
                  <td>
                    <h5>85mm</h5>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h5>Weight</h5>
                  </td>
                  <td>
                    <h5>52gm</h5>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h5>Quality checking</h5>
                  </td>
                  <td>
                    <h5>yes</h5>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h5>Freshness Duration</h5>
                  </td>
                  <td>
                    <h5>03days</h5>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h5>When packeting</h5>
                  </td>
                  <td>
                    <h5>Without touch of hand</h5>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h5>Each Box contains</h5>
                  </td>
                  <td>
                    <h5>60pcs</h5>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        
        
      </div>
    </div>
  </section>
  <!--================End Product Description Area =================-->
  <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script>
    $( document ).ready(function() {
        // console.log( "ready!" );
        var detailproduct = <?php echo $detailproductjson?>;
        // detailproduct = JSON.parse(detailproduct);
        var kategoritext = '';
        var sizetext = '';
        var colortext = '';        
        // var htmlkategori = '';
        // var htmlsize = '';
        // var htmlcolor = '';
        //categori
        for(var k = 0;k < detailproduct.length;k++)
        {
            var id = detailproduct[k].id_category;
            var name = detailproduct[k].category_name;
            var kategoriarr = kategoritext.split(' ');
            kategoriarr = kategoriarr.filter(el => el == name);
            // console.log(kategoriarr);
            if(kategoriarr.length == 0)
            {
                $("#kategori").append("<option value='"+id+"'>"+name+"</option>");
                kategoritext += ' '+ name;
            }
        }
        //size
        for(var k = 0;k < detailproduct.length;k++)
        {
            var id = detailproduct[k].id_size;
            var name = detailproduct[k].size_name;
            var sizearr = sizetext.split(' ');
            sizearr = sizearr.filter(el => el == name);
            if(sizearr.length == 0)
            {
                $("#size").append("<option value='"+id+"'>"+name+"</option>");
                sizetext += ' '+ name;
            }
        }
        //color
        for(var l = 0;l < detailproduct.length;l++)
        {
            var id = detailproduct[l].id_color;
            var name = detailproduct[l].color_name;
            var colorarr = colortext.split(' ');
            colorarr = colorarr.filter(el => el == name);
            if(colorarr.length == 0)
            {
                $("#color").append("<option value='"+id+"'>"+name+"</option>");
                colortext += ' '+ name;
            }
        }
        getqtyhargajumorder();

    });
    function getqtyhargajumorder(){
        // setInterval(function() { ObserveInputValue($('#jumorder').val()); }, 100);
        var detailproduct = <?php echo $detailproductjson?>;
        var kategori = document.getElementById('kategori').value;
        var size = document.getElementById('size').value;
        var color = document.getElementById('color').value;
        var data = detailproduct.find(dt => dt.id_category == kategori && dt.id_size == size && dt.id_color == color);
        var jumorder = document.getElementById('jumorder').value;
        var x = document.getElementById("divmaksqty");
        if(parseInt(jumorder) > parseInt(data.qty))
        {
            jumorder = data.qty;
            x.style.display = "block";
            document.getElementById('maksqty').innerHTML = data.qty;
        }else{
            setTimeout(function() {
              x.style.display = "none";
            }, 4000);
            // x.style.display = "none";
        }
        if(jumorder == '' || parseInt(jumorder) == 0)
        {
            jumorder = 1;
        }
        document.getElementById('jumorder').value = jumorder;
        // console.log(jumorder);
        // console.log(data);id_detail_produk
        document.getElementById('id_detail_produk').value = data.id_produk_detail;
        var jumtotal = parseInt(jumorder) * parseInt(data.price);
        document.getElementById('price').innerHTML = 'Rp.' + jumtotal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        document.getElementById('pricereal').value = jumtotal;
        document.getElementById('qty').innerHTML = data.qty;
        $("#jumorder").attr({
            "max" : data.qty
        });
        

    }
    // $(".inumber-decrement").bind('mousedown', function () {
    //     getqtyhargajumorder();
    // });
    // $(".number-increment").bind('mousedown', function () {
    //     getqtyhargajumorder();
    // });
    $("#jumorder").bind('keyup mouseup', function () {
        getqtyhargajumorder();    
    });
    function changedropdowns(asal){
        var detailproduct = <?php echo $detailproductjson?>;
        var kategori = document.getElementById('kategori').value;
        var size = document.getElementById('size').value;
        var color = document.getElementById('color').value;
        var data = detailproduct.filter(dt => dt.id_category == kategori && dt.id_size == size && dt.id_color == color);
        if (asal == 'kategori'){
            data = detailproduct.filter(dt => dt.id_category == kategori);
        }else if(asal =='size')
        {
            data = detailproduct.filter(dt => dt.id_size == size);
        }else{
            data = detailproduct.filter(dt => dt.id_color == color);
        }
        console.log(data);
        // var detailproduct = data;
        
        // detailproduct = JSON.parse(detailproduct);
        var kategoritext = '';
        var sizetext = '';
        var colortext = '';
        $("#kategori").html('');
        $("#size").html('');
        $("#color").html('');
        //categori
        // var data1 = data.find(dt => dt.id_category == 15);
        // console.log(data1);
        for(var k = 0;k < detailproduct.length;k++)
        {
            var id = detailproduct[k].id_category;
            var name = detailproduct[k].category_name;
            var kategoriarr = kategoritext.split(' ');
            kategoriarr = kategoriarr.filter(el => el == name);
            // console.log(kategoriarr);
            if(kategoriarr.length == 0)
            {
                var data1 = data.find(dt => dt.id_category == id);
                // console.log(data1);
                if(typeof data1 !== 'undefined')
                {
                    $("#kategori").append("<option value='"+id+"' selected='selected'>"+name+"</option>");    
                }
                else{
                    $("#kategori").append("<option value='"+id+"'>"+name+"</option>");
                }
                kategoritext += ' '+ name;
            }
        }
        //size
        for(var k = 0;k < detailproduct.length;k++)
        {
            var id = detailproduct[k].id_size;
            var name = detailproduct[k].size_name;
            var sizearr = sizetext.split(' ');
            sizearr = sizearr.filter(el => el == name);
            if(sizearr.length == 0)
            {
                var data1 = data.find(dt => dt.id_size == id);
                if(typeof data1 !== 'undefined') 
                {                    
                    // console.log(id);
                    $("#size").append("<option value='"+id+"' selected='selected'>"+name+"</option>");
                }else{
                    $("#size").append("<option value='"+id+"'>"+name+"</option>");
                }
                
                sizetext += ' '+ name;
            }
        }
        //color
        for(var l = 0;l < detailproduct.length;l++)
        {
            var id = detailproduct[l].id_color;
            var name = detailproduct[l].color_name;
            var colorarr = colortext.split(' ');
            colorarr = colorarr.filter(el => el == name);
            if(colorarr.length == 0)
            {
                var data1 = data.find(dt => dt.id_color == id);
                if(typeof data1 !== 'undefined') 
                {
                    $("#color").append("<option value='"+id+"' selected='selected'>"+name+"</option>");    
                }else{
                    $("#color").append("<option value='"+id+"'>"+name+"</option>");
                }
                colortext += ' '+ name;
            }
        }
        getqtyhargajumorder();
    }
    function addtocart(){
        var sessionid = "<?php echo $this->session->userdata('id_user');?>";
        if(sessionid == "")
        {
            window.location.href = "<?php echo base_url()?>Account/Login";
        }else{
            var id_produk_detail = document.getElementById('id_detail_produk').value;
            var qty = parseInt(document.getElementById('qty').innerHTML);
            var pricereal = document.getElementById('pricereal').value;

            $.ajax({
                type  : 'POST',
                url   : '<?php echo base_url()?>WarnaAdmin/searchdatawarna',
                data : {begin:begin},
                success : function(data){
                    var dt = JSON.parse(data);
                    var html = '';
                    var j=0;
                    for(var i=0; i<dt.length; i++){
                        ++j;
                        html += '<tr>'+
                        '<td>'+j+'</td>'+
                        '<td>'+dt[i].color_name+'</td>'+
                        '<td><button type="button" class="btn btn-icon btn-info waves-effect waves-classic" onclick="redirectya('+dt[i].id_color+')" style="padding: 4%;"><i aria-hidden="true" class="icon md-eye"></i></button></td>'+
                        '</tr>';
                    }
                    $('#show_data1').html(html);
                }

            });
        }
        
    }
</script>
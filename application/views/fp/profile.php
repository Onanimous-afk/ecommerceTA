<!--================Checkout Area =================-->
<section class="checkout_area padding_top">
    <div class="container">
      <div class="returning_customer">
        <div class="check_title">
          <h2>
            Profile
          </h2>
        </div>
        <p>
          Name : <?php echo $this->session->userdata('nama')?>
          <br>
          Email : <?php echo $this->session->userdata('email')?>
        </p>
        <form class="row contact_form" action="#" method="post" novalidate="novalidate">
          <div class="col-md-6 form-group p_star">
            <input type="text" class="form-control" id="password" name="password" value=" " />
            <span class="placeholder" data-placeholder="Enter Password"></span>
          </div>
          <div class="col-md-6 form-group p_star">
            <input type="password" class="form-control" id="retypepassword" name="retypepassword" value="" />
            <span class="placeholder" data-placeholder="Retype Password"></span>
          </div>
          <div class="col-md-12 form-group">
            <button type="submit" value="submit" class="btn_3">
              Update Password
            </button>
          </div>
        </form>
      </div>
      <div class="billing_details">
        <div class="row">
            <div class="section-top-border" style="width:100%">
                <div class="row col-md-12">
                    <h3 class="mb-30">Address List</h3>
                    <button type="button" class="genric-btn success medium mb-30 radius" style="margin-left: 65%;"  data-toggle="modal" data-target="#exampleModal">Tambah alamat baru</button>
                </div>
				
				<div class="row">
					<div class="col-lg-12">
                        <?php if(count($alamat) > 0){?>
                            <?php foreach($alamat as $item){?>
                                <blockquote class="generic-blockquote" <?php if ($item['is_default'] == "1"){ echo "style='border: 2px solid #ff3368;'"; } ?> >
                                    <p>
                                        <?php echo $item['tag_address']?>
                                        <br>
                                        <?php echo $item['fullname']?>
                                        <br>
                                        <?php echo $item['phone']?>
                                        <br>
                                        <?php echo $item['address']?>
                                        <br>
                                        <a href="javascript:showedit_modal(<?php echo $item['id_address']?>)" class="genric-btn default-border" style="border:1px solid transparent !important;background-color: #f9f9ff !important;">Ubah Alamat</a>
                                        <?php if ($item['is_default'] == "0"){ ?>
                                            <span style="color: #415094;">||</span> <a href="javascript:updateaddress(<?php echo $item['id_address']?>,'<?php echo $item['tag_address']?>')" class="genric-btn default-border" style="border:1px solid transparent !important;background-color: #f9f9ff !important;">Jadikan Alamat Utama</a>
                                        <?php } ?>
                                    </p>
                                </blockquote>
                            <?php } ?>
                        <?php } else{?>
                            <blockquote class="generic-blockquote">
                                Upss... Alamat Kosong    
                            </blockquote>
                        <?php } ?>
						
					</div>
			</div>
          </div>
          
        </div>
      </div>
    </div>
  </section>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Address</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>      
      <form method="POST" action="<?php echo base_url()?>Account/addaddress">
        <div class="modal-body">
            <div class="col-md-12 form-group">
                <label class="col-form-label">Addres Label:</label>
                <input type="text" class="form-control" id="tag_address" name="tag_address" placeholder="Addres Label" required="required" />
                <!-- <span class="placeholder" data-placeholder="First name"></span> -->
            </div>
            <div class="col-md-12 form-group">
                <label class="col-form-label">Recipient:</label>
                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Fullname" required="required" />
                <!-- <span class="placeholder" data-placeholder="First name"></span> -->
            </div>
            <div class="col-md-12 form-group p_star">
                <label class="col-form-label">Phone:</label>
                <input type="text" class="form-control" onkeypress="return isNumberKey(event)" id="phone" name="phone" placeholder="Phone" required="required" />
            </div>
            <div class="col-md-12 form-group">
                <label class="col-form-label">Province:</label>
                <select class="form-control" id="province" name="province" required="required" onchange="getcity(this.value)">
                    <option value="">--Select Province--</option>
                </select>
            </div>
            <div class="col-md-12 form-group">
                <label class="col-form-label">City:</label>
                <select class="form-control" id="city" name="city" required="required">
                    <option value="">--Select City--</option>
                </select>
            </div>
            <div class="col-md-12 form-group p_star">
                <label class="col-form-label">ZipCode:</label>
                <input type="text" class="form-control" onkeypress="return isNumberKey(event)" id="zipcode" name="zipcode" placeholder="ZipCode" required="required" />
            </div>
            <div class="col-md-12 form-group">
                <textarea class="form-control" name="address" id="address" rows="3"
                  placeholder="Address" required="required"></textarea>
              </div>
            <div class="col-md-12 form-group p_star">
                <div class="switch-wrap d-flex">
                    <p>Default Address</p>
                    <div class="primary-checkbox"style="margin-top: 7px !important;margin-left:20px !important;">
                        <input type="checkbox" id="default-checkbox" name="default_checkbox"style="position: absolute;z-index: 1000;cursor: pointer;">
                        <label for="default-checkbox"></label>
                    </div>
                </div>
            </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="genric-btn danger radius" data-dismiss="modal">Close</button>
        <button type="submit" class="genric-btn info radius">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>      
      <form method="POST" action="<?php echo base_url()?>Account/updateaddress">
        <div class="modal-body">
            <div class="col-md-12 form-group">
                <input type="hidden" id="id_address" name="id_address">
                <label class="col-form-label">Addres Label:</label>
                <input type="text" class="form-control" id="tag_address_edit" name="tag_address_edit" placeholder="Addres Label" required="required" />
                <!-- <span class="placeholder" data-placeholder="First name"></span> -->
            </div>
            <div class="col-md-12 form-group">
                <label class="col-form-label">Recipient:</label>
                <input type="text" class="form-control" id="fullname_edit" name="fullname_edit" placeholder="Fullname" required="required" />
                <!-- <span class="placeholder" data-placeholder="First name"></span> -->
            </div>
            <div class="col-md-12 form-group p_star">
                <label class="col-form-label">Phone:</label>
                <input type="text" class="form-control" onkeypress="return isNumberKey(event)" id="phone_edit" name="phone_edit" placeholder="Phone" required="required" />
            </div>
            <div class="col-md-12 form-group">
                <label class="col-form-label">Province:</label>
                <select class="form-control" id="province_edit" name="province_edit" required="required" onchange="getcity_edit(this.value)">
                    <option value="">--Select Province--</option>
                </select>
            </div>
            <div class="col-md-12 form-group">
                <label class="col-form-label">City:</label>
                <select class="form-control" id="city_edit" name="city_edit" required="required">
                    <option value="">--Select City--</option>
                </select>
            </div>
            <div class="col-md-12 form-group p_star">
                <label class="col-form-label">ZipCode:</label>
                <input type="text" class="form-control" onkeypress="return isNumberKey(event)" id="zipcode_edit" name="zipcode_edit" placeholder="ZipCode" required="required" />
            </div>
            <div class="col-md-12 form-group">
                <textarea class="form-control" name="address_edit" id="address_edit" rows="3"
                  placeholder="Address" required="required"></textarea>
              </div>
            <div class="col-md-12 form-group p_star">
                <div class="switch-wrap d-flex">
                    <p>Default Address</p>
                    <div class="primary-checkbox"style="margin-top: 7px !important;margin-left:20px !important;">
                        <input type="checkbox" id="default-checkbox_edit" name="default_checkbox_edit"style="position: absolute;z-index: 1000;cursor: pointer;">
                        <label for="default-checkbox"></label>
                    </div>
                </div>
            </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="genric-btn danger radius" data-dismiss="modal">Close</button>
        <button type="submit" class="genric-btn info radius">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>
  <!--================End Checkout Area =================-->
  <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
  <script>
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
      $( document ).ready(function() {
        // $('#listfasilitaskurir').fadeOut("fast");
        getprovince();
      });
      function getprovince(){
        $.ajax({ 
            type: 'GET', 
            url: '<?php echo base_url()?>Home/getprovince', 
            // data: { get_param: 'value' }, 
            dataType: 'json',
            success: function (data) { 
                var dt = data.rajaongkir.results
                var html = '';
                $.each(dt, function(index, element) {
                    html += "<option value='"+element.province_id+"'>"+element.province+"</option>";
                });
                $('#province').append(html);
                $("#courier").val("");
            }
        });
      }
      function getcity(id){
        $('#city').html('');
        $.ajax({ 
            type: 'POST', 
            url: '<?php echo base_url()?>Home/getcity', 
            data: { id_province: id }, 
            dataType: 'json',
            success: function (data) { 
                var dt = data.rajaongkir.results
                var html = '';
                $.each(dt, function(index, element) {
                    html += "<option value='"+element.city_id+"'>"+element.type+" "+element.city_name+"</option>";
                });
                $('#city').append(html);
                $("#courier").val("");
            }
        });
      }
      function getcity_edit(id){
        $('#city_edit').html('');
        $.ajax({ 
            type: 'POST', 
            url: '<?php echo base_url()?>Home/getcity', 
            data: { id_province: id }, 
            dataType: 'json',
            success: function (data) { 
                var dt = data.rajaongkir.results
                var html = '';
                $.each(dt, function(index, element) {
                    html += "<option value='"+element.city_id+"'>"+element.type+" "+element.city_name+"</option>";
                });
                $('#city_edit').append(html);
                $("#courier").val("");
            }
        });
      }
      function updateaddress(id_address,tag){  
        var result = confirm("Are you sure you want to make '"+tag+"' your main address? You can only choose one primary address.");  
        if(result){
            $.ajax({
                type  : 'POST',
                url   : '<?php echo base_url()?>Account/updateisdefaultaddress/',
                data : {id_address:id_address},
                success : function(response){
                    // console.log(response);
                    var res = response;
                    if(res.includes('success'))
                    {
                        window.location.reload();
                    }else{
                        alert("Upss... Sedang ada maintenance silahkan hubungi store via WA yang tertera pada contact");
                    }
                    
                }

            });
        }
    }
    function showedit_modal(id){        
        $('#province_edit').html('');
        $('#city_edit').html('');
        $.ajax({
            type  : 'POST',
            url   : '<?php echo base_url()?>Account/getdetailaddress',
            data : {id_address:id},
            success : function(response){
                // console.log(response);
                response = JSON.parse(response);
                var id_prov = parseInt(response.id_province);
                document.getElementById('id_address').value = response.id_address;
                document.getElementById('fullname_edit').value = response.fullname;
                document.getElementById('phone_edit').value = response.phone;
                document.getElementById('tag_address_edit').value = response.tag_address;
                document.getElementById('zipcode_edit').value = response.zipcode;
                document.getElementById('address_edit').value = response.address;
                document.getElementById('address_edit').innerHTML = response.address;
                $.ajax({ 
                    type: 'GET', 
                    url: '<?php echo base_url()?>Home/getprovince', 
                    // data: { get_param: 'value' }, 
                    dataType: 'json',
                    success: function (data) { 
                        var dt = data.rajaongkir.results
                        var html = '';
                        $.each(dt, function(index, element) {
                            if(element.province_id == response.id_province)
                            {
                                html += "<option value='"+element.province_id+"' selected='selected'>"+element.province+"</option>";    
                            }
                            else
                            {
                                html += "<option value='"+element.province_id+"'>"+element.province+"</option>";
                            }
                            
                        });
                        $('#province_edit').append(html);
                    }
                });
                $.ajax({ 
                    type: 'POST', 
                    url: '<?php echo base_url()?>Home/getcity', 
                    data: { id_province: id_prov }, 
                    dataType: 'json',
                    success: function (data) { 
                        var dt = data.rajaongkir.results
                        var html = '';
                        $.each(dt, function(index, element) {
                            if(element.city_id == response.id_city)
                            {
                                html += "<option value='"+element.city_id+"' selected='selected'>"+element.type+" "+element.city_name+"</option>";
                            }else
                            {
                                html += "<option value='"+element.city_id+"'>"+element.type+" "+element.city_name+"</option>";
                            }
                            
                        });
                        $('#city_edit').append(html);
                    }
                });
                if(response.is_default == "1")
                {
                    $("#default-checkbox_edit").prop('checked', true);
                }else{
                    $("#default-checkbox_edit").prop('checked', false);
                }
                $('#exampleModal2').modal('show')
                
            }

        });
    }
  </script>
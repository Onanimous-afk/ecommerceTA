<link href="<?=base_url();?>assets/css/dropzone.css" rel="stylesheet" type="text/css" />
<style>
.button-2{
text-align:center;
text-decoration: none;
font-family: sans-serif;
-webkit-font-smoothing: antialiased;
/* font-size: 150%; */
color: white;
background: #f44336;
/* padding: 20px 60px; */
display: inline-block;
white-space: nowrap;
box-shadow:none;
cursor:pointer;
border:0;
-webkit-border-radius: 5px;
-moz-border-radius: 5px;
border-radius: 5px;
margin: 10px 0;
-webkit-transition: all 0.2s ease-in-out;
-ms-transition: all 0.2s ease-in-out;
-moz-transition: all 0.2s ease-in-out;
-o-transition: all 0.2s ease-in-out;
transition: all 0.2s ease-in-out;
}
.button-2:hover {
background: #f44336eb;
}
.dz-message{
  text-align: center;
  font-size: 28px;
}

.dz-preview .dz-image img{
  width: 100% !important;
  height: 100% !important;
  object-fit: cover;
}
</style>
<div class="page">
	<div class="page-content">
		<div class="panel">
			<header class="panel-heading">
				<div class="panel-actions"></div>
			</header>
			<div class="panel-body container-fluid">
				<form method="POST" action="<?php echo base_url('ProdukAdmin/editproduk');?>" id="eval-form" enctype="multipart/form-data">
					<input type="hidden" id="idresponseproduk" value="<?php echo $data['id_product']?>"name="idresponseproduk">
					<div class="row row-lg" style="margin-top: 3%;">
						<div class="col-md-12">
							<h4 class="example-title">Nama Produk</h4>
							<input type="text" value="<?php echo $data['product_name']?>" name="produk_name" class="form-control col-md-6" required="required" >
						</div>
						<div class="col-md-12" style="margin-top: 3%;">
							<h4 class="example-title">Deskripsi Singkat</h4>
							<textarea id="deskripsi_singkat" name="deskripsi_singkat" class="form-control" value="<?php echo $data['short_description']?>"><?php echo $data['short_description']?></textarea>
						</div>
						<div class="col-md-12" style="margin-top: 3%;">
							<h4 class="example-title">Deskripsi Lengkap</h4>
							<textarea id="deskripsi_lengkap" name="deskripsi_lengkap" class="form-control" value="<?php echo $data['description']?>"><?php echo $data['description']?></textarea>
						</div>
						<div class="col-md-12" style="margin-top: 3%;">
							<h4 class="example-title">Detail Produk</h4>
							<div style="border:1px;border-style: solid;border-radius:16px;padding:10px;">
								<!-- <input id="btnAdd" type="button" value="Tambah Detail" onclick="AddTextBox()"/> -->
								<button type="button" id="btnAdd" class="btn btn-block btn-info waves-effect waves-classic col-md-2" style="margin-bottom:2%">Tambah Detail</button>
								<div id="existingdetaildata">
									<?php $no = 0; foreach($detailProduct as $items){?>
										<div id="div<?php echo $no;?>">
											<input type="hidden" value="<?php echo $items['id_produk_detail']?>" id="id_produk_detail" name="id_produk_detail[]" class="form-control" placeholder="Harga" required="required" />
											<label for="company" class="col-md-2">
											<select class="form-control" required="required" name="kategori[]">
												<option value="">--Pilih Kategori--</option>
												<?php foreach($kategori1 as $item){?>
													<?php if($item['id_category'] == $items['id_category']){?>
														<option value="<?php echo $item['id_category']?>" selected="selected"><?php echo $item['category_name']?></option>
													<?php }else{?>
														<option value="<?php echo $item['id_category']?>"><?php echo $item['category_name']?></option>
												<?php } }?>
											</select>
											</label>
											<label for="company" class="col-md-2">
											<select class="form-control" required="required" name="ukuran[]">
												<option value="">--Pilih Ukuran--</option>
												<?php foreach($size1 as $item){?>
													<?php if($item['id_size'] == $items['id_size']){?>
														<option value="<?php echo $item['id_size']?>" selected="selected"><?php echo $item['size_name']?></option>
													<?php }else{?>
														<option value="<?php echo $item['id_size']?>"><?php echo $item['size_name']?></option>
												<?php } }?>
											</select>
											</label>
											<label for="company" class="col-md-2">
											<select class="form-control" required="required" name="warna[]">
												<option value="">--Pilih Warna--</option>
												<?php foreach($color1 as $item){?>
													<?php if($item['id_color'] == $items['id_color']){?>
														<option value="<?php echo $item['id_color']?>" selected="selected"><?php echo $item['color_name']?></option>
													<?php }else{?>
														<option value="<?php echo $item['id_color']?>"><?php echo $item['color_name']?></option>
												<?php } }?>
											</select>
											</label>
											<label for="company" class="col-md-2">
												<input type="number" min="0" id="qty" value="<?php echo $items['qty']?>" name="qty[]" class="form-control" placeholder="QTY" required="required" />
											</label>
											<label for="company" class="col-md-2">
												<input type="number" min="0" value="<?php echo $items['price']?>" id="harga" name="harga[]" class="form-control" placeholder="Harga" required="required" />
											</label>
											<label for="companya" class="col-md-1">
												<input type="button" value="Remove" class="removes button-2" style="padding:5px;margin-top:0px !important" onclick="hapusdetail('<?php echo $items['id_produk_detail']?>','<?php echo $no;?>')"/>
											</label>
										</div>
									<?php $no++; } ?>

								</div>
								<div id="TextBoxContainer">
									
								</div>
							</div>
						</div>
						<div class="col-md-12" style="margin-top: 3%;">
							<div class="kt-uppy dropzone" id="dropss" width="100%" style="height: 350px;">
							</div>
							<span class="form-text text-muted">File type: JPG, PNG</span>
						</div>
					</div>
					<button type="button" onclick="submitdata()" class="btn btn-block btn-success waves-effect waves-classic col-md-1" style="margin-top: 3%">Simpan</button>
				</form>
			</div>
		</div>
	</div>
</div>
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?=base_url();?>assets/js/dropzone.js" type="text/javascript"></script>
<script>
	var htmlkategori = '';
	var htmlukuran = '';
	var htmlwarna = '';
	 $(function () {
		var datakategori = <?php echo $kategori; ?>;
		var datasize = <?php echo $size; ?>;
		var datacolor = <?php echo $color; ?>;
		for(var i =0; i<datakategori.length;i++)
		{
			htmlkategori += '<option value="'+datakategori[i].id_category+'">'+datakategori[i].category_name+'</option>';
		}
		for(var i =0; i<datasize.length;i++)
		{
			htmlukuran += '<option value="'+datasize[i].id_size+'">'+datasize[i].size_name+'</option>';
		}
		for(var i =0; i<datacolor.length;i++)
		{
			htmlwarna += '<option value="'+datacolor[i].id_color+'">'+datacolor[i].color_name+'</option>';
		}
		$("#btnAdd").bind("click", function () {
			var div = $("<div />");
			div.html(GetDynamicTextBox(""));
			$("#TextBoxContainer").append(div);
		});
		$("body").on("click", ".remove", function () {
			$(this).closest("div").remove();
		});
	});
	function GetDynamicTextBox(value) {
		var html = '<input type="hidden" id="id_produk_detail" value="0" name="id_produk_detail[]">'+
		'<label for="company" class="col-md-2"style="margin-left: 0.3% !important;">'+
						'<select class="form-control" required="required" name="kategori[]">'+
							'<option value="">--Pilih Kategori--</option>'+
							htmlkategori+
						'</select>'+
					'</label>'+
					'<label for="company" class="col-md-2"style="margin-left: 0.3% !important;">'+
						'<select class="form-control" required="required" name="ukuran[]">'+
							'<option value="">--Pilih Ukuran--</option>'+
							htmlukuran+
						'</select>'+
					'</label>'+
					'<label for="company" class="col-md-2"style="margin-left: 0.3% !important;">'+
						'<select class="form-control" required="required" name="warna[]">'+
							'<option value="">--Pilih Warna--</option>'+
							htmlwarna+
						'</select>'+
					'</label>'+
					'<label for="company" class="col-md-2"style="margin-left: 0.3% !important;">'+
						'<input type="number" min="0" id="qty" value="0" name="qty[]" class="form-control" placeholder="QTY" required="required"/>'+
					'</label>'+
					'<label for="company" class="col-md-2"style="margin-left: 0.3% !important;">'+
						'<input type="number" min="0" value="0" id="harga" name="harga[]" class="form-control" placeholder="Harga" required="required"/>'+
					'</label>'+
					'<label for="companya" class="col-md-1"style="margin-left: 0.3% !important;">'+
						'<input type="button" value="Remove" class="remove button-2" style="padding:5px;margin-top:0px !important"/>'+
					'</label>';
		return html;
		// return '<input name = "DynamicTextBox" type="text" value = "' + value + '" />&nbsp;' +
		// 		'<input type="button" value="Remove" class="remove button-2" style="padding:5px;"/>'
	}
	Dropzone.autoDiscover = false;
    var idresponse = <?php echo $data['id_product']?>;
    var files = 0;
    var idsrtfile = <?php echo $data['id_product']?>;
    var param = files +'~'+idsrtfile;

    var myDropzone = new Dropzone("div#dropss", {
       url: "<?php echo base_url()?>ProdukAdmin/addattachment/"+param,
       acceptedMimeTypes:'image/JPEG,image/jpeg,image/jpg,image/JPG,image/PNG,image/png,image/x-png',
       autoProcessQueue: false,
       parallelUploads: 1, // Number of files process at a time (default 2)
       addRemoveLinks: true,
	   removedfile: function(file) {
		var name = file.name; 
		
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url()?>ProdukAdmin/deleteprodukattachment/',
			data: {name: name},
			sucess: function(data){
				console.log('success: ' + data);
			}
		});
		var _ref;
			return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
		},
       maxFiles: 10,
       maxFilesize: 75,
       timeout: 30000,
       //uploadMultiple: true,
    //    init: function () {

    //     var myDropzone = this;

    //     // Update selector to match your button
    //     $(".btnsimp").click(function (e) {
    //         e.preventDefault();
    //         //myDropzone.processQueue();
    //     });

    //     this.on('sending', function(file, xhr, formData) {
    //         // Append all form inputs to the formData Dropzone will POST
    //         var data = $('#eval-form').serializeArray();
    //         $.each(data, function(key, el) {
    //             formData.append(el.name, el.value);
    //         });
    //     });
    // }
    init: function () {
            //var myDropzone = this;
            //alert(myDropzone.files.length);
            //console.log(myDropzone.files.length); 
			$.ajax({
				url: '<?php echo base_url()?>ProdukAdmin/getprodukattachment/',
				type: 'post',
				data: {id: idsrtfile},
				// dataType: 'json',
				success: function(response){
					// console.log(response);
					response = JSON.parse(response);
					$.each(response, function(key,value) {
					var mockFile = { name: value.name, size: value.size };
					// console.log(mockFile);

					myDropzone.emit("addedfile", mockFile);
					myDropzone.emit("thumbnail", mockFile, value.path);
					// myDropzone.displayExistingFile(mockFile, "https://i.picsum.photos/id/959/600/600.jpg");
					// myDropzone.createThumbnailFromUrl(mockFile, value.path);
					// myDropzone.emit("complete", mockFile);

					});
				}
			});

            this.on("success", function (file, response) {
                //alert(response);
                idresponse = response;
                idsrtfile = response;
                console.log(idresponse);
                //alert('sukses');
                $(".dz-success-mark svg").css("background", "green");
                $(".dz-error-mark").css("display", "none");
                files += 1;
                param = files +'~'+idsrtfile;
                //alert(param);
                this.options.url = "<?php echo base_url()?>ProdukAdmin/addattachment/"+param;
                myDropzone.processQueue();
                //var ficheiro = { name: file.name, link: response[0] };
                //$scope.$apply($scope.uploadedFiles.push(ficheiro));
                //document.forms['eval-form'].submit();
              });
            this.on("complete", function (file) {
                //alert(response);
                if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
					//$('#idresponseproduk').val(idresponse);
					// console.log(idresponse);
					document.forms['eval-form'].submit(); 					
                }                  
                
              });
            this.on("error", function (file, error, xhr) {
              alert(error);
              var ficheiro = { name: file.name, status: xhr.status, statusText: xhr.statusText, erro: error.message };
              console.log(ficheiro);
                //$scope.$apply($scope.errorFiles.push(ficheiro));
              });
          } 

    // $('#uploadfiles').click(function(){
    //    myDropzone.processQueue();
    // });
  });
  function submitdata(){
	if (myDropzone.files.length == 0) {              
		document.forms['eval-form'].submit(); 
	}
	else
	{
		myDropzone.processQueue();
	}
  }
  function hapusdetail(iddetail,div){
	var result = confirm("Apakah anda yakin ingin menghapus data ini?");
	if (result) {
		$.ajax({
          url: '<?php echo base_url();?>ProdukAdmin/hapusdetailproduk',
          method: "POST",
          data: { id:iddetail },
          success: function(response)
          {
			  if(response == 'Success')
			  {
				console.log(response);
				// $("body").on("click", ".removes", function () {
					// $(this).closest("div").remove();
					$( "#div"+div ).remove();
				// });
			  }else{
				alert('Anda tidak bisa menghapus data ini karena produk detail ini pernah dibeli oleh customer');
			  }
			  //window.location.reload();
                //var jsondata = JSON.stringify(response);
                //console.log(response);
		  }
        });
	}
  }
</script>
<style type="text/css">
	.act-btn{
		position: fixed;
		right: 61px;
		bottom: 57px;
		transition: ease all 0.3s;
		position: fixed;
		z-index: 10
	}
</style>
<div class="page">
	<div class="page-content">
		<form method="post" action="<?php echo base_url('Lembur/ajukanulangpost');?>">
			<div class="panel">
				<header class="panel-heading">
					<div class="panel-actions"></div>
				</header>
				<div class="panel-body container-fluid">
					<div class="row row-lg">
						<div class="col-md-6 col-lg-4" style="padding-top: 2%;">
							<div class="example-wrap">
								<h4 class="example-title">Notes</h4>
								<?php if($header['status'] == 1){?>
								<textarea class="form-control" name="notes" id="notes" placeholder="Masukkan Notes" required="required"></textarea>
							<?php } else{?>
								<textarea class="form-control" name="notes" id="notes" placeholder="Masukkan Notes" required="required" disabled=""></textarea>
								<?php } ?>
								<input type="hidden" name="id_pengajuan_lembur" value="<?php echo $idpengajuan?>">
								<?php if($header['status'] == 1){?>
									<button type="submit" class="btn btn-block btn-info waves-effect waves-classic col-md-3" style="margin-top: 9%;padding: 1%;">Ajukan</button>
								<?php } ?>
							</div>

						</div>
					</div>	
				</div>
			</div>
			<div class="row" id="isikonten">
			</div>
		</form>
		<?php if($header['status'] == 1){?>
			<button type="button" id="btnAdd" class="btn btn-floating btn-info waves-effect waves-classic act-btn"><i class="icon md-plus" aria-hidden="true"></i></button>
		<?php } ?>
	</div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
	getdetail();
	$(function() {
		$('#btnAdd').click(function(){
			var html = '<div class="col-md-6" id="listbaru">'+
			'<div class="card">'+
			'<div class="card-header card-header-transparent card-header-bordered"style="padding-left: 90%;">'+
			'<button type="button" class="btn btn-icon btn-pure btn-default waves-effect waves-classic" id="rmv-btn">'+
			'<i class="icon md-delete" aria-hidden="true" style="color: red"></i>'+
			'</button>'+
			'</div>'+
			'<div class="card-block">'+
			'<div class="example-wrap">'+
			'<h4 class="example-title">Tanggal lembur</h4>'+
			'<input class="form-control datepickerss" type="text" name="tanggal_lembur[]" placeholder="Masukkan tanggal lembur" required="required">'+
			'<h4 class="example-title">Jam Mulai lembur</h4>'+
			'<div class="input-group">'+
			'<span class="input-group-addon">'+
			'<span class="md-time"></span>'+
			'</span>'+
			'<input type="text" name="jam_mulai_lembur[]" class="timepicker form-control" data-plugin="clockpicker" data-autoclose="true" required="required" placeholder="Masukkan jam mulai lembur">'+
			'</div>'+
			'<h4 class="example-title">Jam Selesai lembur</h4>'+
			'<div class="input-group">'+
			'<span class="input-group-addon">'+
			'<span class="md-time"></span>'+
			'</span>'+
			'<input type="text" name="jam_selesai_lembur[]" class="timepicker form-control" data-plugin="clockpicker" data-autoclose="true" required="required" placeholder="Masukkan jam selesai lembur">'+
			'</div>'+
			'<h4 class="example-title">Kegiatan</h4>'+
			'<textarea class="form-control" name="kegiatan[]" placeholder="Masukkan kegiatan lembur" required="required"></textarea>'+
			'</div>'+
			'</div>'+
			'</div>'+
			'</div>';

			var newDiv = $(html);
	  //newDiv.style.background = "#000";
      //alert(idbaru);
      
      $('#isikonten').append(newDiv);
  });
		$("body").on("click","#rmv-btn",function(e){

			$(this).parents('#listbaru').remove();

		});
		$("body").on("focus",".datepickerss", function(e){
			$(this).datetimepicker({
				format: 'YYYY-MM-DD'
			})
		})
		$("body").on("focus",".timepicker", function(e){
			$(this).clockpicker()
		})

	});
	function getdetail(){

		var dtheader = '<?php echo $header["notes"]?>';
		var status = '<?php echo $header["status"]?>' == 1 ? "" : "disabled";
		var statuss = '<?php echo $header["status"]?>';
		var idpengajuan = '<?php echo $idpengajuan?>';
		document.getElementById("notes").value = dtheader;
		$.ajax({
			type  : 'ajax',
			url   : '<?php echo base_url()?>Lembur/getdetaillembur/'+idpengajuan,
			async : false,
			dataType : 'json',
			success : function(data){
				for (var i = 0; i < data.length; i++) {
					var html = '<div class="col-md-6" id="listbaru">'+
					'<div class="card">'+
					'<div class="card-header card-header-transparent card-header-bordered"style="padding-left: 90%;">';
					if(i > 0 && statuss == 1){
						html += '<button type="button" class="btn btn-icon btn-pure btn-default waves-effect waves-classic" id="rmv-btn">'+
						'<i class="icon md-delete" aria-hidden="true" style="color: red"></i>'+
						'</button>';
					}
					else
					{
						html += '<button type="button" class="btn btn-icon btn-pure btn-default waves-effect waves-classic"  style="cursor: auto;">'+
						'<i class="icon md-delete" aria-hidden="true" style="color: white"></i>'+
						'</button>';	
					}
					
					html +='</div>'+
					'<div class="card-block">'+
					'<div class="example-wrap">'+
					'<h4 class="example-title">Tanggal lembur</h4>'+
					'<input class="form-control datepickerss" type="text" name="tanggal_lembur[]" placeholder="Masukkan tanggal lembur" value="'+data[i].tgl_lembur+'" required="required"'+status+'>'+
					'<h4 class="example-title">Jam Mulai lembur</h4>'+
					'<div class="input-group">'+
					'<span class="input-group-addon">'+
					'<span class="md-time"></span>'+
					'</span>'+
					'<input type="text" name="jam_mulai_lembur[]" class="timepicker form-control" data-plugin="clockpicker" data-autoclose="true" value="'+data[i].jam_mulai+'" required="required" placeholder="Masukkan jam mulai lembur"'+status+'>'+
					'</div>'+
					'<h4 class="example-title">Jam Selesai lembur</h4>'+
					'<div class="input-group">'+
					'<span class="input-group-addon">'+
					'<span class="md-time"></span>'+
					'</span>'+
					'<input type="text" name="jam_selesai_lembur[]" class="timepicker form-control" data-plugin="clockpicker" data-autoclose="true" value="'+data[i].jam_selesai+'" required="required" placeholder="Masukkan jam selesai lembur"'+status+'>'+
					'</div>'+
					'<h4 class="example-title">Kegiatan</h4>'+
					'<textarea class="form-control" name="kegiatan[]" placeholder="Masukkan kegiatan lembur" required="required"'+status+'>'+data[i].kegiatan+'</textarea>'+
					'</div>'+
					'</div>'+
					'</div>'+
					'</div>';

					var newDiv = $(html);
					$('#isikonten').append(newDiv);
				}	
			}
		});
	}
</script>
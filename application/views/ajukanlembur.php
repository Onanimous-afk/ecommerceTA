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
		<form method="post" action="<?php echo base_url('Lembur/ajukanpost');?>">
			<div class="panel">
				<header class="panel-heading">
					<div class="panel-actions"></div>
				</header>
				<div class="panel-body container-fluid">
					<div class="row row-lg">
						<div class="col-md-6 col-lg-4" style="padding-top: 2%;">
							<div class="example-wrap">
								<h4 class="example-title">Notes</h4>
								<textarea class="form-control" name="notes" placeholder="Masukkan Notes" required="required"></textarea>
								<button type="submit" class="btn btn-block btn-success waves-effect waves-classic col-md-3" style="margin-top: 9%">Ajukan</button>
							</div>

						</div>
					</div>	
				</div>
			</div>
			<div class="row" id="isikonten">
				<div class="col-md-6" id="listbaru">
					<div class="card">
						<div class="card-header card-header-transparent card-header-bordered"style="padding-left: 90%;">
							<button  type="button" class="btn btn-icon btn-pure btn-default waves-effect waves-classic" style="cursor: auto;">
								<i class="icon md-delete" aria-hidden="true" style="color: white"></i>
							</button>
						</div>
						<div class="card-block">
							<div class="example-wrap">
								<h4 class="example-title">Tanggal lembur</h4>
								<input class="form-control datepickers" type="text" name="tanggal_lembur[]" placeholder="Masukkan tanggal lembur" required="required">
								<h4 class="example-title">Jam Mulai lembur</h4>
								<div class="input-group">
									<span class="input-group-addon">
										<span class="md-time"></span>
									</span>
									<input type="text" name="jam_mulai_lembur[]" class="timepicker form-control" data-plugin="clockpicker" data-autoclose="true" required="required" placeholder="Masukkan jam mulai lembur">
								</div>
								<h4 class="example-title">Jam Selesai lembur</h4>
								<div class="input-group">
									<span class="input-group-addon">
										<span class="md-time"></span>
									</span>
									<input type="text" name="jam_selesai_lembur[]" class="timepicker form-control" data-plugin="clockpicker" data-autoclose="true" required="required" placeholder="Masukkan jam selesai lembur">
								</div>
								<h4 class="example-title">Kegiatan</h4>
								<textarea class="form-control" name="kegiatan[]" placeholder="Masukkan kegiatan lembur" required="required"></textarea>
							</div>							
						</div>
					</div>
				</div>
			</div>
		</form>
		<button type="button" id="btnAdd" class="btn btn-floating btn-info waves-effect waves-classic act-btn"><i class="icon md-plus" aria-hidden="true"></i></button>
	</div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
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
</script>
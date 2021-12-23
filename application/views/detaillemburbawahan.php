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
		<form method="post" action="<?php echo base_url('Lembur/approvelembur');?>">
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
								<?php }else{?>
									<textarea class="form-control" name="notes" id="notes" placeholder="Masukkan Notes" required="required" disabled="disabled"></textarea>
								<?php }?>
								<input type="hidden" name="id_pengajuan_lembur" value="<?php echo $idpengajuan?>">
								<?php if($header['status'] == 2 && $this->session->userdata('id_jabatan') != 6 && $this->session->userdata('id_user') != $header['id_pengajuan_lembur']){?>
								<button type="submit" class="btn btn-block btn-info waves-effect waves-classic col-md-3" style="margin-top: 9%;padding: 1%;">Approve</button>
								<button type="button" onclick="reject()" class="btn btn-block btn-danger waves-effect waves-classic col-md-3" style="margin-top: 9%;padding: 1%;margin-left: 48%;">Reject</button>
							<?php }?>
							</div>

						</div>
					</div>	
				</div>
			</div>
			<div class="row" id="isikonten">
			</div>
		</form>
	</div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
	getdetail();
	function getdetail(){

		var dtheader = '<?php echo $header["notes"]?>';
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
					'<div class="card-header card-header-transparent card-header-bordered"style="padding-left: 90%;">'+			
					'</div>'+
					'<div class="card-block">'+
					'<div class="example-wrap">'+
					'<h4 class="example-title">Tanggal lembur</h4>'+
					'<input class="form-control datepickerss" type="text" name="tanggal_lembur[]" placeholder="Masukkan tanggal lembur" value="'+data[i].tgl_lembur+'" required="required" disabled>'+
					'<h4 class="example-title">Jam Mulai lembur</h4>'+
					'<div class="input-group">'+
					'<span class="input-group-addon">'+
					'<span class="md-time"></span>'+
					'</span>'+
					'<input type="text" name="jam_mulai_lembur[]" class="timepicker form-control" data-plugin="clockpicker" data-autoclose="true" value="'+data[i].jam_mulai+'" required="required" placeholder="Masukkan jam mulai lembur" disabled>'+
					'</div>'+
					'<h4 class="example-title">Jam Selesai lembur</h4>'+
					'<div class="input-group">'+
					'<span class="input-group-addon">'+
					'<span class="md-time"></span>'+
					'</span>'+
					'<input type="text" name="jam_selesai_lembur[]" class="timepicker form-control" data-plugin="clockpicker" data-autoclose="true" value="'+data[i].jam_selesai+'" required="required" placeholder="Masukkan jam selesai lembur" disabled>'+
					'</div>'+
					'<h4 class="example-title">Kegiatan</h4>'+
					'<textarea class="form-control" name="kegiatan[]" placeholder="Masukkan kegiatan lembur" required="required" disabled>'+data[i].kegiatan+'</textarea>'+
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
	function reject()
	{
		var id = '<?php echo $idpengajuan?>';
		var notes = document.getElementById('notes').value;
		$.ajax({
         type: "POST",
         url: '<?php echo base_url()?>Lembur/reject',
         data: {id: id, notes : notes},
         success: function(data){
                location.href = '<?php echo base_url();?>Lembur/index';
              }
          });
	}
</script>
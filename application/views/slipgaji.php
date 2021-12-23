
<div class="page">
	<div class="page-content">
		<form method="post" action="<?php echo base_url('Home/downloadslipgaji');?>">
			<div class="panel">
				<header class="panel-heading">
					<div class="panel-actions"></div>
				</header>
				<div class="panel-body container-fluid">
					<div class="row" style="margin-bottom: 3%;margin-top: 3%;margin-left: 3%;">
						<div class="col-md-3">
							<h4 class="example-title">Bulan dan Tahun</h4>
							<input class="form-control datepickersSs" type="text" id="tgl" name="tgl" placeholder="Masukkan bulan dan tahun" required="required">
						</div>
						<div class="col-md-3">
							<h4 class="example-title" style="color: white;">Begin</h4>
							<button type="submit" class="btn btn-block btn-info waves-effect waves-classic">Download Slip Gaji</button>
						</div>
					</div>
				</div>
			</div>			
		</form>
	</div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
	
</script>
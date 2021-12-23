
<div class="page">
	<div class="page-content">
		<div class="panel">
			<header class="panel-heading">
				<div class="panel-actions"></div>
			</header>
			<div class="panel-body container-fluid">
				<form method="POST" action="<?php echo base_url('KategoriAdmin/addkategori');?>">
					<!-- <input type="hidden" id="idkategori" value="<?php echo $data['id_category']?>"name="id_kategori"> -->
					<div class="row row-lg" style="margin-top: 3%;">
						<div class="col-md-12">
							<h4 class="example-title">Nama Kategori</h4>
							<input type="text" value="" name="kategori_name" class="form-control col-md-6" required="required" >
						</div>
					</div>
					<button type="submit" class="btn btn-block btn-success waves-effect waves-classic col-md-1" style="margin-top: 3%">Simpan</button>
				</form>
			</div>
		</div>
	</div>
</div>
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
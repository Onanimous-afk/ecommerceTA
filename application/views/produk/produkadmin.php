<div class="page">
	<div class="page-content">
		<div class="panel">
			<header class="panel-heading">
				<div class="panel-actions"></div>
			</header>
			<div class="panel-body container-fluid">
				<div class="row row-lg">
					<div class="example-wrap" style="width: 100% !important;">
						<div class="nav-tabs-horizontal" data-plugin="tabs">
							<ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" onclick="getdataproduk()" data-toggle="tab" href="#exampleTabsTwo" aria-controls="exampleTabsTwo" role="tab">List Produk</a>
                                </li>
							</ul>
							<div class="tab-content pt-20">
								<div class="tab-pane active" id="exampleTabsTwo" role="tabpanel" style="margin-left: 2%;margin-right: 2%;">
                                <button type="button" onclick="window.location.href='<?php echo base_url();?>ProdukAdmin/TambahProduk'" class="btn btn-block btn-info waves-effect waves-classic col-md-2" style="margin-bottom:3%">Tambah Produk</button>
                                <?php if($this->session->flashdata('alert')): ?>
                                    <div class="alert alert-success alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <div class="fa fa-info-circle"></div>&nbsp;<?php echo $this->session->flashdata('alert'); ?>
                                    </div>
                                <?php endif; ?>
									<form method="POST" action="<?php echo base_url('Penilaian/exporttoexcel');?>">
									<div class="row" style="margin-bottom: 3%">
										<div class="col-md-3">
											<h4 class="example-title">Begin</h4>
											<input class="form-control datepickersS" type="text" id="begin" name="begin" placeholder="Masukkan tanggal mulai" required="required">
										</div>
										<div class="col-md-3">
											<h4 class="example-title">End</h4>
											<input class="form-control datepickersS" type="text" id="end" name="end" placeholder="Masukkan tanggal selesai" required="required">
										</div>
										<div class="col-md-2">
											<h4 class="example-title" style="color: white;">Begin</h4>
											<button type="button" onclick="getdataproduk()" class="btn btn-block btn-success waves-effect waves-classic">Cari</button>
										</div>
										<div class="col-md-3">
											<h4 class="example-title" style="color: white;">Begin</h4>
											<button type="submit" class="btn btn-block btn-default waves-effect waves-classic">Download Report</button>
										</div>
									</div>
									</form>
									<table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
										<thead>
											<tr>
												<th>No</th>
												<th>Nama Produk</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody id="show_data1">

										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>	
				</div>			
			</div>
		</div>
	</div>
</div>
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script> -->
<script type="text/javascript">
	getdataproduk();
	function getdataproduk(){
		var begin = document.getElementById('begin').value;
		var end = document.getElementById('end').value;
		$.ajax({
			type  : 'POST',
			url   : '<?php echo base_url()?>ProdukAdmin/searchdataproduk',
			data : {begin:begin,end:end},
			success : function(data){
				var dt = JSON.parse(data);
				var html = '';
				var j=0;
				for(var i=0; i<dt.length; i++){
					++j;
					html += '<tr>'+
					'<td>'+j+'</td>'+
					'<td>'+dt[i].product_name+'</td>'+
					'<td><button type="button" class="btn btn-icon btn-info waves-effect waves-classic" onclick="redirectya('+dt[i].id_product+')" style="padding: 4%;"><i aria-hidden="true" class="icon md-eye"></i></button></td>'+
					'</tr>';
				}
				$('#show_data1').html(html);
			}

		});
	}
	function redirectya(id)
	{
		location.href = '<?php echo base_url();?>ProdukAdmin/detail/'+id;
	}
</script>
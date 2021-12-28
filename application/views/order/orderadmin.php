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
                                    <a class="nav-link active" onclick="getdataorder()" data-toggle="tab" href="#exampleTabsTwo" aria-controls="exampleTabsTwo" role="tab">List Order</a>
                                </li>
							</ul>
							<div class="tab-content pt-20">
								<div class="tab-pane active" id="exampleTabsTwo" role="tabpanel" style="margin-left: 2%;margin-right: 2%;">
                                <!-- <button type="button" onclick="window.location.href='<?php echo base_url();?>OrderAdmin/TambahOrder'" class="btn btn-block btn-info waves-effect waves-classic col-md-2" style="margin-bottom:3%">Tambah Order</button> -->
                                <?php if($this->session->flashdata('alert')): ?>
                                    <div class="alert alert-success alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <div class="fa fa-info-circle"></div>&nbsp;<?php echo $this->session->flashdata('alert'); ?>
                                    </div>
                                <?php endif; ?>
									<form method="POST" action="<?php echo base_url('Penilaian/exporttoexcel');?>">
									<div class="row" style="margin-bottom: 3%">
										<div class="col-md-3">
											<h4 class="example-title">Nomor Order</h4>
											<input class="form-control" type="text" id="order_no" name="order_no" placeholder="Masukkan Nomor Order" required="required">
										</div>
										<div class="col-md-3">
											<h4 class="example-title">Status Order</h4>
											<select class="form-control" name="status" id="status">
												<option value="" selected="selected">--Pilih Status Order--</option>
												<option value="0">Belum Upload bukti pembayaran</option>
												<option value="1">Membutuhkan konfirmasi</option>
												<option value="2">Input Nomor Resi</option>
												<option value="3">Dikirim</option>
												<option value="4">Selesai</option>
											</select>
										</div>
										<div class="col-md-2">
											<h4 class="example-title" style="color: white;">Begin</h4>
											<button type="button" onclick="getdataorder()" class="btn btn-block btn-success waves-effect waves-classic">Cari</button>
										</div>
										<!-- <div class="col-md-3">
											<h4 class="example-title" style="color: white;">Begin</h4>
											<button type="submit" class="btn btn-block btn-default waves-effect waves-classic">Download Report</button>
										</div> -->
									</div>
									</form>
									<table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
										<thead>
											<tr>
												<th>No</th>
												<th>Order No</th>
												<th>Status</th>
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
	getdataorder();
	function getdataorder(){
		var order_no = document.getElementById('order_no').value;
		var status = document.getElementById('status').value;
		$.ajax({
			type  : 'POST',
			url   : '<?php echo base_url()?>OrderAdmin/searchdataorder',
			data : {order_no:order_no,status:status},
			success : function(data){
				var dt = JSON.parse(data);
				console.log(dt);
				var html = '';
				var j=0;
				for(var i=0; i<dt.length; i++){
					++j;
					var status = 'Selesai';
					if(dt[i].status == 0)
					{
						status = 'Belum Upload bukti pembayaran';
					}else if(dt[i].status == 1)
					{
						status = 'Membutuhkan konfirmasi';
					}else if(dt[i].status == 2)
					{
						status = 'Input Nomor Resi';
					}else if(dt[i].status == 3)
					{
						status = 'Dikirim';
					}
					html += '<tr>'+
					'<td>'+j+'</td>'+
					'<td>'+dt[i].order_no+'</td>'+
					'<td>'+status+'</td>'+
					'<td><button type="button" class="btn btn-icon btn-info waves-effect waves-classic" onclick="redirectya('+dt[i].id_order+')" style="padding: 4%;"><i aria-hidden="true" class="icon md-eye"></i></button></td>'+
					'</tr>';
				}
				$('#show_data1').html(html);
			}

		});
	}
	function redirectya(id)
	{
		location.href = '<?php echo base_url();?>OrderAdmin/detail/'+id;
	}
</script>
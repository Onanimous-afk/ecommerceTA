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
									<a class="nav-link active" onclick="getdatapersonal()" data-toggle="tab" href="#exampleTabsOne" aria-controls="exampleTabsOne" role="tab">List Pengajuan</a>
								</li>
								<?php if($jumbawahan > 0){?>
								<li class="nav-item" role="presentation">
									<a class="nav-link" onclick="getdatabawahan()" data-toggle="tab" href="#exampleTabsTwo" aria-controls="exampleTabsTwo" role="tab">List Pengajuan Bawahan</a>
								</li>
							<?php }?>
							</ul>
							<div class="tab-content pt-20">
								<div class="tab-pane active" id="exampleTabsOne" role="tabpanel" style="margin-left: 2%;margin-right: 2%;">
									<?php if($this->session->userdata('id_jabatan_atasan') != null){?>
										<div class="col-md-2">
											<button type="button" onclick="location.href='<?php echo base_url();?>Lembur/ajukan'" class="btn btn-block btn-primary waves-effect waves-classic" style="margin-top: -4%;margin-bottom: 10%;">Ajukan Lembur</button>
										</div>

									<?php }?>
									<table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
										<thead>
											<tr>
												<th>No</th>
												<th>Nomor Pengajuan</th>
												<th>Tanggal Pengajuan</th>
												<th>Status</th>
												<th>Notes</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody id="show_data">

										</tbody>
									</table>
								</div>
								<div class="tab-pane" id="exampleTabsTwo" role="tabpanel" style="margin-left: 2%;margin-right: 2%;">
									<table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
										<thead>
											<tr>
												<th>No</th>
												<th>Nomor Pengajuan</th>
												<th>Tanggal Pengajuan</th>
												<th>User</th>
												<th>Notes</th>
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
	getdatapersonal();
	function getdatapersonal(){
		$.ajax({
			type  : 'ajax',
			url   : '<?php echo base_url()?>Lembur/getpengajuanpersonal',
			async : false,
			dataType : 'json',
			success : function(data){
				var html = '';
				var i;
				var j=0;
				for(i=0; i<data.length; i++){
					++j;
					var status = data[i].status == 1 ? "Dikembalikan" : data[i].status == 2 ? "Periksa" : "Disetujui"
					html += '<tr>'+
					'<td>'+j+'</td>'+
					'<td>'+data[i].nomor_pengajuan+'</td>'+
					'<td>'+data[i].created_on+'</td>'+
					'<td>'+status+'</td>'+
					'<td>'+data[i].notes+'</td>'+
					'<td><button type="button" class="btn btn-icon btn-info waves-effect waves-classic" onclick="redirectya('+data[i].id_pengajuan_lembur+')" style="padding: 4%;"><i aria-hidden="true" class="icon md-eye"></i></button></td>'+
					'</tr>';
				}
				$('#show_data').html(html);
			}

		});
	}
	function getdatabawahan(){
		$.ajax({
			type  : 'ajax',
			url   : '<?php echo base_url()?>Lembur/getpengajuanbawahan',
			async : false,
			dataType : 'json',
			success : function(data){
				var html = '';
				var i;
				var j=0;
				for(i=0; i<data.length; i++){
					++j;
                    	// var status = data[i].status == 1 ? "Dikembalikan" : data[i].status == 2 ? "Periksa" : "Disetujui"
                    	html += '<tr>'+
                    	'<td>'+j+'</td>'+
                    	'<td>'+data[i].nomor_pengajuan+'</td>'+
                    	'<td>'+data[i].created_on+'</td>'+
                    	'<td>'+data[i].fullname+'</td>'+
                    	'<td>'+data[i].notes+'</td>'+
                    	'<td><button type="button" class="btn btn-icon btn-info waves-effect waves-classic" onclick="redirectya('+data[i].id_pengajuan_lembur+')" style="padding: 4%;"><i aria-hidden="true" class="icon md-eye"></i></button></td>'+
                    	'</tr>';
                    }
                    $('#show_data1').html(html);
                }

            });
	}
	function redirectya(id)
	{
		location.href = '<?php echo base_url();?>Lembur/detail/'+id;
	}
</script>
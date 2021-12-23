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
									<a class="nav-link active" onclick="getdatapersonal()" data-toggle="tab" href="#exampleTabsOne" aria-controls="exampleTabsOne" role="tab">Report Lembur Personal</a>
								</li>
								<?php if($jumbawahan > 0){?>
									<li class="nav-item" role="presentation">
										<a class="nav-link" onclick="getdatabawahan()" data-toggle="tab" href="#exampleTabsTwo" aria-controls="exampleTabsTwo" role="tab">Report Lembur Bawahan</a>
									</li>
								<?php }?>
							</ul>
							<div class="tab-content pt-20">
								<div class="tab-pane active" id="exampleTabsOne" role="tabpanel" style="margin-left: 2%;margin-right: 2%;">
									<form method="POST" action="<?php echo base_url('Lembur/exporttoexcelpersonal');?>">
									<div class="row" style="margin-bottom: 3%">
										<div class="col-md-3">
											<h4 class="example-title">Begin</h4>
											<input class="form-control datepickers" type="text" id="begin" name="begin" placeholder="Masukkan tanggal mulai" required="required">
										</div>
										<div class="col-md-3">
											<h4 class="example-title">End</h4>
											<input class="form-control datepickers" type="text" id="end" name="end" placeholder="Masukkan tanggal selesai" required="required">
										</div>
										<div class="col-md-2">
											<h4 class="example-title" style="color: white;">Begin</h4>
											<button type="button" onclick="getdatapersonal()" class="btn btn-block btn-success waves-effect waves-classic">Cari</button>
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
									<form method="POST" action="<?php echo base_url('Lembur/exporttoexcelbawahan');?>">
									<div class="row" style="margin-bottom: 3%">
										<div class="col-md-3">
											<h4 class="example-title">Begin</h4>
											<input class="form-control datepickers" type="text" id="begins" name="begins" placeholder="Masukkan tanggal mulai" required="required">
										</div>
										<div class="col-md-3">
											<h4 class="example-title">End</h4>
											<input class="form-control datepickers" type="text" id="ends" name="ends" placeholder="Masukkan tanggal selesai" required="required">
										</div>
										<div class="col-md-2">
											<h4 class="example-title" style="color: white;">Begin</h4>
											<button type="button" onclick="getdatabawahan()" class="btn btn-block btn-success waves-effect waves-classic">Cari</button>
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
		var begin = document.getElementById('begin').value;
		var end = document.getElementById('end').value;
		$.ajax({
			type  : 'POST',
			url   : '<?php echo base_url()?>Lembur/getpengajuanpersonalreport',
			data : {begin : begin,end : end},
			success : function(data){
				var dt = JSON.parse(data);
				//console.log(dt.length);
				var html = '';
				var i;
				var j=0;
				for(i=0; i<dt.length; i++){
					++j;
					var status = dt[i].status == 1 ? "Dikembalikan" : dt[i].status == 2 ? "Periksa" : "Disetujui"
					html += '<tr>'+
					'<td>'+j+'</td>'+
					'<td>'+dt[i].nomor_pengajuan+'</td>'+
					'<td>'+dt[i].created_on+'</td>'+
					'<td>'+status+'</td>'+
					'<td>'+dt[i].notes+'</td>'+
					'<td><button type="button" class="btn btn-icon btn-info waves-effect waves-classic" onclick="redirectya('+dt[i].id_pengajuan_lembur+')" style="padding: 4%;"><i aria-hidden="true" class="icon md-eye"></i></button></td>'+
					'</tr>';
				}
				$('#show_data').html(html);
			}

		});
	}
	function getdatabawahan(){
		var begin = document.getElementById('begins').value;
		var end = document.getElementById('ends').value;
		$.ajax({
			type  : 'POST',
			url   : '<?php echo base_url()?>Lembur/getpengajuanbawahanreport',
			data : {begin : begin,end : end},
			success : function(data){
				var dt = JSON.parse(data);
				var html = '';
				var i;
				var j=0;
				for(i=0; i<dt.length; i++){
					++j;
                    	// var status = dt[i].status == 1 ? "Dikembalikan" : dt[i].status == 2 ? "Periksa" : "Disetujui"
                    	html += '<tr>'+
                    	'<td>'+j+'</td>'+
                    	'<td>'+dt[i].nomor_pengajuan+'</td>'+
                    	'<td>'+dt[i].created_on+'</td>'+
                    	'<td>'+dt[i].fullname+'</td>'+
                    	'<td>'+dt[i].notes+'</td>'+
                    	'<td><button type="button" class="btn btn-icon btn-info waves-effect waves-classic" onclick="redirectya('+dt[i].id_pengajuan_lembur+')" style="padding: 4%;"><i aria-hidden="true" class="icon md-eye"></i></button></td>'+
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
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
									<a class="nav-link active" onclick="getdatapersonal()" data-toggle="tab" href="#exampleTabsOne" aria-controls="exampleTabsOne" role="tab">Report Lembur</a>
								</li>
								<li class="nav-item" role="presentation">
									<a class="nav-link" onclick="getdatabawahan()" data-toggle="tab" href="#exampleTabsTwo" aria-controls="exampleTabsTwo" role="tab">Report Penilaian</a>
								</li>
								<li class="nav-item" role="presentation">
									<a class="nav-link" data-toggle="tab" href="#exampleTabsFour" aria-controls="exampleTabsThree" role="tab">Report Slip Gaji</a>
								</li>
								<li class="nav-item" role="presentation">
									<a class="nav-link" data-toggle="tab" href="#exampleTabsThree" aria-controls="exampleTabsThree" role="tab">Cetak Slip Gaji</a>
								</li>
							</ul>
							<div class="tab-content pt-20">
								<div class="tab-pane active" id="exampleTabsOne" role="tabpanel" style="margin-left: 2%;margin-right: 2%;">
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
									</div>
									<table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
										<thead>
											<tr>
												<th>No</th>
												<th>Nomor Pengajuan</th>
												<th>Tanggal Pengajuan</th>
												<th>Nama Pengaju</th>
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
									<div class="row" style="margin-bottom: 3%">
										<div class="col-md-3">
											<h4 class="example-title">Begin</h4>
											<input class="form-control datepickersS" type="text" id="begins" name="begins" placeholder="Masukkan tanggal mulai" required="required">
										</div>
										<div class="col-md-3">
											<h4 class="example-title">End</h4>
											<input class="form-control datepickersS" type="text" id="ends" name="ends" placeholder="Masukkan tanggal selesai" required="required">
										</div>
										<div class="col-md-2">
											<h4 class="example-title" style="color: white;">Begin</h4>
											<button type="button" onclick="getdatabawahan()" class="btn btn-block btn-success waves-effect waves-classic">Cari</button>
										</div>
									</div>
									<table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
										<thead>
											<tr>
												<th>No</th>
												<th>Fullname</th>
												<th>Bulan</th>
												<th>Tahun</th>
												<th>Status</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody id="show_data1">

										</tbody>
									</table>
								</div>
								<div class="tab-pane" id="exampleTabsThree" role="tabpanel" style="margin-left: 2%;margin-right: 2%;">
									<form method="post" action="<?php echo base_url('Report/downloadslipgaji');?>">
										<div class="row" style="margin-bottom: 3%;margin-top: 3%;margin-left: 3%;">
											<div class="col-md-3">
												<h4 class="example-title">Nama User</h4>
												<select class="form-control" id="id_user" name="id_user">
													<option value="">~~Pilih Karyawan~~</option>
													<?php foreach($datauser as $item){?>
														<option value="<?php echo $item['id_user']?>"><?php echo $item['fullname']?></option>
													<?php }?>
												</select>
											</div>
											<div class="col-md-3">
												<h4 class="example-title">Bulan dan Tahun</h4>
												<input class="form-control datepickersSs" type="text" id="tgl" name="tgl" placeholder="Masukkan bulan dan tahun" required="required">
											</div>
											<div class="col-md-3">
												<h4 class="example-title" style="color: white;">Begin</h4>
												<button type="submit" class="btn btn-block btn-info waves-effect waves-classic">Cetak Slip Gaji</button>
											</div>
										</div>
									</form>
								</div>
								<div class="tab-pane" id="exampleTabsFour" role="tabpanel" style="margin-left: 2%;margin-right: 2%;">
									<form method="post" action="<?php echo base_url('Report/downloadslipgajiAll');?>">
										<div class="row" style="margin-bottom: 3%;margin-top: 3%;margin-left: 3%;">
											<div class="col-md-3">
												<h4 class="example-title">Bulan dan Tahun</h4>
												<input class="form-control datepickersSs" type="text" id="tgl" name="tgl" placeholder="Masukkan bulan dan tahun" required="required">
											</div>
											<div class="col-md-3">
												<h4 class="example-title" style="color: white;">Begin</h4>
												<button type="submit" class="btn btn-block btn-info waves-effect waves-classic">Download Report Slip Gaji</button>
											</div>
										</div>
									</form>
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
			url   : '<?php echo base_url()?>Report/getpengajuanpersonal',
			data : {begin:begin,end:end},
			// async : false,
			// dataType : 'json',
			success : function(data){
				var html = '';
				var i;	
				var j=0;
				var dt = JSON.parse(data);
				console.log(dt)
				for(i=0; i<dt.length; i++){
					++j;
					var status = dt[i].status == 1 ? "Dikembalikan" : dt[i].status == 2 ? "Periksa" : "Disetujui"
					html += '<tr>'+
					'<td>'+j+'</td>'+
					'<td>'+dt[i].nomor_pengajuan+'</td>'+
					'<td>'+dt[i].created_on+'</td>'+
					'<td>'+dt[i].fullname+'</td>'+
					'<td>'+status+'</td>'+
					'<td>'+dt[i].notes+'</td>'+
					'<td>'+
					'<button type="button" class="btn btn-icon btn-info waves-effect waves-classic" onclick="redirectya('+dt[i].id_pengajuan_lembur+')" style="padding: 4%;"><i aria-hidden="true" class="icon md-eye"></i></button> &nbsp;&nbsp;'+
					'<button type="button" class="btn btn-icon btn-succes waves-effect waves-classic" onclick="download('+dt[i].id_pengajuan_lembur+')" style="padding: 4%;"><i aria-hidden="true" class="icon md-download"></i></button>'+
					'</td>'+
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
			url   : '<?php echo base_url()?>Report/getpenilaianbawahan',
			data : {begin:begin,end:end},
			success : function(data){
				var dt = JSON.parse(data);
				var html = '';
				var i;
				var j=0;
				for(i=0; i<dt.length; i++){
					++j;
					var status = dt[i].status == 1 ? "Belum dinilai" : "Sudah Dinilai";
					switch(dt[i].bulan) {
						case "1" : bulan = "Januari"; break;
						case "2" : bulan = "Februari"; break;
						case "3" : bulan = "Maret"; break;
						case "4" : bulan = "April"; break;
						case "5" : bulan = "Mei"; break;
						case "6" : bulan = "Juni"; break;
						case "7" : bulan = "Juli"; break;
						case "8" : bulan = "Agustus"; break;
						case "9" : bulan = "September"; break;
						case "10" : bulan = "Oktober"; break;
						case "11" : bulan = "November"; break;
						case "12" : bulan = "Desember"; break;
					}
					html += '<tr>'+
					'<td>'+j+'</td>'+
					'<td>'+dt[i].fullname+'</td>'+
					'<td>'+bulan+'</td>'+
					'<td>'+dt[i].tahun+'</td>'+
					'<td>'+status+'</td>'+
					'<td>'+
					'<button type="button" class="btn btn-icon btn-info waves-effect waves-classic" onclick="redirectyanilai('+dt[i].id_penilaian+')" style="padding: 4%;"><i aria-hidden="true" class="icon md-eye"></i></button> &nbsp;&nbsp;'+
					'<button type="button" class="btn btn-icon btn-succes waves-effect waves-classic" onclick="downloads('+dt[i].id_penilaian+')" style="padding: 4%;"><i aria-hidden="true" class="icon md-download"></i></button>'+
					'</td>'+
					'</td>'+
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
	function redirectyanilai(id)
	{
		location.href = '<?php echo base_url();?>Penilaian/detail/'+id;
	}
	function download(id)
	{
		window.open( 
			"<?php echo base_url();?>Report/exporttoexcelpersonal/"+id, "_blank");

	}
	function downloads(id)
	{
		window.open( 
			"<?php echo base_url();?>Report/exporttoexcel/"+id, "_blank");

	}
</script>
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
								<?php if($jumbawahan > 0){?>
									<li class="nav-item" role="presentation">
										<a class="nav-link active" onclick="getdatabawahan()" data-toggle="tab" href="#exampleTabsTwo" aria-controls="exampleTabsTwo" role="tab">List Penilaian Bawahan</a>
									</li>
								<?php }?>
							</ul>
							<div class="tab-content pt-20">
								<div class="tab-pane active" id="exampleTabsTwo" role="tabpanel" style="margin-left: 2%;margin-right: 2%;">
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
	getdatabawahan();
	function getdatabawahan(){
		var begin = document.getElementById('begin').value;
		var end = document.getElementById('end').value;
		$.ajax({
			type  : 'POST',
			url   : '<?php echo base_url()?>Penilaian/getpenilaianbawahan',
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
					'<td><button type="button" class="btn btn-icon btn-info waves-effect waves-classic" onclick="redirectya('+dt[i].id_penilaian+')" style="padding: 4%;"><i aria-hidden="true" class="icon md-eye"></i></button></td>'+
					'</tr>';
				}
				$('#show_data1').html(html);
			}

		});
	}
	function redirectya(id)
	{
		location.href = '<?php echo base_url();?>Penilaian/detail/'+id;
	}
</script>
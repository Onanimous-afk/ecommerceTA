<?php 

header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=LaporanDataPenilaianBawahan".date('dmYHis').".xls");

header("Pragma: no-cache");

header("Expires: 0");

?>
<h2 style="text-align: center; size: 16;">Report Laporan Data Penilaian Bawahan Periode <?php echo $begin?> - <?php echo $end?></h2>
<br><br>
<table border="1" width="100%">

	<thead>

		<tr>

			<th>No</th>

			<th>Nama</th>
			
			<th>Bulan</th>

			<th>Tahun</th>

			<th>Attitude</th>

			<th>Kehadiran</th>

			<th>Skill</th>

			<th>Project Solved</th>

			<th>Hasil</th>

			<th>Status</th>

		</tr>

	</thead>

	<tbody>
		<?php $no = 0; foreach ($data as $row): $no++;?>

		<tr>

			<td><?php echo $no; ?></td>
			<td><?php echo $row['fullname']; ?></td>
			<td><?php echo $row['bulan']; ?></td>
			<td><?php echo $row['tahun']; ?></td>
			<td><?php echo $row['attitude']; ?></td>
			<td><?php echo $row['kehadiran']; ?></td>
			<td><?php echo $row['skill']; ?></td>
			<td><?php echo $row['project_solved']; ?></td>
			<td><?php echo $row['hasil']; ?></td>
			<td>
				<?php 
					$status = $row['status'] == 1 ? "Belum Dinilai" : "Sudah Dinilai"; 
					echo $status;
				?>				
			</td>
		</tr>

	<?php endforeach; ?>

</tbody>

</table>
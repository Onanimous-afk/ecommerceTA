<?php 

header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=LaporanDataLemburBawahan".date('dmYHis').".xls");

header("Pragma: no-cache");

header("Expires: 0");

?>
<h2 style="text-align: center; size: 16;">Report Laporan Data Lembur Bawahan Periode <?php echo $begin?> - <?php echo $end?></h2>

<br><br>
<table border="1" width="100%">

	<thead>

		<tr>

			<th>No</th>

			<th>Nama</th>

			<th>Tanggal Lembur</th>
			
			<th>Jam Mulai</th>

			<th>Jam Selesai</th>

			<th>Kegiatan</th>

			<th>Status</th>

		</tr>

	</thead>

	<tbody>
		<?php $no = 0; foreach ($data as $row): $no++;?>

		<tr>

			<td><?php echo $no; ?></td>
			<td><?php echo $row['fullname']; ?></td>
			<td><?php echo $row['tgl_lembur']; ?></td>
			<td><?php echo $row['jam_mulai_aktual']; ?></td>
			<td><?php echo $row['jam_selesai_aktual']; ?></td>
			<td><?php echo $row['kegiatan']; ?></td>
			<td>
				<?php 
					$status = $row['status'] == 1 ? "Dikembalikan" : $row['status'] == 2 ? "Periksa" : "Disetujui"; 
					echo $status;
				?>				
			</td>
		</tr>

	<?php endforeach; ?>

</tbody>

</table>
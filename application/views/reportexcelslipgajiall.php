<?php 

header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=LaporanSlipGaji".$data[0]['periode'].".xls");

header("Pragma: no-cache");

header("Expires: 0");

?>
<h2 style="text-align: center; size: 16;">REPORT SLIP GAJI PERIODE <?php echo $data[0]['periode']?></h2>
<br><br>
<table border="1" width="100%">

	<thead>

		<tr>

			<th>No</th>

			<th>NIK</th>
			
			<th>Nama</th>

			<th>Jabatan</th>

			<th>Gaji</th>

			<th>Potongan Hari Kerja</th>

			<th>Lembur</th>

			<th>BPJS Kesehatan</th>

			<th>Tunj. Keahlian</th>

			<th>Jamsostek</th>

			<th>Jaminan Pensiun</th>

			<th>Total</th>

		</tr>

	</thead>

	<tbody>
		<?php $no = 0; foreach ($data as $row): $no++;?>

		<tr>

			<td><?php echo $no; ?></td>
			<td><?php echo $row['nipp']; ?></td>
			<td><?php echo $row['nama']; ?></td>
			<td><?php echo $row['nipp']; ?></td>
			<td><?php echo $row['jabatan']; ?></td>
			<td>&nbsp;</td>
			<td><?php echo $row['nilailembur']; ?></td>
			<td><?php echo $row['bpjskes']; ?></td>
			<td><?php echo $row['nilaitunjangan']; ?></td>
			<td><?php echo $row['bpjsket']; ?></td>
			<td><?php echo $row['jaminanpensi']; ?></td>
			<td><?php echo $row['totalgaji']; ?></td>
		</tr>

	<?php endforeach; ?>

</tbody>

</table>
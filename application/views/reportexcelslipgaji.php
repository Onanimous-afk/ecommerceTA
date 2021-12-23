<?php 

header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=LaporanSlipGaji".$periode.".xls");

header("Pragma: no-cache");

header("Expires: 0");

?>
<h2 style="text-align: center; size: 16;">SLIP GAJI</h2>
<br><br>
<table border="0" width="100%" style="text-align: left;">
	<tr>
		<td>Nama</td>
		<td>:</td>
		<td><?php echo $nama?></td>
	</tr>
	<tr>
		<td>NIK</td>
		<td>:</td>
		<td><?php echo $nipp?></td>
	</tr>
	<tr>
		<td>Jabatan</td>
		<td>:</td>
		<td><?php echo $jabatan?></td>
	</tr>
	<tr>
		<td>Periode</td>
		<td>:</td>
		<td><?php echo $periode?></td>
	</tr>
</table>
<br><br>
<table border="0" width="100%">
	<tr>
		<td>a.</td>
		<td>Gaji</td>
		<td>:</td>
		<td><?php echo $gaji?></td>
		<td>&nbsp;</td>
		<td>Potongan hari kerja</td>
		<td>:</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>b.</td>
		<td>Lembur</td>
		<td>:</td>
		<td><?php echo $nilailembur?></td>
		<td>&nbsp;</td>
		<td>BPJS Kesehatan</td>
		<td>:</td>
		<td><?php echo $bpjskes?></td>
	</tr>
	<tr>
		<td>c.</td>
		<td>Tunj.Keahlian</td>
		<td>:</td>
		<td><?php echo $nilaitunjangan?></td>
		<td>&nbsp;</td>
		<td>Jamsostek</td>
		<td>:</td>
		<td><?php echo $bpjskes?></td>
	</tr>
	<tr>
		<td>d.</td>
		<td>&nbsp;</td>
		<td>:</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>Jaminan Pensiun</td>
		<td>:</td>
		<td><?php echo $jaminanpensi?></td>
	</tr>
	<tr>
		<td>e.</td>
		<td>&nbsp;</td>
		<td>:</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>:</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>f.</td>
		<td>&nbsp;</td>
		<td>:</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>:</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>Jumlah</td>
		<td>:</td>
		<td><?php echo $totalgajigros?></td>
		<td>&nbsp;</td>
		<td>PPH 2020 ke - </td>
		<td>:</td>
		<td><?php echo $pph21?></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td style="border-top: solid thin;">Total</td>
		<td style="border-top: solid thin;">:</td>
		<td style="border-top: solid thin;"><?php echo $totalgaji?></td>
		<td>&nbsp;</td>
		<td style="border-top: solid thin;">Jumlah</td>
		<td style="border-top: solid thin;">:</td>
		<td style="border-top: solid thin;"><?php echo $jumpotongan?></td>
	</tr>
</table>
<?php
echo '
<center>
<br><br>
<font style="font-size:28px;">SORTIR DATA LAPORAN SURAT KELUAR </font><br>
<font style="font-size:18px;">BADAN METEOROLOGI, KLIMATOLOGI DAN GEOFISIKA</font> 
<hr width="80%;">
<div style="padding:30px;">
<form method="post" action="page/laporan_surat_keluar.php">
<table>
	<tr>
		<td colspan="5" align="center" bgcolor="#0066CC" style="color:white; padding:3px; border-radius:5px;">Sortir Periode Laporan</td>
	</tr>
	<tr>
		<td>Periode Awal</td>
		<td>:</td>
		<td>
			<select name="tgl_awal" style="width:50px; height:25px;">
			';
				for ($x = 1; $x <= 31; $x++) 
				{
					$tanggalnya  = sprintf("%02s", $x);
					echo "<option value='$tanggalnya'>$tanggalnya</option>";
				} 
			echo '
			</select>
		</td>
		<td>
			<select name="bln_awal" style="width:100px; height:25px;">
			';
				for ($x = 1; $x <= 12; $x++) 
				{
					$bulannya  = sprintf("%02s", $x);
					echo '<option value="'.$bulannya.'">'.nama_bulan($bulannya).'</option>';
				} 
			echo '
			</select>
		</td>
		<td>
			<select name="thn_awal" style="width:75px; height:25px;">
			';
				for ($x = 2000; $x <= 2022; $x++) 
				{
					echo '<option value="'.$x.'">'.$x.'</option>';
				} 
			echo '
			</select>
		</td>
	</tr>
	<tr>
		<td>Periode Akhir</td>
		<td>:</td>
		<td>
			<select name="tgl_akhir" style="width:50px; height:25px;">
			';
				for ($x = 1; $x <= 31; $x++) 
				{
					$tanggalnya  = sprintf("%02s", $x);
					echo "<option value='$tanggalnya'>$tanggalnya</option>";
				} 
			echo '
			</select>
		</td>
		<td>
			<select name="bln_akhir" style="width:100px; height:25px;">
			';
				for ($x = 1; $x <= 12; $x++) 
				{
					$bulannya  = sprintf("%02s", $x);
					echo '<option value="'.$bulannya.'">'.nama_bulan($bulannya).'</option>';
				} 
			echo '
			</select>
		</td>
		<td>
			<select name="thn_akhir" style="width:75px; height:25px;">
			';
				for ($x = 2000; $x <= 2022; $x++) 
				{
					echo '<option value="'.$x.'">'.$x.'</option>';
				} 
			echo '
			</select>
		</td>
	</tr>
	<tr>
		<td colspan="5"><input type="submit" value="Cetak Laporan" style="width:100%; padding:5px;"/></td>
	</tr>
</table>
</form>
</div>
</center>
';

?>
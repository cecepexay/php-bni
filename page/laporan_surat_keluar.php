<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Data Arsip BMKG Surat Keluar</title>
</head>

<body onload="print()">
	<?php
	session_start();
	include "../config/koneksi.php";
	include "../config/function.php";	
	$title = ''.$_POST['tgl_awal'].' '.nama_bulan($_POST['bln_awal']).' '.$_POST['thn_awal'].' 
			s/d '.$_POST['tgl_akhir'].' '.nama_bulan($_POST['bln_akhir']).' '.$_POST['thn_akhir'].' ';
	
	echo '
	<center>
	<font style="font-size:30px;">LAPORAN SURAT KELUAR BMKG </font><br>
	<font style="font-size:22px;">Per Periode '.$title.'</font>
	<hr width="100%">
	<table border="1" cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<td style="padding:3px;" align="center"><b>No</b></td>
			<td style="padding:3px;" align="center"><b>Nomor Surat</b></td>
			<td style="padding:3px;" align="center"><b>Judul Surat</b></td>
			<td style="padding:3px;" align="center"><b>Tanggal Kirim</b></td>
			<td style="padding:3px;" align="center"><b>Surat Dari</b></td>
			<td style="padding:3px;" align="center"><b>Tujuan Surat</b></td>
		</tr>
	';
	
	$sortir_tanggal = "AND (A.tanggal_terima between '$_POST[thn_awal]-$_POST[bln_awal]-$_POST[tgl_awal]' and '$_POST[thn_akhir]-$_POST[bln_akhir]-$_POST[tgl_akhir]')";
	if($_SESSION['jabatan']==1)
	{
		$txt_tambahan = " SELECT * FROM tbl_surat A INNER JOIN tbl_jabatan B ON A.pengirim=B.kode_jabatan where A.tipe_surat='KELUAR' $sortir_tanggal";
	}
	else{$txt_tambahan = "SELECT * FROM tbl_surat A INNER JOIN tbl_jabatan B ON A.pengirim=B.kode_jabatan WHERE A.pengirim='$_SESSION[jabatan]' AND A.tipe_surat='KELUAR' $sortir_tanggal";}

	$no= 0;
	$querySurat=mysql_query("$txt_tambahan");
	$hitung_surat=mysql_num_rows($querySurat);
	while($datanya = mysql_fetch_array($querySurat))
	{
		$no++;
		echo '
		<tr>
			<td valign="top" style="padding:3px;">'.$no.'</td>
			<td valign="top" style="padding:3px;">'.$datanya['no_surat'].'</td>
			<td valign="top" style="padding:3px;">'.$datanya['judul_surat'].'</td>
			<td valign="top" style="padding:3px;">'.tgl_indo($datanya['tanggal_terima']).'</td>
			<td valign="top" style="padding:3px;">'.$datanya['nama_jabatan'].'</td>
			<td valign="top" style="padding:3px;">
			';
			$no1=0;
			$queryTujuan=mysql_query("SELECT * FROM tbl_tujuan_surat where no_surat='$datanya[no_surat]'");
			while($tujuannya = mysql_fetch_array($queryTujuan))
			{
				$no1++;
				echo ''.$no1.' '.$tujuannya['bagian'].'<br>';
			}
			echo '			
			</td>
		</tr>
		';
	}
	echo '
	</table>
	</center>
	';
	?>
</body>
</html>
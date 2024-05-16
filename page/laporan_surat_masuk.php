<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tabel Report Surat</title>
</head>

<body onload="print()">
	<?php
	session_start();
	include "../config/koneksi.php";
	include "../config/function.php";	
	$apl = ''.nama_aplikasi($_POST['apl_awal']).'';
	$title = ''.$_POST['tgl_awal'].' '.nama_bulan($_POST['bln_awal']).' '.$_POST['thn_awal'].' 
			s/d '.$_POST['tgl_akhir'].' '.nama_bulan($_POST['bln_akhir']).' '.$_POST['thn_akhir'].' ';
	
	$sortir_tanggal = "AND (A.tanggal_terima between '$_POST[thn_awal]-$_POST[bln_awal]-$_POST[tgl_awal]' and '$_POST[thn_akhir]-$_POST[bln_akhir]-$_POST[tgl_akhir]')";
	if($_SESSION['jabatan']==1)
	{
		$txt_tambahan = "	SELECT * FROM tbl_surat as A
							where A.tipe_surat='MASUK' $sortir_tanggal";
							
		$title_disposisi = "Disposisi Ke";
	}
	else{$txt_tambahan = "	SELECT * FROM tbl_surat A 
							INNER JOIN tbl_tujuan_surat B ON A.no_surat=B.no_surat
							INNER JOIN tbl_jabatan C ON B.bagian=C.kode_jabatan 
							WHERE B.bagian='$_SESSION[jabatan]' AND A.tipe_surat='MASUK' $sortir_tanggal";
		$title_disposisi = "Ket Disposisi";					
		}
	
	echo '
	<center>
	<font style="font-size:30px;">TABEL REPORT REGISTER SURAT MASUK</font><br>
	<font style="font-size:22px;">Aplikasi '.$apl.'</font><br>
	<font style="font-size:22px;">Per Periode '.$title.'</font>
	<hr width="100%">
	<table border="1" cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<td style="padding:3px;" align="center"><b>No</b></td>
			<td style="padding:3px;" align="center"><b>Nomor Reqister</b></td>
			<td style="padding:3px;" align="center"><b>Nomor Surat</b></td>
			<td style="padding:3px;" align="center"><b>Tanggal Maintenance</b></td>
			<td style="padding:3px;" align="center"><b>Create</b></td>
			<td style="padding:3px;" align="center"><b>Reset</b></td>
			<td style="padding:3px;" align="center"><b>Update</b></td>
			<td style="padding:3px;" align="center"><b>Delete</b></td>
			<td style="padding:3px;" align="center"><b>Jumlah User</b></td>
		</tr>
		
	';

	$no= 0;
	$querySurat=mysql_query("$txt_tambahan");
	$hitung_surat=mysql_num_rows($querySurat);
	while($datanya = mysql_fetch_array($querySurat))
	{
		$no++;
		echo '
		<tr>
			<td valign="top" style="padding:3px;">'.$no.'.</td>
			<td valign="top" style="padding:3px;">'.$datanya['no_register'].'</td>
			<td valign="top" style="padding:3px;">'.$datanya['no_surat'].'</td>
			<td valign="top" style="padding:3px;">'.tgl_indo($datanya['tanggal_terima']).'</td>
			<td valign="top" style="padding:3px;">'.$datanya['reset'].'</td>
			<td valign="top" style="padding:3px;">'.$datanya['create'].'</td>
			<td valign="top" style="padding:3px;">'.$datanya['update'].'</td>
			<td valign="top" style="padding:3px;">'.$datanya['delete'].'</td>
			<td valign="top" style="padding:3px;">
			';
			$no1=0;
			if($_SESSION['jabatan']==1)
			{
				$queryTujuan=mysql_query("SELECT * FROM tbl_tujuan_surat A INNER JOIN tbl_jabatan B ON A.bagian=B.kode_jabatan where A.no_surat='$datanya[no_surat]'");
				$hitungTujuan=mysql_num_rows($queryTujuan);
				if(empty($hitungTujuan) or $hitungTujuan==0)
				{
					echo "";
				}
				else
				{
					while($tujuannya = mysql_fetch_array($queryTujuan))
					{
						$no1++;
						echo ''.$no1.' '.$tujuannya['nama_jabatan'].'<br>';
					}
				}
			}
			else
			{
				$queryTujuan=mysql_query("SELECT * FROM tbl_tindak_lanjut_surat where no_surat='$datanya[no_surat]'");
				$hitungTujuan=mysql_num_rows($queryTujuan);
				while($tujuannya = mysql_fetch_array($queryTujuan))
				{
					$no1++;
					echo ''.$no1.' '.$tujuannya['tindak_lanjut'].'<br>';
				}
				
			}
			echo '			
			</td>
		</tr>

		';
	}
	echo '
		<tr>
			<td>Total Maintenan</td>
			<td style="padding:3px;" align="center"><td></td><td></td><td></td><td></td><td></td><td></td><td></td></td>
		</tr>
	</table>
	</center>
	';
	?>
</body>
</html>
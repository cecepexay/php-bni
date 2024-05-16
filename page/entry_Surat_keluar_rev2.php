<?php


$bulan = date("m");
$tahun = date("Y");
if($bulan==01){ $bulan = "I";}
elseif($bulan==02){ $bulan = "II";}
elseif($bulan==03){ $bulan = "III";}
elseif($bulan==04){ $bulan = "IV";}
elseif($bulan==05){ $bulan = "V";}
elseif($bulan==06){ $bulan = "VI";}
elseif($bulan==07){ $bulan = "VII";}
elseif($bulan==08){ $bulan = "VIII";}
elseif($bulan==09){ $bulan = "IX";}
elseif($bulan==10){ $bulan = "X";}
elseif($bulan==11){ $bulan = "XI";}
elseif($bulan==12){ $bulan = "XII";}

$jabatanQuery = mysql_query("select nama_jabatan from tbl_jabatan where kode_jabatan='$_POST[pengirim]'");
$jabatannya = mysql_fetch_array($jabatanQuery);

$klasQuery = mysql_query("select inisial_klasifikasi, nama_jenis from tbl_jenis_surat where kode_jenis='$_POST[jenis]'");
$klasnya = mysql_fetch_array($klasQuery);

$queryBagian = mysql_query("select max(no_surat) as no_Surat_baru from tbl_surat where tipe_surat='KELUAR' AND no_surat LIKE '$klasnya[inisial_klasifikasi]%'");
$bagian = mysql_fetch_array($queryBagian);

$get_nomor = substr($bagian['no_Surat_baru'],-3);
$new_fpb = sprintf("%03s", $get_nomor+1);

$generate_kode = "$klasnya[inisial_klasifikasi]/$jabatannya[nama_jabatan]/$bulan/$tahun/$new_fpb";
echo '
<center>
<form method="post" action="mysql/entry_surat_keluar.php" enctype="multipart/form-data">
<hr width="90%;">
<font style="font-size:20px;"><b>FORM INPUT <br> DATA SURAT KELUAR</b></font>
<hr width="90%;">
<br>
<table style="width:90%;" border="0">
	<tr>
		<td valign="top">
			<table width="100%">
				<tr>
					<td colspan="3" bgcolor="#0066CC" style="color:white; padding:3px; border-radius:5px;" align="center"><b>Identitas Surat</b></td>
				</tr>
				<tr>
					<td>No Surat</td>
					<td>:</td>
					<td>
						'.$generate_kode.'
						<input name="no_surat" style="padding:5px; width:220px;" placeholder="No Surat Keluar" value="'.$generate_kode.'" hidden>
					</td>
				</tr>
				
				<tr>
					<td>Judul</td>
					<td>:</td>
					<td>
						'.$_POST['judul_surat'].'
						<input name="judul_surat" style="padding:5px; width:220px;" value="'.$_POST['judul_surat'].'" hidden>
					</td>
				</tr>
				<tr>
					<td>Tanggal Surat</td>
					<td>:</td>
					<td>
						'.$_POST['tgl_surat'].'
						<input name="tgl_surat" style="padding:5px; width:220px;" value="'.$_POST['tgl_surat'].'" hidden>
					</td>
				</tr>
				<tr>
					<td>Tanggal Dikirim</td>
					<td>:</td>
					<td>
						'.$_POST['tgl_terima'].'
						<input name="tgl_terima" style="padding:5px; width:220px;" value="'.$_POST['tgl_terima'].'" hidden>
					</td>
				</tr>
				<tr>
					<td>Penanda Tangan</td>
					<td>:</td>
					<td>
						'.$jabatannya['nama_jabatan'].'
						<input name="pengirim" style="padding:5px; width:220px;" value="'.$_POST['pengirim'].'" hidden>
						</select>
					</td>
				</tr>
				<tr>
					<td>Klasifikasi Surat</td>
					<td>:</td>
					<td>
						'.$klasnya['nama_jenis'].'
						<input name="jenis" style="padding:5px; width:220px;" value="'.$_POST['jenis'].'" hidden>				
					</td>
				</tr>
			</table>
		</td>
		<td valign="top">
			<table width="100%;">
				<tr>
					<td colspan="2" bgcolor="#0066CC" style="color:white; padding:3px; border-radius:5px;" align="center"><b>Surat Ditujukan Untuk </b></td>
				</tr>
				<tr>
					<td>
					';
					$no=0;
					foreach($_POST['tujuan'] as $key)
					{
						$no++;
						echo ' 
						'.$no.' '.$key.'<br>
						<input name="tujuan[]" style="width:90%; padding:5px; width:220px;" value="'.$key.'" hidden> ';
					}
					echo '
					</td>
					<td></td>
				</tr>
			</table>
		</td>
		<td valign="top">
			<table width="100%;">
				<tr>
					<td colspan="2" bgcolor="#0066CC" style="color:white; padding:3px; border-radius:5px;" align="center"><b>Lampiran Surat</b></td>
				</tr>
				<tr>
					<td><input type="file" accept="application/pdf" name="lampiran[]"></td>
					<td></td>
				</tr>
				<tr id="last_lampiran">
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td colspan="3" align="center"><input style="width:100%;" type="button"  value="Tambah Lampiran" id="tambah_lampiran"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td colspan="3"><br><input type="submit" value="Simpan Surat Keluar"  style="width:100%; padding:5px;"></td>
	</tr>
</table>
</form>
</center>
';

?>
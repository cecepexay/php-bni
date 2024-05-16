<?php

if($_SESSION['jabatan']!=1)
{
	mysql_query("UPDATE tbl_tujuan_surat SET notif_read='Y' where no_surat='$_GET[no_surat]' AND bagian='$_SESSION[jabatan]'");
}

$querySurat=mysql_query("SELECT * FROM tbl_surat A INNER JOIN tbl_jenis_surat B ON A.jenis_surat=B.kode_jenis WHERE no_surat='$_GET[no_surat]'");
$surat=mysql_fetch_array($querySurat);

$queryLampiran=mysql_query("SELECT * FROM tbl_lampiran_surat WHERE no_surat='$_GET[no_surat]' ORDER BY lampiran_ke");
$hitung_lampiran=mysql_num_rows($queryLampiran);
if(empty($hitung_lampiran)){$$hitung_lampiran="$hitung_lampiran";}

if($surat['tipe_surat']=="KELUAR")
{
	$queryDari=mysql_query("SELECT * FROM tbl_jabatan where kode_jabatan='$surat[pengirim]' ");
	$dari=mysql_fetch_array($queryDari);
	$pengirim = "$dari[nama_jabatan]";
}
else
{
	$pengirim = "$surat[pengirim]";
}

echo '
<center>
<br>
<font style="font-size:20px;">
DETAIL SURAT MASUK <br> '.$_GET['no_surat'].'
</font>
<table width="95%">
	<tr>
		<td colspan="7"><hr style="width:100%"></td>
	</tr>
	<tr>
		<td width="110px;">No Surat</td>
		<td>:</td>
		<td>'.$surat['no_surat'].'</td>
		<td rowspan="3" width="300px;"> </td>
		<td width="130px">Surat Dari</td>
		<td>:</td>
		<td>'.$pengirim.'</td>
	</tr>
	<tr>
		<td>Tanggal Surat</td>
		<td>:</td>
		<td>'.tgl_indo($surat['tanggal_surat']).'</td>
		
		<td>Tanggal Diterima</td>
		<td>:</td>
		<td>'.tgl_indo($surat['tanggal_terima']).'</td>
	</tr>
	<tr>
		<td>Jenis Surat</td>
		<td>:</td>
		<td>'.$surat['nama_jenis'].'</td>
		
		<td>Jumlah Lampiran</td>
		<td>:</td>
		<td>'.$hitung_lampiran.' File</td>
	</tr>
	<tr>
		<td>Tujuan Surat</td>
		<td>:</td>
		<td colspan="4">'.$surat['tujuan_surat'].'</td>
	</tr>
	<tr>
		<td>Judul Surat</td>
		<td>:</td>
		<td colspan="4"><b>'.$surat['judul_surat'].'</b></td>
	</tr>
	<tr>
		<td colspan="7">
			<hr style="width:100%">
			';
			$no=0;
			if($surat['tipe_surat']=="MASUK")
			{
				$queryTujuan=mysql_query("SELECT * FROM tbl_tujuan_surat A INNER JOIN tbl_jabatan B ON A.bagian = B.kode_jabatan where no_surat='$_GET[no_surat]' ");
				$c_tujuan=mysql_num_rows($queryTujuan);
				if((empty($c_tujuan) or $c_tujuan==0) and $surat['flag_disposisi']=="NO")
				{
					echo '<font color="red">Surat Belum Mendapat Tindak Lanjut Disposisi Dari Atasan</font> <br>';
				}
				else
				{
					echo '
					<table width="100%">
						<tr>
							<td valign="top" width="50%">
								Disposisi Surat : ';
								echo '<br>';
								while($tujuan=mysql_fetch_array($queryTujuan))
								{
									$no++;
									echo '
									'.$no.'. '.$tujuan['nama_jabatan'].' <br>
									';
								}
							echo '
							</td>
							<td valign="top" width="50%">
							Tindak Lanjut Surat : <br>
							';
								$no1=0;
								$queryTind=mysql_query("SELECT * FROM tbl_tindak_lanjut_surat where no_surat='$_GET[no_surat]' ");
								while($tind=mysql_fetch_array($queryTind))
								{
									$no1++;
									echo '
									'.$no1.'. '.$tind['tindak_lanjut'].' <br>
									';
								}
							echo '
							</td>
						</tr>
					</table>
					<hr style="width:100%">
					Arahan Disposisi : '.$surat['ket_disposisi'].'
					';
				}
			}
			else
			{
				echo 'Surat Ditujukan Untuk : <br>';
				
				$queryTujuan=mysql_query("SELECT * FROM tbl_tujuan_surat where no_surat='$_GET[no_surat]' ");
				while($tujuan=mysql_fetch_array($queryTujuan))
				{
					$no++;
					echo '
					'.$no.'. '.$tujuan['bagian'].' <br>
					';
				}
			}
			echo '
			<hr style="width:100%">
		</td>
	</tr>
	<tr>
		<td colspan="7">List Lampiran Surat</td>
	</tr>
	<tr>
		<td colspan="7">
		';
		while($lampiran=mysql_fetch_array($queryLampiran))
		{
		echo '
		<table style="float:left; margin-right:10px;">
			<tr>
				<td align="center"><a href="file/surat_masuk/'.$lampiran['file_lampiran'].'"><img src="gambar/pdf.png" height="50px" /></a></td>
			</tr>
			<tr>
				<td align="center">File Ke '.$lampiran['lampiran_ke'].'</td>
			</tr>
			<tr>
				<td align="center">
					<a href="./file/surat_masuk/'.$lampiran['file_lampiran'].'" download="'.$lampiran['file_lampiran'].'">
					<button>Donwloan File</button>
					</a>
				</td>
			</tr>
		</table>
		';
		}
		echo '
		</td>
		
	</tr>
	<tr>
		<td colspan="7"><hr style="width:100%"></td>
	</tr>
	';
	if($_SESSION['golongan']=="1" and $surat['flag_disposisi']=="NO")
	{
	echo '
	<tr>
		<td colspan="7">
			<a href="?page=form_disposisi&no_surat='.$_GET['no_surat'].'">
				<button style="width:100%;">Lanjutkan Ke Disposisi</button>
			</a>
		</td>
	</tr>
	';
	}
	echo '
</table>
</center>
';

?>
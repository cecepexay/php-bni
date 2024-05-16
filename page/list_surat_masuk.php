<?php
echo '
		<form action="" method="post">
			<table>
				<tr>
					<td>Masukkan Kata Kunci</td>
					<td>:</td>
					<td><input name="search" /></td>
					<td><input type="submit" name="Cari" value="Cari" /></td>
				</tr>
			</table>
		</form>
	';

if($_GET['page']=="list_surat_masuk")
{
	if(isset($_POST['Cari']))
	{
		$sql_cari = "AND A.no_surat LIKE '%$_POST[search]%'";
	}	
	$filter = "MASUK"; $title = "Tanggal Terima"; $filter_a ="b.bagian='$_SESSION[jabatan]' $sql_cari";
	
}
elseif($_GET['page']=="list_surat_keluar")
{
	if(isset($_POST['Cari']))
	{
		$sql_cari = "AND A.no_surat LIKE '%$_POST[search]%'";
	}	
	$filter = "KELUAR"; $title = "Tanggal Dikirim"; $filter_a ="a.pengirim='$_SESSION[jabatan]' $sql_cari";
}

if($_SESSION['jabatan']==1){$txt_tambahan = " SELECT * FROM tbl_surat as A where tipe_surat='$filter' $sql_cari";}
else{$txt_tambahan = "SELECT * FROM tbl_surat A INNER JOIN tbl_tujuan_surat B ON A.no_surat=B.no_surat WHERE $filter_a AND A.tipe_surat='$filter' GROUP BY a.no_surat";}

$querySurat=mysql_query("$txt_tambahan");
$hitung_surat=mysql_num_rows($querySurat);

if ($hitung_surat=='0')
		{
			echo '
			<table class="tabel_list" cellspacing="0" width="100%"> 
				<tr class="head">
					<td class="padding_kolom">No</td>
					<td class="padding_kolom">No Surat</td>
					<td class="padding_kolom">Judul Surat</td>
					<td class="padding_kolom">Jumlah Lampiran</td>
					<td class="padding_kolom">Tanggal terima</td>
					<td class="padding_kolom">Status</td>
					<td class="padding_kolom">Tindakan</td>
				</tr>
				<tr class="satu">
					<td colspan="8" class="padding_kolom">Mohon Maaf... Kami Tidak Menemukan Surat trsbt</td>
				</tr>
			</table>
			';		
		}
else 
		{
			echo '
			<table class="tabel_list" cellspacing="0" width="100%"> 
				<tr class="head">
					<td class="padding_kolom">No</td>
					<td class="padding_kolom">No Surat</td>
					<td class="padding_kolom">Judul Surat</td>
					<td class="padding_kolom">Lampiran</td>
					<td class="padding_kolom">'.$title.'</td>
					';
					if($_SESSION['jabatan']!=1)
					{
						echo '
							<td class="padding_kolom">Status</td>
						';
					}
					else
					{
						if($_SESSION['golongan']==1 or $_SESSION['golongan']==2)
						{
							echo '
								<td class="padding_kolom">Disposisi</td>
							';
						}
					}
					echo '
					<td class="padding_kolom">Tindakan</td>
				</tr>
			';
			$no=0;
			while($surat=mysql_fetch_array($querySurat))
			{
				$no++;
				if($surat['notif_read']=="N") { $status = "Belum Dibaca"; }
				elseif($surat['notif_read']=="Y") { $status = "Sudah Dibaca"; }
				
				$queryLampiran=mysql_query("SELECT * FROM tbl_lampiran_surat
						WHERE no_surat='$surat[no_surat]'
						");
$lampiran=mysql_num_rows($queryLampiran);

				echo '
				<tr class="satu">
					<td class="padding_kolom">'.$no.'</td>
					<td class="padding_kolom">'.$surat['no_surat'].'</td>
					<td class="padding_kolom">'.$surat['judul_surat'].'</td>
					<td class="padding_kolom">'.$lampiran.' File</td>
					<td class="padding_kolom">'.tgl_indo($surat['tanggal_terima']).'</td>
					';
					if($_SESSION['jabatan']!=1)
					{
						echo '
							<td class="padding_kolom">'.$status.'</td>
						';
					}
					else
					{
						if($_SESSION['golongan']==1 or $_SESSION['golongan']==2)
						{
							if($surat['flag_disposisi']=="NO"){$ket_dispos='<font style="color:red;"><b>Belum</b></font>';}
							else{$ket_dispos='<font style="color:green;"><b>Sudah</b></font>';}
							echo '
								<td class="padding_kolom"><font style="color:green;"><b>'.$ket_dispos.'</b></font></td>
							';
						}
					}
					echo '
					<td class="padding_kolom">
						<a class="pic" href="hal_utama.php?page=detail_surat&no_surat='.$surat['no_surat'].'">
						<img class="image1" src="gambar/detail1.png" width="20px"/> 
						<img class="image2" src="gambar/detail.png" width="20px"/></a>
						';
						if($_SESSION['jabatan']==1)
						{
							echo '
							<a class="pic" href="mysql/delete_surat_masuk.php?no_surat='.$surat['no_surat'].'&direct='.$filter.'">
							<img class="image1" src="gambar/hapus1.png" width="20px"/> 
							<img class="image2" src="gambar/hapus.png" width="20px"/></a>
							';
						}
						echo '
					</td>
				</tr>
				';
			}
			echo '
			</table>
			';
			
		
		}

?>
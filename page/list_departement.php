<?php

if($_POST['akses']!="")
{
		mysql_query("UPDATE tbl_jabatan SET akses='$_POST[akses]' where kode_jabatan='$_GET[kode]'");
		header("location:hal_utama.php?page=list_departement");
}

$queryBagian=mysql_query("SELECT * FROM tbl_jabatan");
$hitung_bagian=mysql_num_rows($queryBagian);

if ($hitung_bagian=='0')
		{
			echo '
			<table class="tabel_list" cellspacing="0" width="100%"> 
				<tr class="head">
					<td class="padding_kolom">No</td>
					<td class="padding_kolom">Kode Jabatan</td>
					<td class="padding_kolom">Nama Jabatan</td>
					<td class="padding_kolom">Akses</td>
				</tr>
				<tr class="satu">
					<td colspan="4" class="padding_kolom">Mohon Maaf... Kami Tidak Menemukan jabatan ini</td>
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
					<td class="padding_kolom">Kode Jabatan</td>
					<td class="padding_kolom">Nama Jabatan</td>
					<td class="padding_kolom">Akses</td>
					<td class="padding_kolom">Action</td>
				</tr>
			';
			$no=0;
			while($bagian=mysql_fetch_array($queryBagian))
			{
				$no++;
				
				echo '
				<tr class="satu">
					<td class="padding_kolom">'.$no.'</td>
					<td class="padding_kolom">'.$bagian['kode_jabatan'].'</td>
					<td class="padding_kolom">'.$bagian['nama_jabatan'].'</td>
					<td class="padding_kolom">'.$bagian['akses'].'</td>
					<td class="padding_kolom">
						<a class="pic" href="hal_utama.php?page=list_departement&kode='.$bagian['kode_jabatan'].'#edit_bagian">
						<img class="image1" src="gambar/detail1.png" width="20px"/> 
						<img class="image2" src="gambar/detail.png" width="20px"/></a>
						<a class="pic" href="mysql/delete_data.php?kd_jabatan='.$bagian['kode_jabatan'].'">
						<img class="image1" src="gambar/hapus1.png" width="20px"/> 
						<img class="image2" src="gambar/hapus.png" width="20px"/></a>	
					</td>
				</tr>
				';
			}
			echo '
			</table>
			';
			if($_GET['kode']!="")
			{
			$queryBagian1=mysql_query("SELECT * FROM tbl_jabatan where kode_jabatan='$_GET[kode]'");
			$bagian1=mysql_fetch_array($queryBagian1);
			
			echo "
			<div id='edit_bagian'>
				<div class='window'>
					<a href='#' class='close-button' title='Close'>X</a>
					<center>
						<div>
							<font style='font-weight:bold;' size='4px;'>FORM AKTIVASI DEPARTEMENT TERPILIH</font><br>
							<hr width='75%'>
							<form method='post' action='hal_utama.php?page=list_departement&kode=$_GET[kode]' autocomplete='off'>
							<br>
							<b>$bagian1[nama_jabatan]</b><br>
							<select name='akses' style='width:200px; padding:5px;'>
								<option selected>-- Pilih Akses -- </option>
								<option >YA</option>
								<option >NO</option>
							</select>
							<br><br>
							<button style='width:250px; height:35px;' type='submit'>Simpan Data Bagian</button>
							</form>
						</div>
					</center>
				</div>
			</div>
			";
			}
			
			if($_POST['akses']!="")
			{
			}
		
		}

?>
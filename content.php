<style>

a.pic .image2{display:none;}
a.pic:hover .image1 {display:none;}
a.pic:hover .image2 {display:inline;}
</style>
<?php
include "config/koneksi.php";

$sql_detail_pegawai = mysql_query("	select * from detail_pegawai A 
									INNER JOIN tbl_jabatan B ON A.jabatan = B.kode_jabatan
									Where A.nip='$_SESSION[nip]'");
$get_pegawai = mysql_fetch_array($sql_detail_pegawai);

if (isset($_GET['page']))
{	
	/* Halaman Untuk Kode Bagian Admin Master */
	if($_SESSION['jabatan']==1)
		{
			if($_SESSION['golongan']==1)
			{
				if ($_GET['page']=='form_disposisi')
				{
					echo '
					<div class="tittle-bar">Halaman Entry Disposisi --- ( '.$get_pegawai['nama_karyawan'].' --- '.$get_pegawai['nama_jabatan'].') </div>
					';
					include "page/form_disposisi.php";
				}
			}
			if ($_GET['page']=='add_pegawai')
			{
				echo '
				<div class="tittle-bar">Halaman Entry Surat Keluar --- ( '.$get_pegawai['nama_karyawan'].' --- '.$get_pegawai['nama_jabatan'].') </div>
				';
				include "page/add_pegawai.php";
			}
			if ($_GET['page']=='list_pegawai')
			{
				echo '
				<div class="tittle-bar">Halaman List Pegawai --- ( '.$get_pegawai['nama_karyawan'].' --- '.$get_pegawai['nama_jabatan'].') </div>
				';
				include "page/list_pegawai.php";
			}
			if ($_GET['page']=='list_departement')
			{
				echo '
				<div class="tittle-bar">Halaman List Department --- ( '.$get_pegawai['nama_karyawan'].' --- '.$get_pegawai['nama_jabatan'].') </div>
				';
				include "page/list_departement.php";
			}
			if ($_GET['page']=='detail_pegawai')
			{
				echo '
				<div class="tittle-bar">Halaman Detail Pegawai --- ( '.$get_pegawai['nama_karyawan'].' --- '.$get_pegawai['nama_jabatan'].') </div>
				';
				include "page/detail_pegawai.php";
			}
			if ($_GET['page']=='input_surat_masuk')
			{
				echo '
				<div class="tittle-bar">Halaman Entry Surat Masuk --- ( '.$get_pegawai['nama_karyawan'].' --- '.$get_pegawai['nama_jabatan'].') </div> 
				';
				include "page/entry_surat_masuk.php";
			}
			if ($_GET['page']=='input_surat_keluar')
			{
				echo '
				<div class="tittle-bar">Halaman Entry Surat Keluar --- ( '.$get_pegawai['nama_karyawan'].' --- '.$get_pegawai['nama_jabatan'].') </div> 
				';
				include "page/entry_surat_keluar.php";
			}
			if ($_GET['page']=='input_surat_keluar2')
			{
				echo '
				<div class="tittle-bar">Halaman Entry Surat Keluar --- ( '.$get_pegawai['nama_karyawan'].' --- '.$get_pegawai['nama_jabatan'].') </div> 
				';
				include "page/entry_surat_keluar_rev2.php";
			}
		}
	
	if ($_GET['page']=='list_surat_masuk')
	{
		echo '
			<div class="tittle-bar">Halaman List Surat Masuk --- ( '.$get_pegawai['nama_karyawan'].' --- '.$get_pegawai['nama_jabatan'].') </div>
		';
		include "page/list_surat_masuk.php";
	     
	}
	if ($_GET['page']=='list_surat_keluar')
	{
		echo '
			<div class="tittle-bar">Halaman List Surat Keluar --- ( '.$get_pegawai['nama_karyawan'].' --- '.$get_pegawai['nama_jabatan'].') </div>
		';
		include "page/list_surat_masuk.php";
	     
	}
	if ($_GET['page']=='detail_surat')
	{
		echo '
			<div class="tittle-bar">Halaman Detail Surat --- ( '.$get_pegawai['nama_karyawan'].' --- '.$get_pegawai['nama_jabatan'].') </div>
		';
		include "page/detail_surat_masuk.php";
	
	}
	if ($_GET['page']=='laporan_surat_keluar')
	{
		echo '
			<div class="tittle-bar">Halaman Detail Surat --- ( '.$get_pegawai['nama_karyawan'].' --- '.$get_pegawai['nama_jabatan'].') </div>
		';
		include "page/sortir_surat_keluar.php";
	}
	if ($_GET['page']=='laporan_surat_masuk')
	{
		echo '
			<div class="tittle-bar">Halaman Detail Surat --- ( '.$get_pegawai['nama_karyawan'].' --- '.$get_pegawai['nama_jabatan'].') </div>
		';
		include "page/sortir_surat_masuk.php";
	}
	if ($_GET['page']=='karyawan')
	{
	
	}
}
else
{
	echo '
	<div class="tittle-bar">&nbsp; Halaman Utama</div> 
	<br><br><br>
	<table width="100%" height="100%">
		<tr>
			<td align="center">
				<img src="gambar/user.png" height="200px"><br><br>
				<font size="+2"><b>Report Surat Masuk <br> BNI Life Divisi Teknik Informasi</b></font>
			</td>
		</tr>
	</table>	
	';
	
}
 ?>
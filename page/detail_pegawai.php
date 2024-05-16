<?php

if($_POST['nama']!="")
{
	mysql_query("UPDATE detail_pegawai SET nama_karyawan='$_POST[nama]', email='$_POST[email]', cp='$_POST[cp]', jabatan='$_POST[jabatan]' 
	where nip='$_GET[nip]'");
	mysql_query("UPDATE tbl_user SET jabatan='$_POST[jabatan]' 
	where nip='$_GET[nip]'");
	header("location:hal_utama.php?page=detail_pegawai&nip=$_GET[nip]");
}

$queryPegawai=mysql_query("SELECT * FROM detail_pegawai A INNER JOIN tbl_jabatan B ON A.jabatan=B.kode_jabatan INNER JOIN tbl_user C ON A.nip=C.nip where A.nip='$_GET[nip]'");
$pegawai=mysql_fetch_array($queryPegawai);

if($pegawai['akses']=="YA")
{$button = '<a href="hal_utama.php?page=detail_pegawai&nip='.$_GET['nip'].'&blokir=NO" /><button style="width:50%;">Blokir Akses </button>';}
else
{$button = '<a href="hal_utama.php?page=detail_pegawai&nip='.$_GET['nip'].'&blokir=YA" /><button style="width:50%;">Buka Blokir </button>';}

if($_GET['blokir']!="")
{
	mysql_query("UPDATE tbl_user SET akses='$_GET[blokir]' where nip='$_GET[nip]'");
	header("location:hal_utama.php?page=detail_pegawai&nip=$_GET[nip]");
}

echo '
<br><br><br>
<center>
<table>
	<tr>
		<td rowspan="6">
			<img src="gambar/karyawan/'.$pegawai['photo_karyawan'].'" height="250px;" style="float:left; margin-right:20px; border-radius:10px;" />
		</td>
		<td>No Induk</td>
		<td>:</td>
		<td>'.$pegawai['nip'].'</td>
	</tr>
	<tr>
		<td>Nama Karyawan</td>
		<td>:</td>
		<td>'.$pegawai['nama_karyawan'].'</td>
	</tr>
	<tr>
		<td>Alamat Email</td>
		<td>:</td>
		<td>'.$pegawai['email'].'</td>
	</tr>
	<tr>
		<td>Contact Person</td>
		<td>:</td>
		<td>'.$pegawai['cp'].'</td>
	</tr>
	<tr>
		<td>Jabatan</td>
		<td>:</td>
		<td>'.$pegawai['nama_jabatan'].'</td>
	</tr>
	<tr>
		<td colspan="3">
			<a href="#edit_karyawan" /><button style="width:50%; float:left;">Edit Data</button></a>
			'.$button.'
		</td>
	</tr>
</table>
</center>
';
echo "
			<div id='edit_karyawan'>
				<div class='window'>
					<a href='#' class='close-button' title='Close'>X</a>
					<center>
						<div>
							<font style='font-weight:bold;' size='4px;'>FORM EDIT DETAIL PEGAWAI</font><br>
							<hr width='75%'>
							<form method='post' action='hal_utama.php?page=detail_pegawai&nip=$_GET[nip]' autocomplete='off'>
							<br>
							Nama Karyawan <br>
							<input name='nama' value='$pegawai[nama_karyawan]'><br><br>
							Alamat Email <br>
							<input name='email' value='$pegawai[email]'><br><br>
							Contact Person <br>
							<input name='cp' value='$pegawai[cp]'><br><br>
							Jabatan Pegawai <br>
							<select name='jabatan'>
							<option selected>-- Pilih Jabatan -- </option>
							";
							$queryJabatan = mysql_query("select * from tbl_jabatan");
							while($jabatan = mysql_fetch_array($queryJabatan))
							{
								echo '
								<option value='.$jabatan['kode_jabatan'].'>'.$jabatan['nama_jabatan'].'</option>
								';
							}
							
							echo "
						</select>
							<br><br>
							<button style='width:250px; height:35px;' type='submit'>Simpan Data Pegawai</button>
							</form>
						</div>
					</center>
				</div>
			</div>
			";
			

?>
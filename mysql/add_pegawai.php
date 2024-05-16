<?php
include "../config/koneksi.php";

$lokasi_file = $_FILES['photo']['tmp_name'];
$nama_file   = $_FILES['photo']['name'];
$folder = "../gambar/karyawan/$nama_file";
move_uploaded_file($lokasi_file,"$folder");

$new_nip_query=mysql_query("SELECT MAX(nip)+1 as new_nip FROM detail_pegawai");
$nip=mysql_fetch_array($new_nip_query);

$jab_bag = "$_POST[jabatan]-$_POST[bagian]";

mysql_query("INSERT INTO tbl_user (username, password, nip, jabatan, akses) 
VALUES('".$_POST['username']."','".$_POST['password']."','".$nip['new_nip']."','".$jab_bag."','YA')");

mysql_query("INSERT INTO detail_pegawai (nip, nama_karyawan, photo_karyawan, email, cp, jabatan) 
VALUES('".$nip['new_nip']."','".$_POST['nama']."','".$nama_file."','".$_POST['email']."','".$_POST['cp']."','".$_POST['bagian']."')");


header("location:../hal_utama.php?page=list_pegawai");

?>
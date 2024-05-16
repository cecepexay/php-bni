<?php
include "../config/koneksi.php";

$new_jb_query=mysql_query("SELECT MAX(kode_jabatan)+1 as new_kode FROM tbl_jabatan");
$jb=mysql_fetch_array($new_jb_query);

mysql_query("INSERT INTO tbl_jabatan (kode_jabatan, nama_jabatan, akses) 
VALUES('".$jb['new_kode']."','".$_POST['nama_bagian']."','YA')");

header("location:../hal_utama.php?page=list_departement");

?>
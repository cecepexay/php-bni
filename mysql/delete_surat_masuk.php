<?php
include "../config/koneksi.php";

mysql_query("DELETE FROM tbl_surat WHERE no_surat='$_GET[no_surat]'");
mysql_query("DELETE FROM tbl_tindak_lanjut_surat WHERE no_surat='$_GET[no_surat]'");
mysql_query("DELETE FROM tbl_tujuan_surat WHERE no_surat='$_GET[no_surat]'");
mysql_query("DELETE FROM tbl_lampiran_surat WHERE no_surat='$_GET[no_surat]'");

if($_GET['direct']=="MASUK")
{ header("location:../hal_utama.php?page=list_surat_masuk");}
else
{ header("location:../hal_utama.php?page=list_surat_keluar");}


?>
<?php
include "../config/koneksi.php";

mysql_query("DELETE FROM detail_pegawai WHERE nip='$_GET[nip]'");
mysql_query("DELETE FROM tbl_user WHERE nip='$_GET[nip]'");

header("location:../hal_utama.php?page=list_pegawai");

?>
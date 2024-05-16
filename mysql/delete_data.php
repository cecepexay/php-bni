<?php
include "../config/koneksi.php";

mysql_query("DELETE FROM tbl_jabatan WHERE kode_jabatan='$_GET[kd_jabatan]'");

header("location:../hal_utama.php?page=list_departement");

?>
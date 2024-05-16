<?php
include "../config/koneksi.php";

mysql_query("UPDATE tbl_surat SET flag_disposisi='YA', ket_disposisi='$_POST[ket_disposisi]' where no_surat='$_GET[no_surat]'");

foreach($_POST['tujuan'] as $key)
{
	mysql_query("INSERT INTO tbl_tujuan_surat (no_surat, bagian, notif_read) 
						VALUES('".$_GET['no_surat']."','".$key."','N')");
}

foreach($_POST['tind_lanjut'] as $key)
{
	mysql_query("INSERT INTO tbl_tindak_lanjut_surat (no_surat, tindak_lanjut) 
						VALUES('".$_GET['no_surat']."','".$key."')");
}

header("location:../hal_utama.php?page=detail_surat&no_surat=$_GET[no_surat]");

?>
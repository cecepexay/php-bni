<?php
include "../config/koneksi.php";

mysql_query("INSERT INTO tbl_surat (tujuan_surat, no_surat, judul_surat, tanggal_surat, tanggal_terima, pengirim, jenis_surat, tipe_surat, flag_disposisi, ket_disposisi) 
VALUES('".$_POST['tujuan']."','".$_POST['no_surat']."','".$_POST['judul_surat']."','".$_POST['tgl_surat']."','".$_POST['tgl_terima']."','".$_POST['pengirim']."','".$_POST['jenis']."','MASUK','NO','NONE')");

$len = count($_FILES['lampiran']['name']);
$lampiran_ke=0;
for($i = 0; $i < $len; $i++) {
	$lampiran_ke++;
	$lokasi_file = $_FILES['lampiran']['tmp_name'][$i];
	$nama_file   = $_FILES['lampiran']['name'][$i];
	$folder = "../file/surat_masuk/$nama_file";
	move_uploaded_file($lokasi_file,"$folder");
   
   	mysql_query("INSERT INTO tbl_lampiran_surat (no_surat, lampiran_ke, file_lampiran) 
						VALUES('".$_POST['no_surat']."','".$lampiran_ke."','".$nama_file."')");
}

header("location:../hal_utama.php?page=list_surat_masuk");

?>
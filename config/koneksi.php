<?php
error_reporting(0);
$server = "localhost";
$username = "root";
$password = "";
$database = "bni";

// Koneksi dan memilih database di server
mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");
?>


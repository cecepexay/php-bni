<style>
.btnulangi {
  background: #000000;
  background-image: linear-gradient(to bottom, #000000, #63686b);
  border-radius: 6px;
  box-shadow: 4px 3px 3px #666666;
  font-family: Arial;
  color: #ffffff;
  font-size: 20px;
  padding: 10px 20px 10px 20px;
  text-decoration: none;
}

.btnulangi:hover {
  background: #3cb0fd;
  background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
  text-decoration: none;
}
</style>

<?php
include "koneksi.php";
function antiinjection($data){
  $filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter_sql;
}

$username = antiinjection( $_POST['username'] );
$pass     = antiinjection( $_POST['password'] );

$login=mysql_query("SELECT * FROM tbl_user WHERE username='$username' AND password='$pass' AND akses='YA'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
function timer(){
	$time=1000;
	$_SESSION[timeout]=time()+$time;
}
function cek_login(){
	$timeout=$_SESSION[timeout];
	if(time()<$timeout){
		timer();
		return true;
	}else{
		unset($_SESSION[timeout]);
		return false;
	}
}
	
	$pisah = explode("-",$r['jabatan']);

	$_SESSION[golongan]			= $pisah[0];
	$_SESSION[jabatan]			= $pisah[1];
	$_SESSION[username]			= $r[username];
	$_SESSION[password]			= $r[password];
	$_SESSION[nip]				= $r[nip];
	
  	header('location:../hal_utama.php');
  
}
else{
  echo "<link href=../config/adminstyle.css rel=stylesheet type=text/css>";
  echo "<center>
  <br><br><br><br><br><br>
					Maaf, Kemungkinan Anda Salah Memasukkan<br> <b>Username</b> atau <b>Password</b><br><br>
  		<img src='../gambar/gembok.png' height='200px'><br><br>
        <a class='btnulangi' href=../index.php><b>ULANGI LAGI</b></a></center>";
}
?>
<?php
session_start();
error_reporting(0);
if (empty($_SESSION['username']) AND empty($_SESSION['passuser']) AND empty($_SESSION['jabatan']))
	{
		echo "
				<link href='css/screen.css' rel='stylesheet' type='text/css'>
				<link href='css/reset.css' rel='stylesheet' type='text/css'>
				<center>
					<br><br><br><br><br><br>
					Maaf, untuk masuk <b>Halaman Administrator</b><br>
  <center>anda harus <b>Login</b> dahulu!<br><br>";
 echo "<div> <a href='index.php'><img src='gambar/gembok.png'  height=176 width=143></a>
             </div>";
  echo "<input type=button class='btnulangi' value='LOGIN DI SINI' onclick=location.href='../index.php'></a></center>";
}
else{
?>

<?php 
include "config/koneksi.php"; 
$tgl=date('l, d-m-Y'); 
include "config/function.php";

$queryCEK_SM=mysql_query("SELECT * FROM tbl_tujuan_surat where bagian='$_SESSION[jabatan]' AND notif_read='N'");
$cek_sm=mysql_num_rows($queryCEK_SM);
if(empty($cek_sm)){$cek_sm=0;}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BNI Life</title>

<link href='css/css.css' rel='stylesheet' type='text/css'>
<script src="js/jquery.min.js"></script>
</head>


<body>
<table border="1" width="100%" cellspacing="0px" cellpadding="0px" height="600px">
	<tr>
    	<td colspan="3" height="100"><center> <img src="gambar/bni.png" width="30%"/> </center></td>
	</tr>
	<tr>
		<td width="220px;" valign="top">
			<div id="wrapper">
				<ul class="menu">
                	<?php
					if($_SESSION['jabatan']==1)
					{
						if($_SESSION['golongan']==1)
						{
							echo '
							<li class="item1"><a href="#">Management Surat Masuk</a>
								<ul>
									<li class="subitem3"><a href="?page=list_surat_masuk">List Surat Masuk</a></li>
									<li class="subitem3"><a href="?page=laporan_surat_masuk">Laporan Surat Masuk</a></li>
								</ul>
							</li>
							<li class="item1"><a href="#">Management Surat Keluar</a>
								<ul>
									<li class="subitem3"><a href="?page=list_surat_keluar">List Surat Keluar</a></li>
									<li class="subitem3"><a href="?page=laporan_surat_keluar">Laporan Surat Keluar</a></li>
								</ul>
							</li>
							<li class="item1"><a href="#">Logout </a>
								<ul>
									<li class="subitem3"><a href="config/logout.php">Log Out</a></li>
								</ul>
							</li>	
							';
						}
						else
						{
							echo '
							<li class="item1"><a href="#">Management Pegawai </a>
								<ul>
									<li class="subitem2"><a href="hal_utama.php?page=add_pegawai">Entry Data Pegawai</a></li>
									<li class="subitem3"><a href="hal_utama.php?page=list_pegawai">List Pegawai</a></li>
								</ul>
							</li>
							<li class="item1"><a href="#">Management Jabatan </a>
								<ul>
									<li class="subitem2"><a href="hal_utama.php#add_bagian">Entry Jabatan</a></li>
									<li class="subitem3"><a href="hal_utama.php?page=list_departement">List Jabatan</a></li>
								</ul>
							</li>
							<li class="item1"><a href="#">Management Surat Masuk</a>
								<ul>
									<li class="subitem2"><a href="?page=input_surat_masuk">Entry Surat Masuk</a></li>
									<li class="subitem3"><a href="?page=list_surat_masuk">List Surat Masuk</a></li>
									<li class="subitem3"><a href="?page=laporan_surat_masuk">Laporan Surat Masuk</a></li>
								</ul>
							</li>
							
							<li class="item1"><a href="#">Logout </a>
								<ul>
									<li class="subitem3"><a href="config/logout.php">Log Out</a></li>
								</ul>
							</li>	
							';
						}
					}
					else
					{
						echo '
						<li class="item1"><a href="#">Manage Surat Masuk<span>'.$cek_sm.'</span></a>
							<ul>
								<li class="subitem3"><a href="?page=list_surat_masuk">List Surat Masuk <span>'.$cek_sm.'</span></a></li>
								<li class="subitem3"><a href="?page=laporan_surat_masuk">Laporan Surat Masuk</a></li>
							</ul>
						</li>
						
						<li class="item1"><a href="#">Logout </a>
							<ul>
								<li class="subitem3"><a href="config/logout.php">Log Out</a></li>
							</ul>
						</li>
						';
					}
					?>	
				</ul>
			</div>
		</td>
        <td width="5px;" bgcolor="#000000"></td>
		<td>
        	<div style=" width:100%;">
                <div style=" width:100%; min-height:465px; background:rgba(255,255,255,0.75);">
                        <?php include "content.php"; ?>
                </div>
            </div>      
        </td>
	</tr>
    
</table>
<div class="tittle-bar" style="text-align:center;">
Copyright Cecep Eka Yudha 2017
</div>


<script type="text/javascript">
	$(function() {
	
	    var menu_ul = $('.menu > li > ul'),
	           menu_a  = $('.menu > li > a');
	    
	    menu_ul.hide();
	
	    menu_a.click(function(e) {
	        e.preventDefault();
	        if(!$(this).hasClass('active')) {
	            menu_a.removeClass('active');
	            menu_ul.filter(':visible').slideUp('normal');
	            $(this).addClass('active').next().stop(true,true).slideDown('normal');
	        } else {
	            $(this).removeClass('active');
	            $(this).next().stop(true,true).slideUp('normal');
	        }
	    });
	
	});
</script>

<script>
	
		// fungsi autocomplete
		function autocomplete(){
			// hapus inputan data 
			$(".hapus").click(function(){
				$(this).parent().parent().remove();
			});
		}
		$(function(){
			// fungsi untuk menambahkan inputan data
			$("#tambah_lampiran").click(function(){
				row = '<tr><td><input type="file" name="lampiran[]" accept="application/pdf"></td>'+
				'<td><img src="gambar/delete.png" width="16px" class="hapus"></td></tr>';
				$(row).insertBefore("#last_lampiran");
				autocomplete();
			});
		});
		
		$(function(){
			// fungsi untuk menambahkan inputan data
			$("#tambah_untuk").click(function(){
				row = '<tr><td><input name="tujuan[]" style="width:90%; padding:5px; width:220px;" placeholder="Yth kepada :"></td>'+
				'<td><img src="gambar/delete.png" width="16px" class="hapus"></td></tr>';
				$(row).insertBefore("#last_untuk");
				autocomplete();
			});
		});
		
		$(function(){
			// fungsi untuk menambahkan inputan data
			$("#tambah_tujuan").click(function(){
				row = 	'<tr>		'	+
						'	<td>	'	+
						'		<select name="tujuan[]">	'	+
						'		<option selected>-- Pilih Tujuan Surat --</option>	'	+
						'		<?php $queryBagian = mysql_query("select * from tbl_jabatan where nama_jabatan<>'Admin Master'  AND kode_jabatan<>'$_SESSION[jabatan]'"); ?>	'	+
						'		<?php while($bagian = mysql_fetch_array($queryBagian)){ ?>	'	+
						'		<?php echo '<option value="'.$bagian['kode_jabatan'].'">'.$bagian[nama_jabatan].'</option>';} ?>	'	+
						'		</select>	'	+
						'	<td>	'	+
						'		<img src="gambar/delete.png" width="16px" class="hapus">	' +
						'	</td>	'	+
						'</tr>	';
				$(row).insertBefore("#last_tujuan");
				autocomplete();
			});
		});
    </script>

<?php
if($_SESSION['jabatan']==1)
	{
	echo "
		<div id='add_bagian'>
			<div class='window'>
				<a href='#' class='close-button' title='Close'>X</a>
				<center>
					<div>
						<font style='font-weight:bold;' size='4px;'>FORM INPUT BAGIAN BARU</font><br>
						<hr width='75%'>
						<form method='post' action='mysql/add_bagian.php' autocomplete='off'>
						<br>
						Nama Bagian<br>
						<input class='padding_kolom form_input' name='nama_bagian'><br><br>
						
						<button style='width:250px; height:35px;' type='submit'>Simpan Data Bagian</button>
						</form>
					</div>
				</center>
			</div>
		</div>
	";
	}
?>
			
</body>
</html>

<?php
}
?>
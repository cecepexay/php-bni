<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BNI Life</title>
</head>

<body>
</body>
</html><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<script language="javascript">
function validasi(form){
  if (form.username.value == ""){
    alert("Anda belum mengisikan Username.");
    form.username.focus();
    return (false);
  }
     
  if (form.password.value == ""){
    alert("Anda belum mengisikan Password.");
    form.password.focus();
    return (false);
  }
  return (true);
}
</script>

<meta http-equiv="content-type" content="text/html;charset=UTF-8">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="description"  content=""/>
<meta name="keywords" content=""/>
<meta name="robots" content="ALL,FOLLOW"/>
<meta name="Author" content="AIT"/>
<meta http-equiv="imagetoolbar" content="no"/>
<title>.::Detail Transaksi::.</title>


</head>

<style>
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color:#a8d3ff;
	background-image:url(gambar/kantor1.jpg);
	background-repeat:no-repeat;
	background-size:100% 160%;
}
.login-box				{ width: 600px; margin: 0px auto;margin-top: 100px; padding: 10px; background:rgba(0,57,151,0.7);}
.login-border			{ border: 1px solid #cccccc;}
.login-style			{ border: 3px solid #FFFFFF;}
.login-header .logo		{ width: auto; margin: 0px; padding-top: 0px; border-bottom: 3px solid #ffffff;}
.login-header .logo .title	{ width: 400px; }
.login-header .logo .text	{ width: 400px; color: #333333; }
.login-inside			{ height: 200px; padding-top: 35px; border-bottom: 1px solid #627603; }
.login-inside p			{ text-align: center; padding-bottom: 10px; }
.login-data				{ width: 310px; padding: 10px 0px 35px 0px; margin: 0px auto; -moz-border-radius: 3px 3px 3px 3px; -webkit-border-radius: 3px 3px 3px 3px; border-radius: 3px 3px 3px 3px; margin-bottom : 20px; }


</style>

<body class="no-side">
	<div class="login-box">
		<div class="login-border">
			<div class="login-style">
				<form name="login" action="config/valid_login.php" method="POST" onSubmit="return validasi(this)">
				<div style="width:100%; text-align:center; font-size:20px; padding:2px; letter-spacing:2px; color:white; border-bottom-width:2px; border-bottom-style:solid; border-bottom-color:white;">
        		<center>
        			<table>
        				<tr>
                			<td align="center">
                            	<img src="gambar/BNI2.jpg" height="100px;"/><br />TABEL REPORT SURAT MASUK<br /> BNI LIFE DIVISI TEKNIK INFORMASI
							</td>
						</tr>
					</table>
				</center>
			</div>
			
            <div class="login-inside">
				<div class="login-data">
            		<table width="100%;" cellpadding="0" cellspacing="0"  style="margin-top:-35px;">
						<tr>
							<td align="center" style="color:#FFF;">
                            	<br />
								Username <br />
								<input type="text" name="username" placeholder="Masukkan Username"  style="width:200px; padding:3px; height:20px; border-radius:5px;" /> <br /><br />
								Password  <br />
								<input type="password" name="password" placeholder="Masukkan Password" style="width:200px; padding:3px; height:20px; border-radius:5px;" />  <br /><br /> 
								<input name="submit"  class="submit" type="submit" value="LOGIN" style="width:100px; padding:3px; height:30px; " />
                       		</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	  </form>

</div>
</div>
</div>

</body>

<meta http-equiv="content-type" content="text/html;charset=UTF-8">
</html>

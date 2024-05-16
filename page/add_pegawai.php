<?php
echo '
<form method="post" action="mysql/add_pegawai.php" enctype="multipart/form-data">
<br>
<center>
<hr width="90%;">
<font style="font-size:20px;"><b>FORM INPUT DATA PEGAWAI <br> ( Penanggung Jawab Instansi )</b></font>
<hr width="90%;">
<br>
<table border="0" style="border-radius:20px;">
	<tr>
		<td valign="top">
			<table>
				<tr>
					<td colspan="3" bgcolor="#0066CC" style="color:white; padding:3px; border-radius:5px;" align="center"><b>Identitas Pegawai</b></td>
				</tr>
				<tr>
					<td> Nama Karyawan </td>
					<td> : </td>
					<td> <input name="nama" style="padding:5px; width:220px;" placeholder="Nama Lengkap" /> </td>
				</tr>
				<tr>
					<td> Photo Karyawan </td>
					<td> : </td>
					<td> <input type="file" name="photo" /> </td>
				</tr>
				<tr>
					<td> Email </td>
					<td> : </td>
					<td> <input name="email"  style="padding:5px; width:220px;" placeholder="Email Pegawai" /> </td>
				</tr>
				<tr>
					<td> Contact Person </td>
					<td> : </td>
					<td> <input name="cp"  style="padding:5px; width:220px;" placeholder="Contact Person" /> </td>
				</tr>
			</table>
		</td>
		<td valign="top">
			<table>
				<tr>
					<td colspan="3" bgcolor="#0066CC" style="color:white; padding:3px; border-radius:5px;" align="center"><b>Hak Login Pegawai</b></td>
				</tr>
				<tr>
					<td> Username </td>
					<td> : </td>
					<td> <input name="username"  style="padding:5px; width:220px;" placeholder="Username Pegawai" /> </td>
				</tr>
				<tr>
					<td> Password </td>
					<td> : </td>
					<td> <input type="password" name="password" style="padding:5px; width:220px;" placeholder="Password Pegawai" /> </td>
				</tr>
				<tr>
					<td> Haks Akses </td>
					<td> : </td>
					<td>
						<select name="bagian">
							<option selected>-- Pilih Hak Akses -- </option>
							<option value="1">Admin</option>
							<option value="2">User</option>
							
						</select>
					</td>
				</tr>
				<tr>
					<td> Jabatan </td>
					<td> : </td>
					<td>
						<select name="jabatan">
							<option selected>-- Pilih Jabatan -- </option>
							';
							$queryJabatan = mysql_query("select * from tbl_jabatan");
							while($jabatan = mysql_fetch_array($queryJabatan))
							{
								echo '
								<option value='.$jabatan['kode_jabatan'].'>'.$jabatan['nama_jabatan'].'</option>
								';
							}
							
							echo '
						</select>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<br>
			<input type="submit" value="SIMPAN DATA PEGAWAI" style="width:100%; border-radius:3px; padding:5px;" />
		</td>
	</tr>
</table>
<br><br>
<hr width="90%;">
</center>
</form>
';
?>
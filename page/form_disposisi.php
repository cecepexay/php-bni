<?php

echo '
<center>
<form method="post" action="mysql/add_disposisi.php?no_surat='.$_GET['no_surat'].'" enctype="multipart/form-data">
<hr width="90%;">
<font style="font-size:20px;"><b>FORM INPUT <br> ( DISPOSISI SURAT '.$_GET['no_surat'].' )</b></font>
<hr width="90%;">
<br>
<table style="width:90%;" border="0">
	<tr>
		<td valign="top">
			<table width="100%;">
				<tr>
					<td colspan="2" bgcolor="#0066CC" style="color:white; padding:3px; border-radius:5px;" align="center"><b>Disposisi Surat</b></td>
				</tr>
				<tr>
					<td>
						<select name="tujuan[]">
							<option selected>-- Pilih Tujuan Surat -- </option>
							';
							$queryBagian = mysql_query("select * from tbl_jabatan where nama_jabatan<>'Admin Master' AND kode_jabatan<>'$_SESSION[jabatan]'");
							while($bagian = mysql_fetch_array($queryBagian))
							{
								echo '
								<option value='.$bagian['kode_jabatan'].'>'.$bagian['nama_jabatan'].'</option>
								';
							}
							
							echo '
						</select>
					</td>
					<td></td>
				</tr>
				<tr id="last_tujuan">
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td colspan="3" align="center"><input style="width:100%; padding:3px; border-radius:3px;" type="button"  value="Tambah Penerima" id="tambah_tujuan"></td>
				</tr>
			</table>
		</td>
		<td valign="top">
			<table width="100%;">
				<tr>
					<td colspan="2" bgcolor="#0066CC" style="color:white; padding:3px; border-radius:5px;" align="center"><b>Tindak Lanjut Surat</b></td>
				</tr>
				<tr>
					<td><input type="checkbox" name="tind_lanjut[]" value="Mohon Arahan & Saran"> Mohon Arahan Dan Saran</td>
					<td><input type="checkbox" name="tind_lanjut[]" value="Segera Di Tindak Lanjuti"> Segera Di Tindak Lanjuti</td>
				</tr>
				<tr>
					<td><input type="checkbox" name="tind_lanjut[]" value="Mohon Menjadi Perhatia"> Mohon Menjadi Perhatian</td>
					<td><input type="checkbox" name="tind_lanjut[]" value="Untuk Mewakili"> Untuk Mewakili</td>
				</tr>
				<tr>
					<td><input type="checkbox" name="tind_lanjut[]" value="Untuk Dipelajari Dan Laporan"> Untuk Dipelajari Dan Laporan</td>
					<td><input type="checkbox" name="tind_lanjut[]" value="Draft Jawaban"> Draft Jawaban</td>
				</tr>
				<tr>
					<td colspan="2"><input type="checkbox" name="tind_lanut[]" value="Untuk Diketahui"> Untuk Diketahui</td>
				</tr>
			</table>
			<br>
		</td>
	</tr>
	<tr>
		<td bgcolor="#0066CC" colspan="2" style="color:white; padding:3px; border-radius:5px;" align="center"><b>Arahan Deputi	</b></td>
	</tr>
	<tr>
		<td colspan="3" align="center">
		<br>
			<textarea name="ket_disposisi" style="width:90%; height:100px; padding:5px;"></textarea>
			<br><br>
		</td>
	</tr>
	<tr>
		<td colspan="3"><input type="submit" value="Simpan Disposisi Surat" style="width:100%; padding:5px;"></td>
	</tr>
</table>

<hr width="90%;">
</form>
</center>
';

?>
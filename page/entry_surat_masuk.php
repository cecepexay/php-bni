<?php

echo '
<center>
<form method="post" action="mysql/entry_surat_masuk.php" enctype="multipart/form-data">
<hr width="90%;">
<font style="font-size:20px;"><b>FORM INPUT <br> DATA SURAT MASUK</b></font>
<hr width="90%;">
<br>
<table style="width:90%;" border="0">
	<tr>
		<td valign="top">
			<table width="100%">
				<tr>
					<td colspan="3" bgcolor="#0066CC" style="color:white; padding:3px; border-radius:5px;" align="center"><b>Identitas Surat</b></td>
				</tr>
				<tr>
					<td>No Surat</td>
					<td>:</td>
					<td><input name="no_surat"  style="padding:5px; width:220px;" placeholder="No Surat Masuk"></td>
				</tr>
				<tr>
					<td>Judul</td>
					<td>:</td>
					<td><input name="judul_surat"  style="padding:5px; width:220px;" placeholder="Judul / Perihal Surat"></td>
				</tr>
				<tr>
					<td>Tanggal Surat</td>
					<td>:</td>
					<td><input name="tgl_surat"  style="padding:5px; width:220px;" placeholder="Tanggal Tertera Pada Surat"></td>
				</tr>
				<tr>
					<td>Tanggal Diterima</td>
					<td>:</td>
					<td><input name="tgl_terima"  style="padding:5px; width:220px;" placeholder="Tanggal Surat Diterima"></td>
				</tr>
				<tr>
					<td>Pengirim</td>
					<td>:</td>
					<td><input name="pengirim"  style="padding:5px; width:220px;" placeholder="Surat Diterima Dari"></td>
				</tr>
				<tr>
					<td>Tujuan Pada Surat</td>
					<td>:</td>
					<td><input name="tujuan"  style="padding:5px; width:220px;" placeholder="Surat Ditujukan Untuk"></td>
				</tr>
				<tr>
					<td>Jenis Surat</td>
					<td>:</td>
					<td>
						<select name="jenis">
							<option selected>-- Pilih Jenis Surat -- </option>
							';
							$jenisSurat = mysql_query("select * from tbl_jenis_surat where kode_jenis LIKE '1%'");
							while($jenis = mysql_fetch_array($jenisSurat))
							{
								echo '
								<option value='.$jenis['kode_jenis'].'>'.$jenis['nama_jenis'].'</option>
								';
							}
							
							echo '
						</select>					
					</td>
				</tr>
			</table>
		</td>
		<td valign="top">
			<table width="100%;">
				<tr>
					<td colspan="2" bgcolor="#0066CC" style="color:white; padding:3px; border-radius:5px;" align="center"><b>Lampiran Surat</b></td>
				</tr>
				<tr>
					<td><input type="file" accept="application/pdf" name="lampiran[]"></td>
					<td></td>
				</tr>
				<tr id="last_lampiran">
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td colspan="3" align="center"><input style="width:100%; padding:3px; border-radius:3px;" type="button"  value="Tambah Lampiran" id="tambah_lampiran"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td colspan="3"><input type="submit" value="Simpan Surat Masuk" style="width:100%; padding:5px;"></td>
	</tr>
</table>
<br><br>
<hr width="90%;">
</form>
</center>
';

?>
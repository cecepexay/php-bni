<?php

echo '
<center>
<form method="post" action="?page=input_surat_keluar2" enctype="multipart/form-data">
<hr width="90%;">
<font style="font-size:20px;"><b>FORM INPUT <br> DATA SURAT KELUAR</b></font>
<hr width="90%;">
<br>
<table style="width:90%;" border="0">
	<tr>
		<td valign="top">
			<table width="100%">
				<tr>
					<td colspan="3" bgcolor="#0066CC" style="color:white; padding:3px; border-radius:5px;" align="center"><b>Identitas Surat</b></td>
				</tr>
				<!--
				<tr>
					<td>No Surat</td>
					<td>:</td>
					<td><input name="no_surat" style="padding:5px; width:220px;" placeholder="No Surat Keluar"></td>
				</tr>
				-->
				<tr>
					<td>Judul</td>
					<td>:</td>
					<td><input name="judul_surat" style="padding:5px; width:220px;" placeholder="Judul / Perihal Surat"></td>
				</tr>
				<tr>
					<td>Tanggal Surat</td>
					<td>:</td>
					<td><input name="tgl_surat" style="padding:5px; width:220px;" placeholder="Tanggal Tertera Pada Surat"></td>
				</tr>
				<tr>
					<td>Tanggal Dikirim</td>
					<td>:</td>
					<td><input name="tgl_terima" style="padding:5px; width:220px;" placeholder="Tanggal Dikirim Surat"></td>
				</tr>
				<tr>
					<td>Penanda Tangan</td>
					<td>:</td>
					<td>
						<select name="pengirim">
							<option selected>-- Pilih Surat Dari -- </option>
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
				</tr>
				<tr>
					<td>Klasifikasi Surat</td>
					<td>:</td>
					<td>
						<select name="jenis">
							<option selected>-- Pilih Jenis Surat -- </option>
							';
							$jenisSurat = mysql_query("select * from tbl_jenis_surat where kode_jenis LIKE '2%'");
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
					<td colspan="2" bgcolor="#0066CC" style="color:white; padding:3px; border-radius:5px;" align="center"><b>Surat Ditujukan Untuk </b></td>
				</tr>
				<tr>
					<td>
						<input name="tujuan[]" style="width:90%; padding:5px; width:220px;" placeholder="Yth kepada :">
					</td>
					<td></td>
				</tr>
				<tr id="last_untuk">
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td colspan="3" align="center"><input style="width:100%;" type="button"  value="Tambah Penerima" id="tambah_untuk"></td>
				</tr>
			</table>
		</td>
		<td valign="top">
			<!--
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
					<td colspan="3" align="center"><input style="width:100%;" type="button"  value="Tambah Lampiran" id="tambah_lampiran"></td>
				</tr>
			</table>
			-->
		</td>
	</tr>
	<tr>
		<td colspan="3"><br><input type="submit" value="Simpan Surat Keluar"  style="width:100%; padding:5px;"></td>
	</tr>
</table>
</form>
</center>
';

?>
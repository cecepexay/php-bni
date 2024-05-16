<?php

$queryPegawai=mysql_query("SELECT A.nip as induk, A.nama_karyawan as nama, C.nama_jabatan as jabatan, A.cp as cp, B.akses as akses  FROM detail_pegawai A
						INNER JOIN tbl_user B ON A.nip=B.nip
						INNER JOIN tbl_jabatan C ON A.jabatan=C.kode_jabatan
						");
$hitung_pegawai=mysql_num_rows($queryPegawai);
if ($hitung_pegawai=='0')
		{
			echo '
			<table class="tabel_list" cellspacing="0" width="100%"> 
				<tr class="head">
					<td class="padding_kolom">No</td>
					<td class="padding_kolom">No Induk</td>
					<td class="padding_kolom">Nama Karyawan</td>
					<td class="padding_kolom">Jabatan</td>
					<td class="padding_kolom">Contact</td>
					<td class="padding_kolom">Akses</td>
				</tr>
				<tr class="satu">
					<td colspan="8" class="padding_kolom">Mohon Maaf... Kami Tidak Menemukan Siswa Pada Kelas Ini</td>
				</tr>
			</table>
			';		
		}
else 
		{
			echo '
			<table class="tabel_list" cellspacing="0" width="100%"> 
				<tr class="head">
					<td class="padding_kolom">No</td>
					<td class="padding_kolom">No Induk</td>
					<td class="padding_kolom">Nama Karyawan</td>
					<td class="padding_kolom">Jabatan</td>
					<td class="padding_kolom">Contact</td>
					<td class="padding_kolom">Akses</td>
					<td class="padding_kolom">Action</td>
				</tr>
			';
			$no=0;
			while($pegawai=mysql_fetch_array($queryPegawai))
			{
				$no++;

				echo '
				<tr class="satu">
					<td class="padding_kolom">'.$no.'</td>
					<td class="padding_kolom">'.$pegawai['induk'].'</td>
					<td class="padding_kolom">'.$pegawai['nama'].'</td>
					<td class="padding_kolom">'.$pegawai['jabatan'].'</td>
					<td class="padding_kolom">'.$pegawai['cp'].'</td>
					<td class="padding_kolom">'.$pegawai['akses'].'</td>
					<td class="padding_kolom">
						<a class="pic" href="hal_utama.php?page=detail_pegawai&nip='.$pegawai['induk'].'">
						<img class="image1" src="gambar/detail1.png" width="20px"/> 
						<img class="image2" src="gambar/detail.png" width="20px"/></a>
						<a class="pic" href="mysql/delete_pegawai.php?nip='.$pegawai['induk'].'">
						<img class="image1" src="gambar/hapus1.png" width="20px"/> 
						<img class="image2" src="gambar/hapus.png" width="20px"/></a>	
					</td>
				</tr>
				';
			}
			echo '
			</table>
			';
			
		
		}

?>
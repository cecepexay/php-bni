<?php

	function nama_aplikasi($aplikasi)
	{
		if($aplikasi=="01"){ $nama_aplikasi = "Ibank_Admin";}
		elseif($aplikasi=="02"){ $nama_aplikasi = "Icons";}
		elseif($aplikasi=="03"){ $nama_aplikasi = "IdM";}
		elseif($aplikasi=="04"){ $nama_aplikasi = "EIS";}
		elseif($aplikasi=="05"){ $nama_aplikasi = "SAR";}
		elseif($aplikasi=="06"){ $nama_aplikasi = "BAR";}
		elseif($aplikasi=="07"){ $nama_aplikasi = "WOM";}
		elseif($aplikasi=="08"){ $nama_aplikasi = "CRM";}
		elseif($aplikasi=="09"){ $nama_aplikasi = "Webmail";}
		elseif($aplikasi=="10"){ $nama_aplikasi = "Email";}
		elseif($aplikasi=="11"){ $nama_aplikasi = "GLOBS";}
		elseif($aplikasi=="12"){ $nama_aplikasi = "B24";}
		elseif($aplikasi=="13"){ $nama_aplikasi = "SKAIcona";}
		elseif($aplikasi=="14"){ $nama_aplikasi = "SKCDM";}
		
		return $nama_aplikasi;
	}

	function nama_bulan($bulan)
	{
		if($bulan=="01"){ $nama_bulan = "Januari";}
		elseif($bulan=="02"){ $nama_bulan = "Februari";}
		elseif($bulan=="03"){ $nama_bulan = "Maret";}
		elseif($bulan=="04"){ $nama_bulan = "April";}
		elseif($bulan=="05"){ $nama_bulan = "Mei";}
		elseif($bulan=="06"){ $nama_bulan = "Juni";}
		elseif($bulan=="07"){ $nama_bulan = "Juli";}
		elseif($bulan=="08"){ $nama_bulan = "Agustus";}
		elseif($bulan=="09"){ $nama_bulan = "September";}
		elseif($bulan=="10"){ $nama_bulan = "Oktober";}
		elseif($bulan=="11"){ $nama_bulan = "November";}
		elseif($bulan=="12"){ $nama_bulan = "Desember";}
		
		return $nama_bulan;
	}
	
	function tgl_indo($datanya)
	{
		$tgl_nya = substr($datanya,-2);
		$bln_nya = substr($datanya,5,2);
		$thn_nya = substr($datanya,0,4);
		$keluaranya = ''.$tgl_nya.' '.nama_bulan($bln_nya).' '.$thn_nya.'';
		return $keluaranya;
	}

?>
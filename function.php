<?php 

		function terlambat($batas,$tgl_kembali){
		$selisih =strtotime($tgl_kembali)-strtotime($batas);

			$selisih = $selisih/86400;

 	if ($selisih>=1) {
 		$hasil = floor($selisih);
 	}else{
 		$hasil = 0;
 	}
 	return $hasil;
 	}
 

 ?>
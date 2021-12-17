<?php

$pesan = "I am A Great human";
$pesan_terbalik = strrev($pesan);
$pecah_kata = explode(" ", $pesan_terbalik);
$hitung=count($pecah_kata);
$jumlah_array= $hitung-1; 
$pecah_kata[1]=strtoupper($pecah_kata[1]);
for ($i = $jumlah_array; $i >= 0 ; $i--) {	
	if (ctype_upper($pecah_kata[$i])) {
	$terkonversi=ucfirst(strtolower($pecah_kata[$i]));
	echo $terkonversi." ";
	}
	else{
	echo $pecah_kata[$i]." ";
	}
}
?>
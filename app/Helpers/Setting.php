<?php

// pengambilan nama class dengan fungsi __class__
function hak_akses($class)
{
	$class 		= substr($class, 16);
	// hitung jumlah huruf variabel class lalu dikurangi dengan jumlah huruf controller
	$jumclass = strlen($class)-10;
	$class 		= substr($class, 0, $jumclass); // mengambil class utama dengan menghilangkan kata controller
	return strtolower($class);
}
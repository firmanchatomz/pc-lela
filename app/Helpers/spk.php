<?php

// rumus mb
function hitungmb($evi, $pro)
{
	$nilai_atas 	= max([$evi, $pro]) - $pro;
	$nilai_bawah 	= 1 - $pro;
	$hasil 				= round($nilai_atas / $nilai_bawah, 3);
	return $hasil;
}

// rumus md
function hitungmd($evi, $pro)
{
	$nilai_atas 	= min([$evi, $pro]) - $pro;
	$nilai_bawah 	= 0 - $pro;
	$hasil 				= round($nilai_atas / $nilai_bawah, 3);
	return $hasil;
}

// rumus Cf
function hitungcf($mb, $md) 
{
	$hasil 	= $mb - $md;
	return $hasil;
}

// data diagnosa pertanyaan
function pohondiagnosa()
{
	$data = [	'2-0' 	=> ['ya' => 5, 	'tidak' => 21],
						'5-2' 	=> ['ya' => 15, 'tidak' => 10],
						'21-2' 	=> ['ya' => 22, 'tidak' => 26],
						'15-5' 	=> ['ya' => 14, 'tidak' => 39],
						'10-5' 	=> ['ya' => 9, 	'tidak' => 33],
						'22-21' => ['ya' => 5, 	'tidak' => 'none'],
						'26-21'	=> ['ya' => 27,	'tidak' => 29],
						'14-15'	=> ['ya' => 16, 'tidak' => 'none'],
						'39-15'	=> ['ya' => 38, 'tidak' => 6],
						'9-10'	=> ['ya' => 11, 'tidak' => 'none'],
						'33-10'	=> ['ya' => 37, 'tidak' => 46],
						'5-22'	=> ['ya' => 18, 'tidak' => 'none'],
						'27-26'	=> ['ya' => 28, 'tidak' => 'none'],
						'29-26'	=> ['ya' => 30, 'tidak' => 41],
						'16-14'	=> ['ya' => 17, 'tidak' => 'none'],
						'38-39'	=> ['ya' => 40, 'tidak' => 'none'],
						'6-39'	=> ['ya' => 7,  'tidak' => 'none'],
						'11-9'	=> ['ya' => 12, 'tidak' => 'none'],
						'37-33'	=> ['ya' => 6,  'tidak' => 'none'],
						'46-33'	=> ['ya' => 45, 'tidak' => 1],
						'18-5'	=> ['ya' => 19, 'tidak' => 'none'],
						'28-27'	=> ['ya' => 'break'],
						'30-29'	=> ['ya' => 31, 'tidak' => 'none'],
						'41-29'	=> ['ya' => 42, 'tidak' => 17],
						'17-16'	=> ['ya' => 'break'],
						'40-38'	=> ['ya' => 'break'],
						'7-6' 	=> ['ya' => 8,  'tidak' => 'none'],
						'12-11' => ['ya' => 13, 'tidak' => 'none'],
						'6-37' 	=> ['ya' => 34, 'tidak' => 'none'],
						'45-46' => ['ya' => 47, 'tidak' => 'none'],
						'1-46' 	=> ['ya' => 3,  'tidak' => 62],
						'19-18' => ['ya' => 20, 'tidak' => 'none'],
						
						'31-30' => ['ya' => 32, 'tidak' => 'none'],
						'42-41' => ['ya' => 43, 'tidak' => 'none'],
						'17-41' => ['ya' => 23, 'tidak' => 5],
						
						
						'8-7' 	=> ['ya' => 'break'],
						'13-12' => ['ya' => 'break'],
						'34-6'  => ['ya' => 35, 'tidak' => 'none'],
						'47-45' => ['ya' => 48, 'tidak' => 'none'],
						'3-1'   => ['ya' => 4,  'tidak' => 'none'],
						'62-1'  => ['ya' => 63, 'tidak' => 'none'],
						'20-19' => ['ya' => 'break'],
						'32-31' => ['ya' => 'break'],
						'43-42' => ['ya' => 44, 'tidak' => 'none'],
						'23-17' => ['ya' => 24, 'tidak' => 'none'],
						'5-17'  => ['ya' => 6,  'tidak' => 11],
					
						
						
						
						'35-34' => ['ya' => 36, 'tidak' => 'none'],
						'48-47' => ['ya' => 'break'],
						'4-3'   => ['ya' => 'break'],
						'63-62' => ['ya' => 64, 'tidak' => 'none'],
						
						
						'44-43' => ['ya' => 'break'],
						'24-23' => ['ya' => 25, 'tidak' => 'none'],
						'6-5'   => ['ya' => 13, 'tidak' => 'none'],
						'11-5'  => ['ya' => 30, 'tidak' => 'none'],
						'36-35' => ['ya' => 'break'],
						
						
					
						'64-63' => ['ya' => 65, 'tidak' => 'none'],
						'65-64' => ['ya' => 66, 'tidak' => 'none'],
						'66-65' => ['ya' => 'break'],
						
						
						'25-24' => ['ya' => 'break'],
						'6-25'  => ['ya' => 'tidak'],
						'13-6'  => ['ya' => 33, 'tidak' => 'none'],
						'33-13' => ['ya' => 49, 'tidak' => 'none'],
						'49-33' => ['ya' => 50, 'tidak' => 'none'],
						'50-49' => ['ya' => 51, 'tidak' => 'none'],
						'51-50' => ['ya' => 52, 'tidak' => 'none'],
						'52-51' => ['ya' => 53, 'tidak' => 'none'],
						'53-52' => ['ya' => 54, 'tidak' => 'none'],
						'54-53' => ['ya' => 55, 'tidak' => 'none'],
						'55-54' => ['ya' => 'break'],
						
						'30-11' => ['ya' => 56, 'tidak' => 'none'],
						'56-30' => ['ya' => 57, 'tidak' => 'none'],
						'57-56' => ['ya' => 58, 'tidak' => 'none'],
						'58-57' => ['ya' => 59, 'tidak' => 'none'],
						'59-58' => ['ya' => 60, 'tidak' => 'none'],
						'60-59' => ['ya' => 61, 'tidak' => 'none'],
						'61-60' => ['ya' => 'break'],
					
						];
	return $data;
}

// diagnosa
function pertanyaandiagnosa($id_last, $id, $status)
{
	$pertanyaan = pohondiagnosa();
	$id 				= $id . '-' . $id_last;	// 5-2
	if (count($pertanyaan[$id]) == 2) {
		// 10
		return $pertanyaan[$id][$status];
	} else {
		return $pertanyaan[$id]['ya'];
	}
}


function akses($akses)
{
	if (isset($_SESSION[$akses])) {
		return TRUE;
	} else {
		return FALSE;
	}
	
}

function cekoption($nilai,$nilaidb)
{
	if ($nilai == $nilaidb) {
		echo 'selected';
	} else {
		echo '';
	}
	
}

function filterdouble($no,$data)
{
	if ($no == 1)
		return $data; 
}
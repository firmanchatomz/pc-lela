<?php
/**
 * This file is part of the Chatomz PHP Framework package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author         Lela Ria Lestari
 * @copyright      Copyright (c) Lela Ria lestari
 *
 * ---------------------------------------------------------------------------------------------------------------
 */

## zona waktu Asia/Jakarta
date_default_timezone_set('Asia/Jakarta');

## mengambil tanggal hari ini
function setdate() {
	return date('Y-m-d');
}

## mengambil jam hari ini
function settime() {
	return date('H:i:s');
}

## mengambil tanggal dan waktu hari ini
function setdatetime() {
	return date('Y-m-d H:i:s');
}

## menambah jam sesuai dengan keinginan
function added_time($time,$add) {
	$data 						= date_create($time);
	date_add($data, date_interval_create_from_date_string("$add hours"));
	return date_format($data, 'H:i:s');		
}

## menambah tanggal sesuai dengan keinginan
function added_date($tgl,$choose,$add) {
	return date('Y-m-d', strtotime("$add $choose", strtotime($tgl)));
}

## mengambil tanggal dalam format indonesia
function getdateindo() {
	$hari 		= hari_indo(date('N'));
	$tanggal	= date('d');
	$bulan 		= bulan_indo(date('m'));
	$tahun 		= date('Y');
	return $hari.', '.$tanggal.' '.$bulan.' '.$tahun;
}

## mengambil hari ini
function getday() {
	return date('d');
}

## mengambil bulan ini
function getmonth() {
	return date('m');
}

## mengambil tahun ini
function getyear() {
	return date('Y');
}

## mengambil hari ini
function getdayindo() {
	return hari_indo(date('N'));
}

## mengambil bulan ini
function getmonthindo() {
	return bulan_indo(date('m'));
}

# merubah id bulan menjadi bulan indo
function bulan_indo($m) {
	$bulan 		= [	'01' => 'Januari',
					'02' => 'Februari',
					'03' => 'Maret',
					'04' => 'April',
					'05' => 'Mei',
					'06' => 'Juni',
					'07' => 'Juli',
					'08' => 'Agustus',
					'09' => 'September',
					'10' => 'Oktober',
					'11' => 'November',
					'12' => 'Desember'];

	return $bulan[$m];
}

## merubah id hari menjadi hari indo
function hari_indo($N) {
	$hari 		= [ '1' => 'Senin',
					'2' => 'Selasa',
					'3' => 'Rabu',
					'4' => 'Kamis',
					'5' => 'Jum\'at',
					'6' => 'Sabtu',
					'7' => 'Minggu'];

	return $hari[$N];
}

## merubah format tanggal kedalam format tanggal indo
function date_indo($tgl) {
	$tanggal		= substr($tgl, 8,2);
	$bulan			= bulan_indo(substr($tgl, 5,2));
	$tahun			= substr($tgl, 0,4);

	return $tanggal.' '.$bulan.' '.$tahun;
}

## merubah format tanggal dan waktu kedalam format tanggal waktu indo
function datetime_indo($tgl,$br=null) {
	$tanggal		= substr($tgl, 8,2);
	$bulan			= bulan_indo(substr($tgl, 5,2));
	$tahun			= substr($tgl, 0,4);
	$waktu 			= substr($tgl, 11,8);
	if (!empty($br)) {
		$br = '<br>';
	}

	return $tanggal.' '.$bulan." ".$tahun." $br ".$waktu.' WIB';
}
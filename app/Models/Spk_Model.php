<?php
/**
 * This file is part of the Chatomz PHP Framework package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author         Lela Ria Lestari
 * @copyright      Copyright (c) Lela Ria Lestari
 */

// -------------------------------------------------------------------------------------------------

namespace app\Models;

use app\Core\ModelClass;

class Spk extends ModelClass
{

	// ####################################
	// Fungsi tambahan

	// menghitung jumlah gejala 
	public function hitunggejala($value='')
	{
		$this->_db->table('gejala');
		return $this->_db->jumdata();
	}

	// menghitung rumus prior
	public function rumushitungprior($jumgejala)
	{
		// rumus P = jumlah gejala penyakit yang muncul perkelas / jumlah penyakit keseluruhan
		$jumlahgejalakeseluruhan = self::hitunggejala();
		// untuk menghitung prior pakai perulangan / loop sesuai jumlah penyakit
		foreach ($jumgejala as $id_penyakit => $jumlahgejala) {
			// rumus prior
			$p[$id_penyakit]	= round($jumlahgejala/$jumlahgejalakeseluruhan,3);
		}
		return $p;
	}

	// menghitung rumus likelihood
	public function rumushitunglikelihood($penyakit,$gejala)
	{
		// rumus L = jumlah gejala yang muncul pada diagnosa sesuai penyakit / jumlah seluruh gejala pada suatu penyakit
		foreach ($penyakit as $id_penyakit => $jumgejaladiagnosa) {
			$jumlahgejalapenyakit = $gejala[$id_penyakit]; // ambil nilai jumlah gejala keseluruhan
			$l[$id_penyakit]			= round($jumgejaladiagnosa/$jumlahgejalapenyakit,3); 
		}

		return $l;
	}

	// menghitung rumus posterior
	public function rumushitungposterior($p,$l)
	{
		// rumus Pos = Prior x Likelihood
		foreach ($p as $id_penyakit => $nilai_p) {
			$nilai_l 	= $l[$id_penyakit]; // ambil nilai likelihood
			$pos[$id_penyakit]		= round($nilai_p*$nilai_l,3);
		}
		return $pos;
	}

	public function rumuscfgabungan($cf)
	{		
		$cfgabungan 	= $cf[0];
		for ($i=0; $i < count($cf)-1; $i++) {
			$cf2 				= $i+1; 
			$cfgabungan = ($cf[$cf2]*(1-$cf[$i]));
			$result[] 	= $cfgabungan; 
		}
		$cfgabungan 	= array_sum($result);
		$cfgabungan 	= round($cfgabungan,1);
		return $cfgabungan;
	}


	// #####################################
	// 1. menghitung prior
	// rumus P = jumlah gejala penyakit yang muncul perkelas / jumlah penyakit keseluruhan
	public function naiveBayes($id_diagnosa)
	{
		################
		// hitung prior
		// 1. cek id gejala termasuk ke penyakit apa
		$this->_db->table('detail_diagnosa'); // mendefinisikan tabel
		$this->_db->where("id_diagnosa='$id_diagnosa'"); // menampilkan berdasarkan id diagnosa
		$detaildiagnosa = $this->_db->fetch('obj');

		$limit = 0;
		foreach ($detaildiagnosa as $row) { // data di loop untuk mengambil id diagnosa
			// mendapatkan id gejala dari tabel detail diagnosa
			if ($limit != count($detaildiagnosa)) {
				$id_gejala 	= $row->id_gejala;

				// untuk mendapatkan id gejala termasuk ke penyakit apa. cek dengan kondisi
				$this->_db->table('pengetahuan'); // mendefinisikan tabel detail
				$this->_db->where("id_gejala='$id_gejala'"); // menampilkan berdasarkan id gejala
				$pengetahuan = $this->_db->fetch('obj');
				foreach ($pengetahuan as $row) {
					$id_penyakit[] = $row->id_penyakit; // id penyakit dalam array
				}

				// ambil id penyakit dari gejala tertentu simpan kedalam array
				}
			$limit++;
		}

		// id penyakit menghasilkan data yang duplikasi
		// menghilangkan nilai id penyakit yang sama

		$id_penyakit 	= array_count_values($id_penyakit);

		// ------------------------------------------------------------
		// 2. penyakit yang diidentifikasi, dihitung jumlah gejalanya dibagi jumlah seluruh gejala (masing* penyakit dihitung)

		foreach ($id_penyakit as $key => $id) {
			// hitung jumlah gejala pada penyakit
			$this->_db->table('pengetahuan');
			$this->_db->where("id_penyakit='$key'");
			$jumgejala[$key] = $this->_db->jumdata();
		}

		// panggil rumus hitung prior

		$hitungprior 		= self::rumushitungprior($jumgejala); // NILAI P



		################

		################
		// hitung likelihood
		// 1. mengambil jumlah gejala yang muncul pada detail diagnosa suatu penyakit dibagi dengan jumlah keseluruhan gejala dalam penyakit 

		$hitunglikelihood = self::rumushitunglikelihood($id_penyakit, $jumgejala); // NILAI L


		################
		// hitung posterior
		// 1. menghitung poseterior dengan mengalikan hasil P dan L sesuai penyakit
		$hitungposterior = self::rumushitungposterior($hitungprior,$hitunglikelihood);

		// 2. mengambil nilai tertinggi

		$nilaimaxposterior = max($hitungposterior);
		#################

		$result = [array_search($nilaimaxposterior, $hitungposterior), $nilaimaxposterior]; 

		
		
		// print_r($result);

		// hasil akhir dari rumus naiva bayes dan cf
		$cf 													= self::CF($id_diagnosa,$result);
		$cftotal 											= $cf[0]; // hasil naive bayes
		$id_penyakit_identifikasi 		= $result[0]; // hasil cf
		$id_gejala 										= $cf[1];


		$naiveBayesCF = [$id_penyakit_identifikasi, $nilaimaxposterior, $id_gejala, $cftotal];

		// update data diagnosa
		$d['id_penyakit'] 	= $id_penyakit_identifikasi;
		$d['posterior']			= $nilaimaxposterior;
		$d['cftotal']				= $cftotal;
		$this->_db->table('diagnosa');
		$this->_db->update($d,$id_diagnosa);

		// tambah data ke hasil diagnosa untuk menyimpan gejala yang diderita
		for ($i=0; $i < count($id_gejala); $i++) { 
			$dd['id_diagnosa']		= $id_diagnosa;
			$dd['id_gejala']			= $id_gejala[$i];

		$this->_db->table('hasil_diagnosa');
		$this->_db->insert($dd);
		}

		return TRUE;
	}

	// CF
	public function CF($id_diagnosa,$result)
	{
		$id_penyakit = $result[0];
		#######################
		// 1. ambil nilai cf dari setiap gejala sesuai dengan penyakit
		$this->_db->table('detail_diagnosa'); // mendefinisikan tabel
		$this->_db->where("id_diagnosa='$id_diagnosa'"); // menampilkan berdasarkan id diagnosa
		$detaildiagnosa = $this->_db->fetch('obj');
		$limit = 0;
		foreach ($detaildiagnosa as $row) {
			if ($limit != count($detaildiagnosa)) {
				$id_gejala[$row->id_gejala]	= $row->id_gejala;
			}
			$limit++;
		}
		// print_r($id_gejala);
		// ambil cf sesuai idgejala
		$this->_db->table('pengetahuan'); // mendefinisikan tabel
		$this->_db->where("id_penyakit='$id_penyakit'"); // menampilkan berdasarkan id diagnosa
		$pengetahuan = $this->_db->fetch('obj');
		foreach ($pengetahuan as $row) {

			if (array_search($row->id_gejala, $id_gejala)) {
				$cf[]									= $row->nilai_cf; // nilai cf
				$id_gejala_diagnosa[]	= $row->id_gejala;
			}
		}
		// nilai cf
		// hitung cf gabungan
		return [self::rumuscfgabungan($cf),$id_gejala_diagnosa];
	}

}
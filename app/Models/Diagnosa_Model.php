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

class Diagnosa extends ModelClass
{
	// format default class

	public function tambahdiagnosa($id_kelinci)
	{
		$d['id_kelinci']		= $id_kelinci;
		$d['id_user']				= $_SESSION['user'];
		$d['tgl_diagnosa']	= setdate();
		$this->_db->table('diagnosa');
		return $this->_db->insert($d);
	}

	public function tambahdiagnosapakar($value='')
	{
		// tambah user
		$d['nama_depan']		= $this->filter_input($_POST['nama_depan']);
		$d['nama_belakang']	= $this->filter_input($_POST['nama_belakang']);
		$d['alamat']				= $this->filter_input($_POST['alamat']);
		$d['no_hp']					= $this->filter_input($_POST['no_hp']);

		$this->_db->table('user');
		$this->_db->insert($d);

		$this->_db->table('user');
		$this->_db->opsi(" order by id_user DESC");
		$user = $this->_db->fetch('id');

		$d1['id_user']			= $user->id_user;
		$d1['id_ras']				= $this->filter_input($_POST['id_ras']);
		$d1['nama_kelinci']	= $this->filter_input($_POST['nama_kelinci']);
		$d1['berat_badan']	= $this->filter_input($_POST['berat_badan']);
		$d1['jk']						= $this->filter_input($_POST['jk']);
		$d1['umur']					= $this->filter_input($_POST['umur']);
		$d1['warna']				= $this->filter_input($_POST['warna']);

		$this->_db->table('kelinci');
		$this->_db->insert($d1);

		$this->_db->table('kelinci');
		$this->_db->opsi(" order by id_kelinci DESC");
		$kelinci = $this->_db->fetch('id');

		$d2['id_kelinci']		= $kelinci->id_kelinci;
		$d2['id_user']				= $user->id_user;
		$d2['tgl_diagnosa']	= setdate();
		$this->_db->table('diagnosa');
		return $this->_db->insert($d2);

	}

	public function listdiagnosasetdesc()
	{
		$this->_db->table('diagnosa');
		$this->_db->opsi(' order by id_diagnosa desc limit 1');
		$diagnosa = $this->_db->fetch('id');
		return $diagnosa->id_diagnosa;
	}

	public function listdiagnosaid($id_diagnosa)
	{
		$this->_db->table('diagnosa','');
		return $this->_db->fetchid($id_diagnosa);
	}

	public function listdiagnosajoinpenyakit($id_diagnosa)
	{
		$this->_db->table('diagnosa','penyakit');
		$this->_db->where("id_diagnosa='$id_diagnosa'");
		return $this->_db->fetchjoin(null, 'id');
	}

	public function cftotal($id_diagnosa)
	{
		$this->_db->table('diagnosa','penyakit');
		$this->_db->where("id_diagnosa='$id_diagnosa'");
		$data = $this->_db->fetchjoin(null, 'id');
		if ($data) {
			// ambil nilai kepastian
			$this->_db->table('detail_diagnosa');
			$this->_db->where("id_diagnosa='$id_diagnosa'");
			$dd = $this->_db->fetch();

			$id_penyakit = $data->id_penyakit;
			$total_cf 					= 0;
			foreach ($dd as $row){
				$nilaicftotal = null;
				$nilai_kepercayaan = $row['nilai_kepercayaan'];
				$id_gejala 	= $row['id_gejala'];
				// nilai cf
				// cf sementara
				$this->_db->table('pengetahuan');
				$this->_db->where("id_gejala='$id_gejala' AND id_penyakit='$id_penyakit'");
				$dcf 	= $this->_db->fetch('id');
				if ($dcf) {
					$nilai_df	= $dcf->nilai_cf;
					$nilaicftotal = $nilai_kepercayaan*$nilai_df;
				}
				$rnilaicftotal[] = $nilaicftotal;  
			}

			$cfgabungan = self::rumuscfgabungan($rnilaicftotal);
			return $cfgabungan * 100;
		} else {
			return NULL;
		}
	}

	public function listdiagnosa($value='')
	{
		$this->_db->table('diagnosa');
		return $this->_db->fetch();
	}

	public function prosespertanyaan($id_diagnosa)
	{
		if (!isset($_SESSION['id_last'])) {
			$_SESSION['id_last'] = 0;
		}

		$id_gejala 			= $_POST['id_gejala'];
		$status 				= $_POST['status'];
		$nilai_kepercayaan = $_POST['nilai_kepercayaan'];
		// action pertanyaan selanjutnya
		$diagnosa 			= pertanyaandiagnosa($_SESSION['id_last'], $id_gejala, $status);
		if ($status == 'ya') {
			if (is_integer($diagnosa) || $diagnosa == 'break') {
				// simpan ke diagnosa
				$d['id_diagnosa']		= $id_diagnosa;
				$d['id_gejala']			= $id_gejala;
				$d['nilai_kepercayaan']	= $nilai_kepercayaan;

				$this->_db->table('detail_diagnosa');
				$this->_db->insert($d);
			}
		}
		$_SESSION['id_last'] = $id_gejala;

		return $diagnosa;
	}

	public function listdiagnosasetsession($value='')
	{
		$id_user 	= $_SESSION['user'];
		$this->_db->table('diagnosa','user');
		$this->_db->where("id_user='$id_user'");
		$data = $this->_db->fetchjoin();
		if ($data) {
			# code...
		foreach ($data as $row) {
			$id_kelinci 	= $row['id_kelinci'];
			$this->_db->table('kelinci');
			$k = $this->_db->fetchid($id_kelinci);
			$d['nama_kelinci'] 	= $k->nama_kelinci;
			$d['tgl_diagnosa']	= $row['tgl_diagnosa'];
			$d['id_diagnosa']		= $row['id_diagnosa'];

			$result[] 	= $d;
			$d = null;
		}
		return $result;
		} else {
			return NULL;
		}
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

	public function hapusdiagnosaid($id_diagnosa)
	{
		$this->_db->table('diagnosa');
		return $this->_db->delete($id_diagnosa);
		# code...
	}

	public function listdiagnosajoinuser($value='')
	{
		$this->_db->table('diagnosa','user');
		return $this->_db->fetchjoin();
	}
}
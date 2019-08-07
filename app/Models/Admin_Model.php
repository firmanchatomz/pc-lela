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

class Admin extends ModelClass
{
	// format default class
	public function listadminsetpakarid()
	{
		$id_admin 		= $_SESSION['pakar'];
		$this->_db->table('admin');
		return $this->_db->fetchid($id_admin);
	}

	public function listadmin($value='')
	{
		$this->_db->table('admin');
		$admin = $this->_db->fetch();
		foreach ($admin as $row) {
			$d['id']		= $row['id_admin'];
			$d['nama']	=	$row['nama'];
			$d['jk']		= $row['jk'];
			$d['level']	= $row['level'];

			$result[]		= $d;
			$d 					= null; 
		}

		$this->_db->table('user');
		$admin = $this->_db->fetch();
		if ($admin) {
			foreach ($admin as $row) {
				$d['id']		= $row['id_user'];
				$d['nama']	=	$row['nama_depan'] . ' ' .$row['nama_belakang'];
				$d['jk']		= $row['jk'];
				$d['level']	= 'pengguna';

				$result[]		= $d;
				$d 					= null; 
			}
		}

		return $result;
	}

		// format default class
	public function listadminsetadminid()
	{
		$id_admin 		= $_SESSION['admin'];
		$this->_db->table('admin');
		return $this->_db->fetchid($id_admin);
	}

	public function dashboard($value='')
	{
		$this->_db->table('user');
		$jumuser = $this->_db->jumdata();

		$this->_db->table('pengetahuan');
		$jumpengetahuan = $this->_db->jumdata();

		$this->_db->table('gejala');
		$jumgejala = $this->_db->jumdata();

		$this->_db->table('penyakit');
		$jumpenyakit = $this->_db->jumdata();

		$this->_db->table('diagnosa');
		$jumdiagnosa = $this->_db->jumdata();


		// data gejala yang sering dialami
		$jumlah_d 	= null;
		$label_d		= null;
		$this->_db->table('gejala');
		$gejala = $this->_db->fetch();
		foreach ($gejala as $row) {
			$id_gejala = $row['id_gejala'];
			$this->_db->table('hasil_diagnosa');
			$this->_db->where("id_gejala = '$id_gejala'");
			$jum 			= $this->_db->jumdata();
			if ($jum > 0) {
				$jumlah_d .= $jum.',';
				$label_d .= "'".$row['nama_gejala']."',";
			}
		}

		// data penyakit yang sering dialami
		$jumlah_p 	= null;
		$label_p		= null;
		$this->_db->table('penyakit');
		$penyakit = $this->_db->fetch();
		foreach ($penyakit as $row) {
			$id_penyakit = $row['id_penyakit'];
			$this->_db->table('diagnosa');
			$this->_db->where("id_penyakit = '$id_penyakit'");
			$jum 			= $this->_db->jumdata();
			if ($jum > 0) {
				$jumlah_p .= $jum.',';
				$label_p .= "'".$row['nama_penyakit']."',";
			}
		}

				// data penyakit yang sering dialami
		$jumlah_da 	= null;
		$label_da		= null;

		for ($i=1; $i <= 12; $i++) {
			if ($i < 10)
		 		$bln = '0'.$i;
		 	else
		 		$bln = $i;
		  
			$filter = getyear().'-'.$bln.'-';
			$this->_db->table('diagnosa');
			$this->_db->where("tgl_diagnosa LIKE '$filter%'");

			$jum 			= $this->_db->jumdata();
			$label_da .= "'".bulan_indo($bln)."',";
			$jumlah_da .= $jum.',';
		}

		$d['jumuser']					= $jumuser;
		$d['jumpengetahuan']	= $jumpengetahuan;
		$d['jumpenyakit']			= $jumpenyakit;
		$d['jumgejala']				= $jumgejala;
		$d['chart_d']					= [rtrim($label_d,','),rtrim($jumlah_d,',')];
		$d['chart_p']					= [rtrim($label_p,','),rtrim($jumlah_p,',')];
		$d['chart_da']				= [rtrim($label_da,','),rtrim($jumlah_da,',')];


		return $d;
		
	}

	public function hapususer($role, $id)
	{
		if ($role == 'pengguna') {
			$this->_db->table('user');
			return $this->_db->delete($id);
		} else {
			$this->_db->table('admin');
			return $this->_db->delete($id);
		}
	}

	public function hasil($hasil)
	{
		$id_penyakit = $hasil[0];
		$this->_db->table('pengetahuan');
		$this->_db->where("id_penyakit='$id_penyakit'");
		$pengetahuan = $this->_db->fetch('obj');

		foreach ($pengetahuan as $row) {
			$id_gejala 	= $row->id_gejala;
			$this->_db->table('penyakit');
			$penyakit = $this->_db->fetchid($id_penyakit);
			$d['nama_penyakit']		= $penyakit->nama_penyakit;
			$this->_db->table('gejala');
			$gejala = $this->_db->fetchid($id_gejala);
			$d['nama_gejala']			= $gejala->nama_gejala;
			$d['posterior']				= $hasil[1];
			$d['cf']							= $hasil[3];
			$result[]							= $d;
			$d 										= null;
		}
		return $result;
	}
}
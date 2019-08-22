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

class Obat extends ModelClass
{
	// format default class
	public function listobat($value='')
	{
		$this->_db->table('obat');
		return $this->_db->fetch();
	}

	public function listobatid($id_obat)
	{
		$this->_db->table('obat');
		return $this->_db->fetchid($id_obat);
	}

	public function hapusobatid($id_obat)
	{
		$this->_db->table('obat');
		return $this->_db->delete($id_obat);
	}

	public function listobatcustom($value='')
	{
		$this->_db->table('obat','penyakit');
		$data = $this->_db->fetchjoin();
		if ($data) {
			# code...
		
		foreach ($data as $row) {
			// gejala
			$this->_db->table('gejala');
			$gejala = $this->_db->fetchid($row['id_gejala']);

			$d['id_obat']		= $row['id_obat'];
			$d['nama_penyakit']		=	$row['nama_penyakit'];
			$d['nama_gejala']		= $gejala->nama_gejala;
			$d['nama_obat']		= $row['nama_obat'];
			$d['batas_umur']		= $row['batas_umur'];
			$d['aturan']		= $row['aturan'];
			$d['tindakan']		= $row['tindakan'];

			$result[] = $d;
			$d = null;
		}

		return $result;
		} else {
			return null;
		}
	}

	public function tambahobat($value='')
	{
		$d['id_penyakit']	= $_POST['id_penyakit'];
		$d['id_gejala']	= $_POST['id_gejala'];
		$d['nama_obat']	= $_POST['nama_obat'];
		$d['batas_umur']	= $_POST['batas_umur'];
		$d['aturan']	= $this->filter_input($_POST['aturan']);
		$d['tindakan']	= $this->filter_input($_POST['tindakan']);
		$this->_db->table('obat');
		return $this->_db->insert($d);
	}

	public function ubahobatid($id_obat)
	{
		$d['id_penyakit']	= $_POST['id_penyakit'];
		$d['id_gejala']	= $_POST['id_gejala'];
		$d['nama_obat']	= $_POST['nama_obat'];
		$d['batas_umur']	= $_POST['batas_umur'];
		$d['aturan']	= $this->filter_input($_POST['aturan']);
		$d['tindakan']	= $this->filter_input($_POST['tindakan']);
		$this->_db->table('obat');
		return $this->_db->update($d,$id_obat);
	}

	public function listobatjoinhasil($id_diagnosa)
	{
		$this->_db->table('diagnosa');
		$diagnosa = $this->_db->fetchid($id_diagnosa);

			$id_penyakit 	= $diagnosa->id_penyakit;
			$this->_db->table('obat');
			$this->_db->where("id_penyakit='$id_penyakit'");
			$obat = $this->_db->fetch('id');
			if ($obat) {
				$this->_db->table('penyakit');
				$this->_db->where("id_penyakit='$id_penyakit'");
				$penyakit = $this->_db->fetch('id');
						$this->_db->table('pencegahan');
				$this->_db->where("id_penyakit='$id_penyakit'");
				$pencegahan = $this->_db->fetch('id');
				$nama_pencegahan = '';
				if ($pencegahan) {
					$nama_pencegahan = $pencegahan->nama_pencegahan;
				}
					$d['nama_penyakit']		= $penyakit->nama_penyakit;
					$d['nama_obat']			= $obat->nama_obat;
					$d['aturan']			= $obat->aturan;
					$d['pencegahan']		= $nama_pencegahan;
				return $d;
			} else {
				return null;
			}
	}
}
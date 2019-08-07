<?php
/**
 * This file is part of the Chatomz PHP Framework package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author         lela Ria Lestari
 * @copyright      Copyright (c) Lela Ria Lestaris
 */

// -------------------------------------------------------------------------------------------------

namespace app\Models;

use app\Core\ModelClass;

class Kelinci extends ModelClass
{
	// format default class

	public function listkelinci()
	{
		$this->_db->table('kelinci');
		return $this->_db->fetch();
	}

	public function tambahkelinci($value='')
	{
		$d['id_user']				= $this->filter_input($_POST['id_user']);
		$d['id_ras']				= $this->filter_input($_POST['id_ras']);
		$d['nama_kelinci']	= $this->filter_input($_POST['nama_kelinci']);
		$d['berat_badan']		= $this->filter_input($_POST['berat_badan']);
		$d['jk']						= $this->filter_input($_POST['jk']);
		$d['umur']					= $this->filter_input($_POST['umur']);
		$d['warna']					= $this->filter_input($_POST['warna']);

		$this->_db->table('kelinci');
		return $this->_db->insert($d);
	}

	public function listkelincicustom()
	{
		$this->_db->table('kelinci');
		$data = $this->_db->fetch();
		foreach ($data as $row) {
			
			// pemilik
			$this->_db->table('user');
			$user = $this->_db->fetchid($row['id_user']);

			// ras
			$this->_db->table('ras');
			$ras = $this->_db->fetchid($row['id_ras']);

			$d['id_kelinci'] 		= $row['id_kelinci'];
			$d['nama_kelinci']	= $row['nama_kelinci'];
			$d['nama_pemilik']	= $user->nama_depan . ' '. $user->nama_belakang;
			$d['jk']						= $row['jk'];
			$d['ras']						= $ras->nama_ras;
			$d['umur']					= $row['umur'];
			$d['berat_badan']		= $row['berat_badan'];
			$d['warna']					= $row['warna'];
			
			$result[]						= $d;
			$d 									= null;
		}
		return $result;
	}

	public function listkelincisetdesc()
	{
		$this->_db->table('kelinci');
		$this->_db->opsi(' order by id_kelinci desc limit 1');
		$kelinci = $this->_db->fetch('id');
		return $kelinci->id_kelinci;
	}

	public function listkelinciid($id_kelinci)
	{
		$this->_db->table('kelinci');
		return $this->_db->fetchid($id_kelinci);
	}

	public function hapuskelinci($id_kelinci)
	{
		$this->_db->table('kelinci');
		return $this->_db->delete($id_kelinci);
	}
}
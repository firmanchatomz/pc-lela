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

class Gejala extends ModelClass
{
	// format default class
	public function listgejala($value='')
	{
		$this->_db->table('gejala');
		return $this->_db->fetch();
	}

	public function listgejalaid($id_gejala)
	{
		$this->_db->table('gejala');
		return $this->_db->fetchid($id_gejala);
	}

	public function tambahgejala($value='')
	{
		$d['nama_gejala']	= $this->filter_input($_POST['nama_gejala']);
		$d['pertanyaan']	= $this->filter_input($_POST['pertanyaan']);
		$d['evidence']		= $_POST['evidence'];
		$this->_db->table('gejala');
		return $this->_db->insert($d);

	}
	public function ubahgejala($id_gejala)
	{
		$d['nama_gejala']	= $this->filter_input($_POST['nama_gejala']);
		$d['pertanyaan']	= $this->filter_input($_POST['pertanyaan']);
		$d['evidence']		= $_POST['evidence'];
		$this->_db->table('gejala');
		return $this->_db->update($d,$id_gejala);
	}

	public function hapusgejalaid($id_gejala)
	{
		$this->_db->table('gejala');
		return $this->_db->delete($id_gejala);
	}
}
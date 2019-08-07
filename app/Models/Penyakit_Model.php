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

class Penyakit extends ModelClass
{
	// format default class

	public function listpenyakit($value='')
	{
		$this->_db->table('penyakit');
		return $this->_db->fetch();
	}

	public function listpenyakitid($id_penyakit)
	{
		$this->_db->table('penyakit');
		return $this->_db->fetchid($id_penyakit);
	}

	public function tambahpenyakit($value='')
	{
		$d['nama_penyakit']		= $this->filter_input($_POST['nama_penyakit']);
		$this->_db->table('penyakit');
		return $this->_db->insert($d);
	}

	public function ubahpenyakit($id_penyakit)
	{
		$d['nama_penyakit']		= $this->filter_input($_POST['nama_penyakit']);
		$this->_db->table('penyakit');
		return $this->_db->update($d,$id_penyakit);
	}

	public function hapuspenyakitid($id_penyakit)
	{
		$this->_db->table('penyakit');
		return $this->_db->delete($id_penyakit);
	}


}
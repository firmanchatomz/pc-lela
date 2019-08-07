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

class Ras extends ModelClass
{
	// format default class
	public function listras($value='')
	{
		$this->_db->table('ras');
		return $this->_db->fetch();
	}

	public function listrasid($id_ras)
	{
		$this->_db->table('ras');
		return $this->_db->fetchid($id_ras);
	}

	public function tambahras($value='')
	{
		$d['nama_ras']	= $this->filter_input($_POST['nama_ras']);
		$this->_db->table('ras');
		return $this->_db->insert($d);

	}

	public function ubahras($id_ras)
	{
		$d['nama_ras']		= $this->filter_input($_POST['nama_ras']);
		$this->_db->table('ras');
		return $this->_db->update($d,$id_ras);
	}

	public function hapusrasid($id_ras)
	{
		$this->_db->table('ras');
		return $this->_db->delete($id_ras);
	}

}
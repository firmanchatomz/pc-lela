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

class Hasil extends ModelClass
{
	// format default class
	public function listhasilsetiddiagnosa($id_diagnosa)
	{
		$this->_db->table('hasil_diagnosa');
		$this->_db->where("id_diagnosa ='$id_diagnosa'");
		return $this->_db->fetch('id');
	}

	public function listhasilsetiddiagnosajoingejala($id_diagnosa)
	{
		$this->_db->table('hasil_diagnosa','gejala');
		$this->_db->where("id_diagnosa ='$id_diagnosa'");
		return $this->_db->fetchjoin(null,'obj');
	}
}
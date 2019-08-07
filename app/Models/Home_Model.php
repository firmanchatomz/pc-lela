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

class Home extends ModelClass
{
	public function cekloginadmin()
	{
		$this->settable('admin');
		return $this->proseslog(); // kode untuk mengecek login admin
	}

	public function cekloginuser($value='')
	{
		$this->settable('user');
		return $this->proseslog();
	}
}
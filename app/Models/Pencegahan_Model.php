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

class Pencegahan extends ModelClass
{
	// format default class
	public function listpencegahan($value='')
	{
		$this->_db->table('pencegahan');
		return $this->_db->fetch();
	}

	public function listpencegahanid($id_pencegahan)
	{
		$this->_db->table('pencegahan');
		return $this->_db->fetchid($id_pencegahan);
	}

	public function tambahpencegahan($value='')
	{
		$d['id_penyakit']	= $_POST['id_penyakit'];
		$d['id_gejala']	= $_POST['id_gejala'];
		$d['nama_pencegahan']	= $this->filter_input($_POST['nama_pencegahan']);
		$this->_db->table('pencegahan');
		return $this->_db->insert($d);
	}

	public function ubahpencegahanid($id_pencegahan)
	{
		$d['id_penyakit']	= $_POST['id_penyakit'];
		$d['id_gejala']	= $_POST['id_gejala'];
		$d['nama_pencegahan']	= $this->filter_input($_POST['nama_pencegahan']);
		$this->_db->table('pencegahan');
		return $this->_db->update($d,$id_pencegahan);
	}

	public function listpencegahancustom($value='')
	{
		$this->_db->table('pencegahan','penyakit');
		$data = $this->_db->fetchjoin();

		if ($data) {
			foreach ($data as $row) {

				$this->_db->table('gejala');
				$gejala = $this->_db->fetchid($row['id_gejala']);

				$d['id_pencegahan']		= $row['id_pencegahan'];
				$d['nama_penyakit']		=	$row['nama_penyakit'];
				$d['nama_gejala']		= $gejala->nama_gejala;
				$d['nama_pencegahan']		= $row['nama_pencegahan'];

				$result[] = $d;
			}
			return $result;
		} else {
			return null;
		}
		
	}

	public function hapuspencegahanid($id_pencegahan)
	{
		$this->_db->table('pencegahan');
		return $this->_db->delete($id_pencegahan);
	}
}
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

class Pengetahuan extends ModelClass
{
	// format default class

	public function listpengetahuan($value='')
	{
		$this->_db->table('pengetahuan');
		return $this->_db->fetch();
	}

	public function listpengetahuanid($id)
	{
		$this->_db->table('pengetahuan');
		return $this->_db->fetchid($id);
	}

	public function listpengetahuancustom($value='')
	{
		$this->_db->table('pengetahuan','penyakit');
		$data = $this->_db->fetchjoin();

		if ($data) {
			foreach ($data as $row) {

				$this->_db->table('gejala');
				$gejala = $this->_db->fetchid($row['id_gejala']);

				$d['id_pengetahuan']		= $row['id_pengetahuan'];
				$d['nama_penyakit']		=	$row['nama_penyakit'];
				$d['nama_gejala']		= $gejala->nama_gejala;
				$d['probabilitas']		= $row['probabilitas'];
				$d['nilai_mb']		= $row['nilai_mb'];
				$d['nilai_md']		= $row['nilai_md'];
				$d['nilai_cf']		= $row['nilai_cf'];

				$result[] = $d;
			}
			return $result;
		} else {
			return null;
		}
		
	}

	public function tambahpengetahuan($value='')
	{
		$id_penyakit 			= $_POST['id_penyakit'];
		$id_gejala 				= $_POST['id_gejala'];

		$penyakit 				= $this->getmodel('penyakit')->listpenyakitid($id_penyakit);
		$gejala 				= $this->getmodel('gejala')->listgejalaid($id_gejala);

		$probabilitas 		= $_POST['probabilitas'];
		$evidence 				= $gejala->evidence;

		$mb 							= hitungmb($evidence, $probabilitas);
		$md 							= hitungmd($evidence, $probabilitas);
		$d['id_penyakit']	= $id_penyakit;
		$d['id_gejala']		= $id_gejala;
		$d['probabilitas']=	$probabilitas;
		$d['nilai_mb']		=	$mb;
		$d['nilai_md']		= $md;
		$d['nilai_cf']		= hitungcf($mb, $md);
		$this->_db->table('pengetahuan');
		return $this->_db->insert($d);
	}

	public function hapuspengetahuanid($id_pengetahuan)
	{
		$this->_db->table('pengetahuan');
		return $this->_db->delete($id_pengetahuan);
	}

	public function ubahpengetahuanid($id_pengetahuan)
	{
		$id_penyakit 			= $_POST['id_penyakit'];
		$id_gejala 				= $_POST['id_gejala'];

		$penyakit 				= $this->getmodel('penyakit')->listpenyakitid($id_penyakit);
		$gejala 				= $this->getmodel('gejala')->listgejalaid($id_gejala);

		$probabilitas 		= $_POST['probabilitas'];
		$evidence 				= $gejala->evidence;

		$mb 							= hitungmb($evidence, $probabilitas);
		$md 							= hitungmd($evidence, $probabilitas);
		$d['id_penyakit']	= $id_penyakit;
		$d['id_gejala']		= $id_gejala;
		$d['probabilitas']=	$probabilitas;
		$d['nilai_mb']		=	$mb;
		$d['nilai_md']		= $md;
		$d['nilai_cf']		= hitungcf($mb, $md);
		$this->_db->table('pengetahuan');
		return $this->_db->update($d,$id_pengetahuan);
	}
}
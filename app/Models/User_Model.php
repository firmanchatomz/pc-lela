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

class User extends ModelClass
{
	// format default class

	public function listuser($value='')
	{
		$this->_db->table('user');
		return $this->_db->fetch();
	}

	public function listuserid($id)
	{
		$this->_db->table('user');
		return $this->_db->fetchid($id);
	}

	public function listusersetsession($value='')
	{
		$id_user = $_SESSION['user'];
		$this->_db->table('user');
		return $this->_db->fetchid($id_user);
	}

	public function tambahuser($value='')
	{
		$namafile 	= $_FILES['poto']['name'];
		$lokasifile = $_FILES['poto']['tmp_name'];
		$sizefile 	= $_FILES['poto']['size'];
		$typefile 	= $_FILES['poto']['type'];

		// mengecek ukuran file dibawah 1mb
		if ($sizefile < 1000000) {
			//  mengecek type file
			if ($typefile == 'image/jpg' || $typefile == 'image/png' || $typefile == 'image/jpeg') {
				
				// kode untuk menyimpan file ke table user
				$d['nama_depan']		= $this->filter_input($_POST['nama_depan']);
				$d['nama_belakang']	= $this->filter_input($_POST['nama_belakang']);
				$d['jk']						= $_POST['jk'];
				$d['alamat']				= $this->filter_input($_POST['alamat']);
				$d['no_hp']					= $this->filter_input($_POST['no_hp']);
				$d['email']					= $this->filter_input($_POST['email']);
				$d['username']					= $this->filter_input($_POST['username']);
				$d['password']			= password_hash($_POST['password'], PASSWORD_DEFAULT);
				$d['poto']					= $namafile;
				move_uploaded_file($lokasifile, 'assets/img/user/' . $namafile);
				$this->_db->table('user');
				$this->_db->insert($d);
				$notif = 'berhasil';
			}else{
				$notif = 'type';
			}
			
		} else {
			$nofif = 'size';
		}

		return $notif;
		
	}

	public function dashboard($value='')
	{
		$id_user 	= $_SESSION['user'];

		$filter_date = getyear() . '-'. getmonth().'-';
		$this->_db->table('diagnosa');
		$this->_db->where("id_user = '$id_user'");
		$jumdiagnosa = $this->_db->jumdata();

		$this->_db->table('diagnosa');
		$this->_db->where("tgl_diagnosa LIKE '$filter_date%'");
		$jumdiagnosabulan = $this->_db->jumdata();

		$this->_db->table('gejala');
		$jumgejala = $this->_db->jumdata();

		$this->_db->table('penyakit');
		$jumpenyakit = $this->_db->jumdata();

		$d['jumdiagnosa']			= $jumdiagnosa;
		$d['jumdiagnosabulan']			= $jumdiagnosabulan;

		return $d;
		
	}
}
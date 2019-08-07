<?php
/**
 * This file is part of the Chatomz PHP Framework package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author         Lela Ria Lestari
 * @copyright      Copyright (c) Lela Ria Lestari
 *
 * ---------------------------------------------------------------------------------------------------------------
 */

namespace app\Controllers; // package untuk class HomeController

use app\Core\Controller; // alias namespace

// Controller class system
class AdminController extends Controller
{
	// method default
	function __construct()
	{
		$this->setsession('admin');
		$this->session_null('home/login/admin');
		$data['akses']	= hak_akses(__class__);
		$data['admin']	= $this->model('admin')->listadminsetadminid(); 
		$this->setdata($data);
	}
	// all class use methos index for method default
	public function index()
	{
		$data['jumlah']		= $this->model('admin')->dashboard();			
		$this->adminpage('admin/beranda_admin',$data);
	}

	// halaman daftar kelinci
	public function daftarkelinci($value='')
	{
		$data['data']	= $this->model('kelinci')->listkelincicustom();
		$this->adminpage('admin/daftar_kelinci',$data);
	}

	// halaman daftar pengguna
	public function daftarpengguna($value='')
	{
		$data['data']	= $this->model('admin')->listadmin();
		$this->adminpage('admin/daftar_pengguna',$data);	
	}

	public function daftardiagnosa($value='')
	{
		$data['data']	= $this->model('diagnosa')->listdiagnosa();
		$this->adminpage('user/daftardiagnosa',$data);
	}

	public function hapususer($role,$id)
	{
		$this->model('admin')->hapususer($role,$id);
		$this->popup('Data berhasil dihapus','admin/daftarpengguna');
	}

	public function hapuskelinci($id_kelinci)
	{
		$this->model('kelinci')->hapuskelinci($id_kelinci);
		$this->popup('Data berhasil dihapus','admin/daftarkelinci');
	}

	// kode untuk keluar dari sistem admin
	public function logout($value='')
	{
		unset($_SESSION['admin']);
		$this->popup('Anda Berhasil Keluar','home/login/admin');
	}

}

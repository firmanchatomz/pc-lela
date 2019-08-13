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
class UserController extends Controller
{
	// method default
	function __construct()
	{
		$this->setsession('user');
		$this->session_null('home/login/user');
		$data['admin']		= model('user')->listusersetsession();
		$data['akses']		= hak_akses(__class__);
		$this->setdata($data);
	}
	// all class use methos index for method default
	public function index()
	{
		$data['jumlah']		= $this->model('user')->dashboard();
		$this->adminpage('user/beranda',$data);
	}

	public function tambahdiagnosa($value='')
	{
		if (isset($_SESSION['id_last'])) {
			unset($_SESSION['id_last']);
		}
		$data['user']		= $this->model('user')->listusersetsession();
		$data['ras']		= $this->model('ras')->listras();
		$this->adminpage('user/tambahdiagnosa',$data);
	}

	public function daftardiagnosa($value='')
	{
		$data['data']	= $this->model('diagnosa')->listdiagnosasetsession();
		$this->adminpage('user/daftardiagnosa',$data);
	}

	public function simpankelinci($value='')
	{
		$simpan = $this->model('kelinci')->tambahkelinci();
		if ($simpan) {
			$id_kelinci 	= $this->model('kelinci')->listkelincisetdesc();
			$this->model('diagnosa')->tambahdiagnosa($id_kelinci);
			$id_diagnosa 	= $this->model('diagnosa')->listdiagnosasetdesc();
			$this->redirect('user/pertanyaan/'. $id_diagnosa);
		} else {
			$this->pupup('Gagal mendiagnosa','user/tambahdiagnosa');
		}
	}

	public function pertanyaan($id_diagnosa, $id_gejala=2)
	{
		$data['gejala']				= $this->model('gejala')->listgejalaid($id_gejala);
		$data['id_diagnosa']	= $id_diagnosa;
		$this->adminpage('user/pertanyaandiagnosa',$data);
	}

	public function prosesdiagnosa($id_diagnosa)
	{		
		$id_gejala = $this->model('diagnosa')->prosespertanyaan($id_diagnosa);
		if ($id_gejala == 'none' || $id_gejala == 'break') {
			//proses hitung Nb
			$this->model('spk')->naivebayes($id_diagnosa);
			$this->popup('Data diagnosa telah selesai','user/detaildiagnosa/'.$id_diagnosa);
		} else {
			$this->redirect("user/pertanyaan/" . $id_diagnosa . '/' . $id_gejala);
		}
	}

	public function detaildiagnosa($id_diagnosa)
	{
		$data['cftotal']	= $this->model('diagnosa')->cftotal($id_diagnosa);
		$data['diagnosa'] = $this->model('diagnosa')->listdiagnosajoinpenyakit($id_diagnosa);
		$id_kelinci 			= $data['diagnosa']->id_kelinci;
		$data['kelinci']	= $this->model('kelinci')->listkelinciid($id_kelinci);
		$data['hasil']		= $this->model('hasil')->listhasilsetiddiagnosajoingejala($id_diagnosa);
		$data['obat']			= $this->model('obat')->listobatjoinhasil($id_diagnosa);
		$data['user']		= $this->model('user')->listusersetsession();

		$this->adminpage('user/detaildiagnosa',$data);
	}

	public function hapusdiagnosa($id_diagnosa)
	{
		$this->model('diagnosa')->hapusdiagnosaid($id_diagnosa);
		$this->popup('Data diagnosa berhasil dihapus','user/daftardiagnosa');
	}

	public function logout($value='')
	{
		unset($_SESSION['user']);
		$this->popup('berhasil keluar','home/login/user');
	}
}

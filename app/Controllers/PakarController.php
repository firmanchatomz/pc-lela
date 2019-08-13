<?php
/**
 * This file is part of the Chatomz PHP Framework package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author         Lela Ria lestari
 * @copyright      Copyright (c) Lela Ria Lestari
 *
 * ---------------------------------------------------------------------------------------------------------------
 */

namespace app\Controllers; // package untuk class HomeController

use app\Core\Controller; // alias namespace

// Controller class system
class PakarController extends Controller
{
	// method default
	function __construct()
	{
		$this->setsession('pakar');
		$this->session_null('home/login/pakar');
		$data['admin']		= model('admin')->listadminsetpakarid();
		$data['akses']		= hak_akses(__class__);
		$this->setdata($data);
	}
	// all class use methos index for method default
	public function index()
	{
		$data['jumlah']		= $this->model('admin')->dashboard();			
		$this->adminpage('admin/beranda_admin',$data);
	}

	// halaman untuk daftar gejala
	public function daftargejala($value='')
	{
		$data['data']	= $this->model('gejala')->listgejala();
		$this->adminpage('pakar/daftar_gejala',$data);
	}

	// halaman untuk daftar obat
	public function daftarobat($value='')
	{
		$data['data']	= $this->model('obat')->listobatcustom();
		$data['penyakit']	= $this->model('penyakit')->listpenyakit();
		$data['gejala']		= $this->model('gejala')->listgejala();
		$this->adminpage('pakar/daftar_obat',$data);
	}

	// halaman untuk daftar pencegahan
	public function daftarpencegahan($value='')
	{
		$data['data']	= $this->model('pencegahan')->listpencegahancustom();
		$data['penyakit']	= $this->model('penyakit')->listpenyakit();
		$data['gejala']		= $this->model('gejala')->listgejala();
		$this->adminpage('pakar/daftar_pencegahan',$data);
	}

	// halaman untuk daftar basis pengetahuan
	public function daftarpengetahuan($value='')
	{
		$data['data']			= $this->model('pengetahuan')->listpengetahuancustom();
		$data['penyakit']	= $this->model('penyakit')->listpenyakit();
		$data['gejala']		= $this->model('gejala')->listgejala();
		$this->adminpage('pakar/daftar_pengetahuan',$data);
	}

	// halaman untuk daftar penyakit
	public function daftarpenyakit($value='')
	{
		$data['data']	= $this->model('penyakit')->listpenyakit();
		$this->adminpage('pakar/daftar_penyakit',$data);
	}

	// halaman untuk daftar ras 
	public function daftarras($value='')
	{
		$data['data']	= $this->model('ras')->listras();
		$this->adminpage('pakar/daftar_ras',$data);
	}

		// halaman untuk daftar ras 
	public function daftardiagnosa($value='')
	{
		$data['data']	= $this->model('diagnosa')->listdiagnosajoinuser();
		$this->adminpage('pakar/daftar_diagnosa',$data);
	}

	// ####################################################################################
	// FUNGSI UNTUK MENYIMPAN DATA

	// simpan penyakit
	public function simpanpenyakit($value='')
	{
		$this->model('penyakit')->tambahpenyakit();
		$this->popup('Data Berhasil tersimpan','pakar/daftarpenyakit');
	}

	// simpan gejala
	public function simpangejala($value='')
	{
		$this->model('gejala')->tambahgejala();
		$this->popup('Data Berhasil tersimpan','pakar/daftargejala');
	}

	// simpan gejala
	public function simpanras($value='')
	{
		$this->model('ras')->tambahras();
		$this->popup('Data Berhasil tersimpan','pakar/daftarras');
	}

	// simpan pengetahuan
	public function simpanpengetahuan($value='')
	{
		$this->model('pengetahuan')->tambahpengetahuan();
		// $this->popup('Data Berhasil tersimpan','pakar/daftarpengetahuan');
		$this->redirect('pakar/daftarpengetahuan');
	}

	// simpan obat
	public function simpanobat($value='')
	{
		$this->model('obat')->tambahobat();
		$this->popup('Data Berhasil tersimpan','pakar/daftarobat');
	}

	// simpan obat
	public function simpanpencegahan($value='')
	{
		$this->model('pencegahan')->tambahpencegahan();
		$this->popup('Data Berhasil tersimpan','pakar/daftarpencegahan');
	}


// ##################################################################################
// DELETE
	public function hapuspengetahuan($id_pengetahuan)
	{
		$this->model('pengetahuan')->hapuspengetahuanid($id_pengetahuan);
		$this->popup('Berhasil Terhapus','pakar/daftarpengetahuan');
	}

	public function hapusgejala($id_gejala)
	{
		$this->model('gejala')->hapusgejalaid($id_gejala);
		$this->popup('Berhasil Terhapus','pakar/daftargejala');
	}

	public function hapuspenyakit($id_penyakit)
	{
		$this->model('penyakit')->hapuspenyakitid($id_penyakit);
		$this->popup('Data berhasil dihapus','pakar/daftarpenyakit');
	}

	public function hapusras($id_ras)
	{
		$this->model('ras')->hapusrasid($id_ras);
		$this->popup('Data berhasil dihapus','pakar/daftarras');
	}

	public function hapusobat($id_obat)
	{
		$this->model('obat')->hapusobatid($id_obat);
		$this->popup('Data berhasil dihapus','pakar/daftarobat');
	}

	public function hapuspencegahan($id_pencegahan)
	{
		$this->model('pencegahan')->hapuspencegahanid($id_pencegahan);
		$this->popup('Data berhasil dihapus','pakar/daftarpencegahan');
	}

	public function hapusdiagnosis($id_diagnosa)
	{
		$this->model('diagnosa')->hapusdiagnosaid($id_diagnosa);
		$this->popup('Data berhasil dihapus','pakar/daftardiagnosa');
	}

	// #################################################################################

	// #################################################################################
	// edit
	public function editpenyakit($value='')
	{
		$id_penyakit 	= $_POST['id'];
		$data['penyakit'] = $this->model('penyakit')->listpenyakitid($id_penyakit);
		$data['id_penyakit']	= $id_penyakit;
		$this->view('pakar/edit_penyakit',$data);
	}
	public function editgejala($value='')
	{
		$id_gejala 	= $_POST['id'];
		$data['gejala'] = $this->model('gejala')->listgejalaid($id_gejala);
		$data['id_gejala']	= $id_gejala;
		$this->view('pakar/edit_gejala',$data);
	}

	public function editras($value='')
	{
		$id_ras 	= $_POST['id'];
		$data['ras'] = $this->model('ras')->listrasid($id_ras);
		$data['id_ras']	= $id_ras;
		$this->view('pakar/edit_ras',$data);
	}

	public function editobat($value='')
	{
		$id_obat 	= $_POST['id'];
		$data['obat'] = $this->model('obat')->listobatid($id_obat);
		$data['penyakit']	= $this->model('penyakit')->listpenyakit();
		$data['gejala']		= $this->model('gejala')->listgejala();
		$data['id_obat']	= $id_obat;
		$this->view('pakar/edit_obat',$data);
	}

	public function editpencegahan($value='')
	{
		$id_pencegahan 	= $_POST['id'];
		$data['pencegahan'] = $this->model('pencegahan')->listpencegahanid($id_pencegahan);
		$data['penyakit']	= $this->model('penyakit')->listpenyakit();
		$data['gejala']		= $this->model('gejala')->listgejala();
		$data['id_pencegahan']	= $id_pencegahan;
		$this->view('pakar/edit_pencegahan',$data);
	}

	public function editpengetahuan($value='')
	{
		$id_pengetahuan 	= $_POST['id'];
		$data['pengetahuan'] = $this->model('pengetahuan')->listpengetahuanid($id_pengetahuan);
		$data['penyakit']	= $this->model('penyakit')->listpenyakit();
		$data['gejala']		= $this->model('gejala')->listgejala();
		$data['id_pengetahuan']	= $id_pengetahuan;
		$this->view('pakar/edit_pengetahuan',$data);
	}

	// #################################################################################

	// #################################################################################
	// UPDATE DATA
	public function updatepenyakit($id_penyakit)
	{
		$this->model('penyakit')->ubahpenyakit($id_penyakit);
		$this->popup('Data berhasil di ubah','pakar/daftarpenyakit');
	}
	public function updateras($id_ras)
	{
		$this->model('ras')->ubahras($id_ras);
		$this->popup('Data berhasil di ubah','pakar/daftarras');
	}
	public function updateobat($id_obat)
	{
		$this->model('obat')->ubahobatid($id_obat);
		$this->popup('Data berhasil di ubah','pakar/daftarobat');
	}
	public function updatepencegahan($id_pencegahan)
	{
		$this->model('pencegahan')->ubahpencegahanid($id_pencegahan);
		$this->popup('Data berhasil di ubah','pakar/daftarpencegahan');
	}
	public function updatepengetahuan($id_pengetahuan)
	{
		$this->model('pengetahuan')->ubahpengetahuanid($id_pengetahuan);
		$this->popup('Data berhasil di ubah','pakar/daftarpengetahuan');
	}
	public function updategejala($id_gejala)
	{
		$this->model('gejala')->ubahgejala($id_gejala);
		$this->redirect('pakar/daftargejala');
		// $this->popup('Data berhasil di ubah','pakar/daftargejala');
	}


	public function tambahdiagnosa($value='')
	{
		if (isset($_SESSION['id_last'])) {
			unset($_SESSION['id_last']);
		}
		$data['ras']		= $this->model('ras')->listras();
		$this->adminpage('pakar/tambah_diagnosa',$data);
	}

		// simpan obat
	public function simpandiagnosa($value='')
	{
		$simpan = $this->model('diagnosa')->tambahdiagnosapakar();
		if ($simpan) {
			$id_diagnosa 	= $this->model('diagnosa')->listdiagnosasetdesc();
			$this->redirect('pakar/pertanyaan/'. $id_diagnosa);
		} else {
			$this->pupup('Gagal mendiagnosa','pakar/daftardiagnosa');
		}

	}

	public function pertanyaan($id_diagnosa, $id_gejala=2)
	{
		$data['gejala']				= $this->model('gejala')->listgejalaid($id_gejala);
		$data['id_diagnosa']	= $id_diagnosa;
		$this->adminpage('pakar/pertanyaandiagnosa',$data);
	}

	public function prosesdiagnosa($id_diagnosa)
	{		
		$id_gejala = $this->model('diagnosa')->prosespertanyaan($id_diagnosa);
		if ($id_gejala == 'none' || $id_gejala == 'break') {
			//proses hitung Nb
			$this->model('spk')->naivebayes($id_diagnosa);
			$this->popup('Data diagnosa telah selesai','pakar/daftardiagnosa');
		} else {
			$this->redirect("pakar/pertanyaan/" . $id_diagnosa . '/' . $id_gejala);
		}
	}

	public function detaildiagnosa($id_diagnosa)
	{
		$data['cftotal']	= $this->model('diagnosa')->cftotal($id_diagnosa);
		$data['diagnosa'] = $this->model('diagnosa')->listdiagnosajoinpenyakit($id_diagnosa);
		$id_kelinci 			= $data['diagnosa']->id_kelinci;
		$id_user 					= $data['diagnosa']->id_user;
		$data['kelinci']	= $this->model('kelinci')->listkelinciid($id_kelinci);
		$data['hasil']		= $this->model('hasil')->listhasilsetiddiagnosajoingejala($id_diagnosa);
		$data['obat']			= $this->model('obat')->listobatjoinhasil($id_diagnosa);
		$data['user']		= $this->model('user')->listuserid($id_user);
		$this->adminpage('user/detaildiagnosa',$data);
	}

	// fungsi keluar dari sistem pakar
	public function logout($value='')
	{
		unset($_SESSION['pakar']);
		$this->popup('Anda berhasil keluar','home/login/admin');
	}

}

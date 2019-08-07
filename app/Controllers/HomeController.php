<?php
/*
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

namespace app\Controllers;

// package untuk class HomeController

use app\Core\Controller; // alias namespace

// Controller class system
class HomeController extends Controller

{
    // method default
    // all class use methos index for method default
    // framework chatomz
    public function index()
    {
        redirect('home/login/admin');
    }

    public function login($sesi = 'admin')
    {   
        if ($sesi == 'admin') {
            view('login_admin');
        } elseif($sesi == 'user') {
            view('login_user');
        } else {
            echo 'not page';
        }
    }

    // fungsi untuk mengecek admin/pakar/user login.. jika berhasil masuk ke sistem, jika gagal akan kembali ke halaman login
    public function ceklogin($sesi = 'admin')
    {
        if ($sesi == 'admin') {
            $cek = model('home')->cekloginadmin();
            if ($cek == 'admin') {
                notif('Login admin berhasil','admin');
            }elseif ($cek == 'pakar') {
                notif('Login Pakar berhasil','pakar');
            } else {
                notif('Login gagal','home/login/admin');
            }
        } elseif ($sesi == 'user') {
            $cek = model('home')->cekloginuser();
            if ($cek) {
                notif('Login berhasil','user');
            } else {
                notif('Login gagal','home/login/user');
            }
            
            
        }
    }

    public function simpanuser($value='')
    {
        $simpan     = $this->model('user')->tambahuser();
        if ($simpan == 'type') {
            $this->popup('Type file tidak didukung','home/login/user');
        }elseif ($simpan == 'size') {
            $this->popup('Ukuran gambar terlalu besar','home/login/user');
        } else {
            $this->popup('Data berhasil disimpan','home/login/user');
        }   
    }
}

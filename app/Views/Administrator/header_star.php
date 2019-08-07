<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Sistem Pakar</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href=<?= base_url('theme/staradmin/vendors/iconfonts/mdi/css/materialdesignicons.min.css')?>>
  <link rel="stylesheet" href=<?= base_url('theme/staradmin/vendors/css/vendor.bundle.base.css')?>>
  <link rel="stylesheet" href=<?= base_url('theme/staradmin/vendors/css/vendor.bundle.addons.css')?>>

  <link rel="stylesheet" href=<?= base_url('theme/staradmin/vendors/iconfonts/font-awesome/css/font-awesome.css')?>>
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href=<?= base_url('theme/staradmin/css/style.css')?>>
  <!-- endinject -->
  <link rel="shortcut icon" href=<?= base_url('assets/img/fc.ico')?>>

  <script type="text/javascript" src="<?= base_url('j-query/jquery.min.js') ?>"></script>
  <script type="text/javascript" src="<?= base_url('chartjs/Chart.min.js') ?>"></script>

</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo text-dark" href="index.html">
          <!-- <img src=<?= base_url('theme/staradmin/images/logo.svg')?> alt="logo" /> -->
          SISTEM PAKAR
        </a>
        <a class="navbar-brand brand-logo-mini" href="index.html">
          <img src=<?= base_url('theme/staradmin/images/logo-mini.svg')?> alt="logo" />
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        
        <ul class="navbar-nav navbar-nav-right">
          <?php if ($data['akses'] == 'hidden'): ?>
            
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <i class="mdi mdi-file-document-box"></i>
              <span class="count">7</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
              <div class="dropdown-item">
                <p class="mb-0 font-weight-normal float-left">You have 7 unread mails
                </p>
                <span class="badge badge-info badge-pill float-right">View all</span>
              </div>
              <?php 
              $info = [['nama' => 'Firman','time' => '1 Minutes ago','pesan' => 'The meeting is cancelled'], ['nama' => 'Chatomz','time' => '7 Minutes ago','pesan' => 'Open your email now!'],['nama' => 'Firman Chatomz','time' => '23 Minutes ago','pesan' => 'The meeting is amazing']];
              foreach ($info as $row): ?>
              <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src=<?= base_url('assets/img/chatomz.jpg')?> alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content flex-grow">
                    <h6 class="preview-subject ellipsis font-weight-medium text-dark"><?php echo $row['nama'] ?>
                      <span class="float-right font-weight-light small-text"><?php echo $row['time'] ?></span>
                    </h6>
                    <p class="font-weight-light small-text">
                      <?php echo $row['pesan'] ?>
                    </p>
                  </div>
                </a>
              <?php endforeach ?>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="mdi mdi-bell"></i>
              <span class="count">4</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <a class="dropdown-item">
                <p class="mb-0 font-weight-normal float-left">You have 4 new notifications
                </p>
                <span class="badge badge-pill badge-warning float-right">View all</span>
              </a>
                <?php
                 $notif = [
                            ['notif' => 'Application Error','pesan' => 'Just now','icon' => 'mdi-alert-circle-outline'], 
                            ['notif' => 'Settings','pesan' => 'Private message','icon' => 'mdi-comment-text-outline'],
                            ['notif' => 'New user registration','pesan' => '2 days ago','icon' => 'mdi-email-outline']
                          ];

                foreach ($notif as $row): ?>
                  
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-success">
                      <i class="mdi <?php echo $row['icon'] ?> mx-0"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-medium text-dark"><?php echo $row['notif'] ?></h6>
                    <p class="font-weight-light small-text">
                      <?php echo $row['pesan'] ?>
                    </p>
                  </div>
                </a>
                <?php endforeach ?>
            </div>
          </li>
          <?php endif ?>

          <li class="nav-item dropdown d-none d-xl-inline-block">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <!-- kode header akun atas -->
              <?php if ($data['akses'] != 'user'): ?>
                <span class="profile-text">Hello, <?php echo ucwords($data['admin']->nama);?> !</span>
                <img class="img-xs rounded-circle" src=<?= base_url('assets/img/'.$data['admin']->poto)?> alt="Profile image">
              <?php endif ?>

              <?php if ($data['akses'] == 'user'): ?>
                <span class="profile-text">Hello, <?php echo ucwords($data['admin']->nama_depan . ' ' . $data['admin']->nama_belakang);?> !</span>
                <img class="img-xs rounded-circle" src=<?= base_url('assets/img/user/'.$data['admin']->poto)?> alt="Profile image">
              <?php endif ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">

              <!-- ###################################################################################### -->
              <!-- manage akun admin -->
              <?php if ($data['akses'] == 'admin'): ?>
                
           <!--    <a class="dropdown-item mt-2">
                Manage Accounts
              </a> -->
              <a class="dropdown-item" href="<?php echo base_url('admin/logout') ?>">
                Keluar
              </a>
              <?php endif ?>

              <!-- batas manage akun admin -->
              <!-- ##################################################################################### -->


               <!-- ###################################################################################### -->
              <!-- manage akun pakar -->

              <?php if ($data['akses'] == 'pakar'): ?>
                
            <!--   <a class="dropdown-item mt-2">
                Manage Accounts
              </a> -->
              <a class="dropdown-item" href="<?php echo base_url('pakar/logout') ?>">
                Keluar
              </a>
              <?php endif ?>

              <!-- batas manage akun pakar -->
              <!-- ##################################################################################### -->

                <!-- ###################################################################################### -->
              <!-- manage akun user -->

              <?php if ($data['akses'] == 'user'): ?>
                
           <!--    <a class="dropdown-item mt-2">
                Manage Accounts
              </a> -->
              <a class="dropdown-item" href="<?php echo base_url('user/logout') ?>">
                Keluar
              </a>
              <?php endif ?>

              <!-- batas manage akun pakar -->
              <!-- ##################################################################################### -->
              

            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <?php if ($data['akses'] != 'user'): ?>
                <div class="user-wrapper">
                  <div class="profile-image">
                    <img src=<?= base_url('assets/img/'.$data['admin']->poto)?> alt="profile image">
                  </div>
                  <div class="text-wrapper">
                    <p class="profile-name"><?php echo ucwords($data['admin']->nama);?></p>
                    <div>
                      <small class="designation text-muted"><?php echo ucwords($data['admin']->level);?></small>
                      <span class="status-indicator online"></span>
                    </div>
                  </div>
                </div>
              <?php endif ?>

              <?php if ($data['akses'] == 'user'): ?>
                <div class="user-wrapper">
                  <div class="profile-image">
                    <img src=<?= base_url('assets/img/user/'.$data['admin']->poto)?> alt="profile image">
                  </div>
                  <div class="text-wrapper">
                    <p class="profile-name"><?php echo ucwords($data['admin']->nama_depan .' '. $data['admin']->nama_belakang);?></p>
                    <div>
                      <small class="designation text-muted">Pengguna</small>
                      <span class="status-indicator online"></span>
                    </div>
                  </div>
                </div>
              <?php endif ?>
            </div>
          </li>
          <!-- ###################################################################################### -->
          <!-- menu untuk admin -->
          <?php if ($data['akses'] == 'admin'): ?>
            
          <li class="nav-item">
            <a class="nav-link" href=<?= base_url('admin')?>>
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Beranda</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href=<?= base_url('admin/daftarkelinci')?>>
              <i class="menu-icon mdi mdi-format-list-bulleted"></i>
              <span class="menu-title">Kelinci</span>
            </a>
          </li>

<!--           <li class="nav-item">
            <a class="nav-link" href=<?= base_url('admin/daftardiagnosa')?>>
              <i class="menu-icon mdi mdi-backup-restore"></i>
              <span class="menu-title">Diagnosa</span>
            </a>
          </li> -->

          <li class="nav-item">
            <a class="nav-link" href=<?= base_url('admin/daftarpengguna')?>>
              <i class="menu-icon mdi mdi-account"></i>
              <span class="menu-title">Pengguna</span>
            </a>
          </li>

          <?php endif ?>

          <!-- batas menu admin -->
          <!-- ###################################################################################### -->


          <!-- ###################################################################################### -->
          <!-- menu pakar -->
          <?php if ($data['akses'] == 'pakar'): ?>


          <li class="nav-item">
            <a class="nav-link" href=<?= base_url('pakar')?>>
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Beranda</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href=<?= base_url('pakar/daftarpenyakit')?>>
              <i class="menu-icon mdi mdi-format-list-bulleted"></i>
              <span class="menu-title">Penyakit</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href=<?= base_url('pakar/daftargejala')?>>
              <i class="menu-icon mdi mdi-format-list-bulleted"></i>
              <span class="menu-title">Gejala</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href=<?= base_url('pakar/daftarras')?>>
              <i class="menu-icon mdi mdi-format-list-bulleted"></i>
              <span class="menu-title">Ras</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href=<?= base_url('pakar/daftarpengetahuan')?>>
              <i class="menu-icon mdi mdi-format-list-bulleted"></i>
              <span class="menu-title">Basis Pengetahuan</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href=<?= base_url('pakar/daftarobat')?>>
              <i class="menu-icon mdi mdi-format-list-bulleted"></i>
              <span class="menu-title">Obat</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href=<?= base_url('pakar/daftarpencegahan')?>>
              <i class="menu-icon mdi mdi-format-list-bulleted"></i>
              <span class="menu-title">Pencegahan</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href=<?= base_url('pakar/tambahdiagnosa')?>>
              <i class="menu-icon mdi mdi-format-list-bulleted"></i>
              <span class="menu-title">Diagnosa</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href=<?= base_url('pakar/daftardiagnosa')?>>
              <i class="menu-icon mdi mdi-format-list-bulleted"></i>
              <span class="menu-title">Riwayat Diagnosa</span>
            </a>
          </li>

          <?php endif ?>

          <!-- batas menu pakar -->
          <!-- ####################################################################################### -->

           <!-- ###################################################################################### -->
          <!-- menu untuk user -->
          <?php if ($data['akses'] == 'user'): ?>
            
          <li class="nav-item">
            <a class="nav-link" href=<?= base_url('user')?>>
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Beranda</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href=<?= base_url('user/tambahdiagnosa')?>>
              <i class="menu-icon mdi mdi-format-list-bulleted"></i>
              <span class="menu-title">Diagnosa</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href=<?= base_url('user/daftardiagnosa')?>>
              <i class="menu-icon mdi mdi-format-list-bulleted"></i>
              <span class="menu-title">Riwayat Diagnosa</span>
            </a>
          </li>

          <?php endif ?>

          <!-- batas menu admin -->
          <!-- ###################################################################################### -->

        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
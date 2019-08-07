<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login User</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?= base_url('bootstrap4.1/css/bootstrap.min.css')?>">
  <link rel="stylesheet" href="<?= base_url('theme/staradmin/vendors/iconfonts/mdi/css/materialdesignicons.min.css')?>">
  <link rel="stylesheet" href="<?= base_url('theme/staradmin/css/style.css')?>">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?= base_url('assets/img/fc.ico')?>">

  <script src="<?= base_url('j-query/jquery.min.js')?>"></script>
  <script src="<?= base_url('bootstrap4.1/js/bootstrap.min.js')?>"></script>


</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auto-form-wrapper">
            <header class="text-center">
              <h4>Sistem Pakar Penyakit Kelinci</h4>
              <p>login pengguna</p>
            </header>
              <form method="post" action="<?php echo base_url('home/ceklogin/user') ?>">
                <div class="form-group">
                  <label class="label">Username</label>
                  <div class="input-group">
                    <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="label">Password</label>
                  <div class="input-group">
                    <input type="password" class="form-control" name="password" placeholder="*********" required>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary submit-btn btn-block">Login</button>
                </div>
                
                <div class="text-block text-center my-3">
                  <span class="text-small font-weight-semibold">Belum punya akun ?</span>
                  <a href="#" data-toggle="modal" data-target="#daftar" class="text-black text-small">Daftar</a>
                </div>
              </form>
            </div>
         <!--    <ul class="auth-footer">
              <li>
                <a href="#">Conditions</a>
              </li>
              <li>
                <a href="#">Help</a>
              </li>
              <li>
                <a href="#">Terms</a>
              </li>
            </ul> -->
            <p class="footer-text text-center mt-3">copyright © <?php echo getyear() ?> Bootstrapdash. All rights reserved.</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>

</body>

</html>



<!-- Modal daftar akun-->
<div class="modal fade" id="daftar" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Sistem Pakar Penyakit Kelinci</h5>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url('home/simpanuser')?>" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Nama Depan</label>
                <input type="text" name="nama_depan" id="" class="form-control" placeholder="Masukkan nama depan" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Nama Belakang</label>
                <input type="text" name="nama_belakang" id="" required class="form-control" placeholder="Masukkan nama belakang">
              </div>
            </div>
          </div>
          <div class="form-group">
          <label for="Jenis kelamin"></label>
            <input type="checkbox" name="jk" id="" value="laki-laki" checked> Laki - laki
            <input type="checkbox" name="jk" id="" value="perempuan"> Perempuan
          </div>
          <div class="form-group">
            <label for="">Alamat</label>
            <textarea name="alamat" id="" cols="30" rows="5" class="form-control" required></textarea>
          </div>
         
         
          <div class="row">
            <div class="col-md-8">
               <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email" id="" class="form-control" required>
          </div>
            </div>
            <div class="col-md-4">
             <div class="form-group">
            <label for="">No Hp</label>
            <input type="text" name="no_hp" id="" class="form-control" required>
          </div>
            </div>
          </div>
          
           <div class="row">
            <div class="col-md-6">
                <div class="form-group">
            <label for="">Username</label>
            <input type="text" name="username" id="" class="form-control" required>
          </div>
            </div>
            <div class="col-md-6">
             <div class="form-group">
            <label for="">Password</label>
            <input type="password" name="password" id="" class="form-control" required>
          </div>
            </div>
          </div>
           <div class="form-group">
            <label for="">Poto</label>
            <input type="file" name="poto" id="" required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Daftar</button>
      </div>
       </form>
    </div>
  </div>
</div>
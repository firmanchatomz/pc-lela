	<div class="container my-3">
  <div class="row">
    <div class="col-md-12">
       <header class="mb-2">
        <p>identitas Kelinci</p>
      </header>
     <section class="row">
       <div class="col-md-6 p-3">
        <div class="container">
          <form method="post" action="<?php echo base_url('user/simpankelinci') ?>">
          <div class="form-group">
            <label>Nama Kelinci</label>
            <input type="text" name="nama_kelinci" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Nama Pemilik</label>
            <input type="text"  class="form-control" value="<?php echo $data['user']->nama_depan . ' '. $data['user']->nama_belakang ?>" disabled>
            <input type="hidden" name="id_user" value="<?php echo $data['user']->id_user ?>">
           </div>
          <div class="form-group">
            <label>Nama Ras</label>
            <select class="form-control" name="id_ras">
              <?php foreach ($data['ras'] as $row): ?>
                <option value="<?php echo $row['id_ras'] ?>"><?php echo $row['nama_ras'] ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="form-group">
            <label>Berat Badan (Kg)</label>
            <input type="number" name="berat_badan" class="form-control" required>
          </div>
        </div>
       </div>
        <div class="col-md-6 p-3">
        <div class="container">
          <div class="form-group">
            <label>Jenis Kelamin</label><br>
            <input type="radio" name="jk" value="jantan" checked> Jantan
            <input type="radio" name="jk" value="betina"> Betina
          </div>
          <div class="form-group">
            <label>Umur (Bulan)</label>
            <input type="number" name="umur" class="form-control" required>
           </div>
          <div class="form-group">
            <label>Warna Bulu</label>
            <input type="text" name="warna" class="form-control" required>
          </div>
        </div>
       </div>
       <div class="col-md-12">
         <div class="form-group">
            <button type="submit" class="btn btn-primary float-right"> Next >></button>
          </div>
       </div>
     </form>
     </section>
    </div>
  </div>
</div>	

<!-- modal tambah -->

<!-- Modal -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Gejala</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url('pakar/simpangejala') ?>">
          <div class="form-group">
            <label>Nama Gejala</label>
            <input type="text" name="nama_gejala" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Evidence</label>
            <input type="number" name="evidence" class="form-control" required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan Data</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- batas modal tambah -->
	<div class="container my-3">
  <div class="row">
    <div class="col-md-12">
       <header class="mb-2">
        <a href="#" class="btn btn-primary" data-target="#tambah" data-toggle="modal">tambah</a>
      </header>
      <div class="table-responsive">
        <table class="table table-hover bg-white table-bordered" id="data-table">
          <thead class="text-center">
            <tr>
              <th width="25">No</th>
              <th>Penyakit</th>
              <th>Gejala</th>
              <th>Nama Obat</th>
              <th>Umur</th>
              <th>Aturan</th>
              <th>Tindakan</th>
              <th width="140"></th>
            </tr>
          </thead>
          <tbody class="text-capitalize">
            <?php 
            $no = 1;
            if ($data['data'] != null) {
              foreach ($data['data'] as $row) { ?>
              <tr>
                <td class="text-center"><?php echo $no++; ?></td>
                <td><?php echo $row['nama_penyakit'] ?></td>
                <td><?php echo $row['nama_gejala']; ?></td>
                <td><?php echo $row['nama_obat'] ?></td>
                <td><?php echo $row['batas_umur'] ?> Tahun</td>
                <td><?php echo $row['aturan'] ?></td>
                <td><?php echo $row['tindakan'] ?></td>
                <td>
                  <!-- <a class="btn btn-info btn-sm small" href="#">Detail</a> -->
                   <a class="btn btn-success btn-sm small" href='#edit_obat' id='custId' data-toggle='modal' data-id="<?php echo $row['id_obat']; ?>">Edit</a>
                  <a class="btn btn-danger btn-sm small" onclick="return notif_delete()" href="<?= base_url('pakar/hapusobat/'.$row['id_obat']) ?>">Hapus</a>
                </td>
              </tr>
               <?php
              }
            } else { ?>
               <tr>
                 <td colspan="8" class="text-center">Belum Ada Data</td>
               </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>	

<!-- modal tambah -->

<!-- Modal -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Obat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url('pakar/simpanobat') ?>">
          <div class="form-group">
            <label>Nama Penyakit</label>
            <select class="form-control" name="id_penyakit" required>
              <?php foreach ($data['penyakit'] as $row): ?>
                <option value="<?php echo $row['id_penyakit'] ?>"><?php echo $row['nama_penyakit'] ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="form-group">
            <label>Nama Gejala</label>
            <select class="form-control" name="id_gejala" required>
              <?php foreach ($data['gejala'] as $row): ?>
                <option value="<?php echo $row['id_gejala'] ?>"><?php echo $row['nama_gejala'] ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="form-group">
            <label>Nama Obat</label>
            <input type="text" name="nama_obat" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Batas Umur pemakai obat</label>
            <input type="number" name="batas_umur" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Aturan Pemakaian</label>
            <textarea class="form-control" rows="5" name="aturan"></textarea>
          </div>
          <div class="form-group">
            <label>Tindakan</label>
            <textarea class="form-control" rows="5" name="tindakan"></textarea>
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



<!-- Modal -->
<div class="modal fade" id="edit_obat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Obat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="fetched-data"></div>
      </div>
    </div>
  </div>
</div>

<!-- batas modal tambah -->
<!-- kode jquery cari data -->
<script>
$(document).ready(function(){
    $('#edit_obat').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
        //menggunakan fungsi ajax untuk pengambilan data
        $.ajax({
            type : 'post',
            url : '<?= base_url('pakar/editobat') ?>',
            data :  'id='+ rowid,
            success : function(data){
            $('.fetched-data').html(data);//menampilkan data ke dalam modal
            }
        });
     });
});
</script>

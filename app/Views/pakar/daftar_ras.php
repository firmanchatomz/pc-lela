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
              <th>Nama Ras</th>
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
                <td><?php echo $row[1] ?></td>
           
                <td>
                  <!-- <a class="btn btn-info btn-sm small" href="#">Detail</a> -->
                  <a class="btn btn-success btn-sm small" href='#edit_ras' id='custId' data-toggle='modal' data-id="<?php echo $row['0']; ?>">Edit</a>
                  <a class="btn btn-danger btn-sm small" onclick="return notif_delete()" href="<?= base_url('pakar/hapusras/'.$row['0']) ?>">Hapus</a>
                </td>
              </tr>
               <?php
              }
            } else { ?>
               <tr>
                 <td colspan="3" class="text-center">Belum Ada Data</td>
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Ras</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url('pakar/simpanras') ?>">
          <div class="form-group">
            <label>Nama Ras</label>
            <input type="text" name="nama_ras" class="form-control" required>
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
<div class="modal fade" id="edit_ras" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Ras</h5>
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
    $('#edit_ras').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
        //menggunakan fungsi ajax untuk pengambilan data
        $.ajax({
            type : 'post',
            url : '<?= base_url('pakar/editras') ?>',
            data :  'id='+ rowid,
            success : function(data){
            $('.fetched-data').html(data);//menampilkan data ke dalam modal
            }
        });
     });
});
</script>



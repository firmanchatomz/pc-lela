	<div class="container my-3">
  <div class="row">
    <div class="col-md-12">
       <header class="mb-2">
        <a href="<?= base_url('pakar/tambahdiagnosa') ?>" class="btn btn-primary">tambah</a>
      </header>
      <div class="table-responsive">
        <table class="table table-hover bg-white table-bordered" id="data-table">
          <thead class="text-center">
            <tr>
              <th width="25">No</th>
              <th>Nama User</th>
              <th>Tanggal diagnosa</th>
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
                <td><?php echo $row['nama_depan']. ' '.$row['nama_belakang'] ?></td>
                <td><?php echo $row['tgl_diagnosa']; ?></td>
                <td>
                  <a class="btn btn-info btn-sm small" href="<?= base_url('pakar/detaildiagnosa/'.$row['id_diagnosa']) ?>">Detail</a>
                  <a class="btn btn-danger btn-sm small" onclick="return notif_delete()" href="<?= base_url('pakar/hapusdiagnosis/'.$row['id_diagnosa']) ?>">Hapus</a>
                </td>
              </tr>
               <?php
              }
            } else { ?>
               <tr>
                 <td colspan="4" class="text-center">Belum Ada Data</td>
               </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>	



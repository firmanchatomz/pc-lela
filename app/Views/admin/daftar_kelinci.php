	<div class="container my-3">
  <div class="row">
    <div class="col-md-12">
      <div class="table-responsive">
        <table class="table table-hover bg-white table-bordered" id="data-table">
          <thead class="text-center">
            <tr>
              <th width="25">No</th>
              <th>Nama Kelinci</th>
              <th>Pemilik</th>
              <th>Jenis Kelamin</th>
              <th>Ras</th>
              <th>Umur</th>
              <th>Berat Badan</th>
              <th>Warna</th>
              <th width="140">Action</th>
            </tr>
          </thead>
          <tbody class="text-capitalize">
            <?php 
            $no = 1;
            if ($data['data'] != null) {
              foreach ($data['data'] as $row) { ?>
              <tr>
                <td class="text-center"><?php echo $no++; ?></td>
                <td><?php echo $row['nama_kelinci'] ?></td>
                <td><?php echo $row['nama_pemilik'] ?></td>
                <td><?php echo $row['jk'] ?></td>
                <td><?php echo $row['ras'] ?></td>
                <td><?php echo $row['umur'] ?> bln</td>
                <td><?php echo $row['berat_badan'] ?> kg</td>
                <td><?php echo $row['warna'] ?> </td>
                <td>
                  <a class="btn btn-danger btn-sm small" onclick="return notif_delete()" href="<?= base_url('admin/hapuskelinci/'.$row['id_kelinci']) ?>">Hapus</a>
                </td>
              </tr>
               <?php
              }
            } else { ?>
               <tr>
                 <td colspan="6" class="text-center">Belum Ada Data</td>
               </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>	
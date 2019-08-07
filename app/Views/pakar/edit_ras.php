 <form method="post" action="<?php echo base_url('pakar/updateras/'.$data['id_ras']) ?>">
 <div class="form-group">
    <label>Nama Ras</label>
    <input type="text" name="nama_ras" class="form-control" value="<?= $data['ras']->nama_ras ?>" required>
  </div>
  <div class="form-group">
  	<input type="submit" value="ubah" class="btn btn-primary btn-sm">
  </div>
 </form>
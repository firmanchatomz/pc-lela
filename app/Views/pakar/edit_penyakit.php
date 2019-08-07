 <form method="post" action="<?php echo base_url('pakar/updatepenyakit/'.$data['id_penyakit']) ?>">
 <div class="form-group">
    <label>Nama Penyakit</label>
    <input type="text" name="nama_penyakit" class="form-control" value="<?= $data['penyakit']->nama_penyakit ?>" required>
  </div>
  <div class="form-group">
  	<input type="submit" value="ubah" class="btn btn-primary btn-sm">
  </div>
 </form>
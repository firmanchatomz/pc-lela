 <form method="post" action="<?php echo base_url('pakar/updategejala/'.$data['id_gejala']) ?>">
    <div class="form-group">
    <label>Nama Gejala</label>
    <input type="text" name="nama_gejala" class="form-control" value="<?= $data['gejala']->nama_gejala ?>" autofocus required>
  </div>
  <div class="form-group">
    <label>Pertanyaan</label>
    <input type="text" name="pertanyaan" class="form-control" value="<?= $data['gejala']->pertanyaan ?>" required>
  </div>
  <div class="form-group">
    <label>Evidence</label>
    <input type="text" name="evidence" class="form-control" value="<?= $data['gejala']->evidence ?>" required>
  </div>
  <div class="form-group">
  	<input type="submit" value="ubah" class="btn btn-primary btn-sm">
  </div>
 </form>


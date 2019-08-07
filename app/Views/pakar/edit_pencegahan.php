 <form method="post" action="<?php echo base_url('pakar/updatepencegahan/'.$data['id_pencegahan']) ?>">
  <div class="form-group">
    <label>Nama Penyakit</label>
    <select class="form-control" name="id_penyakit" required>
      <?php foreach ($data['penyakit'] as $row): ?>
        <option value="<?php echo $row['id_penyakit'] ?>" <?= cekoption($row['id_penyakit'],$data['pencegahan']->id_penyakit) ?>><?php echo $row['nama_penyakit'] ?></option>
      <?php endforeach ?>
    </select>
  </div>
  <div class="form-group">
    <label>Nama Gejala</label>
    <select class="form-control" name="id_gejala" required>
      <?php foreach ($data['gejala'] as $row): ?>
        <option value="<?php echo $row['id_gejala'] ?>" <?= cekoption($row['id_gejala'],$data['pencegahan']->id_gejala) ?>><?php echo $row['nama_gejala'] ?></option>
      <?php endforeach ?>
    </select>
  </div>
  <div class="form-group">
    <label>Nama Pencegahan</label>
    <input type="text" name="nama_pencegahan" class="form-control"  value="<?= $data['pencegahan']->nama_pencegahan ?>" required>
  </div>
  <div class="form-group">
  	<input type="submit" value="ubah" class="btn btn-primary btn-sm">
  </div>
 </form>
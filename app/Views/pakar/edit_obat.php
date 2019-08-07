 <form method="post" action="<?php echo base_url('pakar/updateobat/'.$data['id_obat']) ?>">
  <div class="form-group">
    <label>Nama Penyakit</label>
    <select class="form-control" name="id_penyakit" required>
      <?php foreach ($data['penyakit'] as $row): ?>
        <option value="<?php echo $row['id_penyakit'] ?>" <?= cekoption($row['id_penyakit'],$data['obat']->id_penyakit) ?>><?php echo $row['nama_penyakit'] ?></option>
      <?php endforeach ?>
    </select>
  </div>
  <div class="form-group">
    <label>Nama Gejala</label>
    <select class="form-control" name="id_gejala" required>
      <?php foreach ($data['gejala'] as $row): ?>
        <option value="<?php echo $row['id_gejala'] ?>" <?= cekoption($row['id_gejala'],$data['obat']->id_gejala) ?>><?php echo $row['nama_gejala'] ?></option>
      <?php endforeach ?>
    </select>
  </div>
  <div class="form-group">
    <label>Nama Obat</label>
    <input type="text" name="nama_obat" class="form-control"  value="<?= $data['obat']->nama_obat ?>" required>
  </div>
  <div class="form-group">
    <label>Batas Umur pemakai obat</label>
    <input type="number" name="batas_umur" class="form-control"  value="<?= $data['obat']->batas_umur ?>" required>
  </div>
  <div class="form-group">
    <label>Aturan Pemakaian</label>
    <textarea class="form-control" rows="5" name="aturan" >"<?= $data['obat']->aturan ?></textarea>
  </div>
  <div class="form-group">
    <label>Tindakan</label>
    <textarea class="form-control" rows="5" name="tindakan"><?= $data['obat']->tindakan ?></textarea>
  </div>
  <div class="form-group">
  	<input type="submit" value="ubah" class="btn btn-primary btn-sm">
  </div>
 </form>
<div class="row">
	<div class="col-md-12 text-center">
		<h3 class="text-capitalize">hasil diagnosa</h3><hr>
	</div>
	<div class="col-md-6">
			<table width="100%">
				<tr>
					<td width="250">Tanggal diagnosa</td>
					<td>: <?= date_indo($data['diagnosa']->tgl_diagnosa) ?></td>
				</tr>
				<tr>
					<td>Nama Kelinci</td>
					<td>: <?= $data['kelinci']->nama_kelinci ?></td>
				</tr>
				<tr>
					<td>Umur</td>
					<td>: <?= $data['kelinci']->umur ?> Bulan</td>
				</tr>
			</table>
	</div>
	<div class="col-md-6">
			<table width="100%">
				<tr>
					<td>Pemilik</td>
					<td>: <?= $data['user']->nama_depan.' '.$data['user']->nama_belakang ?></td>
				</tr>
				<tr>
					<td width="250">Alamat</td>
					<td>: <?= $data['user']->alamat ?></td>
				</tr>
				<tr>
					<td>No. Hp</td>
					<td>: <?= $data['user']->no_hp ?></td>
				</tr>
			</table>
	</div>
</div>

<hr>

<div class="row my-3">
	<div class="col-md-12">
		<div class="table-responsive">
			
		<table class="table table-bordered">
			<tr class="bg-secondary">
				<td>Nama Penyakit</td>
				<td>Nama Gejala</td>
				<td>Posterior</td>
				<td>Cf Total</td>
			</tr>
			<?php
			$no = 1;
			 foreach ($data['hasil'] as $row): ?>
				<tr>

					<td><?= filterdouble($no, $data['diagnosa']->nama_penyakit); ?></td>
					<td><?= $row->nama_gejala; ?></td>
					<td><?= filterdouble($no, $data['diagnosa']->posterior); ?></td>
					<td><?= filterdouble($no, $data['cftotal'].'%'); ?></td>
				</tr>
				<?php $no++ ?>
			<?php endforeach ?>
		</table>
		</div>
	</div>
</div>

<div class="row my-3">
	<div class="col-md-12">
		<table class="table table-bordered"">
			<tr class="bg-secondary">
				<td>Nama Penyakit</td>
				<td>Obat</td>
				<td>Aturan</td>
				<td>Pencegahan</td>
			</tr>
			<?php if ($data['obat']): ?>
				
				<tr>
					<td><?= $data['obat']['nama_penyakit']; ?></td>
					<td><?= $data['obat']['nama_obat']; ?></td>
					<td><?= $data['obat']['aturan']; ?></td>
					<td><?= $data['obat']['pencegahan']; ?></td>
				</tr>
			<?php else: ?>
				<tr class="text-center">
					<td colspan="4">Data obat dan pencegahan belum ada data</td>
				</tr>
			<?php endif ?>
		</table>
	</div>
</div>
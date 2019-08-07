<div class="container my-3">
	<div class="row">
		<div class="col-md-12">
			<header>
				<p><strong>Identitas Kelinci</strong> > Diagnosa</p>
			</header>
			<div class="container">
				<p><?php echo $data['gejala']->pertanyaan ?></p>
				<form method="post" action="<?= base_url('user/prosesdiagnosa/' . $data['id_diagnosa']) ?>">
					<div class="form-group">
						<input type="hidden" name="id_gejala" value="<?= $data['gejala']->id_gejala ?>">
						<input type="radio" name="status" value="ya"> Ya <br>
						<input type="radio" name="status" value="tidak"> Tidak
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary" value="Next">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
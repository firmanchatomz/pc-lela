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
					<div class="row">
						<div class="col-md-3 pt-2">
							<div class="form-group">
								<label for="">Tingkat Kepercayaan</label>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<select name="nilai_kepercayaan" id="" class="form-control">
									<option value="0">0</option>
									<option value="0.1">0,1</option>
									<option value="0.2">0,2</option>
									<option value="0.3">0,3</option>
									<option value="0.4">0,4</option>
									<option value="0.5">0,5</option>
									<option value="0.6">0,6</option>
									<option value="0.7">0,7</option>
									<option value="0.8">0,8</option>
									<option value="0.9">0,9</option>
									<option value="1">1</option>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary" value="Next">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
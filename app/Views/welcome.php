<!DOCTYPE html>
<html>
<head>
	<!-- kode meta html -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Welcome to Framework Chatomz</title>

	<!-- link css style -->
	<link rel="stylesheet" type="text/css" href=<?= base_url('bootstrap4.1/css/bootstrap.min.css');?>
	<link rel="stylesheet" type="text/css" href=<?= base_url('css/chatomz.css');?>>
	<link rel="stylesheet" type="text/css" href=<?= base_url('font-awesome5/css/all.min.css')?>>
	<link rel="shortcut icon" href=<?= base_url('assets/img/fc.ico');?>>
</head>
<body>

<div class="container mt-3">
	<div class="row">
		<div class="col">
			<div class="card">
				<div class="card-header bg-info text-light">
					<strong>Framework Chatomz Beta 1.8.8</strong>
				</div>
				<div class="card-body">
					<div class="media">
						<img width="150" src=<?= base_url('assets/img/logo.png')?> >
						<div class="media-body p-2">
							<h3>SELAMAT DATANG DI FRAMEWORK PHP CHATOMZ</h3><hr>
							<p class="text-secondary text-justify">Framework ini masih dalam tahap pengembangan, meskipun versi Beta Version. Frawework ini sudah support untuk project skala kecil dan menengah, Kemudahan dalam penggunaan framework ini menjadi daya tarik develover pemula untuk membuat sebuah website</p>
						</div>
					</div>

					<p class="font-weight-bold">Framework Chatomz sudah tertanam beberapa library tambahan :</p>
					<ol class="small text-capitalize">
						<li>Bootstrap 4.1.3</li>
						<li>J-Query</li>
						<li>Chart Js</li>
						<li>phpfPdf</li>
						<li>Font-Awesome 5.3.1</li>
						<li>datatables</li>
					</ol>
					<p class="font-weight-bold">Catatan :</p>
					<p>konfigurasi website klik link <a target="_blank" href=<?= base_url('config')?>>Config</a></p>
					<p>Baca Guide Framework Chatomz sebagai dasar struktur Framework</p>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>

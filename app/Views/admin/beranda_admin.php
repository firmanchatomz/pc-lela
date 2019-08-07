<div class="row">
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="clearfix">
          <div class="float-left">
            <i class="mdi mdi-account text-primary icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="mb-0 text-right">Total User</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0"><?= $data['jumlah']['jumuser'] ?></h3>
            </div>
          </div>
        </div>
        <p class="text-muted mt-3 mb-0">
          <i class="mdi mdi-account mr-1" aria-hidden="true"></i>data total user <br>
        </p>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="clearfix">
          <div class="float-left">
            <i class="mdi mdi-note text-warning icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="mb-0 text-right">Total Pengetahuan</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0"><?= $data['jumlah']['jumpengetahuan'] ?></h3>
            </div>
          </div>
        </div>
        <p class="text-muted mt-3 mb-0">
          <i class="mdi mdi-note mr-1" aria-hidden="true"></i> data basis pengetahuan
        </p>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="clearfix">
          <div class="float-left">
            <i class="mdi mdi-library-plus text-success icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="mb-0 text-right">Total Penyakit</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0"><?= $data['jumlah']['jumpenyakit'] ?></h3>
            </div>
          </div>
        </div>
        <p class="text-muted mt-3 mb-0">
          <i class="mdi mdi-library-plus mr-1" aria-hidden="true"></i> data total penyakit
        </p>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="clearfix">
          <div class="float-left">
            <i class="mdi mdi-pulse text-info icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="mb-0 text-right">Total Gejala</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0"><?= $data['jumlah']['jumgejala'] ?></h3>
            </div>
          </div>
        </div>
        <p class="text-muted mt-3 mb-0">
          <i class="mdi mdi-pulse mr-1" aria-hidden="true"></i> data total gejala
        </p>
      </div>
    </div>
  </div>
</div>



<!-- grafik admin-->

<?php if (akses('admin')): ?>
  
<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header bg-primary text-white">
        <strong>Data Grafik jumlah diagnosis perbulan</strong>
        <strong class="float-right"><?= getmonthindo() ?></strong>
      </div>
      <div class="card-body">
        <?= $chart->bar('Data Grafik jumlah diagnosis perbulan',$data['jumlah']['chart_da'][0],$data['jumlah']['chart_da'][1],'150','50'); ?>
      </div>
    </div>
  </div>
</div>
<?php endif ?>

<!-- grafik pakar -->
<?php if (akses('pakar')): ?>
  
<div class="row">
   <div class="col-sm-6">
    <div class="card">
      <div class="card-header bg-primary text-white">
        <strong>Data Grafik Gejala yang sering dialami</strong>
      </div>
      <div class="card-body">
        <?= $chart->bar('data grafik gejala',$data['jumlah']['chart_d'][0],$data['jumlah']['chart_d'][1]); ?>
      </div>
    </div>
  </div>
   <div class="col-sm-6">
    <div class="card">
      <div class="card-header bg-primary text-white">
        <strong>Data Grafik Penyakit yang sering dialami</strong>
      </div>
      <div class="card-body">
        <?= $chart->bar('data grafik penyakit',$data['jumlah']['chart_p'][0],$data['jumlah']['chart_p'][1]); ?>
      </div>
    </div>
  </div>
</div>
<?php endif ?>



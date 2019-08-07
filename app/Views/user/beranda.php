<div class="row">
  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="clearfix">
          <div class="float-left">
            <i class="mdi mdi-format-list-bulleted text-primary icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="mb-0 text-right">Total Diagnosa</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0"><?= $data['jumlah']['jumdiagnosa'] ?></h3>
            </div>
          </div>
        </div>
        <p class="text-muted mt-3 mb-0">
          <i class="mdi mdi-format-list-bulleted mr-1" aria-hidden="true"></i>data total diagnosa <br>
        </p>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="clearfix">
          <div class="float-left">
            <i class="mdi mdi-timetable text-warning icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="mb-0 text-right">Total Diagnosa/bulan</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0"><?= $data['jumlah']['jumdiagnosabulan'] ?></h3>
            </div>
          </div>
        </div>
        <p class="text-muted mt-3 mb-0">
          <i class="mdi mdi-timetable mr-1" aria-hidden="true"></i> diagnona per bulan
        </p>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="clearfix">
          <div class="float-left">
            <i class="mdi mdi-cat text-success icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="mb-0 text-right">Total Kucing</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0"><?= $data['jumlah']['jumdiagnosa'] ?></h3>
            </div>
          </div>
        </div>
        <p class="text-muted mt-3 mb-0">
          <i class="mdi mdi-cat mr-1" aria-hidden="true"></i> data total kucing
        </p>
      </div>
    </div>
  </div>
</div>

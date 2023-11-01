<div class="content-wrapper">
<div class="container-fluid" style="background-color: white; height: 700px;">
        <ol class="breadcrumb" style="background-color: #3a3a3a;">
            <li class="breadcrumb-item">
              <a href="" style="color: white;">My Profile</a>
            </li>
            <li class="breadcrumb-item active" style="color: white;">Overview</li>
          </ol>
    <style>
      /* .container-fluid, .container-lg, .container-md, .container-sm, .container-xl {
          width: 100%;
          padding-right: 7.5px;
          padding-left: 257.5px;
          padding-top: 95px ;
          margin-right: auto;
          margin-left: auto;
        } */
    </style>
<center>
  <div class="col-md-6">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-info" style="background-color: #6cbda0!important;">
                <h3 class="widget-user-username"><?= $user['nama'] ?></h3>
                <h5 class="widget-user-desc"><?= $user['email'] ?></h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle elevation-2" src="<?= base_url ('assets/img/profile/').$user['gambar'];?>" class="img-circle elevation-2" alt="User Avatar">
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">-</h5>
                      <span class="description-text">Instagram</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">-</h5>
                      <span class="description-text">Portofolio</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header">-</h5>
                      <span class="description-text">No. Hp</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>

              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">-</h5>
                      <span class="description-text">Instagram</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">-</h5>
                      <span class="description-text">Portofolio</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header">-</h5>
                      <span class="description-text">No. Hp</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.widget-user -->
          </div>
</center>
</div>
</div>
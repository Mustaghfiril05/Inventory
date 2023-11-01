
<style>
  .info-box {
    border-radius: 20px;
  }
  .info-box .info-box-icon {
    border-radius: 20px;
  }
  .info-box .info-box-icon {
    width: 169px;
  }
</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid" style="background-color: black; border-radius:12px;">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><b style="font-size: 16px; color:#fff;">Inventory | Dashboard</b></h1>
          </div><!-- /.col -->
          <hr>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li  style="color: #fff;" class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
      <?php 
          $StatusTotal = $Retail + $Industry + $Transport + $Marine;
          $pcRetail =  round(($Retail!=0)?($Retail / $StatusTotal) * 100:0);
          $pcIndustry = round(($Industry!=0)?($Industry / $StatusTotal) * 100:0);
          $pcTransport =  round(($Transport!=0)?($Transport / $StatusTotal) * 100:0);
          $pcMarine =  round(($Marine!=0)?($Marine / $StatusTotal) * 100:0);
			?>
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i style="font-size: 19px;" class="fas fa-home faa-shake animated"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Retail</span>
                <span class="info-box-number">
                  <?php echo $pcRetail; ?>
                  <small>%</small>
                  <div class="text-xs font-weight-bold">Total<a> : <?php echo $StatusTotal; ?> Data</a></div>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i style="font-size: 19px;" class="fas fa-industry fa-2x faa-bounce animated"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Industry</span>
                <span class="info-box-number">
                  <?php echo $pcIndustry; ?>
                  <small>%</small>
                  <div class="text-xs font-weight-bold">Total<a> : <?php echo $StatusTotal; ?> Data</a></div>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i style="font-size: 19px;" class="fas fa-car faa-vertical animated"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Transport</span>
                <span class="info-box-number">
                  <?php echo $pcTransport; ?>
                  <small>%</small>
                  <div class="text-xs font-weight-bold">Total<a> : <?php echo $StatusTotal; ?> Data</a></div>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i style="font-size: 19px; color:#fff;" class="fas fa-ship faa-pulse animated"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Marine</span>
                <span class="info-box-number">
                  <?php echo $pcMarine; ?>
                  <small>%</small>
                  <div class="text-xs font-weight-bold">Total<a> : <?php echo $StatusTotal; ?> Data</a></div>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  
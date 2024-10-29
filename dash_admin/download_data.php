<?php include "header.php"; ?>
<div class="wrapper">
  <!-- Star menu -->
  <?php include "menu.php";?>
  <!-- End menu -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo "$i[nama] "; ?>
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Lihat Data</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="glyphicon glyphicon-tasks"></i> UNDUH DATA KARTANU</h3>
              <!-- <a target='blank' href='ups.php' class="pull-right btn btn-flat bg-navy"><i class="glyphicon glyphicon-download-alt"></i> Unduh Semua Data Ke Pdf</a>
              <a target='blank' href='download/data.php' class="pull-right btn btn-flat bg-green"><i class="glyphicon glyphicon-download-alt"></i> Unduh Semua Data Ke Excel</a> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <!--  <div class="col-sm-6">
                <div class="panel panel-primary">
                  <div class="panel-heading"><i class="glyphicon glyphicon-calendar"></i> DATA BERDASARKAN PERIODE TANGGAL</div>
                  <div class="panel-body">
                    <form class='form-horizontal' role='form' method=POST target='blank' action='download/data2.php' enctype='multipart/form-data'>                  
                      <div class='form-group'>
                        <label class='col-sm-3 control-label'>Dari Tanggal:</label>
                        <div class='col-sm-9'>
                          <input type='date' class='form-control' name='from' value="<?php echo date('Y-m-d'); ?>" placeholder='Tuliskan Username' required>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label class='col-sm-3 control-label'>Ke Tanggal  : </label>
                        <div class='col-sm-9'>
                          <input type='date' class='form-control' name='end' value="<?php echo date('Y-m-d'); ?>" placeholder='Tuliskan Password' required>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label class='col-sm-3 control-label'></label>
                        <div class='col-sm-9'>
                          <button type="submit" class="btn btn-flat bg-red"><i class="glyphicon glyphicon-floppy-save"></i> UNDUH DATA PERIODE</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div> -->
              <div class="col-sm-6">
                 <div class="panel panel-info">
                  <div class="panel-heading"><i class="fa fa-file-excel-o"></i> DOWNLOAD SEMUA DATA</div>
                  <div class="panel-body">
                    <div class='form-group'>
                        <div class='col-sm-9'>
                    <center><a target='blank' href='download/data.php' class="pull-right btn btn-flat bg-aqua"><i class="glyphicon glyphicon-download-alt"></i> Unduh Semua Data</a></center>
                  </div></div>
              </div>
            </div>
          </div>
        </div>  
      </div>
    </section>
  </div>
  <?php include "footer.php";?>
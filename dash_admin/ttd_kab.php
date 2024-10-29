<?php include "header.php" ?>
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
        <li><a href="#">Ubah Data</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="glyphicon glyphicon-tasks"></i> DATA TANDA TANGAN</h3>
            </div>
            <!-- /.box-header -->
            <?php
              $b=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM kabupaten WHERE id_kab = '$_GET[id]'"));
            ?>
            <div class="box-body">
            <div class="panel panel-default">
              <div class="panel-heading bg-green"><i class="glyphicon glyphicon-edit"></i> <b>Form Ubah Tanda Tangan</b></div>
                <div class="panel-body">
                  <form class='form-horizontal' role='form' method=POST action='aksi/tandatangan_update.php' enctype='multipart/form-data'>
                    <input type='hidden' name='id_kab' value='<?php echo "$b[id_kab]";?>'>
                    <div class='form-group'>
                      <label class='col-sm-2 control-label'>Nama Kabupaten :</label>
                      <div class='col-sm-4'>
                        <input type='text' class='form-control' value="<?php echo "$b[nama_kabupaten]";?>" disabled>
                      </div>
                      <label class='col-sm-6 control-label'><i>* Untuk merubah nama kabupaten, silahkan menuju menu pengaturan kabupaten</i></label>
                    </div>
                    <div class='form-group'>
                      <label class='col-sm-2 control-label'>Ganti Tanda Tangan : </label>
                      <div class='col-sm-4'>
                        <input type='file' class='form-control' name='tandatangan'>
                      </div>
                      <label class='col-sm-2 control-label'>Tanda Tangan Saat Ini : </label>
                      <div class='col-sm-4'>
                        <img class="img-rounded img-thumbnail" src="../assets/img/tandatangan/<?php echo "$b[tandatangan]";?>" width="200px">
                      </div>
                    </div>
                    <div class='form-group'>
                      <label class='col-sm-2 control-label'></label>
                      <div class='col-sm-10'>
                        <button style="width: 150px" type="submit" class="btn btn-flat btn-primary"><i class="glyphicon glyphicon-floppy-save"></i> S I M P A N</button>
                        <a href="tanda-tangan"><button style="width: 150px" type="button" class="btn btn-flat btn-danger"><i class="glyphicon glyphicon-floppy-remove"></i> B A T A L</button></a>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>  
      </div>
    </section>
  </div>
  <?php include "footer.php";?>
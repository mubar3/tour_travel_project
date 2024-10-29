<?php include "header.php" ?>
<div class="wrapper">
  <!-- Star menu -->
  <?php include "menu.php";?>
  <!-- End menu -->

  <!-- Start content -->
  <div class='content-wrapper'>
    <!-- Content Header (Page header) -->
    <section class='content-header'>
      <h1>
        <?php echo "$i[nama] "; ?>
        <small>Control panel</small>
      </h1>
      <ol class='breadcrumb'>
        <li><a href='home'><i class='fa fa-dashboard'></i> Home</a></li>
        <li class='active'>Ubah Tanda Cap/Stempel</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class='content'>
      <div class='row'>
        <div class='col-md-12'>
          <div class='box box-success'>
            <div class='box-header with-border'>
              <h3 class='box-title'><i class='glyphicon glyphicon-edit'></i> FORM UBAH  CAP/STEMPEL</h3>
            </div>
            <?php
              $b=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM blangko WHERE id = '3' order by id"));
            ?>
            <div class='box-body'>
              <div class="alert bg-orange alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-info-circle"></i> Informasi Penting</h4>
                  <div class="box-body">
                    Silahkan upload cap/stempel kepala sekolah/pimpinan/ketua sekolah/institusi/universitas, dengan format (.png).</a>
                  </div>
                </div>
              <form class='form-horizontal' role='form' method=POST action='aksi/cap_update.php' enctype='multipart/form-data'><br>
                <input type='hidden' name='id' value='<?php echo "$b[id]";?>'>
                <div class='box-body'>
                <div class='form-group'>
                  <label class='col-sm-3 control-label'>Stempel Saat Ini:</label>
                  <div class='col-sm-6'>
                    <img class="img-responsive img-thumbnail" alt="Responsive image" src="../assets/img/tandatangan/<?php echo "$b[gambar]";?>" width="50%"><br>nama file: <?php echo "$b[gambar]";?>
                  </div>
                </div> 
                <div class='form-group'>
                  <label class='col-sm-3 control-label'>Ganti Cap/Stempel Baru:</label>
                  <div class='col-sm-6'>
                    <input type='file' class='form-control' name='gambar'>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-sm-3 control-label'></label>
                  <div class='col-sm-9'>
                    <button style="width: 150px" type="submit" name="simpan" class="btn btn-flat btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> S I M P A N</button>
                    <a href="home"><button style="width: 150px" type="button" class="btn btn-flat btn-danger"><i class="glyphicon glyphicon-floppy-remove"></i> B A T A L</button></a>
                  </div>
                </div>
              </form>
            </div>
          </div>
    </section>
    <!-- /.content -->
  </div>
<!-- End content -->

  <!-- Start footer -->
  <?php include "footer.php";?>
  <!-- End footer -->
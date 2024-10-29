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
        <li class='active'>Ubah Blangko</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class='content'>
      <div class='row'>
        <div class='col-md-12'>
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class='box-title'><i class='glyphicon glyphicon-edit'></i> FORM UBAH BLANGKO</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>
            </div>
            <?php
            $b=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM blangko WHERE id = '4' order by id"));
            ?>
            <div class='box-body'>
              <div class="alert bg-aqua alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-info-circle"></i> Informasi Penting</h4>
                <div class="box-body">
                  Untuk membuat template/desain blangko kartu baru silahkan gunakanah ukuran W: 850 Pixel x H: 262 Pixel.<br>
                  untuk contoh blangko silahkan download <a target="blank" href="download/download.php?nama_file=blangko.tif"><span class='btn btn-sm bg-yellow'>disini...</span></a>
                </div>
              </div>
              <form class='form-horizontal' role='form' method=POST action='aksi/blangko_updatee.php' enctype='multipart/form-data'><br>
                <input type='hidden' name='id' value='<?php echo "$b[id]";?>'>
                <div class='box-body'>
                  <div class='form-group'>
                    <label class='col-sm-3 control-label'>Blangko Kartu Saat Ini:</label>
                    <div class='col-sm-3'>
                      <img class="img-responsive img-thumbnail" alt="Responsive image" src="../assets/img/blangko/<?php echo "$b[gambar]";?>" width="5300px"><br><?php echo "$b[gambar]";?>
                    </div>
                    <label class='col-sm-2 control-label'>Ganti Blangko Baru:</label>
                    <div class='col-sm-3'>
                      <input type='file' class='form-control' name='gambar'>
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class='col-sm-3 control-label'>Nama Peraturan:</label>
                    <div class='col-sm-3'>
                      <input type='text' class='form-control' name='judul' value="<?php echo "$b[judul]";?>">
                    </div>

                    <label class='col-sm-2 control-label'>Masa Aktif Kartu:</label>
                    <div class='col-sm-2'>
                      <input type='number' class='form-control' name='tahun' value="<?php echo "$b[tahun]";?>">
                    </div>
                    <label class='col-sm-1 control-label pull-left'>Tahun</label>
                  </div>
                  <div class='form-group'>
                    <label class='col-sm-3 control-label'>Tulisan Dalam Kurung ():</label>
                    <div class='col-sm-8'>
                      <textarea type='text' style="height: 100px;" class='form-control' name='judul1' value="<?php echo "$b[judul1]";?>"><?php echo "$b[judul1]";?></textarea> 
                    </div>
                  </div>
                  <div class='form-group'>
                    <label class='col-sm-3 control-label'>Ganti Rincian Peraturan:</label>
                    <div class='col-sm-8'>
                      <div class="box box-info">
                        <div class="box-header">
                          <h3 class="box-title">CK Editor
                            <small>by lokon.id</small>
                          </h3>
                          <!-- tools box -->
                          <div class="pull-right box-tools">
                            <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                              <i class="fa fa-minus"></i></button>
                              <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fa fa-times"></i></button>
                              </div>
                              <!-- /. tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body pad">
                              <textarea id="editor1" name="editor1" rows="10" cols="80">
                                <?php echo "$b[peraturan]";?>
                              </textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label class='col-sm-3 control-label'></label>
                        <div class='col-sm-9'>
                          <button style="width: 100px" type="submit" name="simpan" class="btn btn-flat btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> S I M P A N</button>
                          <a href="home"><button style="width: 100px" type="button" class="btn btn-flat btn-danger"><i class="glyphicon glyphicon-floppy-remove"></i> B A T A L</button></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>




            </div>
          </div>
        </div>
      </section>



      <?php include "footer.php";?>

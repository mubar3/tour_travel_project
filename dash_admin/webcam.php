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
        <li class='active'>Tampil Data</li>
      </ol>
    </section>


    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="glyphicon glyphicon-picture"></i> DATA WEBCAME</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
               <form method="POST" action="aksi/webcam_save.php">    
                 <div class="col-md-6">      
                  <div class="panel panel-primary bg-blank">
                    <div class="panel-heading">
                      <h3 class="panel-title"><i class="glyphicon glyphicon-camera"></i> Camera Webcam</h3>
                    </div>
                    <div class="panel-body">
                      <center>
                        <div id="my_camera">

                        </div>
                        <hr><input class='btn btn-success' type=button value="Ambil Gambar" onClick="take_snapshot()">
                        <input type="hidden" name="gambar" class="image-tag"></center><hr>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="panel panel-success">
                      <div class="panel-heading">
                        <h3 class="panel-title"><i class="glyphicon glyphicon-picture"></i> Hasil Camera Webcam</h3>
                      </div>
                      <div class="panel-body" style="padding-left: ">
                        <div id="results">Your captured image will appear here...</div>
                      </div>
                    </div>
                    <input type="text" name="nama" class="form-control" placeholder="Tuliskan Nama Gambar" required><br>
                    <button class="btn btn-primary">Simpan Gambar</button>
                  </div>
                </form>
                <div class="col-md-12">
                  <div class="table-responsive">
                    <table id="example1" class="table table-striped">
                      <thead>
                        <tr style="background-color: #3c8dbc; color: #fff;">
                          <th>No.</th>
                          <th>Gambar</th>
                          <th>Nama Gambar</th>
                          <th>Tanggal</th>
                          <th>Lokasi Gambar</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php

                        

                        $tampil = mysqli_query($koneksi, "SELECT * FROM hasil ORDER BY id DESC");
                        $no=1;
                        while ($rr=mysqli_fetch_array($tampil))
                        {
                          $tgl=date("d - m - Y", strtotime($rr['tgl']));
                          ?>
                          <tr>
                            <td><?php echo "$no.";?></td>
                            <td><img class='img-thumbnail' src='../assets/webcam2/upload/<?php echo $rr["gambar"];?>' width=50</td>
                            <td><?php echo $rr["gambar"];?></td>
                            <td><?php echo $tgl?></td>
                            <td>assets/webcam2/upload/<?php echo $rr["gambar"];?></td>
                            <td>
                              <a target="blank" href="../assets/webcam2/upload/download.php?nama_file=<?php echo $rr["gambar"];?>" title='Hapus Data'><span class='btn btn-sm btn-info'><i class="glyphicon glyphicon-download"></i></span></a>
                              <a class='btn btn-sm btn-danger' data-toggle='tooltip' title='Hapus Data' href='../assets/webcam2/hapus.php?id=<?php echo $rr["id"];?>' onclick="return confirm('Apa anda yakin akan menghapus data ini?')"><i class="glyphicon glyphicon-trash"></i></a>
                            </td>
                          </tr>

                          <?php  $no++; } ?>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>  
      </div>
    </section>
  </div>

  <script src="../assets/webcam/java.js"></script>
  <script src="../assets/webcam/webcam.min.js"></script>
  <script language="JavaScript">
    Webcam.set({
      // live preview size
      width: 300,
      height: 230,
      
      // device capture size
      dest_width: 300,
      dest_height: 230,
      
      // final cropped size
      crop_width: 184,
      crop_height: 230,
      
      // format and quality
      image_format: 'jpeg',
      jpeg_quality: 90
    });

    Webcam.attach( '#my_camera' );

    function take_snapshot() {
      Webcam.snap( function(data_uri) {
        $(".image-tag").val(data_uri);
        document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
      } );
    }
  </script>
  <?php include "footer.php";?>



<?php include "header.php" ?>
<div class="wrapper">
  <!-- Star menu -->
  <?php include "menu.php";?>
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
        <li class='active'>Tambah Data</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class='content'>
      <div class='row'>
        <div class='col-md-12'>
          <div class='box box'>
            <div class='box-header bg-green with-border'>
              <h3 class='box-title'><i class='fa fa-edit'></i> FORM TAMBAH DATA</h3>
              <!-- <a data-toggle="modal" data-target="#myModalset" type="submit" class="pull-right btn btn-sm bg-orange"><i class="fa fa-sort-numeric-asc"></i> INFORMASI NOMOR ANGGOTA</a> -->
            </div>
            <form class='form-horizontal' role='form' method=POST action='aksi/admin_simpan.php' enctype='multipart/form-data'>

              <div class='box-body'>
                

                <div class='form-group'>
                  <label class='col-sm-3 control-label'>Nama :</label>
                  <div class='col-sm-8'>
                    <input type='text' style='text-transform: capitalize;' class='form-control' name='nama' placeholder='Tuliskan Nama Lengkap'>
                  </div>
                </div>

                <div class='form-group'>
                  <label class='col-sm-3 control-label'>Email :</label>
                  <div class='col-sm-8'>
                    <input type='email' style='text-transform:' class='form-control' name='email' placeholder='Tuliskan Email'>
                  </div>
                </div>

                <div class='form-group'>
                  <label class='col-sm-3 control-label'>Password :</label>
                  <div class='col-sm-8'>
                    <input type='password' style='text-transform:' class='form-control' name='pass' placeholder='Tuliskan Password'>
                  </div>
                </div>
          
          <div class='form-group'>
                      <label class='col-sm-3 control-label'>No. Telepon:</label>
                      <div class='col-sm-3'>
                        <input type="number" style='text-transform:' class='form-control' name='hp' placeholder='Tuliskan Nomor Telepon'>
                      </div>
                      
                    </div>
          
           <div class='form-group'>
                      <label class='col-sm-3 control-label'>Provinsi :</label>
                      <div class='col-sm-3'>
                       <select id="provinsi" name='provinsi' class='form-control'>
                        <?php
                        $tampil = mysqli_query($koneksi, "SELECT * FROM provinsi ");
                        while($row=mysqli_fetch_array($tampil)) {
                          ?>
                          <option value="<?php echo $row['id_prov']; ?>"><?php echo $row['nama_provinsi']; ?></option>
                          <?php
                        }
                        ?>
                      </select>
                    </div>
                    <label class='col-sm-2 control-label'>Kabupaten/Kota :</label>
                    <div class='col-sm-3'>
                     <select id="kabupaten" name='kabupaten' class='form-control' >
                      <?php
                      $tampil = mysqli_query($koneksi, "SELECT * FROM kabupaten ");
                      while($row=mysqli_fetch_array($tampil)) {
                        ?>
                        <option id="kabupaten" class="<?php echo $row['id_prov']; ?>" value="<?php echo $row['id_kab']; ?>"><?php echo $row['nama_kabupaten']; ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
        
        <div class='form-group'>
                  <label class='col-sm-3 control-label'>Kecamatan :</label>
                  <div class='col-sm-3'>
                   <select id="kecamatan" name='kecamatan' class='form-control' required>
                    <option value='' selected>Pilih Kecamatan</option>
                    <?php
                    $tampil = mysqli_query($koneksi, "SELECT * FROM kecamatan ORDER BY nama_kecamatan");
                    while($row=mysqli_fetch_array($tampil)) {
                      ?>
                      <option id="kecamatan" class="<?php echo $row['id_kab']; ?>" value="<?php echo $row['id_kec']; ?>"><?php echo $row['nama_kecamatan']; ?></option>
                      <?php
                    }
                    ?>
                  </select>
                </div>
                <label class='col-sm-2 control-label'>Kelurahan/Desa : </label>
                <div class='col-sm-3'>
                  <select id="kelurahan" name='kelurahan' class='form-control' required>
                    <option value='' selected>Pilih Kelurahan</option>
                    <?php
                    $tampil = mysqli_query($koneksi, "SELECT * FROM kelurahan ORDER BY nama_kelurahan");
                    while($row=mysqli_fetch_array($tampil)) {
                      ?>
                      <option id="kelurahan" class="<?php echo $row['id_kec']; ?>" value="<?php echo $row['id_kel']; ?>"><?php echo $row['nama_kelurahan']; ?></option>
                      <?php
                    }
                    ?>
                  </select>
                </div>
              </div>
        
         <div class='form-group'>
                      <label class='col-sm-3 control-label'>Alamat (dusun) :</label>
                      <div class='col-sm-3'>
                        <textarea class='form-control' name='alamat' placeholder='Tuliskan Alamat Rumah Contoh: Jl. Mundur Alon-alon'></textarea>
                      </div>
            <label class='col-sm-2 control-label'>RT:</label>
            <div class='col-sm-1'>
            <input type='text' class='form-control' name='rt'  placeholder="Tuliskan RT Anda">
            </div>
            <label class='col-sm-1 control-label'>RW:</label>
            <div class='col-sm-1'>
            <input type='text' class='form-control' name='rw'  placeholder="Tuliskan RW Anda">
            </div>

                    </div>

          


            <div class='form-group'>
              
              <label class='col-sm-3 control-label'>Unggah Foto :</label>
              <div class='col-sm-6'>
                <input type='file' class='form-control' name='gambar'>
              </div>
            </div>
             <?php
            session_start();
            ?>
            <div class='form-group'>
                     <label class='col-sm-3 control-label'>Admin Tingkat :</label>
                      <div class='col-sm-3'>
                       <select id="provinsi" name='admin' class='form-control'>
                        
                        <option value="1">PCNU</option>
                        <option value="2">MWCNU</option>
                        <option value="3">Ranting</option>
                        
                      </select>
            </div>
          </div>
                    <hr>

           
            
            <input type='hidden' class='form-control' name='user' value="<?php echo $_SESSION['username']; ?>">
            <input type='hidden' class='form-control' name='id' value="<?php echo $_SESSION['id']; ?>">

            <div class='box-footer'>
              <label class='col-sm-3 control-label'></label>
              <div class='col-sm-9'>
                <button type="submit" class="btn btn-flat btn-primary"><i class="glyphicon glyphicon-floppy-save"></i> S I M P A N</button>
                <a  href="view-data-admin" type="button" class="btn btn-flat btn-danger"><i class="glyphicon glyphicon-floppy-remove"></i> B A T A L</a>
              </div>
            </div>

          </form>
        </div>
      </section>
      <!-- /.content -->
    </div>

    <div class="modal fade" id="myModalset" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-green">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-sort-numeric-asc"></i> SET NOMOR ANGGOTA <strong><?php echo "$i[nama] "; ?></strong></h4>
          </div>
          <div class="modal-body">
            <center><img class='img-thumbnail' style="background-color: #026537;" src="../assets/img/logo/<?php echo "$i[gambar] "; ?>" width="90px">
            </center><br>
            <label align='justify'>Nomor Anggota Muslimat NU akan terinput secara otomatis, jika saat penambahan data pertama telah mengisi nomor urut awal anggota, contoh jika input nomor anggota di mulai dari (0001), maka nomor anggota berikutnya akan otomatis menjadi (0002) dan seterusnya.</i>
            </label>
            <br>
            <br>
            <table class="table table-bordered table-striped">
              <tr>
                <th colspan="2" style="text-align: center;">PENULISAN NOMOR ANGGOTA YANG BENAR DAN SALAH</th>
              </tr>
              <tr>
                <td width="250px">0001</td>
                <td>Benar</td>
              </tr>
              <tr>
                <td width="100px">1</td>
                <td>Salah</td>
              </tr>
              <tr>
                <td width="100px">0010</td>
                <td>Benar</td>
              </tr>
              <tr>
                <td width="100px">10</td>
                <td>Salah</td>
              </tr>
              <tr>
                <td width="100px">0100</td>
                <td>Benar</td>
              </tr>
              <tr>
                <td width="100px">100</td>
                <td>Salah</td>
              </tr>
              <tr>
                <td width="100px">1000</td>
                <td>Benar</td>
              </tr>
            </table>

          </div>

          <div class="modal-footer">
           <button type="button" class="btn bg-orange" data-dismiss="modal">Kembali</button>
         </div>

       </div>
     </div>

   </center></div>
   <!-- End content -->
   <script src="../assets/webcam/java.js"></script>
   <script src="../assets/webcam/webcam.min.js"></script>
   <!-- <script language="JavaScript">
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
  </script> -->
  <?php include "footer.php";?>
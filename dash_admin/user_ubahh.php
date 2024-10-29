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
        <li class='active'>Ubah Data</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class='content'>
      <div class='row'>
        <div class='col-md-12'>
          <div class='box box-success'>
            <div class='box-header with-border'>
              <h3 class='box-title'><i class='glyphicon glyphicon-edit'></i> FORM UBAH DATA ANGGOTA KARTANU</h3>
            </div>
            <form class='form-horizontal' role='form' method=POST action='aksi/user_updatee.php' enctype='multipart/form-data'>
              <div class='box-body'>
                <?php
                $rr=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM users 
                  INNER JOIN level ON users.id_level= level.id_level
                  INNER JOIN kelurahan ON users.id_kel= kelurahan.id_kel
                  INNER JOIN kabupaten ON users.id_kab= kabupaten.id_kab 
                  INNER JOIN kecamatan ON users.id_kec= kecamatan.id_kec 
                  INNER JOIN provinsi ON users.id_prov= provinsi.id_prov 
                  INNER JOIN banom ON users.idbanom= banom.idbanom
                  WHERE id='$_GET[id]'"));
                  ?>
                  <input type='hidden' class='form-control' name='idx' value="<?php echo $_SESSION['id']; ?>">
                  <input type='hidden' class='form-control' name='id' value="<?php echo $rr['id']; ?>">
                  <div class='form-group'>
                    <!-- <label class='col-sm-2 control-label'>Nomor Anggota:</label>
                    <div class='col-sm-4'>
                      <input type='text' name='a' class='form-control' value="<?php echo $rr['no_anggota']; ?>">
                    </div> -->
                    <label class='col-sm-2 control-label'>NIK: </label>
                    <div class='col-sm-10'>
                     <input type='text' name='b' class='form-control' value="<?php echo $rr['nik']; ?>">
                   </select>
                 </div>
               </div>
               <div class='form-group'>
                <label class='col-sm-2 control-label'>Nama:</label>
                <div class='col-sm-10'>
                  <input type='text' style='text-transform: capitalize;' name='c' class='form-control' value="<?php echo $rr['nama']; ?>">
                </div><!-- 
                <label class='col-sm-2 control-label'>Jabatan : </label>
                <div class='col-sm-4'>
                  <select name='d' class='form-control' id='jabatan'>
                    <option value='<?php echo $rr['jabatan']; ?>'></option>
                    <option class="<?php echo $rr['jabatan']; ?>" value="Ketua Umum"  id='jabatan'>Ketua Umum</option>
                    <option class="<?php echo $rr['jabatan']; ?>" value="Ketua"  id='jabatan'>Ketua</option>
                    <option class="<?php echo $rr['jabatan']; ?>" value="Wakil Ketua"  id='jabatan'>Wakil Ketua</option>
                    <option class="<?php echo $rr['jabatan']; ?>" value="Sekretaris Umum"  id='jabatan'>Sekretaris Umum</option>
                    <option class="<?php echo $rr['jabatan']; ?>" value="Sekretaris"  id='jabatan'>Sekretaris</option>
                    <option class="<?php echo $rr['jabatan']; ?>" value="Wakil Sekretaris"  id='jabatan'>Wakil Sekretaris</option>
                    <option class="<?php echo $rr['jabatan']; ?>" value="Bendahara"  id='jabatan'>Bendahara</option>
                    <option class="<?php echo $rr['jabatan']; ?>" value="Wakil Bendahara"  id='jabatan'>Wakil Bendahara</option>
                    <option class="<?php echo $rr['jabatan']; ?>" value="Anggota"  id='jabatan'>Anggota</option>
                    <option class="<?php echo $rr['jabatan']; ?>" value="Lainnya"  id='jabatan'>Lainnya</option>
                  </select>
                </div> -->
              </div>

              <!-- <div class='form-group'>
                <label class='col-sm-2 control-label'>Masa Bhakti :</label>
                <div class='col-sm-4'>
                  <input type='text' class='form-control' name='e' value="<?php echo $rr['masa_b1']; ?>">
                </div>
                <label class='col-sm-2 control-label'>Sampai / Dengan : </label>
                <div class='col-sm-4'>
                  <input type='text' class='form-control' name='f' value="<?php echo $rr['masa_b2']; ?>">
                </div>
              </div> -->

              <div class='form-group'>
                <label class='col-sm-2 control-label'>ID | Nama Banom:</label>
                <div class='col-sm-10'>
                 <select name='g' class='form-control' id="banom">
                  <option value='<?php echo $rr['idbanom']; ?>' selected><?php echo $rr['idbanom']; ?> | <?php echo $rr['nama_banom']; ?></option>
                  <?php
                  $tampil = mysqli_query($koneksi, "SELECT * FROM banom ORDER BY idbanom");
                  while($row=mysqli_fetch_array($tampil)) {
                    ?>
                    <option class="<?php echo $rr['idbanom']; ?>" id="banom" value="<?php echo $row['idbanom']; ?>"><?php echo $row['idbanom']; ?> | <?php echo $row['nama_banom']; ?></option>
                    <?php
                  }
                  ?>
                </select>
              </div>
            </div>
            <hr>
            
            <div class='form-group'>
              <label class='col-sm-2 control-label'>Tempat lahir:</label>
              <div class='col-sm-4'>
                <input class='form-control' style='text-transform: capitalize;' name='h' value="<?php echo $rr['tmp_lhr']; ?>">
              </div>
              <label class='col-sm-2 control-label'>Tanggal Lahir : </label>
              <div class='col-sm-4'>
                <input type='date' class='form-control' name='i' value="<?php echo $rr['tgl_lhr']; ?>">
              </div>
            </div>
            
            <div class='form-group'>
              <label class='col-sm-2 control-label'>Jenis Kelamin: </label>
              <div class='col-sm-4'>
                <select name='jk' class='form-control' id='jk'>
                  <option value='<?php echo $rr['jk']; ?>' selected></option>
                  <option class='<?php echo $rr['jk']; ?>' value="Laki-laki" id='jk'>Laki-laki</option>
                  <option class='<?php echo $rr['jk']; ?>' value="Perempuan" id='jk'>Perempuan</option>
                </select>
              </div>
              <label class='col-sm-2 control-label'>Alamat :</label>
              <div class='col-sm-4'>
                <input class='form-control' name='j' value="<?php echo $rr['alamat']; ?>">
              </div>
            </div>
            
            <div class='form-group'>
              <label class='col-sm-2 control-label'>Provinsi :</label>
              <div class='col-sm-4'>
               <select name='k' class='form-control' id="provinsi">
                <option value='<?php echo $rr['id_prov']; ?>'><?php echo $rr['nama_provinsi']; ?></option>
                <?php
                $tampil = mysqli_query($koneksi, "SELECT * FROM provinsi ORDER BY nama_provinsi");
                while($row=mysqli_fetch_array($tampil)) {
                  ?>
                  <option id="provinsi" value="<?php echo $row['id_prov']; ?>"><?php echo $row['nama_provinsi']; ?></option>
                  <?php
                }
                ?>
              </select>
            </div>
            <label class='col-sm-2 control-label'>Kabupaten :</label>
            <div class='col-sm-4'>
             <select name='l' class='form-control' id='kabupaten'>
              <option value='<?php echo $rr['id_kab']; ?>'><?php echo $rr['nama_kabupaten']; ?></option>
              <?php
              $tampil = mysqli_query($koneksi, "SELECT * FROM kabupaten ORDER BY nama_kabupaten");
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
          <label class='col-sm-2 control-label'>Kecamatan :</label>
          <div class='col-sm-4'>
           <select name='m' class='form-control' id='kecamatan'>
            <option value='<?php echo $rr['id_kec']; ?>'><?php echo $rr['nama_kecamatan']; ?></option>
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
        <label class='col-sm-2 control-label'>Kelurahan : </label>
        <div class='col-sm-4'>
          <select name='n' class='form-control' id='kelurahan'>
            <option value='<?php echo $rr['id_kel']; ?>'><?php echo $rr['nama_kelurahan']; ?></option>
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
        <label class='col-sm-2 control-label'>Telp./Hp. : </label>
        <div class='col-sm-4'>
          <input type='text' class='form-control' name='o' value='<?php echo $rr['hp']; ?>'>
        </div>
        <label class='col-sm-2 control-label'>Email  : </label>
        <div class='col-sm-4'>
          <input type='email' class='form-control' name='p' value='<?php echo $rr['email']; ?>'>
        </div>
      </div>

      <div class='form-group'>
        <label class='col-sm-2 control-label'>Status Perkawinan : </label>
        <div class='col-sm-4'>
          <select name='q' class='form-control' id='kawin'>
            <option value='<?php echo $rr['status_kawin']; ?>' selected></option>
            <option class='<?php echo $rr['status_kawin']; ?>' value="Menikah" id='kawin'>Menikah</option>
            <option class='<?php echo $rr['status_kawin']; ?>' value="Cerai Hidup" id='kawin'>Cerai Hidup</option>
            <option class='<?php echo $rr['status_kawin']; ?>' value="Cerai Mati" id='kawin'>Cerai Mati</option>
          </select>
        </div>
        <label class='col-sm-2 control-label'>Pendidikan Terakhir : </label>
        <div class='col-sm-4'>
          <select name='r' class='form-control' id='pendidikan'>
            <option value='<?php echo $rr['pendidikan']; ?>' selected></option>
            <option class='<?php echo $rr['pendidikan']; ?>' value="Tidak Tamat SD" id='pendidikan'>Tidak Tamat SD</option>
            <option class='<?php echo $rr['pendidikan']; ?>' value="SD/M" id='pendidikan'>SD/M</option>
            <option class='<?php echo $rr['pendidikan']; ?>' value="SMP/Sederajat" id='pendidikan'>SMP/Sederajat</option>
            <option class='<?php echo $rr['pendidikan']; ?>' value="SMA/SMK Sederaja" id='pendidikan'>SMA/SMK Sederajat</option>
            <option class='<?php echo $rr['pendidikan']; ?>' value="Diploma" id='pendidikan'>Diploma</option>
            <option class='<?php echo $rr['pendidikan']; ?>' value="S1" id='pendidikan'>S1</option>
            <option class='<?php echo $rr['pendidikan']; ?>' value="S2" id='pendidikan'>S2</option>
            <option class='<?php echo $rr['pendidikan']; ?>' value="S3" id='pendidikan'>S3</option>
          </select>
        </div>
      </div>

      <div class='form-group'>
        <label class='col-sm-2 control-label'>Pekerjaan Utama:</label>
        <div class='col-sm-4'>
         <select name='s' class='form-control' id='pekerjaan'>
          <option value='<?php echo $rr['pekerjaan']; ?>' selected></option>
          <option class='<?php echo $rr['pekerjaan']; ?>' value="Petani" id='pekerjaan'>Petani</option>
          <option class='<?php echo $rr['pekerjaan']; ?>' value="Pedagang" id='pekerjaan'>Pedagang</option>
          <option class='<?php echo $rr['pekerjaan']; ?>' value="Swasta" id='pekerjaan'>Swasta</option>
          <option class='<?php echo $rr['pekerjaan']; ?>' value="PNS" id='pekerjaan'>PNS</option>
          <option class='<?php echo $rr['pekerjaan']; ?>' value="TNI/POLRI" id='pekerjaan'>TNI/POLRI</option>
          <option class='<?php echo $rr['pekerjaan']; ?>' value="Wirausaha" id='pekerjaan'>Wirausaha</option>
          <option class='<?php echo $rr['pekerjaan']; ?>'  value="Lainnya" id='pekerjaan'>Lainnya</option>
        </select>
      </div>
      <label class='col-sm-2 control-label'>Kemampuan/Profesi: </label>
      <div class='col-sm-4'>
        <input type='text' class='form-control' name='t' value='<?php echo $rr['kemampuan']; ?>'>
      </div>
    </div>

    <div class='form-group'>
      <label class='col-sm-2 control-label'>Fasilitas Kesehatan (BPJS) :</label>
      <div class='col-sm-4'>
        <select name='u' class='form-control' id='bpjs'>
          <option value='<?php echo $rr['bpjs']; ?>' selected></option>
          <option class='<?php echo $rr['bpjs']; ?>' value="Sudah" id='bpjs'>Sudah</option>
          <option class='<?php echo $rr['bpjs']; ?>' value="Belum" id='bpjs'>Belum</option>
        </select>
      </div>
    </div>

    <div class='form-group'>
      <label class='col-sm-2 control-label'>Ganti Foto Baru :</label>
      <div class='col-sm-4'>
        <input type='file' class='form-control' name='gambar'>
      </div>
      <label class='col-sm-2 control-label'>Foto Saat Ini :</label>
      <div class='col-sm-3'>
        <img class="img-responsive img-rounded" alt="Responsive image" src="../assets/img/user/<?php echo "$rr[gambar]";?>" width="50px"> <?php echo "$rr[gambar]";?></div>
      </div>

      <div class='form-group'>
        <label class='col-sm-2 control-label'>Foto Webcam  : </label>
        <div class='col-sm-4'>
          <div class="box box-solid box-primary">
            <div class="box-header">
              <h3 class="panel-title"><i class="fa fa-camera"></i> Camera Webcam</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
              <center> <div id="my_camera"></div><center><br><button class="class='form-control btn btn-flat bg-orange" type=button onClick="take_snapshot()"><i class="glyphicon glyphicon-camera"></i> Ambil Gambar</button>
                <input type="hidden" name="webcam" class="image-tag">
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </div>                  
          <div class="col-md-2"></div>
          <div class="col-md-4">
            <div class="box box-solid box-danger">
              <div class="box-header">
                <h3 class="panel-title"><i class="fa fa-camera"></i> Hasil Camera Webcam</h3>
              </div><!-- /.box-header -->
              <div class="box-body">
                <center><div id="results" class="img-thumbnail"><i class="glyphicon glyphicon-camera"></i></center>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div>

          <input type='hidden' class='form-control' name='user' value="<?php echo $_SESSION['username']; ?>">
          <div class='box-footer'>
            <label class='col-sm-9 control-label'></label>
            <div class='col-sm-3'>
             <button type="submit" class="btn btn-flat btn-primary"><i class="glyphicon glyphicon-floppy-save"></i> S I M P A N</button>
             <a href="view-datax" ><button type="button" class="btn btn-flat btn-danger"><i class="glyphicon glyphicon-floppy-remove"></i> B A T A L</button></a>
           </div>
         </div>
       </div>
     </form>
   </div>
 </section>
 <!-- /.content -->
</div>
<!-- End content -->
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
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
        <li class='active'>Tambah Data</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class='content'>
      <div class='row'>
        <div class='col-md-12'>
          <div class='box box'>
            <div class='box-header bg-orange with-border'>
              <h3 class='box-title'><i class='fa fa-retweet'></i> VALIDASI DATA - NOMOR ANGGOTA TELAH DIPERBAHARUI</h3>
              <a class="pull-right btn btn-sm bg-green"><i class="fa fa-sort-numeric-asc"></i> Silahkan Simpan Kembali Data Inputan</a>
            </div>
            <form class='form-horizontal' role='form' method=POST action='aksi/user_simpanku.php' enctype='multipart/form-data'>

              <div class='box-body'>
                <div class='form-group'>
                  <label class='col-sm-3 control-label'>No. Anggota Baru:</label>
                  <div class='col-sm-3'>
                    <?php
                    $rr=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM user WHERE jk='Perempuan' ORDER by id DESC")); 

                    $nua = $rr['no_anggota']+1;
                    $noa = sprintf("%04s", $nua);
                    $mb1 = mktime(date('Y'));
                    ?>

                    <input type='text' class='form-control' name='a' value="<?php echo $noa; ?>" required>
                  </div> 
                  <label class='col-sm-2 control-label'><i>No. Anggota Terakhir:</i></label>
                  <div class='col-sm-3'>
                    <input type='text' class='form-control' value='<?php echo $rr['no_anggota']; ?>' disabled>
                  </div>
                </div>

                <div class='form-group'>
                  <label class='col-sm-3 control-label'>No. KTP/NIK :</label>
                  <div class='col-sm-8'>
                    <input type='text' class='form-control' name='b' placeholder='Tuliskan Nomor Induk Kependudukan' value='<?php echo $_SESSION['b'];?>'>
                  </div>
                </div>

                <div class='form-group'>
                  <label class='col-sm-3 control-label'>Nama :</label>
                  <div class='col-sm-8'>
                    <input type='text' style='text-transform: capitalize;' class='form-control' name='c' placeholder='Tuliskan Nama Lengkap'  value='<?php echo $_SESSION['c'];?>'>
                  </div>
                </div>

                <div class='form-group'>
                  <label class='col-sm-3 control-label'>Jabatan :</label>
                  <div class='col-sm-8'>
                    <select name='d' class='form-control' id='jabatan'>
                      <option value='<?php echo $_SESSION['d'];?>'></option>
                      <option class='<?php echo $_SESSION['d'];?>' value="Ketua Umum"  id='jabatan'>Ketua Umum</option>
                      <option class='<?php echo $_SESSION['d'];?>' value="Ketua"  id='jabatan'>Ketua</option>
                      <option class='<?php echo $_SESSION['d'];?>' value="Wakil Ketua"  id='jabatan'>Wakil Ketua</option>
                      <option class='<?php echo $_SESSION['d'];?>' value="Sekretaris Umum"  id='jabatan'>Sekretaris Umum</option>
                      <option class='<?php echo $_SESSION['d'];?>' value="Sekretaris"  id='jabatan'>Sekretaris</option>
                      <option class='<?php echo $_SESSION['d'];?>' value="Wakil Sekretaris"  id='jabatan'>Wakil Sekretaris</option>
                      <option class='<?php echo $_SESSION['d'];?>' value="Bendahara"  id='jabatan'>Bendahara</option>
                      <option class='<?php echo $_SESSION['d'];?>' value="Wakil Bendahara"  id='jabatan'>Wakil Bendahara</option>
                      <option class='<?php echo $_SESSION['d'];?>' value="Anggota"  id='jabatan'>Anggota</option>
                      <option class='<?php echo $_SESSION['d'];?>' value="Lainnya"  id='jabatan'>Lainnya</option>
                    </select>
                  </div>
                </div>

                <div class='form-group'>
                  <label class='col-sm-3 control-label'>Masa Bhakti:</label>
                  <div class='col-sm-3'>
                    <input type='text' class='form-control' name='e'  placeholder="Tuliskan Tahun Awal Masa Bhakti" value='<?php echo $_SESSION['e'];?>'>
                  </div>
                  <label class='col-sm-2 control-label'><center>Sampai/Dengan</center></label>
                  <div class='col-sm-3'>
                    <input type='text' class='form-control' name='f'  placeholder="Tuliskan Tahun Akhir Masa Bhakti" value='<?php echo $_SESSION['f'];?>'>
                  </div>
                </div> 


                <div class='form-group'>
                  <label class='col-sm-3 control-label'>Jenjang Kepengurusan :</label>
                  <div class='col-sm-3'>
                    <select name='g' class='form-control' id="jenjang">
                      <option value='<?php echo $_SESSION['g'];?>' selected><?php echo $_SESSION['g'];?></option>
                      <?php
                      $tampil = mysqli_query($koneksi, "SELECT * FROM jenjang ORDER BY id_jenjang");
                      while($row=mysqli_fetch_array($tampil)) {
                        ?>
                        <option class='<?php echo $_SESSION['g'];?>' id="jenjang" value="<?php echo $row['kode_jenjang']; ?>"><?php echo $row['kode_jenjang']; ?> | <?php echo $row['nama_jenjang']; ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </div>
                  
                  <label class='col-sm-2 control-label'>Banom  :</label>
                  <div class='col-sm-3'>
                    <select name='banom' class='form-control' required id="banom">
                      <option value='<?php echo $_SESSION['banom'];?>' selected><?php echo $_SESSION['banom'];?></option>
                      <?php
                      $tampil = mysqli_query($koneksi, "SELECT * FROM banom ORDER BY idbanom");
                      while($row=mysqli_fetch_array($tampil)) {
                        ?>
                        <option class='<?php echo $_SESSION['banom'];?>' id="banom" value="<?php echo $row['idbanom']; ?>"><?php echo $row['idbanom']; ?> | <?php echo $row['nama_banom']; ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>


                <hr>
                <div class='form-group'>
                  <label class='col-sm-3 control-label'>Tempat lahir:</label>
                  <div class='col-sm-3'>
                    <input style='text-transform: capitalize;' class='form-control' name='h' placeholder='Tuliskan Tempat Lahir' value='<?php echo $_SESSION['h'];?>'>
                  </div>
                  <label class='col-sm-2 control-label'>Tanggal Lahir : </label>
                  <div class='col-sm-3'>
                    <input type='date' class='form-control' name='i' value='<?php echo $_SESSION['i'];?>'>
                  </div>
                </div> 


                <div class='form-group'>
                  <label class='col-sm-3 control-label'>Jenis Kelamin</label>
                  <div class='col-sm-3'>
                    <select name='jk' class='form-control' required id='jk'>
                      <option value='<?php echo $_SESSION['jk'];?>' selected><?php echo $_SESSION['jk'];?></option>
                      <option class='<?php echo $_SESSION['jk'];?>' value="Perempuan">Perempuan</option>
                      <option class='<?php echo $_SESSION['jk'];?>' value="Laki-laki">Laki-laki</option>
                    </select>
                  </div>
                  <label class='col-sm-2 control-label'>Alamat :</label>
                  <div class='col-sm-3'>
                    <textarea class='form-control' name='j'><?php echo $_SESSION['j'];?></textarea>
                  </div>
                </div>

                <div class='form-group'>
                  <label class='col-sm-3 control-label'>Provinsi :</label>
                  <div class='col-sm-3'>
                    <select name='k' class='form-control' id="provinsi">
                      <option value='<?php echo $_SESSION['k'];?>' selected><?php echo $_SESSION['k'];?></option>
                      <?php
                      $tampil = mysqli_query($koneksi, "SELECT * FROM provinsi ORDER BY nama_provinsi");
                      while($row=mysqli_fetch_array($tampil)) {
                        ?>
                        <option class='<?php echo $_SESSION['k'];?>' id="provinsi"value="<?php echo $row['id_prov']; ?>"><?php echo $row['nama_provinsi']; ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </div>
                  <label class='col-sm-2 control-label'>Kabupaten/Kota :</label>
                  <div class='col-sm-3'>
                   <select id="kabupaten" name='l' class='form-control' >
                    <option value='<?php echo $_SESSION['l'];?>' selected><?php echo $_SESSION['l'];?></option>
                    <?php
                    $tampil = mysqli_query($koneksi, "SELECT * FROM kabupaten where nama_kabupaten IN ('Malang', 'Sidoarjo')");
                    while($row=mysqli_fetch_array($tampil)) {
                      ?>
                      <option id="kabupaten" class='<?php echo $_SESSION['l'];?>' value="<?php echo $row['id_kab']; ?>"><?php echo $row['nama_kabupaten']; ?></option>
                      <?php
                    }
                    ?>
                  </select>
                </div>
              </div>

              <div class='form-group'>
                <label class='col-sm-3 control-label'>Kecamatan :</label>
                <div class='col-sm-3'>
                  <select id="kecamatan" name='m' class='form-control' required>
                    <option value='<?php echo $_SESSION['m'];?>'><?php echo $_SESSION['m'];?></option>
                    <?php
                    $tampil = mysqli_query($koneksi, "SELECT * FROM kecamatan ORDER BY nama_kecamatan");
                    while($row=mysqli_fetch_array($tampil)) {
                      ?>
                      <option id="kecamatan" class='<?php echo $_SESSION['m'];?>' value="<?php echo $row['id_kec']; ?>"><?php echo $row['nama_kecamatan']; ?></option>
                      <?php
                    }
                    ?>
                  </select>
                </div>
                <label class='col-sm-2 control-label'>Kelurahan/Desa : </label>
                <div class='col-sm-3'>
                 <select id="kelurahan" name='n' class='form-control' required>
                   <option value='<?php echo $_SESSION['n'];?>'><?php echo $_SESSION['n'];?></option>
                   <?php
                   $tampil = mysqli_query($koneksi, "SELECT * FROM kelurahan ORDER BY nama_kelurahan");
                   while($row=mysqli_fetch_array($tampil)) {
                    ?>
                    <option id="kelurahan" class="<?php echo $_SESSION['n'];?>" value="<?php echo $row['id_kel']; ?>"><?php echo $row['nama_kelurahan']; ?></option>
                    <?php
                  }
                  ?>
                </select>
              </div>
            </div>
            
            <div class='form-group'>
              <label class='col-sm-3 control-label'>Contact Person : </label>
              <div class='col-sm-3'>
                <input type='text' class='form-control' name='o' placeholder='Tuliskan Nomor Telp./Hp.' value="<?php echo $_SESSION['o'];?>">
              </div>
              <label class='col-sm-2 control-label'>Email  : </label>
              <div class='col-sm-3'>
                <input type='email' class='form-control' name='p' placeholder='Contoh: admin@kartamus.or.id' value="<?php echo $_SESSION['p'];?>">
              </div>
            </div>

            <div class='form-group'>
              <label class='col-sm-3 control-label'>Status Perkawinan:</label>
              <div class='col-sm-3'>
               <select name='q' class='form-control' id='kawin'>
                <option value='<?php echo $_SESSION['q'];?>' selected></option>
                <option class='<?php echo $_SESSION['q'];?>' value="Menikah" id='kawin'>Menikah</option>
                <option class='<?php echo $_SESSION['q'];?>' value="Cerai Hidup" id='kawin'>Cerai Hidup</option>
                <option class='<?php echo $_SESSION['q'];?>' value="Cerai Mati" id='kawin'>Cerai Mati</option>
              </select>
            </div>
            <label class='col-sm-2 control-label'>Pendidikan Terakhir: </label>
            <div class='col-sm-3'>
             <select name='r' class='form-control' id='pendidikan'>
              <option value='<?php echo $_SESSION['r'];?>' selected></option>
              <option class='<?php echo $_SESSION['r'];?>' value="Tidak Tamat SD" id='pendidikan'>Tidak Tamat SD</option>
              <option class='<?php echo $_SESSION['r'];?>' value="SD/M" id='pendidikan'>SD/M</option>
              <option class='<?php echo $_SESSION['r'];?>' value="SMP/Sederajat" id='pendidikan'>SMP/Sederajat</option>
              <option class='<?php echo $_SESSION['r'];?>' value="SMA/SMK Sederaja" id='pendidikan'>SMA/SMK Sederajat</option>
              <option class='<?php echo $_SESSION['r'];?>' value="Diploma" id='pendidikan'>Diploma</option>
              <option class='<?php echo $_SESSION['r'];?>' value="S1" id='pendidikan'>S1</option>
              <option class='<?php echo $_SESSION['r'];?>' value="S2" id='pendidikan'>S2</option>
              <option class='<?php echo $_SESSION['r'];?>' value="S3" id='pendidikan'>S3</option>
            </select>
          </div>
        </div>

        <div class='form-group'>
          <label class='col-sm-3 control-label'>Pekerjaan Utama:</label>
          <div class='col-sm-3'>
           <select name='s' class='form-control' id='pekerjaan'>
            <option value='<?php echo $_SESSION['s'];?>' selected></option>
            <option class='<?php echo $_SESSION['s'];?>' value="Petani" id='pekerjaan'>Petani</option>
            <option class='<?php echo $_SESSION['s'];?>' value="Pedagang" id='pekerjaan'>Pedagang</option>
            <option class='<?php echo $_SESSION['s'];?>' value="Swasta" id='pekerjaan'>Swasta</option>
            <option class='<?php echo $_SESSION['s'];?>' value="PNS" id='pekerjaan'>PNS</option>
            <option class='<?php echo $_SESSION['s'];?>' value="TNI/POLRI" id='pekerjaan'>TNI/POLRI</option>
            <option class='<?php echo $_SESSION['s'];?>' value="Wirausaha" id='pekerjaan'>Wirausaha</option>
            <option class='<?php echo $_SESSION['s'];?>'  value="Lainnya" id='pekerjaan'>Lainnya</option>
          </select>
        </div>
        <label class='col-sm-2 control-label'>Kemampuan/Profesi: </label>
        <div class='col-sm-3'>
          <input type='text' class='form-control' name='t' placeholder="Tulis Kemampuan/Profesi" value='<?php echo $_SESSION['t'];?>'>
        </div>
      </div>

      <div class='form-group'>
        <label class='col-sm-3 control-label'>Fasilitas Kesehatan (BPJS) :</label>
        <div class='col-sm-3'>
          <select name='u' class='form-control' id='bpjs'>
            <option value='<?php echo $_SESSION['u'];?>' selected></option>
            <option class='<?php echo $_SESSION['u'];?>' value="Sudah" id='bpjs'>Sudah</option>
            <option class='<?php echo $_SESSION['u'];?>' value="Belum" id='bpjs'>Belum</option>
          </select>
        </div>

        <label class='col-sm-2 control-label'>Unggah Foto :</label>
        <div class='col-sm-3'>
          <input type='hidden' class='form-control' name='gambar' placeholder="Tulis Kemampuan/Profesi" value='<?php echo $_SESSION['gambar'];?>'>

          <img class='img img-thumbnail' src="../assets/img/user/<?php echo $_SESSION['gambar'];  ?>" class="img-rounded" alt="User Image" width="80px">

        </div>
      </div>

      <div class='form-group'>
             <!--  <label class='col-sm-3 control-label'>Foto Webcam  : </label>
              <div class='col-sm-4'>
                <div class="box box-solid box-warning">
                  <div class="box-header">
                    <h3 class="panel-title"><i class="fa fa-camera"></i> Camera Webcam</h3>
                  </div>
                  <div class="box-body">
                    <center> <div id="my_camera"></div><center><br><button class="class='form-control btn btn-flat bg-orange" type=button onClick="take_snapshot()"><i class="glyphicon glyphicon-camera"></i> Ambil Gambar</button>
                      <input type="hidden" name="webcam" class="image-tag">
                    </div>
                  </div>
                </div>                  
                <div class="col-md-2"></div>
                <div class="col-md-4">
                  <div class="box box-solid box-success">
                    <div class="box-header">
                      <h3 class="panel-title"><i class="fa fa-camera"></i> Hasil Camera Webcam</h3>
                    </div>
                    <div class="box-body">
                      <center><div id="results" class="img-thumbnail"><i class="glyphicon glyphicon-camera"></i><br></center>
                      </div>
                    </div>
                  </div> 
                </div> -->
                <input type='hidden' class='form-control' name='user' value="<?php echo $_SESSION['username']; ?>">
                <input type='hidden' class='form-control' name='id' value="<?php echo $_SESSION['id']; ?>">

                <div class='box-footer'>
                  <label class='col-sm-3 control-label'></label>
                  <div class='col-sm-9'>
                    <button type="submit" class="btn btn-flat btn-primary"><i class="glyphicon glyphicon-floppy-save"></i> S I M P A N</button>
                    <a  href="view-data" type="button" class="btn btn-flat btn-danger"><i class="glyphicon glyphicon-floppy-remove"></i> B A T A L</a>
                  </div>
                </div>
              </div>
            </form>
          </div>
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
  <!--  <script src="../assets/webcam/java.js"></script>
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
  </script> -->
  <?php include "footerx.php";?>
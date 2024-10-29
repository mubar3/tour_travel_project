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
              <h3 class='box-title'><i class='glyphicon glyphicon-edit'></i> FORM UBAH DATA ANGGOTA</h3>
            </div>
            <form class='form-horizontal' role='form' method=POST action='aksi/user_update.php' enctype='multipart/form-data'>
              <div class='box-body'>
                <?php
				$bpjs_det = array("Tidak Mempunyai Jaminan Kesehatan","BPJS Kesehatan / Ketenagakerjaan","KIS (Kartu Indonesia Sehat)/ dibayar Pemerintah","Asuransi Kesehatan swasta");
                $rr=mysqli_fetch_array(mysqli_query($koneksi, "SELECT *,user.pendidikan as tingkat_pendidikan FROM user 
                  LEFT JOIN desa ON user.id_kel= desa.id_desa
                  LEFT JOIN kabupaten ON user.id_kab= kabupaten.id_kab 
                  LEFT JOIN kecamatan ON user.id_kec= kecamatan.id_kec 
                  LEFT JOIN provinsi ON user.id_prov= provinsi.id_prov
                  LEFT JOIN banom ON user.banom= banom.idbanom
                  LEFT JOIN tb_status_perkawinan ON user.status_kawin=tb_status_perkawinan.id
                  LEFT JOIN tb_pendidikan ON user.pendidikan= tb_pendidikan.id
                  WHERE user.id='$_GET[id]'"));


                  $dtnoanggota = $rr['nokartanu'];
                  ?>
                  <input type='hidden' class='form-control' name='id' value="<?php echo $_GET["id"]; ?>">
                  <div class="form-group">
                     <label class='col-sm-7 control-label'>Pengelompokan data </label>
                  </div>
                  <div class='form-group'>
                     <label class='col-sm-2 control-label'>MWC :</label>
                  <div class='col-sm-3'>
                   <select id="mwc" name='mwc' class='form-control'>
                    <option value='' selected>Pilih Kecamatan</option>
                    <?php
                    $tampil = mysqli_query($koneksi, "SELECT * FROM mwc ORDER BY nama");
                    while($row=mysqli_fetch_array($tampil)) {
                      ?>
                      <option id="wmc"  value="<?php echo $row['id']; ?>" <?php if($row['id']==$rr['mwc']){echo "selected";}?> ><?php echo $row['nama']; ?></option>
                      <?php
                    }
                    ?>
                  </select>
                  <input type='hidden' name='mwc_lama' class='form-control' value="<?php echo $rr['mwc']; ?>"> 
                </div>
                <label class='col-sm-3 control-label'>RANTING : </label>
                <div class='col-sm-4'>
                  <select id="desa" name='desa' class='form-control'>
                    <option value='' selected>Pilih Desa</option>
                    <?php
                    $tampil = mysqli_query($koneksi, "SELECT * FROM ranting ORDER BY nama");
                    while($row=mysqli_fetch_array($tampil)) {
                      ?>
                      <option id="desa" class="<?php echo $row['mwc_id']; ?>" value="<?php echo $row['id']; ?>" <?php if($row['id']==$rr['ranting']){echo "selected";}?> ><?php echo $row['nama']; ?></option>
                      <?php
                    }
                    ?>
                  </select>
                  <input type='hidden' name='kelurahan_lama' class='form-control' value="<?php echo $rr['desa']; ?>"> 
                </div>
                  </div>


                  <div class="form-group">
                     <center>=================================================</Center><br>
                  </div>

                  <div class='form-group'>
                    <!-- <label class='col-sm-2 control-label'>Nomor Urut Anggota:</label>
                    <div class='col-sm-4'> -->
                      <input type='hidden' name='a' class='form-control' value="<?php echo $rr['no_anggota']; ?>">
                      <input type='hidden' name='anggota_lama' class='form-control' value="<?php echo $rr['no_anggota']; ?>">
                      <input type='hidden' name='nokartanu_lama' class='form-control' value="<?php echo $rr['nokartanu']; ?>">
                    <!-- </div> -->
                    <label class='col-sm-2 control-label'>NIK: </label>
                    <div class='col-sm-4'>
                     <input type='text' name='b' class='form-control' value="<?php echo $rr['nik']; ?>">
                   </select>
                 </div>
               </div>
               <div class='form-group'>
                <label class='col-sm-2 control-label'>Nama:</label>
                <div class='col-sm-4'>
                  <input type='text' style='text-transform:' name='c' class='form-control' value="<?php echo $rr['nama']; ?>">
                </div>
                <label class='col-sm-2 control-label'>Banom  :</label>
                    <div class='col-sm-4'>
                      <select name='f' class='form-control'>
                        <option value="">Pilih Banom</option>
                        <?php $tampil = mysqli_query($koneksi, "SELECT * FROM banom ORDER BY idbanom"); while($row=mysqli_fetch_array($tampil)) { ?>
                          <option <?php if($rr['banom'] == $row['idbanom']) echo "selected"; ?> value="<?php echo $row['idbanom']; ?>"><?php echo $row['idbanom']; ?> | <?php echo $row['nama_banom']; ?>
                          </option><?php } ?>
                        </select>
                      </div>
                
              </div>

             

            <hr>
            
            <div class='form-group'>
              <label class='col-sm-2 control-label'>Tempat lahir:</label>
              <div class='col-sm-4'>
                <input class='form-control' style='text-transform: capitalize;' name='k' value="<?php echo $rr['tmp_lhr']; ?>">
              </div>
              <label class='col-sm-2 control-label'>Tanggal Lahir : </label>
              <div class='col-sm-4'>
                <input type='date' class='form-control' name='l'  id="tgl_lahir" value="<?php echo $rr['tgl_lhr']; ?>">
              </div>
            </div>
            
                    <div class='form-group'>
                      <label class='col-sm-2 control-label'>Usia:</label>
                      <div class='col-sm-4'>
                        <input id="umur" style='text-transform: capitalize;' value="<?php echo $rr['usia']; ?>" class='form-control' name='m' placeholder='Tuliskan Usia'>
                      </div>
                      <label class='col-sm-2 control-label'>CP/HP : </label>
                      <div class='col-sm-4'>
						  <input type='text' class='form-control' value="<?php echo $rr['hp']; ?>" name='n' placeholder='Tuliskan Nomor Telp./Hp.'>
                      </div>
                    </div> 

            <div class='form-group'>
              <label class='col-sm-2 control-label'>Jenis Kelamin: </label>
              <div class='col-sm-4'>
                <select name='o' class='form-control'>
                  <option value='' <?php if($rr['jk']==''){echo "selected";} ?>>Pilih Jenis Kelamin</option>
                  <option value="Perempuan" <?php if($rr['jk']=='Perempuan'){echo "selected";} ?>>Perempuan</option>
                  <option value="Laki-laki" <?php if($rr['jk']=='Laki-laki'){echo "selected";} ?>>Laki-laki</option>
                  <!-- <option value='<?php echo $rr['jk']; ?>' selected><?php echo $rr['jk']; ?></option> -->
                </select>
              </div>
              <label class='col-sm-2 control-label'>Alamat :</label>
              <div class='col-sm-4'>
                <input class='form-control' name='p' value="<?php echo $rr['alamat']; ?>">
              </div>
            </div>
            
					<div class='form-group'>
					  <label class='col-sm-2 control-label'>RT:</label>
					  <div class='col-sm-4'>
						<input type='text' class='form-control' name='q'  value="<?php echo $rr['rt']; ?>" placeholder="Tuliskan RT Anda">
					  </div>
					  <label class='col-sm-2 control-label'>RW:</label>
					  <div class='col-sm-4'>
						<input type='text' class='form-control' name='r'  value="<?php echo $rr['rw']; ?>" placeholder="Tuliskan RW Anda">
					  </div>
					</div> 

            <div class='form-group'>
              <label class='col-sm-2 control-label'>Provinsi :</label>
              <div class='col-sm-4'>
               <select name='s' class='form-control' id="provinsi">
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
             <select name='t' class='form-control' id='kabupaten'>
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
           <select name='u' class='form-control' id='kecamatan'>
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
          <select name='v' class='form-control' id='kelurahan'>
            <option value='<?php echo $rr['id_kel']; ?>'><?php echo $rr['nama_desa']; ?></option>
            <?php
            $tampil = mysqli_query($koneksi, "SELECT * FROM desa ORDER BY nama_desa");
            while($row=mysqli_fetch_array($tampil)) {
              ?>
              <option id="kelurahan" class="<?php echo $row['id_mwc']; ?>" value="<?php echo $row['id_desa']; ?>"><?php echo $row['nama_desa']; ?></option>
              <?php
            }
            ?>
          </select>
        </div>
      </div>


      <div class='form-group'>
        <label class='col-sm-2 control-label'>Status Perkawinan : </label>
        <div class='col-sm-4'>
          <select name='f' class='form-control'>
          <option value="">Pilih Status</option>
          <?php $tampil = mysqli_query($koneksi, "SELECT * FROM tb_status_perkawinan ORDER BY status"); while($row=mysqli_fetch_array($tampil)) { ?>
            <option <?php if($rr['status_kawin'] == $row['id']) echo "selected"; ?> value="<?php echo $row['status_kawin']; ?>"><?php echo $row['status']; ?>
            </option><?php } ?>
          </select>
        </div>
        <label class='col-sm-2 control-label'>Pendidikan Terakhir : </label>
        <div class='col-sm-4'>
          <select name='f' class='form-control'>
          <option value="">Pilih Pendidikan</option>
          <?php $tampil = mysqli_query($koneksi, "SELECT * FROM tb_pendidikan ORDER BY pendidikan"); while($row=mysqli_fetch_array($tampil)) { ?>
            <option <?php if($rr['tingkat_pendidikan'] == $row['id']) echo "selected"; ?> value="<?php echo $row['id']; ?>"><?php echo $row['pendidikan']; ?>
            </option><?php } ?>
          </select>
        </div>
      </div>

                <div class='form-group'>
                  <label class='col-sm-2 control-label'>Pekerjaan :</label>
                  <div class='col-sm-4'>
                  <select id="pekerjaan1" name='y' class='form-control'>
                    <option value='' selected>Pilih Pekerjaan</option>
                    <?php
                    $tampil = mysqli_query($koneksi, "SELECT * FROM tb_pekerjaan ORDER BY id");
                    while($row=mysqli_fetch_array($tampil)) {
                      ?>
                      <option <?php if($rr['pekerjaan'] == $row['id']) echo "selected"; ?> id="pekerjaan" value="<?php echo $row['id']; ?>"><?php echo $row['pekerjaan']; ?></option>
                      <?php
                    }
                    ?>
                  </select>
                  <?php if($rr['pekerjaan']!='88'){ ?>
                  <script>
                  $(function() {
                    $('#lainnya').hide(); 
                    $('#pekerjaan1').change(function(){
                        if($('#pekerjaan1').val() == '88') {
                            $('#lainnya').show(); 
                        } else {
                            $('#lainnya').hide(); 
                        } 
                    });
                });
                </script>
              <?php } ?>
                </div>
                <div id="lainnya">
                <label class='col-sm-2 control-label'>Pekerjaan Lainnya : </label>
                <div class='col-sm-4'>
                  <input style='text-transform: capitalize;' value="<?php echo $rr['pekerjaan_lain']; ?>" class='form-control' name='z' placeholder='Lainnya'>
                </div>
              </div>

              </div>



                <div class='form-group'>
                <label class='col-sm-2 control-label'>Pendapatan : </label>
                <div class='col-sm-4'>
                  <select id="pendapatan" name='af' class='form-control'>
                    <option value='' selected>Pilih Pendapatan</option>
                    <?php
                    $tampil = mysqli_query($koneksi, "SELECT * FROM tb_pendapatan ORDER BY id");
                    while($row=mysqli_fetch_array($tampil)) {
                      ?>
                      <option id="pendapatan" <?php if($rr['pendapatan'] == $row['id']) echo "selected"; ?> value="<?php echo $row['id']; ?>"><?php echo $row['pendapatan']; ?></option>
                      <?php
                    }
                    ?>
                  </select>
                </div>

              </div>
			  

    <div class='form-group'>
      <label class='col-sm-2 control-label'>Ganti Foto Baru :</label>
      <div class='col-sm-4'>
        <input type='file' class='form-control' name='gambar'>
        <input type='hidden' class='form-control' name='filegambar' value="<?php echo "$rr[gambar]";?>">
      </div>
      <label class='col-sm-2 control-label'>Foto Saat Ini :</label>
      <div class='col-sm-3'>
        <img class="img-responsive img-rounded" alt="Responsive image" src="../assets/img/user/<?php echo "$rr[gambar]";?>" width="50px"> <?php echo "$rr[gambar]";?></div>
      </div>

    <div class='form-group'>
      <label class='col-sm-2 control-label'>Ganti Foto KTP Baru :</label>
      <div class='col-sm-4'>
        <input type='file' class='form-control' name='ktp'>
        <input type='hidden' class='form-control' name='ktp_lama' value="<?php echo "$rr[ktp]";?>">
      </div>
      <label class='col-sm-2 control-label'>Foto KTP Saat Ini :</label>
      <div class='col-sm-3'>
        <img class="img-responsive img-rounded" alt="Responsive image" src="../assets/img/ktp/<?php echo "$rr[ktp]";?>" width="50px"> <?php echo "$rr[ktp]";?></div>
      </div>

			
        <input type='hidden' class='form-control' name='user' value="<?php echo $_SESSION['username']; ?>">
        <div class='box-footer'>
          <label class='col-sm-8 control-label'></label>
          <div class='col-sm-4'>
           <button type="submit" class="btn btn-flat btn-primary"><i class="glyphicon glyphicon-floppy-save"></i> S I M P A N</button>
           <a href="view-data" ><button type="button" class="btn btn-flat btn-danger"><i class="glyphicon glyphicon-floppy-remove"></i> B A T A L</button></a>
         </div>
       </div>
     </div>
   </form>
 </div>
</section>
<!-- /.content -->
</div>
<?php include "footer.php";?>

<script type="text/javascript">
         $(function() {
           $( "#tgl_lahir" ).datepicker({
                  changeMonth: true,
                  changeYear: true
              });
         });
            window.onload=function(){
                $('#tgl_lahir').on('change', function() {
                    var dob = new Date(this.value);
                    var today = new Date();
          var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
                    $('#umur').val(age);
                });
            }
    </script>
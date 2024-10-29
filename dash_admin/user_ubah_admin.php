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
            <form class='form-horizontal' role='form' method=POST action='aksi/user_update_admin.php' enctype='multipart/form-data'>
              <div class='box-body'>
                <?php
				$bpjs_det = array("Tidak Mempunyai Jaminan Kesehatan","BPJS Kesehatan / Ketenagakerjaan","KIS (Kartu Indonesia Sehat)/ dibayar Pemerintah","Asuransi Kesehatan swasta");
                $rr=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM userr
                  LEFT JOIN kelurahan ON userr.id_kel= kelurahan.id_kel
                  LEFT JOIN kabupaten ON userr.id_kab= kabupaten.id_kab 
                  LEFT JOIN kecamatan ON userr.id_kec= kecamatan.id_kec 
                  LEFT JOIN provinsi ON userr.id_prov= provinsi.id_prov
                  WHERE userr.id='$_GET[id]'"));
                  ?>
                  <input type='hidden' class='form-control' name='id' value="<?php echo $_GET["id"]; ?>">
                  
               </div>
               <div class='form-group'>
                <label class='col-sm-2 control-label'>Nama:</label>
                <div class='col-sm-4'>
                  <input type='text' style='text-transform: capitalize;' name='nama' class='form-control' value="<?php echo $rr['nama']; ?>">
                </div>
                <label class='col-sm-2 control-label'>Email:</label>
                <div class='col-sm-4'>
                  <input type='email' style='text-transform:' name='email' class='form-control'  value="<?php echo $rr['email']; ?>">
                </div>
                 
                
              </div>
              <div class='form-group'>
               
                 <label class='col-sm-2 control-label'>Ubah Password:</label>
                <div class='col-sm-4'>
                  <input type='password' style='text-transform:' name='pass' placeholder="kosongkan jika tak ingin ubah password" class='form-control' value="">
                </div>
                
              </div>

              

                
 

            <hr>
            
            
                    <div class='form-group'>
                      <label class='col-sm-2 control-label'>No Telepon:</label>
                      <div class='col-sm-4'>
                        <input style='text-transform:' value="<?php echo $rr['hp']; ?>" class='form-control' name='hp' placeholder='Tuliskan Usia'>
                      </div>
                      
                    </div> 

            <div class='form-group'>
              
              <label class='col-sm-2 control-label'>Alamat :</label>
              <div class='col-sm-4'>
                <input class='form-control' name='alamat' value="<?php echo $rr['alamat']; ?>">
              </div>
            </div>
            
					<div class='form-group'>
					  <label class='col-sm-2 control-label'>RT:</label>
					  <div class='col-sm-4'>
						<input type='text' class='form-control' name='rt'  value="<?php echo $rr['rt']; ?>" placeholder="Tuliskan RT Anda">
					  </div>
					  <label class='col-sm-2 control-label'>RW:</label>
					  <div class='col-sm-4'>
						<input type='text' class='form-control' name='rw'  value="<?php echo $rr['rw']; ?>" placeholder="Tuliskan RW Anda">
					  </div>
					</div> 

            <div class='form-group'>
              <label class='col-sm-2 control-label'>Provinsi :</label>
              <div class='col-sm-4'>
               <select name='provinsi' class='form-control' id="provinsi">
                <option value='<?php echo $rr['id_prov']; ?>'><?php echo $rr['nama_provinsi']; ?></option>
                <?php
                $tampil = mysqli_query($koneksi, "SELECT * FROM provinsi ORDER BY nama_provinsi");
                while($row=mysqli_fetch_array($tampil)) {
                  if($rr['nama_provinsi']==$row['nama_provinsi']){}else{
                  ?>
                  <option id="provinsi" value="<?php echo $row['id_prov']; ?>"><?php echo $row['nama_provinsi']; ?></option>
                  <?php
                }}
                ?>
              </select>
            </div>
            <label class='col-sm-2 control-label'>Kabupaten :</label>
            <div class='col-sm-4'>
             <select name='kabupaten' class='form-control' id='kabupaten'>
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
           <select name='kecamatan' class='form-control' id='kecamatan' required>
            <?php
            $tampil = mysqli_query($koneksi, "SELECT * FROM kecamatan ORDER BY nama_kecamatan");
            while($row=mysqli_fetch_array($tampil)) {
              ?>
              <option id="kecamatan" class="<?php echo $row['id_kab']; ?>" value="<?php echo $row['id_kec']; ?>" <?php if($row['id_kec']==$rr['id_kec']) {echo "selected";}?> ><?php echo $row['nama_kecamatan']; ?></option>
              <?php
            }
            ?>
          </select>
        </div>
        <label class='col-sm-2 control-label'>Kelurahan : </label>
        <div class='col-sm-4'>
          <select name='kelurahan' class='form-control' id='kelurahan' required>
            <option value='' selected>Pilih Kelurahan</option>
            <?php
            $tampil = mysqli_query($koneksi, "SELECT * FROM kelurahan ORDER BY nama_kelurahan");
            while($row=mysqli_fetch_array($tampil)) {
              ?>
              <option id="kelurahan" class="<?php echo $row['id_kec']; ?>" value="<?php echo $row['id_kel']; ?>" <?php if($row['id_kel']==$rr['id_kel']) {echo "selected";}?> ><?php echo $row['nama_kelurahan']; ?></option>
              <?php
            }
            ?>
          </select>
        </div>
      </div>
      <div class='form-group'>
          <label class='col-sm-2 control-label'>Admin Tingkat :</label>
          <div class='col-sm-4'>
            <select id="provinsi" name='admin' class='form-control'>
                        
                        <option value="1" <?php if($rr['id_level']==1) {echo "selected";}?> >PCNU</option>
                        <option value="2" <?php if($rr['id_level']==2) {echo "selected";}?> >MWCNU</option>
                        <option value="3" <?php if($rr['id_level']==3) {echo "selected";}?> >Ranting</option>
                        
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
        <img class="img-responsive img-rounded" alt="Responsive image" src="../assets/img/admin/<?php echo "$rr[gambar]";?>" width="50px"> <?php echo "$rr[gambar]";?></div>
      </div>


        			
      <div class='form-group'>
        
        <?php session_start(); ?>

        </div>
        <input type='hidden' class='form-control' name='user' value="<?php echo $_SESSION['username']; ?>">
        <div class='box-footer'>
          <label class='col-sm-8 control-label'></label>
          <div class='col-sm-4'>
           <button type="submit" class="btn btn-flat btn-primary"><i class="glyphicon glyphicon-floppy-save"></i> S I M P A N</button>
           <a href="view-data-admin" ><button type="button" class="btn btn-flat btn-danger"><i class="glyphicon glyphicon-floppy-remove"></i> B A T A L</button></a>
         </div>
       </div>
     </div>
   </form>
 </div>
</section>
<!-- /.content -->
</div>
<!-- End content -->
<!-- <script src="../assets/webcam/java.js"></script>
  <script src="../assets/webcam/webcam.min.js"></script> -->
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
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
              <br>
            <form  role='form' method=POST action='aksi/user_simpan.php' enctype='multipart/form-data'>

              <!-- <label class='col-sm-2 control-label'>Kecamatan :</label> -->
                  <div class='col-sm-3'>
                   <select id="mwc" name='data[mwc]' class='form-control' required>
                    <option value='' selected>Pilih Kecamatan</option>
                    <?php
                    $tampil = mysqli_query($koneksi, "SELECT * FROM mwc ORDER BY nama");
                    while($row=mysqli_fetch_array($tampil)) {
                      ?>
                      <option id="wmc"  value="<?php echo $row['id']; ?>"><?php echo $row['nama']; ?></option>
                      <?php
                    }
                    ?>
                  </select>
                </div>
                <!-- <label class='col-sm-2 control-label'>Kelurahan/Desa : </label> -->
                <div class='col-sm-3'>
                  <select id="desa" name='data[ranting]' class='form-control' required>
                    <option value='' selected>Pilih Desa</option>
                    <?php
                    $tampil = mysqli_query($koneksi, "SELECT * FROM ranting ORDER BY nama");
                    while($row=mysqli_fetch_array($tampil)) {
                      ?>
                      <option id="desa" class="<?php echo $row['mwc_id']; ?>" value="<?php echo $row['id']; ?>"><?php echo $row['nama']; ?></option>
                      <?php
                    }
                    ?>
                  </select>
                </div>

            </div>
              <div class='form-horizontal'>

              <div class='box-body'>
               

                <div class='form-group'>
                  <label class='col-sm-3 control-label'>No. KTP/NIK :</label>
                  <div class='col-sm-8'>
                    <input type='number' class='form-control' name='data[nik]' placeholder='Tuliskan Nomor Induk Kependudukan' value="<?=isset($_POST['nama']) ? $_POST['nik'] : ''?>" required>
                  </div>
                </div>

                <div class='form-group'>
                  <label class='col-sm-3 control-label'>Nama :</label>
                  <div class='col-sm-8'>
                    <input type='text' class='form-control' name='data[nama]' placeholder='Tuliskan Nama Lengkap' required>
                  </div>
                </div>
				
				<div class='form-group'>
                      <label class='col-sm-3 control-label'>Tempat lahir:</label>
                      <div class='col-sm-3'>
                        <input style='text-transform: capitalize;' class='form-control' name='data[tmp_lhr]' placeholder='Tuliskan Tempat Lahir' required>
                      </div>
                      <label class='col-sm-2 control-label'>Tanggal Lahir : </label>
                      <div class='col-sm-3'>
                        <!-- <input type='date' class='form-control' name='l' id="tgl_lahir" value="<?php echo date('Y-m-d'); ?>"> -->
                        <input type='date' class='form-control' name='data[tgl_lhr]' id="tgl_lahir"  required>
                      </div>
                    </div>
					
					<div class='form-group'>
                      <label class='col-sm-3 control-label'>Usia:</label>
                      <div class='col-sm-3'>
                        <input id="umur" style='text-transform: capitalize;' class='form-control' name='data[usia]' placeholder='Tuliskan Usia' readonly>
                      </div>
                      <label class='col-sm-2 control-label'>CP/HP : </label>
                      <div class='col-sm-3'>
						  <input type='text' class='form-control' name='data[hp]' placeholder='Tuliskan Nomor Telp./Hp.'>
                      </div>
                    </div>
					
					 <div class='form-group'>
                      <label class='col-sm-3 control-label'>Provinsi :</label>
                      <div class='col-sm-3'>
                       <select id="provinsi" name='data[id_prov]' class='form-control' required>
                        <?php
                        $tampil = mysqli_query($koneksi, "SELECT * FROM provinsi where nama_provinsi IN ('Jawa Timur','Jawa Tengah','Jawa Barat','Dki Jakarta','Kalimantan Timur','Kalimantan Tengah','Sumatera Utara','Sumatera Barat','Sumatera Selatan','Sulawesi Utara')");
                        // $tampil = mysqli_query($koneksi, "SELECT * FROM provinsi");
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
                     <select id="kabupaten" name='data[id_kab]' class='form-control'  required>
                      <?php
                      // $tampil = mysqli_query($koneksi, "SELECT * FROM `kabupaten` WHERE nama_kabupaten like '%tuban%'");
                      $tampil = mysqli_query($koneksi, "SELECT * FROM kabupaten");
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
                   <select id="kecamatan" onchange="myFunction()" name='data[id_kec]' class='form-control' required>
                    <option value='' selected>Pilih Kecamatan</option>
                    <?php
                    $tampil = mysqli_query($koneksi, "SELECT * FROM kecamatan ORDER BY nama_kecamatan");
                    while($row=mysqli_fetch_array($tampil)) {
                      ?>
                      <option class="<?php echo $row['id_kab']; ?>" value="<?php echo $row['id_kec']; ?>"><?php echo $row['nama_kecamatan']; ?></option>
                      <?php
                    }
                    ?>
                  </select>
                </div>
                <label class='col-sm-2 control-label'>Kelurahan/Desa : </label>
                <div class='col-sm-3'>
                  <select name='data[id_kel]' class='form-control' id="selectdesa"></select>
                  <!-- <select id="kelurahan" name='data[id_kel]' class='form-control' required>
                    <option value='' selected>Pilih Kelurahan</option>
                    <?php
                    $tampil = mysqli_query($koneksi, "SELECT * FROM desa ORDER BY nama_desa");
                    while($row=mysqli_fetch_array($tampil)) {
                      ?>
                      <option id="kelurahan" class="<?php echo $row['id_mwc']; ?>" value="<?php echo $row['id_desa']; ?>"><?php echo $row['nama_desa']; ?></option>
                      <?php
                    }
                    ?>
                  </select> -->
                </div>
              </div>

              <script type="text/javascript">
                      
                  function myFunction() {
                      var elt=$('#kecamatan').val();
                      // alert(elt);
                        $.ajax({
                        type: "POST",
                        url : "aksi/select_desa.php",
                        data: { kecamatan: elt},
                        dataType:'json',
                        success: function(data) {

                           var select = $("#selectdesa"), options = '';
                           select.empty();      

                           for(var i=0;i<data.length; i++)
                           {
                            options += "<option value='"+data[i].id_desa+"'<?php if($row['id_desa']==$rr['id_kel']){echo "selected";}?>>"+ data[i].nama_desa+"</option>";    
                            //console.log(options);          
                           }
                           select.append(options);
                        }
                        });
                  };
              </script>
				
				 <div class='form-group'>
                      <label class='col-sm-3 control-label'>Alamat (dusun) :</label>
                      <div class='col-sm-3'>
                        <textarea class='form-control' name='data[alamat]' placeholder='Tuliskan Alamat Rumah Contoh: Jl. Mundur Alon-alon'></textarea>
                      </div>
					  <label class='col-sm-2 control-label'>RT:</label>
					  <div class='col-sm-1'>
						<input type='number' class='form-control' name='data[rt]'  placeholder="Tuliskan RT Anda" required>
					  </div>
					  <label class='col-sm-1 control-label'>RW:</label>
					  <div class='col-sm-1'>
						<input type='number' class='form-control' name='data[rw]'  placeholder="Tuliskan RW Anda" required>
					  </div>

                    </div>
        <div class='form-group'>
            <label class='col-sm-3 control-label'>Kode Pos:</label>
            <div class='col-sm-2'>
            <input type='text' class='form-control' name='data[kodepos]'  placeholder="Tuliskan Kodepos" required>
            </div>

                    </div>
					<div class='form-group'>
					<label class='col-sm-3 control-label'>Jenis Kelamin</label>
                      <div class='col-sm-3'>
                        <select name='data[jk]' class='form-control' required>
                    <option value='' selected>Pilih Jenis Kelamin</option>
                    <?php
                    $tampil = mysqli_query($koneksi, "SELECT * FROM tb_jk ORDER BY id");
                    while($row=mysqli_fetch_array($tampil)) {
                      ?>
                      <option value="<?php echo $row['id']; ?>"><?php echo $row['jk']; ?></option>
                      <?php
                    }
                    ?>
                  </select>
                      </div>
					  
				<label class='col-sm-2 control-label'>Status Perkawinan:</label>
                <div class='col-sm-3'>
                  <select id="pendapatan" name='data[status_kawin]' class='form-control'>
                    <option value='' selected>Pilih Status</option>
                    <?php
                    $tampil = mysqli_query($koneksi, "SELECT * FROM tb_status_perkawinan ORDER BY id");
                    while($row=mysqli_fetch_array($tampil)) {
                      ?>
                      <option value="<?php echo $row['id']; ?>"><?php echo $row['status']; ?></option>
                      <?php
                    }
                    ?>
                  </select>
                </div>	  
					</div> 

                

                <!-- <div class='form-group'>
                    <label class='col-sm-3 control-label'>Banom NU :</label>
                    <div class='col-sm-3'>
                      <select name='data[banom]' class='form-control'>
                        <option value="">Pilih Banom</option>
                        <?php $tampil = mysqli_query($koneksi, "SELECT * FROM banom ORDER BY idbanom"); while($row=mysqli_fetch_array($tampil)) { ?>
                          <option value="<?php echo $row['idbanom']; ?>"><?php echo $row['nama_banom']; ?>
                          </option><?php } ?>
                        </select>
                      </div>

                      <div >
                <label class='col-sm-2 control-label'>Jabatan di Banom NU : </label>
                <div class='col-sm-3' >
                  <input style='text-transform: capitalize;' class='form-control' name='data[jabatan_banom]' placeholder='Lainnya'>
                </div>
                </div>
                    
                </div> 


                <div class='form-group'>
                    <label class='col-sm-3 control-label'>Lembaga NU :</label>
                    <div class='col-sm-3'>
                      <select name='data[lembaga]' class='form-control'>
                        <option value="">Pilih Lembaga</option>
                        <?php $tampil = mysqli_query($koneksi, "SELECT * FROM lembaga ORDER BY nama_lembaga"); while($row=mysqli_fetch_array($tampil)) { ?>
                          <option value="<?php echo $row['id_lembaga']; ?>"><?php echo $row['nama_lembaga']; ?>
                          </option><?php } ?>
                        </select>
                      </div>

                      <div >
                <label class='col-sm-2 control-label'>Jabatan di Lembaga NU : </label>
                <div class='col-sm-3' >
                  <input style='text-transform: capitalize;' class='form-control' name='data[jabatan_lembaga]'  placeholder='Lainnya'>
                </div>
                </div>
                    
                </div> -->

                

               <hr>
                <div class='form-group'>
                  <label class='col-sm-3 control-label'>Pekerjaan :</label>
                  <div class='col-sm-3'>
                  <select id="pekerjaan1" name='data[pekerjaan]' class='form-control'>
                    <option value='' selected>Pilih Pekerjaan</option>
                    <?php
                    $tampil = mysqli_query($koneksi, "SELECT * FROM tb_pekerjaan ORDER BY id");
                    while($row=mysqli_fetch_array($tampil)) {
                      ?>
                      <option id="pekerjaan" class="<?php echo $row['id']; ?>" value="<?php echo $row['id']; ?>"><?php echo $row['pekerjaan']; ?></option>
                      <?php
                    }
                    ?>
                  </select>

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
                </div>
                <div id="lainnya">
                <label class='col-sm-2 control-label'>Pekerjaan Lainnya : </label>
                <div class='col-sm-3' >
                  <input style='text-transform: capitalize;' class='form-control' name='data[pekerjaan_lain]' placeholder='Lainnya'>
                </div>
                </div>

              </div>

               <!-- <div class='form-group'>
                  <label class='col-sm-3 control-label'>Pernah Di Pesantren :</label>
                  <div class='col-sm-3'>
                  <select id="pesantren" name='pesantren' class='form-control'>
                    <option value='' selected>Tidak</option>
                    <option id="pekerjaan" class="1" value="1">iya</option>
                      
                  </select>

                  <script>
                  $(function() {
                    $('#hasil_pesantren').hide(); 
                    $('#pesantren').change(function(){
                        if($('#pesantren').val() == '1') {
                            $('#hasil_pesantren').show(); 
                        } else {
                            $('#hasil_pesantren').hide(); 
                        } 
                    });
                });
                </script>
                </div> -->

              <!-- </div> -->

            <!-- <div id="hasil_pesantren">
              <div class='form-group'>
                  <label class='col-sm-3 control-label'>Nama Pesantren:</label>
                  <div class='col-sm-3'>
                  <input type='text' class='form-control' name='data[nama_pesantren]'  placeholder="Nama Pesantren">
                  </div>
                  <label class='col-sm-2 control-label'>Alamat (dusun) :</label>
                  <div class='col-sm-3'>
                    <textarea class='form-control' name='data[alamat_pesantren]' placeholder='Tuliskan Alamat Pesantren Contoh: Jl. Mundur Alon-alon'></textarea>
                  </div>

                    </div>

              <div class='form-group'>
                  <label class='col-sm-3 control-label'>Lama di Pesantren :</label>
                  <div class='col-sm-3'>
                  <input type='number' class='form-control' name='data[lama_pesantren]'  placeholder="Tahun">
                  </div>

                    </div>
            </div> -->
     

                  
			  
			  <div class='form-group'>
			  <label class='col-sm-3 control-label'>Pendapatan : </label>
                <div class='col-sm-3'>
                  <input type="number" style='text-transform: capitalize;' class='form-control' name='data[Pendapatan]' placeholder='Pendapatan'>
                </div>
				
				
                  
				</div>
                

                <div class='form-group'>
				<label class='col-sm-3 control-label'>Pendidikan Terakhir : </label>
                <div class='col-sm-3'>
                  <select id="penyakit" name='data[pendidikan]' class='form-control'>
                    <option value='' selected>Pilih Pendidikan</option>
                    <?php
                    $tampil = mysqli_query($koneksi, "SELECT * FROM tb_pendidikan ORDER BY id");
                    while($row=mysqli_fetch_array($tampil)) {
                      ?>
                      <option id="penyakit" class="<?php echo $row['id']; ?>" value="<?php echo $row['id']; ?>"><?php echo $row['pendidikan']; ?></option>
                      <?php
                    }
                    ?>
                  </select>
                </div>
				
                  <label class='col-sm-2 control-label'>Nama Lembaga Pendidikan :</label>
                  <div class='col-sm-3'>
                  <input type='text' class='form-control' name='data[nama_sekolah]' placeholder='Tuliskan Nama Lembaga' value="<?=isset($_POST['nama']) ? $_POST['nik'] : ''?>"/>
                </div>
              </div>

              

            <div class='form-group'>
              
              <label class='col-sm-3 control-label'>Unggah Foto :</label>
              <div class='col-sm-6'>
                <input type='file' class='form-control' name='gambar' required>
              </div>
            </div>

            <div class='form-group'>
              
              <label class='col-sm-3 control-label'>Unggah KTP :</label>
              <div class='col-sm-6'>
                <input type='file' class='form-control' name='ktp'>
              </div>
            </div>

                    <hr>


			
			
            
            
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
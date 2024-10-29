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
        <li><a href="#">Rincian Data</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title col-sm-10" ><i class="glyphicon glyphicon-tasks"></i> RINCIAN DATA ANGGOTA</h3>
              <a href="create-data" class="btn bg-orange col-sm-2"><i class="fa fa-chevron-left"></i> K E M B A L I</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class='form-group'>
                <?php
				$bpjs_det = array("Tidak Mempunyai Jaminan Kesehatan","BPJS Kesehatan / Ketenagakerjaan","KIS (Kartu Indonesia Sehat)/ dibayar Pemerintah","Asuransi Kesehatan swasta");
				$SQL = "SELECT *,
                  tb_pendidikan.pendidikan as nama_sekolah,
                  tb_status_perkawinan.status as status_perkawinan
                  FROM user
                  LEFT JOIN tb_pendidikan ON user.pendidikan= tb_pendidikan.id
                  LEFT JOIN tb_status_perkawinan ON user.status_kawin= tb_status_perkawinan.id 
                  LEFT JOIN desa ON user.id_kel= desa.id_desa
                  LEFT JOIN tb_jk ON user.jk= tb_jk.id
                  LEFT JOIN kabupaten ON user.id_kab= kabupaten.id_kab 
                  LEFT JOIN kecamatan ON user.id_kec= kecamatan.id_kec 
                  LEFT JOIN provinsi ON user.id_prov= provinsi.id_prov
                  LEFT JOIN tb_pekerjaan ON user.pekerjaan= tb_pekerjaan.id
                  LEFT JOIN tb_pendapatan ON user.pendapatan= tb_pendapatan.id
                  LEFT JOIN banom ON user.banom= banom.idbanom
                  WHERE user.id='$_GET[id]'";
				// echo $SQL;
                $rr=mysqli_fetch_array(mysqli_query($koneksi, $SQL));
                $mb1 = date("d - m - Y", strtotime($rr['masa_b1']));
                $mb2 = date("d - m - Y", strtotime($rr['masa_b2']));
                $tgl = date("d - m - Y", strtotime($rr['tgl_lhr']));
                $tgla = date("Y", strtotime($rr['tgl_lhr']));
                $tglin = date("d - m - Y", strtotime($rr['tgl_input']));
                $tahun = date("Y", strtotime($rr['tgl_input']));

                ?>
                <div class="col-sm-10 table-responsive">
                  <table class="table table-striped table-hover">
                    <tr>
                     <td class="col-sm-5">No. Anggota</td>
                     <td>: <b><?php echo "$rr[nokartanu]";?></b></td>
                   </tr><tr>
                     <td class="col-sm-5">NIK</td>
                     <td>: <b><?php echo "$rr[nik]";?></b></td>
                   </tr>
                   <tr>
                     <td>Nama</td>
                     <td>: <b><?php echo "$rr[nama]";?></b></td>
                   </tr>
                   <!-- <tr>
                     <td>Jabatan</td>
                     <td>: <b><?php echo "$rr[jabatan]";?></b></td>
                   </tr> -->
                   <!--tr>
                    <td>Masa Bhakti</td>
                     <td>: <b><?php echo $mb1;?> s/d <?php echo $mb2;?></b></td>
                   </tr-->
                   <!-- <tr>
                     <td>Jenjang Kepengurusan</td>
                     <td>: <b><?php echo "$rr[nama_jenjang]";?></b></td>
                   </tr> -->
                   <tr>
                     <td>Badan Otonom</td>
                     <td>: <b><?php echo "$rr[nama_banom]";?></b></td>
                   </tr>
                   <tr>
                     <!-- <td>Badan Otonom 2</td>
                     <td>: <b><?php
						$banomm=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM banom WHERE idbanom='".$rr["banom2"]."'"));
						echo $banomm["nama_banom"];
					 ?></b></td>
                   </tr>
                   <tr>
                     <td>Badan Otonom 3</td>
                     <td>: <b><?php
						$banomm=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM banom WHERE idbanom='".$rr["banom3"]."'"));
						echo $banomm["nama_banom"];
					 ?></b></td>
                   </tr> -->
                   <!-- <tr>
                     <td>Badan Otonom 4</td>
                     <td>: <b><?php
						$banomm=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM banom WHERE idbanom='".$rr["banom4"]."'"));
						echo $banomm["nama_banom"];
					 ?></b></td>
                   </tr> -->
                   <!-- <tr>
                     <td>Badan Otonom Lainnya</td>
                     <td>: <b><?php echo "$rr[banom_lain]";?></b></td>
                   </tr> -->
                   <tr>
                     <td>Tempat Tanggal Lahir</td>
                     <td>: <b><?php echo "$rr[tmp_lhr]".",";?></b> <b><?php echo "$tgl";?></b></td>
                   </tr>
                   <tr>
                     <td>Usia</td>
                     <td>: <b><?php echo "$rr[usia]";?></b></td>
                   </tr>
                   <tr>
                     <td class="col-sm-4">Contact Person (Telp./Hp.)</td>
                     <td>: <b><?php echo "$rr[hp]";?></b></td>
                   </tr>
                   <tr>
                     <td>Jenis Kelamin</td>
                     <td>: <b><?php echo "$rr[jk]";?></b></td>
                   </tr>
                   <tr>
                     <td>Alamat</td>
                     <td>: <b><?php echo "$rr[alamat]";?></b></td>
                   </tr>
                   <tr>
                     <td>RT</td>
                     <td>: <b><?php echo "$rr[rt]";?></b></td>
                   </tr>
                   <tr>
                     <td>RW</td>
                     <td>: <b><?php echo "$rr[rw]";?></b></td>
                   </tr>
                   <tr>
                     <td class="col-sm-4" >Kelurahan/Desa</td>
                     <td>: <b><?php echo "$rr[nama_desa]";?></b></td>
                   </tr>
                   <tr>
                     <td class="col-sm-4">Kecamatan</td>
                     <td>: <b><?php echo "$rr[nama_kecamatan]";?></b></td>
                   </tr>
                   <tr>
                     <td class="col-sm-4">Kabupaten</td>
                     <td>: <b><?php echo "$rr[nama_kabupaten]";?></b></td>
                   </tr>
                   <tr>
                     <td class="col-sm-4">Provinsi</td>
                     <td>: <b><?php echo "$rr[nama_provinsi]";?></b></td>
                   </tr>

                   <tr>
                     <td class="col-sm-4">Status Kawin</td>
                     <td>: <b><?php echo "$rr[status_perkawinan]";?></b></td>
                   </tr>
                   <tr>
                     <td class="col-sm-4">Pendidikan Terakhir</td>
                     <td>: <b><?php echo "$rr[nama_sekolah]";?></b></td>
                   </tr>
                   <tr>
                     <td class="col-sm-4">Pekerjaan</td>
                     <td>: <b><?php echo "$rr[pekerjaan]";?> <?php echo "$rr[pekerjaan_lain]";?></b></td>
                   </tr>
                   <tr>
                     <td class="col-sm-4">Pendapatan </td>
                     <td>: <b><?php echo "$rr[pendapatan]";?></b></td>
                   </tr>
				   
		
                 </table>
               </div> 

               <div class="col-sm-3">
                <div class="box box-solid box-primary">
                  <div class="box-header">
                    <h3 class="box-title">FOTO</h3>
                  </div><!-- /.box-header -->
                  <!-- <div class="box-body"><img src="../assets/img/user/<?php echo "$rr[gambar]";?>" id="idgambar" /></div> -->
                  <div class="box-body">
                    <?php $time = date("H:i:s");?>
                    <center><img class="img-responsive img-rounded img-thumbnail" alt="Responsive image" src="../assets/img/user/<?php echo "$rr[gambar]";?>?time=<?php echo $time;?>" width="100px" alt="img-responsive"></center>
                  </div>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="box box-solid box-success">
                  <div class="box-header">
                    <h3 class="box-title">QRCODE ANGGOTA</h3>
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    <center><img class="img-responsive img-rounded img-thumbnail" alt="Responsive image" src="../assets/img/qrcode/<?php echo "$rr[qrcode]";?>" width="100px" alt="img-responsive"></center>
                  </div>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="box box-solid box-success">
                  <div class="box-header">
                    <h3 class="box-title">KTP</h3>
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    <center><img class="img-responsive img-rounded img-thumbnail" alt="Responsive image" src="../assets/img/ktp/<?php echo "$rr[ktp]";?>" width="100px" alt="img-responsive"></center>
                  </div>
                </div>
              </div>


            </div>
          </div>
        </div>  
      </div>
    </section>
  </div>
  <?php include "footer.php";?>


  <script>
// fungsi putargambar
function putarGambar(degree) {
    var angle = degree || 0;
    $('#idgambar').css({'transform': 'rotate(' + angle + 'deg)'}); // mengubah css berdasarkan idgambar
    $('#idgambar').data('angle', angle + 90); //mengubah angle berdasarkan idgambar
}
</script>
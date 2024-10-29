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
              <h3 class="box-title col-sm-10" ><i class="glyphicon glyphicon-tasks"></i> RINCIAN DATA ANGGOTA KARTANU</h3>
              <a href="view-datax" class="btn bg-aqua col-sm-2"><i class="fa fa-chevron-left"></i> K E M B A L I</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class='form-group'>
                <?php
                $rr=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM users
                  INNER JOIN kelurahan ON users.id_kel= kelurahan.id_kel
                  INNER JOIN kabupaten ON users.id_kab= kabupaten.id_kab 
                  INNER JOIN kecamatan ON users.id_kec= kecamatan.id_kec 
                  INNER JOIN provinsi ON users.id_prov= provinsi.id_prov
                  INNER JOIN jenjang ON users.jenjang= jenjang.id_jenjang
                  INNER JOIN banom ON users.idbanom= banom.idbanom
                  WHERE id='$_GET[id]'"));
                $t = date("d - m - Y", strtotime($rr['tgl_lhr']));
                $tgla = date("d.m.Y", strtotime($rr['tgl_lhr']));
                $ti = date("d - m - Y", strtotime($rr['tgl_input']));
                $nol = 0;
                $tglin = date("d - m - Y", strtotime($rr['tgl_input']));
                $tahun = date("Y", strtotime($rr['tgl_input']));

                ?>
                <div class="col-sm-9 table-responsive">
                  <table class="table table-striped table-hover">
                    <tr>
                      <td class="col-sm-5">No. Anggota Kartanu</td>
                      <td>: <b><label  class="btn btn-xs bg-olive"><?php echo $rr["id_kel"];?>.<?php echo $tgla;?>.<?php echo $nol;?><?php echo $rr["password"];?></b></label></td>
                    </tr>
                    <tr>
                     <td class="col-sm-5">ID | Nama Banom</td>
                     <td>: <b><?php echo "$rr[idbanom]";?> | <?php echo "$rr[nama_banom]";?></b></td>
                   </tr>
                   <tr>
                     <td class="col-sm-5">NIK</td>
                     <td>: <b><?php echo "$rr[nik]";?></b></td>
                   </tr>
                   <tr>
                     <td>Nama</td>
                     <td>: <b><?php echo "$rr[nama]";?></b></td>
                   </tr>
                   <tr>
                     <td>Jabatan</td>
                     <td>: <b><?php echo "$rr[jabatan]";?></b></td>
                   </tr>
                   <tr>
                    <td>Masa Bhakti</td>
                    <td>: <b><?php echo $mb1;?> s/d <?php echo $mb2;?></b></td>
                  </tr>
                  <tr>
                   <td>Jenjang Kepangurusan</td>
                   <td>: <b><?php echo "$rr[kode_jenjang]";?> - <?php echo "$rr[nama_jenjang]";?></b></td>
                 </tr>
                 <tr>
                   <td>Tempat Lahir</td>
                   <td>: <b><?php echo "$rr[tmp_lhr]";?></b></td>
                 </tr>
                 <tr>
                   <td>Tanggal Lahir</td>
                   <td>: <b><?php echo "$t";?></b></td>
                 </tr>
                 <tr>
                   <td>Alamat</td>
                   <td>: <b><?php echo "$rr[alamat]";?></b></td>
                 </tr>
                 <tr>
                   <td class="col-sm-4" >Kelurahan/Desa</td>
                   <td>:<b><?php echo "$rr[nama_kelurahan]";?></b></td>
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
                   <td class="col-sm-4">Contact Person (Telp./Hp.)</td>
                   <td>: <b><?php echo "$rr[hp]";?></b></td>
                 </tr>
                 <tr>
                   <td class="col-sm-4">Email</td>
                   <td>: <b><?php echo "$rr[email]";?></b></td>
                 </tr>
                 <tr>
                   <td class="col-sm-4">Status Kawin</td>
                   <td>: <b><?php echo "$rr[status_kawin]";?></b></td>
                 </tr>
                 <tr>
                   <td class="col-sm-4">Pendidikan Terakhir</td>
                   <td>: <b><?php echo "$rr[pendidikan]";?></b></td>
                 </tr>
                 <tr>
                   <td class="col-sm-4">Pekerjaan</td>
                   <td>: <b><?php echo "$rr[pekerjaan]";?></b></td>
                 </tr>
                 <tr>
                   <td class="col-sm-4">Kemampuan</td>
                   <td>: <b><?php echo "$rr[kemampuan]";?></b></td>
                 </tr>
                 <tr>
                   <td class="col-sm-4">Fasilitas Kesehatan (BPJS)</td>
                   <td>: <b><?php echo "$rr[bpjs]";?></b></td>
                 </tr>
                 <tr>
                   <td class="col-sm-4">Tanggal/Waktu Input/Update Data</td>
                   <td>: <label  class="btn btn-xs bg-aqua"> <b><?php echo "$tglin";?>/<?php echo "$rr[waktu]";?></b></label></td>
                 </tr>

                 <tr>
                   <td class="col-sm-4">Penginput Data</td>
                   <td>: <label  class="btn btn-xs bg-green"> <a style="color:#fff;" href="profil-users?username=<?php echo "$rr[username]";?>"><?php echo "$rr[username]";?></a></label></td>
                 </tr>
               </table>
             </div>

             <div class="col-sm-3">
              <div class="box box-solid box-success">
                <div class="box-header">
                  <h3 class="box-title">FOTO</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <center><img class="img-responsive img-rounded img-thumbnail" alt="Responsive image" src="../assets/img/user/<?php echo "$rr[gambar]";?>" width="100px" alt="img-responsive"></center>
                </div>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="box box-solid box-warning">
                <div class="box-header">
                  <h3 class="box-title">QRCODE KARTANU</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <center><img class="img-responsive img-rounded img-thumbnail" alt="Responsive image" src="../assets/img/qrcode2/<?php echo "$rr[qrcodee]";?>" width="100px" alt="img-responsive"></center>
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
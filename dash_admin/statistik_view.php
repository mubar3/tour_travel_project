<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">

  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">

      <div class="col-md-12">
        <div class="info-box bg-white">
          <div style="padding-top: 10px;">
            <?php if(!isset($_POST['mwcsubmit'])){ 
              $mwc=substr($_SESSION['noanggota'],3,2);
              $ranting=substr($_SESSION['noanggota'],6,3);  
              if($_SESSION['level']==2){
                $mwc = "select * from mwc where id_mwc = '$mwc'";
                $dtmwc=mysqli_fetch_array(mysqli_query($koneksi, $mwc));
                $mwc = $dtmwc["nama_mwc"];
                echo "<center><span style='font-size:30px; color:green;'>Statistik MWC " .$mwc."</span></center>";
              }
              elseif($_SESSION['level']==3){
                $ranting = "select * from desa where id_desa = '$ranting'";
                $ranting=mysqli_fetch_array(mysqli_query($koneksi, $ranting));
                $ranting = $ranting["nama_desa"];
                echo "<center><span style='font-size:30px; color:green;'>Statistik RANTING ".$ranting."</span></center>";
              }
              else{
                echo "<center><span style='font-size:30px; color:green;'>Statistik NU Mojokerto</span></center>";
              }
        } else {
        $mwc = "select * from mwc where id_mwc = '$_POST[mwc]'";
        $dtmwc=mysqli_fetch_array(mysqli_query($koneksi, $mwc));
        // echo $query2."<br>";
        
        $mwc = $dtmwc["nama_mwc"];
        // echo $kec;
        // die();
        ?>
          <center><span style="font-size:30px; color:green;">Statistik MWCNU <?php echo $mwc;?></span></center>
      <?php } ?>
          </div>

          
          </div><!-- /.info-box-content -->
        </div>
        
      </div>
<?php if($_SESSION['level']==1){?>
    <div class="row">

      <div class="col-md-12">
        <div class="info-box bg-white">
          <div style="padding-top: 10px;">
          <!-- <center><span style="font-size:30px; color:green;">Statistik Anggota PCNU Mojokerto</span></center> -->
          <center><a>Pilih MWC</a></center>
          </div>

          <div style="padding:10px;">

              <form role="form" action="" method="post" autocomplete="off">
              <select class="form-control form-control-lg"  name='mwc'>
                <option value='' selected>Pilih MWC</option>
                <?php
                $tampil = mysqli_query($koneksi, "SELECT * FROM mwc ORDER BY nama_mwc");
                while($row=mysqli_fetch_array($tampil)) {
                  ?>
                  <option value="<?php echo $row['id_mwc']; ?>"><?php echo $row['nama_mwc']; ?></option>
                  <?php
                }
                ?>
              </select> 
              <br>
              <center><button type="submit" name="mwcsubmit" class="btn btn-primary">Tampilkan Grafik</button></center>
            </form>

          </div>
          </div><!-- /.info-box-content -->
        </div>

      </div>
<?php } 
// if(isset($_POST['mwc'])){
//   $where="and id_kec='".$_POST[kecamatan]."'";
//   echo $where;
//   die();
//   $wherejoin="and a.id_kec='".$_POST[kecamatan]."'"; 
// } ?>

      <div class="col-md-6">
        <div class="info-box bg-white">
          <div style="padding-top: 10px;">
          <center><span style="font-size:20px; color:green;">Status Perkawinan</span></center>
          </div>
          <div >
            <div>
            <canvas  id="myChart_status_kawin" ></canvas >
          </div>
          </div><!-- /.info-box-content -->
        </div>
      </div>

    <div class="col-md-6">
        <div class="info-box bg-white">
          <div style="padding-top: 10px;">
          <center><span style="font-size:20px; color:green;">Jenis Kelamin</span></center>
          </div>
          <div >
            <div>
            <canvas  id="myChartLP" ></canvas >
          </div>
          </div><!-- /.info-box-content -->
        </div>
      </div>

      <div class="col-md-12">
        <div class="info-box bg-white">
          <div style="padding-top: 10px;">
          <center><span style="font-size:20px; color:green;">Kelompok Profesi</span></center>
          </div>
          <div >
            <canvas  id="myChart_pekerjaan" ></canvas >
         
          </div><!-- /.info-box-content -->
        </div>
      </div>

    <div class="col-md-6">
        <div class="info-box bg-white">
          <div style="padding-top: 10px;">
          <center><span style="font-size:20px; color:green;">Jaminan Kesehatan</span></center>
          </div>
          <div >
            <div>
            <canvas  id="myChart_jamkes" ></canvas >
          </div>
          </div><!-- /.info-box-content -->
        </div>
      </div>

<div class="col-md-6">
        <div class="info-box bg-white">
          <div style="padding-top: 10px;">
          <center><span style="font-size:20px; color:green;">Pendidikan Terakhir</span></center>
          </div>
          <div >
            <div>
            <canvas  id="myChart_pend" ></canvas >
          </div>
          </div><!-- /.info-box-content -->
        </div>
      </div>

<div class="col-md-6">
        <div class="info-box bg-white">
          <div style="padding-top: 10px;">
          <center><span style="font-size:20px; color:green;">Penghasilan</span></center>
          </div>
          <div >
            <div>
            <canvas  id="myChart_pendapatan" ></canvas >
          </div>
          </div><!-- /.info-box-content -->
        </div>
      </div>

<div class="col-md-6">
        <div class="info-box bg-white">
          <div style="padding-top: 10px;">
          <center><span style="font-size:20px; color:green;">Kepemilikan Rumah</span></center>
          </div>
          <div >
            <div>
            <canvas  id="myChart_rumah" ></canvas >
          </div>
          </div><!-- /.info-box-content -->
        </div>
      </div>

<div class="col-md-12">
        <div class="info-box bg-white">
          <div style="padding-top: 10px;">
          <center><span style="font-size:20px; color:green;">Penyakit</span></center>
          </div>
          <div >
            <div>
            <canvas id="myChart_penyakit" style="width:50%;"></canvas >
          </div>
          </div><!-- /.info-box-content -->
        </div>
      </div>

<div class="col-md-12">
        <div class="info-box bg-white">
          <div style="padding-top: 10px;">
          <center><span style="font-size:20px; color:green;">Penyakit 2</span></center>
          </div>
          <div >
            <div>
            <canvas id="myChart_penyakit_2" style="width:50%;"></canvas >
          </div>
          </div><!-- /.info-box-content -->
        </div>
      </div>

<div class="col-md-6">
        <div class="info-box bg-white">
          <div style="padding-top: 10px;">
          <center><span style="font-size:20px; color:green;">Disabilitas</span></center>
          </div>
          <div >
            <div>
            <canvas  id="myChart_disabilitas" ></canvas >
          </div>
          </div><!-- /.info-box-content -->
        </div>
      </div>

<div class="col-md-6">
        <div class="info-box bg-white">
          <div style="padding-top: 10px;">
          <center><span style="font-size:20px; color:green;">Disabilitas 2</span></center>
          </div>
          <div >
            <div>
            <canvas  id="myChart_disabilitas_2" ></canvas >
          </div>
          </div><!-- /.info-box-content -->
        </div>
      </div>


      <div class="col-md-6">
        <div class="info-box bg-white">
          <div style="padding-top: 10px;">
          <center><span style="font-size:20px; color:green;">Usia</span></center>
          </div>
          <div >
            <div>
            <canvas  id="myChart_usia" ></canvas >
          </div>
          </div><!-- /.info-box-content -->
        </div>
      </div>

<div class="col-md-12">
        <div class="info-box bg-white">
          <div style="padding-top: 10px;">
          <center><span style="font-size:20px; color:green;">Kepemilikan Asset</span></center>
          </div>
          <div >
            <div>
            <canvas  id="myChart_properti" ></canvas >
          </div>
          </div><!-- /.info-box-content -->
        </div>
      </div>


      
      <!-- ./col -->
    </div>
  </section>
</div>
<?php

$mwc=substr($_SESSION['noanggota'],3,2);
$ranting=substr($_SESSION['noanggota'],6,3);

$wherejoin=" ";
$where=" ";
if(isset($_POST['mwcsubmit'])){
  $where="and substr(nokartanu,4,2)='".$_POST[mwc]."'";
  $wherejoin="and substr(a.nokartanu,4,2)='".$_POST[mwc]."'"; 
  $wherejoin_properti="and c.id_mwc='".$_POST[mwc]."'"; 
}

if($_SESSION['level']==2){
  $where="and substr(nokartanu,4,2)='".$mwc."'";
  $wherejoin="and substr(a.nokartanu,4,2)='".$mwc."'"; 
  $wherejoin_properti="and c.id_mwc='".$mwc."'";
}
elseif($_SESSION['level']==3){
  $where="and substr(nokartanu,7,3)='".$ranting."'";
  $wherejoin="and substr(a.nokartanu,7,3)='".$ranting."'"; 
  $wherejoin_properti="and c.id_desa='".$ranting."'";
}
// $query_user = "SELECT 
//             (SELECT COUNT(*) FROM user WHERE jk = 'laki-laki') as TotalJkLaki,
//             (SELECT COUNT(*) FROM user WHERE jk = 'Perempuan') as TotalJkPr ,

//             (SELECT COUNT(*) FROM user WHERE status_kawin = 'menikah') as total_menikah,
//             (SELECT COUNT(*) FROM user WHERE status_kawin = 'belum menikah') as total_belum_menikah,
//             (SELECT COUNT(*) FROM user WHERE status_kawin = 'cerai hidup') as total_cerai_hidup,
//             (SELECT COUNT(*) FROM user WHERE status_kawin = 'cerai mati') as total_cerai_mati,

//             (SELECT COUNT(*) FROM user WHERE pekerjaan = 1) as total_petani,
//             (SELECT COUNT(*) FROM user WHERE pekerjaan = 2) as total_nelayan,
//             (SELECT COUNT(*) FROM user WHERE pekerjaan = 3) as total_pedagang,
//             (SELECT COUNT(*) FROM user WHERE pekerjaan = 4) as total_k_swasta,
//             (SELECT COUNT(*) FROM user WHERE pekerjaan = 5) as total_pns,
//             (SELECT COUNT(*) FROM user WHERE pekerjaan = 6) as total_tni,
//             (SELECT COUNT(*) FROM user WHERE pekerjaan = 7) as total_guru,
//             (SELECT COUNT(*) FROM user WHERE pekerjaan = 8) as total_pensiun,
//             (SELECT COUNT(*) FROM user WHERE pekerjaan = 9) as total_pengusaha,
//             (SELECT COUNT(*) FROM user WHERE pekerjaan = 10) as total_irt,
//             (SELECT COUNT(*) FROM user WHERE pekerjaan = 11) as total_pelajar,
//             (SELECT COUNT(*) FROM user WHERE pekerjaan = 12) as total_t_bekerja,
//             (SELECT COUNT(*) FROM user WHERE pekerjaan = 13) as total_jasa,
//             (SELECT COUNT(*) FROM user WHERE pekerjaan = 14) as total_pegawai,
//             (SELECT COUNT(*) FROM user WHERE pekerjaan = 88) as total_lainnya,

//             (SELECT COUNT(*) FROM user WHERE bpjs = 0) as total_t_punya,
//             (SELECT COUNT(*) FROM user WHERE bpjs = 1) as total_ketenagakerjaan,
//             (SELECT COUNT(*) FROM user WHERE bpjs = 2) as total_kis,
//             (SELECT COUNT(*) FROM user WHERE bpjs = 3) as total_asuransi_swasta,

//             (SELECT COUNT(*) FROM user WHERE pendidikan = 'Tidak sekolah') as total_Tidak_sekolah,
//             (SELECT COUNT(*) FROM user WHERE pendidikan = 'SD dan sederajat') as total_SD_dan_sederajat,
//             (SELECT COUNT(*) FROM user WHERE pendidikan = 'SLTP dan sederajat') as total_SLTP_dan_sederajat,
//             (SELECT COUNT(*) FROM user WHERE pendidikan = 'SMA/SMK Sederaja') as total_SMASMK_Sederaja,
//             (SELECT COUNT(*) FROM user WHERE pendidikan = 'S1') as total_s1,
//             (SELECT COUNT(*) FROM user WHERE pendidikan = 'S2') as total_s2,
//             (SELECT COUNT(*) FROM user WHERE pendidikan = 'S3') as total_s3,

//             (SELECT COUNT(*) FROM user WHERE pendapatan = 1) as total_pend_1,
//             (SELECT COUNT(*) FROM user WHERE pendapatan = 2) as total_pend_2,
//             (SELECT COUNT(*) FROM user WHERE pendapatan = 3) as total_pend_3,
//             (SELECT COUNT(*) FROM user WHERE pendapatan = 4) as total_pend_4,

//             (SELECT COUNT(*) FROM user WHERE kepemilikan_rumah = 1) as total_rumah_1,
//             (SELECT COUNT(*) FROM user WHERE kepemilikan_rumah = 2) as total_rumah_2,
//             (SELECT COUNT(*) FROM user WHERE kepemilikan_rumah = 3) as total_rumah_3,
//             (SELECT COUNT(*) FROM user WHERE kepemilikan_rumah = 4) as total_rumah_4,

//             (SELECT COUNT(*) FROM user WHERE penyakit = 0) as total_penyakit_1,
//             (SELECT COUNT(*) FROM user WHERE penyakit = 1) as total_penyakit_2,
//             (SELECT COUNT(*) FROM user WHERE penyakit = 2) as total_penyakit_3,
//             (SELECT COUNT(*) FROM user WHERE penyakit = 3) as total_penyakit_4,
//             (SELECT COUNT(*) FROM user WHERE penyakit = 4) as total_penyakit_5,
//             (SELECT COUNT(*) FROM user WHERE penyakit = 5) as total_penyakit_6,
//             (SELECT COUNT(*) FROM user WHERE penyakit = 6) as total_penyakit_7,
//             (SELECT COUNT(*) FROM user WHERE penyakit = 7) as total_penyakit_8,
//             (SELECT COUNT(*) FROM user WHERE penyakit = 8) as total_penyakit_9,
//             (SELECT COUNT(*) FROM user WHERE penyakit = 9) as total_penyakit_10,
//             (SELECT COUNT(*) FROM user WHERE penyakit = 10) as total_penyakit_11,

//             (SELECT COUNT(*) FROM user WHERE disabilitas = 0) as total_disab_1,
//             (SELECT COUNT(*) FROM user WHERE disabilitas = 1) as total_disab_2,
//             (SELECT COUNT(*) FROM user WHERE disabilitas = 2) as total_disab_3,
//             (SELECT COUNT(*) FROM user WHERE disabilitas = 3) as total_disab_4,
//             (SELECT COUNT(*) FROM user WHERE disabilitas = 4) as total_disab_5,
//             (SELECT COUNT(*) FROM user WHERE disabilitas = 5) as total_disab_6,
//             (SELECT COUNT(*) FROM user WHERE disabilitas = 6) as total_disab_7
//             FROM `user`";
//     $dtuser=mysqli_fetch_array(mysqli_query($koneksi, $query_user));
//     // echo $query2."<br>";
//     $query_properti = "SELECT 
//             (SELECT COUNT(*) FROM user_properti WHERE properti = '1') as total_properti_1,
//             (SELECT COUNT(*) FROM user_properti WHERE properti = '2') as total_properti_2,            
//             (SELECT COUNT(*) FROM user_properti WHERE properti = '3') as total_properti_3,
//             (SELECT COUNT(*) FROM user_properti WHERE properti = '4') as  total_properti_4
//             -- left JOIN user ON user_properti.id_kel= kelurahan.id_kel
//             FROM `user_properti`";
//     $dtproperti=mysqli_fetch_array(mysqli_query($koneksi, $query_properti));

//     }else{
// $query_user = "SELECT 
//             (SELECT COUNT(*) FROM user WHERE jk = 'laki-laki' and id_kec='$_POST[kecamatan]') as TotalJkLaki,
//             (SELECT COUNT(*) FROM user WHERE jk = 'Perempuan' and id_kec='$_POST[kecamatan]') as TotalJkPr ,

//             (SELECT COUNT(*) FROM user WHERE status_kawin = 'menikah' and id_kec='$_POST[kecamatan]') as total_menikah,
//             (SELECT COUNT(*) FROM user WHERE status_kawin = 'belum menikah' and id_kec='$_POST[kecamatan]') as total_belum_menikah,
//             (SELECT COUNT(*) FROM user WHERE status_kawin = 'cerai hidup' and id_kec='$_POST[kecamatan]') as total_cerai_hidup,
//             (SELECT COUNT(*) FROM user WHERE status_kawin = 'cerai mati' and id_kec='$_POST[kecamatan]') as total_cerai_mati,

//             (SELECT COUNT(*) FROM user WHERE pekerjaan = 1 and id_kec='$_POST[kecamatan]') as total_petani,
//             (SELECT COUNT(*) FROM user WHERE pekerjaan = 2 and id_kec='$_POST[kecamatan]') as total_nelayan,
//             (SELECT COUNT(*) FROM user WHERE pekerjaan = 3 and id_kec='$_POST[kecamatan]') as total_pedagang,
//             (SELECT COUNT(*) FROM user WHERE pekerjaan = 4 and id_kec='$_POST[kecamatan]') as total_k_swasta,
//             (SELECT COUNT(*) FROM user WHERE pekerjaan = 5 and id_kec='$_POST[kecamatan]') as total_pns,
//             (SELECT COUNT(*) FROM user WHERE pekerjaan = 6 and id_kec='$_POST[kecamatan]') as total_tni,
//             (SELECT COUNT(*) FROM user WHERE pekerjaan = 7 and id_kec='$_POST[kecamatan]') as total_guru,
//             (SELECT COUNT(*) FROM user WHERE pekerjaan = 8 and id_kec='$_POST[kecamatan]') as total_pensiun,
//             (SELECT COUNT(*) FROM user WHERE pekerjaan = 9 and id_kec='$_POST[kecamatan]') as total_pengusaha,
//             (SELECT COUNT(*) FROM user WHERE pekerjaan = 10 and id_kec='$_POST[kecamatan]') as total_irt,
//             (SELECT COUNT(*) FROM user WHERE pekerjaan = 11 and id_kec='$_POST[kecamatan]') as total_pelajar,
//             (SELECT COUNT(*) FROM user WHERE pekerjaan = 12 and id_kec='$_POST[kecamatan]') as total_t_bekerja,
//             (SELECT COUNT(*) FROM user WHERE pekerjaan = 13 and id_kec='$_POST[kecamatan]') as total_jasa,
//             (SELECT COUNT(*) FROM user WHERE pekerjaan = 14 and id_kec='$_POST[kecamatan]') as total_pegawai,
//             (SELECT COUNT(*) FROM user WHERE pekerjaan = 88 and id_kec='$_POST[kecamatan]') as total_lainnya,

//             (SELECT COUNT(*) FROM user WHERE bpjs = 0 and id_kec='$_POST[kecamatan]') as total_t_punya,
//             (SELECT COUNT(*) FROM user WHERE bpjs = 1 and id_kec='$_POST[kecamatan]') as total_ketenagakerjaan,
//             (SELECT COUNT(*) FROM user WHERE bpjs = 2 and id_kec='$_POST[kecamatan]') as total_kis,
//             (SELECT COUNT(*) FROM user WHERE bpjs = 3 and id_kec='$_POST[kecamatan]') as total_asuransi_swasta,

//             (SELECT COUNT(*) FROM user WHERE pendidikan = 'Tidak sekolah' and id_kec='$_POST[kecamatan]') as total_Tidak_sekolah,
//             (SELECT COUNT(*) FROM user WHERE pendidikan = 'SD dan sederajat' and id_kec='$_POST[kecamatan]') as total_SD_dan_sederajat,
//             (SELECT COUNT(*) FROM user WHERE pendidikan = 'SLTP dan sederajat' and id_kec='$_POST[kecamatan]') as total_SLTP_dan_sederajat,
//             (SELECT COUNT(*) FROM user WHERE pendidikan = 'SMA/SMK Sederaja' and id_kec='$_POST[kecamatan]') as total_SMASMK_Sederaja,
//             (SELECT COUNT(*) FROM user WHERE pendidikan = 'S1' and id_kec='$_POST[kecamatan]') as total_s1,
//             (SELECT COUNT(*) FROM user WHERE pendidikan = 'S2' and id_kec='$_POST[kecamatan]') as total_s2,
//             (SELECT COUNT(*) FROM user WHERE pendidikan = 'S3' and id_kec='$_POST[kecamatan]') as total_s3,

//             (SELECT COUNT(*) FROM user WHERE pendapatan = 1 and id_kec='$_POST[kecamatan]') as total_pend_1,
//             (SELECT COUNT(*) FROM user WHERE pendapatan = 2 and id_kec='$_POST[kecamatan]') as total_pend_2,
//             (SELECT COUNT(*) FROM user WHERE pendapatan = 3 and id_kec='$_POST[kecamatan]') as total_pend_3,
//             (SELECT COUNT(*) FROM user WHERE pendapatan = 4 and id_kec='$_POST[kecamatan]') as total_pend_4,

//             (SELECT COUNT(*) FROM user WHERE kepemilikan_rumah = 1 and id_kec='$_POST[kecamatan]') as total_rumah_1,
//             (SELECT COUNT(*) FROM user WHERE kepemilikan_rumah = 2 and id_kec='$_POST[kecamatan]') as total_rumah_2,
//             (SELECT COUNT(*) FROM user WHERE kepemilikan_rumah = 3 and id_kec='$_POST[kecamatan]') as total_rumah_3,
//             (SELECT COUNT(*) FROM user WHERE kepemilikan_rumah = 4 and id_kec='$_POST[kecamatan]') as total_rumah_4,

//             (SELECT COUNT(*) FROM user WHERE penyakit = 0 and id_kec='$_POST[kecamatan]') as total_penyakit_1,
//             (SELECT COUNT(*) FROM user WHERE penyakit = 1 and id_kec='$_POST[kecamatan]') as total_penyakit_2,
//             (SELECT COUNT(*) FROM user WHERE penyakit = 2 and id_kec='$_POST[kecamatan]') as total_penyakit_3,
//             (SELECT COUNT(*) FROM user WHERE penyakit = 3 and id_kec='$_POST[kecamatan]') as total_penyakit_4,
//             (SELECT COUNT(*) FROM user WHERE penyakit = 4 and id_kec='$_POST[kecamatan]') as total_penyakit_5,
//             (SELECT COUNT(*) FROM user WHERE penyakit = 5 and id_kec='$_POST[kecamatan]') as total_penyakit_6,
//             (SELECT COUNT(*) FROM user WHERE penyakit = 6 and id_kec='$_POST[kecamatan]') as total_penyakit_7,
//             (SELECT COUNT(*) FROM user WHERE penyakit = 7 and id_kec='$_POST[kecamatan]') as total_penyakit_8,
//             (SELECT COUNT(*) FROM user WHERE penyakit = 8 and id_kec='$_POST[kecamatan]') as total_penyakit_9,
//             (SELECT COUNT(*) FROM user WHERE penyakit = 9 and id_kec='$_POST[kecamatan]') as total_penyakit_10,
//             (SELECT COUNT(*) FROM user WHERE penyakit = 10 and id_kec='$_POST[kecamatan]') as total_penyakit_11,

//             (SELECT COUNT(*) FROM user WHERE disabilitas = 0 and id_kec='$_POST[kecamatan]') as total_disab_1,
//             (SELECT COUNT(*) FROM user WHERE disabilitas = 1 and id_kec='$_POST[kecamatan]') as total_disab_2,
//             (SELECT COUNT(*) FROM user WHERE disabilitas = 2 and id_kec='$_POST[kecamatan]') as total_disab_3,
//             (SELECT COUNT(*) FROM user WHERE disabilitas = 3 and id_kec='$_POST[kecamatan]') as total_disab_4,
//             (SELECT COUNT(*) FROM user WHERE disabilitas = 4 and id_kec='$_POST[kecamatan]') as total_disab_5,
//             (SELECT COUNT(*) FROM user WHERE disabilitas = 5 and id_kec='$_POST[kecamatan]') as total_disab_6,
//             (SELECT COUNT(*) FROM user WHERE disabilitas = 6 and id_kec='$_POST[kecamatan]') as total_disab_7
//             FROM `user` where id_kec='$_POST[kecamatan]'";
//     $dtuser=mysqli_fetch_array(mysqli_query($koneksi, $query_user));
//     // echo $query2."<br>";
//     $query_properti = "SELECT 
//             (SELECT COUNT(*) FROM user_properti WHERE properti = '1') as total_properti_1,
//             (SELECT COUNT(*) FROM user_properti WHERE properti = '2') as total_properti_2,            
//             (SELECT COUNT(*) FROM user_properti WHERE properti = '3') as total_properti_3,
//             (SELECT COUNT(*) FROM user_properti WHERE properti = '4') as  total_properti_4
//             -- left JOIN user ON user_properti.id_kel= kelurahan.id_kel
//             FROM `user_properti`";
//     $dtproperti=mysqli_fetch_array(mysqli_query($koneksi, $query_properti));

//     }
    
?>
<script>

var canvasheight_usia=document.getElementById("myChart_usia").height;
var resizeId_usia;
        $(window).resize(function() {
            clearTimeout(resizeId_usia);
            resizeId_usia = setTimeout(afterResizing_usia, 100);
        });
        function afterResizing_usia(){
            if(canvasheight_usia <=250)
            {
                window.myChart_usia.options.legend.display=false;
            }
            else
            {
                window.myChart_usia.options.legend.display=true;
            }
            window.myChart_usia.update();
        }

         $(window).ready(function() {
            clearTimeout(resizeId_usia);
            resizeId_usia = setTimeout(afterResizing_usia, 100);
        });
        function afterResizing_usia(){
            if(screen.width < 960)
            {
                window.myChart_usia.options.legend.display=false;
            }
            else
            {
                window.myChart_usia.options.legend.display=true;
            }
            window.myChart_usia.update();
        }


var ctx = document.getElementById('myChart_usia').getContext('2d');
var myChart_usia = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['Dibawah 17','18-25','26-40','41-60','diatas 60'],
        datasets: [{
            label: '# of Votes',
            data: [
          <?php 
                    $tampil = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(case when usia<=17 then 1 else null end) as a,count(case when usia>=17 and usia<=25 then 1 else null end) as b,count(case when usia>=26 and usia<=40 then 1 else null end) as c,count(case when usia>=41 and usia<=60 then 1 else null end) as d,count(case when usia>60 then 1 else null end) as e FROM `user` ".$where." ORDER BY `id`  DESC"));
                    $total=$tampil['a']+$tampil['b']+$tampil['c']+$tampil['d']+$tampil['e'];
                    echo $tampil['a'].",".$tampil['b'].",".$tampil['c'].",".$tampil['d'].",".$tampil['e'];
          ?>
        ],
            backgroundColor: [
                '#eb4034',
                '#db710d',
                '#dbc30d',
                '#93db0d',
                '#17db0d',
                '#0ddb71',
                '#0dc3db',
                '#0d5cdb',
                '#1e0ddb',
                '#960ddb',
            ],
            borderColor: [
                '#eb4034',
                '#db710d',
                '#dbc30d',
                '#93db0d',
                '#17db0d',
                '#0ddb71',
                '#0dc3db',
                '#0d5cdb',
                '#1e0ddb',
                '#960ddb',
            ],
            borderWidth: 1
        }]
    },

    options: {
          legend: {
            position: 'left',
            align: 'start'
          },
        tooltips: {
          enabled: true
        },
        plugins: {
           datalabels: {
            color: 'white',
            formatter: (val) => {
          return ((val/<?php echo $total?>)*100).toFixed(2) + ' %';
            }
           },
          title: {
            display: true,
            text: 'Chart.js Pie Chart'
          }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

<script>

var canvasheight_properti=document.getElementById("myChart_properti").height;
var resizeId_properti;
        $(window).resize(function() {
            clearTimeout(resizeId_properti);
            resizeId_properti = setTimeout(afterResizing_properti, 100);
        });
        function afterResizing_properti(){
            if(canvasheight_properti <=250)
            {
                window.myChart_properti.options.legend.display=false;
            }
            else
            {
                window.myChart_properti.options.legend.display=true;
            }
            window.myChart_properti.update();
        }

         $(window).ready(function() {
            clearTimeout(resizeId_properti);
            resizeId_properti = setTimeout(afterResizing_properti, 100);
        });
        function afterResizing_properti(){
            if(screen.width < 960)
            {
                window.myChart_properti.options.legend.display=false;
            }
            else
            {
                window.myChart_properti.options.legend.display=true;
            }
            window.myChart_properti.update();
        }

function isMobileDevice1(){
    return ( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent));
}

var ctx = document.getElementById('myChart_properti').getContext('2d');
var myChart_properti = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [
          <?php 
                    $tampil = mysqli_query($koneksi, "SELECT b.properti, count(a.id) as jml FROM user_properti a 
                      left join tb_properti b on a.properti = b.id 
                      left join desa c on a.kel = c.id_desa
                      where a.status=2 ".$wherejoin_properti."
                      group by b.id order by count(a.id) asc");
                    while($row=mysqli_fetch_array($tampil)) {
          ?>
            "<?php echo $row['properti']; ?>",
          <?php } ?>
        ],
        datasets: [{
            label: 'Anggota',
            data: [
          <?php 
                    $tampil = mysqli_query($koneksi, "SELECT b.properti, count(a.id) as jml FROM user_properti a 
                      left join tb_properti b on a.properti = b.id 
                      left join desa c on a.kel = c.id_desa
                      where a.status=2 ".$wherejoin_properti."
                      group by b.id order by count(a.id) asc");
                    $total=0;
                    $hasil=0;
                    while($row=mysqli_fetch_array($tampil)) { 
                      $total+=$row['jml']; 
                      $hasil=($row['jml']/$total)*100;
          ?>
            "<?php echo $row['jml']; ?>",
          <?php } ?>
        ],
            backgroundColor: [
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
            ],
            borderColor: [
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
            ],
            borderWidth: 1
        }]
    },

    options: {
          legend: {
            position: 'top',
            align: 'start'
          },
        tooltips: {
          enabled: true
        },
        plugins: {
           datalabels: {
            color: 'black',
            formatter: (val) => {
          return ((val/<?php echo $total?>)*100).toFixed(2) + ' %';
            }
           },
          title: {
            display: true,
            text: 'Chart.js Pie Chart'
          }
        },
        scaleShowValues: true,
        scales: {
            yAxes: [{
            ticks: {
              display: !isMobileDevice1(),
            beginAtZero: true
            }}],
            xAxes: [{
            ticks: {
              display: !isMobileDevice1(),
            autoSkip: false
            }}]
        }
    }
});
</script>


<script>
  var canvasheight_rumah=document.getElementById("myChart_rumah").height;

var resizeId_rumah;
        $(window).resize(function() {
            clearTimeout(resizeId_rumah);
            resizeId_rumah = setTimeout(afterResizing_rumah, 100);
        });
        function afterResizing_rumah(){
            if(canvasheight_rumah <=250)
            {
                window.myChart_rumah.options.legend.display=false;
            }
            else
            {
                window.myChart_rumah.options.legend.display=true;
            }
            window.myChart_rumah.update();
        }

         $(window).ready(function() {
            clearTimeout(resizeId_rumah);
            resizeId_rumah = setTimeout(afterResizing_rumah, 100);
        });
        function afterResizing_rumah(){
            if(screen.width < 960)
            {
                window.myChart_rumah.options.legend.display=false;
            }
            else
            {
                window.myChart_rumah.options.legend.display=true;
            }
            window.myChart_rumah.update();
        }

var ctx = document.getElementById('myChart_rumah').getContext('2d');
var myChart_rumah = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: [
          <?php 
                    $tampil = mysqli_query($koneksi, "SELECT b.rumah, count(a.id) as jml FROM user a left join tb_rumah b on a.kepemilikan_rumah = b.id  where a.kepemilikan_rumah <> '' ".$wherejoin."
                      group by b.id order by count(a.id) asc");
                    while($row=mysqli_fetch_array($tampil)) {
          ?>
            "<?php echo $row['rumah']; ?>",
          <?php } ?>
        ],
        datasets: [{
            label: '# of Votes',
            data: [
          <?php 
                    $tampil = mysqli_query($koneksi, "SELECT b.rumah, count(a.id) as jml FROM user a left join tb_rumah b on a.kepemilikan_rumah = b.id  where a.kepemilikan_rumah <> '' ".$wherejoin."
                      group by b.id order by count(a.id) asc");
                    $total=0;
                    $hasil=0;
                    while($row=mysqli_fetch_array($tampil)) { 
                      $total+=$row['jml'];
                      $hasil=($row['jml']/$total)*100;
          ?>
            "<?php echo $row['jml']; ?>",
          <?php } ?>
        ],
            backgroundColor: [
                '#eb4034',
                '#db710d',
                '#dbc30d',
                '#93db0d',
            ],
            borderColor: [
                '#eb4034',
                '#db710d',
                '#dbc30d',
                '#93db0d',
            ],
            borderWidth: 1
        }]
    },
    options: {
          legend: {
            position: 'left',
            align: 'start'
          },
        tooltips: {
          enabled: true
        },
        plugins: {
           datalabels: {
            color: 'white',
            formatter: (val) => {
          return ((val/<?php echo $total?>)*100).toFixed(2) + ' %';
            }
           },
          title: {
            display: true,
            text: 'Chart.js Pie Chart'
          }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>


<script>
var canvasheight_disabilitas=document.getElementById("myChart_disabilitas").height;
var resizeId_disabilitas;
        $(window).resize(function() {
            clearTimeout(resizeId_disabilitas);
            resizeId_disabilitas = setTimeout(afterResizing_disabilitas, 100);
        });
        function afterResizing_disabilitas(){
            if(canvasheight_disabilitas <=250)
            {
                window.myChart_disabilitas.options.legend.display=false;
            }
            else
            {
                window.myChart_disabilitas.options.legend.display=true;
            }
            window.myChart_disabilitas.update();
        }

         $(window).ready(function() {
            clearTimeout(resizeId_disabilitas);
            resizeId_disabilitas = setTimeout(afterResizing_disabilitas, 100);
        });
        function afterResizing_disabilitas(){
            if(screen.width < 960)
            {
                window.myChart_disabilitas.options.legend.display=false;
            }
            else
            {
                window.myChart_disabilitas.options.legend.display=true;
            }
            window.myChart_disabilitas.update();
        }


var ctx = document.getElementById('myChart_disabilitas').getContext('2d');
var myChart_disabilitas = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: [
          <?php 
                    $tampil = mysqli_query($koneksi, "SELECT b.disabilitas, count(a.id) as jml FROM user a left join tb_disabilitas b on a.disabilitas = b.id  where a.disabilitas <> '' ".$wherejoin."
                      group by b.id order by count(a.id) asc");
                    while($row=mysqli_fetch_array($tampil)) {
          ?>
            "<?php echo $row['disabilitas']; ?>",
          <?php } ?>
        ],
        datasets: [{
            label: '# of Votes',
            data: [
          <?php 
                    $tampil = mysqli_query($koneksi, "SELECT b.disabilitas, count(a.id) as jml FROM user a left join tb_disabilitas b on a.disabilitas = b.id  where a.disabilitas <> '' ".$wherejoin."
                      group by b.id order by count(a.id) asc");
                    $total=0;
                    $hasil=0;
                    while($row=mysqli_fetch_array($tampil)) { 
                      $total+=$row['jml'];
                      $hasil=($row['jml']/$total)*100;
          ?>
            "<?php echo $row['jml']; ?>",
          <?php } ?>
        ],
            backgroundColor: [
                '#eb4034',
                '#db710d',
                '#dbc30d',
                '#93db0d',
                '#17db0d',
                '#0ddb71',
                '#0dc3db',
                '#0d5cdb',
                '#1e0ddb',
                '#960ddb',
            ],
            borderColor: [
                '#eb4034',
                '#db710d',
                '#dbc30d',
                '#93db0d',
                '#17db0d',
                '#0ddb71',
                '#0dc3db',
                '#0d5cdb',
                '#1e0ddb',
                '#960ddb',
            ],
            borderWidth: 1
        }]
    },
    options: {
          legend: {
            position: 'left',
            align: 'start'
          },
        tooltips: {
          enabled: true
        },
        plugins: {
           datalabels: {
            color: 'white',
            formatter: (val) => {
          return ((val/<?php echo $total?>)*100).toFixed(2) + ' %';
            }
           },
          title: {
            display: true,
            text: 'Chart.js Pie Chart'
          }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

<script>
var canvasheight_disabilitas_2=document.getElementById("myChart_disabilitas_2").height;
var resizeId_disabilitas_2;
        $(window).resize(function() {
            clearTimeout(resizeId_disabilitas_2);
            resizeId_disabilitas_2 = setTimeout(afterResizing_disabilitas_2, 100);
        });
        function afterResizing_disabilitas_2(){
            if(canvasheight_disabilitas_2 <=250)
            {
                window.myChart_disabilitas_2.options.legend.display=false;
            }
            else
            {
                window.myChart_disabilitas_2.options.legend.display=true;
            }
            window.myChart_disabilitas_2.update();
        }

         $(window).ready(function() {
            clearTimeout(resizeId_disabilitas_2);
            resizeId_disabilitas_2 = setTimeout(afterResizing_disabilitas_2, 100);
        });
        function afterResizing_disabilitas_2(){
            if(screen.width < 960)
            {
                window.myChart_disabilitas_2.options.legend.display=false;
            }
            else
            {
                window.myChart_disabilitas_2.options.legend.display=true;
            }
            window.myChart_disabilitas_2.update();
        }


var ctx = document.getElementById('myChart_disabilitas_2').getContext('2d');
var myChart_disabilitas_2 = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: [
          <?php 
                    $tampil = mysqli_query($koneksi, "SELECT b.disabilitas, count(a.id) as jml FROM user a left join tb_disabilitas b on a.disabilitas = b.id  where a.disabilitas <> '' ".$wherejoin."
                      and not b.id=0
                      group by b.id order by count(a.id) asc");
                    while($row=mysqli_fetch_array($tampil)) {
          ?>
            "<?php echo $row['disabilitas']; ?>",
          <?php } ?>
        ],
        datasets: [{
            label: '# of Votes',
            data: [
          <?php 
                    $tampil = mysqli_query($koneksi, "SELECT b.disabilitas, count(a.id) as jml FROM user a left join tb_disabilitas b on a.disabilitas = b.id  where a.disabilitas <> '' ".$wherejoin."
                      and not b.id=0
                      group by b.id order by count(a.id) asc");
                    $total=0;
                    $hasil=0;
                    while($row=mysqli_fetch_array($tampil)) { 
                      $total+=$row['jml'];
                      $hasil=($row['jml']/$total)*100;
          ?>
            "<?php echo $row['jml']; ?>",
          <?php } ?>
        ],
            backgroundColor: [
                '#eb4034',
                '#db710d',
                '#dbc30d',
                '#93db0d',
                '#17db0d',
                '#0ddb71',
                '#0dc3db',
                '#0d5cdb',
                '#1e0ddb',
                '#960ddb',
            ],
            borderColor: [
                '#eb4034',
                '#db710d',
                '#dbc30d',
                '#93db0d',
                '#17db0d',
                '#0ddb71',
                '#0dc3db',
                '#0d5cdb',
                '#1e0ddb',
                '#960ddb',
            ],
            borderWidth: 1
        }]
    },
    options: {
          legend: {
            position: 'left',
            align: 'start'
          },
        tooltips: {
          enabled: true
        },
        plugins: {
           datalabels: {
            color: 'white',
            formatter: (val) => {
          return ((val/<?php echo $total?>)*100).toFixed(2) + ' %';
            }
           },
          title: {
            display: true,
            text: 'Chart.js Pie Chart'
          }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

<script>
  var canvasheight_penyakit=document.getElementById("myChart_penyakit").height;
var resizeId_penyakit;
        $(window).resize(function() {
            clearTimeout(resizeId_penyakit);
            resizeId_penyakit = setTimeout(afterResizing_penyakit, 100);
        });
        function afterResizing_penyakit(){
            if(canvasheight_penyakit <=250)
            {
                window.myChart_penyakit.options.legend.display=false;
            }
            else
            {
                window.myChart_penyakit.options.legend.display=true;
            }
            window.myChart_penyakit.update();
        }

         $(window).ready(function() {
            clearTimeout(resizeId_penyakit);
            resizeId_penyakit = setTimeout(afterResizing_penyakit, 100);
        });
        function afterResizing_penyakit(){
            if(screen.width < 960)
            {
                window.myChart_penyakit.options.legend.display=false;
            }
            else
            {
                window.myChart_penyakit.options.legend.display=true;
            }
            window.myChart_penyakit.update();
        }


function isMobileDevice2(){
    return ( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent));
}

var ctx = document.getElementById('myChart_penyakit').getContext('2d');
var myChart_penyakit = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [
          <?php 
                    $tampil = mysqli_query($koneksi, "SELECT b.penyakit, count(a.id) as jml FROM user a left join tb_penyakit b on a.penyakit = b.id  where a.penyakit <> '' ".$wherejoin."
                      group by b.id order by count(a.id) asc");
                    while($row=mysqli_fetch_array($tampil)) {
          ?>
            "<?php echo $row['penyakit']; ?>",
          <?php } ?>
        ],
        datasets: [{
            label: 'Anggota',
            data: [
          <?php 
                    $tampil = mysqli_query($koneksi, "SELECT b.penyakit, count(a.id) as jml FROM user a left join tb_penyakit b on a.penyakit = b.id  where a.penyakit <> '' ".$wherejoin."
                      group by b.id order by count(a.id) asc");
                    $total=0;
                    $hasil=0;
                    while($row=mysqli_fetch_array($tampil)) { 
                      $total+=$row['jml'];
                      $hasil=($row['jml']/$total)*100;
          ?>
            "<?php echo $row['jml']; ?>",
          <?php } ?>
        ],
            backgroundColor: [
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
            ],
            borderColor: [
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
            ],
            borderWidth: 1
        }]
    },
    options: {
          legend: {
            position: 'top',
            align: 'start'
          },
        tooltips: {
          enabled: true
        },
        plugins: {
           datalabels: {
            color: 'black',
            formatter: (val) => {
          return ((val/<?php echo $total?>)*100).toFixed(2) + ' %';
            }
           },
          title: {
            display: true,
            text: 'Chart.js Pie Chart'
          }
        },
        scaleShowValues: true,
        scales: {
            yAxes: [{
            ticks: {
              display: !isMobileDevice2(),
            beginAtZero: true
            }}],
            xAxes: [{
            ticks: {
              display: !isMobileDevice2(),
            autoSkip: false
            }}]
        }
    }
});
</script>

<script>
  var canvasheight_penyakit_2=document.getElementById("myChart_penyakit_2").height;
var resizeId_penyakit_2;
        $(window).resize(function() {
            clearTimeout(resizeId_penyakit_2);
            resizeId_penyakit_2 = setTimeout(afterResizing_penyakit_2, 100);
        });
        function afterResizing_penyakit(){
            if(canvasheight_penyakit_2 <=250)
            {
                window.myChart_penyakit_2.options.legend.display=false;
            }
            else
            {
                window.myChart_penyakit_2.options.legend.display=true;
            }
            window.myChart_penyakit_2.update();
        }

         $(window).ready(function() {
            clearTimeout(resizeId_penyakit_2);
            resizeId_penyakit_2 = setTimeout(afterResizing_penyakit_2, 100);
        });
        function afterResizing_penyakit_2(){
            if(screen.width < 960)
            {
                window.myChart_penyakit_2.options.legend.display=false;
            }
            else
            {
                window.myChart_penyakit_2.options.legend.display=true;
            }
            window.myChart_penyakit_2.update();
        }


function isMobileDevice3(){
    return ( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent));
}

var ctx = document.getElementById('myChart_penyakit_2').getContext('2d');
var myChart_penyakit_2 = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [
          <?php 
                    $tampil = mysqli_query($koneksi, "SELECT b.penyakit, count(a.id) as jml FROM user a left join tb_penyakit b on a.penyakit = b.id  where a.penyakit <> '' ".$wherejoin."
                      and not b.id=0
                      group by b.id order by count(a.id) asc");
                    while($row=mysqli_fetch_array($tampil)) {
          ?>
            "<?php echo $row['penyakit']; ?>",
          <?php } ?>
        ],
        datasets: [{
            label: 'Anggota',
            data: [
          <?php 
                    $tampil = mysqli_query($koneksi, "SELECT b.penyakit, count(a.id) as jml FROM user a left join tb_penyakit b on a.penyakit = b.id  where a.penyakit <> '' ".$wherejoin."
                      and not b.id=0
                      group by b.id order by count(a.id) asc");
                    $total=0;
                    $hasil=0;
                    while($row=mysqli_fetch_array($tampil)) { 
                      $total+=$row['jml'];
                      $hasil=($row['jml']/$total)*100;
          ?>
            "<?php echo $row['jml']; ?>",
          <?php } ?>
        ],
            backgroundColor: [
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
            ],
            borderColor: [
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
            ],
            borderWidth: 1
        }]
    },
    options: {
          legend: {
            position: 'top',
            align: 'start'
          },
        tooltips: {
          enabled: true
        },
        plugins: {
           datalabels: {
            color: 'black',
            formatter: (val) => {
          return ((val/<?php echo $total?>)*100).toFixed(2) + ' %';
            }
           },
          title: {
            display: true,
            text: 'Chart.js Pie Chart'
          }
        },
        scaleShowValues: true,
        scales: {
            yAxes: [{
            ticks: {
              display: !isMobileDevice3(),
            beginAtZero: true
            }}],
            xAxes: [{
            ticks: {
              display: !isMobileDevice3(),
            autoSkip: false
            }}]
        }
    }
});
</script>

<script>
var canvasheight_pendapatan=document.getElementById("myChart_pendapatan").height;
var resizeId_pendapatan;
        $(window).resize(function() {
            clearTimeout(resizeId_pendapatan);
            resizeId_pendapatan = setTimeout(afterResizing_pendapatan, 100);
        });
        function afterResizing_pendapatan(){
            if(canvasheight_pendapatan <=250)
            {
                window.myChart_pendapatan.options.legend.display=false;
            }
            else
            {
                window.myChart_pendapatan.options.legend.display=true;
            }
            window.myChart_pendapatan.update();
        }

         $(window).ready(function() {
            clearTimeout(resizeId_pendapatan);
            resizeId_pendapatan = setTimeout(afterResizing_pendapatan, 100);
        });
        function afterResizing_pendapatan(){
            if(screen.width < 960)
            {
                window.myChart_pendapatan.options.legend.display=false;
            }
            else
            {
                window.myChart_pendapatan.options.legend.display=true;
            }
            window.myChart_pendapatan.update();
        }


var ctx = document.getElementById('myChart_pendapatan').getContext('2d');
var myChart_pendapatan = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: [
          <?php 
                    $tampil = mysqli_query($koneksi, "SELECT b.pendapatan, count(a.id) as jml FROM user a left join tb_pendapatan b on a.pendapatan = b.id  where a.pendapatan <> '' ".$wherejoin."
                      group by b.id order by count(a.id) asc");
                    while($row=mysqli_fetch_array($tampil)) {
          ?>
            "<?php echo $row['pendapatan']; ?>",
          <?php } ?>
        ],
        datasets: [{
            label: '# of Votes',
            data: [
          <?php 
                    $tampil = mysqli_query($koneksi, "SELECT b.pendapatan, count(a.id) as jml FROM user a left join tb_pendapatan b on a.pendapatan = b.id  where a.pendapatan <> '' ".$wherejoin."
                      group by b.id order by count(a.id) asc");
                    $total=0;
                    $hasil=0;
                    while($row=mysqli_fetch_array($tampil)) { 
                      $total+=$row['jml'];
                      $hasil=($row['jml']/$total)*100;
          ?>
            "<?php echo $row['jml']; ?>",
          <?php } ?>
        ],
            backgroundColor: [
                '#eb4034',
                '#db710d',
                '#dbc30d',
                '#93db0d',
            ],
            borderColor: [
                '#eb4034',
                '#db710d',
                '#dbc30d',
                '#93db0d',
            ],
            borderWidth: 1
        }]
    },
    options: {
          legend: {
            position: 'left',
            align: 'start'
          },
        tooltips: {
          enabled: true
        },
        plugins: {
           datalabels: {
            color: 'white',
            formatter: (val) => {
          return ((val/<?php echo $total?>)*100).toFixed(2) + ' %';
            }
           },
          title: {
            display: true,
            text: 'Chart.js Pie Chart'
          }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

<script>
var canvasheight_pend=document.getElementById("myChart_pend").height;
var resizeId_pend;
        $(window).resize(function() {
            clearTimeout(resizeId_pend);
            resizeId_pend = setTimeout(afterResizing_pend, 100);
        });
        function afterResizing_pend(){
            if(canvasheight_pend <=250)
            {
                window.myChart_pend.options.legend.display=false;
            }
            else
            {
                window.myChart_pend.options.legend.display=true;
            }
            window.myChart_pend.update();
        }

         $(window).ready(function() {
            clearTimeout(resizeId_pend);
            resizeId_pend = setTimeout(afterResizing_pend, 100);
        });
        function afterResizing_pend(){
            if(screen.width < 960)
            {
                window.myChart_pend.options.legend.display=false;
            }
            else
            {
                window.myChart_pend.options.legend.display=true;
            }
            window.myChart_pend.update();
        }


var ctx = document.getElementById('myChart_pend').getContext('2d');
var myChart_pend = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: [
          <?php 
                    $tampil = mysqli_query($koneksi, "SELECT pendidikan, count(id) as jml FROM user where pendidikan <> '' ".$where."
                      group by pendidikan order by count(id) asc");
                    $total=0;
                    $hasil=0;
                    while($row=mysqli_fetch_array($tampil)) { 
          ?>
            "<?php echo $row['pendidikan']; ?>",
          <?php } ?>
        ],
        datasets: [{
            label: '# of Votes',
            data: [
          <?php 
                    $tampil = mysqli_query($koneksi, "SELECT pendidikan, count(id) as jml FROM user where pendidikan <> '' ".$where."
                      group by pendidikan order by count(id) asc");
                    $total=0;
                    $hasil=0;
                    while($row=mysqli_fetch_array($tampil)) { 
                      $total+=$row['jml'];
                      $hasil=($row['jml']/$total)*100;
          ?>
            "<?php echo $row['jml']; ?>",
          <?php } ?>
        ],
            backgroundColor: [
                '#eb4034',
                '#db710d',
                '#dbc30d',
                '#93db0d',
                '#17db0d',
                '#0ddb71',
                '#0dc3db',
                '#0d5cdb',
                '#1e0ddb',
                '#960ddb',
            ],
            borderColor: [
                '#eb4034',
                '#db710d',
                '#dbc30d',
                '#93db0d',
                '#17db0d',
                '#0ddb71',
                '#0dc3db',
                '#0d5cdb',
                '#1e0ddb',
                '#960ddb',
            ],
            borderWidth: 1
        }]
    },
    options: {
          legend: {
            position: 'left',
            align: 'start'
          },
        tooltips: {
          enabled: true
        },
        plugins: {
           datalabels: {
            color: 'white',
            formatter: (val) => {
          return ((val/<?php echo $total?>)*100).toFixed(2) + ' %';
            }
           },
          title: {
            display: true,
            text: 'Chart.js Pie Chart'
          }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

<script>
var canvasheight_jamkes=document.getElementById("myChart_jamkes").height;
var resizeId_jamkes;
        $(window).resize(function() {
            clearTimeout(resizeId_jamkes);
            resizeId_jamkes = setTimeout(afterResizing_jamkes, 100);
        });
        function afterResizing_jamkes(){
            if(canvasheight_jamkes <=250)
            {
                window.myChart_jamkes.options.legend.display=false;
            }
            else
            {
                window.myChart_jamkes.options.legend.display=true;
            }
            window.myChart_jamkes.update();
        }

         $(window).ready(function() {
            clearTimeout(resizeId_jamkes);
            resizeId_jamkes = setTimeout(afterResizing_jamkes, 100);
        });
        function afterResizing_jamkes(){
            if(screen.width < 960)
            {
                window.myChart_jamkes.options.legend.display=false;
            }
            else
            {
                window.myChart_jamkes.options.legend.display=true;
            }
            window.myChart_jamkes.update();
        }


var ctx = document.getElementById('myChart_jamkes').getContext('2d');
var myChart_jamkes = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['Asuransi Swasta','BPJS Kesehatan','KIS','Tidak Punya'],
        datasets: [{
            label: '# of Votes',
            data: [
          <?php 
                    $tampil = mysqli_query($koneksi, "SELECT bpjs, count(id) as jml FROM user where bpjs <> '' and bpjs<5 ".$where."
                      group by bpjs order by count(id) asc");
                    $total=0;
                    $hasil=0;
                    while($row=mysqli_fetch_array($tampil)) { 
                      $total+=$row['jml'];
                      $hasil=($row['jml']/$total)*100;
          ?>
            "<?php echo $row['jml']; ?>",
          <?php } ?>
        ],
            backgroundColor: [
                '#eb4034',
                '#db710d',
                '#dbc30d',
                '#93db0d'
            ],
            borderColor: [
                '#eb4034',
                '#db710d',
                '#dbc30d',
                '#93db0d'
            ],
            borderWidth: 1
        }]
    },
    options: {
          legend: {
            position: 'left',
            align: 'start'
          },
        tooltips: {
          enabled: true
        },
        plugins: {
           datalabels: {
            color: 'white',
            formatter: (val) => {
          return ((val/<?php echo $total?>)*100).toFixed(2) + ' %';
            }
           },
          title: {
            display: true,
            text: 'Chart.js Pie Chart'
          }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

<script>
var canvasheight_pekerjaan=document.getElementById("myChart_pekerjaan").height;
var resizeId_pekerjaan;
        $(window).resize(function() {
            clearTimeout(resizeId_pekerjaan);
            resizeId_pekerjaan = setTimeout(afterResizing_pekerjaan, 100);
        });
        function afterResizing_pekerjaan(){
            if(canvasheight_pekerjaan <=250)
            {
                window.myChart_pekerjaan.options.legend.display=false;
            }
            else
            {
                window.myChart_pekerjaan.options.legend.display=true;
            }
            window.myChart_pekerjaan.update();
        }

         $(window).ready(function() {
            clearTimeout(resizeId_pekerjaan);
            resizeId_pekerjaan = setTimeout(afterResizing_pekerjaan, 100);
        });
        function afterResizing_pekerjaan(){
            if(screen.width < 960)
            {
                window.myChart_pekerjaan.options.legend.display=false;
                window.myChart_pekerjaan.options.scales.yAxes.ticks.display=false;
window.myChart_pekerjaan.options.scales.xAxes.ticks.display=false;
            }
            else
            {
                window.myChart_pekerjaan.options.legend.display=true;
            }
            window.myChart_pekerjaan.update();
        }


function isMobileDevice(){
    return ( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent));
}

var ctx = document.getElementById('myChart_pekerjaan').getContext('2d');
var myChart_pekerjaan = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [
          <?php 
                    $tampil = mysqli_query($koneksi, "SELECT b.pekerjaan, count(a.id) as jml FROM user a left join tb_pekerjaan b on a.pekerjaan= b.id  where a.pekerjaan <> ''
                      ".$wherejoin."
                      group by b.id order by count(a.id) asc");
                    while($row=mysqli_fetch_array($tampil)) {
          ?>
            "<?php echo $row['pekerjaan']; ?>",
          <?php } ?>
        ],
        datasets: [{
            label: 'Jumlah Aggota yang bekerja pada bidang',
            data: [
          <?php 
                    $tampil = mysqli_query($koneksi, "SELECT b.pekerjaan, count(a.id) as jml FROM user a left join tb_pekerjaan b on a.pekerjaan= b.id where a.pekerjaan <> ''
                      ".$wherejoin."
                      group by b.id order by count(a.id) asc");
                    $total=0;
                    $hasil=0;
                    while($row=mysqli_fetch_array($tampil)) { 
                      $total+=$row['jml'];
                      $hasil=($row['jml']/$total)*100;
          ?>
            "<?php echo $row['jml']; ?>",
          <?php } ?>
        ],
            backgroundColor: [
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',

            ],
            borderColor: [
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
                '#eb4034',
            ],
            borderWidth: 1
        }]
    },
    options: {
          legend: {
            position: 'top',
            align: 'start'
          },
        tooltips: {
          enabled: true
        },
        plugins: {
           datalabels: {
            color: 'black',
            formatter: (val) => {
          return ((val/<?php echo $total?>)*100).toFixed(2) + ' %';
            }
           },
          title: {
            display: true,
            text: 'Chart.js Pie Chart'
          }
        },
        scaleShowValues: true,
        scales: {
            yAxes: [{
            ticks: {
              display: !isMobileDevice(),
              beginAtZero: true
            }}],
            xAxes: [{
            ticks: {
              display: !isMobileDevice(),
            autoSkip: false
            }}]
        }
    }
});
</script>

<script>
var canvasheightLP=document.getElementById("myChartLP").height;
var resizeIdLP;
        $(window).resize(function() {
            clearTimeout(resizeIdLP);
            resizeIdLP = setTimeout(afterResizingLP, 100);
        });
        function afterResizingLP(){
            if(canvasheightLP <=250)
            {
                window.myChartLP.options.legend.display=false;
            }
            else
            {
                window.myChartLP.options.legend.display=true;
            }
            window.myChartLP.update();
        }

         $(window).ready(function() {
            clearTimeout(resizeIdLP);
            resizeIdLP = setTimeout(afterResizingLP, 100);
        });
        function afterResizingLP(){
            if(screen.width < 960)
            {
                window.myChartLP.options.legend.display=false;
            }
            else
            {
                window.myChartLP.options.legend.display=true;
            }
            window.myChartLP.update();
        }


var ctx = document.getElementById('myChartLP').getContext('2d');
var myChartLP = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: [
          <?php 
                    $tampil = mysqli_query($koneksi, "SELECT jk, count(id) as jml FROM user where jk <> ''
                      ".$where." group by jk order by count(id) asc");
                    while($row=mysqli_fetch_array($tampil)) {
          ?>
            "<?php echo $row['jk']; ?>",
          <?php } ?>
        ],
        datasets: [{
            label: '# of Votes',
            data: [
          <?php 
                    $tampil = mysqli_query($koneksi, "SELECT jk, count(id) as jml FROM user where jk <> ''
                      ".$where."group by jk order by count(id) asc");
                    $total=0;
                    $hasil=0;
                    while($row=mysqli_fetch_array($tampil)) { 
                      $total+=$row['jml'];
                      $hasil=($row['jml']/$total)*100;
          ?>
            "<?php echo $row['jml']; ?>",
          <?php } ?>
        ],
            backgroundColor: [
                '#eb4034',
                '#db710d',
                '#dbc30d',
                '#93db0d'
            ],
            borderColor: [
                '#eb4034',
                '#db710d',
                '#dbc30d',
                '#93db0d'
            ],
            borderWidth: 1
        }]
    },
    options: {
          legend: {
            position: 'left',
            align: 'start'
          },
        tooltips: {
          enabled: true
        },
        plugins: {
           datalabels: {
            color: 'white',
            formatter: (val) => {
          return ((val/<?php echo $total?>)*100).toFixed(2) + ' %';
            }
           },
          title: {
            display: true,
            text: 'Chart.js Pie Chart'
          }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

<script>

var canvasheight=document.getElementById("myChart_pendapatan").height;
var resizeId;
        $(window).resize(function() {
            clearTimeout(resizeId);
            resizeId = setTimeout(afterResizing, 100);
        });
        function afterResizing(){
            if(canvasheight <=250)
            {
                window.myChart_pendapatan.options.legend.display=false;
            }
            else
            {
                window.myChart_pendapatan.options.legend.display=true;
            }
            window.myChart_pendapatan.update();
        }

         $(window).ready(function() {
            clearTimeout(resizeId);
            resizeId = setTimeout(afterResizing, 100);
        });
        function afterResizing(){
            if(screen.width < 960)
            {
                window.myChart_pendapatan.options.legend.display=false;
            }
            else
            {
                window.myChart_pendapatan.options.legend.display=true;
            }
            window.myChart_pendapatan.update();
        }


var canvasheight_pendapatan=document.getElementById("myChart_pendapatan").height;
var resizeId_pendapatan;
        $(window).resize(function() {
            clearTimeout(resizeId_pendapatan);
            resizeId_pendapatan = setTimeout(afterResizing_pendapatan, 100);
        });
        function afterResizing_pendapatan(){
            if(canvasheight_pendapatan <=250)
            {
                window.myChart_pendapatan.options.legend.display=false;
            }
            else
            {
                window.myChart_pendapatan.options.legend.display=true;
            }
            window.myChart_pendapatan.update();
        }

         $(window).ready(function() {
            clearTimeout(resizeId_pendapatan);
            resizeId_pendapatan = setTimeout(afterResizing_pendapatan, 100);
        });
        function afterResizing_pendapatan(){
            if(screen.width < 960)
            {
                window.myChart_pendapatan.options.legend.display=false;
            }
            else
            {
                window.myChart_pendapatan.options.legend.display=true;
            }
            window.myChart_pendapatan.update();
        }


var canvasheight_status_kawin=document.getElementById("myChart_status_kawin").height;
var resizeId_status_kawin;
        $(window).resize(function() {
            clearTimeout(resizeId_status_kawin);
            resizeId_status_kawin = setTimeout(afterResizing_status_kawin, 100);
        });
        function afterResizing_status_kawin(){
            if(canvasheight_status_kawin <=250)
            {
                window.myChart_status_kawin.options.legend.display=false;
            }
            else
            {
                window.myChart_status_kawin.options.legend.display=true;
            }
            window.myChart_status_kawin.update();
        }

         $(window).ready(function() {
            clearTimeout(resizeId_status_kawin);
            resizeId_status_kawin = setTimeout(afterResizing_status_kawin, 100);
        });
        function afterResizing_status_kawin(){
            if(screen.width < 960)
            {
                window.myChart_status_kawin.options.legend.display=false;
            }
            else
            {
                window.myChart_status_kawin.options.legend.display=true;
            }
            window.myChart_status_kawin.update();
        }


var ctx = document.getElementById('myChart_status_kawin').getContext('2d');
var myChart_status_kawin = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: [
          <?php 
                    $tampil = mysqli_query($koneksi, "SELECT status_kawin, count(id) as jml FROM user where status_kawin <> '' ".$where."
                      group by status_kawin order by count(id) asc");
                    while($row=mysqli_fetch_array($tampil)) {
          ?>
            "<?php echo $row['status_kawin']; ?>",
          <?php } ?>
        ],
        datasets: [{
            label: '# of Votes',
            data: [
          <?php 
                    $tampil = mysqli_query($koneksi, "SELECT status_kawin, count(id) as jml FROM user where status_kawin <> '' ".$where."
                      group by status_kawin order by count(id) asc");
                    $total=0;
                    $hasil=0;
                    while($row=mysqli_fetch_array($tampil)) { 
                      $total+=$row['jml'];
                      $hasil=($row['jml']/$total)*100;
          ?>
            "<?php echo $row['jml']; ?>",
          <?php } ?>
        ],
            backgroundColor: [
                '#eb4034',
                '#db710d',
                '#dbc30d',
                '#93db0d'
            ],
            borderColor: [
                '#eb4034',
                '#db710d',
                '#dbc30d',
                '#93db0d'
            ],
            borderWidth: 1
        }]
    },
   options: {
          legend: {
            position: 'left',
            align: 'start'
          },
        tooltips: {
          enabled: true
        },
        plugins: {
           datalabels: {
            color: 'white',
            formatter: (val) => {
          return ((val/<?php echo $total?>)*100).toFixed(2) + ' %';
            }
           },
          title: {
            display: true,
            text: 'Chart.js Pie Chart'
          }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
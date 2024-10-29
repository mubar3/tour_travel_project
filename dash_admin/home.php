<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">

  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-solid">
          <!-- /.box-header -->
          <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
              <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
            </ol>
            <div class="carousel-inner">
              <div class="item active">
                <img src="../assets/img/slide/slidex.jpg" alt="First slide" class="img-thumbnail">
                <div class="carousel-caption">
                  <h4></h4>
                </div>
              </div>
              <div class="item">
                <img src="../assets/img/slide/slidex1.jpg" alt="tree slide" class="img-thumbnail">
                <div class="carousel-caption">
                  <h4></h4>
                </div>
              </div>
            </div>
            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
              <span class="fa fa-angle-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
              <span class="fa fa-angle-right"></span>
            </a>
          </div>

          <!-- /.box-body -->
        </div>
        <div class="callout callout-success" style="background-image:url(../assets/img/bg/header.png);">
          <marquee>Selamat datang di Aplikasi <?php echo "$i[sekolah] "; ?> <label class="label bg-green"><?php
          $tanggal = date ("d");
          $bulan = array(1=>"Januari","Februari","Maret", "April", "Mei", "Juni","Juli","Agustus","September","Oktober", "November","Desember");
          $bulan = $bulan[date("n")];
          $tahun = date("Y");
          echo $tanggal ." ". $bulan ." ". $tahun;
          date_default_timezone_set('Asia/Jakarta');
          $jam=date("H:i");
          echo " | ". $jam." "."";
          $a = date ("H");
          if (($a>=1) && ($a<=10)){
            echo ", Selamat Pagi";
          }
          else if(($a>10) && ($a<=13))
          {
            echo ", Selamat Siang";
          }
          else if (($a>13) && ($a<=15))
          {
            echo ", Selamat Sore";
          }
          else if (($a>16) && ($a<=17))
          {
            echo ", Selamat Petang";
          }
          else { echo ", Selamat Malam";}?></label></marquee>
        </div>
      </div>

      <div class="col-md-6">
        <div class="info-box bg-yellow">
          <span class="info-box-icon"><i class="fa fa-users"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">DATABASE ANGGOTA</span>
            <span class="info-box-number"><?php 
            session_start();
            if($_SESSION['level']==1){
            $data = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM user "));
            }
            elseif($_SESSION['level']==2){
            $data = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM user where id_level IN ('3') and id_kec='$_SESSION[id_kec]' "));
            }
            elseif($_SESSION['level']==3){
            $data = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM user where id_level IN ('3') and id_kel='$_SESSION[id_kel]' "));
            }
             echo "$data"; ?> Anggota</span>
            <!-- The progress section is optional -->
            <div class="progress">
              <div class="progress-bar" style="width: 100%"></div>
            </div>
            <span class="progress-description">
              <marquee direction="up" scrollamount="1">Data ini akan bertambah jika telah dilakukan penginputan data kembali oleh administrator sistem <?php echo "$i[nama] "; ?></marquee>
            </span>
          </div><!-- /.info-box-content -->
        </div>
      </div>

      <div class="col-md-6">
        <div class="info-box bg-yellow">
          <span class="info-box-icon"><i class="fa fa-users"></i></span>
          <div class="info-box-content">
            <?php 
            date_default_timezone_set('Asia/Jakarta');
            $tgl = date("Y-m-d"); 
            ?>
            <span class="info-box-text">INPUTAN DATABASE ANGGOTA HARI INI</span>
            <span class="info-box-number"><?php 
            session_start();
            if($_SESSION['level']==1){
            $data = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM user where date(created)='$tgl' "));
            }
            elseif($_SESSION['level']==2){
            $data = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM user where id_level IN ('3') and id_kec='$_SESSION[id_kec]' "));
            }
            elseif($_SESSION['level']==3){
            $data = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM user where id_level IN ('3') and id_kel='$_SESSION[id_kel]' "));
            }
            if(!empty($data)){
             echo $data; 
            }else{
              echo "0";
            }
            ?> Anggota</span>
            <!-- The progress section is optional -->
            <div class="progress">
              <div class="progress-bar" style="width: 100%"></div>
            </div>
            <span class="progress-description">
              <marquee direction="up" scrollamount="1">Data ini akan bertambah jika telah dilakukan penginputan data kembali oleh administrator sistem <?php echo "$i[nama] "; ?></marquee>
            </span>
          </div><!-- /.info-box-content -->
        </div>
      </div>



     <!--  <div class="col-lg-6 col-xs-6">
        <div class="small-box bg-aqua">
          <div class="inner">
            <h4>
              TAMBAH DATA ANGGOTA
            </h4>
            <marquee direction="up" scrollamount="1"><p><?php echo "$i[nama] "; ?></p></marquee>
          </div>
          <div class="icon">
            <i class="fa fa-user-plus"></i>
          </div>
          <a href="create-data"class="small-box-footer">Tambah Sekarang <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      ./col
      <div class="col-lg-6 col-xs-6">
        <div class="small-box bg-orange">
          <div class="inner">
            <h4>
              LIHAT DATA KARTANU
            </h4>
            <marquee direction="up" scrollamount="1"><p><?php echo "$i[nama] "; ?></p></marquee>
          </div>
          <div class="icon">
            <i class="fa fa-list-ul"></i>
          </div>
          <a href="view-data" class="small-box-footer">Lihat Sekarang <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div> -->

      <!-- ./col -->
      <!-- <div class="col-lg-4 col-xs-6"> -->
        <!-- small box -->
       <!--  <div class="small-box bg-red">
          <div class="inner">
            <h4>
              LIHAT DATA KARTANU
            </h4>
            <marquee direction="up" scrollamount="1"><p><?php echo "$i[nama] "; ?></p></marquee>
          </div>
          <div class="icon">
            <i class="fa fa-list-ul"></i>
          </div>
          <a href="view-datax" class="small-box-footer">Lihat Sekarang <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div> -->
      
      <!-- ./col -->
      <!-- <div class="col-lg-4 col-xs-6"> -->
        <!-- small box -->
        <!-- <div class="small-box bg-green">
          <div class="inner">
            <h4>
              CETAK KARTANU
            </h4>
            <marquee direction="up" scrollamount="1"><p><?php echo "$i[nama] "; ?></p></marquee>
          </div>
          <div class="icon">
            <i class="fa fa-print"></i>
          </div>
          <a href="tag-data" class="small-box-footer">Cetak Sekarang <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div> -->

      <!-- ./col -->
      <!-- <div class="col-lg-4 col-xs-6"> -->
        <!-- small box -->
        <!-- <div class="small-box bg-olive">
          <div class="inner">
            <h4>
              CETAK KARTANU
            </h4>
            <marquee direction="up" scrollamount="1"><p><?php echo "$i[nama] "; ?></p></marquee>
          </div>
          <div class="icon">
            <i class="fa fa-print"></i>
          </div>
          <a href="tag-datax" class="small-box-footer">Cetak Sekarang <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div> -->

      <!-- <div class="col-lg-4 col-xs-6"> -->
        <!-- small box -->
        <!-- <div class="small-box bg-yellow">
          <div class="inner">
            <h4>
              UPDATE IDENTITAS
            </h4>
            <marquee direction="up" scrollamount="1"><p><?php echo "$i[nama] "; ?></p></marquee>
          </div>
          <div class="icon">
            <i class="fa fa-th-large"></i>
          </div>
          <a href="update-identitas" class="small-box-footer">Update Sekarang <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div> -->
      <!-- ./col -->
    </div>
  </section>
</div>

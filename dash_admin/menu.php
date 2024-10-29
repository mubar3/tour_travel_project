<div class="wrapper"> <header class="main-header">
  <!-- Logo -->

  <a href="home" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b></b><img src="../assets/img/logo/<?php echo "$i[gambar] "; ?>" width="50px"></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg" style="margin-left: -15px;"><img src="../assets/img/logo/<?php echo "$i[gambar] "; ?>" width="50px"> <?php echo "$i[nama] "; ?></span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top" style="border-bottom: 3px solid orange;background-image: url(../assets/img/bg/head.png);">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span> 
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li><a href="#" style="text-transform: uppercase;"><strong><?php echo "$i[sekolah] "; ?></strong></a></li>
        <!-- <li class="bg-navy">
          <a href="logout" onclick="return confirm('Yakin Anda Akan Logout?')">
            <i class="fa fa-power-off"></i>
          </a>
        </li> -->
      </ul>
    </div>
  </nav>
</header>
<div style="border-top: 3px solid #FFFFFF;"></div>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar"><div style="border-top: 3px solid orange;"></div>
    <!-- Sidebar user panel -->
    <div class="user-panel" style="padding-bottom: 20px;">
      <div class="pull-left image"><?php $query = mysqli_query($koneksi, "SELECT * FROM userr WHERE username='$username' AND password='$password'");?>
      <img src="../assets/img/user/blank.png" class="img-rounded" alt="User Image">
    </div>
    <div class="pull-left info">
      <p><span class="label bg-orange">Admin</p><p><span class="label bg-orange"><?php echo $_SESSION['username']; ?></span></p>
      <!-- <p><span class="label bg-orange">Admin <?php echo $_SESSION['id_level']; ?></span></p><p><span class="label bg-orange"><?php echo $_SESSION['username']; ?></span></p> -->
      <p href="#"><i class="fa fa-dot-circle-o text-red"></i> Online</p>
      <p></p>
    </div>
  </div>
  <br>
  <!-- search form -->
  <!-- <form target='blank' action="https://www.google.co.id/search" method="get" class="sidebar-form">
    <div class="input-group">
      <input type="text" name="q" class="form-control" placeholder="Google Search...">
      <span class="input-group-btn">
        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
        </button>
      </span>
    </div>
  </form> -->
  <!-- /.search form -->

  <!-- sidebar menu: : style can be found in sidebar.less -->
  <ul class="sidebar-menu">
    <li class="header bg-green"><i class="fa fa-home"></i> MENU NAVIGASI</li>
    <li class="treeview">
      <a href="home">
        <i class="fa fa-dashboard"></i>
        <span>BERANDA</span>
      </a>
    </li>
    <li class="treeview">
      <a href="create-data">
        <i class="fa fa-user-plus"></i> <span>TAMBAH ANGGOTA</span>
      </a>
    <!-- </li><li class="treeview">
      <a href="data-verifikasi">
        <i class="fa fa-tasks"></i> <span>DATA BELUM VERIFIKASI</span>
      </a>
    </li>
    <li class="treeview">
      <a href="view-data">
        <i class="fa fa-tasks"></i> <span>LIHAT DATA TERVERIFIKASI</span>
      </a>
    </li> -->
    <li class="treeview">
      <a href="view-data">
        <i class="fa fa-tasks"></i> <span>DAFTAR ANGGOTA</span>
      </a>
    </li>
    <li class="treeview">
      <a >
        <i class="fa fa-tasks"></i> <span>KEUANGAN</span>
      </a>
    </li>
    <li class="treeview">
      <a >
        <i class="fa fa-tasks"></i> <span>UMROH & HAJI</span>
      </a>
    </li>
    <li class="treeview">
      <a >
        <i class="fa fa-tasks"></i> <span>PERLENGKAPAN</span>
      </a>
    </li>
    <?php if($_SESSION['level']==1){?>
    <!-- <li class="treeview">
      <a href="view-data-admin">
        <i class="fa fa-user-circle-o"></i> <span>ADMINISTRATOR</span>
      </a>
    </li>
    <li class="treeview">
      <a href="download1">
        <i class="fa fa-download"></i> <span>DOWNLOAD</span>
      </a>
    </li> -->
    <?php } ?>
    <!-- <li class="treeview">
      <a href="mwc-percen">
        <i class="fa fa-bar-chart"></i> <span>PROGRES MWC</span>
      </a>
    </li>
    <li class="treeview">
      <a href="statistik">
        <i class="fa fa-line-chart"></i> <span>STATISTIK</span>
      </a>
    </li> -->
    <?php if($_SESSION['level']==1){?>
    <!-- <li class="treeview">
      <a href="tag-data">
        <i class="fa fa-print"></i> <span>CETAK KARTU</span>
      </a>
    </li>
    <li class="treeview">
      <a href="tag-data-sudah">
        <i class="fa fa-print"></i> <span>SUDAH CETAK</span>
      </a>
    </li> -->
    <?php } ?>
    <!--li class="treeview">
      <a >
        <i class="fa fa-tasks"></i> <span>LIHAT DATA</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="view-data"><i class="fa fa-circle-o text-aqua"></i> DATA KARTANU</a></li>
        <li><a href="view-datax"><i class="fa fa-circle-o text-aqua"></i> KARTANU</a></li>
      </ul>
    </li-->

    <!--li class="treeview">
      <a >
        <i class="fa fa-print"></i> <span>CETAK KARTU</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="tag-data"><i class="fa fa-circle-o text-aqua"></i> KARTANU</a></li>
        <li><a href="tag-datax"><i class="fa fa-circle-o text-aqua"></i> KARTANU</a></li>
      </ul>
    </li-->
    <!-- new fitur menu -->
    
    <!--li>
      <a href="js">
        <i class="fa fa-list-alt "></i> <span>DATA KARTANU</span>
        <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
      </a>
    </li>
    <li>
      <a href="jsprint">
        <i class="fa fa-print "></i> <span>CETAK KARTAMUSNU </span>
        <span class="pull-right-container">
              <small class="label pull-right bg-orange">new</small>
            </span>
      </a>
    </li-->
    <!-- <li class="treeview">
      <a href="upload-data">
        <i class="fa fa-upload"></i> <span>UPLOAD DATA</span>
      </a>
    </li>
    <li class="treeview">
      <a href="download_data.php">
        <i class="fa fa-download"></i> <span>DOWNLOAD DATA</span>
      </a>
    </li> -->
    <!-- <li class="treeview">
      <a >
        <i class="glyphicon glyphicon-credit-card"></i> <span>CARD DESIGN</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="update-blangko"><i class="fa fa-circle-o text-aqua"></i> KARTAMUS</a></li>
        <li><a href="update-blangkoo"><i class="fa fa-circle-o text-aqua"></i> KARTANU</a></li>
        <li><a href="ttdall"><i class="fa fa-circle-o text-aqua"></i> TANDA TANGAN KABUPATEN</a></li>
      </ul>
    </li> -->
    <!-- <li class="treeview">
      <a>
        <i class="fa fa-cogs"></i> <span>SETTING</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="update-identitas"><i class="fa fa-circle-o text-aqua"></i> IDENTITAS APLIKASI</a></li>
        <li><a href="view-user"><i class="fa fa-circle-o text-aqua"></i> USERS</a></li>
        <li><a href="view-provinsi"><i class="fa fa-circle-o text-aqua"></i> PROVINSI</a></li>
        <li><a href="view-kabupaten"><i class="fa fa-circle-o text-aqua"></i> KABUPATEN</a></li>
        <li><a href="view-kecamatan"><i class="fa fa-circle-o text-aqua"></i> KECAMATAN</a></li>
        <li><a href="view-kelurahan"><i class="fa fa-circle-o text-aqua"></i> KELURAHAN</a></li>
      </ul>
    </li> -->
    <!-- 
    <li>
      <a href="webcam.php">
        <i class="fa fa-camera"></i> <span> WEBCAM</span>
      </a>
    </li> 
    <li class="treeview">
      <a target="_Blank" href="https://sig-dev.bps.go.id/webgis/pencariankodenama">
        <i class="fa fa-search"></i> <span>SEARCH BPS</span>
      </a>
    </li>-->
    <!-- <li class="treeview">
      <a data-toggle="modal" data-target="#myModal2">
        <i class="fa fa-leaf"></i> <span>ABOUT</span>
      </a>
    </li>
    <li>
      <a href="faq">
        <i class="fa fa-question-circle"></i> <span>FAQ</span>
      </a>
    </li> -->
    <li>
      <a href="logout" onclick="return confirm('Yakin Anda Akan Logout?')">
        <i class="fa fa-power-off"></i> <span>LOGOUT</span>
      </a>
    </li>
  </ul>
</section>
<!-- /.sidebar -->
</aside>

<!-- Modal Menu Pengembangan -->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-red">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-edit"></i> UPS !!! MENU</h4>
      </div>
      <div class="modal-body">
        <center><img src="../assets/img/ups.png" width="30%">
          <h2>MENU INI HANYA DAPAT DIAKSES OLEH ADMINISTRATOR <br> <span class="text-purple">POWERED BY ARIES </span><br></h2>
        </center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn bg-red" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-green">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-leaf"></i> TENTANG <strong><?php echo "$i[nama] "; ?></strong></h4>
      </div>
      <div class="modal-body">
        <center><img style="background-color: #026537;" src="../assets/img/logo/<?php echo "$i[gambar] "; ?>" width="90px">
          <!-- <marquee direction="up" height="100" onmouseout="this.start()" onmouseover="this.stop()" scrollamount="2"> -->
            <label>Aplikasi ini dibuat untuk memudahkan pengisian data anggota, dan sebaliknya keluaran dari aplikasi ini akan menghasilkan sebuah ID Card yang dapat langsung dicetak. <br>
              Selanjutnya  Aplikasi ini akang terus dikembangkan sesuai dengan kebutuhan sistem. Terimakasih...
            </center>
            <br>#XamppVersi 3.2.1
            <br>#Php 5.6
            <br>#Phpqrcode
            <br>#Bootstrap
            <br>#Browser Chrome/Firefox Update terbaru
          </label>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn bg-red" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  
  <div class="preloader" style="background-color: #000;">
    <div class="loading">
      <img src="../assets/loader/loading.gif" width="150">
    </div>
  </div>

  
<?php 
include "assets/config/koneksi.php";
include "assets/config/library.php";
include "assets/config/fungsi_indotgl.php";
session_start();
error_reporting(1);
if(isset($_POST['login'])){

  $username = $_POST['username'];
  $password = md5($_POST['password']);
  $id_level   = $_POST['id_level'];

  $query = mysqli_query($koneksi, "SELECT * FROM userr WHERE email='$username' AND password='$password'");

  if(mysqli_num_rows($query) == 0){
    echo '<div class="alert alert-danger">Upss...!!! Login gagal.</div>';
  }else{
    $row = mysqli_fetch_array($query);
    session_start();
    if($row['id_level'] == 1 && $id_level == 1){
      $_SESSION['username']=$username;
      $_SESSION['nama']     = $row['nama'];
      $_SESSION['gambar']     = $row['gambar'];
      $_SESSION['id']     = $row['id'];
      $_SESSION['id_level']='PCNU';
      $_SESSION['level']=$row['id_level'];
      $_SESSION['noanggota']=$row['no_anggota'];
      header("Location: dash_admin");
    }else if($row['id_level'] == 2 && $id_level == 2){
      $_SESSION['username']=$username;
      $_SESSION['nama']     = $row['nama'];
      $_SESSION['gambar']     = $row['gambar'];
      $_SESSION['id']     = $row['id'];
      $_SESSION['id_kec']=$row['id_kec'];
      $_SESSION['id_level']='MWCNU';
      $_SESSION['level']=$row['id_level'];
      $_SESSION['noanggota']=$row['no_anggota'];
      header("Location: dash_admin");
    }else if($row['id_level'] == 3 && $id_level == 3){
      $_SESSION['username']=$username;
      $_SESSION['nama']     = $row['nama'];
      $_SESSION['gambar']     = $row['gambar'];
      $_SESSION['id']     = $row['id'];
      $_SESSION['id_kel']=$row['id_kel'];
      $_SESSION['id_level']='Ranting';
      $_SESSION['level']=$row['id_level'];
      $_SESSION['noanggota']=$row['no_anggota'];
      header("Location: dash_admin");
    }else{
      echo '<div class="alert alert-danger">Upss...!!! Login Anda gagal. </div>';
    }
  }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php $i = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM identitas LIMIT 1"));  echo "$i[nama] "; ?></title>
  <link rel="shortcut icon" href="assets/img/logo/<?php echo "$i[gambar] "; ?>">
  <title style="text-transform: uppercase;"><?php echo "$r[title]";?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/ionicons-2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="assets/plugins/iCheck/square/blue.css">
  <script src="assets/dist/js/jquery-2.2.1.min.js"></script>
  <style type="text/css">
  .preloader {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background-color: #fff;
  }
  .preloader .loading {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%,-50%);
    font: 14px arial;
  }
</style>
<script>
  $(document).ready(function(){
    $(".preloader").fadeOut();
  })
</script>
</head>

<body class='hold-transition login-page' style="background-image: url('assets/img/bg/background-gelombang.jpg');">
 <div class="preloader" style="background-color: #000;">
  <div class="loading">
    <img src="assets/loader/loading.gif" width="150">
  </div>
</div>
<div class='login-box'  style="margin-top: 20px;">
  <div class='login-logo'>
    <center><img width="30%" class="img-thumbnail" style="background-color: #026537;" src="assets/img/logo/<?php echo "$i[gambar] "; ?>"></center>
    <a href='login'><b></b></a>
  </div>
  <!-- /.login-logo -->
  <div class='login-box-body' style="border-top: 8px solid #00a65a;border-bottom: 8px solid #00a65a;border-top-right-radius: 16px;border-top-left-radius: 16px;border-bottom-right-radius: 16px;border-bottom-left-radius: 16px;box-shadow: 0px 3px 6px 0px #222;">
    <center><h4  style="background-color: #00a65a; margin-top: -20px;width: 70%;height: 30px;border-bottom-left-radius: 7px;border-bottom-right-radius: 7px;color: #fff;"><b><?php echo "$i[nama]";?></b></h4></center>
    <br>
    <form role="form" action="" method="post" autocomplete="off">
      <div class='form-group has-feedback'>
        <input type="email" class="form-control" placeholder="Masukan Username Anda" aria-describedby="basic-addon1" name="username" required autofocus />
        <span class='glyphicon glyphicon-user form-control-feedback'></span>
      </div>
      <br>
      <div class='form-group has-feedback'>
        <input type="password" class="form-control" placeholder=" Masukan Password Anda" aria-describedby="basic-addon1" name="password">
        <span class='glyphicon glyphicon-lock form-control-feedback'></span>
      </div>
      <br>
      <div class='form-group has-feedback'>
        <select name="id_level" class="form-control" required>
          <!-- <option value="">Pilih Level User</option> -->
          <option value="1">SUPERADMIN</option>
          <!-- <option value="2">MWCNU</option>
          <option value="3">Ranting</option> -->
        </select>
      </div>
      <br>
      <div class='row'>
        <div class='col-xs-12'>
          <button name="login" type='submit' class='btn bg-orange btn-block'><i class="fa fa-sign-in"></i> MASUK</button>
          <!-- <a data-toggle="modal" data-target="#myModal1" class='btn bg-green btn-block'><i class="fa fa-users"></i> INFO AKUN LOGIN</a> -->
        </div>
      </div>
    </form>


    <script>
      $(document).ready(function(){
        $('.preloader').fadeOut();
      })
    </script>
    <footer><br>
      <center>Copyright <i class="fa fa-copyright"></i> <?php echo date("Y");?>.
      <br><b> <?php echo "$i[sekolah] "; ?></b>
        <!-- <p><a target='_blank' href="http://lokon.id"> Powered by  Pt.BCA </a></p> -->
      </footer>
    </div>

  <!-- <iframe style='margin-left: -100px;margin-top: 50px;border: 4px solid #00a65a;border-bottom-right-radius: 8px;border-top-left-radius: 8px;'border-top-left-radius: 8px;' width="560" height="315" src="https://www.youtube.com/embed/5g7lYiV8KnY?rel=0&amp;autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->


<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-green">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-user"></i> AKUN LOGIN KARTAMUSNU</h4>
      </div>
      <div class="modal-body">
        <center><img src="akun.png" width="80%">
          <p><b></b>SILAHKAN GUNAKAN USERNAME DAN PASSWORD INI UNTUK LOGIN SYSTEM <br> <span class="text-purple">POWERED BY LOKON.ID</b></span></p>
        </center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn bg-red" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

    <script src="assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
  </html>

<!-- 
  Project       : Aplikasi Kartu Tanda Anggota Muslimat NU
  Description   : CRUD (Create, read, Update, Delete) PHP 5.6, QR Code, MySQLi, Bootstrap & Google Chrome
  Author        : ARIES ADI SUSILO, S.Kom
  Contact       : Hp/Wa. +62852-5665-1656
  Powered by    : LOKON.ID
-->


<?php
session_start();
error_reporting(0);
include '../assets/config/koneksi.php';
include "../assets/barcode/vendor/autoload.php";
if(empty($_SESSION))
{
  header("Location: ../login");
}
?>
<!DOCTYPE html>
<html lang="en">
<!-- <meta http-equiv="refresh" content="0; url=">  load page berulang x -->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php $i = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM identitas LIMIT 1"));  echo "$i[nama] "; ?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="shortcut icon" href="../assets/img/logo/<?php echo "$i[gambar] "; ?>">
  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../assets/ionicons-2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../assets/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="../assets/plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="../assets/plugins/iCheck/all.css">
  <link rel="stylesheet" href="../assets/plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="../assets/plugins/colorpicker/bootstrap-colorpicker.min.css">
  <link rel="stylesheet" href="../assets/plugins/timepicker/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="../assets/plugins/select2/select2.min.css">
  <link rel="stylesheet" href="../assets/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="../assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../assets/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="../assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <script src="../assets/dist/js/jquery-2.2.1.min.js"></script>
  <style type="text/css">
 /* .preloader {
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
  }*/

</style>
<script>
  $(document).ready(function(){
    $(".preloader").fadeOut();
  })
</script>
</head><!-- 
<body class="hold-transition sidebar-mini skin-green light" data-spy="scroll" data-target="#scrollspy"> -->
<body class="hold-transition skin-green-light fixed sidebar-mini">
  
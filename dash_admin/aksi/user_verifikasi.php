<?php
    include "../../assets/config/koneksi.php";
    mysqli_query($koneksi, "UPDATE user set id_level='3' WHERE id ='$_GET[id]'");
    header('location:../data-verifikasi');
?>

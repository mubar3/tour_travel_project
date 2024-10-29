<?php
    include "../../assets/config/koneksi.php";
    mysqli_query($koneksi, "DELETE FROM users WHERE id ='$_GET[id]'");
    header('location:../view-datax');
?>

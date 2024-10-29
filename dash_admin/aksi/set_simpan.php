<?php
    include "../../assets/config/koneksi.php";
            mysqli_query($koneksi, "UPDATE nomor SET nomor = '$_POST[nomor]' WHERE id = '$_POST[id]'");
            echo "<script>window.alert('Data Berhasil di Update!');
                window.location='../create-data'</script>";
        

?>

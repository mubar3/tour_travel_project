<?php
    include "../../assets/config/koneksi.php";

    $query2 = "select * from userr where id = '$_GET[id]' ";
        $LOCIMAGE=mysqli_fetch_array(mysqli_query($koneksi, $query2));
        
        $kd = $LOCIMAGE["gambar"];
        $loc="../../assets/img/admin/".$kd;

    
    $delete=mysqli_query($koneksi, "DELETE FROM userr WHERE id = '$_GET[id]' ");
    if($delete){
        unlink($loc);
        echo "<script>window.alert('Data Berhasil DIhapus!');
            window.location='../view-data-admin'</script>";
    }

        echo "<script>window.alert('Data Gagal Dihapus!');
            window.location='../view-data-admin'</script>";
?>
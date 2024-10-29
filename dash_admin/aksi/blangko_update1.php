<?php
    include "../../assets/config/koneksi.php";
    if ($_FILES['gambar']['size'] != 0)
    {
        $fileName = $_FILES['gambar']['name'];
        $move = move_uploaded_file($_FILES['gambar']['tmp_name'], "../../assets/img/blangko/".$_FILES['gambar']['name']);
        if($move)
        {
            mysqli_query($koneksi, "UPDATE blangko SET gambar='$fileName', peraturan = '$_POST[editor1]', judul = '$_POST[judul]', judul1 = '$_POST[judul1]', tahun = '$_POST[tahun]' WHERE id = '$_POST[id]'");
            echo "<script>window.alert('Data Berhasil di Update!');
                window.location='../update-blangko1'</script>";
        }
    }
        else {
            mysqli_query($koneksi, "UPDATE blangko SET peraturan = '$_POST[editor1]', judul = '$_POST[judul]', judul1 = '$_POST[judul1]', tahun = '$_POST[tahun]' WHERE id = '$_POST[id]'");
            echo "<script>window.alert('Data Berhasil di Update!');
                window.location='../update-blangko1'</script>";
        }

?>

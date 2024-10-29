<?php
    include "../../assets/config/koneksi.php";
        
    $tgl = date("Y-m-d");
    $img = $_POST['gambar'];
    $nama = $_POST['nama'];
    $folderPath = "upload/";

    $image_parts = explode(";base64,", $img);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];

    $image_base64 = base64_decode($image_parts[1]);
    $fileNama = $nama. '.png';

    $file = $folderPath . $fileNama;
    file_put_contents($file, $image_base64);

    print_r($fileNama);

$sql = "INSERT INTO hasil (gambar, nama, tgl) VALUES ('".$fileNama."','".$nama."','".$tgl."')";
$simpan = mysql_query($sql);
echo "<script>window.alert('Data Berhasil di Simpan!');
window.location='../../dash_admin/webcam.php'</script>";
?>
            mysqli_query($koneksi, "UPDATE blangko SET kepsek='$_POST[kepsek]', nip='$_POST[nip]' WHERE id = '$_POST[id]'");
            echo "<script>window.alert('Data Berhasil di Update!');
                window.location='../update-blangko'</script>";
        
?>

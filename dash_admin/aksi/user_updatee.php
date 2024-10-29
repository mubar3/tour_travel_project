<?php
error_reporting(0);
include "../../assets/config/koneksi.php";
include "../../assets/phpqrcode/qrlib.php";


    // Star Webcam
    $img = $_POST['webcam'];
    $folderPath = "../../assets/img/user/";
    $image_parts = explode(";base64,", $img);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
    $image_base64 = base64_decode($image_parts[1]);
    $fileNama = uniqid() . '.png';
    $file = $folderPath . $fileNama;
    file_put_contents($file, $image_base64);
    // End Webcam

    // Qrcode Kartanu
    $thnx = date("d.m.Y", strtotime ($_POST['i']));
    $id = $_POST['idx'];
    $nol = 0;
    $titik = ".";
    $namax = $_POST['n'].''.$titik.''.$_POST['g'].''.$titik.''.$thnx.''.$titik.''.$nol.''.$id; //isi QR code dilengkapi tanda titik

    $c = addslashes($_POST['c']);
    $j = addslashes($_POST['j']);

    $nameqrcodee    = $namax.'.'.'png';              //nama QR Code yang disimpan ke folder dan database
    $tempdir        = "../../assets/img/qrcode2/";   // Nama Folder file QR Code kita nantinya akan disimpan
    $isiqrcodee     = $namax;
    $quality        = 'H';
    $Ukuran         = 10;
    $padding        = 0;

    QRCode::png($isiqrcodee,$tempdir.$nameqrcodee,$quality,$Ukuran,$padding); // simpan qrcode Kartanu


    date_default_timezone_set('Asia/Jakarta');
    $tgl = date("Y-m-d");
    $time = date("G:i:s");
    $level = ('3');

    // $noa = sprintf("%04s", $_POST['a']); // menggunakan nomor sampe 1000

    if ($_FILES['gambar']['size'] != 0)
    {
        $fileName = $_FILES['gambar']['name'];
        $move = move_uploaded_file($_FILES['gambar']['tmp_name'], "../../assets/img/user/".$_FILES['gambar']['name']);
        if($move)
        {
            mysqli_query($koneksi, "UPDATE users SET gambar = '$fileName',
                nik = '$_POST[b]',
            nama = '$c',
            idbanom = '$_POST[g]',
            tmp_lhr = '$_POST[h]',
            tgl_lhr = '$_POST[i]',
            jk = '$_POST[jk]',
            alamat = '$j',
            id_prov = '$_POST[k]',
            id_kab = '$_POST[l]',
            id_kec = '$_POST[m]',
            id_kel = '$_POST[n]',
            hp = '$_POST[o]',
            email = '$_POST[p]',
            status_kawin = '$_POST[q]',
            pendidikan = '$_POST[r]',
            pekerjaan = '$_POST[s]',
            kemampuan = '$_POST[t]',
            bpjs = '$_POST[u]',
            waktu = '$time',
            tgl_input = '$tgl',
            qrcodee  = '$nameqrcodee',
            username  = '$_POST[user]',
            password  = '$id'
            WHERE id = '$_POST[id]'");
            echo "<script>window.alert('Data Berhasil di Update!');
            window.location='../view-datax'</script>";
        }
    }

    if($_POST['webcam']!='')
    {
        mysqli_query($koneksi, "UPDATE users SET gambar = '$fileNama', 
            nik = '$_POST[b]',
            nama = '$c',
            idbanom = '$_POST[g]',
            tmp_lhr = '$_POST[h]',
            tgl_lhr = '$_POST[i]',
            jk = '$_POST[jk]',
            alamat = '$j',
            id_prov = '$_POST[k]',
            id_kab = '$_POST[l]',
            id_kec = '$_POST[m]',
            id_kel = '$_POST[n]',
            hp = '$_POST[o]',
            email = '$_POST[p]',
            status_kawin = '$_POST[q]',
            pendidikan = '$_POST[r]',
            pekerjaan = '$_POST[s]',
            kemampuan = '$_POST[t]',
            bpjs = '$_POST[u]',
            waktu = '$time',
            tgl_input = '$tgl',
            qrcodee  = '$nameqrcodee',
            username  = '$_POST[user]' ,
            password  = '$id'
            WHERE id = '$_POST[id]'");
        echo "<script>window.alert('Data Berhasil di Update!');
        window.location='../view-datax'</script>";
    }

    else
    {
        mysqli_query($koneksi, "UPDATE users SET nik = '$_POST[b]',
            nama = '$c',
            idbanom = '$_POST[g]',
            tmp_lhr = '$_POST[h]',
            tgl_lhr = '$_POST[i]',
            jk = '$_POST[jk]',
            alamat = '$j',
            id_prov = '$_POST[k]',
            id_kab = '$_POST[l]',
            id_kec = '$_POST[m]',
            id_kel = '$_POST[n]',
            hp = '$_POST[o]',
            email = '$_POST[p]',
            status_kawin = '$_POST[q]',
            pendidikan = '$_POST[r]',
            pekerjaan = '$_POST[s]',
            kemampuan = '$_POST[t]',
            bpjs = '$_POST[u]',
            waktu = '$time',
            tgl_input = '$tgl',
            qrcodee  = '$nameqrcodee',
            username  = '$_POST[user]',
            password  = '$id'
            WHERE id = '$_POST[id]'");
        echo "<script>window.alert('Data Berhasil di Update!');
        window.location='../view-datax'</script>";
    }

    ?>

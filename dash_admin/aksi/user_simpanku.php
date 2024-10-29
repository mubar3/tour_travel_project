<?php
error_reporting(1);
include "../../assets/config/koneksi.php";
include "../../assets/phpqrcode/qrlib.php";


$unama = addslashes($_POST['c']);
$j = addslashes($_POST['j']);

$thn = date("Y");
$titik = ".";
    $nama = $_POST['n'].''.$titik.''.$_POST['g'].''.$titik.''.$thn.''.$titik.''.$_POST['a']; //isi QR code dilengkapi tanda titik

    $nameqrcode    = $nama.'.'.'png';              //nama QR Code yang disimpan ke folder dan database
    $tempdir        = "../../assets/img/qrcode/";   // Nama Folder file QR Code kita nantinya akan disimpan
    $isiqrcode     = $nama;
    $quality        = 'H';
    $Ukuran         = 10;
    $padding        = 0;

    QRCode::png($isiqrcode,$tempdir.$nameqrcode,$quality,$Ukuran,$padding); // simpan qrcode Kartamus

    // Qrcode Kartanu
    $thnx = date("d.m.Y", strtotime ($_POST['i']));
    $id = $_POST['id'];
    $nol = 0;
    $titik = ".";
    $namax = $_POST['n'].''.$titik.''.$_POST['g'].''.$titik.''.$thnx.''.$titik.''.$nol.''.$id; //isi QR code dilengkapi tanda titik


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
    $pass=md5($_POST['password']);

    $cek = mysqli_query($koneksi, "SELECT * FROM user WHERE no_anggota='$_POST[a]' AND jk ='Perempuan'");
    $prosescek = mysqli_num_rows($cek);

    // INPUT DATA NOMOR GANDA
    if ($prosescek > 0) 
    {
        // input data ke tabel kartanu
        mysqli_query($koneksi, "INSERT INTO user (gambar, no_anggota, idbanom, nik, nama, jabatan, masa_b1, masa_b2, jenjang, tmp_lhr, tgl_lhr, jk, alamat, id_prov, id_kab, id_kec, id_kel, hp, email, status_kawin, pendidikan, pekerjaan, kemampuan, bpjs, tgl_input, waktu, qrcodee, id_level, username, password) VALUES ('$_POST[gambar]', '$_POST[a]', '$_POST[banom]', '$_POST[b]', '$unama', '$_POST[d]', '$_POST[e]', '$_POST[f]', '$_POST[g]', '$_POST[h]', '$_POST[i]', '$_POST[jk]', '$j', '$_POST[k]', '$_POST[l]', '$_POST[m]', '$_POST[n]', '$_POST[o]', '$_POST[p]', '$_POST[q]', '$_POST[r]', '$_POST[s]', '$_POST[t]', '$_POST[u]', '$tgl', '$time', '$nameqrcodee', '$level', '$_POST[user]', '$id')");
         echo "<script>window.alert('PERINGATAN: Nomor Anggota Terindikasi Sama! Silahkan Simpan Kembali Data Inputan');
            window.location='../create-data-sementara'</script>";
    }
    // INPUT DATA NOMOR GANDA
    else{
        mysqli_query($koneksi, "INSERT INTO user (gambar, no_anggota, nik, nama, jabatan, masa_b1, masa_b2, jenjang, tmp_lhr, tgl_lhr, jk, alamat, id_prov, id_kab, id_kec, id_kel, hp, email, status_kawin, pendidikan, pekerjaan, kemampuan, bpjs, tgl_input, waktu, qrcode, id_level, username) VALUES ('$_POST[gambar]', '$_POST[a]', '$_POST[b]', '$unama', '$_POST[d]', '$_POST[e]', '$_POST[f]', '$_POST[g]', '$_POST[h]', '$_POST[i]', '$_POST[jk]', '$j', '$_POST[k]', '$_POST[l]', '$_POST[m]', '$_POST[n]', '$_POST[o]', '$_POST[p]', '$_POST[q]', '$_POST[r]', '$_POST[s]', '$_POST[t]', '$_POST[u]', '$tgl', '$time', '$nameqrcode', '$level', '$_POST[user]')");
   
            // input data ke tabel kartanu
        mysqli_query($koneksi, "INSERT INTO users (gambar, no_anggota, idbanom, nik, nama, jabatan, masa_b1, masa_b2, jenjang, tmp_lhr, tgl_lhr, jk, alamat, id_prov, id_kab, id_kec, id_kel, hp, email, status_kawin, pendidikan, pekerjaan, kemampuan, bpjs, tgl_input, waktu, qrcodee, id_level, username, password) VALUES ('$_POST[gambar]', '$_POST[a]', '$_POST[banom]', '$_POST[b]', '$unama', '$_POST[d]', '$_POST[e]', '$_POST[f]', '$_POST[g]', '$_POST[h]', '$_POST[i]', '$_POST[jk]', '$j', '$_POST[k]', '$_POST[l]', '$_POST[m]', '$_POST[n]', '$_POST[o]', '$_POST[p]', '$_POST[q]', '$_POST[r]', '$_POST[s]', '$_POST[t]', '$_POST[u]', '$tgl', '$time', '$nameqrcodee', '$level', '$_POST[user]', '$id')");
        echo "<script>window.alert('Data Berhasil di Input!');
        window.location='../view-data'</script>";
    }

    ?>

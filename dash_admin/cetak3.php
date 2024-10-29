<!-- 
  Project       : Aplikasi Kartu Tanda Anggota Muslimat NU
  Description   : CRUD (Create, read, Update, Delete) PHP 5.6, QR Code, MySQLi, Bootstrap & Google Chrome
  Author        : BAMBANG HADI SAPUTRA, ST
  Contact       : Hp/Wa. +62852-5665-1656
  Powered by    : LOKON.ID
-->

<?php
session_start();
error_reporting(1);
include '../assets/config/koneksi.php';
if(empty($_SESSION))
{
    header("Location: ../login");
}
?>
<!DOCTYPE html>
<html> <!-- Bagian halaman HTML yang akan konvert -->
<head>
    <meta charset='UTF-8'>
    <title><?php $i = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM identitas LIMIT 1"));  echo "$i[nama] "; ?></title>
    <link rel="shortcut icon" href="../assets/img/logo/<?php echo "$i[gambar] "; ?>">
    <style>
    img {
        width: 100%;
        height: auto;
    }
</style>

</head>

<body onload='window.print()' style="font-family: arial;font-size: 12px;">
    <?php 

    $a=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM identitas 
        INNER JOIN kelurahan ON identitas.id_kel= kelurahan.id_kel
        INNER JOIN kabupaten ON identitas.id_kab= kabupaten.id_kab 
        INNER JOIN kecamatan ON identitas.id_kec= kecamatan.id_kec 
        INNER JOIN provinsi ON identitas.id_prov= provinsi.id_prov WHERE id = '1'"));
    $id=$_POST['selector'];
    $N = count($id);
    for($i=0; $i < $N; $i++)
    {
        $data=mysqli_query($koneksi, "SELECT * FROM user 
            INNER JOIN kelurahan ON user.id_kel= kelurahan.id_kel
            INNER JOIN kabupaten ON user.id_kab= kabupaten.id_kab 
            INNER JOIN kecamatan ON user.id_kec= kecamatan.id_kec 
            INNER JOIN provinsi ON user.id_prov= provinsi.id_prov 
            WHERE id='$id[$i]'");
        while($r=mysqli_fetch_array($data))
        {
            $t = date("d - m - Y", strtotime($r['tgl_lhr']));
            $tgl = date("dmY", strtotime($r['tgl_lhr']));
            $tii = date("d F Y", strtotime($r['tgl_input']));
            $ti = date("Y", strtotime($r['tgl_input']));
            $blangko=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM blangko WHERE id = '1'"));
            $blangko1=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM blangko WHERE id = '2'"));
            $cap=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM blangko WHERE id = '3'"));
            ?>
            <div style="margin-top:-20px;width: 921px;height: 307px;margin-bottom: -12px; background-image: url('../assets/img/blangko/<?php echo $blangko["gambar"];?>');">

                <img style="position: absolute;margin-left: 30px;margin-top: 100px; width: 92px; height: 115px;overflow: hidden;" class="img-responsive img" src="../assets/img/user/<?php echo $r["gambar"];?>">

                <div style="position: absolute;margin-left: 30px;margin-top: 45px; width: 92px;height: 50px; background-color: #026537"><img style="width: 70px; padding-left: 12px;padding-top: 1px;" src="../assets/img/logo/<?php echo "$a[gambar] "?>"></div>

                <p style="letter-spacing: 1px;margin-left: 145px;padding-top: 45px;width: 250px; text-align: center; font-size: 20px"><b>KARTU ANGGOTA</b></p>
                <p style="font-size: 17px;margin-top: -20px;margin-left: 138px;"><b>MUSLIMAT NAHDLATUL ULAMA</b></p>

                <p style="font-family: arial;font-size: 9px;position: absolute;margin-left: 40px;margin-top: 143px;width: 180px;height:30px;text-align:center;position: center;float: center">
                    <u><b><?php echo $blangko["kepsek"];?></b></u><br><?php echo $blangko["nip"];?>
                </p>

                 <p style="font-family: arial;font-size: 7px;position: absolute;margin-left: 100px;margin-top: 115px;width: 80px;height:20px;text-align:center;position: center;float: center">
                    <img src="../assets/img/tandatangan/<?php echo $blangko["ttd"];?>">
                </p>

                <p style="font-family: arial;font-size: 9px;position: absolute;margin-left: 250px;margin-top: 143px;width: 150px;height:30px;text-align:center;position: center;float: center">
                    <u><b><?php echo $blangko1["kepsek"];?></b></u><br><?php echo $blangko1["nip"];?>
                </p>
                <p style="font-family: arial;font-size: 7px;position: absolute;margin-left: 210px;margin-top: 107px;width: 50px;height:10px;text-align:center;position: center;float: center">
                    <img src="../assets/img/tandatangan/<?php echo $cap["gambar"];?>">

                   <p style="font-family: arial;font-size: 7px;position: absolute;margin-left: 275px;margin-top: 115px;width: 80px;height:10px;text-align:center;position: center;float: center">
                       <img src="../assets/img/tandatangan/<?php echo $blangko1["ttd"];?>">
                    </p>

            <!-- <?php
                $tanggal = date ("j");
                $bulan = array(1=>"Januari","Februari","Maret", "April", "Mei", "Juni","Juli","Agustus","September","Oktober", "November","Desember");
                $bulan = $bulan[date("n")];
                $tahun = date("Y");
                $thn = $tahun+5;
                ?>Berlaku Hingga:<br><b><?php echo $tanggal ." ". $bulan ." ". $thn;?></b> -->
                <table cellpadding="1" cellspacing="1em" style="margin-top: 15px; padding-left: 130px; position: relative;font-family: arial;font-size: 9px;transition-property: 500px;width: 390px;height: 110px;"> 
                    <tr>
                        <td>Nomor Induk Anggota</td>
                        <td>:</td>
                        <td><?php echo "$r[id_kel]";?>.<?php echo "$r[jenjang]";?>.<?php echo $ti;?>.<?php echo "$r[no_anggota]";?></td>
                    </tr> 
                    <tr>
                        <td>NIK</td>
                        <td>:</td>
                        <td><?php echo "$r[nik]";?></td>
                    </tr> 
                    <tr>
                        <td>Nama Lengkap</td>
                        <td>:</td>
                        <td><b><?php echo "$r[nama]";?></b></td>
                    </tr> 
                    <tr>
                        <td>Tempat/Tgl. Lahir</td>
                        <td>:</td>
                        <td><?php echo "$r[tmp_lhr]";?>, <?php echo "$t";?></td>
                    </tr>
                    <tr>
                        <td style="text-align: top;">Alamat<br><br><br><br></td>
                        <td>:<br><br><br><br></td>
                        <td><?php echo "$r[alamat]";?><br>Desa/Kel. <?php echo "$r[nama_kelurahan]";?><br>Kec. <?php echo "$r[nama_kecamatan]";?><br>Kab. <?php echo "$r[nama_kabupaten]";?><!-- <br>Prov. <?php echo "$r[nama_provinsi]";?> --></td>
                    </tr>
                    <tr>
                        <td>Berlaku Sejak</td>
                        <td>:</td>
                        <td><?php echo $tii;?></td>
                    </tr>
                </table>
                <p style="color: #FFFFFF;margin-top: -180px;padding-left: 640px;padding-top: 4px;font-size: 11px;"> <b style="font-size: 20px;"><?php echo $blangko["judul"];?></b>
                    <div style="color: #FFFFFF; padding-left: 510px;font-family: arial;font-size: 8px;text-align: center;padding-right: 60px;margin-top: -10px;opacity: 20px"><b><?php echo $blangko["judul1"];?></b>
                    </div>
                </p>
                    <div style="color: #000000; margin-left: 480px;font-family: arial;font-size: 10px;text-align: justify;padding-right: 30px;width: 45%;text-align: left; line-height: 2;margin-top: -30px;"><br><br><b><?php echo $blangko["peraturan"];?></b></div>
                    
                    <img style="border-radius: 2px;border:4px solid #fff;margin-left: 790px;font-family: arial;font-size: 10px;text-align: justify;width: 40px;margin-top: -90px;position: absolute;" src="../assets/img/qrcode/<?php echo $r["qrcode"];?>"><!--  -->
                </p>
            </div>

        </body>
        </html>
        <?php }}?>
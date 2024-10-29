<?php
session_start();
  if(empty($_SESSION))
  {
    header("Location: ../login");
  }
else
{
    include "../../assets/config/koneksi.php";
    // unggah csv
    if (isset($_POST['submit'])) {//Script akan berjalan jika di tekan tombol submit..


//Script Upload File..
    if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
        echo "<h1>" . "File ". $_FILES['filename']['name'] ." Berhasil di Upload" . "</h1>";
        echo "<h2>Menampilkan Hasil Upload:</h2>";
        readfile($_FILES['filename']['tmp_name']);
    }

    //Import uploaded file to Database, Letakan dibawah sini..

    $handle = fopen($_FILES['filename']['tmp_name'], "r");
    $tgl = date("Y-m-d");
    $time = date("G:i:s");
    $level = ('3');
    $user = ('admin');
    //Membuka file dan membacanya
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
    {
        $import="INSERT INTO user (gambar, no_anggota, nik, nama, jabatan, masa_b1, masa_b2, jenjang,  tmp_lhr, tgl_lhr, alamat, id_prov, id_kab, id_kec, id_kel, hp, email, status_kawin, pendidikan, pekerjaan, kemampuan, bpjs, tgl_input, waktu, qrcode, id_level, username) values('$data[0]', '$data[1]', '$data[2]', '$data[3]', '$data[4]', '$data[5]', '$data[6]', '$data[7]', '$data[8]', '$data[9]', '$data[10]', '$data[11]', '$data[12]', '$data[13]', '$data[14]', '$data[15]', '$data[16]', '$data[17]', '$data[18]', '$data[19]', '$data[20]', '$data[21]', '$tgl', '$time', '$nameqrcode', '$level', '$user]')"; //data array sesuaikan dengan jumlah kolom pada CSV anda mulai dari “0” bukan “1” dan data yang diupload akan masuk tabel csv setelah diedit maka data akan masuk tabel pelajar
         mysqli_query($koneksi, $import) or die(mysqli_error()); //Melakukan Import
    }

    fclose($handle); //Menutup CSV file
    echo "<script>window.alert('Data Berhasil di Upload!');
                window.location='../view-datacsv'</script>";

}
}

?>

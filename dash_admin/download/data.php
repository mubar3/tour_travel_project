<?php
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");

// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=UNDUH DATA ANGGOTA.xls");

include "../../assets/config/koneksi.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>

    <table border="1">
      <tr>
        <th colspan="23" align="left" style="font-size: 14px;">DATA KARTANU</th>
      </tr>
     <tr style="height: 30px;color:#fff;">
        <th style="background: #00c0ef">No.</th>
        <th style="background: #00c0ef">NIA</th>
        <th style="background: #00c0ef">NIK</th>
        <th style="background: #00c0ef">NAMA</th>
        <th style="background: #00c0ef">ID DAN NAMA BANOM</th>
        <th style="background: #00c0ef">TEMPAT LAHIR</th>
        <th style="background: #00c0ef">TANGGAL LAHIR</th>
        <th style="background: #00c0ef">JK</th>
        <th style="background: #00c0ef">ALAMAT</th>
        <th style="background: #00c0ef">PROVINSI</th>
        <th style="background: #00c0ef">KABUPATEN/KOTA</th>
        <th style="background: #00c0ef">KECAMATAN</th>
        <th style="background: #00c0ef">KELURAHAN/DESA</th>
        <th style="background: #00c0ef">HP</th>
        <th style="background: #00c0ef">EMAIL</th>
        <th style="background: #00c0ef">STATUS KAWIN</th>
        <th style="background: #00c0ef">PENDIDIKAN</th>
        <th style="background: #00c0ef">PEKERJAAN</th>
        <th style="background: #00c0ef">KEMAMPUAN/PROFESI</th>
        <th style="background: #00c0ef">FASILITAS KESEHATAN (BPJS)</th>
        <th style="background: #00c0ef">TGL INPUT</th>
        <th style="background: #00c0ef">PENGINPUT</th>
        <th style="background: #00c0ef">QRCODE</th>
        <th style="background: #00c0ef">FOTO</th>
        <?php
        $tampil = mysqli_query($koneksi, "SELECT * FROM user 
          INNER JOIN jenjang ON user.jenjang= jenjang.id_jenjang
          INNER JOIN kelurahan ON user.id_kel= kelurahan.id_kel
          INNER JOIN kabupaten ON user.id_kab= kabupaten.id_kab 
          INNER JOIN kecamatan ON user.id_kec= kecamatan.id_kec 
          INNER JOIN provinsi ON user.id_prov= provinsi.id_prov 
          INNER JOIN banom ON user.banom1= banom.idbanom

          where id_level = '3' ORDER BY id DESC");
        $no=1;
        while ($rr=mysqli_fetch_assoc($tampil))
        {
          $tt = date("d/m/Y", strtotime($rr['tgl_lhr']));
          $tgl = date("d.m.Y", strtotime($rr['tgl_lhr']));
          $tanggal = date("d - m - Y", strtotime($rr['tgl_input']));
          $thn = date("Y", strtotime($rr['tgl_input']));
          $nol = 0;
          echo "
        <tr>
          <td><center>$no.</center></td>
          <td>'$rr[nokartanu]</td>
          <td>'$rr[nik]</td>
          <td>$rr[nama]</td>
          <td>$rr[idbanom]|$rr[nama_banom]</td>
          <td>$rr[tmp_lhr]</td>
          <td>$tt</td>
          <td>$rr[jk]</td>
          <td>$rr[alamat]</td>
          <td>$rr[nama_provinsi]</td>
          <td>$rr[nama_kabupaten]</td>
          <td>$rr[nama_kecamatan]</td>
          <td>$rr[nama_kelurahan]</td>
          <td>'$rr[hp]</td>
          <td>$rr[email]</td>
          <td>$rr[status_kawin]</td>
          <td>$rr[pendidikan]</td>
          <td>$rr[pekerjaan]</td>
          <td>$rr[kemampuan]</td>
          <td>$rr[bpjs]</td>
          <td>$tanggal/$rr[waktu]</td>
          <td>$rr[username]</td>
          <td>$rr[qrcode]</td>
          <td>$rr[gambar]</td>
        </tr>";
          $no++;
        }
        ?>

      </tr>
    </table>
  </body>
</html>
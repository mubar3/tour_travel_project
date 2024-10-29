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
          

          where id_level like '%3%' and substr(user.nokartanu, 7,3)=244 ORDER BY user.id DESC");
        $no=1;
        while ($rr=mysqli_fetch_assoc($tampil))
        {
          $tt = date("d/m/Y", strtotime($rr['tgl_lhr']));
          $tgl = date("d.m.Y", strtotime($rr['tgl_lhr']));
          $tanggal = date("d - m - Y", strtotime($rr['tgl_input']));
          $thn = date("Y", strtotime($rr['tgl_input']));
          $nol = 0;


          $bpjs='';
          if($rr['bpjs']==0){$bpjs='Tidak Mempunyai Jaminan Kesehatan';}
          elseif($rr['bpjs']==1){$bpjs='BPJS Kesehatan / Ketenagakerjaan';}
          elseif($rr['bpjs']==2){$bpjs='KIS (Kartu Indonesia Sehat)/ dibayar Pemerintah';}
          elseif($rr['bpjs']==3){$bpjs='Asuransi Kesehatan swasta';} 

          // $query = "select * from jenjang where id_jenjang=".$rr['jenjang']." ";
          // $jenjang=mysqli_fetch_array(mysqli_query($koneksi, $query));
          // $jenjang = $jenjang["nama_jenjang"]

          $query = "select * from kelurahan where id_kel='.$rr[id_kel].' ";
          $kel=mysqli_fetch_array(mysqli_query($koneksi, $query));
          $kel = $kel["nama_kelurahan"];

          $query = "select * from banom where idbanom='$rr[banom1]' ";
          $banom=mysqli_fetch_array(mysqli_query($koneksi, $query));
          $banom = $banom["nama_banom"];

          $query = "select * from tb_pekerjaan where id='$rr[pekerjaan]' ";
          $pekerjaan=mysqli_fetch_array(mysqli_query($koneksi, $query));
          $pekerjaan = $pekerjaan["pekerjaan"];

          echo "
        <tr>
          <td><center>$no.</center></td>
          <td>'$rr[nokartanu]</td>
          <td>'$rr[nik]</td>
          <td>$rr[nama]</td>
          <td>$banom</td>
          <td>$rr[tmp_lhr]</td>
          <td>$tt</td>
          <td>$rr[jk]</td>
          <td>$rr[alamat]</td>
          <td>$rr[nama_provinsi]</td>
          <td>$rr[nama_kabupaten]</td>
          <td>$rr[nama_kecamatan]</td>
          <td>$kel</td>
          <td>'$rr[hp]</td>
          <td>$rr[email]</td>
          <td>$rr[status_kawin]</td>
          <td>$rr[pendidikan]</td>
          <td>$pekerjaan</td>
          <td>$rr[kemampuan]</td>
          <td>$bpjs</td>
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
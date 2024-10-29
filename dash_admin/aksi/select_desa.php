<?php
include "../../assets/config/koneksi.php";

$kecamatan=$_POST['kecamatan'];

$tampil = mysqli_query($koneksi, "SELECT * FROM desa where id_mwc='$kecamatan' ORDER BY nama_desa ");

// $tampil = mysqli_query($koneksi, "SELECT * FROM desa  where id_mwc='9471040' ORDER BY nama_desa ");

while($row=mysqli_fetch_array($tampil)) {

   $result[] = array(
  'id_desa' => $row['id_desa'],
  'nama_desa' => $row['nama_desa']
);
}
echo json_encode($result);

?>
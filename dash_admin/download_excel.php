<?php
include '../assets/config/koneksi.php';
// if(isset($_POST['kecamatan'])){
        $items = mysqli_query($koneksi, "SELECT 
                  user.no_anggota,
                  user.nokartanu as no_kartanu,
                  concat('`',user.nik) as nik,
                  (select nama from mwc where id=user.mwc) as nama_mwc,
                  (select nama from ranting where id=user.ranting) as nama_ranting,
                  user.nama,
                  concat(user.tmp_lhr,',',user.tgl_lhr) as ttl,
                  user.usia,
                  user.hp,
                  provinsi.nama_provinsi,
                  kabupaten.nama_kabupaten,
                  kecamatan.nama_kecamatan,
                  desa.nama_desa,
                  user.alamat,
                  user.rt,
                  user.rw,
                  user.kodepos,
                  tb_jk.jk,
                  tb_status_perkawinan.status,
                  tb_pekerjaan.pekerjaan,
                  user.pekerjaan_lain,
                  tb_pendidikan.pendidikan,
                  user.nama_sekolah,
                  user.gambar as foto,
                  banom.nama_banom,
                  user.jabatan_banom,
                  lembaga.nama_lembaga,
                  user.jabatan_lembaga,
                  if(user.nama_pesantren != '','Pernah','Belum') as Pernah_di_Pesantren,
                  user.nama_pesantren,
                  user.alamat_pesantren,
                  tb_pendapatan.pendapatan
                  FROM user
                  left JOIN tb_pendapatan ON user.pendapatan= tb_pendapatan.id
                  left JOIN lembaga ON user.lembaga= lembaga.id_lembaga
                  left JOIN banom ON user.banom= banom.idbanom
                  left JOIN tb_pendidikan ON user.pendidikan= tb_pendidikan.pendidikan
                  left JOIN tb_pekerjaan ON user.pekerjaan= tb_pekerjaan.id
                  left JOIN tb_status_perkawinan ON user.status_kawin= tb_status_perkawinan.id
                  left JOIN tb_jk ON user.jk= tb_jk.id
                  left JOIN desa ON user.id_kel= desa.id_desa 
                  -- left JOIN kelurahan ON user.id_kel= kelurahan.id_kel
                  left JOIN kabupaten ON user.id_kab= kabupaten.id_kab 
                  left JOIN kecamatan ON user.id_kec= kecamatan.id_kec 
                  left JOIN provinsi ON user.id_prov= provinsi.id_prov 
                  WHERE user.mwc='$_POST[mwc]' and user.ranting='$_POST[ranting]' Order by no_anggota DESC");
        $datas = mysqli_fetch_array(mysqli_query($koneksi,"select * from mwc where id='$_POST[mwc]'"));
        // print_r($datas['nama']);die();
        // print_r($items);die();
        //Define the filename with current date
        $fileName = "mwc ".$datas['nama']."-".date('d-m-Y').".xls";

        //Set header information to export data in excel format
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename='.$fileName);

        $heading = false;

        //Add the MySQL table data to excel file
        foreach($items as $item) {
        if(!$heading) {
          echo implode("\t", array_keys($item)) . "\r\n";
          $heading = true;
        }
        echo implode("\t", array_values($item)) . "\r\n";
        $heading = true;
        }
        exit();
        
        // }
?>
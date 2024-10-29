<?php include "header.php" ?>
<div class="wrapper">
  <!-- Star menu -->

  <!-- End menu -->

    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title col-sm-10" ><i class="glyphicon glyphicon-tasks"></i> RINCIAN DATA ANGGOTA KARTANU</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class='form-group'>
                <?php
				$bpjs_det = array("Tidak Mempunyai Jaminan Kesehatan","BPJS Kesehatan / Ketenagakerjaan","KIS (Kartu Indonesia Sehat)/ dibayar Pemerintah","Asuransi Kesehatan swasta");
				$SQL = "SELECT * FROM user 
                  LEFT JOIN kelurahan ON user.id_kel= kelurahan.id_kel
                  LEFT JOIN kabupaten ON user.id_kab= kabupaten.id_kab 
                  LEFT JOIN kecamatan ON user.id_kec= kecamatan.id_kec 
                  LEFT JOIN provinsi ON user.id_prov= provinsi.id_prov
                  LEFT JOIN jenjang ON user.jenjang= jenjang.id_jenjang
                  LEFT JOIN tb_disabilitas ON user.disabilitas= tb_disabilitas.id
                  LEFT JOIN tb_pekerjaan ON user.pekerjaan= tb_pekerjaan.id
                  LEFT JOIN tb_pendapatan ON user.pendapatan= tb_pendapatan.id
                  LEFT JOIN tb_penyakit ON user.penyakit= tb_penyakit.id
                  LEFT JOIN tb_rumah ON user.kepemilikan_rumah= tb_rumah.id
                  LEFT JOIN banom ON user.banom1= banom.idbanom
                  WHERE user.nik='$_GET[id]'";
				// echo $SQL;
                $rr=mysqli_fetch_array(mysqli_query($koneksi, $SQL));
                $mb1 = date("d - m - Y", strtotime($rr['masa_b1']));
                $mb2 = date("d - m - Y", strtotime($rr['masa_b2']));
                $tgl = date("d - m - Y", strtotime($rr['tgl_lhr']));
                $tgla = date("Y", strtotime($rr['tgl_lhr']));
                $tglin = date("d - m - Y", strtotime($rr['tgl_input']));
                $tahun = date("Y", strtotime($rr['tgl_input']));

                ?>
                <div class="col-sm-9 table-responsive">
                  <table class="table table-striped table-hover">
                    <tr>
                     <td class="col-sm-5">No. Anggota KARTANU</td>
                     <td>: <b><?php echo "$rr[nokartanu]";?></b></td>
                   </tr><tr>
                     <td class="col-sm-5">NIK</td>
                     <td>: <b><?php echo "$rr[nik]";?></b></td>
                   </tr>
                   <tr>
                     <td>Nama</td>
                     <td>: <b><?php echo "$rr[nama]";?></b></td>
                   </tr>
                   <tr>
                     <td>Jabatan</td>
                     <td>: <b><?php echo "$rr[jabatan]";?></b></td>
                   </tr>
                   <!--tr>
                    <td>Masa Bhakti</td>
                     <td>: <b><?php echo $mb1;?> s/d <?php echo $mb2;?></b></td>
                   </tr-->
                   <tr>
                     <td>Jenjang Kepengurusan</td>
                     <td>: <b><?php echo "$rr[nama_jenjang]";?></b></td>
                   </tr>
                   <tr>
                     <td>Badan Otonom 1</td>
                     <td>: <b><?php echo "$rr[nama_banom]";?></b></td>
                   </tr>
                   <tr>
                     <td>Badan Otonom 2</td>
                     <td>: <b><?php
						$banomm=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM banom WHERE idbanom='".$rr["banom2"]."'"));
						echo $banomm["nama_banom"];
					 ?></b></td>
                   </tr>
                   <tr>
                     <td>Badan Otonom 3</td>
                     <td>: <b><?php
						$banomm=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM banom WHERE idbanom='".$rr["banom3"]."'"));
						echo $banomm["nama_banom"];
					 ?></b></td>
                   </tr>
                   <tr>
                     <td>Badan Otonom 4</td>
                     <td>: <b><?php
						$banomm=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM banom WHERE idbanom='".$rr["banom4"]."'"));
						echo $banomm["nama_banom"];
					 ?></b></td>
                   </tr>
                   <tr>
                     <td>Badan Otonom Lainnya</td>
                     <td>: <b><?php echo "$rr[banom_lain]";?></b></td>
                   </tr>
                   <tr>
                     <td>Tempat Tanggal Lahir</td>
                     <td>: <b><?php echo "$rr[tmp_lhr]";?></b> <b><?php echo "$tgl";?></b></td>
                   </tr>
                   <tr>
                     <td>Usia</td>
                     <td>: <b><?php echo "$rr[usia]";?></b></td>
                   </tr>
                   <tr>
                     <td class="col-sm-4">Contact Person (Telp./Hp.)</td>
                     <td>: <b><?php echo "$rr[hp]";?></b></td>
                   </tr>
                   <tr>
                     <td>Jenis Kelamin</td>
                     <td>: <b><?php echo "$rr[jk]";?></b></td>
                   </tr>
                   <tr>
                     <td>Alamat</td>
                     <td>: <b><?php echo "$rr[alamat]";?></b></td>
                   </tr>
                   <tr>
                     <td>RT</td>
                     <td>: <b><?php echo "$rr[rt]";?></b></td>
                   </tr>
                   <tr>
                     <td>RW</td>
                     <td>: <b><?php echo "$rr[rw]";?></b></td>
                   </tr>
                   <tr>
                     <td class="col-sm-4" >Kelurahan/Desa</td>
                     <td>:<b><?php echo "$rr[nama_kelurahan]";?></b></td>
                   </tr>
                   <tr>
                     <td class="col-sm-4">Kecamatan</td>
                     <td>: <b><?php echo "$rr[nama_kecamatan]";?></b></td>
                   </tr>
                   <tr>
                     <td class="col-sm-4">Kabupaten</td>
                     <td>: <b><?php echo "$rr[nama_kabupaten]";?></b></td>
                   </tr>
                   <tr>
                     <td class="col-sm-4">Provinsi</td>
                     <td>: <b><?php echo "$rr[nama_provinsi]";?></b></td>
                   </tr>

                   <tr>
                     <td class="col-sm-4">Status Kawin</td>
                     <td>: <b><?php echo "$rr[status_kawin]";?></b></td>
                   </tr>
                   <tr>
                     <td class="col-sm-4">Pendidikan Terakhir</td>
                     <td>: <b><?php echo "$rr[pendidikan]";?></b></td>
                   </tr>
                   <tr>
                     <td class="col-sm-4">Pekerjaan</td>
                     <td>: <b><?php echo "$rr[pekerjaan]";?> <?php echo "$rr[pekerjaan_lain]";?></b></td>
                   </tr>
                   <tr>
                     <td class="col-sm-4">Kemampuan</td>
                     <td>: <b><?php echo "$rr[kemampuan]";?></b></td>
                   </tr>
                   <tr>
                     <td class="col-sm-4">Disabilitas </td>
                     <td>: <b><?php echo "$rr[disabilitas]";?></b></td>
                   </tr>
                   <tr>
                     <td class="col-sm-4">Penyakit </td>
                     <td>: <b><?php echo "$rr[penyakit]";?></b></td>
                   </tr>
                   <tr>
                     <td class="col-sm-4">Kepemilikan Rumah </td>
                     <td>: <b><?php echo "$rr[rumah]";?></b></td>
                   </tr>
                   <tr>
                     <td class="col-sm-4">Pendapatan </td>
                     <td>: <b><?php echo "$rr[pendapatan]";?></b></td>
                   </tr>
                   <tr>
                     <td class="col-sm-4">Fasilitas Kesehatan (BPJS)</td>
                     <td>: <b><?php echo $bpjs_det["$rr[bpjs]"];?></b></td>
                   </tr>
				   
			<?php
			$query = "SELECT * FROM user_properti a left join tb_properti b on a.properti = b.id where a.no_anggota = '".$rr['no_anggota']."' ORDER BY a.id";
			// echo $query;
			$queryprop = mysqli_query($koneksi, $query);
			while($prop=mysqli_fetch_array($queryprop)) {
			?>
                   <tr>
                     <td class="col-sm-4"><?php echo $prop['properti'];?></td>
                     <td>: <label  class="btn btn-xs bg-green"><b><?php echo $prop['nilai'];?></b></label> <?php echo $prop['satuan'];?><br>
					 &nbsp; Catatan : <?php echo $prop['ket'];?>
					 </td>
                   </tr>
			<?php } ?>
			
           <!--        <tr>
                     <td class="col-sm-4">Tanggal/Waktu Input/Update Data</td>
                     <td>: <label  class="btn btn-xs bg-aqua"> <b><?php echo "$tglin";?>/<?php echo "$rr[waktu]";?></b></label></td>
                   </tr>
			-->
                    <tr>
                     <td class="col-sm-4">Penginput Data</td>
                     <td>: <label  class="btn btn-xs bg-green"> <a style="color:#fff;" ><?php echo "$rr[username]";?></a></label></td>
                    </tr>
                 </table>
               </div> 

               <div class="col-sm-3">
                <div class="box box-solid box-primary">
                  <div class="box-header">
                    <h3 class="box-title">FOTO</h3>
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    <center><img class="img-responsive img-rounded img-thumbnail" alt="Responsive image" src="../assets/img/user/<?php echo "$rr[gambar]";?>" width="100px" alt="img-responsive"></center>
                  </div>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="box box-solid box-success">
                  <div class="box-header">
                    <h3 class="box-title">QRCODE KARTANU</h3>
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    <center><img class="img-responsive img-rounded img-thumbnail" alt="Responsive image" src="../assets/img/qrcode/<?php echo "$rr[qrcode]";?>" width="100px" alt="img-responsive"></center>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>  
  
    </section>
  </div>
  <?php include "footer.php";?>
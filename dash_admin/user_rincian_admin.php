<?php include "header.php" ?>
<div class="wrapper">
  <!-- Star menu -->
  <?php include "menu.php";?>
  <!-- End menu -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo "$i[nama] "; ?>
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Rincian Data</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title col-sm-10" ><i class="glyphicon glyphicon-tasks"></i> RINCIAN DATA ADMINISTRATOR</h3>
              <a href="view-data-admin" class="btn bg-orange col-sm-2"><i class="fa fa-chevron-left"></i> K E M B A L I</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class='form-group'>
                <?php
				$bpjs_det = array("Tidak Mempunyai Jaminan Kesehatan","BPJS Kesehatan / Ketenagakerjaan","KIS (Kartu Indonesia Sehat)/ dibayar Pemerintah","Asuransi Kesehatan swasta");
				$SQL = "SELECT * FROM userr 
                  LEFT JOIN kelurahan ON userr.id_kel= kelurahan.id_kel
                  LEFT JOIN kabupaten ON userr.id_kab= kabupaten.id_kab 
                  LEFT JOIN kecamatan ON userr.id_kec= kecamatan.id_kec 
                  LEFT JOIN provinsi ON userr.id_prov= provinsi.id_prov
                  WHERE userr.id='$_GET[id]'";
				// echo $SQL;
                $rr=mysqli_fetch_array(mysqli_query($koneksi, $SQL));
                $tgl = date("d - m - Y", strtotime($rr['tgl_lhr']));
                $tgla = date("Y", strtotime($rr['tgl_lhr']));
                $tglin = date("d - m - Y", strtotime($rr['tgl_input']));
                $tahun = date("Y", strtotime($rr['tgl_input']));

                ?>
                <div class="col-sm-9 table-responsive">
                  <table class="table table-striped table-hover">
                   
                   <tr>
                     <td>Nama</td>
                     <td>: <b><?php echo "$rr[nama]";?></b></td>
                   </tr>
                   <tr>
                     <td class="col-sm-4">Contact Person (Telp./Hp.)</td>
                     <td>: <b><?php echo "$rr[hp]";?></b></td>
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
                     <td>: <b><?php echo "$rr[nama_kelurahan]";?></b></td>
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
                 </table>
               </div> 

               <div class="col-sm-3">
                <div class="box box-solid box-primary">
                  <div class="box-header">
                    <h3 class="box-title">FOTO</h3>
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    <center><img class="img-responsive img-rounded img-thumbnail" alt="Responsive image" src="../assets/img/admin/<?php echo "$rr[gambar]";?>" width="100px" alt="img-responsive"></center>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>  
      </div>
    </section>
  </div>
  <?php include "footer.php";?>
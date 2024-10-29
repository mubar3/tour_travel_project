<?php include "header.php" ?>
<div class="wrapper">
  <!-- Star menu -->
  <?php include "menu.php";?>
  <!-- End menu -->

  <!-- Start content -->
  <div class='content-wrapper'>
    <!-- Content Header (Page header) -->
    <section class='content-header'>
      <h1>
        <?php echo "$i[nama] "; ?>
        <small>Control panel - Untuk melihat data inputan terakhir silahkan klik tombol panah kebawah di Tabel Kolom ID</small>
      </h1>
      <ol class='breadcrumb'>
        <li><a href='home'><i class='fa fa-dashboard'></i> Home</a></li>
        <li class='active'>Data Tabel KartaNU Server Side</li>
      </ol>
    </section>


    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-success">
            <div class="box-header with-border">
              <div class="row">
                <div class="btn-group col-xs-4">
                 <h3 class="box-title"><i class="glyphicon glyphicon-tasks"></i> DATA TABEL ADMINISTRATOR</h3>
               </div>
               <div class="btn-group col-xs-3 pull-right">
                <!-- <a href='tag-data' class=" col-xs-6 btn bg-green"><i class="fa fa-print"></i> Cetak Kartanu</a> -->
                <a href='create-data-admin' class=" col-xs-12 btn bg-green"><i class="glyphicon glyphicon-plus"> Tambah</i></a>
              </div>
            </div>


            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table id="example" class="table table-striped table-hover">
                  <thead class="bg-yellow">
                    <tr>
                      <th data-column-id="id" data-type="numeric" data-order="desc">ID</th>
                      <th data-column-id="gambar">FOTO</th> 
                      <th>Level</th> 
                      <th>NAMA</th> 
                      <th>Email</th> 
                      <th>DUSUN</th>
                      <th>KEL</th>
					            <th>KEC</th>
                      <th>OPSI</th>
                    </tr>
                  </thead>
                    <tbody>
                  <?php
                
                  $tampil = mysqli_query($koneksi, "SELECT * FROM userr
                  left JOIN kelurahan ON userr.id_kel= kelurahan.id_kel
                  left JOIN kabupaten ON userr.id_kab= kabupaten.id_kab 
                  left JOIN kecamatan ON userr.id_kec= kecamatan.id_kec 
                  left JOIN provinsi ON userr.id_prov= provinsi.id_prov Order by id DESC ");
               

                  

                  $no=1;
                  while ($rr=mysqli_fetch_array($tampil))
                  {
					  
		// 			  $kab = $rr["id_kab"];
		// $idbaru = $rr["id_kab"];
		
		// $query2 = "select * from mwcu where upper(kec) = '".strtoupper($rr["nama_kecamatan"])."' and upper(ranting) = '".strtoupper($rr["nama_kelurahan"])."'";
		// $dtNO=mysqli_fetch_array(mysqli_query($koneksi, $query2));
		
		// $kd = $dtNO["kd"];
		// $ranting_kode = $dtNO["ranting_kode"];
		// $idbaru = $rr["no_anggota"];
		
		// $nobaru = $kab.".".$kd.".".$ranting_kode.".".$idbaru;
					  
                    ?>
                    <tr>
                      <td><center><?php echo "$no.";?></center></td>
                      <?php if (empty($rr['gambar'])){
                        echo "<td><center><img class='img-rounded' src='../assets/img/user/blank.png' width=30></center></td>";
                      }else
                      {
                        echo "<td><center><img class='img-rounded' src='../assets/img/admin/$rr[gambar]' width=30></center></td>";
                      } 
                      ?>
                      <td>
                        <?php  
                          $level = $rr["id_level"];
                          if($level==1){$level="PCNU";}
                          elseif($level==2){$level="MWCNU-".$rr["nama_kecamatan"];}
                          elseif($level==3){$level="Ranting-".$rr["nama_kelurahan"];}
                        ?>  
                       <span class='label bg-red'><?php echo $level;?></span></td>
                      <td><?php echo $rr["nama"];?></td>
                      <td><?php echo $rr["email"];?></td>
                      <td><?php echo $rr["alamat"];?></td>
                      <td><?php echo $rr["nama_kelurahan"];?></td>
					            <td><?php echo $rr["nama_kecamatan"];?></td>
                      <td><center>
                        <a class='btn bg-orange btn-xs' data-toggle='tooltip' title='Lihat Rician Data' href='detail-data-admin?id=<?php echo $rr["id"];?>'><span class='glyphicon glyphicon-list-alt'></span></a>
                        <a class='btn bg-aqua btn-xs' data-toggle='tooltip' title='Ubah Data' href='update-data-admin?id=<?php echo $rr["id"];?>'><span class='glyphicon glyphicon-edit'></span></a>
                        <a class='btn bg-red btn-xs' data-toggle='tooltip' title='Hapus Data' href='aksi/user_hapus_admin.php?id=<?php echo $rr["id"];?>' onclick="return confirm('Apa anda yakin akan menghapus data ini?')"><span class='glyphicon glyphicon-trash'></span></a></center>
                      </td>
                      <?php  $no++; } ?>
                    </tr>
                  </tbody>
                </table></div>
              </div>
            </div>
          </div>  
        </div>
      </section>
    </div>
    <script>
      // $(document).ready(function() {
      //   $('#example').dataTable( {
      //     "bProcessing": true,
      //     "bServerSide": true,
      //     "sAjaxSource": "server_side_kartamus.php",
      //     "aoColumns": [
      //     null,
      //     null,
      //     { "sName": "category_image",
      //     "bSearchable": false,
      //     "bSortable": false,
      //     "mRender": function(data, type, full) {
      //       return '<img src=\"../assets/img/user/'+data+'"\ width=\"50"\ height=\"50"\>'
      //     }
      //   }
      //   ,
      //   null,
      //   null,
      //   null,
      //   null,
      //   null,
      //   {
      //     "mData": "0",
      //     "mRender": function ( data, type, full ) {
      //       return '<center><a href=\"detail-data?id='+data+'\" class=\"btn btn-xs btn-warning\" title=\"Detail Data\"><i class=\"glyphicon glyphicon-user\"></i></a> <a class=\"btn btn-xs btn-info\" href=\"update-data?id='+data+'\" title=\"Edit Data\"><i class=\"glyphicon glyphicon-edit\"></i></a> <a class=\"btn btn-xs btn-danger command-delete\" href=\"aksi/user_hapus.php?id='+data+'\" title=\"Delete Data\"onclick=\"return confirm(Apa anda yakin akan menghapus data ini?)\"><i class=\"glyphicon glyphicon-trash\"></i></a></center> ';
      //     }
      //   }
      //   ]
      // } );
      // } );
    </script>
    <?php include "footer.php";?>



    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
          </div>
          <div class="modal-body">
            <div class="panel panel-info">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="glyphicon glyphicon-qrcode"></i> QR Code</h3>
              </div>

              <div class="panel-body">
                <?php
                $r=mysqli_query($koneksi, "SELECT * FROM data 
                  WHERE id_anggota='$_GET[id]'");
                  ?>
                  <center><img src="../assets/img/qrcode/<?php echo "$r[id_anggota]";?>" width="30%">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
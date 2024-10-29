
<?php 
include "header.php" ;
// print_r($_SESSION['id']);
// die();

?>
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
        <li class='active'>Data Tabel KartaNU Server Side <?php echo $_SESSION['id_kec'];?></li>
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
                 <h3 class="box-title"><i class="glyphicon glyphicon-tasks"></i> DATA TABEL KARTANU BELUM TERVERIFIKASI</h3>
               </div>
               <div class="btn-group col-xs-6 pull-right">
                <!-- <a href='create-data' class=" col-xs-6 btn bg-primary"><i class="glyphicon glyphicon-plus"></i> Tambah Data Anggota</a>
                <a href='tag-data' class=" col-xs-6 btn bg-green"><i class="fa fa-print"></i> Cetak Kartanu</a> -->
              </div>
            </div>

<?php 
  $query2 = "select * from userr where id = '$_SESSION[id]'";
    $dtnoanggota=mysqli_fetch_array(mysqli_query($koneksi, $query2));
    // echo $query2."<br>";
    
    $dtnoanggota = $dtnoanggota["no_anggota"];
    $idmwc=substr($dtnoanggota,3,2);
    $iddesa=substr($dtnoanggota,6,3);
    // print_r($idmwc);
    // die();
?>

<form role="form" action="" method="post" autocomplete="off">
  <?php if($_SESSION['level']==1){?>
       <select id="mwc" name='kecamatan'>
        <option value='' selected>Pilih Kecamatan</option>
        <?php
        $tampil = mysqli_query($koneksi, "SELECT * FROM mwc ORDER BY nama_mwc");
        while($row=mysqli_fetch_array($tampil)) {
          ?>
          <option id="mwc" value="<?php echo $row['id_mwc']; ?>"><?php echo $row['nama_mwc']; ?></option>
          <?php
        }
        ?>
      </select>
        <select id="desa" name='kelurahan'>
          <option value='' selected>Pilih Desa</option>
          <?php
          $tampil = mysqli_query($koneksi, "SELECT * FROM desa ORDER BY nama_desa");
          while($row=mysqli_fetch_array($tampil)) {
            ?>
            <option id="desa" class="<?php echo $row['id_mwc']; ?>" value="<?php echo $row['id_desa']; ?>"><?php echo $row['nama_desa']; ?></option>
            <?php
          }
          ?>
        </select>
        <button type="submit" name="daerah" >Cari</button>
  <?php } elseif($_SESSION['level']==2) {?>
        <select id="mwc" name='kecamatan'>
        <?php
        $tampil = mysqli_query($koneksi, "SELECT * FROM mwc where id_mwc= '$idmwc' ORDER BY nama_mwc");
        while($row=mysqli_fetch_array($tampil)) {
          ?>
          <option id="mwc" value="<?php echo $row['id_mwc']; ?>"><?php echo $row['nama_mwc']; ?></option>
          <?php
        }
        ?>
      </select>
        <select id="desa" name='kelurahan'>
          <option value='' selected>Pilih Desa</option>
          <?php
          $tampil = mysqli_query($koneksi, "SELECT * FROM desa ORDER BY nama_desa");
          while($row=mysqli_fetch_array($tampil)) {
            ?>
            <option id="desa" class="<?php echo $row['id_mwc']; ?>" value="<?php echo $row['id_desa']; ?>"><?php echo $row['nama_desa']; ?></option>
            <?php
          }
          ?>
        </select>
        <button type="submit" name="daerah" >Cari</button>
      <?php }?>
        
    </form>


    <form role="form" action="" method="post" autocomplete="off">
  <?php if($_SESSION['level']==1){?>
        <input type="text" placeholder="masukkan nama" name="nama">
        <button type="submit">Cari</button>
      <?php }?>
        
    </form>

    <form role="form" action="" method="post" autocomplete="off">
  <?php if($_SESSION['level']==1){?>
        <input type="text" placeholder="masukkan NIA" name="nia">
        <button type="submit">Cari</button>
      <?php }?>
        
    </form>

    <?php 
        if($_SESSION['level']==3){
        $data = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM user
                  WHERE id_level like '%2%' and substr(user.nokartanu,7,3)='$iddesa' Order by no_anggota DESC"));
        }

        if(isset($_POST['kecamatan']) and empty($_POST['kelurahan']) ){
        $data = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM user
               WHERE id_level like '%2%' and substr(user.nokartanu,4,2)='$_POST[kecamatan]' Order by no_anggota DESC"));
        }
        elseif(isset($_POST['kecamatan']) and isset($_POST['kelurahan']) ){
          $data = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM user
                WHERE id_level like '%2%' and substr(user.nokartanu,4,2)='$_POST[kecamatan]' and substr(user.nokartanu,7,3)='$_POST[kelurahan]' Order by no_anggota DESC"));
        }
        else{
          $data=0;
        }
                  ?>

    <h5>Jumlah Data : <?php echo $data;?></h5>


            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table  id="example1" class="table table-striped table-hover">
                  <thead class="bg-yellow">
                    <tr>
                      <th data-column-id="id">ID</th>
                      <th data-column-id="gambar">IMG</th> 
                      <th>NO. ANGGOTA</th> 
                      <th>NAMA</th> 
                      <th>TTL</th> 
                      <th>DUSUN</th>
                      <th>KEL</th>
					             <th>KEC</th>
                      <th>OPSI</th>
                    </tr>
                  </thead>
                    <tbody>
                  <?php
                  // Penggunaan where like bertujuan untuk menampilkan pencarian data lebih satu data...
                  // $tampil = mysqli_query($koneksi, "SELECT * FROM user
                  // left JOIN kelurahan ON user.id_kel= kelurahan.id_kel
                  // left JOIN kabupaten ON user.id_kab= kabupaten.id_kab 
                  // left JOIN kecamatan ON user.id_kec= kecamatan.id_kec 
                  // left JOIN provinsi ON user.id_prov= provinsi.id_prov WHERE id_level like '%2%' Order by id DESC LIMIT 2000");
                  if($_SESSION['level']==3){
                    $tampil = mysqli_query($koneksi, "SELECT * FROM user
                  left JOIN kelurahan ON user.id_kel= kelurahan.id_kel
                  left JOIN kabupaten ON user.id_kab= kabupaten.id_kab 
                  left JOIN kecamatan ON user.id_kec= kecamatan.id_kec 
                  left JOIN provinsi ON user.id_prov= provinsi.id_prov WHERE id_level like '%2%' and substr(user.nokartanu,7,3)='$iddesa' Order by no_anggota DESC");
                  }

                  if(isset($_POST['kecamatan']) and empty($_POST['kelurahan']) ){
                  $tampil = mysqli_query($koneksi, "SELECT * FROM user
                  left JOIN kelurahan ON user.id_kel= kelurahan.id_kel
                  left JOIN kabupaten ON user.id_kab= kabupaten.id_kab 
                  left JOIN kecamatan ON user.id_kec= kecamatan.id_kec 
                  left JOIN provinsi ON user.id_prov= provinsi.id_prov WHERE id_level like '%2%' and substr(user.nokartanu,4,2)='$_POST[kecamatan]' Order by no_anggota DESC");
                  }
                  // elseif(empty($_POST['kecamatan']) and isset($_POST['kelurahan']) ){
                  // $tampil = mysqli_query($koneksi, "SELECT * FROM user
                  // left JOIN kelurahan ON user.id_kel= kelurahan.id_kel
                  // left JOIN kabupaten ON user.id_kab= kabupaten.id_kab 
                  // left JOIN kecamatan ON user.id_kec= kecamatan.id_kec 
                  // left JOIN provinsi ON user.id_prov= provinsi.id_prov WHERE id_level like '%2%' and user.id_kel='$_POST[kelurahan]' Order by id DESC");
                  // }
                  elseif(isset($_POST['kecamatan']) and isset($_POST['kelurahan']) ){
                    $tampil = mysqli_query($koneksi, "SELECT * FROM user
                  left JOIN kelurahan ON user.id_kel= kelurahan.id_kel
                  left JOIN kabupaten ON user.id_kab= kabupaten.id_kab 
                  left JOIN kecamatan ON user.id_kec= kecamatan.id_kec 
                  left JOIN provinsi ON user.id_prov= provinsi.id_prov WHERE id_level like '%2%' and substr(user.nokartanu,4,2)='$_POST[kecamatan]' and substr(user.nokartanu,7,3)='$_POST[kelurahan]' Order by no_anggota DESC");
                  }

                  if(isset($_POST['nama'])){
                  $tampil = mysqli_query($koneksi, "SELECT * FROM user
                  left JOIN kelurahan ON user.id_kel= kelurahan.id_kel
                  left JOIN kabupaten ON user.id_kab= kabupaten.id_kab 
                  left JOIN kecamatan ON user.id_kec= kecamatan.id_kec 
                  left JOIN provinsi ON user.id_prov= provinsi.id_prov 
                  WHERE id_level like '%2%' and nama like '%$_POST[nama]%' 
                  Order by no_anggota DESC");
                  }

                  if(isset($_POST['nia'])){
                  $tampil = mysqli_query($koneksi, "SELECT * FROM user
                  left JOIN kelurahan ON user.id_kel= kelurahan.id_kel
                  left JOIN kabupaten ON user.id_kab= kabupaten.id_kab 
                  left JOIN kecamatan ON user.id_kec= kecamatan.id_kec 
                  left JOIN provinsi ON user.id_prov= provinsi.id_prov 
                  WHERE id_level like '%2%' and nokartanu='$_POST[nia]' 
                  Order by no_anggota DESC");
                  }

                  $no=1;
                  while ($rr=mysqli_fetch_array($tampil))
                  {
					  
					  $kab = $rr["id_kab"];
		$idbaru = $rr["id_kab"];
		
		$query2 = "select * from mwcu where upper(kec) = '".strtoupper($rr["nama_kecamatan"])."' and upper(ranting) = '".strtoupper($rr["nama_kelurahan"])."'";
		$dtNO=mysqli_fetch_array(mysqli_query($koneksi, $query2));
		
		$kd = $dtNO["kd"];
		$ranting_kode = $dtNO["ranting_kode"];
		$idbaru = $rr["no_anggota"];
		$nokartanu = $rr["nokartanu"];
		
		$nobaru = $kab.".".$kd.".".$ranting_kode.".".$idbaru;
					  
					  
                    $t = date("d - m - Y", strtotime($rr['tgl_lhr']));
                    $ti = date("d - m - Y", strtotime($rr['tgl_input']));
                    $tahun = date("Y", strtotime($rr['tgl_input']));   
                    ?>
                    <tr>
                      <td><center><?php echo "$no.";?></center></td>
                      <?php if (empty($rr['gambar'])){
                        echo "<td><center><img class='img-rounded' src='../assets/img/user/blank.png' width=30></center></td>";
                      }else
                      {
                        echo "<td><center><img class='img-rounded' src='../assets/img/user/$rr[gambar]' width=30></center></td>";
                      } 
                      ?>
                      <td><span class='label bg-red'><?php echo $nokartanu;?></span></td>
                      <td><?php echo $rr["nama"];?></td>
                      <td><?php echo $rr["tmp_lhr"];?>, <?php echo $t;?></td>
                      <td><?php echo $rr["alamat"];?></td>
                      <td><?php echo $rr["nama_kelurahan"];?></td>
					            <td><?php echo $rr["nama_kecamatan"];?></td>
                      <td><center>
                        <a class='btn bg-orange btn-xs' data-toggle='tooltip' title='Lihat Rician Data' href='detail-data?id=<?php echo $rr["id"];?>'><span class='glyphicon glyphicon-list-alt'></span></a>
                        <a class='btn bg-aqua btn-xs' data-toggle='tooltip' title='Ubah Data' href='update-data?id=<?php echo $rr["id"];?>'><span class='glyphicon glyphicon-edit'></span></a>
                        <a class='btn bg-red btn-xs' data-toggle='tooltip' title='Hapus Data' href='aksi/user_hapus.php?id=<?php echo $rr["id"];?>' onclick="return confirm('Apa anda yakin akan menghapus data ini?')"><span class='glyphicon glyphicon-trash'></span></a></center>
                      <?php 
                      if($_SESSION['level']==1 or $_SESSION['level']==2){
                        ?>
                        <a class='btn bg-green btn-xs' data-toggle='tooltip' title='Verifikasi Data' href='aksi/user_verifikasi.php?id=<?php echo $rr["id"];?>' onclick="return confirm('Apa anda yakin akan verifikasi data ini?')"><span class='glyphicon glyphicon-ok'></span></a></center>
                      <?php 
                      } 
                      ?>
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
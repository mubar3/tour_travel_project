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
        <small>Control panel - Untuk melihat data inputan terakhir silahkan klik tombol panah kebawah di Tabel Kolom ID</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Cetak KartaNU - Data Tabel Server Side</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-success">
            <!-- /.box-header -->
            <div class="box-header with-border">
              <form role="form" action="" method="post" autocomplete="off">
       <select id="mwc" name='kecamatan'>
        <option value='' selected>Pilih MWC</option>
        <?php
        $tampil = mysqli_query($koneksi, "SELECT * FROM mwc ORDER BY nama");
        while($row=mysqli_fetch_array($tampil)) {
          ?>
          <option id="mwc" <?php if($row['id']==$_POST['kecamatan']){echo "selected";}?> value="<?php echo $row['id']; ?>"><?php echo $row['nama']; ?></option>
          <?php
        }
        ?>
      </select>
        <select id="desa" name='kelurahan'>
          <option value='' selected>Pilih Desa</option>
          <?php
          $tampil = mysqli_query($koneksi, "SELECT * FROM ranting ORDER BY nama");
          while($row=mysqli_fetch_array($tampil)) {
            ?>
            <option id="desa" class="<?php echo $row['mwc_id']; ?>"
            <?php if($row['id']==$_POST['kelurahan']){echo "selected";}?> value="<?php echo $row['id']; ?>"><?php echo $row['nama']; ?></option>
            <?php
          }
          ?>
        </select>
        <button type="submit" name="daerah" >Cari</button>
    </form>
              
              <form action="cetak.php" target="_Blank" method="post" class="form-horizontal" role="form">
              <div class="row">
                <div class="btn-group col-xs-4">
                 <h3 class="box-title"><i class="glyphicon glyphicon-tasks"></i> DATA CETAK KARTANU</h3>
               </div>
              <div class="btn-group col-xs-6 pull-right">
                  <!--a href='tag-datax' class=" col-xs-6 btn bg-green"><i class="fa fa-share"></i> Lihat Data CETAK KARTANU</a-->

                  <button type="submit" class="col-xs-6 pull-right btn bg-aqua"><i class="fa fa-print"></i> CETAK KARTANU</button>
                </div>
                
            </div>
          <div class="box-body">
              <div class="table-responsive">

            
                <table class="table table-bordered table-hover">
                  <thead class="bg-yellow">
                    <tr>
                      <th><Center>ID</Center></th>
                      <th>FOTO</th>
                      <th width="50px">NO ANGGOTA</th>
                      <th>NAMA</th>
                      <th>DUSUN</th>
					  <th>DESA</th>
                      <th>KEC</th>
                      <th>KAB</th> 
                 <!--     <th>WAKTU INPUT</th> -->
                      <th><Center>CENTANG</Center></th>
                    </tr>
                  </thead>
                   <tbody>
                      <?php


                  if(isset($_POST['kecamatan']) and empty($_POST['kelurahan']) ){
                  $tampil = mysqli_query($koneksi, "SELECT * FROM user
                  left JOIN kelurahan ON user.id_kel= kelurahan.id_kel
                  left JOIN kabupaten ON user.id_kab= kabupaten.id_kab 
                  left JOIN kecamatan ON user.id_kec= kecamatan.id_kec 
                  left JOIN provinsi ON user.id_prov= provinsi.id_prov WHERE mwc='$_POST[kecamatan]' and status_cetak=1 Order by no_anggota DESC");
                  }
                  // elseif(empty($_POST['kecamatan']) and isset($_POST['kelurahan']) ){
                  // $tampil = mysqli_query($koneksi, "SELECT * FROM user
                  // left JOIN kelurahan ON user.id_kel= kelurahan.id_kel
                  // left JOIN kabupaten ON user.id_kab= kabupaten.id_kab 
                  // left JOIN kecamatan ON user.id_kec= kecamatan.id_kec 
                  // left JOIN provinsi ON user.id_prov= provinsi.id_prov WHERE id_level like '%3%' and user.id_kel='$_POST[kelurahan]' Order by id DESC");
                  // }
                  elseif(isset($_POST['kecamatan']) and isset($_POST['kelurahan']) ){
                    $tampil = mysqli_query($koneksi, "SELECT * FROM user
                  left JOIN kelurahan ON user.id_kel= kelurahan.id_kel
                  left JOIN kabupaten ON user.id_kab= kabupaten.id_kab 
                  left JOIN kecamatan ON user.id_kec= kecamatan.id_kec 
                  left JOIN provinsi ON user.id_prov= provinsi.id_prov WHERE mwc='$_POST[kecamatan]' and ranting='$_POST[kelurahan]' and status_cetak=1 Order by no_anggota DESC");
                  }

                  //       $tampil = mysqli_query($koneksi, "SELECT * FROM user 
                  // left JOIN kelurahan ON user.id_kel= kelurahan.id_kel
                  // left JOIN kabupaten ON user.id_kab= kabupaten.id_kab 
                  // left JOIN kecamatan ON user.id_kec= kecamatan.id_kec 
                  // left JOIN provinsi ON user.id_prov= provinsi.id_prov where id_level Like '%3%' ORDER BY id DESC LIMIT 2000");
                        $no=1;
                        while ($r=mysqli_fetch_array($tampil))
                        {
		$kab = $r["id_kab"];
		$idbaru = $r["id_kab"];
		
		$query2 = "select * from mwcu where upper(kec) = '".strtoupper($r["nama_kecamatan"])."' and upper(ranting) = '".strtoupper($r["nama_kelurahan"])."'";
		$dtNO=mysqli_fetch_array(mysqli_query($koneksi, $query2));
		
		$kd = $dtNO["kd"];
		$ranting_kode = $dtNO["ranting_kode"];
		$idbaru = $r["no_anggota"];
		$nokartanu = $r["nokartanu"];
		
		// $nobaru = $kab.".".$kd.".".$ranting_kode.".".$idbaru;

                          $t = date("d - m - Y", strtotime($r['tgl_lhr']));
                          $tgl = date("dmY", strtotime($r['tgl_lhr']));
                          $ti = date("d - m - Y", strtotime($r['tgl_input']));
                  //        $ti2 = date("Y", strtotime($r['tgl_input'])); //
                        echo "
                        <tr>
                          <td style='text-align:center'>$no.</td>";
                             if (empty($r['gambar'])){
                              echo "<td><center><img class='img-thumbnail' src='../assets/img/user/blank.png' width=40 height=20></center></td>";
                             }else{
                              echo "<td><center><img class='img-thumbnail' src='../assets/img/user/$r[gambar]' width=40 height=20><br>".$r["gambar"]."</center></td>";
                             }
                          echo "
                          <td><span class='label bg-red'>".$nokartanu."</span></td>
                          <td>$r[nama]</td>
						  <td>$r[alamat]</td>
						  <td>$r[nama_kelurahan]</td>
                          <td>$r[nama_kecamatan]</td>
						  <td>$r[nama_kabupaten]</td>
                   <!--       <td><center>$ti/$r[waktu]</center></td> -->
                          <td>
                            <center>
                              <input name='selector[]' type='checkbox' name='tandai' class='minimal flat' value='$r[id]'>
                            </center>
                          </td>
                        </tr>";
                        $no++;
                        }
                      ?>
                    </tbody>
                  </table>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <script>
    $(document).ready(function() {
      $('#example').dataTable( {
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "server_side_kartamus.php",
        "aoColumns": [
        null,
        null,
        { "sName": "category_image",
        "bSearchable": false,
        "bSortable": false,
        "mRender": function(data, type, full) {
          return '<center><img class=\"img-responsive img-rounded\" alt=\"Responsive image\" src=\"../assets/img/user/'+data+'\" width=\"40\"></center>';
        }
      }
      ,
      null,
      null,
      null,
      null,
      null,
      {
        "mRender": function (data, type, full) {
          return '<center><input name=\"selector[]\" class=\"minimal flat\" value=\" '+data+' \" type=\"checkbox\" ></center>';
        }
      }
      ]
    } );
    } );
  </script>
  <?php include "footer.php";?>
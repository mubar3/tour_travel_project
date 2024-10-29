<?php include "headerx.php" ?>
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
        <small>Control panel</small>
      </h1>
      <ol class='breadcrumb'>
        <li><a href='home'><i class='fa fa-dashboard'></i> Home</a></li>
        <li class='active'>Tampil Data</li>
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
                 <h3 class="box-title"><i class="glyphicon glyphicon-tasks"></i> DATA ANGGOTA KARTAMUS</h3>
               </div>
               <div class="btn-group col-xs-6 pull-right">
                <a href='jss' class=" col-xs-6 btn bg-green"><i class="fa fa-share"></i> Lihat Data Anggota Kartanu</a>
                <a href='create-data' class=" col-xs-6 btn bg-orange"><i class="glyphicon glyphicon-plus"></i> Tambah Data Anggota</a>
              </div>
            </div>

          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive">
              <table id="grid-basic" class="table table-hover table-striped">
                <thead>
                  <tr class="bg-orange">
                    <th data-column-id="id" data-type="numeric" data-order="desc" width="20px">ID</th>
                    <th data-column-id="member">NO ANGGOTA</th>
                    <th data-column-id="image" data-formatter="image">NAMA GAMBAR</th>
                    <th data-column-id="nama">NAMA LENGKAP</th>
                    <th data-column-id="nama_kecamatan">KEC</th>
                    <th data-column-id="nama_kelurahan">DESA</th>
                    <th data-column-id="link" data-formatter="link">AKSI</th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                  // Penggunaan where like bertujuan untuk menampilkan pencarian data lebih satu data...
                  $tampil = mysqli_query($koneksi, "SELECT * FROM user  
                    INNER JOIN kelurahan ON user.id_kel= kelurahan.id_kel
                    INNER JOIN kabupaten ON user.id_kab= kabupaten.id_kab 
                    INNER JOIN kecamatan ON user.id_kec= kecamatan.id_kec 
                    INNER JOIN provinsi ON user.id_prov= provinsi.id_prov WHERE jk like '%Perempuan%' And id_level like '%3%' Order by id DESC");

                  $no=1;
                  while ($rr=mysqli_fetch_array($tampil))
                  {
                    $t = date("d - m - Y", strtotime($rr['tgl_lhr']));
                    $ti = date("d - m - Y", strtotime($rr['tgl_input']));
                    $tahun = date("Y", strtotime($rr['tgl_input']));
                    ?>
                    <tr>
                      <td><center><?php echo $rr["id"];?></center></td>
                      <td><span class="label bg-orange"><?php echo $rr["id_kel"];?>.<?php echo $rr["jenjang"];?>.<?php echo $tahun;?>.<?php echo $rr["no_anggota"];?></span></td>
                      <td><img src="../assets/img/user/<?php echo $rr[gambar];?>" width="20px"></td>
                      <td><?php echo $rr["nama"];?></td>
                      <td><?php echo $rr["nama_kecamatan"];?></td>
                      <td><?php echo $rr["nama_kelurahan"];?></td>
                      <td><center>
                        test
                      </center></td><script>

                        $( document ).ready(function() {
                          $("#grid-basic").bootgrid({
                            formatters: 

                            {
                              "image": function(column, row)
                              {
                                return "<img src=\"../assets/img/user/" + row.id + "\" width=\"20\" >";
                              },
                              "link": function(column, row)
                              {
                                return " <a href=\"detail-data?id=" + row.id + "\" class=\"btn btn-xs btn-warning command-edit\"  data-toggle=\"modal\" data-target=\"#confirmation\"><span class=\"fa fa-list\"></span></a> " + "<a href=\"update-data?id=" + row.id + "\" class=\"btn btn-xs btn-primary command-delete\" onclick=\"return confirm('Apa anda yakin akan menghapus data ini?')\"><span class=\"fa fa-edit\"></span></a> " + "<a href=\"aksi/user_hapus.php?id=" + row.id + "\" class=\"btn btn-xs btn-danger command-delete\" onclick=\"return confirm('Apa anda yakin akan menghapus data ini?')\"><span class=\"fa fa-trash\"></span></a> ";

                              }
                            }

                          });
                        });

                      </script>
                      <?php  $no++; } ?>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>  
      </div>
    </section>
  </div>
  

  <?php include "footerx.php";?>


     <!--  {
          return "<a href=detail-data?id=" + row.id + " title=View Data><i class='glyphicon glyphicon-list-alt'></i></a> <a href=update-data?id=" + row.id + " title=Edit Data onclick=confirm('Apa anda yakin akan menghapus data ini?')><i class='glyphicon glyphicon-edit'></i></a>";
        } -->
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
            <form action="print-data" target="_Blank" method="post" class="form-horizontal" role="form">
              <div class="box-header with-border" style="background-image: url('../assets/img/bg/b.png');">
                <div class="row">
                  <div class="btn-group col-xs-6">
                   <h3 class="box-title"><i class="glyphicon glyphicon-tasks"></i> <b>DATA CETAK ANGGOTA KARTAMUS</b></h3>
                 </div>
                 <div class="btn-group col-xs-6 pull-right">
                  <a href='jssprint' class=" col-xs-6 btn bg-green"><i class="fa fa-share"></i> Lihat Data Cetak Kartanu</a>
                  <button type="submit" class="col-xs-6 pull-right btn bg-orange"><i class="fa fa-print"></i> CETAK KARTAMUS</button>
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
                      <th data-column-id="gambar">NAMA GAMBAR</th>
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
                        <td><?php echo $rr["gambar"];?></td>
                        <td><?php echo $rr["nama"];?></td>
                        <td><?php echo $rr["nama_kecamatan"];?></td>
                        <td><?php echo $rr["nama_kelurahan"];?></td>
                        <td><center>
                         </center>
                        </td>
                        <?php  $no++; } ?>
                      </tr>
                    </tbody>

                    <script>
                      $( document ).ready(function() {
                        $("#grid-basic").bootgrid({
                          formatters: {
                            "link": function(column, row)
                            {
                              return "<input value=" + row.id + " type=checkbox name=selector[]></input>";
                            }
                          }
                        });
                      });
                    </script>
                  </table>
                </div>
              </div>
            </div>
          </div>  
        </div>
      </section>
    </div>
    <?php include "footerx.php";?>
  </form>
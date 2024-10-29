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
               <h3 class="box-title"><i class="glyphicon glyphicon-tasks"></i> DATA ANGGOTA KARTANU</h3>
             </div>
             <div class="btn-group col-xs-6 pull-right">
              <a href='js' class=" col-xs-6 btn bg-aqua"><i class="fa fa-share"></i> Lihat Data Anggota Kartamus</a>
              <a href='create-data' class=" col-xs-6 btn bg-orange"><i class="glyphicon glyphicon-plus"></i> Tambah Data Anggota</a>
            </div>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table id="grid-basic" class="table table-hover table-striped">
              <thead>
                <tr class="bg-success">
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
                $tampil = mysqli_query($koneksi, "SELECT * FROM users  
                  INNER JOIN kelurahan ON users.id_kel= kelurahan.id_kel
                  INNER JOIN kabupaten ON users.id_kab= kabupaten.id_kab 
                  INNER JOIN kecamatan ON users.id_kec= kecamatan.id_kec 
                  INNER JOIN provinsi ON users.id_prov= provinsi.id_prov WHERE id_level='3' Order by id DESC");

                $no=1;
                while ($rr=mysqli_fetch_array($tampil))
                {
                  $$t = date("d - m - Y", strtotime($rr['tgl_lhr']));
                  $tgla = date("d.m.Y", strtotime($rr['tgl_lhr']));
                  $ti = date("d - m - Y", strtotime($rr['tgl_input']));
                  $nol = 0;
                  ?>
                  <tr>
                    <td><center><?php echo $rr["id"];?></center></td>
                    <td><span class="label bg-green"><?php echo $rr["id_kel"];?>.<?php echo $tgla;?>.<?php echo $nol;?><?php echo $rr["password"];?></span></td>
                    <td><?php echo $rr["gambar"];?></td>
                    <td><?php echo $rr["nama"];?></td>
                    <td><?php echo $rr["nama_kecamatan"];?></td>
                    <td><?php echo $rr["nama_kelurahan"];?></td>
                    <td><center>
                      <a class='btn bg-orange btn-xs' data-toggle='tooltip' title='Lihat Rician Data' href='detail-data?id=<?php echo $rr["id"];?>'><span class='glyphicon glyphicon-list-alt'></span></a>
                      <a class='btn bg-aqua btn-xs' data-toggle='tooltip' title='Ubah Data' href='update-data?id=<?php echo $rr["id"];?>'><span class='glyphicon glyphicon-edit'></span></a>
                      <a class='btn bg-red btn-xs' data-toggle='tooltip' title='Hapus Data' href='aksi/user_hapus.php?id=<?php echo $rr["id"];?>' onclick="return confirm('Apa anda yakin akan menghapus data ini?')"><span class='glyphicon glyphicon-trash'></span></a></center>
                    </td>
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
<script>
  $( document ).ready(function() {
    $("#grid-basic").bootgrid({
      formatters: {
        "link": function(column, row)
        {
          return "<a href=detail-data?id=" + row.id + " title=View Data><i class='glyphicon glyphicon-list-alt'></i></a> <a href=update-data?id=" + row.id + " title=Edit Data onclick=return confirm('Apa anda yakin akan menghapus data ini?')><i class='glyphicon glyphicon-edit'></i></a> ";
        }
      }
    });
  });
</script>
      <?php include "footerx.php";?>
            <!-- <a href=aksi/user_hapus.php?id=" + row.id + " title=Delete Data><i class='glyphicon glyphicon-trash'></i></a> hapus data -->
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
        <li><a href="#">Lihat Data</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="glyphicon glyphicon-tasks"></i> DATA TANDA TANGAN </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="col-sm-12 table-responsive">
              <table id="example1" class="table table-hover table-striped">
                <thead class="bg-red">
                    <tr>
                      <th><center>No.</center></th>
                      <th>Tanda Tangan</th>
                      <th>Nama Kabupaten/Kota</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $tampil = mysqli_query($koneksi, "SELECT * FROM kabupaten ORDER BY id_kab DESC");
                    $no=1;
                    while ($rr=mysqli_fetch_array($tampil)){
                    ?>
                    <tr>
                      <td width="50px"><center><?php echo "$no.";?></center></td>
                      <td><img class="img-responsive img-rounded img-thumbnail" alt="Responsive image" src="../assets/img/tandatangan/<?php echo "$rr[tandatangan]";?>" width="150px"></td>
                      <td><?php echo $rr["nama_kabupaten"];?></td>
                      <td width="100px">
                        <a class='btn bg-aqua btn-sm' data-toggle='tooltip' title='Klik untuk Unggah/ganti Tanda Tangan' href='update-tanda-tangan?id=<?php echo $rr["id_kab"];?>'><span class='glyphicon glyphicon-edit'></span></a>
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
<?php include "footer.php";?>
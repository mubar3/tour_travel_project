
<?php 
include "header.php" ;
// print_r($_SESSION['id_kec']);
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
                 <h3 class="box-title"><i class="glyphicon glyphicon-tasks"></i> DATA TABEL KARTANU</h3>
               </div>
            </div>
            <center><h4>Target : 36.916 Anggota</h4></center>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table  id="example1" class="table table-striped table-hover">
                  <thead class="bg-yellow">
                    <tr>
                      <th width="8%">ID</th> 
                      <th width="20%">MWC</th> 
                      <th width="30%">NAMA</th> 
                      <th>PERSEN</th> 
                      <th>JUMLAH</th>
                      <th>ORANG</th>
                    </tr>
                  </thead>
                    <tbody>
                  <?php
                  
                  $tampil = mysqli_query($koneksi, "SELECT * FROM mwc order by nama_mwc DESC");
                  
                 
                  $no=1;
                  while ($rr=mysqli_fetch_array($tampil))
                  {
					  
            $total = mysqli_query($koneksi, "SELECT * FROM user where substr(nokartanu,4,2)=$rr[id_mwc]");

            // print_r();
            // die();
            $data_total_user=mysqli_num_rows($total);
            $persentase=($data_total_user/36916)*100;
					          
                    ?>
                    <tr>
                      <td><center><?php echo "$no.";?></center></td>
                      <td>MWC <?php echo $rr["nama_mwc"];?></td>
                      <td>
                        <div class="progress">
                          <?php echo '<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:'.$persentase.'%">'; ?>

                            <span class="sr-only">70% Complete</span>
                          </div>
                        </div>
                      </td>
                      <td><?php echo substr($persentase,0,4);?>%</td>
                      <td><?php echo $data_total_user;?></td>
                      <td>Orang</td>
					           
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
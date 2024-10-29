<footer class="main-footer"">
  <div class="pull-right hidden-xs">
    <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">Powered by <a target="_blank" href="https://www.youtube.com/channel/UCh3zMcSY8-XpetX_Zq29e_w?view_as=subscriber?sub_confirmation=1"><b>lokon.id  - </b></a><label  class="btn btn-xs bg-orange">Versi 11|11|2019</label></marquee>
  </div>
  <b><img src="../assets/img/logo/<?php echo "$i[gambar] "; ?>" width="20px"> <?php $i = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM identitas LIMIT 1"));  echo "$i[nama] "; ?> <i class="fa fa-copyright"></i> Copyright <?php echo date("Y");?></b>.
</footer>
  </div>
  <script src="../assets/bootstrap/js/jquery-1.10.2.min.js"></script>
  <script src="../assets/bootstrap/js/jquery.chained.min.js"></script>
  <script>
    $("#provinsi").chained("#provinsi");
    $("#kabupaten").chained("#kabupaten");
    $("#kecamatan").chained("#kecamatan");
    $("#kelurahan").chained("#kelurahan");
    $("#jabatan").chained("#jabatan");
    $("#jenjang").chained("#jenjang");
    $("#kawin").chained("#kawin");
    $("#pendidikan").chained("#pendidikan");
    $("#pekerjaan").chained("#pekerjaan");
    $("#kemampuan").chained("#kemampuan");
    $("#bpjs").chained("#bpjs");
    $("#jk").chained("#jk");
    $("#banom").chained("#banom");
  </script>
  <!-- jQuery 2.2.3 -->
  <script src="../assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
  <!-- Bootstrap 3.3.6 -->
  <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
  <!-- Select2 -->
  <script src="../assets/plugins/select2/select2.full.min.js"></script>
  <!-- InputMask -->
  <script src="../assets/plugins/input-mask/jquery.inputmask.js"></script>
  <script src="../assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
  <script src="../assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
  <!-- date-range-picker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
  <script src="../assets/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- bootstrap datepicker -->
  <script src="../assets/plugins/datepicker/bootstrap-datepicker.js"></script>
  <!-- bootstrap color picker -->
  <script src="../assets/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
  <!-- bootstrap time picker -->
  <script src="../assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
  <!-- SlimScroll 1.3.0 -->
  <script src="../assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <!-- iCheck 1.0.1 -->
  <script src="../assets/plugins/iCheck/icheck.min.js"></script>
  <!-- FastClick -->
  <script src="../assets/plugins/fastclick/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="../assets/dist/js/app.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../assets/dist/js/demo.js"></script>
  <!-- Page script -->
  <script>
    $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
    {
      ranges: {
        'Today': [moment(), moment()],
        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month': [moment().startOf('month'), moment().endOf('month')],
        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      },
      startDate: moment().subtract(29, 'days'),
      endDate: moment()
    },
    function (start, end) {
      $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }
    );

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
</script>
  <script src="../assets/plugins/jQuery/jquery.bootgrid.js"></script>
  
<script src="../assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="../assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="../assets/ckeditor/ckeditor.js"></script><!-- 
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script> -->
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });
</script>
</body>
</html>
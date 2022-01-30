</div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="<?php echo base_url() ?>assets/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>assets/admin/dist/js/demo.js"></script>
<script src="<?php echo base_url()?>assets/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url() ?>/assets/js/toastr.min.js"></script>
<script src="<?php echo base_url()?>assets/admin/datatable/datatables.min.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<script type="text/javascript">
  $('#tgl-lahir').datepicker({
      autoclose: true,
      format:'yyyy-mm-dd'
    });
  $('#tgl-masuk').datepicker({
      autoclose: true,
      format:'yyyy-mm-dd'
    });
  $(function () {
    $('#example1').DataTable({
      'paging'      : false,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
    });
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      'pageLength'  : 50
    });
  });
</script>
<?php include(APPPATH.'views/admin/ajax/main_ajax.php'); ?>
<?php include(APPPATH.'views/admin/ajax/ajax_penilaian.php'); ?>
</body>
</html>
 <footer class="main-footer">
    <strong>Copyright &copy; 2021 </strong>
    All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo ADMIN_URL; ?>/assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo ADMIN_URL; ?>/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo ADMIN_URL; ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo ADMIN_URL; ?>/assets/plugins/chart.js/Chart.min.js"></script>

<!-- bs-custom-file-input -->
<script src="<?php echo ADMIN_URL; ?>/assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- jquery-validation -->
<script src="<?php echo ADMIN_URL; ?>/assets/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?php echo ADMIN_URL; ?>/assets/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo ADMIN_URL; ?>/assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo ADMIN_URL; ?>/assets/plugins/moment/moment.min.js"></script>
<script src="<?php echo ADMIN_URL; ?>/assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?php echo ADMIN_URL; ?>/assets/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo ADMIN_URL; ?>/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo ADMIN_URL; ?>/assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo ADMIN_URL; ?>/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo ADMIN_URL; ?>/assets/dist/js/adminlte.js"></script>
<!-- Summernote -->
<script src="<?php echo ADMIN_URL; ?>/assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo ADMIN_URL; ?>/assets/dist/js/demo.js"></script>
<script>
  $(function () {
    // Page Desc
    $('#page_description').summernote()
    // Page Short desc
    $('#page_short_desc').summernote()
    $('#description').summernote()
  })
</script>

<!-- DataTables  & Plugins -->
<script src="<?php echo ADMIN_URL; ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo ADMIN_URL; ?>/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo ADMIN_URL; ?>/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo ADMIN_URL; ?>/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo ADMIN_URL; ?>/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo ADMIN_URL; ?>/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo ADMIN_URL; ?>/assets/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo ADMIN_URL; ?>/assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo ADMIN_URL; ?>/assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo ADMIN_URL; ?>/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo ADMIN_URL; ?>/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo ADMIN_URL; ?>/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $("#example2").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
  });
</script>
</body>
</html>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <strong>Copyright &copy; 2023-2024 <a href="<?php $url ?>index.php">Hệ thống Quảng lý nhân sự VNPT Quảng Bình</a>.</strong>
    Tập đoàn VNPT Việt Nam.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php $url ?>public/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php $url ?>public/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script>
      $(document).ready(function(){
        $('.nav-item').on('click',function(){
            //Remove any previous active classes
        $('li.nav-item .nav-link').removeClass('active');

        //Add active class to the clicked item
        $(this).addClass('active');
        });
      });
</script>
<!-- Bootstrap 4 -->
<script src="<?php $url ?>public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php $url ?>public/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php $url ?>public/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php $url ?>public/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php $url ?>public/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php $url ?>public/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php $url ?>public/plugins/moment/moment.min.js"></script>
<script src="<?php $url ?>public/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php $url ?>public/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php $url ?>public/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php $url ?>public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php $url ?>public/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="<?php $url ?>public/dist/js/demo.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php $url ?>public/dist/js/pages/dashboard.js"></script>
	<script src="<?php $url ?>public/js/jquery-3.5.1.js"></script>
	<script src="<?php $url ?>public/ckeditor/ckeditor.js" type="text/javascript"></script>
	<script src="<?php $url ?>public/vendors/base/vendor.bundle.base.js"></script>
	<script src="<?php $url ?>public/vendors/datatables.net/jquery.dataTables.js"></script>
	<script src="<?php $url ?>public/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
	<script src="<?php $url ?>public/js/off-canvas.js"></script>
	<script src="<?php $url ?>public/js/hoverable-collapse.js"></script>
	<script src="<?php $url ?>public/js/template.js"></script>
	<script src="<?php $url ?>public/js/dashboard.js"></script>
	<script src="<?php $url ?>public/js/data-table.js"></script>
	<script src="<?php $url ?>public/js/jquery.dataTables.js"></script>
	<script src="<?php $url ?>public/js/dataTables.bootstrap4.js"></script>
	<script src="<?php $url ?>public/js/file-upload.js"></script>
	<script src="<?php $url ?>public/js/all.js"></script>
	<script src="<?php $url ?>public/js/jquery.countimator.min.js"></script>
	<script src="<?php $url ?>public/js/counter.js"></script>
	<script src="<?php $url ?>public/js/pwd_show.js"></script>
	<script src="<?php $url ?>public/js/ajax.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha256-OFRAJNoaD8L3Br5lglV7VyLRf0itmoBzWUoM+Sji4/8=" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
	
</head>

</body>
</html>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2020 <a href="<?=base_url()?>">BlitzKontakte.de</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?=base_url('plugins/jquery/jquery.min.js')?>"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url('plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<!-- DataTables -->
<script src="<?=base_url('plugins/datatables/jquery.dataTables.min.js')?>"></script>
<script src="<?=base_url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')?>"></script>
<script src="<?=base_url('plugins/datatables-responsive/js/dataTables.responsive.min.js')?>"></script>
<script src="<?=base_url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')?>"></script>
<!-- SweetAlert2 -->
<script src="<?=base_url('/plugins/sweetalert2/sweetalert2.min.js')?>"></script>
<!-- AdminLTE App -->

<script src="<?=base_url('plugins/jquery-ui/jquery-ui.min.js')?>"></script>
<script src="<?=base_url('dist/js/adminlte.min.js')?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url('dist/js/demo.js')?>"></script>

<!-- Ekko Lightbox -->
<script src="<?=base_url('plugins/ekko-lightbox/ekko-lightbox.min.js')?>"></script>
<script src="<?=base_url('plugins/filterizr/jquery.filterizr.min.js')?>"></script>

<script>
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });
</script>
<!-- page script -->
<?php if($file === "users"){?>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });
</script>

<script type="text/javascript">
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
<?php 
$session = session();
if($session->has('success_message')){?>
Toast.fire({
        icon: 'success',
        title: '<?=$session->getFlashData('success_message')?>'
      });
<?php
}
if($session->has('error_message')){?>
Toast.fire({
        icon: 'error',
        title: '<?=$session->getFlashData('error_message')?>'
      });
    <?php }?>
</script>
<?php }?>
</body>
</html>

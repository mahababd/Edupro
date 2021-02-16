</div>
<!-- ./wrapper -->

<!-- Modal -->
<div class="modal fade " id="modal" tabindex="-1" role="dialog" aria-labelledby="">
    <form action="" method="post" id="modal-form">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                </div>
                <div class="modal-body" id="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" id="modal-close-button">Close</button>
                    <button type="button" class="btn btn-success" id="modal-save-button">Save</button>
                </div>
            </div>
        </div>
    </form>
</div>

    <!-- jQuery -->
    <?php load_js("plugins/jquery/jquery.min.js"); ?>
    <!-- jQuery UI 1.11.4 -->
    <?php load_js("plugins/jquery-ui/jquery-ui.min.js"); ?>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <?php load_js("plugins/bootstrap/js/bootstrap.bundle.min.js"); ?>
    <!-- ChartJS -->
    <?php load_js("plugins/chart.js/Chart.min.js"); ?>
    <!-- DataTables -->
    <?php load_js("plugins/datatables/jquery.dataTables.js"); ?>
    <?php load_js("plugins/datatables-bs4/js/dataTables.bootstrap4.js"); ?>

    <!-- Sparkline -->
    <?php //load_js("plugins/sparklines/sparkline.js"); ?>
    <!-- JQVMap -->
    <?php //load_js("plugins/jqvmap/jquery.vmap.min.js"); ?>
    <?php //load_js("plugins/jqvmap/maps/jquery.vmap.usa.js"); ?>
    <!-- jQuery Knob Chart -->
    <?php //load_js("plugins/jquery-knob/jquery.knob.min.js"); ?>
    <!-- daterangepicker -->
    <?php //load_js("plugins/moment/moment.min.js"); ?>
    <?php //load_js("plugins/daterangepicker/daterangepicker.js"); ?>
    <!-- Tempusdominus Bootstrap 4 -->
    <?php //load_js("plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"); ?>
    <!-- Summernote -->
    <?php //load_js("plugins/summernote/summernote-bs4.min.js"); ?>
    <!-- overlayScrollbars -->
    <?php load_js("plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"); ?>
    <!-- AdminLTE App -->
    <?php load_js("js/adminlte.js"); ?>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <?php //load_js("js/pages/dashboard.js"); ?>
    <!-- AdminLTE for demo purposes -->
    <?php //load_js("js/demo.js"); ?>
    
    <?php //load_js("js/learners.js"); ?>
    <?php //load_js("js/centers.js"); ?>
    
    <?php foreach($js as $j): ?>
    <script src="<?= base_url().$j;?>"></script>
    <?php endforeach;?>
    <script>

    $(document).ready(function () {
        $('.dataTable-show').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "searching":true,
        });
        
        $( function() {
            $( ".datepicker" ).datepicker({
                    dateFormat: "yy-mm-dd",
                    changeMonth: true,
                    changeYear: true
                 }
            );
        });
    });

    </script>
</body>
</html>
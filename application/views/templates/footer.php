            </div>
            <!-- /.content-wrapper -->
            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
            <!-- Main Footer -->
            <footer class="main-footer">
                <strong>Copyright &copy; 2021 <a href="http://unpam.ac.id">PKM Universitas Pamulang</a>. </strong> All rights reserved.
                <div class="float-right d-none d-sm-inline-block">
                    <b>Version</b> 1.0.5
                </div>
            </footer>
        </div>
        <!-- ./wrapper -->
        <!-- REQUIRED SCRIPTS -->
        <!-- jQuery -->
        <script src="<?php echo base_url('assets/adminlte/'); ?>plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url('assets/adminlte/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="<?php echo base_url('assets/adminlte/'); ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url('assets/adminlte/'); ?>dist/js/adminlte.js"></script>
        <!-- OPTIONAL SCRIPTS -->
        <script src="<?php echo base_url('assets/adminlte/'); ?>dist/js/demo.js"></script>
        <!-- PAGE PLUGINS -->
        <!-- jQuery Mapael -->
        <script src="<?php echo base_url('assets/adminlte/'); ?>plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
        <script src="<?php echo base_url('assets/adminlte/'); ?>plugins/raphael/raphael.min.js"></script>
        <script src="<?php echo base_url('assets/adminlte/'); ?>plugins/jquery-mapael/jquery.mapael.min.js"></script>
        <script src="<?php echo base_url('assets/adminlte/'); ?>plugins/jquery-mapael/maps/usa_states.min.js"></script>
        <!-- ChartJS -->
        <script src="<?php echo base_url('assets/adminlte/'); ?>plugins/chart.js/Chart.min.js"></script>
        <!-- PAGE SCRIPTS -->
        <!-- <script src="<?php echo base_url('assets/adminlte/'); ?>dist/js/pages/dashboard2.js"></script> -->
        <!-- Select2 -->
        <script src="<?php echo base_url('assets/adminlte/'); ?>plugins/select2/js/select2.full.min.js"></script>
        <!-- bs-custom-file-input -->
        <script src="<?php echo base_url('assets/adminlte/'); ?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

        <script type="text/javascript">
            $(function () {
                $('#pilihSiswa').select2()
            })

            $(document).ready(function() {

                $("#btnUnggahRapot").attr("disabled", true);

                $('#btnCheck').click(function() {
                    if($(this).prop("checked") == true){
                        console.log("Checkbox is checked.");
                        $("#btnUnggahRapot").removeAttr("disabled");
                    } else if($(this).prop("checked") == false) {
                        console.log("Checkbox is unchecked.");
                        $("#btnUnggahRapot").attr("disabled", true);
                    }
                });
            });

            $(document).ready(function() {

                $("#btnUpdateRapot").attr("disabled", true);

                $('#btnCheckUpdate').click(function() {
                    if($(this).prop("checked") == true){
                        console.log("Checkbox is checked.");
                        $("#btnUpdateRapot").removeAttr("disabled");
                    } else if($(this).prop("checked") == false) {
                        console.log("Checkbox is unchecked.");
                        $("#btnUpdateRapot").attr("disabled", true);
                    }
                });
            });
        </script>

        <?php if(isset($rapot)) { ?>

            <script src="<?php echo base_url('assets/adminlte/'); ?>pdfjs/build/pdf.js"></script>

            <script src="<?php echo base_url('assets/adminlte/'); ?>pdfjs/build/pdf.worker.js"></script>

            <script type="text/javascript">
                


            </script>

        <?php } ?>
    </body>
</html>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
             <?php if(count($ext_data) > 0) { foreach ($ext_data as $key => $val) { ?>
            <div class="col-12 col-sm-6 col-md-64">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-archway"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Instansi</span>
                        <span class="info-box-number"><?php echo $val->nama_instansi ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>
            <div class="col-12 col-sm-6 col-md-6">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-chalkboard-teacher"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Siswa</span>
                        <span class="info-box-number"><?php echo ucwords($val->nama_siswa); ?> - <?php echo ucwords($val->kode_siswa); ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <?php }} ?>

            <div class="col-12">
                <h5 class="mt-4 mb-2">Rapor</h5>
            </div>
        </div>

        
        <div class="row">

            <?php if(count($rapot_data) > 0) { foreach ($rapot_data as $key => $val) { ?>
                
                <div class="col-md-3 col-sm-6 col-12">
                    <a data-toggle="modal" data-target=".rapot<?php echo $val->id; ?>">
                    <div class="info-box bg-info">
                        <span class="info-box-icon"><i class="far fa-bookmark"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Rapor</span>
                            <span class="info-box-number">Kelas <?php echo $val->nama_kelas; ?></span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 100%"></div>
                            </div>
                            <span class="progress-description">
                            <?php echo ucwords($val->nama_siswa); ?>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                    </a>
                </div>
                <!-- /.col -->
                

                <div class="modal fade rapot<?php echo $val->id; ?>">
                    <div class="modal-dialog modal-lg #rapot<?php echo $val->id; ?>">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Rapot <?php echo ucwords($val->nama_siswa); ?> kelas <?php echo $val->nama_kelas; ?></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                 <embed src="<?php echo base_url($val->path_file_rapot); ?>" type="application/pdf" width="100%" height="500px"> 
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
            <?php }} ?>

        </div>
        <!-- /.row -->
    </div>
    <!--/. container-fluid -->
</section>
<!-- /.content -->

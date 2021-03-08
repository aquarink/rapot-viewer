<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Form Edit</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="<?php echo base_url('update-rapot'); ?>" method="POST" enctype="multipart/form-data">
                        <?php if(count($rapot_data) > 0) { foreach ($rapot_data as $key => $val) { ?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="namaSiswaLabel">Nama Siswa</label>
                                    <input readonly="" type="text" class="form-control" id="namaSiswaLabel" name="namaSiswaTxt" placeholder="Nama siswa / siswi" value="<?php echo $val->nama_siswa ?>">
                                </div>

                                <div class="form-group">
                                    <label for="fileRapotLabel">File Rapot</label>
                                    <input type="file" class="form-control" id="fileRapotLabel" name="fileRapot" placeholder="Nama siswa / siswi">
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="btnCheckUpdate">
                                    <label class="form-check-label" for="btnCheck">Anda yakin sudah benar ?</label>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <input type="hidden" name="id" value="<?php echo $val->id; ?>">
                                <input type="hidden" name="id_siswa" value="<?php echo $val->id_siswa; ?>">
                                <button id="btnUpdateRapot" type="submit" class="btn btn-warning">Update</button>
                            </div>
                        <?php }} ?>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!--/. container-fluid -->
</section>
<!-- /.content -->

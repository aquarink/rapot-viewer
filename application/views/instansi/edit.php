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
                    <form role="form" action="<?php echo base_url('update-instansi'); ?>" method="POST">
                        <?php if(count($instansi_data) > 0) { foreach ($instansi_data as $key => $val) { ?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="namaInstansiLabel">Nama Instansi</label>
                                    <input type="text" class="form-control" id="namaInstansiLabel" name="namaInstansiTxt" placeholder="Nama instansi" value="<?php echo $val->nama_instansi; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="alamatInstansiLabel">Alamat Instansi</label>
                                    <textarea class="form-control" id="alamatInstansiLabel" name="alamatInstansiTxt" placeholder="Alamat instansi"><?php echo $val->alamat; ?></textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <input type="hidden" name="id" value="<?php echo $val->id; ?>">
                                <button type="submit" class="btn btn-warning">Update</button>
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

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
                    <form role="form" action="<?php echo base_url('update-password'); ?>" method="POST">
                        <?php if(count($data_pengguna) > 0) { foreach ($data_pengguna as $key => $val) { ?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="kodeLabel">Kode Pengguna</label>
                                    <input readonly type="text" class="form-control" id="kodeLabel" name="kodeTxt" placeholder="Kode Pengguna" value="<?php echo $val->kode; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="namaLabel">Nama Pengguna</label>
                                    <input readonly type="text" class="form-control" id="namaLabel" name="namaTxt" placeholder="Nama Pengguna" value="<?php echo $val->nama; ?>">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="passwordLamaLabel">Password Lama</label>
                                    <input type="password" class="form-control" id="passwordLamaLabel" name="passwordLamaTxt" placeholder="Password lama">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="passwordBaruLabel">Password Baru</label>
                                    <input minLENGTH="6" type="password" class="form-control" id="passwordBaruLabel" name="passwordBaruTxt" placeholder="Password baru">
                                </div>
                                <div class="form-group">
                                    <label for="passwordBaruUlangLabel">Ulangi Password</label>
                                    <input minLENGTH="6" type="password" class="form-control" id="passwordBaruUlangLabel" name="passwordBaruUlangTxt" placeholder="Ulangi password baru">
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

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
                    <form role="form" action="<?php echo base_url('update-siswa'); ?>" method="POST">
                        <?php if(count($siswa_data) > 0) { foreach ($siswa_data as $key => $val) { ?>
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="namaKelasLabel">Pilih Kelas</label>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <select class="form-control" name="urutanKelasTxt">
                                                    <option selected="" disabled="">Pilih kelas</option>
                                                    <?php if(count($kelas_data) > 0) { foreach ($kelas_data as $ky => $vl) { 
                                                        if($vl->nama_kelas == $val->nama_kelas) {
                                                        ?>
                                                        <option selected="" value="<?php echo $vl->id; ?>"><?php echo $vl->nama_kelas; ?></option>
                                                        <?php } else { ?>
                                                        <option value="<?php echo $vl->id; ?>"><?php echo $vl->nama_kelas; ?></option>
                                                    <?php } } }?> 
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="namaSiswaLabel">Nama Siswa</label>
                                        <input type="text" class="form-control" id="namaSiswaLabel" name="namaSiswaTxt" placeholder="Nama siswa / siswi" value="<?php echo $val->nama_siswa ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="kodeSiswaLabel">Kode Siswa / NIS / NIK</label>
                                        <input type="text" class="form-control" id="kodeSiswaLabel" name="kodeSiswaTxt" placeholder="Kode Siswa / NIS / NIK dan sejenisnya"  value="<?php echo $val->kode_siswa ?>">
                                    </div>
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
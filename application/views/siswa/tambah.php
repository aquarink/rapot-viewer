<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Form Tambah</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="<?php echo base_url('simpan-siswa'); ?>" method="POST">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="namaKelasLabel">Pilih Kelas</label>
                                <div class="row">
                                    <div class="col-md-4">
                                        <select class="form-control" name="urutanKelasTxt">
                                            <option selected="" disabled="">Pilih kelas</option>
                                            <?php if(count($kelas_data) > 0) { foreach ($kelas_data as $key => $val) { ?>
                                                <option value="<?php echo $val->id; ?>"><?php echo $val->nama_kelas; ?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="namaSiswaLabel">Nama Siswa</label>
                                <input type="text" class="form-control" id="namaSiswaLabel" name="namaSiswaTxt" placeholder="Nama siswa / siswi">
                            </div>

                            <div class="form-group">
                                <label for="kodeSiswaLabel">Kode Siswa / NIS / NIK</label>
                                <input type="text" class="form-control" id="kodeSiswaLabel" name="kodeSiswaTxt" placeholder="Kode Siswa / NIS / NIK dan sejenisnya">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
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

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-12">

                <?php if(isset($_GET['msg'])) { ?>
                <div class="row">
                    <div class="card-body">
                        <div class="alert alert-info alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-info"></i> Pesan</h5>
                            <?php echo $_GET['msg']; ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
                
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Form Tambah</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="<?php echo base_url('simpan-rapot'); ?>" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="pilihSiswa">Pilih Siswa</label>
                                <select name="idSiswa" class="form-control" id="pilihSiswa">
                                    <option selected disabled="">Pilih Siswa</option>

                                    <?php if(count($siswa_data) > 0) { foreach ($siswa_data as $key => $val) { ?>
                                        <option value="<?php echo $val->id; ?>"><?php echo ucwords($val->nama_siswa); ?></option>
                                    <?php }} ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="namaKelasLabel">Pilih Kelas</label>
                                <div class="row">
                                    <div class="col-md-4">
                                        <select class="form-control" name="pilihKelasTxt">
                                            <option selected="" disabled="">Pilih kelas</option>
                                            <?php if(count($kelas_data) > 0) { foreach ($kelas_data as $key => $val) { ?>
                                                <option value="<?php echo $val->id; ?>"><?php echo $val->nama_kelas; ?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="fileRapotLabel">File Rapot</label>
                                <input type="file" class="form-control" id="fileRapotLabel" name="fileRapot" placeholder="Nama siswa / siswi">
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="btnCheck">
                                <label class="form-check-label" for="btnCheck">Anda yakin sudah benar ?</label>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button id="btnUnggahRapot" type="submit" class="btn btn-primary">Unggah Rapot</button>
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

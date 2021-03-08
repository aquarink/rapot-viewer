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
                            <!-- <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input name="fileRapot" type="file" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="">Pilih File PDF</span>
                                    </div>
                                </div>
                            </div> -->
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

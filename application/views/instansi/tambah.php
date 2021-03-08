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
                    <form role="form" action="<?php echo base_url('simpan-instansi'); ?>" method="POST">
                        <div class="card-body">
                            <!-- <div class="form-group">
                                <label for="kodeInstansiLabel">Kode Instansi</label>
                                <input type="text" class="form-control" id="kodeInstansiLabel" name="kodeInstansiTxt" placeholder="Kode instansi">
                            </div> -->
                            <div class="form-group">
                                <label for="namaInstansiLabel">Nama Instansi</label>
                                <input type="text" class="form-control" id="namaInstansiLabel" name="namaInstansiTxt" placeholder="Nama instansi">
                            </div>
                            <div class="form-group">
                                <label for="alamatInstansiLabel">Alamat Instansi</label>
                                <textarea class="form-control" id="alamatInstansiLabel" name="alamatInstansiTxt" placeholder="Alamat instansi"></textarea>
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

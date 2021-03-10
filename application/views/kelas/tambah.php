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
                    <form role="form" action="<?php echo base_url('simpan-kelas'); ?>" method="POST">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="namaKelasLabel">Nama Kelas</label>
                                <div class="row">
                                    <div class="col-md-4">
                                        <select class="form-control" name="urutanKelasTxt">
                                            <option selected="" disabled="">Pilih Jenjang</option>
                                            <?php for ($i=1; $i <= 12; $i++) { 
                                                echo "<option value='".$i."'>".$i."</option>";
                                            } ?>
                                        </select>
                                    </div>

                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="namaKelasLabel" name="namaKelasTxt" placeholder="Nama kelas seperti A, B, C dst">
                                    </div>
                                </div>
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

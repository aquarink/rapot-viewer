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
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Form Edit</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="<?php echo base_url('update-kelas'); ?>" method="POST">
                        <?php if(count($kelas_data) > 0) { foreach ($kelas_data as $key => $val) { ?>
                            <?php
                            $expl   = explode('-', $val->kode_kelas);
                            $urutan = $expl[1]; 
                            $nama   = $expl[2]; 

                            ?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="namaKelasLabel">Nama Kelas</label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <select class="form-control" name="urutanKelasTxt">
                                                <option readonly>Pilih Jenjang <?php echo $urutan; ?></option>
                                                <?php for ($i=1; $i <= 12; $i++) { 
                                                    if($urutan == $i) {
                                                        echo "<option selected value='".$i."'>".$i."</option>";
                                                    } else {
                                                        echo "<option value='".$i."'>".$i."</option>";
                                                    }
                                                } ?>
                                            </select>
                                        </div>

                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="namaKelasLabel" name="namaKelasTxt" placeholder="Nama kelas seperti A, B, C dst" value="<?php echo $nama; ?>">

                                            <input type="hidden" name="id" value="<?php echo $val->id; ?>">
                                        </div>
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

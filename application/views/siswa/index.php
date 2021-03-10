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
                
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">Kode Instansi</th>
                                    <th>Nama Instansi</th>
                                    <th>Nama Siswa</th>
                                    <th>Kode Siswa</th>
                                    <th style="width: 150px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(count($siswa_data) > 0) { foreach ($siswa_data as $key => $val) { ?>
                                    <tr>
                                        <td><?php echo $val->id_instansi; ?></td>
                                        <td><?php echo ucwords($val->nama_instansi); ?></td>
                                        <td><?php echo ucwords($val->nama_siswa); ?></td>
                                        <td><?php echo ucwords($val->kode_siswa); ?></td>
                                        <td>
                                            <a href="<?php echo base_url('ubah-siswa?id='.$val->id); ?>" class="btn btn-info">Edit</a>
                                            <button data-toggle="modal" data-target=".delete<?php echo $val->id; ?>" class="btn btn-danger">Hapus</button>
                                        </td>
                                    </tr>

                                    <div class="modal fade delete<?php echo $val->id; ?>">
                                        <div class="modal-dialog #delete<?php echo $val->id; ?>">
                                            <div class="modal-content bg-danger">
                                                <div class="modal-body">
                                                    <b>Anda yakin ingin menghapus data ini ?</b>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                                    <a href="<?php echo base_url('hapus-siswa?id='.$val->id); ?>" class="btn btn-warning">Ya</a>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->
                                <?php }} ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-right">
                            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                        </ul>
                    </div>
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

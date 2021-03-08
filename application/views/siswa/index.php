<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">Kode Instansi</th>
                                    <th>Nama Instansi</th>
                                    <th>Nama Kelas</th>
                                    <th>Kode Kelas</th>
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
                                        <td><?php echo $val->nama_kelas; ?></td>
                                        <td><?php echo $val->kode_kelas; ?></td>
                                        <td><?php echo ucwords($val->nama_siswa); ?></td>
                                        <td><?php echo ucwords($val->kode_siswa); ?></td>
                                        <td>
                                            <a href="<?php echo base_url('ubah-siswa?id='.$val->id); ?>" class="btn btn-info">Edit</a>
                                            <a href="<?php echo base_url('hapus-siswa?id='.$val->id); ?>" class="btn btn-danger">Hapus</a>
                                        </td>
                                    </tr>
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

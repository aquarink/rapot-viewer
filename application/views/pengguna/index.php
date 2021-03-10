<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-archway"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Instansi</span>
                        <span class="info-box-number"><?php echo isset($ext_data['instansi']) ? $ext_data['instansi'] : 'Loading';  ?></span> 
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-person-booth"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Kelas</span>
                        <span class="info-box-number"><?php echo isset($ext_data['kelas']) ? $ext_data['kelas'] : 'Loading';  ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-chalkboard-teacher"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Siswa</span>
                        <span class="info-box-number"><?php echo isset($ext_data['siswa']) ? $ext_data['siswa'] : 'Loading';  ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-address-card"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">File Rapor</span>
                        <span class="info-box-number"><?php echo isset($ext_data['rapot']) ? $ext_data['rapot'] : 'Loading';  ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!--/. container-fluid -->
</section>
<!-- /.content -->

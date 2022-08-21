<body>
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">

                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-title">
                                    <h4>Mahasiswa Malam </h4>

                                </div>
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="row-select" class="display table table-borderd table-hover">
                                            <thead>
                                                <tr>
                                                    <th>NIM</th>
                                                    <th>Nama</th>
                                                    <th>Kelas</th>
                                                    <th>Jurusan</th>
                                                    <th>Semester</th>
                                                    <th>Tunggakan</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php foreach ($mhs as $data) { ?>
                                                    <tr>
                                                        <td><?php echo $data->nim ?></td>
                                                        <td><?php echo $data->nama ?></td>
                                                        <td><?php echo $data->kelas ?></td>
                                                        <td><?php echo $data->jurusan ?></td>
                                                        <td><?php echo $data->semester ?></td>
                                                        <td><?php echo $data->jumlah_tunggakan ?></td>
                                                    </tr>

                                                <?php
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /# card -->
                        </div>
                        <!-- /# column -->
                    </div>
                    <!-- /# row -->

                    <div class="row">
                        <div class="col-lg-12">
                           
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

</body>

</html>
<body>
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">

                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-title">
                                    <h4>Daftar Pembangunan </h4>

                                </div>
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="row-select" class="display table table-borderd table-hover">
                                            <thead>
                                                <tr>
                                                    <th>ID Pembangunan</th>
                                                    <th>Kelas</th>
                                                    <th>Tahun</th>
                                                    <th>Pembangunan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php foreach ($data_pembangunan as $data) { ?>
                                                    <tr>
                                                        <td><?php echo $data->id_pembangunan ?></td>
                                                        <td><?php echo $data->kelas ?></td>
                                                        <td><?php echo $data->tahun ?></td>
                                                        <td><?php echo $data->pembangunan ?></td>
                                                        <td>
                                                            <a href="<?php echo base_url('edit_pembangunan/' . $data->id_pembangunan) ?>">
                                                                <button type="button" class="btn btn-primary m-b-10 m-l-5">Edit</button>
                                                            </a> || <a href="<?php echo base_url('delete_pembangunan/' . $data->id_pembangunan) ?>">
                                                                <button type="button" class="btn btn-danger m-b-10 m-l-5">Delete</button>
                                                            </a>
                                                        </td>
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
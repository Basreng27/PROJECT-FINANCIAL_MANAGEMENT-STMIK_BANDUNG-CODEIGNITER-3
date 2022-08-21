<body>
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">

                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-title">
                                    <h4>Daftar Beasiswa </h4>

                                </div>
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="row-select" class="display table table-borderd table-hover">
                                            <thead>
                                                <tr>
                                                    <th>ID Beasiswa</th>
                                                    <th>Nama Beasiswa</th>
                                                    <th>Nominal Beasiswa</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php foreach ($data_beasiswa as $data) { ?>
                                                    <tr>
                                                        <td><?php echo $data->id_beasiswa ?></td>
                                                        <td><?php echo $data->nama_beasiswa ?></td>
                                                        <td><?php echo $data->nominal_beasiswa ?></td>
                                                        <td>
                                                            <a href="<?php echo base_url('edit_beasiswa/' . $data->id_beasiswa) ?>">
                                                                <button type="button" class="btn btn-primary m-b-10 m-l-5">Edit</button>
                                                            </a> || <a href="<?php echo base_url('delete_beasiswa/' . $data->id_beasiswa) ?>">
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
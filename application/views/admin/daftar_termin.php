<body>
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">

                <section id="main-content">
                    <div class="card-body">
                        <div class="col-lg-6>
                            <div class=" card">
                            <div class="card-title">
                                <h4>Daftar Termin </h4>

                            </div>
                            <div class="bootstrap-data-table-panel">
                                <div class="table-responsive">
                                    <table id="row" class="display table table-borderd table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID Termin</th>
                                                <th>Kelas</th>
                                                <th>Tahun</th>
                                                <th>Termin Ke</th>
                                                <th>Nominal Termin</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php foreach ($data_termin as $data) { ?>
                                                <tr>
                                                    <td><?php echo $data->id_termin ?></td>
                                                    <td><?php echo $data->kelas ?></td>
                                                    <td><?php echo $data->tahun ?></td>
                                                    <td><?php echo $data->termin_ke ?></td>
                                                    <td><?php echo $data->termin ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url('edit_termin/' . $data->id_termin) ?>">
                                                            <button type="button" class="btn btn-primary m-b-10 m-l-5">Edit</button>
                                                        </a> || <a href="<?php echo base_url('delete_termin/' . $data->id_termin) ?>">
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
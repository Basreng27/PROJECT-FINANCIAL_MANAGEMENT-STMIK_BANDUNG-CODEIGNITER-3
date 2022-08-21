<body>
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">

                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-title">
                                    <h4>Next Termin </h4>

                                </div>
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="row-select" class="display table table-borderd table-hover">
                                            <thead>
                                                <tr>
                                                    <th>ID Tunggakan</th>
                                                    <th>NIM</th>
                                                    <th>Jumlah Tunggakan</th>
                                                    <th>Termin Ke</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php foreach ($datat as $data) { ?>
                                                    <tr>
                                                        <td><?php echo $data->id_tunggakan ?></td>
                                                        <td><?php echo $data->nim ?></td>
                                                        <td><?php echo $data->jumlah_tunggakan ?></td>
                                                        <td><?php echo $data->termin_ke ?></td>
                                                        <td><?php if ($data->jumlah_tunggakan > 0) { ?>
                                                                <button type="button" class="btn btn-danger m-b-10 m-l-5">Lunasi Pembayaran</button>
                                                            <?php } else { ?>
                                                                <a href="<?php echo base_url('upgrade_termin/' . $data->id_tunggakan) ?>">
                                                                    <button type="button" class="btn btn-primary m-b-10 m-l-5">Upgrade Termin</button>
                                                                </a>
                                                            <?php } ?>
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
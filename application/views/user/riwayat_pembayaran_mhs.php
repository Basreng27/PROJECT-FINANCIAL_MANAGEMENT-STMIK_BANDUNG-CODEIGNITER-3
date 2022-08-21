<body>
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">

                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-title">
                                    <h4>Riwayat Pembayaran Mahasiswa</h4>

                                </div>
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="row-select" class="display table table-borderd table-hover">
                                            <thead>
                                                <tr>
                                                    <th>NIM</th>
                                                    <th>Semester</th>
                                                    <th>Tahun Ajaran</th>
                                                    <th>Tahun Akademik</th>
                                                    <th>Angkatan</th>
                                                    <th>Bukti Pembayaran</th>
                                                    <th>Bukti Pembayaran Pembangunan</th>
                                                    <th>Yang Dibayarkan Menggunakan Beasisswa</th>
                                                    <th>Yang Dibayarkan Menggunakan Sisa Pembayaran</th>

                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php foreach ($riwayat_mhs as $data) { ?>
                                                    <tr>
                                                        <td><?php echo $data->nim ?></td>
                                                        <td><?php echo $data->semester ?></td>
                                                        <td><?php echo $data->ta ?></td>
                                                        <td><?php echo $data->tak ?></td>
                                                        <td><?php echo $data->angkatan ?></td>
                                                        <td>
                                                            <?php
                                                            echo "<img src='" . base_url("bukti pembayaran/" . $data->bukti_pembayaran) . "' width='100' height='100'>";
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            echo "<img src='" . base_url("bukti pembayaran pembangunan/" . $data->bukti_pembayaran_pembangunan) . "' width='100' height='100'>";
                                                            ?>
                                                        </td>
                                                        <td><?php echo $data->bukti_pembayaran_beasiswa ?></td>
                                                        <td><?php echo $data->bukti_pembayaran_sisa ?></td>
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
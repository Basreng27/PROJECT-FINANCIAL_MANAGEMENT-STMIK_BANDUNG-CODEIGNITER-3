<body>
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">

                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-title">
                                    <h4>Approve Pembayaran </h4>

                                </div>
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="row-select" class="display table table-borderd table-hover">
                                            <thead>
                                                <tr>
                                                    <th>NIM</th>
                                                    <th>Nama</th>
                                                    <th>Kelas</th>
                                                    <th>Tanggal Pembayaran</th>
                                                    <th>Tahun Ajaran</th>
                                                    <th>Tahun Akademik</th>
                                                    <th>Semester</th>
                                                    <th>Angkatan</th>
                                                    <th>Bukti Pembayaran</th>
                                                    <th>Bukti Pembayaran Pembangunan</th>
                                                    <th>Beasiswa Mahasiswa</th>
                                                    <th>Sisa Pembayaran Mahasiswa</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php foreach ($approve_pembayaran as $data) { ?>
                                                    <tr>
                                                        <td><?php echo $data->nim ?></td>
                                                        <td><?php echo $data->nama ?></td>
                                                        <td><?php echo $data->kelas ?></td>
                                                        <td><?php echo $data->tanggal_pembayaran ?></td>
                                                        <td><?php echo $data->ta ?></td>
                                                        <td><?php echo $data->tak ?></td>
                                                        <td><?php echo $data->semester ?></td>
                                                        <td><?php echo $data->angkatan ?></td>
                                                        <td>
                                                            <?php
                                                            echo "<img src='" . base_url("bukti pembayaran/" . $data->bukti_pembayaran) . "' width='100' height='100' alt='Tidak Ada Bukti Pembayaran'>";
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            echo "<img src='" . base_url("bukti pembayaran pembangunan/" . $data->bukti_pembayaran_pembangunan) . "' width='100' height='100' alt='Tidak Ada Bukti Pembayaran'>";
                                                            ?>
                                                        </td>
                                                        <td><?php echo $data->beasiswa_mahasiswa ?></td>
                                                        <td><?php echo $data->sisa_pembayaran ?></td>
                                                        <td>
                                                            <?php if ($data->bukti_pembayaran == true) { ?>
                                                                <a href="<?php echo base_url('approve_transfer/' . $data->id_approve) ?>">
                                                                    <button type="button" class="btn btn-primary m-b-10 m-l-5">Approve Via Transfer</button>
                                                                </a>
                                                            <?php
                                                            } elseif ($data->beasiswa_mahasiswa > 1) { ?>
                                                                <a href="<?php echo base_url('approve_beasiswa/' . $data->id_approve) ?>">
                                                                    <button type="button" class="btn btn-primary m-b-10 m-l-5">Approve Via Beasiswa</button>
                                                                </a>
                                                            <?php
                                                            } elseif ($data->sisa_pembayaran > 1) { ?>
                                                                <a href="<?php echo base_url('approve_sisa/' . $data->id_approve) ?>">
                                                                    <button type="button" class="btn btn-primary m-b-10 m-l-5">Approve Via Sisa Pembayaran</button>
                                                                </a>
                                                            <?php
                                                            } elseif ($data->bukti_pembayaran_pembangunan == true) { ?>
                                                                <a href="<?php echo base_url('approve_pembangunan/' . $data->id_approve) ?>">
                                                                    <button type="button" class="btn btn-primary m-b-10 m-l-5">Approve Pembangunan</button>
                                                                </a>
                                                            <?php
                                                            } ?>
                                                        </td>
                                                        <!-- <td>
                                                            <a href="<?php echo base_url('approve/' . $data->id_approve) ?>">
                                                                <button type="button" class="btn btn-primary m-b-10 m-l-5">Approve</button>
                                                            </a>
                                                        </td> -->
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
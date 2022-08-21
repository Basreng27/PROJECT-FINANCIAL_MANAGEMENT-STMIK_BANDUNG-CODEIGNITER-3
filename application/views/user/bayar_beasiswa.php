<body>
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">

                <!-- /# row -->
                <section id="main-content">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-title">
                                    <h4>Pembayaran Melalui Beasiswa</h4>

                                </div>
                                <div class="card-body">
                                    <div class="basic-elements">
                                        <!-- <?php if (isset($ada)) { ?>
                                            <div class="alert alert-danger">
                                                Data Telah Tersedia
                                            </div>
                                        <?php } else if (isset($sukses)) { ?>
                                            <div class="alert alert-primary">
                                                Data Berhasil Ditambahkan
                                            </div>
                                        <?php } ?> -->
                                        <form action="<?php echo base_url() ?>bayar_beasiswa" method="POST">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <?php
                                                    foreach ($info_beasiswa as $data) {
                                                    ?>
                                                        <div class="form-group">
                                                            <label>NIM</label>
                                                            <input type="text" class="form-control" value="<?php echo $data->nim ?>" name="nim" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Nama</label>
                                                            <input type="text" class="form-control" value="<?php echo $data->nama ?>" name="nama" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Jurusan</label>
                                                            <input type="text" class="form-control" value="<?php echo $data->jurusan ?>" name="nama" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Angkatan</label>
                                                            <input type="text" class="form-control" value="<?php echo $data->angkatan ?>" name="angkatan" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Tahun Ajaran</label>
                                                            <input type="text" class="form-control" value="<?php echo $data->ta ?>" name="ta" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Tahun Akademik</label>
                                                            <input type="text" class="form-control" value="<?php echo $data->tak ?>" name="tak" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Semester</label>
                                                            <input type="text" class="form-control" value="<?php echo $data->semester ?>" name="semester" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Kelas</label>
                                                            <input type="text" class="form-control" value="<?php echo $data->kelas ?>" name="nama" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Jumlah Beasiswa</label>
                                                            <input type="text" class="form-control" value="<?php echo $data->sisa_beasiswa ?>" name="sisa_beasiswa" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Jumlah Tunggakan</label>
                                                            <input type="text" class="form-control" value="<?php echo $data->jumlah_tunggakan ?>" name="tunggakan" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Jumlah Harus Dibayar</label>
                                                            <input type="text" class="form-control" value="<?php echo $data->termin ?>" name="termin" readonly>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>
                                                    <div class="form-group">
                                                        <label>Tanggal Pembayaran</label>
                                                        <input type="text" class="form-control" method="POST" value="<?php echo date("Y-m-d"); ?>" name="tanggal_pembayaran" readonly>
                                                    </div>

                                                    </table>
                                                    <hr>
                                                    <input type="submit" name="submit" value="Bayar" class="btn btn-primary m-b-10 m-l-5">
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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
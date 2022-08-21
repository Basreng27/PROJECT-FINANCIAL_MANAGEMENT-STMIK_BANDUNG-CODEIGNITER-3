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
                                    <h4>Informasi Pembayaran</h4>

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
                                        <form action="<?php echo base_url() ?>bayar" method="POST">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <?php
                                                    // echo "<pre>" . print_r($nama, true);
                                                    // exit(1);
                                                    foreach ($info_pembayaran as $data) {
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
                                                            <label>Kelas</label>
                                                            <input type="text" class="form-control" value="<?php echo $data->kelas ?>" name="nama" readonly>
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
                                                        <button type="submit" name="pembayaran" value="pembayaran" class="btn btn-primary m-b-10 m-l-5">Bayar Dengan Mengirim Bukti Pembayaran</button>
                                                        ||
                                                        <button type="submit" name="beasiswa" value="beasiswa" class="btn btn-success m-b-10 m-l-5">Bayar Dengan Beasiswa</button>
                                                        ||
                                                        <button type="submit" name="sisa_pembayaran" value="sisa_pembayaran" class="btn btn-primary m-b-10 m-l-5">Bayar Dengan Sisa Pembayaran</button>
                                                        ||
                                                        <button type="submit" name="pembangunan" value="pembangunan" class="btn btn-success m-b-10 m-l-5">Bayar Pembangunan</button>
                                                    </div>
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
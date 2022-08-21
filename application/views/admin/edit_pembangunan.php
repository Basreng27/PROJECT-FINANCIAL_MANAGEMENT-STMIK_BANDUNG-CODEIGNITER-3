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
                                    <h4>Edit Pembangunan</h4>

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
                                        <?php
                                        foreach ($data_pembangunan as $data) {
                                        ?>
                                            <form action="<?php echo base_url() ?>proses_edit_pembangunan" method="POST">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label>ID Pembangunan</label>
                                                            <input type="text" class="form-control" name="id_pembangunan" value="<?= $data->id_pembangunan ?>" placeholder="ID Termin" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Kelas</label>
                                                            <select class="form-control" name="kelas">
                                                                <option value="<?= $data->kelas ?>"><?= $data->kelas ?></option>
                                                                <option value="Reguler Pagi">Reguler Pagi</option>
                                                                <option value="Reguler Malam">Reguler Malam</option>
                                                                <option value="Eksekutif">Eksekutif</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Tahun</label>
                                                            <input type="number" class="form-control" name="tahun" value="<?= $data->tahun ?>" placeholder="ex. 2018" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Nominal Pembangunan</label>
                                                            <input type="number" class="form-control" name="pembangunan" value="<?= $data->pembangunan ?>" placeholder="ex. 2400000" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-primary m-b-10 m-l-5">Submit</button>
                                                        </div>
                                                    </div>
                                            </form>
                                        <?php
                                        }
                                        ?>
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
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
                                    <h4>Edit Beasiswa</h4>

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
                                        foreach ($data_beasiswa as $data) {
                                        ?>
                                            <form action="<?php echo base_url() ?>proses_edit_beasiswa" method="POST">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label>ID Beasiswa</label>
                                                            <input type="text" class="form-control" name="id_beasiswa" value="<?= $data->id_beasiswa ?>" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Nama Beasiswa</label>
                                                            <input type="text" class="form-control" name="nama_beasiswa" value="<?= $data->nama_beasiswa ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Nominal Beasiswa</label>
                                                            <input type="text" class="form-control" name="nominal_beasiswa" value="<?= $data->nominal_beasiswa ?>">
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
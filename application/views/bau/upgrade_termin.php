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
                                    <h4>Upgrade Termin</h4>

                                </div>
                                <div class="card-body">
                                    <div class="basic-elements">
                                        <form action="<?php echo base_url() ?>proses_upgrade_termin" method="POST">
                                            <?php foreach ($data_tunggak as $data) {
                                            ?>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <input type="hidden" class="form-control" name="id_tunggakan" value="<?php echo $data->id_tunggakan ?>" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>NIM</label>
                                                            <input type="text" class="form-control" name="nim" value="<?php echo $data->nim ?>" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Tahun Ajaran</label>
                                                            <select class="form-control" name="ta">
                                                                <option value="<?= $data->ta ?>"><?= $data->ta ?></option>
                                                                <option value="Ganjil">Ganjil</option>
                                                                <option value="Genap">Genap</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Tahun Akademik</label>
                                                            <select class="form-control" name="tak">
                                                                <option value="<?= $data->tak ?>"><?= $data->tak ?></option>
                                                                <option value="2018/2019">2018/2019</option>
                                                                <option value="2019/2020">2019/2020</option>
                                                                <option value="2020/2021">2020/2021</option>
                                                                <option value="2021/2022">2021/2022</option>
                                                                <option value="2022/2023">2022/2023</option>
                                                                <option value="2023/2024">2023/2024</option>
                                                                <option value="2024/2025">2024/2025</option>
                                                                <option value="2025/2026">2025/2026</option>
                                                                <option value="2026/2027">2026/2027</option>
                                                                <option value="2027/2028">2027/2028</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Semester</label>
                                                            <select class="form-control" name="semester">
                                                                <option value="<?= $data->semester ?>"><?= $data->semester ?></option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                                <option value="7">7</option>
                                                                <option value="8">8</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Jumlah Tunggakan</label>
                                                            <input type="text" class="form-control" name="jumlah_tunggakan" value="<?php echo $data->jumlah_tunggakan ?>" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>ID Termin</label>
                                                            <input type="text" class="form-control" name="id_termin" value="<?php echo $data->id_termin ?>" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Termin Ke</label>
                                                            <input type="text" class="form-control" name="termin_ke" value="<?php echo $data->termin_ke ?>" readonly>
                                                        </div>
                                                    <?php
                                                }
                                                    ?>
                                                    <div class="form-group">
                                                        <label>Termin Selanjutnya</label>
                                                        <select class="form-control" name="termin_selanjutnya">
                                                            <?php foreach ($id as $item) { ?>
                                                                <option value="<?php echo $item->id_termin ?>"><?php echo $item->id_termin ?> || <?php echo $item->termin_ke ?> || <?php echo $item->termin ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary m-b-10 m-l-5">Submit</button>
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
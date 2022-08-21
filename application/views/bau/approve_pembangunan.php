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
                                    <h4>Approve Pembangunan</h4>

                                </div>
                                <div class="card-body">
                                    <div class="basic-elements">
                                        <form action="<?php echo base_url() ?>proses_approve_pembangunan" method="POST">
                                            <?php foreach ($approve_pembangunan as $data) {
                                            ?>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <input type="hidden" class="form-control" name="id_approve" value="<?php echo $data->id_approve ?>" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>NIM</label>
                                                            <input type="text" class="form-control" name="nim" value="<?php echo $data->nim ?>" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Nama</label>
                                                            <input type="text" class="form-control" name="nama" value="<?php echo $data->nama ?>" readonly>
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
                                                            <input type="text" class="form-control" name="kelas" value="<?php echo $data->kelas ?>" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Bukti Pembayaran Pembangunan</label>
                                                            <input type="hidden" class="form-control" name="bukti_pembayaran_pembangunan" value="<?php echo $data->bukti_pembayaran_pembangunan ?>" readonly>
                                                            <td>
                                                                <?php
                                                                echo "<img src='" . base_url("bukti pembayaran pembangunan/" . $data->bukti_pembayaran_pembangunan) . "' width='100' height='100'>";
                                                                ?>
                                                            </td>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Tanggal Pembayaran</label>
                                                            <input type="text" class="form-control" name="tanggal_pembayaran" value="<?php echo $data->tanggal_pembayaran ?>" readonly>
                                                        </div>
                                                        <!-- <div class="form-group">
                                                            <label>Beasiswa Mahasiswa</label>
                                                            <input type="text" class="form-control" name="beasiswa_mahasiswa" value="<?= $data->sisa_beasiswa ?>" readonly>
                                                        </div> -->
                                                        <!-- <div class="form-group">
                                                            <label>Sisa Pembayaran Mahasiswa</label>
                                                            <input type="text" class="form-control" name="sisa_pembayaran" value="<?= $data->sisa_pembayaran ?>" readonly>
                                                        </div> -->
                                                        <!-- <div class="form-group">
                                                            <label>Jenis Pembayaran</label>
                                                            <select class="form-control" name="jenis_pembayaran">
                                                                <option value="<?php echo $data->id_termin ?>"><?php echo $data->id_termin ?> || <?php echo $data->termin ?></option>
                                                                <option value="jumlah_lannya">Jumlah Lainnya</option>
                                                            </select>
                                                        </div> -->
                                                        <!-- <div class="form-group">
                                                            <label>Jenis Pembayaran</label>
                                                            <input type="text" class="form-control" name="jenis_pembayaran" value="<?php echo $data->id_termin ?>" readonly>
                                                            <input type="text" class="form-control" name="nominal" value="<?php echo $data->termin ?>" readonly>
                                                        </div> -->
                                                        <!-- <div class="form-group">
                                                            <label>Pembayaran Termin</label>
                                                            <select class="form-control" name="termin">
                                                                <option value="<?php echo $data->id_termin ?>"><?php echo $data->id_termin ?></option>
                                                            </select>
                                                        </div> -->
                                                        <!-- <div class="form-group">
                                                            <label>Pembayaran</label>
                                                            <select class="form-control" name="pembayaran">
                                                                <option value="<?php echo $data->id_termin ?>"><?php echo $data->id_termin ?> || <?php echo $data->termin ?></option>
                                                                <option value="lainnya">Jumlah Lainnya</option>
                                                            </select>
                                                        </div> -->
                                                        <div class="form-group">
                                                            <label>Jumlah Lainnya</label>
                                                            <input type="text" class="form-control" name="jumlah_lain" placeholder="Masukan Jumlah lain(*Wajib diisi untuk pembayaran lainnya">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input type="email" class="form-control" name="email" readonly value="<?php echo $data->email ?>">
                                                        </div>
                                                    <?php
                                                }
                                                    ?>
                                                    <!-- <div class="form-group">
                                                        <label>Termin Selanjutnya</label>
                                                        <select class="form-control" name="termin_selanjutnya">
                                                            <?php foreach ($data_termin as $item) { ?>
                                                                <option value="<?php echo $item->id_termin ?>"><?php echo $item->id_termin ?> || <?php echo $item->kelas ?> </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div> -->
                                                    <div class="form-group">
                                                        <label>Tanggal Approve</label>
                                                        <input type="text" class="form-control" name="tanggal_approve" value="<?php echo date("Y-m-d"); ?>" readonly>
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
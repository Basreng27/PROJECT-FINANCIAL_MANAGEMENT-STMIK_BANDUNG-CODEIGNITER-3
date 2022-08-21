<body>
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">

                <!-- /# row -->
                <section id="main-content">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-title d-flex justify-content-between">
                                    <h4>Tambah Mahasiswa</h4>
									<a class="text-success" href="<?=base_url('tambah_mahasiswa/import_csv')?>">Import Csv</a>
                                </div>
                                <div class="card-body">
                                    <div class="basic-elements">
                                        <?php if (isset($ada)) { ?>
                                            <div class="alert alert-danger">
                                                Data Telah Tersedia
                                            </div>
                                        <?php } else if (isset($sukses)) { ?>
                                            <div class="alert alert-primary">
                                                Data Berhasil Ditambahkan
                                            </div>
                                        <?php } ?>
                                        <form action="<?php echo base_url() ?>proses_tambah_mahasiswa" method="POST">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label>NIM</label>
                                                        <input type="text" class="form-control" name="nim" placeholder="Masukan NIM">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Nama</label>
                                                        <input type="text" class="form-control" placeholder="Masukan Nama" name="nama">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Jurusan</label>
                                                        <select class="form-control" name="jurusan">
                                                            <option value="Teknik Informatika">Tenik Informatika</option>
                                                            <option value="Sistem Informasi">Sistem Informasi</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Kelas</label>
                                                        <select class="form-control" name="kelas">
                                                            <option value="Reguler Pagi">Reguler Pagi</option>
                                                            <option value="Reguler Malam">Reguler Malam</option>
                                                            <option value="Eksekutif">Eksekutif</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Angkatan</label>
                                                        <input type="number" class="form-control" placeholder="ex. 2018" name="angkatan">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Tahun Akademik</label>
                                                        <select class="form-control" name="tak">
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
                                                        <label>Tahun Ajaran</label>
                                                        <select class="form-control" name="ta">
                                                            <option value="Ganjil">Ganjil</option>
                                                            <option value="Genap">Genap</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="email" class="form-control" placeholder="xxx@gmail.com" name="email">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Semester</label>
                                                        <select class="form-control" name="semester">
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
                                                        <label>Termin</label>
                                                        <select class="form-control" name="id_termin">
                                                            <?php foreach ($data_termin as $data) { ?>
                                                                <option value="<?= $data->id_termin ?>"><?= $data->id_termin ?> || <?= $data->kelas ?> || <?= $data->tahun ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Pembangunan</label>
                                                        <select class="form-control" name="id_pembangunan">
                                                            <?php foreach ($data_pembangunan as $data) { ?>
                                                                <option value="<?= $data->id_pembangunan ?>"><?= $data->id_pembangunan ?> || <?= $data->kelas ?> || <?= $data->tahun ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Beasiswa</label>
                                                        <select class="form-control" name="id_beasiswa">
                                                            <?php foreach ($data_beasiswa as $data) { ?>
                                                                <option value="<?= $data->id_beasiswa ?>"><?= $data->id_beasiswa ?> || <?= $data->nama_beasiswa ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
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

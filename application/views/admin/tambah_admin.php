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
                                    <h4>Tambah Admin</h4>
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
                                        <form action="<?php echo base_url() ?>proses_tambah_admin" method="POST">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label>Username</label>
                                                        <input type="text" class="form-control" name="username" placeholder="Masukan Username" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input type="text" class="form-control" name="password" placeholder="Masukan Password" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Level</label>
                                                        <select class="form-control" name="level">
                                                            <option value="1">Admin</option>
                                                            <option value="3">BAU</option>
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
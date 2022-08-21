<body>
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">

                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-title">
                                    <h4>Daftar Admin </h4>

                                </div>
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="row-select" class="display table table-borderd table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Username</th>
                                                    <th>Password</th>
                                                    <th>Level</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php foreach ($data_akun as $data) { ?>
                                                    <tr>
                                                        <td><?php echo $data->username ?></td>
                                                        <td><?php echo $data->password ?></td>
                                                        <td><?php echo $data->level ?></td>
                                                        <td><a href="<?php echo base_url('delete_admin/' . $data->username) ?>">
                                                                <button type="button" class="btn btn-danger m-b-10 m-l-5">Delete</button>
                                                            </a>
                                                        </td>
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
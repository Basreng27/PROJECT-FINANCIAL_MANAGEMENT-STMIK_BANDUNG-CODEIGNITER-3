<body>
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">

                <!-- /# row -->
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><img src="assets/images/idr.png">
                                    </div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Tunggakan yang harus di bayar</div>
                                        <div class="stat-digit">
                                            <?php
                                            foreach ($tunggakan as $data) {
                                                echo $data->jumlah_tunggakan;
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><img src="assets/images/idr.png">
                                    </div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Tunggakan Pembangunan</div>
                                        <div class="stat-digit">
                                            <?php
                                            foreach ($tunggakan as $data) {
                                                echo $data->tunggakan_pembangunan;
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><img src="assets/images/idr.png">
                                    </div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Sisa Beasiswa</div>
                                        <div class="stat-digit">
                                            <?php
                                            foreach ($sisa as $data) {
                                                echo $data->sisa_beasiswa;
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><img src="assets/images/idr.png">
                                    </div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Sisa Pembayaran</div>
                                        <div class="stat-digit">
                                            <?php
                                            foreach ($sisa as $data) {
                                                echo $data->sisa_pembayaran;
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                           
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
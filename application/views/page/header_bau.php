<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>STMIK Bandung</title>
    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">
    <!-- Styles -->
    <link href="<?php echo base_url(); ?>assets/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/lib/chartist/chartist.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/lib/weather-icons.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/lib/helper.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">


</head>


<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
    <div class="nano">
        <div class="nano-content">
            <ul>
                <div class="logo"><a href="#">
                        <!-- <img src="assets/images/logo.png" alt="" /> --><img src="assets/images/logosidebar.png">
                    </a></div>
                <li class="label">Main</li>
                <li><a href="<?php echo base_url() ?>home_bau"><i class="ti-calendar"></i>Dashboard </a></li>
                <!-- <li><a class="sidebar-sub-toggle"><i class="ti-user"></i>Mahasiswa <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                <ul>
                    <li><a href="<?php echo base_url() ?>tambah_mahasiswa">Tambah Mahasiswa</a></li>
                        <li><a href="<?php echo base_url() ?>mahasiswa_pagi">Mahasiswa Pagi </a></li>
                        <li><a href="<?php echo base_url() ?>mahasiswa_malam">Mahasiswa Malam </a></li>
                        <li><a href="<?php echo base_url() ?>mahasiswa_eksekutif">Mahasiswa Eksekutif</a></li>
                    </ul>
                </li> -->

                <!-- <li><a class="sidebar-sub-toggle"><i class="ti-money"></i>Termin <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="<?php echo base_url() ?>tambah_termin">Tambah Termin</a></li>
                        <li><a href="<?php echo base_url() ?>daftar_termin">Daftar Termin </a></li>
                    </ul>
                </li> -->

                <!-- <li><a class="sidebar-sub-toggle"><i class="ti-gift"></i>Beasiswa <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="<?php echo base_url() ?>tambah_beasiswa">Tambah Beasiswa</a></li>
                        <li><a href="<?php echo base_url() ?>daftar_beasiswa">Daftar Beasiswa </a></li>
                    </ul>
                </li> -->

                <li><a href="<?php echo base_url() ?>approve_pembayaran"><i class="ti-email"></i> Approve Pembayaran </a></li>
                <li><a href="<?php echo base_url() ?>riwayat_pembayaran"><i class="ti-clipboard"></i> Riwayat Pembayaran</a></li>
                <li><a href="<?php echo base_url() ?>next_termin"><i class="ti-calendar"></i>Next Termin </a></li>

                <li class="label">Extra</li>
                <li><a href="<?php echo base_url() ?>logout"><i class="ti-close"></i> Logout</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- /# sidebar -->

<div class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="float-left">
                    <div class="hamburger sidebar-toggle">
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                    </div>
                </div>
                <div class="float-right">
                    <div class="dropdown dib">
                        <div class="header-icon" data-toggle="dropdown">
                            <i class=""></i>
                            <div class="drop-down dropdown-menu dropdown-menu-right">
                                <div class="dropdown-content-heading">
                                    <span class="text-left">Recent Notifications</span>
                                </div>
                                <div class="dropdown-content-body">
                                    <ul>
                                        <?php $get_all_approve = $this->M_admin->get_all_approve()->result(); ?>

                                        <li>
                                            <a href="#">
                                                <img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/3.jpg" alt="" />
                                                <div class="notification-content">
                                                    <small class="notification-timestamp pull-right">02:34
                                                        PM</small>
                                                    <div class="notification-heading">Mr. John</div>
                                                    <div class="notification-text">5 members joined today </div>
                                                </div>
                                            </a>
                                        </li>

                                        <li class="text-center">
                                            <a href="#" class="more-link">See All</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="dropdown dib">
                        <div class="header-icon" data-toggle="dropdown">
                            <span class="user-avatar"><?php echo $this->session->userdata('username') ?>

                            </span>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
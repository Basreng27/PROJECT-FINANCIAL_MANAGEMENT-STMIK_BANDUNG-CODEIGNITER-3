<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Login/login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//login
$route['cek_login'] = 'Login/cek_login';
$route['login'] = 'Login/login';
$route['logout'] = 'Login/logout';
$route['test-email'] = 'TestEmail/kontol';

//admin
//home
$route['home_admin'] = 'Admin/home_admin';
//admin
$route['tambah_admin'] = 'Admin/tambah_admin';
$route['proses_tambah_admin'] = 'Admin/proses_tambah_admin';
$route['daftar_admin'] = 'Admin/daftar_admin';
$route['delete_admin'] = 'Admin/delete_admin';
$route['delete_admin/(:any)'] = 'Admin/delete_admin/$1';
//mahasiswa
$route['tambah_mahasiswa'] = 'Admin/tambah_mahasiswa';
$route['tambah_mahasiswa/import_csv'] = 'Admin/tambah_mahasiswa_csv';
$route['tambah_mahasiswa/import_csv/proses'] = 'Admin/proses_csv';
$route['proses_tambah_mahasiswa'] = 'Admin/proses_tambah_mahasiswa';
$route['mahasiswa_pagi'] = 'Admin/mahasiswa_pagi';
$route['mahasiswa_malam'] = 'Admin/mahasiswa_malam';
$route['mahasiswa_eksekutif'] = 'Admin/mahasiswa_eksekutif';
//termin
$route['tambah_termin'] = 'Admin/tambah_termin';
$route['daftar_termin'] = 'Admin/daftar_termin';
$route['proses_tambah_termin'] = 'Admin/proses_tambah_termin';
$route['edit_termin'] = 'Admin/edit_termin';
$route['edit_termin/(:any)'] = 'Admin/edit_termin/$1';
$route['proses_edit_termin'] = 'Admin/proses_edit_termin';
$route['delete_termin'] = 'Admin/delete_termin';
$route['delete_termin/(:any)'] = 'Admin/delete_termin/$1';
//beasiswa
$route['tambah_beasiswa'] = 'Admin/tambah_beasiswa';
$route['daftar_beasiswa'] = 'Admin/daftar_beasiswa';
$route['proses_tambah_beasiswa'] = 'Admin/proses_tambah_beasiswa';
$route['edit_beasiswa'] = 'Admin/edit_beasiswa';
$route['edit_beasiswa/(:any)'] = 'Admin/edit_beasiswa/$1';
$route['proses_edit_beasiswa'] = 'Admin/proses_edit_beasiswa';
$route['delete_beasiswa'] = 'Admin/delete_beasiswa';
$route['delete_beasiswa/(:any)'] = 'Admin/delete_beasiswa/$1';
//pembangunan
$route['tambah_pembangunan'] = 'Admin/tambah_pembangunan';
$route['daftar_pembangunan'] = 'Admin/daftar_pembangunan';
$route['proses_tambah_pembangunan'] = 'Admin/proses_tambah_pembangunan';
$route['edit_pembangunan'] = 'Admin/edit_pembangunan';
$route['edit_pembangunan/(:any)'] = 'Admin/edit_pembangunan/$1';
$route['proses_edit_pembangunan'] = 'Admin/proses_edit_pembangunan';
$route['delete_pembangunan'] = 'Admin/delete_pembangunan';
$route['delete_pembangunan/(:any)'] = 'Admin/delete_pembangunan/$1';

//user
$route['home_user'] = 'User/home_user';
$route['informasi_pembayaran'] = 'User/informasi_pembayaran';
$route['bayar'] = 'User/bayar';
$route['upload'] = 'User/upload';
$route['bayar_berhasil'] = 'User/bayar_berhasil';
$route['bayar_gagal'] = 'User/bayar_gagal';
$route['sisa_pembayaran'] = 'User/sisa_pembayaran';
$route['bayar_beasiswa'] = 'User/bayar_beasiswa';
$route['bayar_pembangunan'] = 'User/bayar_pembangunan';
$route['riwayat_pembayaran_mhs'] = 'User/riwayat_pembayaran_mhs';

//bau
$route['home_bau'] = 'Bau/home_bau';
$route['next_termin'] = 'Bau/next_termin';
$route['upgrade_termin'] = 'Bau/upgrade_termin';
$route['upgrade_termin/(:any)'] = 'bau/upgrade_termin/$1';
$route['proses_upgrade_termin'] = 'bau/proses_upgrade_termin';
//approve
$route['approve_pembayaran'] = 'Bau/approve_pembayaran';
$route['approve'] = 'Bau/approve';
$route['approve/(:any)'] = 'bau/approve/$1';
$route['proses_approve'] = 'bau/proses_approve';
$route['riwayat_pembayaran'] = 'bau/riwayat_pembayaran';
$route['approve_transfer'] = 'bau/approve_transfer';
$route['approve_transfer/(:any)'] = 'bau/approve_transfer/$1';
$route['proses_approve_transfer'] = 'bau/proses_approve_transfer';
$route['approve_beasiswa'] = 'bau/approve_beasiswa';
$route['approve_beasiswa/(:any)'] = 'bau/approve_beasiswa/$1';
$route['proses_approve_beasiswa'] = 'bau/proses_approve_beasiswa';
$route['approve_sisa'] = 'bau/approve_sisa';
$route['approve_sisa/(:any)'] = 'bau/approve_sisa/$1';
$route['proses_approve_sisa'] = 'bau/proses_approve_sisa';
$route['approve_pembangunan'] = 'bau/approve_pembangunan';
$route['approve_pembangunan/(:any)'] = 'bau/approve_pembangunan/$1';
$route['proses_approve_pembangunan'] = 'bau/proses_approve_pembangunan';

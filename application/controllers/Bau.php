<?php

use PHPMailer\PHPMailer\PHPMailer;

defined('BASEPATH') or exit('No direct script access allowed');

class Bau extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
        $this->load->model('M_admin');
        $this->load->model('M_login');
        $this->load->model('M_user');
        require APPPATH . 'libraries/phpmailer/src/Exception.php';
        require APPPATH . 'libraries/phpmailer/src/PHPMailer.php';
        require APPPATH . 'libraries/phpmailer/src/SMTP.php';
    }

    public function home_bau()
    {
        if ($this->session->userdata('status') != "login") {
            redirect(base_url('login'));
        } else {
            if ($this->session->userdata('level') == "1") {
                redirect(base_url('home_admin'));
            } elseif ($this->session->userdata('level') == "2") {
                redirect(base_url('home_user'));
            }
        }

        $data['jumlah_approve'] = $this->M_admin->get_all_approve()->num_rows();

        $this->load->view('page/header_bau');
        $this->load->view('bau/home_bau', $data);
        $this->load->view('page/footer');
    }

    public function next_termin()
    {
        if ($this->session->userdata('status') != "login") {
            redirect(base_url('login'));
        } else {
            if ($this->session->userdata('level') == "1") {
                redirect(base_url('home_admin'));
            } elseif ($this->session->userdata('level') == "2") {
                redirect(base_url('home_user'));
            }
        }

        $data['datat'] = $this->M_admin->get_all_tungg()->result();

        $this->load->view('page/header_bau');
        $this->load->view('bau/next_termin', $data);
        $this->load->view('page/footer');
    }

    public function upgrade_termin()
    {
        if ($this->session->userdata('status') != "login") {
            redirect(base_url('login'));
        } else {
            if ($this->session->userdata('level') == "1") {
                redirect(base_url('home_admin'));
            } elseif ($this->session->userdata('level') == "2") {
                redirect(base_url('home_user'));
            }
        }

        $id_tunggak = $this->uri->segment(2);
        $new_id = str_replace('%20', ' ', $id_tunggak);

        $data['data_tunggak'] = $this->M_admin->get_data_tunggak_mhs($new_id)->result();
        $get_nim = $this->M_admin->get_termin_next($new_id)->row();
        $kelas = $get_nim->kelas;

        $data['id'] = $this->M_admin->get_all_termin_kelas($kelas)->result();
        // echo "<pre>" . print_r($data, true);
        // exit(1);

        $this->load->view('page/header_bau');
        $this->load->view('bau/upgrade_termin', $data);
        $this->load->view('page/footer');
    }

    public function approve_pembayaran()
    {
        if ($this->session->userdata('status') != "login") {
            redirect(base_url('login'));
        } else {
            if ($this->session->userdata('level') == "1") {
                redirect(base_url('home_admin'));
            } elseif ($this->session->userdata('level') == "2") {
                redirect(base_url('home_user'));
            }
        }
        $data['approve_pembayaran'] = $this->M_admin->get_all_approve()->result();

        $this->load->view('page/header_bau');
        $this->load->view('bau/approve_pembayaran', $data);
        $this->load->view('page/footer');
    }

    public function approve_pembangunan()
    {
        if ($this->session->userdata('status') != "login") {
            redirect(base_url('login'));
        } else {
            if ($this->session->userdata('level') == "1") {
                redirect(base_url('home_admin'));
            } elseif ($this->session->userdata('level') == "2") {
                redirect(base_url('home_user'));
            }
        }
        $data['approve_pembangunan'] = $this->M_admin->get_all_approve()->result();

        $this->load->view('page/header_bau');
        $this->load->view('bau/approve_pembangunan', $data);
        $this->load->view('page/footer');
    }

    public function approve_transfer()
    {
        if ($this->session->userdata('status') != "login") {
            redirect(base_url('login'));
        } else {
            if ($this->session->userdata('level') == "1") {
                redirect(base_url('home_admin'));
            } elseif ($this->session->userdata('level') == "2") {
                redirect(base_url('home_user'));
            }
        }

        $id_approve = $this->uri->segment(2);
        $new_id = str_replace('%20', ' ', $id_approve);

        $data['data_approve'] = $this->M_admin->get_data_approve($new_id)->result();
        $get_nim = $this->M_admin->get_data_approve($new_id)->row();
        $kelas = $get_nim->kelas;

        $data['data_termin'] = $this->M_admin->get_all_termin_kelas($kelas)->result();

        $this->load->view('page/header_bau');
        $this->load->view('bau/approve_transfer', $data);
        $this->load->view('page/footer');
    }

    public function approve_beasiswa()
    {
        if ($this->session->userdata('status') != "login") {
            redirect(base_url('login'));
        } else {
            if ($this->session->userdata('level') == "1") {
                redirect(base_url('home_admin'));
            } elseif ($this->session->userdata('level') == "2") {
                redirect(base_url('home_user'));
            }
        }

        $id_approve = $this->uri->segment(2);
        $new_id = str_replace('%20', ' ', $id_approve);

        $data['data_approve'] = $this->M_admin->get_data_approve($new_id)->result();
        $get_nim = $this->M_admin->get_data_approve($new_id)->row();
        $kelas = $get_nim->kelas;

        $data['data_termin'] = $this->M_admin->get_all_termin_kelas($kelas)->result();

        $this->load->view('page/header_bau');
        $this->load->view('bau/approve_beasiswa', $data);
        $this->load->view('page/footer');
    }

    public function approve_sisa()
    {
        if ($this->session->userdata('status') != "login") {
            redirect(base_url('login'));
        } else {
            if ($this->session->userdata('level') == "1") {
                redirect(base_url('home_admin'));
            } elseif ($this->session->userdata('level') == "2") {
                redirect(base_url('home_user'));
            }
        }

        $id_approve = $this->uri->segment(2);
        $new_id = str_replace('%20', ' ', $id_approve);

        $data['data_approve'] = $this->M_admin->get_data_approve($new_id)->result();
        $get_nim = $this->M_admin->get_data_approve($new_id)->row();
        $kelas = $get_nim->kelas;

        $data['data_termin'] = $this->M_admin->get_all_termin_kelas($kelas)->result();

        $this->load->view('page/header_bau');
        $this->load->view('bau/approve_sisa', $data);
        $this->load->view('page/footer');
    }

    // public function approve()
    // {
    //     if ($this->session->userdata('status') != "login") {
    //         redirect(base_url('login'));
    //     } else {
    //         if ($this->session->userdata('level') == "1") {
    //             redirect(base_url('home_admin'));
    //         } elseif ($this->session->userdata('level') == "2") {
    //             redirect(base_url('home_user'));
    //         }
    //     }

    //     $id_approve = $this->uri->segment(2);
    //     $new_id = str_replace('%20', ' ', $id_approve);

    //     $data['data_approve'] = $this->M_admin->get_data_approve($new_id)->result();
    //     $get_nim = $this->M_admin->get_data_approve($new_id)->row();
    //     $kelas = $get_nim->kelas;

    //     $data['data_termin'] = $this->M_admin->get_all_termin_kelas($kelas)->result();

    //     $this->load->view('page/header_bau');
    //     $this->load->view('bau/approve', $data);
    //     $this->load->view('page/footer');
    // }

    public function proses_upgrade_termin()
    {
        $id_tunggakan = $this->input->post('id_tunggakan');
        // $jumlah_tunggakan = $this->input->post('jumlah_tunggakan');
        // $id_termin = $this->input->post('id_termin');
        // $termin_ke = $this->input->post('termin_ke');
        $termin_selanjutnya = $this->input->post('termin_selanjutnya');
        $ta = $this->input->post('ta');
        $tak = $this->input->post('tak');
        $semester = $this->input->post('semester');
        $nim = $this->input->post('nim');

        $isi_termin = $this->M_admin->isi_termin($termin_selanjutnya)->row();
        $data_ = array(
            'ta' => $ta,
            'tak' => $tak,
            'nim' => $nim,
            'semester' => $semester
        );

        $next_term = array(
            'id_tunggakan' => $id_tunggakan,
            'id' => $isi_termin->id_termin,
            'tunggakan' => $isi_termin->termin
        );
        // echo "<pre>" . print_r($next_term, true);
        // exit(1);
        $this->M_admin->update_next_tunggakan($next_term);
        $this->M_admin->update_mhs($data_);

        redirect('next_termin');
    }

    public function proses_approve_pembangunan()
    {
        $id_approve = $this->input->post('id_approve');
        $nim = $this->input->post('nim');
        $bukti_pembayaran_pembangunan = $this->input->post('bukti_pembayaran_pembangunan');
        $tanggal_pembayaran = $this->input->post('tanggal_pembayaran');
        // $pembayaran = $this->input->post('pembayaran');
        $jumlah_lain = $this->input->post('jumlah_lain');
        $tanggal_approve = $this->input->post('tanggal_approve');
        // $jenis_pembayaran = $this->input->post('jenis_pembayaran');
        $semester = $this->input->post('semester');
        $angkatan = $this->input->post('angkatan');
        $email = $this->input->post('email');
        $ta = $this->input->post('ta');
        $tak = $this->input->post('tak');
        $nama = $this->input->post('nama');

        $data_riwayat  = array(
            'nim' => $nim,
            'bukti_pembayaran_pembangunan' => $bukti_pembayaran_pembangunan,
            'tanggal_pembayaran' => $tanggal_pembayaran,
            'semester' => $semester,
            'angkatan' => $angkatan,
            'ta' => $ta,
            'tak' => $tak,
            'tanggal_approve' => $tanggal_approve
        );

        $data_email = array(
            'email' => $email,
            'nim' => $nim,
            'nama' => $nama,
            'tanggal_pembayaran' => $tanggal_pembayaran,
            'tanggal_approve' => $tanggal_approve,
            'semester' => $semester,
            'angkatan' => $angkatan,
            'yang_dibayarkan' => $jumlah_lain,
            'ta' => $ta,
            'tak' => $tak,
            'jenis_pembayaran' => 'Pembayaran Pembangunan',
        );

        // if ($pembayaran == 'lainnya') {
        $jml = $jumlah_lain;
        // $nilai_termin = $this->M_admin->get_data_nominal_termin($jenis_pembayaran)->row();
        // $nominal_termin = $nilai_termin->termin;

        $tung = $this->M_admin->get_tung($nim)->row();
        $tunggak_pembangunan = $tung->tunggakan_pembangunan;

        $lebih = 0;
        $kurang = 0;
        if ($tunggak_pembangunan > $jml) {
            $kurang =  $tunggak_pembangunan - $jml;
        } elseif ($tunggak_pembangunan < $jml) {
            $lebih = $jml - $tunggak_pembangunan;
        }

        $sis_pem = $this->M_admin->sisa_pembayaran($nim)->row();
        $sis_pemb = $sis_pem->sisa_pembayaran;
        $total = $lebih + $sis_pemb;
        // echo "<pre>" . print_r($bukti_pembayaran_pembangunan, true);
        // exit(1);

        $this->M_admin->update_sisa_pembayaran($nim, $total);
        $this->M_admin->update_tunggakan_pembanguanan($kurang, $nim);
        $this->M_admin->simpan_riwayat_pembangunan($data_riwayat);
        $this->M_admin->delete_approve_riwayat($id_approve);
        $this->send($data_email);

        redirect('approve_pembayaran');
        // } else {
        // $nilai_termin = $this->M_admin->get_data_nominal_termin($jenis_pembayaran)->row();
        // $nominal_termin = $nilai_termin->termin;

        // $tung = $this->M_admin->get_tung($nim)->row();
        // $tunggak = $tung->jumlah_tunggakan;

        // $lebih = 0;
        // $kurang = 0;
        // if ($tunggak > $nominal_termin) {
        //     $kurang =  $tunggak - $nominal_termin;
        // } elseif ($tunggak < $nominal_termin) {
        //     $lebih = $nominal_termin - $tunggak;
        // }

        // $sis_pem = $this->M_admin->sisa_pembayaran($nim)->row();
        // $sis_pemb = $sis_pem->sisa_pembayaran;
        // $total = $lebih + $sis_pemb;

        // $this->M_admin->update_sisa_pembayaran($nim, $total);
        // $this->M_admin->update_tunggakan($kurang, $nim);
        // $this->M_admin->simpan_riwayat($data_riwayat);
        // $this->M_admin->delete_approve_riwayat($id_approve);
        // // $this->send($data_email);

        // redirect('approve_pembayaran');
        // }
    }

    public function proses_approve_transfer()
    {
        $id_approve = $this->input->post('id_approve');
        $nim = $this->input->post('nim');
        $nama = $this->input->post('nama');
        $bukti_pembayaran = $this->input->post('bukti_pembayaran');
        $tanggal_pembayaran = $this->input->post('tanggal_pembayaran');
        $pembayaran = $this->input->post('pembayaran');
        $jumlah_lain = $this->input->post('jumlah_lain');
        $tanggal_approve = $this->input->post('tanggal_approve');
        $jenis_pembayaran = $this->input->post('jenis_pembayaran');
        $semester = $this->input->post('semester');
        $angkatan = $this->input->post('angkatan');
        $email = $this->input->post('email');
        $ta = $this->input->post('ta');
        $tak = $this->input->post('tak');

        $data_riwayat  = array(
            'nim' => $nim,
            'bukti_pembayaran' => $bukti_pembayaran,
            'tanggal_pembayaran' => $tanggal_pembayaran,
            'semester' => $semester,
            'angkatan' => $angkatan,
            'ta' => $ta,
            'tak' => $tak,
            'tanggal_approve' => $tanggal_approve
        );

        $data_email = array(
            'email' => $email,
            'nim' => $nim,
            'tanggal_pembayaran' => $tanggal_pembayaran,
            'tanggal_approve' => $tanggal_approve,
            'jenis_pembayaran' => 'Pembayaran Via Transfer',
            'yang_dibayarkan' => $bukti_pembayaran,
            'semester' => $semester,
            'angkatan' => $angkatan,
            'ta' => $ta,
            'tak' => $tak,
            'nama' => $nama
        );

        if ($pembayaran == 'lainnya') {
            $jml = $jumlah_lain;
            $nilai_termin = $this->M_admin->get_data_nominal_termin($jenis_pembayaran)->row();
            $nominal_termin = $nilai_termin->termin;

            $tung = $this->M_admin->get_tung($nim)->row();
            $tunggak = $tung->jumlah_tunggakan;

            $lebih = 0;
            $kurang = 0;
            if ($tunggak > $jml) {
                $kurang =  $tunggak - $jml;
            } elseif ($tunggak < $jml) {
                $lebih = $jml - $tunggak;
            }

            $sis_pem = $this->M_admin->sisa_pembayaran($nim)->row();
            $sis_pemb = $sis_pem->sisa_pembayaran;
            $total = $lebih + $sis_pemb;

            // echo "<pre>" . print_r($sis_pemb, true);
            // exit(1);
            $this->M_admin->update_sisa_pembayaran($nim, $total);
            $this->M_admin->update_tunggakan($kurang, $nim);
            $this->M_admin->simpan_riwayat($data_riwayat);
            $this->M_admin->delete_approve_riwayat($id_approve);
            $this->send($data_email);

            redirect('approve_pembayaran');
        } else {
            $nilai_termin = $this->M_admin->get_data_nominal_termin($jenis_pembayaran)->row();
            $nominal_termin = $nilai_termin->termin;

            $tung = $this->M_admin->get_tung($nim)->row();
            $tunggak = $tung->jumlah_tunggakan;

            $lebih = 0;
            $kurang = 0;
            if ($tunggak > $nominal_termin) {
                $kurang =  $tunggak - $nominal_termin;
            } elseif ($tunggak < $nominal_termin) {
                $lebih = $nominal_termin - $tunggak;
            }

            $sis_pem = $this->M_admin->sisa_pembayaran($nim)->row();
            $sis_pemb = $sis_pem->sisa_pembayaran;
            $total = $lebih + $sis_pemb;

            $this->M_admin->update_sisa_pembayaran($nim, $total);
            $this->M_admin->update_tunggakan($kurang, $nim);
            $this->M_admin->simpan_riwayat($data_riwayat);
            $this->M_admin->delete_approve_riwayat($id_approve);
            $this->send($data_email);

            redirect('approve_pembayaran');
        }
    }

    public function proses_approve_beasiswa()
    {
        $id_approve = $this->input->post('id_approve');
        $nim = $this->input->post('nim');
        $nama = $this->input->post('nama');
        $tanggal_pembayaran = $this->input->post('tanggal_pembayaran');
        $tanggal_approve = $this->input->post('tanggal_approve');
        $jenis_pembayaran = $this->input->post('jenis_pembayaran');
        $angkatan = $this->input->post('angkatan');
        $semester = $this->input->post('semester');
        $ta = $this->input->post('ta');
        $tak = $this->input->post('tak');
        $email = $this->input->post('email');

        $nilai_termin = $this->M_admin->get_data_nominal_termin($jenis_pembayaran)->row();
        $nominal_termin = $nilai_termin->termin;

        $nilai_beasiswa = $this->M_admin->get_data_nominal_beasiswa($nim)->row();
        $nominal_beasiswa = $nilai_beasiswa->sisa_beasiswa;

        $tung = $this->M_admin->get_tung($nim)->row();
        $tunggak = $tung->jumlah_tunggakan;

        $beasiswa_lebih = 0;
        $beasiswa_kurang = 0;
        if ($tunggak < $nominal_termin) {
            $beasiswa_lebih = $nominal_beasiswa - $tunggak;
            $bukti_pembayaran_beasiswa = $tunggak;
        } elseif ($nominal_beasiswa < $nominal_termin) {
            $beasiswa_kurang =   $tunggak - $nominal_beasiswa;
            $bukti_pembayaran_beasiswa = $nominal_beasiswa;
        } elseif ($nominal_beasiswa > $nominal_termin) {
            $beasiswa_lebih = $nominal_beasiswa - $nominal_termin;
            $bukti_pembayaran_beasiswa = $nominal_termin;
        }

        $data_riwayat  = array(
            'nim' => $nim,
            'bukti_pembayaran_beasiswa' => $bukti_pembayaran_beasiswa,
            'tanggal_pembayaran' => $tanggal_pembayaran,
            'tanggal_approve' => $tanggal_approve,
            'semester' => $semester,
            'ta' => $ta,
            'tak' => $tak,
            'angkatan' => $angkatan
        );

        $data_email = array(
            'email' => $email,
            'nim' => $nim,
            'tanggal_pembayaran' => $tanggal_pembayaran,
            'tanggal_approve' => $tanggal_approve,
            'jenis_pembayaran' => 'Pembayaran Via Beasiswa',
            'yang_dibayarkan' => $bukti_pembayaran_beasiswa,
            'semester' => $semester,
            'ta' => $ta,
            'tak' => $tak,
            'angkatan' => $angkatan,
            'nama' => $nama
        );

        $this->M_admin->update_sisa_beasiswa($nim, $beasiswa_lebih);
        $this->M_admin->update_tunggakan($beasiswa_kurang, $nim);
        $this->M_admin->simpan_riwayat_beasiswa($data_riwayat);
        $this->M_admin->delete_approve_riwayat($id_approve);
        $this->send($data_email);

        redirect('approve_pembayaran');
    }

    public function proses_approve_sisa()
    {
        $id_approve = $this->input->post('id_approve');
        $nim = $this->input->post('nim');
        $nama = $this->input->post('nama');
        $tanggal_pembayaran = $this->input->post('tanggal_pembayaran');
        $tanggal_approve = $this->input->post('tanggal_approve');
        $jenis_pembayaran = $this->input->post('jenis_pembayaran');
        $semester = $this->input->post('semester');
        $angkatan = $this->input->post('angkatan');
        $ta = $this->input->post('ta');
        $tak = $this->input->post('tak');
        $email = $this->input->post('email');

        $nilai_termin = $this->M_admin->get_data_nominal_termin($jenis_pembayaran)->row();
        $nominal_termin = $nilai_termin->termin;

        $nilai_sisa = $this->M_admin->get_data_nominal_beasiswa($nim)->row();
        $nominal_sisa = $nilai_sisa->sisa_pembayaran;

        $tung = $this->M_admin->get_tung($nim)->row();
        $tunggak = $tung->jumlah_tunggakan;

        $sisa_lebih = 0;
        $sisa_kurang = 0;
        if ($tunggak < $nominal_sisa) {
            $sisa_lebih = $nominal_sisa - $tunggak;
            $bukti_pembayaran_sisa = $tunggak;
        } elseif ($nominal_sisa < $nominal_termin) {
            $sisa_kurang = $tunggak - $nominal_sisa;
            $bukti_pembayaran_sisa = $nominal_sisa;
        } elseif ($nominal_sisa > $nominal_termin) {
            $sisa_lebih = $nominal_sisa - $nominal_termin;
            $bukti_pembayaran_sisa = $nominal_termin;
        }

        $data_riwayat  = array(
            'nim' => $nim,
            'bukti_pembayaran_sisa' => $bukti_pembayaran_sisa,
            'tanggal_pembayaran' => $tanggal_pembayaran,
            'semester' => $semester,
            'angkatan' => $angkatan,
            'ta' => $ta,
            'tak' => $tak,
            'tanggal_approve' => $tanggal_approve
        );

        $data_email = array(
            'email' => $email,
            'nim' => $nim,
            'tanggal_pembayaran' => $tanggal_pembayaran,
            'tanggal_approve' => $tanggal_approve,
            'jenis_pembayaran' => 'Pembayaran Via Sisa Pembayaran',
            'yang_dibayarkan' => $bukti_pembayaran_sisa,
            'semester' => $semester,
            'angkatan' => $angkatan,
            'ta' => $ta,
            'tak' => $tak,
            'nama' => $nama
        );

        $this->M_admin->update_sisa_pembayaran($nim, $sisa_lebih);
        $this->M_admin->update_tunggakan($sisa_kurang, $nim);
        $this->M_admin->simpan_riwayat_sisa($data_riwayat);
        $this->M_admin->delete_approve_riwayat($id_approve);
        $this->send($data_email);

        redirect('approve_pembayaran');
    }

    function send($data_email)
    {
        // PHPMailer object
        $response = false;
        $mail = new PHPMailer();

        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'nugrahaadrian613@gmail.com'; // user email anda
        $mail->Password = 'gylvjrqsfymuwbim'; // password email anda
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;

        $mail->setFrom('nugrahaadrian613@gmail.com', 'STMIK Bandung'); // user email anda
        $mail->addReplyTo('nugrahadrian613@gmail.com', ''); //user email anda

        // Email subject
        $mail->Subject = 'Pemberitahuan Approve Pembayaran'; //subject email

        // Add a recipient
        $mail->addAddress($data_email['email']); //email tujuan pengiriman email

        // Set email format to HTML
        $mail->isHTML(true);

        // Email body content
        $mailContent = "<p>Halo <b>" . $data_email['nama'] . "</b> berikut ini adalah rincian riwayat pembayaran:</p>
        <table>
            <tr>
                <td>NIM</td>
                <td>:</td>
                <td>" . $data_email['nim'] . "</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>" . $data_email['nama'] . "</td>
            </tr>
            <tr>
                <td>Semester</td>
                <td>:</td>
                <td>" . $data_email['semester'] . "</td>
            </tr>
            <tr>
                <td>Tahun Ajaran</td>
                <td>:</td>
                <td>" . $data_email['ta'] . "</td>
            </tr>
            <tr>
                <td>Tahun Akademik</td>
                <td>:</td>
                <td>" . $data_email['tak'] . "</td>
            </tr>
            <tr>
                <td>Angkatan</td>
                <td>:</td>
                <td>" . $data_email['angkatan'] . "</td>
            </tr>
            <tr>
                <td>Tanggal Pembayaran</td>
                <td>:</td>
                <td>" . $data_email['tanggal_pembayaran'] . "</td>
            </tr>
            <tr>
                <td>Tanggal Approve</td>
                <td>:</td>
                <td>" . $data_email['tanggal_approve'] . "</td>
            </tr>
            <tr>
                <td>Jumlah Yang dibayarkan / Bukti pembayaran</td>
                <td>:</td>
                <td>" . $data_email['yang_dibayarkan'] . "</td>
            </tr>
            <tr>
                <td>Jenis Pembayaran</td>
                <td>:</td>
                <td>" . $data_email['jenis_pembayaran'] . "</td>
            </tr>
        </table>"; // isi email
        $mail->Body = $mailContent;

        // Send email
        if (!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }
    }

    public function riwayat_pembayaran()
    {
        if ($this->session->userdata('status') != "login") {
            redirect(base_url('login'));
        } else {
            if ($this->session->userdata('level') == "2") {
                redirect(base_url('home_user'));
            }
        }

        $data['riwayat_pembayaran'] = $this->M_admin->get_riwayat_pembayaran()->result();

        $this->load->view('page/header_bau');
        $this->load->view('bau/riwayat_pembayaran', $data);
        $this->load->view('page/footer');
    }
}

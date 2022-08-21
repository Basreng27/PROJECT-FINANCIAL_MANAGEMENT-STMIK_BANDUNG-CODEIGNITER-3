<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
        $this->load->model('M_admin');
        $this->load->model('M_login');
        $this->load->model('M_user');
    }

    public function home_user()
    {
        if ($this->session->userdata('status') != "login") {
            redirect(base_url('login'));
        } else {
            if ($this->session->userdata('level') == "1") {
                redirect(base_url('home_admin'));
            }
        }

        $username = $this->session->userdata('username');

        $data['mahasiswa'] = $this->M_user->get_mahasiswa($username)->result();
        $data['tunggakan'] = $this->M_user->tunggakan($username)->result();
        $data['sisa'] = $this->M_user->sisa($username)->result();

        $this->load->view('page/header_user');
        $this->load->view('user/home_user', $data);
        $this->load->view('page/footer');
    }

    public function informasi_pembayaran()
    {
        if ($this->session->userdata('status') != "login") {
            redirect(base_url('login'));
        } else {
            if ($this->session->userdata('level') == "1") {
                redirect(base_url('home_admin'));
            }
        }
        $nim = $this->session->userdata('username');
        $count_approve = $this->M_user->count_approve($nim)->num_rows();

        if ($count_approve > 0) {
            redirect('bayar_berhasil');
        } else {
            $username = $this->session->userdata('username');

            $data['info_pembayaran'] = $this->M_user->info_pembayaran($username)->result();

            $this->load->view('page/header_user');
            $this->load->view('user/informasi_pembayaran', $data);
            $this->load->view('page/footer');
        }
    }

    // public function bayar()
    // {
    // }
    public function bayar()
    {
        if ($this->session->userdata('status') != "login") {
            redirect(base_url('login'));
        } else {
            if ($this->session->userdata('level') == "1") {
                redirect(base_url('home_admin'));
            }
        }


        $GLOBAL1 = $this->input->post('pembayaran');
        $GLOBAL2 = $this->input->post('beasiswa');
        $GLOBAL = $this->input->post('sisa_pembayaran');
        $GLOBAL3 = $this->input->post('pembangunan');

        if ($GLOBAL1 == "pembayaran") {
            $username = $this->session->userdata('username');

            $data['info_pembayaran'] = $this->M_user->info_pembayaran($username)->result();
            $data['error'] = array('error' => ' ');
            $this->load->view('page/header_user');
            $this->load->view('user/bayar', $data);
            $this->load->view('page/footer');
        } elseif ($GLOBAL2 == "beasiswa") {
            $username = $this->session->userdata('username');

            $data['info_beasiswa'] = $this->M_user->info_beasiswa($username)->result();
            $data['error'] = array('error' => ' ');
            $this->load->view('page/header_user');
            $this->load->view('user/bayar_beasiswa', $data);
            $this->load->view('page/footer');
        } elseif ($GLOBAL == "sisa_pembayaran") {
            $username = $this->session->userdata('username');

            $data['info_beasiswa'] = $this->M_user->info_beasiswa($username)->result();
            $data['error'] = array('error' => ' ');
            $this->load->view('page/header_user');
            $this->load->view('user/bayar_sisa', $data);
            $this->load->view('page/footer');
        } elseif ($GLOBAL3 == "pembangunan") {
            $username = $this->session->userdata('username');

            $data['pembangunan'] =  $this->M_user->info_pembayaran($username)->result();
            $data['error'] = array('error' => ' ');
            $this->load->view('page/header_user');
            $this->load->view('user/bayar_pembangunan', $data);
            $this->load->view('page/footer');
        }
    }

    public function bayar_berhasil()
    {
        if ($this->session->userdata('status') != "login") {
            redirect(base_url('login'));
        } else {
            if ($this->session->userdata('level') == "1") {
                redirect(base_url('home_admin'));
            }
        }

        $this->load->view('page/header_user');
        $this->load->view('user/bayar_berhasil');
        $this->load->view('page/footer');
    }

    public function bayar_beasiswa()
    {
        if ($this->session->userdata('status') != "login") {
            redirect(base_url('login'));
        } else {
            if ($this->session->userdata('level') == "1") {
                redirect(base_url('home_admin'));
            }
        }

        $sisa_beasiswa = $this->input->post('sisa_beasiswa');
        $tanggal_pembayaran = $this->input->post('tanggal_pembayaran');
        $nim = $this->input->post('nim');
        $angkatan = $this->input->post('angkatan');
        $semester = $this->input->post('semester');
        $ta = $this->input->post('ta');
        $tak = $this->input->post('tak');

        $data = array(
            'sisa_beasiswa' => $sisa_beasiswa,
            'tanggal_pembayaran' => $tanggal_pembayaran,
            'nim' => $nim,
            'angkatan' => $angkatan,
            'ta' => $ta,
            'tak' => $tak,
            'semester' => $semester
        );

        if ($sisa_beasiswa <= 0) {
            $this->load->view('page/header_user');
            $this->load->view('user/bayar_gagal');
            $this->load->view('page/footer');
        } else {
            $this->M_user->bayar_via_beasiswa($data);

            $this->load->view('page/header_user');
            $this->load->view('user/bayar_berhasil');
            $this->load->view('page/footer');
        }
    }

    public function sisa_pembayaran()
    {
        if ($this->session->userdata('status') != "login") {
            redirect(base_url('login'));
        } else {
            if ($this->session->userdata('level') == "1") {
                redirect(base_url('home_admin'));
            }
        }

        $sisa_pembayaran = $this->input->post('sisa_pembayaran');
        $tanggal_pembayaran = $this->input->post('tanggal_pembayaran');
        $semester = $this->input->post('semester');
        $angkatan = $this->input->post('angkatan');
        $ta = $this->input->post('ta');
        $tak = $this->input->post('tak');
        $nim = $this->input->post('nim');

        $data = array(
            'sisa_pembayaran' => $sisa_pembayaran,
            'tanggal_pembayaran' => $tanggal_pembayaran,
            'semester' => $semester,
            'angkatan' => $angkatan,
            'ta' => $ta,
            'tak' => $tak,
            'nim' => $nim
        );

        if ($sisa_pembayaran <= 0) {
            $this->load->view('page/header_user');
            $this->load->view('user/bayar_gagal');
            $this->load->view('page/footer');
        } else {
            $this->M_user->bayar_via_sisa($data);

            $this->load->view('page/header_user');
            $this->load->view('user/bayar_berhasil');
            $this->load->view('page/footer');
        }
    }

    public function bayar_gagal()
    {
        if ($this->session->userdata('status') != "login") {
            redirect(base_url('login'));
        } else {
            if ($this->session->userdata('level') == "1") {
                redirect(base_url('home_admin'));
            }
        }

        $this->load->view('page/header_user');
        $this->load->view('user/bayar_gagal');
        $this->load->view('page/footer');
    }

    public function riwayat_pembayaran_mhs()
    {
        if ($this->session->userdata('status') != "login") {
            redirect(base_url('login'));
        } else {
            if ($this->session->userdata('level') == "1") {
                redirect(base_url('home_admin'));
            }
        }

        $username = $this->session->userdata('username');

        $data['riwayat_mhs'] = $this->M_user->riwayat_mhs($username)->result();

        $this->load->view('page/header_user');
        $this->load->view('user/riwayat_pembayaran_mhs', $data);
        $this->load->view('page/footer');
    }

    // public function upload()
    // {
    //     $config['upload_path']          = './bukti pembayaran/';
    //     $config['allowed_types']        = 'gif|jpg|png';
    //     $config['max_size']             = '2048';
    //     $config['remove_space']         = TRUE;
    //     // $config['max_size']             = 100; // maksimal ukuran
    //     // $config['max_width']            = 1024; //lebar maksimal
    //     // $config['max_height']           = 768; //tinggi maksimal

    //     $this->load->library('upload', $config);

    //     if ($this->upload->do_upload('bukti_pembayaran')) { // Lakukan upload dan Cek jika proses upload berhasil
    //         // Jika berhasil :
    //         $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
    //         return $return;
    //     } else {
    //         // Jika gagal :
    //         $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
    //         return $return;
    //     }

    //     // if (!$this->upload->do_upload('bukti_pembayaran')) {
    //     //     redirect('bayar_gagal');
    //     //     // $error = array('error' => $this->upload->display_errors());
    //     //     // $this->load->view('user/bayar', $error);
    //     // } else {
    //     //     redirect('bayar_berhasil');
    //     //     // $data = array('upload_data' => $this->upload->data());
    //     //     // $this->load->view('user/bayar', $data);
    //     // }
    // }

    public function tambah()
    {
        $data = array();

        $nim = $this->session->userdata('username');
        $tanggal_pembayaran = $this->input->post('tanggal_pembayaran');
        $semester = $this->input->post('semester');
        $angkatan = $this->input->post('angkatan');
        $ta = $this->input->post('ta');
        $tak = $this->input->post('tak');

        $data_riwayat = array(
            'tanggal_pembayaran' => $tanggal_pembayaran,
            'semester' => $semester,
            'ta' => $ta,
            'tak' => $tak,
            'angkatan' => $angkatan

        );

        if ($this->input->post('submit')) { // Jika user menekan tombol Submit (Simpan) pada form
            // lakukan upload file dengan memanggil function upload yang ada di GambarModel.php
            $upload = $this->M_user->upload();

            if ($upload['result'] == "success") { // Jika proses upload sukses
                // Panggil function save yang ada di GambarModel.php untuk menyimpan data ke database
                $this->M_user->save($upload, $nim, $data_riwayat);

                redirect('bayar_berhasil'); // Redirect kembali ke halaman awal / halaman view data
            } else { // Jika proses upload gagal
                redirect('bayar_gagal');
                // $data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
            }
        }

        $this->load->view('user/bayar_gagal', $data);
    }

    public function bayar_pembangunan()
    {
        $data = array();

        $nim = $this->session->userdata('username');
        $tanggal_pembayaran = $this->input->post('tanggal_pembayaran');
        $semester = $this->input->post('semester');
        $angkatan = $this->input->post('angkatan');
        $ta = $this->input->post('ta');
        $tak = $this->input->post('tak');

        $data_riwayat = array(
            'tanggal_pembayaran' => $tanggal_pembayaran,
            'semester' => $semester,
            'ta' => $ta,
            'tak' => $tak,
            'angkatan' => $angkatan
        );

        if ($this->input->post('submit')) { // Jika user menekan tombol Submit (Simpan) pada form
            // lakukan upload file dengan memanggil function upload yang ada di GambarModel.php
            $upload = $this->M_user->upload_pembangunan();

            if ($upload['result'] == "success") { // Jika proses upload sukses
                // Panggil function save yang ada di GambarModel.php untuk menyimpan data ke database
                $this->M_user->simpan($upload, $nim, $data_riwayat);

                redirect('bayar_berhasil'); // Redirect kembali ke halaman awal / halaman view data
            } else { // Jika proses upload gagal
                redirect('bayar_gagal');
                // $data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
            }
        }

        $this->load->view('user/bayar_gagal', $data);
    }
}

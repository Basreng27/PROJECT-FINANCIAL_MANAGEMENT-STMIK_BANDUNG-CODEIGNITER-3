<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
    function __construct()
    {
        $this->load->database();
    }

    public function get_mahasiswa($username)
    {
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->where('nim', $username);
        $query = $this->db->get();
        return $query;
    }

    public function get_nama($username_mahasiswa)
    {
        $this->db->select('nama');
        $this->db->from('mahasiswa');
        $this->db->where('nim', $username_mahasiswa);
        $query = $this->db->get();
        return $query;
    }

    function tunggakan($username)
    {
        $this->db->select('*');
        $this->db->from('tunggakan');
        $this->db->join('mahasiswa', 'tunggakan.nim = mahasiswa.nim');
        $this->db->where('mahasiswa.nim', $username);
        $query = $this->db->get();
        return $query;

        //SELECT * FROM <nm tabel1> LEFT JOIN <nm tabel2> ON <nm tabel1>.<nm field1> = <nm tabel 2>.<nm field2>;
    }

    function sisa($username)
    {
        $this->db->select('*');
        $this->db->from('sisa');
        $this->db->where('nim', $username);
        $query = $this->db->get();
        return $query;
    }

    function info_pembayaran($username)
    {
        $this->db->select('*');
        $this->db->from('tunggakan');
        $this->db->join('mahasiswa', 'tunggakan.nim = mahasiswa.nim');
        $this->db->join('termin', 'mahasiswa.id_termin = termin.id_termin');
        $this->db->where('mahasiswa.nim', $username);
        $query = $this->db->get();
        return $query;
    }

    function info_beasiswa($username)
    {
        $this->db->select('*');
        $this->db->from('sisa');
        $this->db->join('mahasiswa', 'sisa.nim = mahasiswa.nim');
        $this->db->join('termin', 'mahasiswa.id_termin = termin.id_termin');
        $this->db->join('tunggakan', 'mahasiswa.nim = tunggakan.nim');
        $this->db->where('mahasiswa.nim', $username);
        $query = $this->db->get();
        return $query;
    }

    function count_approve($nim)
    {
        $this->db->select('*');
        $this->db->from('approve_pembayaran');
        $this->db->where('nim', $nim);
        $query = $this->db->get();
        return $query;
    }

    function riwayat_mhs($username)
    {
        $this->db->select('*');
        $this->db->from('riwayat_pembayaran');
        $this->db->where('nim', $username);
        $query = $this->db->get();
        return $query;
    }

    function bayar_via_beasiswa($data)
    {
        $this->db->set('beasiswa_mahasiswa', $data['sisa_beasiswa']);
        $this->db->set('tanggal_pembayaran', $data['tanggal_pembayaran']);
        $this->db->set('nim', $data['nim']);
        $this->db->set('semester', $data['semester']);
        $this->db->set('angkatan', $data['angkatan']);
        $this->db->set('ta', $data['ta']);
        $this->db->set('tak', $data['tak']);
        $this->db->insert('approve_pembayaran');
    }
    function bayar_via_sisa($data)
    {
        $this->db->set('sisa_pembayaran', $data['sisa_pembayaran']);
        $this->db->set('tanggal_pembayaran', $data['tanggal_pembayaran']);
        $this->db->set('semester', $data['semester']);
        $this->db->set('angkatan', $data['angkatan']);
        $this->db->set('ta', $data['ta']);
        $this->db->set('tak', $data['tak']);
        $this->db->set('nim', $data['nim']);
        $this->db->insert('approve_pembayaran');
    }

    function upload()
    {
        $config['upload_path'] = '././bukti pembayaran/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size']  = '2048';
        $config['remove_space'] = TRUE;

        $this->load->library('upload', $config); // Load konfigurasi uploadnya
        if ($this->upload->do_upload('bukti_pembayaran')) { // Lakukan upload dan Cek jika proses upload berhasil
            // Jika berhasil :
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else {
            // Jika gagal :
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }

    function upload_pembangunan()
    {
        $config['upload_path'] = '././bukti pembayaran pembangunan/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size']  = '2048';
        $config['remove_space'] = TRUE;

        $this->load->library('upload', $config); // Load konfigurasi uploadnya
        if ($this->upload->do_upload('bukti_pembayaran_pembangunan')) { // Lakukan upload dan Cek jika proses upload berhasil
            // Jika berhasil :
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else {
            // Jika gagal :
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }

    // Fungsi untuk menyimpan data ke database
    function save($upload, $nim, $data_riwayat)
    {
        $data = array(
            'bukti_pembayaran' => $upload['file']['file_name'],
            'tanggal_pembayaran' => $data_riwayat['tanggal_pembayaran'],
            'semester' => $data_riwayat['semester'],
            'angkatan' => $data_riwayat['angkatan'],
            'ta' => $data_riwayat['ta'],
            'tak' => $data_riwayat['tak'],
            'nim' => $nim
        );

        // $this->db->set('bukti_pembayaran', $upload['file']);
        // $this->db->set('nim', $nim);
        // $this->db->set('tanggal_pembayaran', $tanggal_pembayaran);
        $this->db->insert('approve_pembayaran', $data);
    }

    function simpan($upload, $nim, $data_riwayat)
    {
        $data = array(
            'bukti_pembayaran_pembangunan' => $upload['file']['file_name'],
            'tanggal_pembayaran' => $data_riwayat['tanggal_pembayaran'],
            'semester' => $data_riwayat['semester'],
            'angkatan' => $data_riwayat['angkatan'],
            'ta' => $data_riwayat['ta'],
            'tak' => $data_riwayat['tak'],
            'nim' => $nim
        );

        // $this->db->set('bukti_pembayaran', $upload['file']);
        // $this->db->set('nim', $nim);
        // $this->db->set('tanggal_pembayaran', $tanggal_pembayaran);
        $this->db->insert('approve_pembayaran', $data);
    }
}

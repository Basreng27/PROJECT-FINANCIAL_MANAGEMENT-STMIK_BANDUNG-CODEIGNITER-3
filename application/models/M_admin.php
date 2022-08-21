<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
	function __construct()
	{
		$this->load->database();
	}

	function cek_nim($nim)
	{
		$this->db->select('*');
		$this->db->from('mahasiswa');
		$this->db->where('nim', $nim);
		$query = $this->db->get();
		return $query;
	}

	function insert_mahasiswa($data_mahasiswa)
	{
		$this->db->set('nim', $data_mahasiswa['nim']);
		$this->db->set('nama', $data_mahasiswa['nama']);
		$this->db->set('jurusan', $data_mahasiswa['jurusan']);
		$this->db->set('kelas', $data_mahasiswa['kelas']);
		$this->db->set('semester', $data_mahasiswa['semester']);
		$this->db->set('angkatan', $data_mahasiswa['angkatan']);
		$this->db->set('email', $data_mahasiswa['email']);
		$this->db->set('id_termin', $data_mahasiswa['id_termin']);
		$this->db->set('id_beasiswa', $data_mahasiswa['id_beasiswa']);
		$this->db->set('id_pembangunan', $data_mahasiswa['id_pembangunan']);
		$this->db->set('ta', $data_mahasiswa['ta']);
		$this->db->set('tak', $data_mahasiswa['tak']);
		$this->db->insert('mahasiswa');
	}

	function get_nilai($id_termin)
	{
		$this->db->select('*');
		$this->db->from('termin');
		$this->db->where('id_termin', $id_termin);
		$query = $this->db->get();
		return $query;
	}

	function get_all($kelas)
	{
		$this->db->select('*');
		$this->db->from('tunggakan');
		$this->db->join('mahasiswa', 'tunggakan.nim = mahasiswa.nim');
		$this->db->where('kelas', $kelas);
		$query = $this->db->get();
		return $query;
	}

	// public function get_all_approve()
	// {
	//     $this->db->select('*');
	//     $this->db->from('approve_pembayaran');
	//     $query = $this->db->get();
	//     return $query;
	// }

	function get_all_approve()
	{
		$this->db->select('*');
		$this->db->from('approve_pembayaran');
		$this->db->join('mahasiswa', 'approve_pembayaran.nim = mahasiswa.nim');
		$query = $this->db->get();
		return $query;
	}

	function get_all_akun()
	{
		$this->db->select('*');
		$this->db->from('akun');
		// $this->db->where('level', 1);
		$this->db->where('level', 3);
		$query = $this->db->get();
		return $query;
	}

	function get_termin($termin)
	{
		$this->db->select('termin');
		$this->db->from('termin');
		$this->db->where('termin_ke', $termin);
		$query = $this->db->get();
		return $query;
	}

	function isi_termin($id_termin)
	{
		$this->db->select('*');
		$this->db->from('termin');
		$this->db->where('id_termin', $id_termin);
		$query = $this->db->get();
		return $query;
	}

	function get_all_termin()
	{
		$this->db->select('*');
		$this->db->from('termin');
		$query = $this->db->get();
		return $query;
	}

	function get_nominal_pembangunan($id_pembangunan)
	{
		$this->db->select('*');
		$this->db->from('pembangunan');
		$this->db->where('id_pembangunan', $id_pembangunan);
		$query = $this->db->get();
		return $query;
	}

	function get_all_pembangunan()
	{
		$this->db->select('*');
		$this->db->from('pembangunan');
		$query = $this->db->get();
		return $query;
	}

	function get_all_termin_kelas($kelas)
	{
		$this->db->select('*');
		$this->db->from('termin');
		$this->db->where('kelas', $kelas);
		$query = $this->db->get();
		return $query;
	}

	function kelas_termin($id_termin)
	{
		$this->db->select('*');
		$this->db->from('termin');
		$this->db->where('id_termin', $id_termin);
		$query = $this->db->get();
		return $query;
	}

	function angkatan($id_termin, $kelas)
	{
		$this->db->select('tahun');
		$this->db->from('termin');
		$this->db->where('id_termin', $id_termin);
		$this->db->where('kelas', $kelas);
		$query = $this->db->get();
		return $query;
	}

	function get_beasiswa($id_beasiswa)
	{
		$this->db->select('*');
		$this->db->from('beasiswa');
		$this->db->where('id_beasiswa', $id_beasiswa);
		$query = $this->db->get();
		return $query;
	}

	function get_nominal_termin($id_termin, $angkatan)
	{
		$this->db->select('*');
		$this->db->from('termin');
		$this->db->where('id_termin', $id_termin);
		$this->db->where('tahun', $angkatan);
		$query = $this->db->get();
		return $query;
	}

	function get_data_nominal_termin($id_termin)
	{
		$this->db->select('*');
		$this->db->from('termin');
		$this->db->where('id_termin', $id_termin);
		$query = $this->db->get();
		return $query;
	}

	function get_data_nominal_beasiswa($nim)
	{
		$this->db->select('*');
		$this->db->from('sisa');
		$this->db->where('nim', $nim);
		$query = $this->db->get();
		return $query;
	}

	function get_all_termin_ke($data)
	{
		$this->db->select('*');
		$this->db->from('termin');
		$this->db->where('termin_ke', $data);
		$query = $this->db->get();
		return $query;
	}
	function get_all_tungg()
	{
		$this->db->select('*');
		$this->db->from('tunggakan');
		$this->db->join('termin', 'tunggakan.id_termin = termin.id_termin');
		$query = $this->db->get();
		return $query;
	}

	function get_termin_ke($id_termin)
	{
		$this->db->select('termin_ke');
		$this->db->from('termin');
		$this->db->where('id_termin', $id_termin);
	}

	function get_termin_tahun($id_termin)
	{
		$this->db->select('tahun');
		$this->db->from('termin');
		$this->db->where('id_termin', $id_termin);
	}

	// function get_nominal_termin($kelas, $tahun)
	// {
	//     $this->db->select('*');
	//     $this->db->from('termin');
	//     $this->db->where('kelas', $kelas);
	//     $this->db->where('tahun', $tahun);
	// }

	function get_all_beasiswa()
	{
		$this->db->select('*');
		$this->db->from('beasiswa');
		$query = $this->db->get();
		return $query;
	}

	function get_kelas($newnim)
	{
		$this->db->select('kelas');
		$this->db->from('mahasiswa');
		$this->db->where('nim', $newnim);

		$query = $this->db->get();
		return $query;
	}

	function insert_tunggakan($nim, $total_tunggakan, $id_termin, $nominal_pem)
	{
		$this->db->set('jumlah_tunggakan', $total_tunggakan);
		$this->db->set('tunggakan_pembangunan', $nominal_pem);
		$this->db->set('id_termin', $id_termin);
		$this->db->set('nim', $nim);
		$this->db->insert('tunggakan');
	}
	function insert_sisa($get_beasiswa, $nim)
	{
		$this->db->set('sisa_beasiswa', $get_beasiswa);
		$this->db->set('nim', $nim);
		$this->db->insert('sisa');
	}

	function cek_tunggakan()
	{
		$this->db->select('*');
		$this->db->from('tunggakan');
		$query = $this->db->get();
		return $query;
	}

	function get_data_approve($new_id)
	{
		$this->db->select('*');
		$this->db->from('approve_pembayaran');
		$this->db->join('mahasiswa', 'approve_pembayaran.nim = mahasiswa.nim');
		$this->db->join('sisa', 'mahasiswa.nim = sisa.nim');
		$this->db->join('termin', 'mahasiswa.id_termin = termin.id_termin');
		$this->db->where('approve_pembayaran.id_approve', $new_id);
		$query = $this->db->get();
		return $query;
	}

	function get_termin_next($new_id)
	{
		$this->db->select('*');
		$this->db->from('tunggakan');
		$this->db->join('mahasiswa', 'mahasiswa.nim = tunggakan.nim');
		$this->db->where('id_tunggakan', $new_id);
		$query = $this->db->get();
		return $query;
	}

	function get_data_termin($new_id)
	{
		$this->db->select('*');
		$this->db->from('termin');
		$this->db->where('id_termin', $new_id);
		$query = $this->db->get();
		return $query;
	}
	function get_data_pembangunan($new_id_pembangunan)
	{
		$this->db->select('*');
		$this->db->from('pembangunan');
		$this->db->where('id_pembangunan', $new_id_pembangunan);
		$query = $this->db->get();
		return $query;
	}


	function get_data_tunggak($new_id)
	{
		$this->db->select('*');
		$this->db->from('tunggakan');
		$this->db->join('termin', 'termin.id_termin = tunggakan.id_termin');
		$this->db->where('id_tunggakan', $new_id);
		$query = $this->db->get();
		return $query;
	}

	function get_data_tunggak_mhs($new_id)
	{
		$this->db->select('*');
		$this->db->from('tunggakan');
		$this->db->join('termin', 'termin.id_termin = tunggakan.id_termin');
		$this->db->join('mahasiswa', 'mahasiswa.nim = tunggakan.nim');
		$this->db->where('id_tunggakan', $new_id);
		$query = $this->db->get();
		return $query;
	}

	function sisa_pembayaran($nim)
	{
		$this->db->select('*');
		$this->db->from('sisa');
		$this->db->where('nim', $nim);
		$query = $this->db->get();
		return $query;
	}

	function get_data_beasiswa($new_id)
	{
		$this->db->select('*');
		$this->db->from('beasiswa');
		$this->db->where('id_beasiswa', $new_id);
		$query = $this->db->get();
		return $query;
	}

	function get_tung($nim)
	{
		$this->db->select('*');
		$this->db->from('tunggakan');
		$this->db->where('nim', $nim);
		$query = $this->db->get();
		return $query;
	}

	// $this->M_admin->update_tunggakan($total_tunggakan, $nim, $tunggak_id);
	function update_tunggakan($total_tunggakan, $nim)
	{
		$this->db->set('jumlah_tunggakan', $total_tunggakan);
		$this->db->where('nim', $nim);
		$this->db->update('tunggakan');
	}

	function update_mhs($data_)
	{
		$this->db->set('ta', $data_['ta']);
		$this->db->set('tak', $data_['tak']);
		$this->db->set('semester', $data_['semester']);
		$this->db->where('nim', $data_['nim']);
		$this->db->update('mahasiswa');
	}

	function update_tunggakan_pembanguanan($total_tunggakan, $nim)
	{
		$this->db->set('tunggakan_pembangunan', $total_tunggakan);
		$this->db->where('nim', $nim);
		$this->db->update('tunggakan');
	}
	function update_next_tunggakan($next_term)
	{
		$this->db->set('id_termin', $next_term['id']);
		$this->db->set('jumlah_tunggakan', $next_term['tunggakan']);
		$this->db->where('id_tunggakan', $next_term['id_tunggakan']);
		$this->db->update('tunggakan');
	}
	function update_sisa_pembayaran($nim, $total)
	{
		$this->db->set('sisa_pembayaran', $total);
		$this->db->where('nim', $nim);
		$this->db->update('sisa');
	}

	function update_sisa_beasiswa($nim, $total)
	{
		$this->db->set('sisa_beasiswa', $total);
		$this->db->where('nim', $nim);
		$this->db->update('sisa');
	}
	function update_sisa_pembayaran__($nim, $total)
	{
		$this->db->set('sisa_pembayaran', $total);
		$this->db->where('nim', $nim);
		$this->db->update('sisa');
	}

	function update_daftar_termin($id_termin, $data_termin)
	{
		$this->db->set('kelas', $data_termin['kelas']);
		$this->db->set('tahun', $data_termin['tahun']);
		$this->db->set('termin_ke', $data_termin['termin_ke']);
		$this->db->set('termin', $data_termin['termin']);
		$this->db->where('id_termin', $id_termin);
		$this->db->update('termin');
	}

	function update_daftar_pembangunan($id_pembangunan, $data_termin)
	{
		$this->db->set('kelas', $data_termin['kelas']);
		$this->db->set('tahun', $data_termin['tahun']);
		$this->db->set('pembangunan', $data_termin['pembangunan']);
		$this->db->where('id_pembangunan', $id_pembangunan);
		$this->db->update('pembangunan');
	}

	function update_daftar_beasiswa($id_beasiswa, $data_beasiswa)
	{
		$this->db->set('nama_beasiswa', $data_beasiswa['nama_beasiswa']);
		$this->db->set('nominal_beasiswa', $data_beasiswa['nominal_beasiswa']);
		$this->db->where('id_beasiswa', $id_beasiswa);
		$this->db->update('beasiswa');
	}

	function simpan_riwayat($data_riwayat)
	{
		$this->db->set('nim', $data_riwayat['nim']);
		$this->db->set('bukti_pembayaran', $data_riwayat['bukti_pembayaran']);
		$this->db->set('tanggal_pembayaran', $data_riwayat['tanggal_pembayaran']);
		$this->db->set('tanggal_approve', $data_riwayat['tanggal_approve']);
		$this->db->set('semester', $data_riwayat['semester']);
		$this->db->set('angkatan', $data_riwayat['angkatan']);
		$this->db->set('ta', $data_riwayat['ta']);
		$this->db->set('tak', $data_riwayat['tak']);
		$this->db->insert('riwayat_pembayaran');
	}

	function simpan_riwayat_pembangunan($data_riwayat)
	{
		$this->db->set('nim', $data_riwayat['nim']);
		$this->db->set('bukti_pembayaran_pembangunan', $data_riwayat['bukti_pembayaran_pembangunan']);
		$this->db->set('tanggal_pembayaran', $data_riwayat['tanggal_pembayaran']);
		$this->db->set('tanggal_approve', $data_riwayat['tanggal_approve']);
		$this->db->set('semester', $data_riwayat['semester']);
		$this->db->set('angkatan', $data_riwayat['angkatan']);
		$this->db->set('ta', $data_riwayat['ta']);
		$this->db->set('tak', $data_riwayat['tak']);
		$this->db->insert('riwayat_pembayaran');
	}

	function simpan_riwayat_beasiswa($data_riwayat)
	{
		$this->db->set('nim', $data_riwayat['nim']);
		$this->db->set('bukti_pembayaran_beasiswa', $data_riwayat['bukti_pembayaran_beasiswa']);
		$this->db->set('tanggal_pembayaran', $data_riwayat['tanggal_pembayaran']);
		$this->db->set('tanggal_approve', $data_riwayat['tanggal_approve']);
		$this->db->set('semester', $data_riwayat['semester']);
		$this->db->set('ta', $data_riwayat['ta']);
		$this->db->set('tak', $data_riwayat['tak']);
		$this->db->set('angkatan', $data_riwayat['angkatan']);
		$this->db->insert('riwayat_pembayaran');
	}

	function simpan_riwayat_sisa($data_riwayat)
	{
		$this->db->set('nim', $data_riwayat['nim']);
		$this->db->set('bukti_pembayaran_sisa', $data_riwayat['bukti_pembayaran_sisa']);
		$this->db->set('tanggal_pembayaran', $data_riwayat['tanggal_pembayaran']);
		$this->db->set('tanggal_approve', $data_riwayat['tanggal_approve']);
		$this->db->set('semester', $data_riwayat['semester']);
		$this->db->set('angkatan', $data_riwayat['angkatan']);
		$this->db->set('ta', $data_riwayat['ta']);
		$this->db->set('tak', $data_riwayat['tak']);
		$this->db->insert('riwayat_pembayaran');
	}

	function delete_termin($id_termin)
	{
		$this->db->select('*');
		$this->db->where('id_termin', $id_termin);
		$this->db->delete('termin');
	}

	function delete_pembangunan($id_pembangunan)
	{
		$this->db->select('*');
		$this->db->where('id_pembangunan', $id_pembangunan);
		$this->db->delete('pembangunan');
	}

	function delete_admin($username)
	{
		$this->db->select('*');
		$this->db->where('username', $username);
		$this->db->delete('akun');
	}

	function delete_beasiswa($id_beasiswa)
	{
		$this->db->select('*');
		$this->db->where('id_beasiswa', $id_beasiswa);
		$this->db->delete('beasiswa');
	}

	function update_termin($termin_now, $nim)
	{
		$this->db->set('id_termin', $termin_now);
		$this->db->where('nim', $nim);
		$this->db->update('mahasiswa');
	}

	function delete_approve_riwayat($id_approve)
	{
		$this->db->where('id_approve =', $id_approve);
		$this->db->delete('approve_pembayaran');
	}

	function get_riwayat_pembayaran()
	{
		$this->db->select('*');
		$this->db->from('riwayat_pembayaran');
		$this->db->join('mahasiswa', 'riwayat_pembayaran.nim = mahasiswa.nim');
		$query = $this->db->get();
		return $query;
	}

	function cek_termin($id_termin, $kelas)
	{
		$this->db->select('*');
		$this->db->from('termin');
		$this->db->where('id_termin', $id_termin);
		$this->db->where('kelas', $kelas);
		$query = $this->db->get();
		return $query;
	}

	function cek_pembangunan($id_pembangunan, $kelas)
	{
		$this->db->select('*');
		$this->db->from('pembangunan');
		$this->db->where('id_pembangunan', $id_pembangunan);
		$this->db->where('kelas', $kelas);
		$query = $this->db->get();
		return $query;
	}

	function cek_admin_akun($username)
	{
		$this->db->select('*');
		$this->db->from('akun');
		$this->db->where('username', $username);
		$query = $this->db->get();
		return $query;
	}

	function cek_beasiswa($id_beasiswa)
	{
		$this->db->select('*');
		$this->db->from('beasiswa');
		$this->db->where('id_beasiswa', $id_beasiswa);
		$query = $this->db->get();
		return $query;
	}

	function insert_termin($data_termin)
	{
		$this->db->set('id_termin', $data_termin['id_termin']);
		$this->db->set('kelas', $data_termin['kelas']);
		$this->db->set('tahun', $data_termin['tahun']);
		$this->db->set('termin_ke', $data_termin['termin_ke']);
		$this->db->set('termin', $data_termin['termin']);
		$this->db->insert('termin');
	}
	function insert_pembangunan($data_termin)
	{
		$this->db->set('id_pembangunan', $data_termin['id_pembangunan']);
		$this->db->set('kelas', $data_termin['kelas']);
		$this->db->set('tahun', $data_termin['tahun']);
		$this->db->set('pembangunan', $data_termin['pembangunan']);
		$this->db->insert('pembangunan');
	}

	function insert_akun_admin($data_akun)
	{
		$this->db->set('username', $data_akun['username']);
		$this->db->set('password', md5($data_akun['password']));
		$this->db->set('level', $data_akun['level']);
		$this->db->insert('akun');
	}

	function insert_beasiswa($data_beasiswa)
	{
		$this->db->set('id_beasiswa', $data_beasiswa['id_beasiswa']);
		$this->db->set('nama_beasiswa', $data_beasiswa['nama_beasiswa']);
		$this->db->set('nominal_beasiswa', $data_beasiswa['nominal_beasiswa']);
		$this->db->insert('beasiswa');
	}
}

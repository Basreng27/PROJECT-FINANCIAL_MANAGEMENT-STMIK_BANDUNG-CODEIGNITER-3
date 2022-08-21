<?php

use PHPMailer\PHPMailer\PHPMailer;

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url', 'form');
		$this->load->library('form_validation');
		$this->load->model('M_admin');
		$this->load->model('M_login');
		require APPPATH . 'libraries/phpmailer/src/Exception.php';
		require APPPATH . 'libraries/phpmailer/src/PHPMailer.php';
		require APPPATH . 'libraries/phpmailer/src/SMTP.php';
	}

	public function tambah_admin()
	{
		if ($this->session->userdata('status') != "login") {
			redirect(base_url('login'));
		} else {
			if ($this->session->userdata('level') == "2") {
				redirect(base_url('home_user'));
			} elseif ($this->session->userdata('level') == "3") {
				redirect(base_url('home_bau'));
			}
		}

		$this->load->view('page/header');
		$this->load->view('admin/tambah_admin');
		$this->load->view('page/footer');
	}

	public function home_admin()
	{
		if ($this->session->userdata('status') != "login") {
			redirect(base_url('login'));
		} else {
			if ($this->session->userdata('level') == "2") {
				redirect(base_url('home_user'));
			}
		}

		$data['jumlah_approve'] = $this->M_admin->get_all_approve()->num_rows();

		$this->load->view('page/header');
		$this->load->view('admin/home_admin', $data);
		$this->load->view('page/footer');
	}

	public function tambah_mahasiswa()
	{
		if ($this->session->userdata('status') != "login") {
			redirect(base_url('login'));
		} else {
			if ($this->session->userdata('level') == "2") {
				redirect(base_url('home_user'));
			}
		}

		$data['data_termin'] = $this->M_admin->get_all_termin_ke('1')->result();
		$data['data_beasiswa'] = $this->M_admin->get_all_beasiswa()->result();
		$data['data_pembangunan'] = $this->M_admin->get_all_pembangunan()->result();

		$this->load->view('page/header');
		$this->load->view('admin/tambah_mahasiswa', $data);
		$this->load->view('page/footer');
	}

	public function tambah_mahasiswa_csv()
	{
		$this->load->view('page/header');
		$this->load->view('admin/tambah_mahasiswa_import');
		$this->load->view('page/footer');
	}

	public function proses_csv()
	{
		$file = $_FILES["filename"];
		$tmpName = $file["tmp_name"];
		if ($file["size"] <= 0) {
			return $this->load->view('admin/tambah_mahasiswa_import');;
		}
		$file = fopen($tmpName, "r");
		$index = 0;
		while (($getData = fgetcsv($file, 10000, ",")) !== FALSE) {

			if ($index === 0) {
				$index++;
				continue;
			}

			$payload = [
				"nim"	 		 => $getData[0],
				"nama"	 		 => $getData[1],
				"jurusan"		 => $getData[2],
				"kelas"		 	 => $getData[3],
				"semester"		 => $getData[4],
				"ta"			 => $getData[5],
				"tak"	 		 => $getData[6],
				"angkatan"  	 => $getData[7],
				"email"			 => $getData[8],
				"id_termin" 	 => $getData[9],
				"id_beasiswa" 	 => $getData[10],
				"id_pembangunan" => $getData[11]
			];
			$payloadAkun = [
				"username"	=> $getData[0],
				"password"	=> md5($getData[0]),
				"level"		=> 2
			];

			$selectTermin = $this->db->select("termin")->from("termin")->where("id_termin", $payload["id_termin"])->get();
			if ($selectTermin->num_rows() <= 0) {
				$index++;
				continue;
			}
			$dataTermin = $selectTermin->row();

			$selectPembangunan = $this->db->select("pembangunan")->from("pembangunan")->where("id_pembangunan", $payload["id_pembangunan"])->get();
			if ($selectPembangunan->num_rows() <= 0) {
				$index++;
				continue;
			}
			$dataPembangunan = $selectPembangunan->row();

			$payloadTunggakan = [
				"jumlah_tunggakan"		=> $dataTermin->termin,
				"tunggakan_pembangunan" => $dataPembangunan->pembangunan,
				"id_termin"				=> $payload["id_termin"],
				"nim"					=> $payload["nim"]
			];
			$selectBeasiswa = $this->db->Select("nominal_beasiswa")->from("beasiswa")->where("id_beasiswa", $payload["id_beasiswa"])->get();
			if ($selectBeasiswa->num_rows() <= 0) {
				$index++;
				continue;
			}
			$dataBeasiswa = $selectBeasiswa->row();

			$payloadSisa = [
				"sisa_beasiswa" => $dataBeasiswa->nominal_beasiswa,
				"sisa_pembayaran" => 0,
				"nim" => $payload["nim"]
			];
			$this->db->insert("mahasiswa", $payload);
			$this->db->insert("akun", $payloadAkun);
			$this->db->insert("tunggakan", $payloadTunggakan);
			$this->db->insert("sisa", $payloadSisa);
			$index++;
		}

		redirect("tambah_mahasiswa/import_csv");
	}
	// function trimArray($array)
	// {
	//     $tampung = [];
	//     foreach ($array as $key => $list) {
	//         $tampung[$key] = trim($list);
	//     }

	//     return $tampung;
	// }

	// function perhitungan($kelas, $tahun, $termin_ke, $angkatan)
	// {
	//     if ($kelas == 'Reguler Pagi') {
	//         if ($tahun == $angkatan) {
	//             if ($termin_ke == 1) {
	//                 $t1 = $this->M_admin->get_nominal_termin($kelas, $tahun)->result();

	//                 foreach ($t1 as $item) {
	//                     $nominal = $item->termin;
	//                 }

	//                 return $nominal;
	//             }
	//         } else {
	//         }
	//     } elseif ($kelas == 'Reguler Malam') {
	//     } elseif ($kelas == 'Eksekutif') {
	//     }
	// }

	public function proses_tambah_mahasiswa()
	{
		$nim = $this->input->post('nim');
		$nama = $this->input->post('nama');
		$jurusan = $this->input->post('jurusan');
		$kelas = $this->input->post('kelas');
		$semester = $this->input->post('semester');
		$angkatan = $this->input->post('angkatan');
		$email = $this->input->post('email');
		$id_termin = $this->input->post('id_termin');
		$id_beasiswa = $this->input->post('id_beasiswa');
		$id_pembangunan = $this->input->post('id_pembangunan');
		$ta = $this->input->post('ta');
		$tak = $this->input->post('tak');

		$data_mahasiswa = array(
			'nim' => $nim,
			'nama' => $nama,
			'jurusan' => $jurusan,
			'kelas' => $kelas,
			'semester' => $semester,
			'angkatan' => $angkatan,
			'email' => $email,
			'id_termin' => $id_termin,
			'id_beasiswa' => $id_beasiswa,
			'ta' => $ta,
			'tak' => $tak,
			'id_pembangunan' => $id_pembangunan
		);

		// $termin_ke = $this->M_admin->get_termin_ke($id_termin)->result( );

		// $tahun = $this->M_admin->get_termin_tahun($id_termin)->result();
		// foreach ($tahun as $item) {
		//     $tahun = $item->tahun;
		// }


		// $tt = $this->perhitungan($kelas, $tahun, $termin_ke, $angkatan);
		$kelas_termin = $this->M_admin->kelas_termin($id_termin)->row();
		$kelas_term = $kelas_termin->kelas;

		$nominal_pembangunan = $this->M_admin->get_nominal_pembangunan($id_pembangunan)->row();
		$nominal_pem = $nominal_pembangunan->pembangunan;
		// echo "<pre>" . print_r($nominal_pem, true);
		// exit(1);
		$tahun_termin = $this->M_admin->angkatan($id_termin, $kelas_term)->row();
		$tahun_term = $tahun_termin->tahun;

		$cek_nim = $this->M_admin->cek_nim($nim)->num_rows();

		if ($kelas_term == 'Eksekutif') {
			if ($angkatan == $tahun_term) {
				if ($cek_nim > 0) {
					$data['ada'] = "ada";

					$this->load->view('page/header');
					$this->load->view('admin/tambah_mahasiswa', $data);
					$this->load->view('page/footer');
				} else {
					// $t1 = $this->M_admin->get_nominal_termin($kelas_term, $angkatan)->result();
					// $total = 0;
					// foreach ($t1 as $item) {
					//     $total += $item->termin;;
					// }

					// $total_tunggakan = $total;
					// $nominal = $this->M_admin->get_nominal_termin($id_termin, $hasil)->result();
					$nominal = $this->M_admin->get_nilai($id_termin)->row();

					$total_tunggakan = $nominal->termin;

					$beasiswa = $this->M_admin->get_beasiswa($id_beasiswa)->row();
					$get_beasiswa = $beasiswa->nominal_beasiswa;

					$this->M_admin->insert_mahasiswa($data_mahasiswa);
					$this->M_login->tambah_akun($data_mahasiswa, '2');
					$this->M_admin->insert_tunggakan($nim, $total_tunggakan, $id_termin, $nominal_pem);
					$this->M_admin->insert_sisa($get_beasiswa, $nim);

					$data['sukses'] = "berhasil";
					$this->load->view('page/header');
					$this->load->view('admin/tambah_mahasiswa', $data);
					$this->load->view('page/footer');
				}
			} else {
				$hasil = 0;
				for ($a = $angkatan; $a >= $tahun_term; $a--) {
					$hasil = $a;
				}
				// echo "<pre>" . print_r($hasil, true);
				// exit(1);
				if ($cek_nim > 0) {
					$data['ada'] = "ada";

					$this->load->view('page/header');
					$this->load->view('admin/tambah_mahasiswa', $data);
					$this->load->view('page/footer');
				} else {
					$nominal = $this->M_admin->get_nominal_termin($id_termin, $hasil)->result();
					$nominal = $this->M_admin->get_nilai($id_termin)->row();

					$total_tunggakan = $nominal->termin;

					$beasiswa = $this->M_admin->get_beasiswa($id_beasiswa)->row();
					$get_beasiswa = $beasiswa->nominal_beasiswa;
					// echo "<pre>" . print_r($total_tunggakan, true);
					// exit(1);
					$this->M_admin->insert_mahasiswa($data_mahasiswa);
					$this->M_login->tambah_akun($data_mahasiswa, '2');
					$this->M_admin->insert_tunggakan($nim, $total_tunggakan, $id_termin, $nominal_pem);
					$this->M_admin->insert_sisa($get_beasiswa, $nim);

					$data['sukses'] = "berhasil";
					$this->load->view('page/header');
					$this->load->view('admin/tambah_mahasiswa', $data);
					$this->load->view('page/footer');
				}
			}
		} else if ($kelas_term == 'Reguler Malam') {
			if ($angkatan == $tahun_term) {
				if ($cek_nim > 0) {
					$data['ada'] = "ada";

					$this->load->view('page/header');
					$this->load->view('admin/tambah_mahasiswa', $data);
					$this->load->view('page/footer');
				} else {
					// $t1 = $this->M_admin->get_nominal_termin($kelas_term, $angkatan)->result();
					// $total = 0;
					// foreach ($t1 as $item) {
					//     $total += $item->termin;;
					// }

					// $total_tunggakan = $total;

					$nominal = $this->M_admin->get_nilai($id_termin)->row();

					$total_tunggakan = $nominal->termin;

					$beasiswa = $this->M_admin->get_beasiswa($id_beasiswa)->row();
					$get_beasiswa = $beasiswa->nominal_beasiswa;

					$this->M_admin->insert_mahasiswa($data_mahasiswa);
					$this->M_login->tambah_akun($data_mahasiswa, '2');
					$this->M_admin->insert_tunggakan($nim, $total_tunggakan, $id_termin, $nominal_pem);
					$this->M_admin->insert_sisa($get_beasiswa, $nim);

					$data['sukses'] = "berhasil";
					$this->load->view('page/header');
					$this->load->view('admin/tambah_mahasiswa', $data);
					$this->load->view('page/footer');
				}
			} else {
				$hasil = 0;
				for ($a = $angkatan; $a >= $tahun_term; $a--) {
					$hasil = $a;
				}

				if ($cek_nim > 0) {
					$data['ada'] = "ada";

					$this->load->view('page/header');
					$this->load->view('admin/tambah_mahasiswa', $data);
					$this->load->view('page/footer');
				} else {
					$nominal = $this->M_admin->get_nominal_termin($id_termin, $hasil)->result();
					// $total = 0;
					// foreach ($t1 as $item) {
					//     $total += $item->termin;;
					// }
					$nominal = $this->M_admin->get_nilai($id_termin)->row();

					$total_tunggakan = $nominal->termin;

					$beasiswa = $this->M_admin->get_beasiswa($id_beasiswa)->row();
					$get_beasiswa = $beasiswa->nominal_beasiswa;

					$this->M_admin->insert_mahasiswa($data_mahasiswa);
					$this->M_login->tambah_akun($data_mahasiswa, '2');
					$this->M_admin->insert_tunggakan($nim, $total_tunggakan, $id_termin, $nominal_pem);
					$this->M_admin->insert_sisa($get_beasiswa, $nim);

					$data['sukses'] = "berhasil";
					$this->load->view('page/header');
					$this->load->view('admin/tambah_mahasiswa', $data);
					$this->load->view('page/footer');
				}
			}
		} else if ($kelas_term == 'Reguler Pagi') {
			if ($angkatan == $tahun_term) {
				if ($cek_nim > 0) {
					$data['ada'] = "ada";

					$this->load->view('page/header');
					$this->load->view('admin/tambah_mahasiswa', $data);
					$this->load->view('page/footer');
				} else {
					// $t1 = $this->M_admin->get_nominal_termin($kelas_term, $angkatan)->result();
					// $total = 0;
					// foreach ($t1 as $item) {
					//     $total += $item->termin;;
					// }

					// $total_tunggakan = $total;

					$nominal = $this->M_admin->get_nilai($id_termin)->row();

					$total_tunggakan = $nominal->termin;

					$beasiswa = $this->M_admin->get_beasiswa($id_beasiswa)->row();
					$get_beasiswa = $beasiswa->nominal_beasiswa;

					$this->M_admin->insert_mahasiswa($data_mahasiswa);
					$this->M_login->tambah_akun($data_mahasiswa, '2');
					$this->M_admin->insert_tunggakan($nim, $total_tunggakan, $id_termin, $nominal_pem);
					$this->M_admin->insert_sisa($get_beasiswa, $nim);

					$data['sukses'] = "berhasil";
					$this->load->view('page/header');
					$this->load->view('admin/tambah_mahasiswa', $data);
					$this->load->view('page/footer');
				}
			} else {
				$hasil = 0;
				for ($a = $angkatan; $a >= $tahun_term; $a--) {
					$hasil = $a;
				}

				if ($cek_nim > 0) {
					$data['ada'] = "ada";

					$this->load->view('page/header');
					$this->load->view('admin/tambah_mahasiswa', $data);
					$this->load->view('page/footer');
				} else {
					$nominal = $this->M_admin->get_nominal_termin($id_termin, $hasil)->result();
					// $total = 0;
					// foreach ($t1 as $item) {
					//     $total += $item->termin;;
					// }

					// $nominal = $this->M_admin->get_nilai($id_termin)->row();

					$total_tunggakan = $nominal->termin;

					$beasiswa = $this->M_admin->get_beasiswa($id_beasiswa)->row();
					$get_beasiswa = $beasiswa->nominal_beasiswa;

					$this->M_admin->insert_mahasiswa($data_mahasiswa);
					$this->M_login->tambah_akun($data_mahasiswa, '2');
					$this->M_admin->insert_tunggakan($nim, $total_tunggakan, $id_termin, $nominal_pem);
					$this->M_admin->insert_sisa($get_beasiswa, $nim);

					$data['sukses'] = "berhasil";
					$this->load->view('page/header');
					$this->load->view('admin/tambah_mahasiswa', $data);
					$this->load->view('page/footer');
				}
			}
		}
	}

	public function mahasiswa_pagi()
	{
		if ($this->session->userdata('status') != "login") {
			redirect(base_url('login'));
		} else {
			if ($this->session->userdata('level') == "2") {
				redirect(base_url('home_user'));
			}
		}

		$data['mhs'] = $this->M_admin->get_all("Reguler Pagi")->result();

		$this->load->view('page/header');
		$this->load->view('admin/mahasiswa_pagi', $data);
		$this->load->view('page/footer');
	}

	public function mahasiswa_malam()
	{
		if ($this->session->userdata('status') != "login") {
			redirect(base_url('login'));
		} else {
			if ($this->session->userdata('level') == "2") {
				redirect(base_url('home_user'));
			}
		}

		$data['mhs'] = $this->M_admin->get_all("Reguler Malam")->result();

		$this->load->view('page/header');
		$this->load->view('admin/mahasiswa_malam', $data);
		$this->load->view('page/footer');
	}

	public function mahasiswa_eksekutif()
	{
		if ($this->session->userdata('status') != "login") {
			redirect(base_url('login'));
		} else {
			if ($this->session->userdata('level') == "2") {
				redirect(base_url('home_user'));
			}
		}

		$data['mhs'] = $this->M_admin->get_all("Eksekutif")->result();

		$this->load->view('page/header');
		$this->load->view('admin/mahasiswa_eksekutif', $data);
		$this->load->view('page/footer');
	}

	public function proses_approve()
	{
		$id_approve = $this->input->post('id_approve');
		$nim = $this->input->post('nim');
		$bukti_pembayaran = $this->input->post('bukti_pembayaran');
		$tanggal_pembayaran = $this->input->post('tanggal_pembayaran');
		$termin = $this->input->post('termin');
		$jumlah_lain = $this->input->post('jumlah_lain');
		$termin_selanjutnya = $this->input->post('termin_selanjutnya');
		$tanggal_approve = $this->input->post('tanggal_approve');
		$jenis_pembayaran = $this->input->post('jenis_pembayaran');
		$email = $this->input->post('email');

		$data_riwayat  = array(
			'nim' => $nim,
			'bukti_pembayaran' => $bukti_pembayaran,
			'tanggal_pembayaran' => $tanggal_pembayaran,
			'tanggal_approve' => $tanggal_approve
		);

		$data_email = array(
			'email' => $email,
			'nim' => $nim,
			'tanggal_pembayaran' => $tanggal_pembayaran,
			'tanggal_approve' => $tanggal_approve,
			'jenis_pembayaran' => $jenis_pembayaran
		);

		if ($jenis_pembayaran == 'Beasiswa') {
			$nilai_termin = $this->M_admin->get_data_nominal_termin($termin)->row();
			$nominal_termin = $nilai_termin->termin;

			$nilai_beasiswa = $this->M_admin->get_data_nominal_beasiswa($nim)->row();
			$nominal_beasiswa = $nilai_beasiswa->sisa_beasiswa;

			$tung = $this->M_admin->get_tung($nim)->row();
			$tunggak = $tung->jumlah_tunggakan;

			// $sis_lebih = 0;
			// $sis_kurang = 0;
			// if ($tunggak > $nominal_termin) {
			//     $sis_kurang =  $tunggak - $nominal_termin;
			// } elseif ($tunggak < $nominal_termin) {
			//     $sis_lebih = $nominal_termin - $tunggak;
			// }
			// $sis_pengurangan = 0;
			$total_beasiswa_lebih = 0;
			// $total_beasiswa_kurang = 0;
			//update beasiswa
			if ($tunggak < $nominal_termin) {
				$total_beasiswa_lebih = $nominal_beasiswa - $tunggak;
			} elseif ($nominal_beasiswa < $nominal_termin) {
				// $sis_kurang = $nominal_termin - $tunggak; //tambah tunggak
				$tot_tunggak =   $tunggak - $nominal_beasiswa;
				//$total_beasiswa_kurang = $nominal_termin - $nominal_beasiswa; //masuk tunggakan
				// $tot_tunggak = $sis_pengurangan + $total_beasiswa_kurang;
			} elseif ($nominal_beasiswa > $nominal_termin) {
				$tot_tunggak = $tunggak - $nominal_termin; //kurang tunggak
				$total_beasiswa_lebih = $nominal_beasiswa - $nominal_termin;
			}


			// $sis_beas = $this->M_admin->sisa_pembayaran($nim)->row();
			// $sis_beasiswa = $sis_beas->sisa_beasiswa;
			// $total_beasiswa = $sis_lebih + $sis_pemb;
			// echo "<pre>" . print_r($tot_tunggak, true);
			// exit(1);
			$this->M_admin->update_sisa_beasiswa($nim, $total_beasiswa_lebih);

			// $this->M_admin->update_tunggakan($sis_pengurangan, $nim);
			$this->M_admin->update_tunggakan($tot_tunggak, $nim);
			$this->M_admin->simpan_riwayat($data_riwayat);
			// $this->M_admin->update_termin($termin_selanjutnya, $nim);
			$this->M_admin->delete_approve_riwayat($id_approve);
			$this->send($data_email);

			redirect('approve_pembayaran');
		} elseif ($jenis_pembayaran == '00') {
			$nilai_termin = $this->M_admin->get_data_nominal_termin($termin)->row();
			$nominal_termin = $nilai_termin->termin;

			$nilai_sisa = $this->M_admin->get_data_nominal_beasiswa($nim)->row();
			$nominal_sisa = $nilai_sisa->sisa_pembayaran;

			$tung = $this->M_admin->get_tung($nim)->row();
			$tunggak = $tung->jumlah_tunggakan;

			$total_sisa_lebih = 0;
			// $total_beasiswa_kurang = 0;
			//update beasiswa
			$sis_pengurangan = 0;
			if ($tunggak < $jumlah_lain) {
				$total_sisa_lebih = $nominal_sisa - $tunggak;
			} elseif ($nominal_sisa < $jumlah_lain) {
				$tot_tunggak =   $tunggak - $nominal_sisa;
			} elseif ($nominal_sisa > $jumlah_lain) {
				$tot_tunggak = $tunggak - $jumlah_lain; //kurang tunggak
				$total_sisa_lebih = $nominal_sisa - $jumlah_lain;
			}

			// echo "<pre>" . print_r($total_sisa_lebih, true);
			// exit(1);

			$this->M_admin->update_sisa_pembayaran($nim, $total_sisa_lebih);

			$this->M_admin->update_tunggakan($tot_tunggak, $nim);
			$this->M_admin->simpan_riwayat($data_riwayat);
			// $this->M_admin->update_termin($termin_selanjutnya, $nim);
			$this->M_admin->delete_approve_riwayat($id_approve);
			$this->send($data_email);

			redirect('approve_pembayaran');
		} else {
			$nilai_termin = $this->M_admin->get_data_nominal_termin($termin)->row();
			$nominal_termin = $nilai_termin->termin;

			$tung = $this->M_admin->get_tung($nim)->row();
			$tunggak = $tung->jumlah_tunggakan;

			// $sisa_tunggakan = $tunggak - $nominal_termin;
			$sis_lebih = 0;
			$sis_kurang = 0;
			if ($tunggak > $nominal_termin) {
				$sis_kurang =  $tunggak - $nominal_termin;
			} elseif ($tunggak < $nominal_termin) {
				$sis_lebih = $nominal_termin - $tunggak;
			}

			$sis_pem = $this->M_admin->sisa_pembayaran($nim)->row();
			$sis_pemb = $sis_pem->sisa_pembayaran;

			$total = $sis_lebih + $sis_pemb;
			$this->M_admin->update_sisa_pembayaran($nim, $total);


			$this->M_admin->update_tunggakan($sis_kurang, $nim);
			$this->M_admin->simpan_riwayat($data_riwayat);
			// $this->M_admin->update_termin($termin_selanjutnya, $nim);
			$this->M_admin->delete_approve_riwayat($id_approve);
			$this->send($data_email);

			redirect('approve_pembayaran');
		}
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
		$mail->Username = 'stimikbandungcikutra1993@gmail.com'; // user email anda
		$mail->Password = 'egzfydoxohbntrcs'; // password email anda
		$mail->SMTPSecure = 'ssl';
		$mail->Port     = 465;

		$mail->setFrom('stimikbandungcikutra1993@gmail.com', 'STMIK Bandung'); // user email anda
		$mail->addReplyTo('stmikbandungcikutra1993@gmail.com', ''); //user email anda

		// Email subject
		$mail->Subject = 'Pemberitahuan Approve Pembayaran'; //subject email

		// Add a recipient
		$mail->addAddress($data_email['email']); //email tujuan pengiriman email

		// Set email format to HTML
		$mail->isHTML(true);

		// Email body content
		$mailContent = "<p>NIM <b>" . $data_email['nim'] . "</b> berikut ini adalah rincian:</p>
        <table>
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

	public function daftar_termin()
	{
		if ($this->session->userdata('status') != "login") {
			redirect(base_url('login'));
		} else {
			if ($this->session->userdata('level') == "2") {
				redirect(base_url('home_user'));
			}
		}

		$data['data_termin'] = $this->M_admin->get_all_termin()->result();

		$this->load->view('page/header');
		$this->load->view('admin/daftar_termin', $data);
		$this->load->view('page/footer');
	}

	public function daftar_pembangunan()
	{
		if ($this->session->userdata('status') != "login") {
			redirect(base_url('login'));
		} else {
			if ($this->session->userdata('level') == "2") {
				redirect(base_url('home_user'));
			}
		}

		$data['data_pembangunan'] = $this->M_admin->get_all_pembangunan()->result();

		$this->load->view('page/header');
		$this->load->view('admin/daftar_pembangunan', $data);
		$this->load->view('page/footer');
	}

	public function daftar_admin()
	{
		if ($this->session->userdata('status') != "login") {
			redirect(base_url('login'));
		} else {
			if ($this->session->userdata('level') == "2") {
				redirect(base_url('home_user'));
			} elseif ($this->session->userdata('level') == "3") {
				redirect(base_url('home_bau'));
			}
		}

		$data['data_akun'] = $this->M_admin->get_all_akun()->result();

		$this->load->view('page/header');
		$this->load->view('admin/daftar_admin', $data);
		$this->load->view('page/footer');
	}


	public function daftar_beasiswa()
	{
		if ($this->session->userdata('status') != "login") {
			redirect(base_url('login'));
		} else {
			if ($this->session->userdata('level') == "2") {
				redirect(base_url('home_user'));
			}
		}

		$data['data_beasiswa'] = $this->M_admin->get_all_beasiswa()->result();

		$this->load->view('page/header');
		$this->load->view('admin/daftar_beasiswa', $data);
		$this->load->view('page/footer');
	}

	public function tambah_termin()
	{
		if ($this->session->userdata('status') != "login") {
			redirect(base_url('login'));
		} else {
			if ($this->session->userdata('level') == "2") {
				redirect(base_url('home_user'));
			}
		}

		$this->load->view('page/header');
		$this->load->view('admin/tambah_termin');
		$this->load->view('page/footer');
	}


	public function tambah_pembangunan()
	{
		if ($this->session->userdata('status') != "login") {
			redirect(base_url('login'));
		} else {
			if ($this->session->userdata('level') == "2") {
				redirect(base_url('home_user'));
			}
		}

		$this->load->view('page/header');
		$this->load->view('admin/tambah_pembangunan');
		$this->load->view('page/footer');
	}

	public function tambah_beasiswa()
	{
		if ($this->session->userdata('status') != "login") {
			redirect(base_url('login'));
		} else {
			if ($this->session->userdata('level') == "2") {
				redirect(base_url('home_user'));
			}
		}

		$this->load->view('page/header');
		$this->load->view('admin/tambah_beasiswa');
		$this->load->view('page/footer');
	}

	public function proses_tambah_pembangunan()
	{
		$id_pembangunan = $this->input->post('id_pembangunan');
		$kelas = $this->input->post('kelas');
		$tahun = $this->input->post('tahun');
		$pembangunan = $this->input->post('pembangunan');

		$data_pembangunan = array(
			'id_pembangunan' => $id_pembangunan,
			'kelas' => $kelas,
			'tahun' => $tahun,
			'pembangunan' => $pembangunan
		);

		$cek_termin = $this->M_admin->cek_pembangunan($id_pembangunan, $kelas)->num_rows();

		if ($cek_termin > 0) {
			$data['ada'] = "ada";

			// echo "<pre>" . print_r($total, true);
			// exit(1);

			$this->load->view('page/header');
			$this->load->view('admin/tambah_pembangunan', $data);
			$this->load->view('page/footer');
		} else {
			$this->M_admin->insert_pembangunan($data_pembangunan);

			$data['sukses'] = "berhasil";
			$this->load->view('page/header');
			$this->load->view('admin/tambah_pembangunan', $data);
			$this->load->view('page/footer');
		}
	}

	public function proses_tambah_termin()
	{
		$id_termin = $this->input->post('id_termin');
		$kelas = $this->input->post('kelas');
		$tahun = $this->input->post('tahun');
		$termin_ke = $this->input->post('termin_ke');
		$termin = $this->input->post('termin');

		$data_termin = array(
			'id_termin' => $id_termin,
			'kelas' => $kelas,
			'tahun' => $tahun,
			'termin_ke' => $termin_ke,
			'termin' => $termin
		);

		$cek_termin = $this->M_admin->cek_termin($id_termin, $kelas)->num_rows();

		if ($cek_termin > 0) {
			$data['ada'] = "ada";

			// echo "<pre>" . print_r($total, true);
			// exit(1);

			$this->load->view('page/header');
			$this->load->view('admin/tambah_termin', $data);
			$this->load->view('page/footer');
		} else {
			$this->M_admin->insert_termin($data_termin);

			$data['sukses'] = "berhasil";
			$this->load->view('page/header');
			$this->load->view('admin/tambah_termin', $data);
			$this->load->view('page/footer');
		}
	}

	public function proses_tambah_admin()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$level = $this->input->post('level');

		$data_akun = array(
			'username' => $username,
			'password' => $password,
			'level' => $level
		);

		$cek_termin = $this->M_admin->cek_admin_akun($username)->num_rows();

		if ($cek_termin > 0) {
			$data['ada'] = "ada";

			// echo "<pre>" . print_r($total, true);
			// exit(1);

			$this->load->view('page/header');
			$this->load->view('admin/tambah_admin', $data);
			$this->load->view('page/footer');
		} else {
			$this->M_admin->insert_akun_admin($data_akun);

			$data['sukses'] = "berhasil";
			$this->load->view('page/header');
			$this->load->view('admin/tambah_admin', $data);
			$this->load->view('page/footer');
		}
	}

	public function proses_tambah_beasiswa()
	{
		$id_beasiswa = $this->input->post('id_beasiswa');
		$nama_beasiswa = $this->input->post('nama_beasiswa');
		$nominal_beasiswa = $this->input->post('nominal_beasiswa');

		$data_beasiswa = array(
			'id_beasiswa' => $id_beasiswa,
			'nama_beasiswa' => $nama_beasiswa,
			'nominal_beasiswa' => $nominal_beasiswa
		);

		$cek_beasiswa = $this->M_admin->cek_beasiswa($id_beasiswa)->num_rows();

		if ($cek_beasiswa > 0) {
			$data['ada'] = "ada";

			// echo "<pre>" . print_r($total, true);
			// exit(1);

			$this->load->view('page/header');
			$this->load->view('admin/tambah_beasiswa', $data);
			$this->load->view('page/footer');
		} else {
			$this->M_admin->insert_beasiswa($data_beasiswa);

			$data['sukses'] = "berhasil";
			$this->load->view('page/header');
			$this->load->view('admin/tambah_beasiswa', $data);
			$this->load->view('page/footer');
		}
	}
	public function proses_edit_pembangunan()
	{
		$id_pembangunan = $this->input->post('id_pembangunan');
		$kelas = $this->input->post('kelas');
		$tahun = $this->input->post('tahun');
		$pembangunan = $this->input->post('pembangunan');

		$data_pembangunan = array(
			'id_pembangunan' => $id_pembangunan,
			'kelas' => $kelas,
			'tahun' => $tahun,
			'pembangunan' => $pembangunan
		);
		// echo "<pre>" . print_r($data_pembangunan, true);
		// exit(1);
		$this->M_admin->update_daftar_pembangunan($id_pembangunan, $data_pembangunan);

		redirect('daftar_pembangunan');
	}

	public function proses_edit_termin()
	{
		$id_termin = $this->input->post('id_termin');
		$kelas = $this->input->post('kelas');
		$tahun = $this->input->post('tahun');
		$termin_ke = $this->input->post('termin_ke');
		$termin = $this->input->post('termin');

		$data_termin = array(
			'id_termin' => $id_termin,
			'kelas' => $kelas,
			'tahun' => $tahun,
			'termin_ke' => $termin_ke,
			'termin' => $termin
		);

		$this->M_admin->update_daftar_termin($id_termin, $data_termin);

		redirect('daftar_termin');
	}

	public function proses_edit_beasiswa()
	{
		$id_beasiswa = $this->input->post('id_beasiswa');
		$nama_beasiswa = $this->input->post('nama_beasiswa');
		$nominal_beasiswa = $this->input->post('nominal_beasiswa');

		$data_beasiswa = array(
			'id_beasiswa' => $id_beasiswa,
			'nama_beasiswa' => $nama_beasiswa,
			'nominal_beasiswa' => $nominal_beasiswa
		);

		$this->M_admin->update_daftar_beasiswa($id_beasiswa, $data_beasiswa);

		redirect('daftar_beasiswa');
	}

	public function delete_termin()
	{
		$id_termin = $this->uri->segment(2);
		$new_id = str_replace('%20', ' ', $id_termin);

		$this->M_admin->delete_termin($new_id);

		redirect('daftar_termin');
	}

	public function delete_pembangunan()
	{
		$id_pembangunan = $this->uri->segment(2);
		$new_id_pembangunan = str_replace('%20', ' ', $id_pembangunan);

		$this->M_admin->delete_pembangunan($new_id_pembangunan);

		redirect('daftar_pembangunan');
	}

	public function delete_admin()
	{
		$username = $this->uri->segment(2);
		$new_us = str_replace('%20', ' ', $username);

		$this->M_admin->delete_admin($new_us);

		redirect('daftar_admin');
	}

	public function delete_beasiswa()
	{
		$id_beasiswa = $this->uri->segment(2);
		$new_id = str_replace('%20', ' ', $id_beasiswa);

		$this->M_admin->delete_beasiswa($new_id);

		redirect('daftar_beasiswa');
	}

	public function edit_termin()
	{
		if ($this->session->userdata('status') != "login") {
			redirect(base_url('login'));
		} else {
			if ($this->session->userdata('level') == "2") {
				redirect(base_url('home_user'));
			}
		}
		$id_termin = $this->uri->segment(2);
		$new_id = str_replace('%20', ' ', $id_termin);

		$data['data_termin'] = $this->M_admin->get_data_termin($new_id)->result();

		$this->load->view('page/header');
		$this->load->view('admin/edit_termin', $data);
		$this->load->view('page/footer');
	}

	public function edit_pembangunan()
	{
		if ($this->session->userdata('status') != "login") {
			redirect(base_url('login'));
		} else {
			if ($this->session->userdata('level') == "2") {
				redirect(base_url('home_user'));
			}
		}
		$id_pembangunan = $this->uri->segment(2);
		$new_id_pembangunan = str_replace('%20', ' ', $id_pembangunan);

		$data['data_pembangunan'] = $this->M_admin->get_data_pembangunan($new_id_pembangunan)->result();

		$this->load->view('page/header');
		$this->load->view('admin/edit_pembangunan', $data);
		$this->load->view('page/footer');
	}

	public function edit_beasiswa()
	{
		if ($this->session->userdata('status') != "login") {
			redirect(base_url('login'));
		} else {
			if ($this->session->userdata('level') == "2") {
				redirect(base_url('home_user'));
			}
		}
		$id_beasiswa = $this->uri->segment(2);
		$new_id = str_replace('%20', ' ', $id_beasiswa);

		$data['data_beasiswa'] = $this->M_admin->get_data_beasiswa($new_id)->result();

		$this->load->view('page/header');
		$this->load->view('admin/edit_beasiswa', $data);
		$this->load->view('page/footer');
	}
}

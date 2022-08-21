<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url', 'form');
		$this->load->library('form_validation');
		$this->load->model('M_login');
	}

	public function login()
	{
		$this->load->view('page/login');
	}

	public function cek_login()
	{
		if ($this->session->userdata('status') == "login") {
			if ($this->session->userdata('level') == 1) {
				redirect(base_url('home_admin'));
			}
		} else if ($this->session->userdata('status') == "login") {
			if ($this->session->userdata('level') == 2) {
				redirect(base_url('home_user'));
			}
		} else if ($this->session->userdata('status') == "login") {
			if ($this->session->userdata('level') == 3) {
				redirect(base_url('home_bau'));
			}
		}

		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$data = array(
			'username' => $username,
			'password' => md5($password)
		);

		$cek = $this->M_login->cek_login($data)->num_rows();

		if ($cek > 0) {
			$level = $this->M_login->cek_login($data)->row_array();

			if ($level['level'] == '1') {
				$data_session = array(
					'username' => $username,
					'level' => $level['level'],
					'status' => "login"
				);

				$this->session->set_userdata($data_session);
				redirect(base_url('home_admin'));
			} else if ($level['level'] == '2') {
				$data_session = array(
					'username' => $username,
					'level' => $level['level'],
					'status' => "login"
				);

				$this->session->set_userdata($data_session);
				redirect(base_url('home_user'));
			} else if ($level['level'] == '3') {
				$data_session = array(
					'username' => $username,
					'level' => $level['level'],
					'status' => "login"
				);

				$this->session->set_userdata($data_session);
				redirect(base_url('home_bau'));
			} else {
				redirect('login');
			}
		} else {
			redirect('login');
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}

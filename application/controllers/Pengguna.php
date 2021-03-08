<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller
{
	
	function __construct() {
		parent::__construct();

		// Library
		$this->load->library('session');

		// Model
		$this->load->model('Instansi_Model');
		$this->load->model('Kelas_Model');
		$this->load->model('Pengguna_Model');
		$this->load->model('Rapot_Model');
		$this->load->model('Siswa_Model');
	}

	public function index() {
		if($this->session->userdata('id') != '') {
			redirect(base_url('dashboard'));
		}

		$push_data = array();
		$this->load->view('pengguna/login', $push_data);
	}

	public function Login() {

		$msg = '';

		if($this->input->post('usernameTxt') != '' && $this->input->post('passwordTxt') != '') {

			$usernameTxt = $this->input->post('usernameTxt');
			$passwordTxt = $this->input->post('passwordTxt');

			$cek_pengguna = $this->Pengguna_Model->Login_Pengguna($usernameTxt, $passwordTxt);
			if(count($cek_pengguna) > 0) {
				
				foreach ($cek_pengguna as $key => $val) {
					$sess_array = array(
						'id' 			=> $val->id,
						'id_instansi' 	=> $val->id_instansi,
						'username' 		=> $val->username,
						'role'			=> $val->role
					);

					$this->session->set_userdata($sess_array);

					redirect(base_url('dashboard'));
				}

			} else {
				$msg = 'Username atau password salah';
			}
		} else {
			$msg = 'Form harus diisi';
		}
		print_r($this->input->post());
		if($msg != '') {
			// redirect(base_url('masuk?msg='.$msg));
		}
	}

	public function Dashboard() {
		$push_data = array(
			'page' 			=> 'pengguna/index',
			'breadcrumb'	=> 'Dashboard',
		);

		$this->load->view('templates/page', $push_data);
	}

	public function Logout() {
		if($this->session->userdata('id') != '') {
			$this->session->sess_destroy();
			redirect(base_url('masuk'));
		}
	}

	public function Create() {
		// sesi_check();

		$push_data = array();
		$this->load->view('pengguna/create', $push_data);		
	}

	public function Save() {
		// sesi_check();
		
		$push_data = array();
		$this->load->view('pengguna/save', $push_data);
	}

	public function Edit() {
		// sesi_check();
		
		$push_data = array();
		$this->load->view('pengguna/edit', $push_data);
	}

	public function Update() {
		// sesi_check();
		
		$push_data = array();
		$this->load->view('pengguna/update', $push_data);
	}

	public function Delete() {
		// sesi_check();
		
		$push_data = array();
		$this->load->view('pengguna/delete', $push_data);
	}

	// SESSION
	function sesi_check() {
		if($this->session->userdata('id') == '') {
			$this->session->sess_destroy();
			redirect(base_url('masuk'));
		}
	}
}
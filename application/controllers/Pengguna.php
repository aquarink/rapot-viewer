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

			$cek_pengguna = $this->Pengguna_Model->Login_Pengguna($usernameTxt, md5($passwordTxt));
			if(count($cek_pengguna) > 0) {

				$name = 'Not found';
				
				foreach ($cek_pengguna as $key => $val) {

					if($val->role == 'admin') {
						$name = 'Administrator';
					} elseif($val->role == 'instansi') {
						$inst = $this->Instansi_Model->Cari_Instansi($val->id_instansi);
						if(count($inst) > 0) {
							foreach ($inst as $k => $v) {
								$name = $v->nama_instansi;
							}
						}
					} elseif($val->role == 'siswa') {
						$sws = $this->Siswa_Model->Cari_Siswa_Id($val->id, $val->id_instansi);
						if(count($sws) > 0) {
							foreach ($sws as $k => $v) {
								$name = $v->nama_siswa;
							}
						}
					}

					$sess_array = array(
						'id' 			=> $val->id,
						'id_instansi' 	=> $val->id_instansi,
						'username' 		=> $val->username,
						'role'			=> $val->role,
						'name' 			=> $name,
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
		
		if($msg != '') {
			redirect(base_url('?msg='.$msg));
		}
	}

	public function Dashboard() {

		$ext_data = array();

		switch ($this->session->userdata('role')) {
			case 'admin':
				// admin
				$pagenya = 'pengguna/index';
				break;
			
			case 'instansi':
				// instansi
				$pagenya = 'pengguna/dash_instansi';

				// DATA INSTANSI
				$cari_data_ins = $this->Instansi_Model->Cari_Instansi($this->session->userdata('id_instansi'));
				if(count($cari_data_ins) > 0) {
					foreach ($cari_data_ins as $key => $val) {
						$ext_data['nama'] = $val->nama_instansi;
					}
				}

				// DATA KELAS INSTANSI
				$cari_data_kls = $this->Kelas_Model->Cari_Kelas_Id_Instansi($this->session->userdata('id_instansi'));
				$ext_data['kelas'] = count($cari_data_kls);

				// DATA SISWA KELAS INSTANSI
				$cari_data_sws = $this->Siswa_Model->Cari_Siswa_Id_Instansi($this->session->userdata('id_instansi'));
				$ext_data['siswa'] = count($cari_data_sws);

				// DATA RAPOT SISWA KELAS INSTANSI
				$cari_data_rpt = $this->Rapot_Model->Cari_Rapot_id_instansi($this->session->userdata('id_instansi'));
				$ext_data['rapot'] = count($cari_data_rpt);

				break;

			default:
				// siswa
				$pagenya = 'pengguna/dash_siswa';
				break;
		}


		$push_data = array(
			'page' 			=> $pagenya,
			'breadcrumb'	=> 'Dashboard',
			'ext_data' 		=> $ext_data,
		);

		$this->load->view('templates/page', $push_data);
	}

	public function Logout() {
		if($this->session->userdata('id') != '') {
			$this->session->sess_destroy();
			redirect(base_url());
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
<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Rapot extends CI_Controller
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
		// sesi_check();

		$list_rapot = $this->Rapot_Model->List_Rapot($this->session->userdata('id_instansi'));
		
		$push_data = array(
			'page' 			=> 'rapot/index',
			'breadcrumb'	=> 'Dashboard',
			'rapot'			=> true,
			'rapot_data'	=> $list_rapot,
		);

		$this->load->view('templates/page', $push_data);
	}

	public function Create() {
		// sesi_check();
		
		$push_data = array(
			'page' 			=> 'rapot/tambah',
			'breadcrumb'	=> 'Tambah Data Rapot',
			'rapot'			=> true,
		);

		$this->load->view('templates/page', $push_data);
	}

	public function Save() {
		// sesi_check();
		
		$push_data = array();
		$this->load->view('rapot/save', $push_data);
	}

	public function Edit() {
		// sesi_check();
		
		$push_data = array(
			'page' 			=> 'rapot/edit',
			'breadcrumb'	=> 'Update Data Rapot',
			'rapot'			=> true,
		);

		$this->load->view('templates/page', $push_data);
	}

	public function Update() {
		// sesi_check();
		
		$push_data = array();
		$this->load->view('rapot/update', $push_data);
	}

	public function Delete() {
		// sesi_check();
		
		$push_data = array();
		$this->load->view('rapot/delete', $push_data);
	}

	// SESSION
	function sesi_check() {
		if($this->session->userdata('id') == '') {
			$this->session->sess_destroy();
			redirect(base_url('masuk'));
		}
	}
}
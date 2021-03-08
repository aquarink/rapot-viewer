<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Instansi extends CI_Controller
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
		
		$push_data = array(
			'page' 			=> 'instansi/index',
			'breadcrumb'	=> 'Daftar Instansi',
		);

		$this->load->view('templates/page', $push_data);
	}

	public function Create() {
		// sesi_check();
		
		$push_data = array(
			'page' 			=> 'instansi/tambah',
			'breadcrumb'	=> 'Tambah Data Instansi',
		);

		$this->load->view('templates/page', $push_data);
	}

	public function Save() {
		// sesi_check();
		
		$push_data = array();
		$this->load->view('instansi/save', $push_data);
	}

	public function Edit() {
		// sesi_check();
		
		$push_data = array();
		$this->load->view('instansi/edit', $push_data);
	}

	public function Update() {
		// sesi_check();
		
		$push_data = array();
		$this->load->view('instansi/update', $push_data);
	}

	public function Delete() {
		// sesi_check();
		
		$push_data = array();
		$this->load->view('instansi/delete', $push_data);
	}

	// SESSION
	function sesi_check() {
		if($this->session->userdata('id') == '') {
			$this->session->sess_destroy();
			redirect(base_url('masuk'));
		}
	}
}
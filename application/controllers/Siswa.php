<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller
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
		
		$list_siswa = $this->Siswa_Model->Cari_Siswa_Id_Instansi($this->session->userdata('id_instansi'));

		$push_data = array(
			'page' 			=> 'siswa/index',
			'breadcrumb'	=> 'Daftar Siswa',
			'siswa'			=> true,
			'siswa_data'	=> $list_siswa,
		);

		$this->load->view('templates/page', $push_data);
	}

	public function Create() {
		// sesi_check();

		$list_kls = $this->Kelas_Model->Cari_Kelas_Id_Instansi($this->session->userdata('id_instansi'));
		
		$push_data = array(
			'page' 			=> 'siswa/tambah',
			'breadcrumb'	=> 'Tambah Data Siswa',
			'siswa'			=> true,
			'kelas_data'	=> $list_kls,
		);

		$this->load->view('templates/page', $push_data);
	}

	public function Save() {
		// sesi_check();
		
		$msg = '';
		
		if($this->input->post('namaSiswaTxt') != '' && $this->input->post('kodeSiswaTxt') != '') {

			$id_instansi 	= $this->session->userdata('id_instansi');	
			$kodeSiswaTxt 	= $this->input->post('kodeSiswaTxt');
			$namaSiswaTxt 	= $this->input->post('namaSiswaTxt');


			$cek_siswa = $this->Siswa_Model->Cari_Siswa_Like($id_instansi, $kodeSiswaTxt, $namaSiswaTxt);
			if(count($cek_siswa) > 0) {
				$msg = 'Siswa sudah terdaftar';
			} else {
				$ins_siswa = $this->Siswa_Model->Tambah_Siswa($id_instansi, $kodeSiswaTxt, $namaSiswaTxt);
				if($ins_siswa) {

					$username = $kodeSiswaTxt;
					$password = md5($kodeSiswaTxt);

					$add_pengguna = $this->Pengguna_Model->Tambah_Pengguna($id_instansi, $username, $password, 'siswa');
					if($tambah_inst) {
						$msg = 'Tambah Siswa sukses';
					} else {
						$msg = 'Tambah akun Siswa gagal';
					}
				} else {
					$msg = 'Tambah siswa gagal';
				}
			}
		} else {
			$msg = 'Form harus diisi';
		}
		
		if($msg != '') {
			redirect(base_url('siswa?msg='.$msg));
		}
	}

	public function Edit() {
		// sesi_check();
		
		$cari_siswa = $this->Siswa_Model->Cari_Siswa_Id($this->input->get('id'));
		if(count($cari_siswa) > 0) {

			$list_kls = $this->Kelas_Model->Cari_Kelas_Id_Instansi($this->session->userdata('id_instansi'));

			$push_data = array(
				'page' 			=> 'siswa/edit',
				'breadcrumb'	=> 'Update Data Siswa',
				'siswa'			=> true,
				'siswa_data'	=> $cari_siswa,
				'kelas_data'	=> $list_kls,
			);

			$this->load->view('templates/page', $push_data);
		} else {
			redirect(base_url('siswa?msg=data siswa tidak ditemukan'));
		}
	}

	public function Update() {
		// sesi_check();
		
		$msg = '';
		
		if($this->input->post('id') != '' && $this->input->post('namaSiswaTxt') != '' && $this->input->post('kodeSiswaTxt') != '') {

			$id 			= $this->input->post('id');
			$id_instansi 	= $this->session->userdata('id_instansi');		
			$kodeSiswaTxt 	= $this->input->post('kodeSiswaTxt');
			$namaSiswaTxt 	= $this->input->post('namaSiswaTxt');

			$cek_siswa = $this->Siswa_Model->Cari_Siswa_Id($id);
			if(count($cek_siswa) > 0) {

				$upd = $this->Siswa_Model->Update_Siswa($id, $id_instansi, $kodeSiswaTxt, $namaSiswaTxt);
				if($upd) {
					$msg = 'Update data Siswa berhasil';
				} else {
					$msg = 'Update data Siswa gagal';
				}
			} else {
				$msg = 'Siswa tidak ditemukan';
			}
		} else {
			$msg = 'Form harus diisi';
		}
		
		if($msg != '') {
			redirect(base_url('siswa?msg='.$msg));
		}
	}

	public function Delete() {
		// sesi_check();
		
		$cari_siswa = $this->Siswa_Model->Cari_Siswa_Id($this->input->get('id'));
		if(count($cari_siswa) > 0) {
			$del = $this->Siswa_Model->Hapus_Siswa($this->input->get('id'));
			if($del) {
				$msg = 'Delete data Siswa berhasil';
			} else {
				$msg = 'Delete data Siswa gagal';
			}
		} else {
			$msg = 'Siswa tidak ditemukan';
		}

		if($msg != '') {
			redirect(base_url('siswa?msg='.$msg));
		}
	}

	// SESSION
	function sesi_check() {
		if($this->session->userdata('id') == '') {
			$this->session->sess_destroy();
			redirect(base_url('masuk'));
		}
	}
}
<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller
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

		$list_kls = $this->Kelas_Model->Cari_Kelas_Id_Instansi($this->session->userdata('id_instansi'));
		
		$push_data = array(
			'page' 			=> 'kelas/index',
			'breadcrumb'	=> 'Daftar Kelas',
			'kelas'			=> true,
			'kelas_data'	=> $list_kls,
		);

		$this->load->view('templates/page', $push_data);
	}

	public function Create() {
		// sesi_check();
		
		$push_data = array(
			'page' 			=> 'kelas/tambah',
			'breadcrumb'	=> 'Tambah Data Kelas',
			'kelas'			=> true,
		);

		$this->load->view('templates/page', $push_data);
	}

	public function Save() {
		// sesi_check();
		
		$msg = '';
		
		if($this->input->post('namaKelasTxt') != '' && $this->input->post('urutanKelasTxt') != '') {

			$id_instansi 	= $this->session->userdata('id_instansi');
			$urutanKelasTxt = $this->input->post('urutanKelasTxt');
			$namaKelasTxt 	= $this->input->post('namaKelasTxt');


			$cek_ins = $this->Instansi_Model->Cari_Instansi_Id($id_instansi);
			if(count($cek_ins) > 0) {

				$nama_kelas = $urutanKelasTxt." ".$namaKelasTxt;
				$kode_kelas = $id_instansi."-".$urutanKelasTxt."-".$namaKelasTxt;
				
				$ins_kelas = $this->Kelas_Model->Tambah_Kelas($id_instansi, $nama_kelas, $kode_kelas);
				if($ins_kelas) {
					$msg = 'Tambah kelas berhasil';
				} else {
					$msg = 'Tambah kelas gagal';
				}
			} else {
				$msg = 'Instansi tidak ditemukan';
			}
		} else {
			$msg = 'Form harus diisi';
		}
		
		if($msg != '') {
			redirect(base_url('kelas?msg='.$msg));
		}
	}

	public function Edit() {
		// sesi_check();

		$cari_kelas = $this->Kelas_Model->Cari_Kelas_Id($this->input->get('id'));
		if(count($cari_kelas) > 0) {
			$push_data = array(
				'page' 			=> 'kelas/edit',
				'breadcrumb'	=> 'Update Data Kelas',
				'kelas'			=> true,
				'kelas_data'	=> $cari_kelas,
			);

			$this->load->view('templates/page', $push_data);
		} else {
			redirect(base_url('kelas?msg=data kelas tidak ditemukan'));
		}
	}

	public function Update() {
		// sesi_check();
		
		$msg = '';
		
		if($this->input->post('id') != '' && $this->input->post('namaKelasTxt') != '' && $this->input->post('urutanKelasTxt') != '') {

			$id_kelas 			= $this->input->post('id');
			$namaKelasTxt 		= $this->input->post('namaKelasTxt');
			$urutanKelasTxt 	= $this->input->post('urutanKelasTxt');

			$cari_kelas = $this->Kelas_Model->Cari_Kelas_Id($id_kelas);
			if(count($cari_kelas) > 0) {

				$nama_kelas = $urutanKelasTxt." ".$namaKelasTxt;
				$kode_kelas = $id_instansi."-".$urutanKelasTxt."-".$namaKelasTxt;

				$upd = $this->Kelas_Model->Update_Kelas($id_kelas, $nama_kelas, $kode_kelas);
				if($upd) {
					$msg = 'Update data Kelas berhasil';
				} else {
					$msg = 'Update data Kelas gagal';
				}
			} else {
				$msg = 'Kelas tidak ditemukan';
			}
		} else {
			$msg = 'Form harus diisi';
		}
		
		if($msg != '') {
			redirect(base_url('kelas?msg='.$msg));
		}
	}

	public function Delete() {
		// sesi_check();
		
		$cari_kelas = $this->Kelas_Model->Cari_Kelas_Id($this->input->get('id'));
		if(count($cari_kelas) > 0) {
			$del = $this->Kelas_Model->Hapus_Kelas($this->input->get('id'));
			if($del) {
				$msg = 'Delete data Kelas berhasil';
			} else {
				$msg = 'Delete data Kelas gagal';
			}
		} else {
			$msg = 'Kelas tidak ditemukan';
		}

		if($msg != '') {
			redirect(base_url('instansi?msg='.$msg));
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
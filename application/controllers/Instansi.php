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

		$list_inst = $this->Instansi_Model->List_Instansi();
		
		$push_data = array(
			'page' 			=> 'instansi/index',
			'breadcrumb'	=> 'Daftar Instansi',
			'instansi'		=> true,
			'instansi_data'	=> $list_inst,
		);

		$this->load->view('templates/page', $push_data);
	}

	public function Create() {
		// sesi_check();
		
		$push_data = array(
			'page' 			=> 'instansi/tambah',
			'breadcrumb'	=> 'Tambah Data Instansi',
			'instansi'		=> true,
		);

		$this->load->view('templates/page', $push_data);
	}

	public function Save() {
		// sesi_check();

		$msg = '';
		
		if($this->input->post('namaInstansiTxt') != '' && $this->input->post('alamatInstansiTxt') != '') {

			$namaInstansiTxt 	= $this->input->post('namaInstansiTxt');
			$alamatInstansiTxt 	= $this->input->post('alamatInstansiTxt');

			$cleanChar = str_replace(array('ú','à', 'á', 'è', 'ì', 'ò', 'ù', '','º','Á','@','#','$','%','^','&','(',')','_','+','=','|','!',' ',',','.','~','/',':','*','?','"','<','>','|',"'"),'',$namaInstansiTxt);

			$account = strtolower(substr(str_shuffle($cleanChar), 0,10));

			$cek_nama = $this->Instansi_Model->Cari_Instansi_Nama($namaInstansiTxt);
			if(count($cek_nama) > 0) {
				$msg = 'Nama instansi sudah ada';
			} else {
				$tambah_inst = $this->Instansi_Model->Tambah_Instansi($namaInstansiTxt, $namaInstansiTxt);
				if($tambah_inst) {

					$username = $account;
					$password = md5($account);

					$last_id = $this->Instansi_Model->Last_Id_Instansi();
					foreach ($last_id as $ky => $vl) {
						$next_id = $vl->id;
					}

					$add_pengguna = $this->Pengguna_Model->Tambah_Pengguna($next_id, $username, $password, 'instansi');
					if($tambah_inst) {
						$msg = 'Tambah instansi sukses';
					} else {
						$msg = 'Tambah akun instansi gagal';
					}
				} else {
					$msg = 'Tambah instansi gagal';
				}
			}
		} else {
			$msg = 'Form harus diisi';
		}
		
		if($msg != '') {
			redirect(base_url('tambah-instansi?msg='.$msg));
		}
	}

	public function Edit() {
		// sesi_check();

		$cari_instansi = $this->Instansi_Model->Cari_Instansi_Id($this->input->get('id'));
		if(count($cari_instansi) > 0) {
			$push_data = array(
				'page' 			=> 'instansi/edit',
				'breadcrumb'	=> 'Update Data Instansi',
				'instansi'		=> true,
				'instansi_data'	=> $cari_instansi,
			);

			$this->load->view('templates/page', $push_data);
		} else {
			redirect(base_url('instansi?msg=data instansi tidak ditemukan'));
		}
	}

	public function Update() {
		// sesi_check();
		
		$msg = '';
		
		if($this->input->post('id') != '' && $this->input->post('namaInstansiTxt') != '' && $this->input->post('alamatInstansiTxt') != '') {

			$id_instansi 		= $this->input->post('id');
			$namaInstansiTxt 	= $this->input->post('namaInstansiTxt');
			$alamatInstansiTxt 	= $this->input->post('alamatInstansiTxt');

			$cari_instansi = $this->Instansi_Model->Cari_Instansi_Id($id_instansi);
			if(count($cari_instansi) > 0) {
				$upd = $this->Instansi_Model->Update_Instansi($id_instansi, $namaInstansiTxt, $alamatInstansiTxt);
				if($upd) {
					$msg = 'Update data Instansi berhasil';
				} else {
					$msg = 'Update data Instansi gagal';
				}
			} else {
				$msg = 'Instansi tidak ditemukan';
			}
		} else {
			$msg = 'Form harus diisi';
		}
		
		if($msg != '') {
			redirect(base_url('instansi?msg='.$msg));
		}
	}

	public function Delete() {
		// sesi_check();
		
		$cari_instansi = $this->Instansi_Model->Cari_Instansi_Id($this->input->get('id'));
		if(count($cari_instansi) > 0) {
			$del = $this->Instansi_Model->Hapus_Instansi($this->input->get('id'));
			if($del) {
				$msg = 'Delete data Instansi berhasil';
			} else {
				$msg = 'Delete data Instansi gagal';
			}
		} else {
			$msg = 'Instansi tidak ditemukan';
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
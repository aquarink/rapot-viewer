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
 
		$list_siswa = $this->Siswa_Model->Cari_Siswa_Id_Instansi($this->session->userdata('id_instansi'));

		$list_kls = $this->Kelas_Model->Cari_Kelas_Id_Instansi($this->session->userdata('id_instansi'));
		
		$push_data = array(
			'page' 			=> 'rapot/tambah',
			'breadcrumb'	=> 'Tambah Data Rapot',
			'rapot'			=> true,
			'siswa_data'	=> $list_siswa,
			'kelas_data'	=> $list_kls,
		);

		$this->load->view('templates/page', $push_data);
	}

	public function Save() {
		// sesi_check();
		
		$msg = '';
		
		if($this->input->post('idSiswa') != '') {

			$id_instansi 	= $this->session->userdata('id_instansi');
			$id_siswa 		= $this->input->post('idSiswa');
			$pilihKelasTxt 	= $this->input->post('pilihKelasTxt');
			$fileRapot 		= $_FILES['fileRapot'];

			// CHECK THUMBNAIL IMAGE TRUE
			$file_name 		= $fileRapot['name'];
			$file_tmp		= $fileRapot['tmp_name'];
			$file_type		= $fileRapot['type'];
			$file_size		= $fileRapot['size'];

			$file_type_bool = false;
			if($file_type == 'application/pdf') {
				$file_type_bool = true;
			}


			if($file_type_bool) {

				$siswa = $this->Siswa_Model->Cari_Siswa_Id($id_siswa);
				if(count($siswa) > 0) {

					foreach ($siswa as $key => $val) {

						$nama_siswa_clean = str_replace(array('ú','à', 'á', 'è', 'ì', 'ò', 'ù', '','º','Á','@','#','$','%','^','&','(',')','_','+','=','|','!',' ',',','.','~','/',':','*','?','"','<','>','|',"'"),'-', $val->nama_siswa);

						// EXTENTION
						$temp 			= explode(".", $file_name);
						$ext 			= end($temp);

						$folderImage 	= 'assets/images/rapot';
						if (!is_dir($folderImage)) {
							mkdir($folderImage, 0777, TRUE);
						}

						$cek_duplicate = $this->Rapot_Model->Cari_Rapot_Duplicate($id_instansi, $pilihKelasTxt, $id_siswa);
						if(count($cek_duplicate) == 0) {

							$file_rename = $id_instansi."_".$pilihKelasTxt."_".$val->kode_siswa."_".$nama_siswa_clean."_".date('Y-m-d-H-i-s').".".$ext;

							if(move_uploaded_file($file_tmp, $folderImage."/".$file_rename)) {

								$path_file_rapot = $folderImage."/".$file_rename;

								$ins_rapot = $this->Rapot_Model->Tambah_Rapot($id_instansi, $id_siswa, $pilihKelasTxt, $path_file_rapot);
								if($ins_rapot) {
									$msg = 'Data rapot berhasil disimpan'; 
								} else {
									$msg = 'Data rapot gagal disimpan';
								}
							} else {
								$msg = 'File rapot gagal upload';
							}
						} else {
							$msg = 'Rapor untuk siswa dan kelas ini sudah ada';
						}
					}
				} else {
					$msg = 'Data Siswa tidak ditemukan';
				}
			} else {
				$msg = 'File rapot tidak valid';
			}
		} else {
			$msg = 'Form harus diisi';
		}
		
		if($msg != '') {
			redirect(base_url('rapot?msg='.$msg));
		}
	}

	public function Edit() {
		// sesi_check();

		$cari_rapot = $this->Rapot_Model->Cari_Rapot_Id($this->input->get('id'));
		if(count($cari_rapot) > 0) {

			$list_siswa = $this->Siswa_Model->Cari_Siswa_Id_Instansi($this->session->userdata('id_instansi'));
			
			$push_data = array(
				'page' 			=> 'rapot/edit',
				'breadcrumb'	=> 'Update Data Rapot',
				'rapot'			=> true,
				'siswa_data'	=> $list_siswa,
				'rapot_data'	=> $cari_rapot,
			);

			$this->load->view('templates/page', $push_data);
		} else {
			redirect(base_url('rapot?msg=data rapot tidak ditemukan'));
		}
	}

	public function Update() {
		// sesi_check();
		
		$msg = '';
		
		if($this->input->post('id') != '' && $this->input->post('id_siswa') != '') {

			$id 			= $this->input->post('id');
			$id_siswa 		= $this->input->post('id_siswa');
			$id_instansi 	= $this->session->userdata('id_instansi');

			$cek_siswa = $this->Rapot_Model->Cari_Rapot_Id($id);
			if(count($cek_siswa) > 0) {

				$fileRapot 		= $_FILES['fileRapot'];

				// CHECK THUMBNAIL IMAGE TRUE
				$file_name 		= $fileRapot['name'];
				$file_tmp		= $fileRapot['tmp_name'];
				$file_type		= $fileRapot['type'];
				$file_size		= $fileRapot['size'];

				$file_type_bool = false;
				if($file_type == 'application/pdf') {
					$file_type_bool = true;
				}


				if($file_type_bool) {

					$siswa = $this->Siswa_Model->Cari_Siswa_Id($id_siswa);
					if(count($siswa) > 0) {

						foreach ($siswa as $key => $val) {

							$nama_siswa_clean = str_replace(array('ú','à', 'á', 'è', 'ì', 'ò', 'ù', '','º','Á','@','#','$','%','^','&','(',')','_','+','=','|','!',' ',',','.','~','/',':','*','?','"','<','>','|',"'"),'-', $val->nama_siswa);

							// EXTENTION
							$temp 			= explode(".", $file_name);
							$ext 			= end($temp);

							$folderImage 	= 'assets/images/rapot';
							if (!is_dir($folderImage)) {
								mkdir($folderImage, 0777, TRUE);
							}


							$file_rename = $val->id_instansi."_".$val->id_kelas."_".$val->kode_siswa."_".$val->nama_siswa_clean."_".date('Y-m-d-H-i-s').".".$ext;

							if(move_uploaded_file($file_tmp, $folderImage."/".$file_rename)) {

								$path_file_rapot = $folderImage."/".$file_rename;

								$ins_rapot = $this->Rapot_Model->Update_Rapot($id, $path_file_rapot);
								if($ins_rapot) {
									$msg = 'Data rapot berhasil diubah';
								} else {
									$msg = 'Data rapot gagal diubah';
								}
							} else {
								$msg = 'File rapot gagal upload';
							}
						}
					} else {
						$msg = 'Data Siswa tidak ditemukan';
					}
				} else {
					$msg = 'File rapot tidak valid';
				}
			} else {
				$msg = 'Siswa tidak ditemukan';
			}
		} else {
			$msg = 'Form harus diisi';
		}
		
		if($msg != '') {
			redirect(base_url('rapot?msg='.$msg));
		}
	}

	public function Delete() {
		// sesi_check();
		
		$cari_rapot = $this->Rapot_Model->Cari_Rapot_Id($this->input->get('id'));
		if(count($cari_rapot) > 0) {
			$del = $this->Rapot_Model->Hapus_Rapot($this->input->get('id'));
			if($del) {
				$msg = 'Delete data Rapot berhasil';
			} else {
				$msg = 'Delete data Rapot gagal';
			}
		} else {
			$msg = 'Rapot tidak ditemukan';
		}

		if($msg != '') {
			redirect(base_url('rapot?msg='.$msg));
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
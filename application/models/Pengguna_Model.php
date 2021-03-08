<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pengguna_Model extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function Cari_Pengguna($id_instansi, $kode_siswa, $password) {        
        $sql = "SELECT * FROM pengguna_tb WHERE id_instansi = ".$this->db->escape($id_instansi)." AND kode_siswa = ".$this->db->escape($kode_siswa)." AND password = ".$this->db->escape($password)." LIMIT 1";         
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function Tambah_Pengguna($id_instansi, $kode_siswa, $password, $role) {

        $sql = "INSERT INTO pengguna_tb(id_instansi, kode_siswa, password, role) "
        . "VALUES("
        . "" . $this->db->escape($id_instansi) . ", "
        . "" . $this->db->escape($kode_siswa) . ", "
        . "" . $this->db->escape($password) . ", "
        . "" . $this->db->escape($role) . ")";
        $this->db->query($sql);
        return $this->db->affected_rows();

    }

    public function Update_Password_Pengguna($id_instansi, $kode_siswa, $password) {
        $sql = "UPDATE pengguna_tb SET password = ".$this->db->escape($password)." WHERE id_instansi = ".$this->db->escape($id_instansi)." AND kode_siswa = ".$this->db->escape($kode_siswa)."";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }
}

<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pengguna_Model extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function Login_Pengguna($username, $password) {        
        $sql = "SELECT * FROM pengguna_tb WHERE username = ".$this->db->escape($username)." AND password = ".$this->db->escape($password)." LIMIT 1";         
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function Cari_Pengguna($id_instansi, $username, $password) {        
        $sql = "SELECT * FROM pengguna_tb WHERE id_instansi = ".$this->db->escape($id_instansi)." AND username = ".$this->db->escape($username)." AND password = ".$this->db->escape($password)." LIMIT 1";         
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function Last_Id_Pengguna() {        
        $sql = "SELECT id FROM pengguna_tb ORDER BY id DESC LIMIT 1";         
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function Cari_Pengguna_Siswa($id_instansi, $username) {        
        $sql = "SELECT pgn.*, sws.kode_siswa kode, sws.nama_siswa nama FROM pengguna_tb pgn LEFT JOIN siswa_tb sws ON pgn.username = sws.kode_siswa WHERE pgn.id_instansi = ".$this->db->escape($id_instansi)." AND pgn.username = ".$this->db->escape($username)." LIMIT 1";         
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function Cari_Pengguna_Instansi($id_instansi, $username) {        
        $sql = "SELECT pgn.*, ins.id kode, ins.nama_instansi nama FROM pengguna_tb pgn LEFT JOIN instansi_tb ins ON pgn.id_instansi = ins.id WHERE pgn.id_instansi = ".$this->db->escape($id_instansi)." AND pgn.username = ".$this->db->escape($username)." LIMIT 1";         
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function Cari_Pengguna_Admin() {        
        $sql = "SELECT id, id_instansi kode, username, username nama FROM pengguna_tb WHERE username = 'admin' AND id_instansi = '99999' LIMIT 1";         
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function Tambah_Pengguna($id_instansi, $username, $password, $role) {

        $sql = "INSERT INTO pengguna_tb(id_instansi, username, password, role) "
        . "VALUES("
        . "" . $this->db->escape($id_instansi) . ", "
        . "" . $this->db->escape($username) . ", "
        . "" . $this->db->escape($password) . ", "
        . "" . $this->db->escape($role) . ")";
        $this->db->query($sql);
        return $this->db->affected_rows();

    }

    public function Update_Password_Pengguna($id_instansi, $username, $password) {
        $sql = "UPDATE pengguna_tb SET password = ".$this->db->escape($password)." WHERE id_instansi = ".$this->db->escape($id_instansi)." AND username = ".$this->db->escape($username)."";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }
}

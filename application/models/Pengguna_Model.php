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

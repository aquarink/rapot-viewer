<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Instansi_Model extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function Cari_Instansi($id) {        
        $sql = "SELECT * FROM instansi_tb WHERE id = ".$this->db->escape($id)." LIMIT 1";         
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function Tambah_Instansi($nama_instansi, $alamat) {

        $sql = "INSERT INTO instansi_tb(nama_instansi, alamat) "
        . "VALUES("
        . "" . $this->db->escape($nama_instansi) . ", "
        . "" . $this->db->escape($alamat) . ")";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }

    public function Update_Instansi($id, $nama_instansi, $alamat) {
        $sql = "UPDATE instansi_tb SET nama_instansi = ".$this->db->escape($nama_instansi).", alamat = ".$this->db->escape($alamat)." WHERE id = ".$this->db->escape($id)."";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }

    public function Hapus_Instansi($id, $id_instansi) {        
        $sql = "DELETE FROM instansi_tb WHERE id = ".$this->db->escape($id)." AND id_instansi = ".$this->db->escape($id_instansi)." LIMIT 1";         
        $query = $this->db->query($sql);
        return $query->result();
    }
}

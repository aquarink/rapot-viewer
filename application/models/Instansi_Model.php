<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Instansi_Model extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function All_Instnsi() {
        $sql = "SELECT COUNT(id) jml FROM instansi_tb";         
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function Cari_Instansi($id) {        
        $sql = "SELECT * FROM instansi_tb WHERE id = ".$this->db->escape($id)." LIMIT 1";         
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function Cari_Instansi_Nama($nama_instansi) {        
        $sql = "SELECT * FROM instansi_tb WHERE nama_instansi LIKE '%".$nama_instansi."%'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function Cari_Instansi_Id($id_instansi) {        
        $sql = "SELECT * FROM instansi_tb WHERE id = ".$this->db->escape($id_instansi)."";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function List_Instansi() {        
        $sql = "SELECT it.*, pg.username FROM instansi_tb it LEFT JOIN pengguna_tb pg ON pg.id_instansi = it.id";         
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function Last_Id_Instansi() {        
        $sql = "SELECT id FROM instansi_tb ORDER BY id DESC LIMIT 1";         
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

    public function Hapus_Instansi($id) {        
        $sql = "DELETE FROM instansi_tb WHERE id = ".$this->db->escape($id)."";         
        $this->db->query($sql);
        return $this->db->affected_rows();
    }
}

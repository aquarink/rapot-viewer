<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Kelas_Model extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function Cari_Kelas($id_instansi, $kode_kelas) {        
        $sql = "SELECT * FROM kelas_tb WHERE id_instansi = ".$this->db->escape($id_instansi)." AND kode_kelas = ".$this->db->escape($kode_kelas)." LIMIT 1";         
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function Tambah_Kelas($id_instansi, $nama_kelas, $kode_kelas) {

        $sql = "INSERT INTO kelas_tb(id_instansi, nama_kelas, kode_kelas) "
        . "VALUES("
        . "" . $this->db->escape($id_instansi) . ", "
        . "" . $this->db->escape($nama_kelas) . ", "
        . "" . $this->db->escape($kode_kelas) . ")";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }

    public function Update_Kelas($id, $id_instansi, $nama_kelas) {
        $sql = "UPDATE kelas_tb SET nama_kelas = ".$this->db->escape($nama_kelas)." WHERE id = ".$this->db->escape($id)." AND id_instansi = ".$this->db->escape($id_instansi)."";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }

    public function Hapus_Kelas($id, $id_instansi, $kode_kelas) {        
        $sql = "DELETE FROM kelas_tb WHERE id = ".$this->db->escape($id)." AND id_instansi = ".$this->db->escape($id_instansi)." AND kode_kelas = ".$this->db->escape($kode_kelas)." LIMIT 1";         
        $query = $this->db->query($sql);
        return $query->result();
    }
}

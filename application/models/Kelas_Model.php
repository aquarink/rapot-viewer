<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Kelas_Model extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function All_Kelas() {
        $sql = "SELECT COUNT(id) jml FROM kelas_tb";         
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function Cari_Kelas($id_instansi, $kode_kelas) {        
        $sql = "SELECT * FROM kelas_tb WHERE id_instansi = ".$this->db->escape($id_instansi)." AND kode_kelas = ".$this->db->escape($kode_kelas)." LIMIT 1";         
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function Cari_Kelas_Id($id) {        
        $sql = "SELECT * FROM kelas_tb WHERE id = ".$this->db->escape($id)." LIMIT 1";         
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function Cari_Kelas_Id_Instansi($id_instansi) {        
        $sql = "SELECT kls.*, ins.nama_instansi FROM kelas_tb kls LEFT JOIN instansi_tb ins ON ins.id = kls.id_instansi WHERE id_instansi = ".$this->db->escape($id_instansi)."";         
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

    public function Update_Kelas($id, $nama_kelas, $kode_kelas) {
        $sql = "UPDATE kelas_tb SET nama_kelas = ".$this->db->escape($nama_kelas).", kode_kelas = ".$this->db->escape($kode_kelas)." WHERE id = ".$this->db->escape($id)."";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }

    public function Hapus_Kelas($id) {        
        $sql = "DELETE FROM kelas_tb WHERE id = ".$this->db->escape($id)."";         
        $this->db->query($sql);
        return $this->db->affected_rows();
    }
}

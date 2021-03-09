<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Siswa_Model extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function Cari_Siswa($id_instansi, $kode_siswa) {        
        $sql = "SELECT * FROM siswa_tb WHERE id_instansi = ".$this->db->escape($id_instansi)." AND kode_siswa = ".$this->db->escape($kode_siswa)." LIMIT 1";         
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function Cari_Siswa_Id($id) {        
        $sql = "SELECT sis.*, ins.nama_instansi FROM siswa_tb sis LEFT JOIN instansi_tb ins ON ins.id = sis.id_instansi WHERE sis.id = ".$this->db->escape($id)."";           
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function Cari_Siswa_Kode_Siswa($kode_siswa) {        
        $sql = "SELECT sis.*, ins.nama_instansi FROM siswa_tb sis LEFT JOIN instansi_tb ins ON ins.id = sis.id_instansi WHERE sis.kode_siswa = ".$this->db->escape($kode_siswa)."";           
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function Cari_Siswa_Id_Instansi($id_instansi) {        
        $sql = "SELECT sis.*, ins.nama_instansi FROM siswa_tb sis LEFT JOIN instansi_tb ins ON ins.id = sis.id_instansi WHERE sis.id_instansi = ".$this->db->escape($id_instansi)."";         
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function Cari_Siswa_Nama($id_instansi, $nama_siswa) {        
        $sql = "SELECT * FROM siswa_tb WHERE nama_siswa LIKE '%".$nama_siswa."%' AND id_instansi = ".$this->db->escape($id_instansi)."";         
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function Cari_Siswa_Like($id_instansi, $kode_siswa, $nama_siswa) {        
        $sql = "SELECT * FROM siswa_tb WHERE kode_siswa LIKE '%".$kode_siswa."%' OR nama_siswa LIKE '%".$nama_siswa."%' AND id_instansi = ".$this->db->escape($id_instansi)."";         
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function Tambah_Siswa($id_instansi, $kode_siswa, $nama_siswa) {

        $sql = "INSERT INTO siswa_tb(id_instansi, kode_siswa, nama_siswa) "
        . "VALUES("
        . "" . $this->db->escape($id_instansi) . ", "
        . "" . $this->db->escape($kode_siswa) . ", "
        . "" . $this->db->escape($nama_siswa) . ")";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }

    public function Update_Siswa($id, $id_instansi, $kode_siswa, $nama_siswa) {
        $sql = "UPDATE siswa_tb SET kode_siswa = ".$this->db->escape($kode_siswa).", nama_siswa = ".$this->db->escape($nama_siswa)." WHERE id = ".$this->db->escape($id)." AND id_instansi = ".$this->db->escape($id_instansi)."";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }

    public function Hapus_Siswa($id) {        
        $sql = "DELETE FROM siswa_tb WHERE id = ".$this->db->escape($id)."";         
        $this->db->query($sql);
        return $this->db->affected_rows();
    }
}

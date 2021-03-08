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

    public function Tambah_Siswa($id_instansi, $id_kelas, $kode_siswa, $nama_siswa) {

        $sql = "INSERT INTO siswa_tb(id_instansi, id_kelas, kode_siswa, nama_siswa) "
        . "VALUES("
        . "" . $this->db->escape($id_instansi) . ", "
        . "" . $this->db->escape($id_kelas) . ", "
        . "" . $this->db->escape($kode_siswa) . ", "
        . "" . $this->db->escape($nama_siswa) . ")";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }

    public function Update_Siswa($id, $id_instansi, $id_kelas, $kode_siswa, $nama_siswa) {
        $sql = "UPDATE siswa_tb SET id_kelas = ".$this->db->escape($id_kelas).", kode_siswa = ".$this->db->escape($kode_siswa).", nama_siswa = ".$this->db->escape($nama_siswa)." WHERE id = ".$this->db->escape($id)." AND id_instansi = ".$this->db->escape($id_instansi)."";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }

    public function Hapus_Siswa($id, $id_instansi, $kode_siswa) {        
        $sql = "DELETE FROM siswa_tb WHERE id = ".$this->db->escape($id)." AND id_instansi = ".$this->db->escape($id_instansi)." AND kode_siswa = ".$this->db->escape($kode_siswa)." LIMIT 1";         
        $query = $this->db->query($sql);
        return $query->result();
    }
}

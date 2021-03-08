<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Rapot_Model extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function Cari_Rapot($id_instansi, $id_siswa, $id_kelas) {        
        $sql = "SELECT * FROM rapot_tb WHERE id_instansi = ".$this->db->escape($id_instansi)." AND id_siswa = ".$this->db->escape($id_siswa)." AND id_kelas = ".$this->db->escape($id_kelas)." LIMIT 1";         
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function Tambah_Rapot($id_instansi, $id_siswa, $id_kelas, $path_file_rapot) {

        $sql = "INSERT INTO rapot_tb(id_instansi, id_siswa, id_kelas, path_file_rapot) "
        . "VALUES("
        . "" . $this->db->escape($id_instansi) . ", "
        . "" . $this->db->escape($id_siswa) . ", "
        . "" . $this->db->escape($id_kelas) . ", "
        . "" . $this->db->escape($path_file_rapot) . ")";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }

    public function Update_Rapot($id, $id_instansi, $id_siswa, $id_kelas, $path_file_rapot) {
        $sql = "UPDATE rapot_tb SET path_file_rapot = ".$this->db->escape($path_file_rapot)." WHERE id = ".$this->db->escape($id)." AND id_instansi = ".$this->db->escape($id_instansi)." AND id_siswa = ".$this->db->escape($id_siswa)." AND id_kelas = ".$this->db->escape($id_kelas)."";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }

    public function Hapus_Rapot($id, $id_instansi, $id_siswa, $id_kelas) {        
        $sql = "DELETE FROM rapot_tb WHERE id = ".$this->db->escape($id)." AND id_instansi = ".$this->db->escape($id_instansi)." AND id_siswa = ".$this->db->escape($id_siswa)." AND id_kelas = ".$this->db->escape($id_kelas)." LIMIT 1";         
        $query = $this->db->query($sql);
        return $query->result();
    }
}

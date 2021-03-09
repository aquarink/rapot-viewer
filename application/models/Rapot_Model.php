<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Rapot_Model extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function All_Rapot() {
        $sql = "SELECT COUNT(id) jml FROM rapot_tb";         
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function Cari_Rapot($id_instansi, $kode_siswa) {        
        $sql = "SELECT rpt.*, sws.kode_siswa, sws.nama_siswa, kls.nama_kelas, kls.kode_kelas FROM rapot_tb rpt LEFT JOIN siswa_tb sws ON sws.id = rpt.id_siswa LEFT JOIN kelas_tb kls ON kls.id = rpt.id_kelas WHERE rpt.id_instansi = ".$this->db->escape($id_instansi)." AND sws.kode_siswa = ".$this->db->escape($kode_siswa)."";         
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function Cari_Rapot_Id($id) {        
        $sql = "SELECT rpt.*, ins.id idinstansi, ins.nama_instansi, sws.id idsiswa, sws.nama_siswa, sws.kode_siswa, kls.nama_kelas, kls.kode_kelas FROM rapot_tb rpt LEFT JOIN instansi_tb ins ON ins.id = rpt.id_instansi LEFT JOIN siswa_tb sws ON sws.id = rpt.id_siswa LEFT JOIN kelas_tb kls ON kls.id = rpt.id_kelas WHERE rpt.id = ".$this->db->escape($id)."";       
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function List_Rapot($id_instansi) {        
        $sql = "SELECT rpt.*, ins.id idinstansi, ins.nama_instansi, sws.nama_siswa, sws.kode_siswa, kls.nama_kelas, kls.kode_kelas FROM rapot_tb rpt LEFT JOIN instansi_tb ins ON ins.id = rpt.id_instansi LEFT JOIN siswa_tb sws ON sws.id = rpt.id_siswa LEFT JOIN kelas_tb kls ON kls.id = rpt.id_kelas WHERE rpt.id_instansi = ".$this->db->escape($id_instansi)."";         
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function Cari_Rapot_id_instansi($id_instansi) {        
        $sql = "SELECT * FROM rapot_tb WHERE id_instansi = ".$this->db->escape($id_instansi)."";         
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

    public function Update_Rapot($id, $path_file_rapot) {
        $sql = "UPDATE rapot_tb SET path_file_rapot = ".$this->db->escape($path_file_rapot)." WHERE id = ".$this->db->escape($id)."";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }

    public function Hapus_Rapot($id) {        
        $sql = "DELETE FROM rapot_tb WHERE id = ".$this->db->escape($id)."";         
        $this->db->query($sql);
        return $this->db->affected_rows();
    }
}

<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Author rendi widjaya
 * xcode-dev 2021
 * copyright
 */
class M_Dashboard extends CI_Model{

    public function tahun(){
        $this->db->order_by('kode', 'desc');
        $result = $this->db->get('tm_setting_tahun');
        return $result->result();
    }

    public function filter_kesiswaan($userID){
        $this->db->select("s.kode, k.jenjang_lembaga, s.tahun_pelajaran,
            total_rakel_L,
            total_rakel_P,
            total_mikel_L,
            total_mikel_P,
            total_mtkel_L,
            total_mtkel_P,
            total_makel_L,
            total_makel_P");
        $this->db->from('tt_kesiswaan k');
        $this->db->join('tm_setting_tahun s', 'k.st_tahun_id = s.id_setting', 'left');
        // $this->db->like('s.kode', $kode);
        $this->db->where('lembaga_id', $userID);
        // $this->db->group_by('k.jenjang_lembaga');
        
        $query = $this->db->get();
        return $query->result();        
    }

    public function filter_gtk($kode, $userID){
        $this->db->select("kode,tahun_pelajaran,
            SUM(CASE jk WHEN 'L' THEN (CASE status_kepegawaian WHEN 'PNS' THEN jabatan = 'Guru' END) END) As guru_pns_L,
            SUM(CASE jk WHEN 'P' THEN (CASE status_kepegawaian WHEN 'PNS' THEN jabatan = 'Guru' END) END) As guru_pns_P,
            SUM(CASE jk WHEN 'L' THEN (CASE status_kepegawaian WHEN 'Honorer' THEN jabatan = 'Guru' END) END) As guru_honorer_L,
            SUM(CASE jk WHEN 'P' THEN (CASE status_kepegawaian WHEN 'Honorer' THEN jabatan = 'Guru' END) END) As guru_honorer_P,
            SUM(CASE status_sertifikasi WHEN 'Sudah Sertifikasi' THEN (CASE status_kepegawaian WHEN 'PNS' THEN jabatan = 'Guru' END) END) As guru_pns_serti,
            SUM(CASE status_sertifikasi WHEN 'Belum Sertifikasi' THEN (CASE status_kepegawaian WHEN 'PNS' THEN jabatan = 'Guru' END) END) As guru_pns_nonserti,
            SUM(CASE status_sertifikasi WHEN 'Sudah Sertifikasi' THEN (CASE status_kepegawaian WHEN 'Honorer' THEN jabatan = 'Guru' END) END) As guru_honor_serti,
            SUM(CASE status_sertifikasi WHEN 'Belum Sertifikasi' THEN (CASE status_kepegawaian WHEN 'Honorer' THEN jabatan = 'Guru' END) END) As guru_honor_nonserti,
            SUM(CASE status_inpassing WHEN 'Sudah Inpassing' THEN (CASE status_kepegawaian WHEN 'Honorer' THEN jabatan = 'Guru' END) END) As guru_honor_inpassing,
            SUM(CASE jk WHEN 'L' THEN (CASE status_kepegawaian WHEN 'PNS' THEN jabatan = 'Tendik' END) END) As tendik_pns_L,
            SUM(CASE jk WHEN 'P' THEN (CASE status_kepegawaian WHEN 'PNS' THEN jabatan = 'Tendik' END) END) As tendik_pns_P,
            SUM(CASE jk WHEN 'L' THEN (CASE status_kepegawaian WHEN 'Honorer' THEN jabatan = 'Tendik' END) END) As tendik_honorer_L,
            SUM(CASE jk WHEN 'P' THEN (CASE status_kepegawaian WHEN 'Honorer' THEN jabatan = 'Tendik' END) END) As tendik_honorer_P,");
        $this->db->from('tt_gtk_detail d');
        $this->db->join('tt_gtk h', 'h.id_gtk = d.gtk_id');
        $this->db->join('tm_setting_tahun s', 's.id_setting = h.st_tahun_id');
        $this->db->like('kode', $kode);
        $this->db->where('lembaga_id', $userID);
        $result = $this->db->get();

        return $result->result();
    }
}
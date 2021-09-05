<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Author rendi widjaya
 * xcode-dev 2021
 * copyright
 */
class M_RekapGtk extends CI_Model{
    
    public function jenjang(){
        $result = $this->db->get('tm_jenjang');
        return $result->result();
    }

    public function kecamatan(){
        $result = $this->db->get('tm_kecamatan');
        return $result->result();
    }

    public function tahun(){
        $this->db->order_by('kode', 'desc');
        $result = $this->db->get('tm_setting_tahun');
        return $result->result();
    }

    public function data_search($data){
        $this->db->select('*');
        $this->db->from('tt_lembaga L');
        $this->db->join('tt_gtk K', 'K.lembaga_id = L.id_lembaga', 'left');
        $this->db->join('tm_setting_tahun S', 'S.id_setting = K.st_tahun_id', 'left');
        $this->db->join('tm_kecamatan C', 'C.code = L.code_kec', 'left');
        $this->db->like('kode', $data->kode);
        $this->db->like('semester', $data->semester);
        $this->db->like('jenjang', $data->jenjang);
        $this->db->like('code_kec', $data->code_kec);
        $query = $this->db->get()->result();
        
        return $query;
    }

    public function count_spec($key){
        $this->db->select("*, COUNT(jabatan) As count,
        COUNT(CASE jk WHEN 'L' THEN (CASE status_kepegawaian WHEN 'PNS' THEN jabatan = 'Guru' END) END) As pns_L,
        COUNT(CASE jk WHEN 'P' THEN (CASE status_kepegawaian WHEN 'PNS' THEN jabatan = 'Guru' END) END) As pns_P,
        COUNT(CASE jk WHEN 'L' THEN (CASE status_kepegawaian WHEN 'Honorer' THEN jabatan = 'Guru' END) END) As honorer_L,
        COUNT(CASE jk WHEN 'P' THEN (CASE status_kepegawaian WHEN 'Honorer' THEN jabatan = 'Guru' END) END) As honorer_P,
        COUNT(CASE status_sertifikasi WHEN 'Sudah Sertifikasi' THEN (CASE status_kepegawaian WHEN 'PNS' THEN jabatan = 'Guru' END) END) As pns_serti,
        COUNT(CASE status_sertifikasi WHEN 'Belum Sertifikasi' THEN (CASE status_kepegawaian WHEN 'PNS' THEN jabatan = 'Guru' END) END) As pns_nonserti,
        COUNT(CASE status_sertifikasi WHEN 'Sudah Sertifikasi' THEN (CASE status_kepegawaian WHEN 'Honorer' THEN jabatan = 'Guru' END) END) As honor_serti,
        COUNT(CASE status_sertifikasi WHEN 'Belum Sertifikasi' THEN (CASE status_kepegawaian WHEN 'Honorer' THEN jabatan = 'Guru' END) END) As honor_nonserti,
        COUNT(CASE status_inpassing WHEN 'Sudah Inpassing' THEN (CASE status_kepegawaian WHEN 'Honorer' THEN jabatan = 'Guru' END) END) As honor_inpassing");
        $this->db->from('tt_gtk_detail');
        $this->db->where('gtk_id', $key);
        $this->db->group_by('jabatan');
        $result = $this->db->get();

        $data = [];
        foreach ($result->result() as $item) {
            if (!isset($data[$item->jabatan]['total'])) {
                $data[$item->jabatan]['total'] = 0;
            }
            $data[$item->jabatan]['total'] += $item->count;
            $data[$item->jabatan]['pns_L'] = $item->pns_L;
            $data[$item->jabatan]['pns_P'] = $item->pns_P;
            $data[$item->jabatan]['honorer_L'] = $item->honorer_L;
            $data[$item->jabatan]['honorer_P'] = $item->honorer_P;
            $data[$item->jabatan]['pns_serti'] = $item->pns_serti;
            $data[$item->jabatan]['pns_nonserti'] = $item->pns_nonserti;
            $data[$item->jabatan]['honor_serti'] = $item->honor_serti;
            $data[$item->jabatan]['honor_nonserti'] = $item->honor_nonserti;
            $data[$item->jabatan]['honor_inpassing'] = $item->honor_inpassing;
        }

        return $data;
    }

}
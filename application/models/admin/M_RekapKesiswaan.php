<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Author rendi widjaya
 * xcode-dev 2021
 * copyright
 */
class M_RekapKesiswaan extends CI_Model{
    
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
        $this->db->join('tt_kesiswaan K', 'K.lembaga_id = L.id_lembaga', 'left');
        $this->db->join('tm_setting_tahun S', 'S.id_setting = K.st_tahun_id', 'left');
        $this->db->join('tm_kecamatan C', 'C.code = L.code_kec', 'left');
        $this->db->like('kode', $data->kode);
        $this->db->like('semester', $data->semester);
        $this->db->like('jenjang', $data->jenjang);
        $this->db->like('code_kec', $data->code_kec);
        $query = $this->db->get()->result();
        
        return $query;
    }

}
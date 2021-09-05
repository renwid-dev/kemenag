<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Author rendi widjaya
 * xcode-dev 2021
 * copyright
 */
class M_Gtk extends CI_Model{
    
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

    public function get_tahun($data){
        $this->db->select('*');
        $this->db->from('tm_setting_tahun');
        $result = $this->db->where('kode', $data)->get()->result();
        return $result;
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
 
    public function get_gtk($key){
        $this->db->select('*');
        $this->db->from('tt_gtk');
        $this->db->join('tm_setting_tahun', 'tt_gtk.st_tahun_id = tm_setting_tahun.id_setting', 'left');
        $this->db->where('tt_gtk.id_gtk', $key);
        $result = $this->db->get()->result();
        return $result;
    }

    public function get_gtk_detail($key){
        $this->db->select('*');
        $this->db->from('tt_gtk_detail');
        $this->db->join('tt_gtk', 'tt_gtk.id_gtk = tt_gtk_detail.gtk_id');
        $this->db->where('tt_gtk_detail.gtk_id', $key);
        $result = $this->db->get()->result();
        return $result;
    }

    public function data_gtk_detail($key){
        $this->db->select('*');
        $this->db->from('tt_gtk_detail');
        $this->db->where('id_gtk_detail', $key);
        $result = $this->db->get()->result();
        return $result;
    }

    public function save_detail($data){
        $xdata = array(
            'gtk_id' => $data->gtk_id, 
            'lembaga_id_d' => $data->lembaga_id, 
            'jabatan' => $data->jabatan, 
            'nama' => $data->nama, 
            'jk' => $data->jk, 
            'status_kepegawaian' => $data->status_kepegawaian, 
            'status_sertifikasi' => $data->status_sertifikasi, 
            'status_tpp' => $data->status_tpp, 
            'status_inpassing' => $data->status_inpassing, 
        );

        $this->db->insert('tt_gtk_detail', $xdata);
    }

    public function update_detail($data){
        $this->db->set('jabatan', $data->jabatan);
        $this->db->set('nama', $data->nama);
        $this->db->set('jk', $data->jk);
        $this->db->set('status_kepegawaian', $data->status_kepegawaian);
        $this->db->set('status_sertifikasi', $data->status_sertifikasi);
        $this->db->set('status_tpp', $data->status_tpp);
        $this->db->set('status_inpassing', $data->status_inpassing);
        $this->db->where('id_gtk_detail', $data->gtkID);

        $query = $this->db->update('tt_gtk_detail');
        return $query;
    }

    public function del_detail($key){
        $this->db->where('id_gtk_detail', $key);

        $query = $this->db->delete('tt_gtk_detail');
        return $query;
    }

}
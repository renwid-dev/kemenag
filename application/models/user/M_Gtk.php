<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Author rendi widjaya
 * xcode-dev 2021
 * copyright
 */
class M_Gtk extends CI_Model{
    
    public function get_list($key){
        $this->db->select('*');
        $this->db->from('tt_gtk');
        $this->db->join('tt_lembaga', 'tt_gtk.lembaga_id = tt_lembaga.id_lembaga', 'left');
        $this->db->join('tm_setting_tahun', 'tt_gtk.st_tahun_id = tm_setting_tahun.id_setting', 'left');
        $this->db->where(array('tm_setting_tahun.akses_user' => '1', 'tt_gtk.lembaga_id' => $key));
        $result = $this->db->get();
        return $result->result();
    }

    public function get_gtk($key){
        $this->db->select('*');
        $this->db->from('tt_gtk');
        $this->db->join('tm_setting_tahun', 'tt_gtk.st_tahun_id = tm_setting_tahun.id_setting', 'left');
        $this->db->where('tt_gtk.id_gtk', $key);
        $result = $this->db->get();
        return $result->result();
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

    public function count_gtk($key){
        $this->db->select('*');
        $this->db->from('tt_gtk_detail');
        $this->db->where('gtk_id', $key);
        $result = $this->db->get();
        return $result->num_rows();
    }

    public function count_spec($key){
        $this->db->select('*, count(jabatan) as count');
        $this->db->from('tt_gtk_detail');
        $this->db->where('gtk_id', $key);
        $this->db->group_by('jabatan, jk');
        $result = $this->db->get();

        $data = array();
        foreach ($result->result() as $item) {
            if (!isset($data[$item->jabatan]['Total'])) {
                $data[$item->jabatan]['Total'] = 0;
            }
            $data[$item->jabatan]['Total'] += $item->count;
            $data[$item->jabatan][$item->jk] = $item->count;
        }

        return $data;        
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
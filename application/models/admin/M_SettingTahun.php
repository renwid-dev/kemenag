<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Author rendi widjaya
 * xcode-dev 2021
 * copyright
 */
class M_SettingTahun extends CI_Model{

    public function set_list(){
        $this->db->order_by('tahun_pelajaran', 'desc');
        $result = $this->db->get('tm_setting_tahun');
        return $result->result();
    }

    public function get_setting($key){
        $this->db->where('id_setting ', $key);
        $result = $this->db->get('tm_setting_tahun');
        return $result->result();
    }

    public function add_setting($data){
        $data = array(
            'kode' => $data->kode, 
            'tahun_pelajaran' => $data->tahun_pelajaran, 
            'semester' => $data->semester, 
            'akses_user' => $data->akses_user, 
            'akses_izinkan' => $data->akses_izinkan, 
        );

        $result = $this->db->insert('tm_setting_tahun', $data);
        return $result;
    }

    public function update_setting($data){
        $this->db->set('kode', $data->kode);
        $this->db->set('tahun_pelajaran', $data->tahun_pelajaran);
        $this->db->set('semester', $data->semester);
        $this->db->set('akses_user', $data->akses_user);
        $this->db->set('akses_izinkan', $data->akses_izinkan);
        $this->db->where('id_setting ', $data->id);

        $result = $this->db->update('tm_setting_tahun');
        return $result;
    }

    public function del_setting($key){
        $this->db->where('id_setting ', $key);

        $result = $this->db->delete('tm_setting_tahun');
        return $result;
    }
}
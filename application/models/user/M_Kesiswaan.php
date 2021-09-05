<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Author rendi widjaya
 * xcode-dev 2021
 * copyright
 */
class M_Kesiswaan extends CI_Model{
    
    public function get_list($key){
        $this->db->select('*');
        $this->db->from('tt_kesiswaan');
        $this->db->join('tt_lembaga', 'tt_kesiswaan.lembaga_id = tt_lembaga.id_lembaga', 'left');
        $this->db->join('tm_setting_tahun', 'tt_kesiswaan.st_tahun_id = tm_setting_tahun.id_setting', 'left');
        $this->db->where(array('tm_setting_tahun.akses_user' => '1', 'tt_kesiswaan.lembaga_id' => $key));
        $result = $this->db->get();
        return $result->result();
    }

    public function get_kesiswaan($key){
        $this->db->select('*');
        $this->db->from('tt_kesiswaan');
        $this->db->join('tm_setting_tahun', 'tt_kesiswaan.st_tahun_id = tm_setting_tahun.id_setting', 'left');
        $this->db->where('tt_kesiswaan.id_kesiswaan', $key);
        $result = $this->db->get();
        return $result->result();
    }

    public function save_update($data){

        $this->db->set('kelompok_AL', $data->kelompok_AL);
        $this->db->set('kelompok_AP', $data->kelompok_AP);
        $this->db->set('kelompok_BL', $data->kelompok_BL);
        $this->db->set('kelompok_BP',$data->kelompok_BP);
        $this->db->set('total_rakel_L', $data->total_rakel_L);
        $this->db->set('total_rakel_P', $data->total_rakel_P);
        $this->db->set('kelas1_L', $data->kelas1_L);
        $this->db->set('kelas1_P', $data->kelas1_P);
        $this->db->set('kelas2_L', $data->kelas2_L);
        $this->db->set('kelas2_P', $data->kelas2_P);
        $this->db->set('kelas3_L', $data->kelas3_L);
        $this->db->set('kelas3_P', $data->kelas3_P);
        $this->db->set('kelas4_L', $data->kelas4_L);
        $this->db->set('kelas4_P', $data->kelas4_P);
        $this->db->set('kelas5_L', $data->kelas5_L);
        $this->db->set('kelas5_P', $data->kelas5_P);
        $this->db->set('kelas6_L', $data->kelas6_L);
        $this->db->set('kelas6_P',$data->kelas6_P);
        $this->db->set('total_mikel_L', $data->total_mikel_L);
        $this->db->set('total_mikel_P', $data->total_mikel_P);
        $this->db->set('kelas7_L',$data->kelas7_L);
        $this->db->set('kelas7_P', $data->kelas7_P);
        $this->db->set('kelas8_L', $data->kelas8_L);
        $this->db->set('kelas8_P', $data->kelas8_P);
        $this->db->set('kelas9_L', $data->kelas9_L);
        $this->db->set('kelas9_P', $data->kelas9_P);
        $this->db->set('total_mtkel_L', $data->total_mtkel_L);
        $this->db->set('total_mtkel_P', $data->total_mtkel_P);
        $this->db->set('kelas10_L', $data->kelas10_L);
        $this->db->set('kelas10_P', $data->kelas10_P);
        $this->db->set('kelas11_L', $data->kelas11_L);
        $this->db->set('kelas11_P', $data->kelas11_P);
        $this->db->set('kelas12_L', $data->kelas12_L);
        $this->db->set('kelas12_P', $data->kelas12_P);
        $this->db->set('total_makel_L', $data->total_makel_L);
        $this->db->set('total_makel_P', $data->total_makel_P);
        $this->db->where('id_kesiswaan', $data->id_kesiswaan);

        $query = $this->db->update('tt_kesiswaan');
        return $query;
    }
}
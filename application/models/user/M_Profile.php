<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Author rendi widjaya
 * xcode-dev 2021
 * copyright
 */
class M_Profile extends CI_Model{

    public function get_user($key){
        $this->db->select('*');
        $this->db->from('tt_lembaga');
        $this->db->join('tt_lembaga_detail', 'tt_lembaga_detail.id_header  = tt_lembaga.id_lembaga', 'left');
        $this->db->join('tm_kecamatan', 'tm_kecamatan.code = tt_lembaga.code_kec');
        $this->db->where('nsm', $key);
        $result = $this->db->get();
        return $result->result();
    }

    public function cek_password($user_id, $old_password){
        $query = $this->db->query("SELECT * FROM tt_lembaga WHERE nsm='$user_id' AND password='$old_password'");

        return $query->result();
    }

    public function change_password($userID,$data){
        $this->db->set('password', $data->new_password);
        $this->db->where('nsm', $userID);

        $result = $this->db->update('tt_lembaga');
        return $result;
    }

    public function save_upload($userID, $fileName){
        $this->db->set('file_user', $fileName);
        $this->db->where('nsm', $userID);

        $query = $this->db->update('tt_lembaga');
        return $query;
    }
   
}
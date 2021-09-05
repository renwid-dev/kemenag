<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Author rendi widjaya
 * xcode-dev 2021
 * copyright
 */
class M_Profile extends CI_Model{

    public function get_user($key){
        $this->db->where('user_id', $key);
        $result = $this->db->get('tm_user');
        return $result->result();
    }

    public function update_user($data){
        $this->db->set('name', $data->name);
        $this->db->set('email', $data->email);
        $this->db->set('username', $data->username);
        $this->db->where('user_id', $data->user_id);

        $result = $this->db->update('tm_user');
        return $result;
    }

    public function cek_password($user_id, $old_password){
        $query = $this->db->query("SELECT * FROM tm_user WHERE user_id='$user_id' AND password=md5('$old_password')");

        if($query->num_rows() > 0)  {
            return true;
        } else {
            return false;
        }
    }

    public function change_password($userID,$data){
        $this->db->set('password', $data->new_password);
        $this->db->where('user_id', $userID);

        $result = $this->db->update('tm_user');
        return $result;
    }

    public function save_upload($userID, $fileName){
        $this->db->set('file_user', $fileName);
        $this->db->where('user_id', $userID);

        $query = $this->db->update('tm_user');
        return $query;
    }
   
}
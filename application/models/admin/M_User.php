<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Author rendi widjaya
 * xcode-dev 2021
 * copyright
 */
class M_User extends CI_Model{

    public function list_user(){
        $result = $this->db->get('tm_user');
        return $result->result();
    }

    public function get_user($key){
        $this->db->where('user_id', $key);
        $result = $this->db->get('tm_user');
        return $result->result();
    }

    public function add_user($data){
        $data = array(
            'name' => $data->name, 
            'email' => $data->email, 
            'level' => $data->level, 
            'username' => $data->username, 
            'password' => $data->password, 
            'status' => $data->status, 
        );

        $result = $this->db->insert('tm_user', $data);
        return $result;
    }

    public function update_user($data){
        $this->db->set('name', $data->name);
        $this->db->set('email', $data->email);
        $this->db->set('level', $data->level);
        $this->db->set('username', $data->username);
        $this->db->set('password', $data->password);
        $this->db->set('status', $data->status);
        $this->db->where('user_id', $data->user_id);

        $result = $this->db->update('tm_user');
        return $result;
    }

    public function del_user($key){
        $this->db->where('user_id', $key);

        $result = $this->db->delete('tm_user');
        return $result;
    }
}
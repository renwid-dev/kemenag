<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Author rendi widjaya
 * xcode-dev 2021
 * copyright
 */
class C_Login extends CI_Controller{
    protected $data;
    
    function __construct(){
        parent:: __construct();
        $this->inizialize();
    }

    public function inizialize(){
        $this->load->model('admin/M_Login', 'login');
    }

    public function index(){
        $this->data['title'] = 'Login | Admin';
        $this->load->view('admin/administrator', $this->data);
    }

    public function auth(){
        
        $username = strip_tags(str_replace("'", "", $this->input->post('username',TRUE)));
        $password = strip_tags(str_replace("'", "", $this->input->post('password',TRUE)));
        $cadmin = $this->login->cekadmin($username,$password);
        
        if($cadmin->num_rows() > 0){
            $set_admin = $cadmin->row_array();
            $newdata = array(
                'id_user'   => $set_admin['user_id'],
                'nama'      => $set_admin['name'],
                'username'  => $set_admin['username'],
                'level'     => $set_admin['level'],
                'images'    => $set_admin['file_user'],
                'logged_in' => TRUE
            );
            $this->session->set_userdata($newdata);
            redirect('admin/dashboard'); 
        }else{
            $this->session->set_flashdata('msg', MESSAGE_ERROR_PASSWORD);
            redirect('administrator');
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        $url = base_url('administrator');
        redirect($url);
    }
}
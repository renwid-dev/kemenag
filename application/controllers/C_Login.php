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
        $this->load->model('user/M_Login', 'login');
    }

    public function index(){
        $this->data['title'] = 'Login | Lembaga';
        $this->load->view('user/login', $this->data);
    }

    public function auth(){
        
        $nsm = $this->input->post('nsm');
        $password = $this->input->post('password');
        $ck_user = $this->login->cekadmin($nsm, $password);
        
        if($ck_user->num_rows() > 0){
            $set_user = $ck_user->row_array();
            $newdata = array(
                'user_id ' => $set_user['id_lembaga'],
                'nama_madrasah' => $set_user['nama_madrasah'],
                'nsm' => $set_user['nsm'],
                'npsn' => $set_user['npsn'],
                'images' => $set_user['file_user'],
                'logged_in' => TRUE
            );
            
            $data = $this->session->set_userdata($newdata);
            
            redirect('user/dashboard'); 
        }else{
            $this->session->set_flashdata('msg', MESSAGE_ERROR_PASSWORD);
            $url = base_url();
            redirect($url);
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        $url = base_url();
        redirect($url);
    }
}
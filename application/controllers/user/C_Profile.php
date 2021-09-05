<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Author rendi widjaya
 * xcode-dev 2021
 * copyright
 */
class C_Profile extends CI_Controller{
      
    private $key;
    private $data;
    private $user;

    public function __construct(){
        parent::__construct();
        $this->initailize();
    }

    public function initailize(){
        if(!isset($_SESSION['logged_in'])){
            $url = base_url();
            redirect($url);
        };

        $this->load->library('form_validation');
        $this->load->model('user/M_Profile','profile');
        $this->key = $this->uri->segment(3);
    }
     
    public function index(){
        $nsm = $this->session->userdata('nsm');
        
        $this->data['title'] = 'Profile';
        $this->data['user'] = $this->profile->get_user($nsm);

        $this->load->view('user/profile', $this->data);
    }

    public function change_password(){
        $params = new stdClass();
        $params->new_password = $this->input->post('password_new');
        $params->old_password = $this->input->post('password_old');

        $nsm = $this->session->userdata('nsm');
        $response = $this->profile->cek_password($nsm, $params->old_password); 
        
        if ($response[0]->password == $params->old_password) {
            $this->profile->change_password($nsm, $params);
            echo json_encode(SUCCESS);
            exit();
        } else {
            echo json_encode(ERRORS);
            exit();
        }
    }

    public function upload(){

        $key = $this->session->userdata('nsm');
        $data = $this->profile->get_user($key);
        $config = $this->config_upload();
        
        if ($data[0]->file_user != "") {
            if ($_FILES) {
                $unset_data = PATH_PROFILE_LEMBAGA . $data[0]->file_user;
                unlink($unset_data);
                $file_name = $config['file_name'];
                $this->profile->save_upload($key, $file_name);
            } else {
                $file_name = $data[0]->file_user;
                $this->profile->save_upload($key, $file_name);
            }
        } else {
            $file_name = $config['file_name'];
            $this->profile->save_upload($key, $file_name);
        }
    }

    public function config_upload() {

        if ($_FILES) {
            $date = date('dmYHis');
            $ext = explode(".", $_FILES['userfile']['name']);
            $ext = end($ext);
            $fileName = $date . '.' . $ext;
        } else {
            $fileName = "";
        }

        $config['upload_path'] = PATH_PROFILE_LEMBAGA;
        $config['allowed_types'] = '*';
        $config['file_name'] = $fileName;
        // $config['max_size']  = '1000';
        // $config['max_width']  = '1024';
        // $config['max_height']  = '768';

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('userfile')){
            $status = ERRORS;
            $msg = ERROR_IMAGE;
        } else {
            $dataupload = $this->upload->data();
            $status = SUCCESS;
            $msg = $dataupload['file_name']." berhasil diupload";
        }
        $this->output->set_content_type('application/json')->set_output(json_encode(array('status'=>$status,'msg'=>$msg)));
  
        return $config;
    }

}
 
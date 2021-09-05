<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Author rendi widjaya
 * xcode-dev 2021
 * copyright
 */
class C_Profile extends CI_Controller{
      
    private $key;
    private $data;

    public function __construct(){
        parent::__construct();
        $this->initailize();
    }

    public function initailize(){
        if(!isset($_SESSION['logged_in'])){
            $url = base_url('administrator');
            redirect($url);
        };

        $this->load->library('form_validation');
        $this->load->model('admin/M_Profile','profile');
        $this->key = $this->uri->segment(3);
    }
     
    public function index(){
        $user = $this->session->userdata('id_user');

        $this->data['title'] = 'Profile';
        $this->data['user'] = $this->profile->get_user($user);

        $this->load->view('admin/profile', $this->data);
    }

    public function save_update(){

        $params = new stdClass();
        $params->user_id = $this->input->post('user_id');
        $params->name = $this->input->post('name');
        $params->email = $this->input->post('email');
        $params->username = $this->input->post('username');

        $this->profile->update_user($params);
        echo json_encode(SUCCESS);
        exit();
    }

    public function change_password(){
        $this->form_validation->set_rules('password_old', 'Currunt Password', 'required|trim');
        $this->form_validation->set_rules('password_new', 'New Password', 'required|trim|min_lengh[3]|matches[confirm_password]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|trim|min_lengh[3]|matches[new_password]');

        $params = new stdClass();
        $params->username = $this->input->post('username');
        $params->new_password = md5($this->input->post('password_new'));
        $params->old_password = $this->input->post('password_old');

        $userID = $this->session->userdata('id_user');
        $response = $this->profile->cek_password($userID, $params->old_password); 
        if ($response > 0 && $response === true) {
            $this->profile->change_password($userID, $params);
            echo json_encode(SUCCESS);
            exit();
        } else {
            echo json_encode(ERRORS);
            exit();
        }
    }

    public function upload(){

        $key = $this->session->userdata('id_user');
        $data = $this->profile->get_user($key);
        $config = $this->config_upload();
        
        if ($data[0]->file_user != "") {
            if ($_FILES) {
                $unset_data = PATH_PROFILE . $data[0]->file_user;
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

        $config['upload_path'] = PATH_PROFILE;
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
 
<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Author rendi widjaya
 * xcode-dev 2021
 * copyright
 */
class C_DataUserDetail extends CI_Controller{
      
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

        $this->load->model('admin/M_Profile','profile');
        $this->load->model('admin/M_DataUser','datauser');
        $this->key = $this->uri->segment(3);
    }
     
    public function index(){
        
        $no = 0;
        $data = array();
        $dataID = $this->key;
        
        $user = $this->session->userdata('id_user');
        $this->data['title'] = 'Data User Detail';
        $this->data['user'] = $this->profile->get_user($user);
        $this->data['lembaga'] = $this->datauser->get_dtuser($dataID);
        $this->data['setting_tahun'] = $this->datauser->list_setting_tahun();
        $this->data['list_kesiswaan'] = $this->datauser->list_kesiswaan($this->key);

        $this->load->view('admin/data_user_detail', $this->data);
    }

    public function get_data(){
        $key = $this->input->post('id', true);
        $response = $this->datauser->get_dtuser($key);
       
        echo json_encode($response);
        exit();
    }

    public function save_add(){ 
        
        $id_setting = $this->input->post('id_setting');
        $id_lembaga = $this->input->post('id_lembaga');
        $jenjang = $this->input->post('jenjang');
        
        $params = new stdClass();
        for ($i=0; $i < count($id_setting) ; $i++) { 
            $params->id_setting = $id_setting[$i];
            $params->id_lembaga = $id_lembaga[$i];
            $params->jenjang = $jenjang[$i];
            $this->datauser->save_add_kesiswaan($params);
            $this->datauser->save_add_gtk($params);
        }

        echo json_encode(SUCCESS);
        exit();
    }

    public function destroy(){
        $key = $this->input->post('key');
        $response = $this->datauser->del_kesiswaan($key);
        $response = $this->datauser->del_gtk($key);
        
        echo json_encode(SUCCESS);
    }

}
 
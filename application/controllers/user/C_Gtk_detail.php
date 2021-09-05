<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Author rendi widjaya
 * xcode-dev 2021
 * copyright
 */
class C_Gtk_detail extends CI_Controller{
      
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

        $this->load->model('user/M_Profile','profile');
        $this->load->model('user/M_Gtk','gtk');
        $this->key = $this->uri->segment(3);
    }
     
    public function index(){
        $nsm = $this->session->userdata('nsm'); 
        
        $this->data['title'] = 'GTK Detail';
        $this->data['user'] = $this->profile->get_user($nsm);
        $this->data['gtk'] = $this->gtk->get_gtk($this->key);
        $this->data['gtk_detail'] = $this->gtk->get_gtk_detail($this->key);

        $this->load->view('user/gtk_detail', $this->data);
    }

    public function save_add(){

        $params = new stdClass();
        $params->gtk_id = $this->input->post('id_gtk');        
        $params->lembaga_id = $this->input->post('lembaga_id');        
        $params->jabatan = $this->input->post('jabatan');        
        $params->nama = $this->input->post('nama');        
        $params->jk = $this->input->post('jk');        
        $params->status_kepegawaian = $this->input->post('status_kepegawaian');        
        $params->status_sertifikasi = $this->input->post('status_sertifikasi');        
        $params->status_tpp = $this->input->post('status_tpp');        
        $params->status_inpassing = $this->input->post('status_inpassing');        
        
        $this->gtk->save_detail($params);
        echo json_encode(SUCCESS);
        exit();
    }

    public function get_data(){
        $key = $this->input->post('id', true);
        $response = $this->gtk->data_gtk_detail($key);
       
        echo json_encode($response);
        exit();
    }

    public function save_update(){

        $params = new stdClass();
        $params->gtkID = $this->input->post('id_gtk_detail');        
        $params->jabatan = $this->input->post('jabatan');        
        $params->nama = $this->input->post('nama');        
        $params->jk = $this->input->post('jk');        
        $params->status_kepegawaian = $this->input->post('status_kepegawaian');        
        $params->status_sertifikasi = $this->input->post('status_sertifikasi');        
        $params->status_tpp = $this->input->post('status_tpp');    
        $params->status_inpassing = $this->input->post('status_inpassing');        

        $this->gtk->update_detail($params);
        echo json_encode(SUCCESS);
        exit();
    }

    public function delete(){
        $key = $this->input->post('key');

        $this->gtk->del_detail($key);
        echo json_encode(SUCCESS);
        exit();
    }

}
 
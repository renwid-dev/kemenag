<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Author rendi widjaya
 * xcode-dev 2021
 * copyright
 */
class C_Gtk extends CI_Controller{
      
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
        $this->load->model('admin/M_Profile','profile');
        $this->load->model('admin/M_Gtk','gtk');
        $this->key = $this->uri->segment(3);
    }
     
    public function index(){
        $userID = $this->session->userdata('id_user');
        
        $this->data['title'] = 'GTK';
        $this->data['user'] = $this->profile->get_user($userID);
        $this->data['tahun'] = $this->gtk->tahun();
        $this->data['kec'] = $this->gtk->kecamatan();
        $this->data['jenjang'] = $this->gtk->jenjang();

        $this->load->view('admin/gtk', $this->data);
    }

    public function search(){
        $no = 0;
        $data = array();
        
        $params = new stdClass();
        $params->kode = $this->input->get('kode');
        $params->semester = $this->input->get('semester');
        $params->jenjang = $this->input->get('jenjang');
        $params->code_kec = $this->input->get('code_kec');
        
        $list = $this->gtk->data_search($params); 
        foreach ($list as $row) {
            $action = ' <a href="'. base_url() . 'admin/gtk_detail/' . $row->id_gtk.'" class="edit btn btn-primary btn-sm">Detail</a>';
            $no++;
            $data[] = array(
                $no,
                $row->nama_madrasah,
                $row->tahun_pelajaran,
                $row->semester,
                $row->jenjang, 
                $row->kecamatan,
                $row->status,
                $action
             );
        }
        echo json_encode($data);
        exit();
    }

    public function get_data(){
        $key = $this->input->post('id', true);
        $response = $this->gtk->get_gtk($key);
       
        echo json_encode($response);
        exit();
    }

    public function get_tahun(){
        $key = $this->input->post('code', true);
        $response = $this->gtk->get_tahun($key);
       
        echo json_encode($response);
        exit();
    }

}
 
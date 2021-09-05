<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Author rendi widjaya
 * xcode-dev 2021
 * copyright
 */
class C_Kesiswaan extends CI_Controller{
      
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
        $this->load->model('admin/M_Kesiswaan','kesiswaan');
        $this->key = $this->uri->segment(3);
    }
     
    public function index(){
        $userID = $this->session->userdata('id_user');
        
        $this->data['title'] = 'Kesiswaan';
        $this->data['user'] = $this->profile->get_user($userID);
        $this->data['tahun'] = $this->kesiswaan->tahun();
        $this->data['kec'] = $this->kesiswaan->kecamatan();
        $this->data['jenjang'] = $this->kesiswaan->jenjang();
        
        $this->load->view('admin/kesiswaan', $this->data);
    }

    public function search()
    {
        $no = 0;
        $data = array();
        
        $params = new stdClass();
        $params->kode = $this->input->get('kode');
        $params->semester = $this->input->get('semester');
        $params->jenjang = $this->input->get('jenjang');
        $params->code_kec = $this->input->get('code_kec');
        
        $list = $this->kesiswaan->data_search($params); 
        foreach ($list as $row) {
            $action = ' <button data-id="'.$row->id_kesiswaan .'" class="edit btn btn-primary btn-sm"><i class="fa fa-pencil"></i></button>';
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
        // echo json_encode(['data' => $data]);
        echo json_encode($data);
        exit();
    }

    public function get_data(){
        $key = $this->input->post('id', true);
        $response = $this->kesiswaan->get_kesiswaan($key);
       
        echo json_encode($response);
        exit();
    } 
 
    public function get_tahun(){
        $key = $this->input->post('code', true);
        $response = $this->kesiswaan->get_tahun($key);
       
        echo json_encode($response);
        exit();
    }

    public function aditional(){
        
        $params = new stdClass();
        $params->id_kesiswaan = $this->input->post('id_kesiswaan');
        $params->kelompok_AL = $this->input->post('kelompok_AL');
        $params->kelompok_AP = $this->input->post('kelompok_AP');
        $params->kelompok_BL = $this->input->post('kelompok_BL');
        $params->kelompok_BP = $this->input->post('kelompok_BP');
        $params->total_rakel_L = $this->input->post('total_rakel_L');
        $params->total_rakel_P = $this->input->post('total_rakel_P');
        $params->kelas1_L = $this->input->post('kelas1_L');
        $params->kelas1_P = $this->input->post('kelas1_P');
        $params->kelas2_L = $this->input->post('kelas2_L');
        $params->kelas2_P = $this->input->post('kelas2_P');
        $params->kelas3_L = $this->input->post('kelas3_L');
        $params->kelas3_P = $this->input->post('kelas3_P');
        $params->kelas4_L = $this->input->post('kelas4_L');
        $params->kelas4_P = $this->input->post('kelas4_P');
        $params->kelas5_L = $this->input->post('kelas5_L');
        $params->kelas5_P = $this->input->post('kelas5_P');
        $params->kelas6_L = $this->input->post('kelas6_L');
        $params->kelas6_P = $this->input->post('kelas6_P');
        $params->total_mikel_L = $this->input->post('total_mikel_L');
        $params->total_mikel_P = $this->input->post('total_mikel_P');
        $params->kelas7_L = $this->input->post('kelas7_L');
        $params->kelas7_P = $this->input->post('kelas7_P');
        $params->kelas8_L = $this->input->post('kelas8_L');
        $params->kelas8_P = $this->input->post('kelas8_P');
        $params->kelas9_L = $this->input->post('kelas9_L');
        $params->kelas9_P = $this->input->post('kelas9_P');
        $params->total_mtkel_L = $this->input->post('total_mtkel_L');
        $params->total_mtkel_P = $this->input->post('total_mtkel_P');
        $params->kelas10_L = $this->input->post('kelas10_L');
        $params->kelas10_P = $this->input->post('kelas10_P');
        $params->kelas11_L = $this->input->post('kelas11_L');
        $params->kelas11_P = $this->input->post('kelas11_P');
        $params->kelas12_L = $this->input->post('kelas12_L');
        $params->kelas12_P = $this->input->post('kelas12_P');
        $params->total_makel_L = $this->input->post('total_makel_L');
        $params->total_makel_P = $this->input->post('total_makel_P');

        $this->kesiswaan->save_update($params);
        echo json_encode(SUCCESS);
        
    }

    protected function set_count($x, $y){
        $set = $x + $y;
        return $set;
    }

}
 
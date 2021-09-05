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
        $this->load->model('user/M_Profile','profile');
        $this->load->model('user/M_Kesiswaan','kesiswaan');
        $this->key = $this->uri->segment(3);
    }
     
    public function index(){
        $nsm = $this->session->userdata('nsm');
        
        $this->data['title'] = 'Kesiswaan';
        $this->data['user'] = $this->profile->get_user($nsm);
        $this->load->view('user/kesiswaan', $this->data);
    }

    public function search()
    {
        $no = 0;
        $data = array();
        
        $nsm = $this->session->userdata('nsm');
        $response = $this->profile->get_user($nsm);
        $list = $this->kesiswaan->get_list($response[0]->id_lembaga); 

        if ($response[0]->jenjang == 'RA') {
            foreach ($list as $row) {
                if ($row->akses_izinkan == 1) {
                    $action = '<button data-id="'.$row->id_kesiswaan.'" class="edit btn btn-warning btn-sm"><i class="fa fa-pencil-square-o"></i></button>';
                } else {
                    $action = '<button class="edit btn btn-warning btn-sm" disabled><i class="fa fa-pencil-square-o"></i></button>';
                }
                $no++;
                $data[] = array('DT_RowId' => $no,
                    $no,
                    $row->tahun_pelajaran,
                    $row->semester,
                    $row->kelompok_AL,
                    $row->kelompok_AP,
                    $row->kelompok_BL,
                    $row->kelompok_BP,
                    $row->total_rakel_L,
                    $row->total_rakel_P,
                    $this->set_count($row->total_rakel_L, $row->total_rakel_P),
                    $action
                 );
            }
        } elseif ($response[0]->jenjang == 'MI') {
            foreach ($list as $row) {
                if ($row->akses_izinkan == 1) {
                    $action = '<button data-id="'.$row->id_kesiswaan.'" class="edit btn btn-warning btn-sm"><i class="fa fa-pencil-square-o"></i></button>';
                } else {
                    $action = '<button class="edit btn btn-warning btn-sm" disabled><i class="fa fa-pencil-square-o"></i></button>';
                }
                $no++;
                $data[] = array('DT_RowId' => $no,
                    $no,
                    $row->tahun_pelajaran,
                    $row->semester,
                    $row->kelas1_L,
                    $row->kelas1_P,
                    $row->kelas2_L,
                    $row->kelas2_P,
                    $row->kelas3_L,
                    $row->kelas3_P,
                    $row->kelas4_L,
                    $row->kelas4_P,
                    $row->kelas5_L,
                    $row->kelas5_P,
                    $row->kelas6_L,
                    $row->kelas6_P,
                    $row->total_mikel_L,
                    $row->total_mikel_P,
                    $this->set_count($row->total_mikel_L, $row->total_mikel_P),
                    $action
                 );
            }
        } elseif ($response[0]->jenjang == 'MTs') {
            foreach ($list as $row) {
                if ($row->akses_izinkan == 1) {
                    $action = '<button data-id="'.$row->id_kesiswaan.'" class="edit btn btn-warning btn-sm"><i class="fa fa-pencil-square-o"></i></button>';
                } else {
                    $action = '<button class="edit btn btn-warning btn-sm" disabled><i class="fa fa-pencil-square-o"></i></button>';
                }
                $no++;
                $data[] = array('DT_RowId' => $no,
                    $no,
                    $row->tahun_pelajaran,
                    $row->semester,
                    $row->kelas7_L,
                    $row->kelas7_P,
                    $row->kelas8_L,
                    $row->kelas8_P,
                    $row->kelas9_L,
                    $row->kelas9_P,
                    $row->total_mtkel_L,
                    $row->total_mtkel_P,
                    $this->set_count($row->total_mtkel_L, $row->total_mtkel_P),
                    $action
                 );
            }
        } elseif ($response[0]->jenjang == 'MA') {
            foreach ($list as $row) {
                if ($row->akses_izinkan == 1) {
                    $action = '<button data-id="'.$row->id_kesiswaan.'" class="edit btn btn-warning btn-sm"><i class="fa fa-pencil-square-o"></i></button>';
                } else {
                    $action = '<button class="edit btn btn-warning btn-sm" disabled><i class="fa fa-pencil-square-o"></i></button>';
                }
                $no++;
                $data[] = array('DT_RowId' => $no,
                    $no,
                    $row->tahun_pelajaran,
                    $row->semester,
                    $row->kelas10_L,
                    $row->kelas10_P,
                    $row->kelas11_L,
                    $row->kelas11_P,
                    $row->kelas12_L,
                    $row->kelas12_P,
                    $row->total_makel_L,
                    $row->total_makel_P,
                    $this->set_count($row->total_makel_L, $row->total_makel_P),
                    $action
                 );
            }
        }

        echo json_encode(['data' => $data]);
        exit();
    }

    public function get_data(){
        $key = $this->input->post('id', true);
        $response = $this->kesiswaan->get_kesiswaan($key);
       
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
 
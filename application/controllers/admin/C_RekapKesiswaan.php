<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Author rendi widjaya
 * xcode-dev 2021
 * copyright
 */
class C_RekapKesiswaan extends CI_Controller{
      
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
        $this->load->model('admin/M_RekapKesiswaan','rekap');
        $this->key = $this->uri->segment(3);
    }
     
    public function index(){
        $userID = $this->session->userdata('id_user');
        
        $this->data['title'] = 'Rekap Kesiswaan';
        $this->data['user'] = $this->profile->get_user($userID);
        $this->data['tahun'] = $this->rekap->tahun();
        $this->data['kec'] = $this->rekap->kecamatan();
        $this->data['jenjang'] = $this->rekap->jenjang();
        
        $this->load->view('admin/rekap_kesiswaan', $this->data);
    }

    public function search()
    { 
        $no = 0;
        $data = [];
        
        $params = new stdClass();
        $params->kode = $this->input->get('kode');
        $params->semester = $this->input->get('semester');
        $params->jenjang = $this->input->get('jenjang');
        $params->code_kec = $this->input->get('code_kec');
        
        $list = $this->rekap->data_search($params); 
        if ($params->jenjang == 'RA') {
            foreach ($list as $row) {
                $no++;
                $data[] = array('DT_RowId' => $no,
                    $no,
                    $row->nama_madrasah,
                    $row->kelompok_AL,
                    $row->kelompok_AP,
                    $this->set_count($row->kelompok_AL, $row->kelompok_AP),
                    $row->kelompok_BL,
                    $row->kelompok_BP,
                    $this->set_count($row->kelompok_BL, $row->kelompok_BP),
                    $this->set_count($row->total_rakel_L, $row->total_rakel_P),
                 );
            }
        } elseif ($params->jenjang == 'MI') {
            foreach ($list as $row) {
                $no++;
                $data[] = array('DT_RowId' => $no,
                    $no,
                    $row->nama_madrasah,
                    $row->kelas1_L,
                    $row->kelas1_P,
                    $this->set_count($row->kelas1_L, $row->kelas1_P),
                    $row->kelas2_L,
                    $row->kelas2_P,
                    $this->set_count($row->kelas2_L, $row->kelas2_P),
                    $row->kelas3_L,
                    $row->kelas3_P,
                    $this->set_count($row->kelas3_L, $row->kelas3_P),
                    $row->kelas4_L,
                    $row->kelas4_P,
                    $this->set_count($row->kelas4_L, $row->kelas4_P),
                    $row->kelas5_L,
                    $row->kelas5_P,
                    $this->set_count($row->kelas5_L, $row->kelas5_P),
                    $row->kelas6_L,
                    $row->kelas6_P,
                    $this->set_count($row->kelas6_L, $row->kelas6_P),
                    $this->set_count($row->total_mikel_L, $row->total_mikel_P),
                 );
            }
        } elseif ($params->jenjang == 'MTs') {
            foreach ($list as $row) {
                $no++;
                $data[] = array('DT_RowId' => $no,
                    $no,
                    $row->nama_madrasah,
                    $row->kelas7_L,
                    $row->kelas7_P,
                    $this->set_count($row->kelas7_L, $row->kelas7_P),
                    $row->kelas8_L,
                    $row->kelas8_P,
                    $this->set_count($row->kelas8_L, $row->kelas8_P),
                    $row->kelas9_L,
                    $row->kelas9_P,
                    $this->set_count($row->kelas9_L, $row->kelas9_P),
                    $this->set_count($row->total_mtkel_L, $row->total_mtkel_P),
                 );
            }
        } elseif ($params->jenjang == 'MA') {
            foreach ($list as $row) {
                $no++;
                $data[] = array('DT_RowId' => $no,
                    $no,
                    $row->nama_madrasah,
                    $row->kelas10_L,
                    $row->kelas10_P,
                    $this->set_count($row->kelas10_L, $row->kelas10_P),
                    $row->kelas11_L,
                    $row->kelas11_P,
                    $this->set_count($row->kelas11_L, $row->kelas11_P),
                    $row->kelas12_L,
                    $row->kelas12_P,
                    $this->set_count($row->kelas12_L, $row->kelas12_P),
                    $this->set_count($row->total_makel_L, $row->total_makel_P),
                 );
            }
        }

        echo json_encode($data);
        exit();
    }

    protected function set_count($x, $y){
        $set = $x + $y;
        return $set;
    }
}
 
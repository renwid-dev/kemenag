<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Author rendi widjaya
 * xcode-dev 2021
 * copyright
 */
class C_Dashboard extends CI_Controller{
      
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
        $this->load->model('admin/M_Dashboard','dashboard');
        $this->key = $this->uri->segment(3);
    }
     
    public function index(){
        $user = $this->session->userdata('id_user');
        
        $this->data['title'] = 'Admin | Dashboard';
        $this->data['tahun'] = $this->dashboard->tahun();
        $this->data['user'] = $this->profile->get_user($user);
        $this->load->view('admin/dashboard', $this->data);
    }

    public function filter(){
        $kode = $this->input->post('kode');
        $ext = $this->db->query("SELECT max(kode) As code FROM tm_setting_tahun")->result();
        
        if (isset($kode)) {
            $kesiswaan = $this->dashboard->filter_kesiswaan($kode);
            $gtk = $this->dashboard->filter_gtk($kode);
        } else {
            $kesiswaan = $this->dashboard->filter_kesiswaan($ext[0]->code);
            $gtk = $this->dashboard->filter_gtk($ext[0]->code);
        }

        
        $data_siswa = [];
        foreach ($kesiswaan as $row) {
            if ($row->jenjang_lembaga == 'RA') {
                $data_siswa['label'][] = $row->jenjang_lembaga;
                $data_siswa['value'][] = $this->set_count($row->total_rakel_L, $row->total_rakel_P);
                $data_siswa['text'][] = 'Tahun Pelajaran ' . $row->tahun_pelajaran;
            } elseif ($row->jenjang_lembaga == 'MI') {
                $data_siswa['label'][] = $row->jenjang_lembaga;
                $data_siswa['value'][] = $this->set_count($row->total_mikel_L, $row->total_mikel_P);
            } elseif ($row->jenjang_lembaga == 'MTs') {
                $data_siswa['label'][] = $row->jenjang_lembaga;
                $data_siswa['value'][] = $this->set_count($row->total_mtkel_L, $row->total_mtkel_P);
            } elseif ($row->jenjang_lembaga == 'MA') {
                $data_siswa['label'][] = $row->jenjang_lembaga;
                $data_siswa['value'][] = $this->set_count($row->total_makel_L, $row->total_makel_P);
            }
        }
       
        $data_gtk = [];

        foreach ($gtk as $row) {
            $data_gtk['text'][] = 'Tahun Pelajaran ' . $row->tahun_pelajaran;
            $data_gtk['value'][] = $row->guru_pns_L;
            $data_gtk['value'][] = $row->guru_pns_P;
            $data_gtk['value'][] = $row->guru_honorer_L;
            $data_gtk['value'][] = $row->guru_honorer_P;
            $data_gtk['value'][] = $row->guru_honor_inpassing;
            $data_gtk['value'][] = $row->tendik_pns_L;
            $data_gtk['value'][] = $row->tendik_pns_P;
            $data_gtk['value'][] = $row->tendik_honorer_L;
            $data_gtk['value'][] = $row->tendik_honorer_P;
            $data_gtk['label'][] = 'Guru PNS L';
            $data_gtk['label'][] = 'Guru PNS P';
            $data_gtk['label'][] = 'Guru Honorer L';
            $data_gtk['label'][] = 'Guru Honorer P';
            $data_gtk['label'][] = 'Guru Honorer Inpassing';
            $data_gtk['label'][] = 'Tendik PNS L';
            $data_gtk['label'][] = 'Tendik PNS P';
            $data_gtk['label'][] = 'Tendik Honorer L';
            $data_gtk['label'][] = 'Tendik Honorer P';
        }

        echo json_encode(['siswa' => $data_siswa, 'gtk' => $data_gtk]);
    }


    protected function set_count($x, $y){
        $result = $x + $y;
        if ($result == NULL && $result == '') {
            $result = 0;
        }
        return $result;
    }

}
 
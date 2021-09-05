<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Author rendi widjaya
 * xcode-dev 2021
 * copyright
 */
class C_RekapGtk extends CI_Controller{
      
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
        $this->load->model('admin/M_RekapGtk','gtk');
        $this->key = $this->uri->segment(3);
    }
     
    public function index(){
        $userID = $this->session->userdata('id_user');
        
        $this->data['title'] = 'Rekap GTK';
        $this->data['user'] = $this->profile->get_user($userID);
        $this->data['tahun'] = $this->gtk->tahun();
        $this->data['kec'] = $this->gtk->kecamatan();
        $this->data['jenjang'] = $this->gtk->jenjang();

        $this->load->view('admin/rekap_gtk', $this->data);
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
            $set_count = $this->gtk->count_spec($row->id_gtk);
            //Guru
            $guru_pns_L = !empty($set_count['Guru']['pns_L']) ? $set_count['Guru']['pns_L'] : 0;
            $guru_pns_P = !empty($set_count['Guru']['pns_P']) ? $set_count['Guru']['pns_P'] : 0;
            $guru_honor_L = !empty($set_count['Guru']['honorer_L']) ? $set_count['Guru']['honorer_L'] : 0;
            $guru_honor_P = !empty($set_count['Guru']['honorer_P']) ? $set_count['Guru']['honorer_P'] : 0;
            $guru_pns_serti = !empty($set_count['Guru']['pns_serti']) ? $set_count['Guru']['pns_serti'] : 0;
            $guru_pns_nonserti = !empty($set_count['Guru']['pns_nonserti']) ? $set_count['Guru']['pns_nonserti'] : 0;
            $guru_honor_serti = !empty($set_count['Guru']['honor_serti']) ? $set_count['Guru']['honor_serti'] : 0;
            $guru_honor_nonserti = !empty($set_count['Guru']['honor_nonserti']) ? $set_count['Guru']['honor_nonserti'] : 0;
            $guru_honor_inpassing = !empty($set_count['Guru']['honor_inpassing']) ? $set_count['Guru']['honor_inpassing'] : 0;
            $guru_total = !empty($set_count['Guru']['total']) ? $set_count['Guru']['total'] : 0;
            //Tendik
            $tendik_pns_L = !empty($set_count['Tendik']['pns_L']) ? $set_count['Tendik']['pns_L'] : 0;
            $tendik_pns_P = !empty($set_count['Tendik']['pns_P']) ? $set_count['Tendik']['pns_P'] : 0;
            $tendik_honor_L = !empty($set_count['Tendik']['honorer_L']) ? $set_count['Tendik']['honorer_L'] : 0;
            $tendik_honor_P = !empty($set_count['Tendik']['honorer_P']) ? $set_count['Tendik']['honorer_P'] : 0;
            $tendik_total = !empty($set_count['Tendik']['total']) ? $set_count['Tendik']['total'] : 0 ;

            $no++;
            $data[] = array(
                $no,
                $row->nama_madrasah,
                $row->jenjang, 
                $row->kecamatan,
                $guru_pns_L,
                $guru_pns_P,
                $guru_pns_serti,
                $guru_pns_nonserti,
                $guru_honor_L,
                $guru_honor_P,
                $guru_honor_serti,
                $guru_honor_nonserti,
                $guru_honor_inpassing,
                $tendik_pns_L,
                $tendik_pns_P,
                $tendik_honor_L,
                $tendik_honor_P,
                $guru_total,
                $tendik_total,
             );
        }
        echo json_encode($data);
        exit();
    }

}
 
<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Author rendi widjaya
 * xcode-dev 2021
 * copyright
 */
class C_SettingTahun extends CI_Controller{
      
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
        $this->load->model('admin/M_SettingTahun','setting');
        $this->key = $this->uri->segment(3);
    }
     
    public function index(){
        $user = $this->session->userdata('id_user');

        $this->data['title'] = 'Setting Tahun';
        $this->data['user'] = $this->profile->get_user($user);

        $this->load->view('admin/setting_tahunan', $this->data);
    }

    public function search(){
        $list = $this->setting->set_list();
        $no = 0;
        $data = array();
        foreach ($list as $row) {
            $action = '<button data-id="'.$row->id_setting .'" class="edit btn btn-primary btn-sm"><i class="fa fa-pencil"></i></button> <button data-id="'.$row->id_setting .'" class="hapus btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>';
            $no++;
            $data[] = array('DT_RowId' => $no,
                $no,
                $row->kode,
                $row->tahun_pelajaran,
                $row->semester,
                $this->stat($row->akses_user),
                $this->stat($row->akses_izinkan),
                $action
             );
        }
         
        echo json_encode(['data' => $data]);
        exit();
    }

    public function get_data(){
        $key = $this->input->post('id', true);
        $response = $this->setting->get_setting($key);
       
        echo json_encode($response);
        exit();
    }

    public function save_add(){

        $params = new stdClass();
        $params->kode = $this->input->post('kode');
        $params->tahun_pelajaran = $this->input->post('tahun_pelajaran');
        $params->semester = $this->input->post('semester');
        $params->akses_user = DEFAULT_STATUS;
        $params->akses_izinkan = DEFAULT_STATUS;

        $this->setting->add_setting($params);
        echo json_encode(SUCCESS);
        exit();
    }

    public function save_update(){

        $params = new stdClass();
        $params->id = $this->input->post('id');
        $params->kode = $this->input->post('kode');
        $params->tahun_pelajaran = $this->input->post('tahun_pelajaran');
        $params->semester = $this->input->post('semester');
        $params->akses_user = $this->input->post('akses_user');
        $params->akses_izinkan = $this->input->post('akses_izinkan');

        $this->setting->update_setting($params);
        echo json_encode(SUCCESS);
        exit();
    }

    public function destroy(){
        $key = $this->input->post('key');
        $response = $this->setting->del_setting($key);
        
        echo json_encode(SUCCESS);
    }

    private function stat($data){
        switch ($data) {
            case '1':
                $status = DEFAULT_STATUS_ACTIVE;
                break;
            case '0':
                $status = DEFAULT_STATUS_NON_ACTIVE;
                break;
            }
        return $status;
    }

}
 
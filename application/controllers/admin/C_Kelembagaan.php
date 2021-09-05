<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Author rendi widjaya
 * xcode-dev 2021
 * copyright
 */
class C_Kelembagaan extends CI_Controller{
      
    private $key;

    public function __construct(){
        parent::__construct();
        $this->initailize();
    }

    public function initailize(){
        if(!isset($_SESSION['logged_in'])){
            $url = base_url();
            redirect($url);
        };

        $this->load->model('admin/M_Profile','profile');
        $this->load->model('admin/M_Kelembagaan','kelembagaan');
        $this->key = $this->uri->segment(3);
    }
     
    public function index(){
        $user = $this->session->userdata('id_user');

        $this->data['title'] = 'Kelembagaan';
        $this->data['user'] = $this->profile->get_user($user);
        $this->data['kec'] = $this->kelembagaan->kecamatan();
        $this->data['jenjang'] = $this->kelembagaan->jenjang();
        
        $this->load->view('admin/kelembagaan', $this->data);
    }

    public function search(){

        $params = new stdClass();
        $params->jenjang = $this->input->get('jenjang');
        $params->code_kec = $this->input->get('code_kec');
        $params->status = $this->input->get('status');

        $list = $this->kelembagaan->set_list($params);
        $no = 0;
        $data = array();
        foreach ($list as $row) {
            $action = ' <a href="'. base_url() . 'admin/kelembagaan-detail/' . $row->id_lembaga .'" class="edit btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>';
            $no++;
            $data[] = array('DT_RowId' => $no,
                $no,
                $row->jenjang,
                $row->nama_madrasah,
                $row->kecamatan,
                $row->status,
                $row->nsm,
                $row->npsn,
                $action
             );
        }
         
        echo json_encode($data);
        exit();
    }

    public function get_data(){
        $user = $this->session->userdata('id_user');

        $this->data['title'] = "Detail Kelembagaan";
        $this->data['user'] = $this->profile->get_user($user);
        $this->data['detail'] = $this->kelembagaan->get_kelembagaan($this->key);
        
        $this->load->view('admin/kelembagaan_detail', $this->data);
    }

    public function set_update(){
        
        $params = new stdClass();
        $params->nsm = $this->session->userdata('nsm');
        $params->id_detail = $this->input->post('id_detail');
        $params->id_header = $this->input->post('id_lembaga');
        $params->alamat = $this->input->post('alamat');
        $params->nomor_siop = $this->input->post('nomor_siop');
        $params->tanggal_siop = $this->input->post('tanggal_siop');
        $params->type_masa_siop = $this->input->post('type_masa_siop');
        $params->tgl_masa_siop = $this->input->post('tgl_masa_siop');
        $params->akreditasi = $this->input->post('akreditasi');
        $params->nilai_akreditasi = $this->input->post('nilai_akreditasi');
        $params->nomor_akreditasi = $this->input->post('nomor_akreditasi');
        $params->masa_akreditasi = $this->input->post('masa_akreditasi');
        $params->nama_kamad = $this->input->post('nama_kamad');
        $params->nip_kamad = $this->input->post('nip_kamad');
        $params->no_hp_kamad = $this->input->post('no_hp_kamad');
        $params->nama_op1 = $this->input->post('nama_op1');
        $params->nip_op1 = $this->input->post('nip_op1');
        $params->no_hp_op1 = $this->input->post('no_hp_op1');
        $params->nama_op2 = $this->input->post('nama_op2');
        $params->nip_op2 = $this->input->post('nip_op2');
        $params->no_hp_op2 = $this->input->post('no_hp_op2');

        $response = $this->kelembagaan->get_kelembagaan($params->id_header);
        
        $set_ijin = array();
        $set_piagam = array();
        $set_sertikat = array();
        
        if ($_FILES['file_piagam_pendirian']['name'] != '') {
            $set_data = PATH_DOCUMENT . $response[0]->file_piagam_pendirian;
            unlink($set_data);
            $conf_piagam = $this->piagam_config($params);
            $set_piagam = $conf_piagam['file_name'];
        } else {
            $set_piagam = $response[0]->file_piagam_pendirian;
        }
        
        if ($_FILES['file_ijin_operasional']['name'] != '') {
            $set_data = PATH_DOCUMENT . $response[0]->file_ijin_operasional;
            unlink($set_data);
            $conf_ijin = $this->ijin_config($params);
            $set_ijin = $conf_ijin['file_name'];
        } else {
            $set_ijin = $response[0]->file_ijin_operasional;
        }
       
        if ($_FILES['file_sertikat_akreditasi']['name'] != '') {
            $set_data = PATH_DOCUMENT . $response[0]->file_sertikat_akreditasi;
            unlink($set_data);
            $conf_sertikat = $this->sertikat_config($params);
            $set_sertikat = $conf_sertikat['file_name'];
        } else {
            $set_sertikat = $response[0]->file_sertikat_akreditasi;
        }
       
        $params->file_piagam_pendirian = $set_piagam;
        $params->file_ijin_operasional = $set_ijin;
        $params->file_sertikat_akreditasi = $set_sertikat;

        $this->kelembagaan->save_update($params);
        echo json_encode(SUCCESS);
        exit();
        
    }

    public function piagam_config($data){
        if ($_FILES) {
            $date = date('dmYHis');
            $ext = explode(".", $_FILES['file_piagam_pendirian']['name']);
            $ext = end($ext);
            $fileName = $data->nsm . '-' . $date . '.' . $ext;
        } else {
            $fileName = "";
        }

        $config['upload_path'] = PATH_DOCUMENT;
        $config['allowed_types'] = 'pdf|jpg|png';
        $config['file_name'] = $fileName;

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('file_piagam_pendirian')){
            return $this->upload->data();
        }
        
        return $config;
    }

    public function ijin_config($data){
        if ($_FILES) {
            $date = date('dmYHis');
            $ext = explode(".", $_FILES['file_ijin_operasional']['name']);
            $ext = end($ext);
            $fileName = $data->nsm . '-' . $date . '.' . $ext;
        } else {
            $fileName = "";
        }

        $config['upload_path'] = PATH_DOCUMENT;
        $config['allowed_types'] = 'pdf|jpg|png';
        $config['file_name'] = $fileName;

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('file_ijin_operasional')){
            return $this->upload->data();
        }

        return $config;
    }

    public function sertikat_config($data){
        if ($_FILES) {
            $date = date('dmYHis');
            $ext = explode(".", $_FILES['file_sertikat_akreditasi']['name']);
            $ext = end($ext);
            $fileName = $data->nsm . '-' . $date . '.' . $ext;
        } else {
            $fileName = "";
        }

        $config['upload_path'] = PATH_DOCUMENT;
        $config['allowed_types'] = 'pdf|jpg|png';
        $config['file_name'] = $fileName;

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('file_sertikat_akreditasi')){
            return $this->upload->data();
        }

        return $config;
    }

    protected function access_path(){
        $set_access = array(
            'jpg', 
            'JPG', 
            'jpeg', 
            'JPEG', 
            'png', 
            'PNG', 
            'pdf', 
            'PDF', 
        );

        return $set_access;
    }
    
    public function kelembagaan_export(){
        $params = new stdClass();
        $params->jenjang = $this->input->get('jenjang');
        $params->code_kec = $this->input->get('code_kec');
        $params->status = $this->input->get('status');

        $this->data['users'] = $this->kelembagaan->set_list($params);
        $this->load->view('admin/kelembagaan_export', $this->data);
    }

}
 
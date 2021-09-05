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

        $this->load->model('user/M_Profile','profile');
        $this->load->model('user/M_Kelembagaan','kelembagaan');
        $this->key = $this->uri->segment(3);
    }
     
    public function index(){
        if (!empty($_POST)) {
            if ($_POST['id_detail'] != "") {
                $this->set_update();
             } else {
                 $this->set_created();
             }
        }

        $nsm = $this->session->userdata('nsm');

        $this->data['title'] = 'Kelembagaan';
        $this->data['user'] = $this->profile->get_user($nsm);
        
        $this->load->view('user/kelembagaan', $this->data);
    }

    public function set_created(){
        
        $params = new stdClass();
        $params->nsm = $this->session->userdata('nsm');
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

        
        if ($_FILES['file_piagam_pendirian']['name'][0] != '') {
            $conf_piagam = $this->piagam_config($params);
            $set_piagam = $conf_piagam['file_name'];
        } 
        
        if ($_FILES['file_ijin_operasional']['name'][0] != '') {
            $conf_ijin = $this->ijin_config($params);
            $set_ijin = $conf_ijin['file_name'];
        } 
       
        if ($_FILES['file_sertikat_akreditasi']['name'][0] != '') {
            $conf_sertikat = $this->sertikat_config($params);
            $set_sertikat = $conf_sertikat['file_name'];
        }
       
        $params->file_piagam_pendirian = $set_piagam;
        $params->file_ijin_operasional = $set_ijin;
        $params->file_sertikat_akreditasi = $set_sertikat;

        $path_ijin = pathinfo($_FILES['file_ijin_operasional']['name'], PATHINFO_EXTENSION);
        $path_piagam = pathinfo($_FILES['file_piagam_pendirian']['name'], PATHINFO_EXTENSION);
        $path_sertikat = pathinfo($_FILES['file_sertikat_akreditasi']['name'], PATHINFO_EXTENSION);

        $access = $this->access_path();

        if (in_array(strtolower($path_ijin), $access) OR in_array(strtolower($path_piagam), $access) OR in_array(strtolower($path_sertikat), $access)) {
            $this->kelembagaan->save_add($params);
            $this->output->set_content_type('application/json')->set_output(json_encode(array('status' => SUCCESS)));
            exit();
        } else {
            $this->output->set_content_type('application/json')->set_output(json_encode(array('status' => ERRORS)));
            exit();
        }

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

        $response = $this->profile->get_user($params->nsm);
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

}
 
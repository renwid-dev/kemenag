<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Author rendi widjaya
 * xcode-dev 2021
 * copyright
 */
class C_DataUser extends CI_Controller{
      
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

        $this->load->library('form_validation');
        $this->load->model('admin/M_Profile','profile');
        $this->load->model('admin/M_DataUser','datauser');
        $this->key = $this->uri->segment(3);
    }
     
    public function index(){
        $user = $this->session->userdata('id_user');

        $this->data['title'] = 'Data User';
        $this->data['jenjang'] = $this->datauser->jenjang();
        $this->data['kecamatan'] = $this->datauser->kecamatan();
        $this->data['user'] = $this->profile->get_user($user);
        $this->data['setting_tahun'] = $this->datauser->list_setting_tahun();

        $this->load->view('admin/data_user', $this->data);
    }

    public function search(){
        $list = $this->datauser->set_list();
        $no = 0;
        $data = array();
        foreach ($list as $row) {
            $action = ' <button data-id="'.$row->id_lembaga .'" class="edit btn btn-primary btn-icon btn-icon rounded-circle"><i class="fa fa-pencil"></i></button> 
                        <button data-id="'.$row->id_lembaga .'" class="hapus btn btn-danger btn-icon btn-icon rounded-circle"><i class="fa fa-trash"></i></button>
                        <a href="'.base_url('admin/data_user_detail/'). $row->id_lembaga .'" class="btn btn-success btn-icon btn-icon rounded-circle"><i class="fa fa-plus"></i></a>';
            $no++;
            $data[] = array('DT_RowId' => $no,
                '<input type="checkbox" class="checkbox" id="idx_lembaga" name="idx_lembaga[]" value="'.$row->id_lembaga.'" /> <input type="hidden" id="all_jenjang" name="all_jenjang[]" value="'.$row->jenjang.'" />',
                $no,
                $row->jenjang,
                $row->nama_madrasah,
                $row->kecamatan,
                $row->status,
                $row->nsm,
                $row->npsn,
                $row->password,
                $action
             );
        }
         
        echo json_encode(['data' => $data]);
        exit();
    }

    public function get_data(){
        $key = $this->input->post('id', true);
        $response = $this->datauser->get_dtuser($key);
       
        echo json_encode($response);
        exit();
    }

    public function save_add(){ 
        $this->form_validation->set_rules(
                'nsm', 'nsm',
                'is_unique[tt_lembaga.nsm]'
        );

        if ($this->form_validation->run() != false) {
            $params = new stdClass();
            $params->jenjang = $this->input->post('jenjang');
            $params->nama_madrasah = $this->input->post('nama_madrasah');
            $params->code_kec = $this->input->post('code_kec');
            $params->status = $this->input->post('status');
            $params->nsm = $this->input->post('nsm');
            $params->npsn = $this->input->post('npsn');
            $params->password = $this->input->post('password');
    
            $dataID = $this->datauser->add_dtuser($params);
            echo json_encode(SUCCESS);
        } else {
            echo json_decode(DUPLICATE);
        }
        exit();
    }

    public function save_update(){

        $params = new stdClass();
        $params->id = $this->input->post('id');
        $params->jenjang = $this->input->post('jenjang');
        $params->nama_madrasah = $this->input->post('nama_madrasah');
        $params->code_kec = $this->input->post('code_kec');
        $params->status = $this->input->post('status');
        $params->nsm = $this->input->post('nsm');
        $params->npsn = $this->input->post('npsn');
        $params->password = $this->input->post('password');
        
        $this->datauser->update_dtuser($params);
        echo json_encode(SUCCESS);
        exit();
    }

    public function destroy(){
        $key = $this->input->post('key');
        $response = $this->datauser->del_dtuser($key);
        $response = $this->datauser->del_dtuse_detail($key);
        $response = $this->datauser->full_delkesiswaan($key);
        $response = $this->datauser->full_delgtk($key);
        $response = $this->datauser->full_delgtkdetail($key);
        
        echo json_encode(SUCCESS);
    }

    public function generate_data(){
        $jenjang = $this->input->post('all_jenjang');
        $id_setting = $this->input->post('idx_setting');
        $id_lembaga = $this->input->post('idx_lembaga');
        
        for ($i=0; $i < count($id_setting); $i++) { 
            for ($obj =0; $obj  < count($id_lembaga); $obj ++) { 
                $params[] = array(
                    'st_tahun_id' => $id_setting[$i], 
                    'lembaga_id' => $id_lembaga[$obj], 
                    'jenjang_lembaga' => $jenjang[$obj], 
                );
            }
        }

        $this->db->insert_batch('tt_kesiswaan', $params);
        $this->db->insert_batch('tt_gtk', $params);
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

    public function import_data(){

        $set_files = $_FILES["userfile"]["name"];
        $ext = explode(".", $set_files);
        $ext = end($ext);

        if($ext == 'xls' || $ext == 'xlsx'){
            // upload
            $file_tmp = $_FILES['userfile']['tmp_name'];
            $file_name = $_FILES['userfile']['name'];
            $file_size = $_FILES['userfile']['size'];
            $file_type = $_FILES['userfile']['type'];
            
            $object = PHPExcel_IOFactory::load($file_tmp);
    
            foreach($object->getWorksheetIterator() as $worksheet){
  
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
    
                for($row=2; $row < $highestRow; $row++){
    
                    $jenjang = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $nama_madrasah = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $code_kec = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $status = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $nsm = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $npsn = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                    $password = $worksheet->getCellByColumnAndRow(7, $row)->getValue();

                    $data[] = array(
                        'jenjang' => $jenjang,
                        'nama_madrasah' =>$nama_madrasah,
                        'code_kec' =>$code_kec,
                        'status' =>$status,
                        'nsm' =>$nsm,
                        'npsn' =>$npsn,
                        'password' =>$password,
                    );
    
                } 
  
            }
  
            $this->db->insert_batch('tt_lembaga', $data);
            $message = array('message' => SUCCESS);
            
            echo json_encode($message);
            exit();
        } else {
            $message = array('message' => ERRORS);
            
            echo json_encode($message);
            exit();
        }
    }

    public function export_data(){
        $this->data['users'] = $this->datauser->set_list();
        $this->load->view('admin/data_user_export', $this->data);
    }

}
 
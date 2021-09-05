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

        $this->load->model('user/M_Profile','profile');
        $this->load->model('user/M_Gtk','gtk');
        $this->key = $this->uri->segment(3);
    }
     
    public function index(){
        $nsm = $this->session->userdata('nsm'); 
        
        $this->data['title'] = 'GTK';
        $this->data['user'] = $this->profile->get_user($nsm);

        $this->load->view('user/gtk', $this->data);
    }

    public function search(){

        $no = 0;
        $data = array();
        
        $nsm = $this->session->userdata('nsm');
        $response = $this->profile->get_user($nsm);
        $list = $this->gtk->get_list($response[0]->id_lembaga); 

        foreach ($list as $row) {
            if ($row->akses_izinkan == 1) {
                $import = '<button data-id="'.$row->id_gtk.'" class="import btn btn-primary btn-sm"><i class="fa fa-download"></i></button>';
                $action = '<a href="'. base_url() . 'user/gtk_detail/' . $row->id_gtk.'" class="edit btn btn-info btn-sm"><i class="fa fa-pencil-square-o"></i></a>';
            } else {
                $import = '<button class="import btn btn-primary btn-sm" disabled><i class="fa fa-download"></i></button>';
                $action = '<button class="edit btn btn-info btn-sm" disabled><i class="fa fa-pencil-square-o"></i></button>';
            }
            $no++;
            
            $set_count = $this->gtk->count_spec($row->id_gtk);
            $guru_jkl = !empty($set_count['Guru']['L']) ? $set_count['Guru']['L'] : 0;
            $guru_jkp = !empty($set_count['Guru']['P']) ? $set_count['Guru']['P'] : 0;
            $guru_total = !empty($set_count['Guru']['Total']) ? $set_count['Guru']['Total'] : 0;
            $tendik_jkl = !empty($set_count['Tendik']['L']) ? $set_count['Tendik']['L'] : 0;
            $tendik_jkp = !empty($set_count['Tendik']['P']) ? $set_count['Tendik']['P'] : 0;
            $tendik_total = !empty($set_count['Tendik']['Total']) ? $set_count['Tendik']['Total'] : 0 ;

            $data[] = array(
                $no,
                $row->tahun_pelajaran,
                $row->semester,
                $guru_jkl,
                $guru_jkp,
                $tendik_jkl,
                $tendik_jkp,
                $guru_jkl + $tendik_jkl,
                $guru_jkp + $tendik_jkp,
                $guru_total + $tendik_total,
                $import,
                $action
             );
        }

        echo json_encode(['data' => $data]);
        exit();
    }

    public function get_data(){
        $key = $this->input->post('id', true);
        $response = $this->gtk->get_gtk($key);
       
        echo json_encode($response);
        exit();
    }

    public function import_gtk(){
        
        $set_files = $_FILES["userfile"]["name"];
        $ext = explode(".", $set_files);
        $ext = end($ext);

        $gtkID = $this->input->post('id_gtk');
        $lembagaID = $this->input->post('id_lembaga');

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
                    
                    $jabatan = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $nama = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $jk = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $status_kepegawaian = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $status_sertifikasi = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $status_tpp = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $status_inpassing = $worksheet->getCellByColumnAndRow(6, $row)->getValue();

                    $data[] = array(
                        'gtk_id' => $gtkID,
                        'lembaga_id_d' => $lembagaID,
                        'jabatan' => $jabatan,
                        'nama' =>$nama,
                        'jk' =>$jk,
                        'status_kepegawaian' =>$status_kepegawaian,
                        'status_sertifikasi' =>$status_sertifikasi,
                        'status_tpp' =>$status_tpp,
                        'status_inpassing' =>$status_inpassing,
                    );
    
                } 
  
            }
  
            $this->db->insert_batch('tt_gtk_detail', $data);
            
            $message = array('message' => SUCCESS);
            
            echo json_encode($message);
            exit();
        } else {
            $message = array('message' => ERRORS);
            
            echo json_encode($message);
            exit();
        }
    }

}
 
<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Author rendi widjaya
 * xcode-dev 2021
 * copyright
 */
class C_User extends CI_Controller{
      
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
        $this->load->model('admin/M_User','user');
        $this->key = $this->uri->segment(3);
    }
     
    public function index(){
        $user = $this->session->userdata('id_user');
        
        $this->data['title'] = 'User';
        $this->data['user'] = $this->profile->get_user($user);

        $this->load->view('admin/user', $this->data);
    }

    public function search(){
        $list = $this->user->list_user();
        $no = 0;
        $data = array();
        foreach ($list as $row) {
            $action = '<button data-id="'.$row->user_id.'" class="edit btn btn-primary btn-sm"><i class="fa fa-pencil"></i></button> <button data-id="'.$row->user_id.'" class="hapus btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>';
            $no++;
            $data[] = array('DT_RowId' => $no,
                $no,
                $row->name,
                $row->username,
                $row->email,
                $row->level,
                $this->stat($row->status),
                $action
             );
        }
         
        echo json_encode(['data' => $data]);
        exit();
    }

    public function get_data(){
        $key = $this->input->post('id', true);
        $response = $this->user->get_user($key);
       
        echo json_encode($response);
        exit();
    }

    public function save_add(){

        $params = new stdClass();
        $params->name = htmlspecialchars($this->input->post('name', true));
        $params->email = htmlspecialchars($this->input->post('email', true));
        $params->level = $this->input->post('level');
        $params->username = $this->input->post('username');
        $params->password = md5($this->input->post('password'));
        $params->status = $this->input->post('status');

        $this->user->add_user($params);
        echo json_encode(SUCCESS);
        exit();
    }

    public function save_update(){

        $params = new stdClass();
        $params->user_id = $this->input->post('user_id');
        $params->name = htmlspecialchars($this->input->post('name', true));
        $params->email = htmlspecialchars($this->input->post('email', true));
        $params->level = $this->input->post('level');
        $params->username = $this->input->post('username');
        $params->status = $this->input->post('status');

        $response = $this->user->get_user($params->user_id);
        if ($this->input->post('password')) {
            $params->password = md5($this->input->post('password'));
        } else {
            $params->password = $response[0]->password;
        }

        $this->user->update_user($params);
        echo json_encode(SUCCESS);
        exit();
    }

    public function destroy(){
        $key = $this->input->post('key');
        $response = $this->user->del_user($key);
        
        echo json_encode(SUCCESS);
        exit();
    }

    private function stat($data){
        switch ($data) {
            case '1':
                $status = '<div class="badge badge-success">Aktif</div>';
                break;
            case '0':
                $status = '<div class="badge badge-danger">Tidak Aktif</div>';
                break;
            }
        return $status;
    }

}
 
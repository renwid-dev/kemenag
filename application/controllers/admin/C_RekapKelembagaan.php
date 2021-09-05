<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Author rendi widjaya
 * xcode-dev 2021
 * copyright
 */
class C_RekapKelembagaan extends CI_Controller{
      
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
        $this->load->model('admin/M_Kesiswaan','kesiswaan');
        $this->key = $this->uri->segment(3);
    }
     
    public function index(){
        $user = $this->session->userdata('id_user');

        $this->data['title'] = 'Rekap Kelembagaan';
        $this->data['user'] = $this->profile->get_user($user);
        $this->data['tahun'] = $this->kesiswaan->tahun();
        $this->data['kec'] = $this->kesiswaan->kecamatan();
        $this->data['jenjang'] = $this->kesiswaan->jenjang();
        
        $this->load->view('admin/rekap_kelembagaan', $this->data);
    }

}
 
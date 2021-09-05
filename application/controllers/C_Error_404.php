<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Author rendi widjaya
 * xcode-dev 2021
 * copyright
 */
class C_Error_404 extends CI_Controller{

	public function index(){
        $this->output->set_status_header('404'); 
		$this->load->view('error_404');
	}
}
<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Author rendi widjaya
 * xcode-dev 2021
 * copyright
 */
class C_Backup_database extends CI_Controller{

    public function backup(){

            $this->load->dbutil();

            $prefs = array(     
                'format'      => 'sql',             
                'filename'    => "simhor_".date("Ymd-His").'.sql'
                );

            $backup =& $this->dbutil->backup($prefs); 

            $db_name = "simhor_".date("Ymd-His") .'.sql';
            $save = FCPATH.'assets/db/'.$db_name;
            $this->load->helper('file');
            write_file($save, $backup); 

            $this->load->helper('download');
            force_download($db_name, $backup);
    }
}
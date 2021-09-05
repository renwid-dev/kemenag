<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Author rendi widjaya
 * xcode-dev 2021
 * copyright
 */
class M_Login extends CI_Model{
    function cekadmin($nsm,$password){
        $hasil = $this->db->query("SELECT * FROM tt_lembaga WHERE nsm='$nsm' AND password='$password'");
        return $hasil;
    }
}
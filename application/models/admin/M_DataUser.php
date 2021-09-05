<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Author rendi widjaya
 * xcode-dev 2021
 * copyright
 */
class M_DataUser extends CI_Model{

    public function jenjang(){
        $result = $this->db->get('tm_jenjang');
        return $result->result();
    }

    public function kecamatan(){
        $result = $this->db->get('tm_kecamatan');
        return $result->result();
    }

    public function list_setting_tahun(){
        $this->db->order_by('tahun_pelajaran', 'desc');
        $query = $this->db->get('tm_setting_tahun');
        // $this->db->select('*');
        // $this->db->from('tm_setting_tahun S');
        // $this->db->join('tt_kesiswaan K', 'K.st_tahun_id = S.id_setting', 'left');
        // $query = $this->db->get();

        return $query->result(); 
    }

    public function list_kesiswaan($key){

        $this->db->select('id_kesiswaan, jenjang_lembaga, lembaga_id, semester, kode, tahun_pelajaran');
        $this->db->from('tt_kesiswaan');
        $this->db->join('tt_lembaga', 'tt_kesiswaan.lembaga_id = tt_lembaga.id_lembaga', 'left');
        $this->db->join('tm_setting_tahun', 'tt_kesiswaan.st_tahun_id = tm_setting_tahun.id_setting', 'left');
        $this->db->where('tt_kesiswaan.lembaga_id ', $key);
        
        $query = $this->db->get();
        return $query->result();
    }

    public function set_list(){

        $this->db->select('*');
        $this->db->from('tt_lembaga');
        $this->db->join('tm_kecamatan', 'tm_kecamatan.code = tt_lembaga.code_kec', 'left');
        $query = $this->db->get();
        
        return $query->result();
    }

    public function get_dtuser($key){

        $result = $this->db->select('*')
                            ->from('tt_lembaga')
                            ->join('tm_kecamatan', 'tt_lembaga.code_kec = tm_kecamatan.code')
                            ->where('tt_lembaga.id_lembaga', $key)
                            ->get();

        return $result->result();
    }

    public function add_dtuser($data){
        $data = array(
            'jenjang' => $data->jenjang, 
            'nama_madrasah' => $data->nama_madrasah, 
            'code_kec' => $data->code_kec, 
            'status' => $data->status, 
            'nsm' => $data->nsm, 
            'npsn' => $data->npsn, 
            'password' => $data->password, 
        );
        $this->db->insert('tt_lembaga', $data);

        return $this->db->insert_id();
    }

    public function update_dtuser($data){
        $this->db->set('jenjang', $data->jenjang);
        $this->db->set('nama_madrasah', $data->nama_madrasah);
        $this->db->set('code_kec', $data->code_kec);
        $this->db->set('status', $data->status);
        $this->db->set('nsm', $data->nsm);
        $this->db->set('npsn', $data->npsn);
        $this->db->set('password', $data->password);
        $this->db->where('id_lembaga', $data->id);

        $result = $this->db->update('tt_lembaga');
        return $result;
    }

    public function del_dtuser($key){
        $this->db->where('id_lembaga', $key);

        $result = $this->db->delete('tt_lembaga');
        return $result;
    }

    public function del_dtuse_detail($key){
        $this->db->where('id_header', $key);

        $result = $this->db->delete('tt_lembaga_detail');
        return $result;
    }

    public function full_delkesiswaan($key){
        $this->db->where('lembaga_id', $key);

        $result = $this->db->delete('tt_kesiswaan');
        return $result;
    }

    public function full_delgtk($key){
        $this->db->where('lembaga_id', $key);

        $result = $this->db->delete('tt_gtk');
        return $result;
    }

    public function full_delgtkdetail($key){
        $this->db->where('lembaga_id_d', $key);

        $result = $this->db->delete('tt_gtk_detail');
        return $result;
    }

    public function del_kesiswaan($key){
        $this->db->where('id_kesiswaan', $key);

        $result = $this->db->delete('tt_kesiswaan');
        return $result;
    }

    public function del_gtk($key){
        $this->db->where('id_gtk', $key);

        $result = $this->db->delete('tt_gtk');
        return $result;
    }

    public function save_add_kesiswaan($data){
        $xdata = array(
            'st_tahun_id' => $data->id_setting,
            'lembaga_id' => $data->id_lembaga,
            'jenjang_lembaga' => $data->jenjang,
        );

        $query = $this->db->insert('tt_kesiswaan', $xdata);
        return $query;
    }

    public function save_add_gtk($data){
        $xdata = array(
            'st_tahun_id' => $data->id_setting,
            'lembaga_id' => $data->id_lembaga,
            'jenjang_lembaga' => $data->jenjang,
        );

        $query = $this->db->insert('tt_gtk', $xdata);
        return $query;
    }
    
}
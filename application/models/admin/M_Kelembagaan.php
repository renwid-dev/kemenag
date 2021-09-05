<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Author rendi widjaya
 * xcode-dev 2021
 * copyright
 */
class M_Kelembagaan extends CI_Model{
    
    public function set_list($data){
        $this->db->select('*');
        $this->db->from('tt_lembaga L');
        $this->db->join('tt_lembaga_detail D', 'D.id_header = L.id_lembaga', 'left');
        $this->db->join('tm_kecamatan K', 'K.code = L.code_kec', 'left');
        $this->db->like('jenjang', $data->jenjang);
        $this->db->like('status', $data->status);
        $this->db->like('code_kec', $data->code_kec);
        $query = $this->db->get()->result();
        
        return $query;
    }

    public function jenjang(){
        $result = $this->db->get('tm_jenjang');
        return $result->result();
    }

    public function kecamatan(){
        $result = $this->db->get('tm_kecamatan');
        return $result->result();
    }

    public function get_kelembagaan($key){
        $this->db->select('*');
        $this->db->from('tt_lembaga');
        $this->db->join('tt_lembaga_detail', 'tt_lembaga_detail.id_header = tt_lembaga.id_lembaga', 'left');
        $this->db->join('tm_kecamatan', 'tm_kecamatan.code = tt_lembaga.code_kec');
        $this->db->where('tt_lembaga.id_lembaga', $key);

        $query = $this->db->get()->result();
        return $query;
    }

    public function save_add($data){
        $xdata = array(
           'id_header' => $data->id_header,
           'alamat' => $data->alamat,
           'nomor_siop' => $data->nomor_siop,
           'tanggal_siop' => $data->tanggal_siop,
           'type_masa_siop' => $data->type_masa_siop,
           'tgl_masa_siop' => $data->tgl_masa_siop,
           'akreditasi' => $data->akreditasi,
           'nilai_akreditasi' => $data->nilai_akreditasi,
           'nomor_akreditasi' => $data->nomor_akreditasi,
           'masa_akreditasi' => $data->masa_akreditasi,
           'nama_kamad' => $data->nama_kamad,
           'nip_kamad' => $data->nip_kamad,
           'no_hp_kamad' => $data->no_hp_kamad,
           'nama_op1' => $data->nama_op1,
           'nip_op1' => $data->nip_op1,
           'no_hp_op1' => $data->no_hp_op1,
           'nama_op2' => $data->nama_op2,
           'nip_op2' => $data->no_hp_op2,
           'no_hp_op2' => $data->no_hp_op2,
           'file_piagam_pendirian' => $data->file_piagam_pendirian,
           'file_ijin_operasional' => $data->file_ijin_operasional,
           'file_sertikat_akreditasi' => $data->file_sertikat_akreditasi,
        );

        $query = $this->db->insert('tt_lembaga_detail', $xdata);
        return $query;
    }

    public function save_update($data){
        $this->db->set('id_header', $data->id_header);
        $this->db->set('alamat', $data->alamat);
        $this->db->set('nomor_siop', $data->nomor_siop);
        $this->db->set('tanggal_siop', $data->tanggal_siop);
        $this->db->set('type_masa_siop', $data->type_masa_siop);
        $this->db->set('tgl_masa_siop', $data->tgl_masa_siop);
        $this->db->set('akreditasi', $data->akreditasi);
        $this->db->set('nilai_akreditasi', $data->nilai_akreditasi);
        $this->db->set('nomor_akreditasi', $data->nomor_akreditasi);
        $this->db->set('masa_akreditasi', $data->masa_akreditasi);
        $this->db->set('nama_kamad', $data->nama_kamad);
        $this->db->set('nip_kamad', $data->nip_kamad);
        $this->db->set('no_hp_kamad', $data->no_hp_kamad);
        $this->db->set('nama_op1', $data->nama_op1);
        $this->db->set('nip_op1', $data->nip_op1);
        $this->db->set('no_hp_op1', $data->no_hp_op1);
        $this->db->set('nama_op2', $data->nama_op2);
        $this->db->set('nip_op2', $data->nip_op2);
        $this->db->set('no_hp_op2', $data->no_hp_op2);
        $this->db->set('file_piagam_pendirian', $data->file_piagam_pendirian);
        $this->db->set('file_ijin_operasional', $data->file_ijin_operasional);
        $this->db->set('file_sertikat_akreditasi', $data->file_sertikat_akreditasi);
      
        $this->db->where('id_detail', $data->id_detail);

        $query = $this->db->update('tt_lembaga_detail');
        return $query;
    }

}
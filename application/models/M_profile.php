<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_profile extends CI_Model {

    // function tampilData(){
    //     $this->db->select('*');
    //     $this->db->from('profile');
    //     $this->db->where('date_delete = ', NULL);

    //     return $this->db->get()->result_array();
    // }
    
    function tambah_data(){
        date_default_timezone_set("Asia/Jakarta");

        $data = [
            "isi" => $this->input->post('isi',TRUE),
            "jenis" => $this->input->post('jenis',TRUE),
        ];

        $this->db->insert('profile',$data);
    }

    function edit_data(){
        date_default_timezone_set("Asia/Jakarta");

        $data = [
            "isi" => $this->input->post('isi',TRUE),
            "jenis" => $this->input->post('jenis',TRUE),
        ];

        $this->db->where('id',$this->input->post('id',TRUE));
        $this->db->update('profile',$data);
    }

    function hapus_data($id){
        $this->db->delete('profile',['id' => $id]);
    }
    
}

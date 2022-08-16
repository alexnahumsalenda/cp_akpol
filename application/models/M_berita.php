<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_berita extends CI_Model {

    function tampilData(){
       
    }

    function tambah_data($image){
        date_default_timezone_set("Asia/Jakarta");
        $data = [
            "judul" => $this->input->post('judul',TRUE),
            "isi" => $this->input->post('isi',TRUE),
            "img_cover" => $image,
            "created_at" => date("Y-m-d H:i:s", time()),
        ];
        $this->db->insert('berita',$data);
    }

    function hapus_data($id){
        $this->db->where('id',$id);
        $query = $this->db->get('berita');
        $row = $query->row();
        
        unlink("./assets/upload/$row->img_cover"); 
   
        $this->db->delete('berita',['id' => $id]);
    }

    function edit_data($file_name){
        date_default_timezone_set("Asia/Jakarta");
        $id = $this->input->post('id',TRUE);

        // update data pengurus

        if($file_name == 1){
            $data = [
                "judul" => $this->input->post('judul',TRUE),
                "isi" => $this->input->post('isi',TRUE),
            ];
        }
        else{
            $data = [
                "judul" => $this->input->post('judul',TRUE),
                "isi" => $this->input->post('isi',TRUE),
                "img_cover" => $file_name,
            ];
        }
        
        $this->db->where('id',$this->input->post('id',TRUE));
        $this->db->update('berita',$data);
    }
    
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

    function __construct(){
		parent::__construct();
                
        $this->load->model('M_berita');
    }

	public function index(){
		$data = array(	'title' 	=> 'Berita',
						'active'	=> 'Beranda',
						'isi'		=> 'user/home/list' );
		$this->load->view('user/layout/wrapper', $data, FALSE);
	}

    function tambah_data(){
        $upload_image = $_FILES['img_cover']['name'];

            if($upload_image){
                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['max_size']    = 700;
                $config['upload_path'] = './assets/upload/';
        
                $this->load->library('upload', $config);
        
                if($this->upload->do_upload('image')){
                    $new_image = $this->upload->data('file_name');
                    $this->M_berita->tambah_data($new_image);
                }
                else{
                    $this->session->set_flashdata('msg2','Gagal ditambahkan, foto tidak sesuai ketentuan');
                    redirect('berita');
                }
            }
            else{
                $a = '-';
                $this->M_berita->tambah_data($a);
            }

            $this->session->set_flashdata('msg','Data berhasil ditambahkan!');
            redirect('berita');
    }

    function hapus_data(){
        $id = $this->input->post('id',TRUE);
        $this->M_berita->hapus_data($id);

        $this->session->set_flashdata('msg','Data berhasil dihapus!');
		redirect('berita');
    }

    function edit_data(){
        $id = $this->input->post('id',TRUE);
        $get_gambar = $this->db->query("SELECT * FROM berita WHERE id_user='$id'")->row_array();
        $nama_gambar = $get_gambar['img_cover'];

        if($_FILES AND $_FILES['image']['name']){
                $config['upload_path']='./assets/upload/';
                $config['allowed_types']='jpeg|png|jpg';
                $config['max_size']=700;

                $this->load->library('upload',$config);
                    if(!$this->upload->do_upload('image')){
                    $this->session->set_flashdata('msg2','Data gagal diubah!');
                    redirect('berita');
                }
                            else{
                                    unlink('assets/upload/'.$nama_gambar);
                                    $file=$this->upload->data();

                                    $this->M_berita->edit_user($file['file_name']);
                            }
                    }
                    else{
                            $this->M_berita->edit_user(1);
                    }
                    $this->session->set_flashdata('msg','Data berhasil diubah!');
                    redirect('user');
        }
}



/* End of file Home.php */
/* Location: ./application/controllers/Home.php */
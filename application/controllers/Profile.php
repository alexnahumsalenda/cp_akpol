<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function index()
	{
		$data = array(	'title'		=> 'Profil',
						'active'	=> 'profil',
						'isi'		=> 'user/profil/visi');
		$this->load->view('user/layout/wrapper', $data, FALSE);
	}

	function tambah_data(){

		$this->M_Divisi->tambah_data();
		$this->session->set_flashdata('msg','Data berhasil ditambahkan!');
		redirect('profile');
	}

	function hapus_data(){
		$this->M_Divisi->hapus_data();
		$this->session->set_flashdata('msg','Data berhasil dihapus!');
		redirect('profile');
	}

	function edit_data(){

		$this->M_Divisi->edit_data();
		$this->session->set_flashdata('msg','Data berhasil diubah!');
		redirect('profile');
	}


}

/* End of file Profil.php */
/* Location: ./application/controllers/Profil.php */


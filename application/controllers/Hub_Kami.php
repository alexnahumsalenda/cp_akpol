<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function index()
    {
        $data = array(
            'title' => 'Hubungi Kami',
            'isi'    => 'user/hub_kami/index'
        );
        $this->load->view('user/layout/wrapper', $data, FALSE);
    }
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */
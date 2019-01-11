<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
	{
        $data_header['menu'] = false;
        $data_header['titulo_menu'] = 'Avaliação';

		$this->load->view('base/header', $data_header);
		$this->load->view('home');
		$this->load->view('base/footer');
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    private $cadastros;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('cadastro_model', 'modelcadastro');
        $this->cadastros = $this->modelcadastro->findAll();
    }

    public function index()
	{
        $data_header['menu'] = 'hom';
	    $data_page['cadastros'] = $this->cadastros;

		$this->load->view('base/header', $data_header);
		$this->load->view('home', $data_page);
		$this->load->view('base/footer');
	}
}

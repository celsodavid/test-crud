<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastro extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('cadastro_model', 'modelcadastro');
    }

    public function index()
	{
        $data_header['menu'] = 'cad';

        $this->load->view('base/header', $data_header);
        $this->load->view('cadastro');
        $this->load->view('base/footer');
	}

    public function ver($id)
    {
        $data_header['menu'] = 'cad';
        $data_page['cadastro'] = $this->modelcadastro->findById($id);

        $this->load->view('base/header', $data_header);
        $this->load->view('cad_ver', $data_page);
        $this->load->view('base/footer');
	}
}

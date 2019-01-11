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

    public function adicionar()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email|is_unique[cadastro.email]');
        $this->form_validation->set_rules('senha', 'Senha', 'required|min_length[6]');
        $this->form_validation->set_rules('confirmar_senha', 'Confirmar Senha', 'required|min_length[6]|matches[senha]');
        $this->form_validation->set_rules('telefone', 'Telefone', 'required|callback_valida_telefone');
        if ($this->form_validation->run() == false) {
            $this->index();
        }
        else {
            exit('cadastrar');
        }
	}

	public function valida_telefone()
    {
        $this->form_validation->set_message("valida_telefone", "Este telefone é inválido");
        return false;
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

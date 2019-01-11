<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastro extends CI_Controller
{
    private $regex = '/(\()?(10)|([1-9]){2}\)?((-|\s)?)([2-9][0-9]{3}((-|\s)?)[0-9]{4,5})/';

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
            $dados['rg']        = $this->input->post('rg');
            $dados['cep']       = $this->input->post('cep');
            $dados['nome']      = $this->input->post('nome');
            $dados['email']     = $this->input->post('email');
            $dados['senha']     = md5($this->input->post('senha'));
            $dados['numero']    = $this->input->post('numero');
            $dados['endereco']  = $this->input->post('endereco');
            $dados['telefone']  = $this->input->post('telefone');

            if (!$this->modelcadastro->insert($dados)) {
                $this->session->set_flashdata('success', 'Cadastro efetuado com sucesso!');
                redirect('home');
            }

            $this->session->set_flashdata('error', 'Cadastro não pode ser efetuado!');
            redirect('cadastro');
        }
	}

	public function editar()
    {

    }

	public function valida_telefone($tel)
    {
        if (preg_match($this->regex, $tel, $matches, PREG_OFFSET_CAPTURE, 0) == true) {
            return true;
        }

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

    public function excluir()
    {
        
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produto extends CI_Controller
{
    private $produtos;
    private $especial;
    private $normal;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Produto_model', 'modelproduto');
        $this->produtos = $this->modelproduto->findAll();
        $this->especial = 'especial';
        $this->normal = 'normal';
    }

    public function index()
	{
        $data_header['menu'] = false;
        $data_header['titulo_menu'] = 'Listagem de Produtos';

        $data_page['produtos'] = $this->produtos;

		$this->load->view('base/header', $data_header);
		$this->load->view('produto', $data_page);
		$this->load->view('base/footer');
	}

    public function criar()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('combo[]', 'combo', 'required|callback_valida_combo');
        if ($this->form_validation->run() == false) {
            $this->index();
        }
        else {
            $qtd_demais_produtos = 0;
            $qtd_produtos_especiais = 0;

            $ids = implode(',', $this->input->post('combo'));
            $produtos = $this->modelproduto->findByIn($ids);
            foreach ($produtos as $produto) {
                if ($produto->categoria == $this->normal) {
                    $qtd_demais_produtos++;
                }

                if ($produto->categoria == $this->especial) {
                    $qtd_produtos_especiais++;
                }
            }

            $query['qtd_demais_produtos'] = $qtd_demais_produtos;
            $query['qtd_produtos_especiais'] = $qtd_produtos_especiais;
            
            redirect('produto/detalhe?'.http_build_query($query));
        }
	}

    public function valida_combo($combo)
    {
        if (is_null($combo)) {
            $this->form_validation->set_message("valida_combo", "Selecione produtos para criar o combo");
            return false;
        }

        $ids = implode(',', $this->input->post('combo'));
        $produtos = $this->modelproduto->findByIn($ids);

        $tem_especial = false;
        $aux = 0;
        foreach ($produtos as $produto) {
            $aux++;
            if ($produto->categoria == $this->especial) {
                $tem_especial = true;
            }
        }

        if ($aux >= 4 && $tem_especial) {
            return true;
        }

        $this->form_validation->set_message("valida_combo", "Não é um combo de produtos válido.");
        return false;
	}

    public function detalhe()
    {
        $data_header['menu'] = false;
        $data_header['titulo_menu'] = 'Pontos Gerados';

        $data_page['qtd_demais_produtos'] = $this->input->get('qtd_demais_produtos');
        $data_page['qtd_produtos_especiais'] = $this->input->get('qtd_produtos_especiais');
        $data_page['total_produtos'] = $data_page['qtd_demais_produtos'] + $data_page['qtd_produtos_especiais'];

        $pontos_gerados = 0;
        if ($data_page['qtd_produtos_especiais'] == 4) {
            $pontos_gerados++;
        }
        elseif ($data_page['total_produtos'] >= 4 && $data_page['qtd_produtos_especiais'] == 1) {
            $pontos_gerados++;
        }
        elseif ($data_page['total_produtos'] >= 4 && $data_page['qtd_produtos_especiais'] == 1) {
            $pontos_gerados++;
        }
        elseif ($data_page['total_produtos'] >= 4 && $data_page['qtd_produtos_especiais'] == 2) {
            $pontos_gerados = $pontos_gerados + 2;
        }
        elseif ($data_page['total_produtos'] >= 4 && $data_page['qtd_produtos_especiais'] == 5) {
            $pontos_gerados = $pontos_gerados + 5;
        }
        else {
            $this->session->set_flashdata('error', 'Não é um combo de produtos válido.');
            redirect('produto');
        }

        $data_page['pontos_gerados'] = $pontos_gerados;

        $this->load->view('base/header', $data_header);
        $this->load->view('detalhe', $data_page);
        $this->load->view('base/footer');
	}
}

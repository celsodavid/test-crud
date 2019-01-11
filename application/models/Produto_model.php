<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: celso
 * Date: 09/01/2019
 * Time: 10:51
 */

class Produto_model extends CI_Model
{
    public function findAll()
    {
        $this->db->order_by('nome', 'ASC');
        return $this->db->get('produto')->result();
    }

    public function findByIn($ids)
    {
        $ids = str_replace("\"", "", $ids);

        $this->db->select('categoria.nome AS categoria, produto.id, produto.nome');
        $this->db->join('categoria', 'produto.id_categoria = categoria.id', 'left');
        $this->db->where("produto.id IN({$ids})");
        return $this->db->get('produto')->result();

    }
}

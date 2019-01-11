<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: celso
 * Date: 09/01/2019
 * Time: 10:51
 */

class Cadastro_model extends CI_Model
{
    public function findAll()
    {
        $this->db->order_by('id', 'DESC');
        return $this->db->get('cadastro')->result();
    }

    public function findById($id = null)
    {
        try {
            if (is_null($id)) {
                throw new Exception('Id não enviado', 400);
            }

            $this->db->where('id', $id);
            return $this->db->get('cadastro')->row();
        } catch (Exception $e) {
            return false;
        }
    }

    public function insert($dados)
    {
        return $this->db->insert('cadastro', $dados);
    }

    public function editar($id, $dados)
    {
        try {
            if (!$this->findById($id)) {
                throw new Exception('ID de cadastro não encontrado', 404);
            }

            $this->db->where('id', $id);
            return $this->db->update('cadastro', $dados);
        } catch (Exception $e) {
            return false;
        }
    }

    public function excluir($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('cadastro');
    }
}

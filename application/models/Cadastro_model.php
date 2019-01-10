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
}

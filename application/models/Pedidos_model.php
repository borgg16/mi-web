<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos_model extends CI_Model {
    public function crear_pedido($data){
        $this->db->insert('pedidos',$data);
        return $this->db->insert_id(); //Devuelve el ID numerico
    }

    public function marcar_pagado($id){
        $this->db->where('id',$id);
        $this->db->update('pedidos', array('estado'=>'pagado'));
    }
}
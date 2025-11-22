<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class detalleProducto_model extends CI_Model {
    public function obtener_producto($id){
        $this->db->where('id',$id);
        $query = $this->db->get('productos');
        return $query->row_array();
    }

}
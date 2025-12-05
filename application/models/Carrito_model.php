<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Carrito_model extends CI_Model{

    public function agregar($data){
        //Buscamos si este usuario ya tiene este producto en la cesta
        $this->db->where('usuario_id',$data['usuario_id']);
        $this->db->where('producto_id',$data['producto_id']);
        $query = $this->db->get('cesta');

        if($query->num_rows()>0){
            //SI EXISTE: Actualizamos la cantidad
            $item = $query->row();
            $nueva_cantidad = $item->cantidad + $data['cantidad'];

            $this->db->where('id',$item->id);
            return $this->db->update('cesta',array('cantidad'=>$nueva_cantidad));
        }else{
            //NO EXISTE: lo insertamos como nuevo
            return $this->db->insert('cesta',$data);
        }
    }

    public function obtener_cesta($id_usuario){
        //Seleccionamos datos de la cesta y del producto
        $this->db->select('cesta.id as id_cesta, cesta.cantidad, productos.nombre, productos.precio, productos.imagen');
        $this->db->from('cesta');

        //El JOIN es la clave ya que une la tabla cesta con los productos usando el id
        $this->db->join('productos','productos.id = cesta.producto_id');
        $this->db->where('cesta.usuario_id', $id_usuario);
        return $this->db->get()->result();
    }

    public function eliminar_item($id_cesta){
        $this->db->where('id',$id_cesta);
        return $this->db->delete('cesta');
    }

    public function vaciar_cesta($id_usuario){
        $this->db->where('usuario_id', $id_usuario);
        return $this->db->delete('cesta');
    }

}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class usuarios_model extends CI_Model {

    //Funcion para guardar usuarios
    public function registrar($data){
        //INSERTAMOS A LA LISTA usuarios
        $this->db->insert('usuarios',$data);
        return $this->db->insert_id();
    }

    //Funcion para buscar usuarios por su nombre para el login
    public function obtener_usuario($nombre_usuario){
        $this->db->where('usuario',$nombre_usuario);
        $query = $this->db->get('usuarios');

        return $query->row();
    }


}
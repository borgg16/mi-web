<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('usuarios_model');
    }

    //PROCESO DE REGISTRO
    public function registrar(){
        //1.-Recibimos los datos del formulario HTML
        $usuario = $this->input->post('usuario');
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        //2.-Encriptamos la contraseña
        $password_encriptada = password_hash($password, PASSWORD_DEFAULT);

        //3-Preparamos el paquete a pasar al modelo
        $data = array(
            'usuario' => $usuario,
            'email' => $email,
            'password' => $password_encriptada
        );

        //4.-Enviamos los datos al Modelo
        if($this->usuarios_model->registrar($data)){
            //Si todo okey pues iniciamos directamente sesion, pa que hacerle perder tiempo al usuario
            $data_sesion = array(
                'id_usuario' => $this->db->insert_id(),
                'usuario' => $usuario,
                'logged_in' => TRUE
            );
            $this->session->set_userdata($data_sesion);

            //Redirigimos a inicio
            redirect(base_url());
        }else{
            echo "Error al registrar. Puede que el usuario o email ya existan.";
        }

    }

    //FUNCION DEL LOGIN
    public function login(){
        $usuario = $this->input->post('usuario');
        $password = $this->input->post('password');

        //1-Buscamos al usuario en la base de datos
        $user_data = $this->usuarios_model->obtener_usuario($usuario);

        //2.-Comprobar dos cosas:
        //      A)¿Existe usuario? ($user_data no esta vacio)
        //      B)¿La contraseña coincide con la encriptada? (password_verify)
        if($user_data && password_verify($password,$user_data->password)){
            //Login correcto
            $session_data = array(
                'id_usuario'=> $user_data->id,
                'usuario' => $user_data->usuario,
                'logged_in' => TRUE
            );
            $this->session->set_userdata($session_data);

            redirect(base_url());
        }else{
            //Login fallido
            //redirigimos a la pagina principal pero con un error de tipo login
            redirect(base_url().'?error=login');
        }
    }

    //PROCESO LOGOUT
    public function logout(){
        //Borramos al sesion
        $this->session->sess_destroy();
        redirect(base_url());
    }

}
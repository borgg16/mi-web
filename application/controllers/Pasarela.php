<?php 
//Equivale al Form.php que se nos da en el ejemplo de clase
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasarela extends CI_Controller {
    public function __construct(){
        parent::__construct();

        //En el helper hemos añadido form_validation (creo que de esa forma es mas inseguro que añadirlo aqui en el constructor)
        //En library hemos añadido session

        //Cargamos los modelos
        $this->load->model('Carrito_model');
        $this->load->model('Pedidos_model');
    }

    //Mostramos el formulario de direccion (Equivalente a cargar myform.php en el ejemplo)
    public function index(){
        if(!$this->session->userdata('logged_in')){
            redirect('Auth/login');//pagina de logeo de usuario
        }

        //Reglas de validacion de los valores de la base de dato
        $this->form_validation->set_rules('direccion','Direccion','required');
        $this->form_validation->set_rules('codigopostal','Codigo Postal', 'trim|required|numeric|exact_length[5]');
        $this->form_validation->set_rules('ciudad','Ciudad','trim|required');
        $this->form_validation->set_rules('telefono','Telefono','trim|required');

        //Comprobamos si la validacion falla o es la primera vez que se realiza, en caso de ser la primera vez, mostramos el formulario
        if($this->form_validation->run() == FALSE){
            $this->load->view('checkout_view'); // equivale a myform.php
        }else{
            //Si todo OK, preparamos el puente
            $this->procesar_pedido_y_enviar_al_banco();
        }
    }

    //Esta funcion es una funcion auxiliar cuya funcion es cargar todos los datos y preparar en si mismo el pedido para pasar al puente donde se hara el pago, es privada porque se pretende que nadie pueda modificar los datos una vez se inicie el proceso
    private function procesar_pedido_y_enviar_al_banco(){
        $id_usuario = $this->session->userdata('id_usuario');
        $items = $this->Carrito_model->obtener_cesta($id_usuario);

        //Calculamos el total a pagar
        $total = 0;
        foreach($items as $item) {
            $total += ($item->precio * $item->cantidad);
        }

        if($total <= 0){
            redirect('Carrito');
        }

        //Guardamos en la base de datos el pedido y obtenemos un ID asociado al pedido (cartID)
        $datos_pedido = array(
            'usuario_id' => $id_usuario,
            'total' => $total,
            'direccion' => $this->input->post('direccion'),
            'ciudad' => $this->input->post('ciudad'),
            'codigopostal' => $this->input->post('codigopostal'),
            'telefono' => $this->input->post('telefono')
        );

        //Obtenemos el ID del pedido (Equivale al $PeticionActual en el ejemplo)
        $id_pedido = $this->Pedidos_model->crear_pedido($datos_pedido);

        //Preparamos los datos para la vista del puente
        $data['PeticionActual'] = $id_pedido; //este es el cartID
        $data['total'] = $total;
        $data['direccion'] = $this->input->post('direccion');
        $data['ciudad'] = $this->input->post('ciudad');
        $data['codigopostal'] = $this->input->post('codigopostal');

        //Cargamos ahora la vista del puente (equivale a callumapal.php)
        $this->load->view('pasarela_puente_view',$data);
    }

    //Creamos los retornos para caso de pago exitoso y pago erroneo
    public function pago_correcto(){
        //Recuperamos el cartID que nos devuelve procesar.php
        $id_pedido = $this->input->post('cartID');

        if($id_pedido){
            $this->Pedidos_model->marcar_pagado($id_pedido);
            //Como pedido ya pagado, vaciamos el carrito
            $this->Carrito_model->vaciar_cesta($this->session->userdata('id_usuario'));
        }

        $data['PeticionActual'] = $id_pedido;
        $this->load->view('pago_exito',$data); //Equivale al sucess.php
    }

    public function pago_cancelado(){
        $data['PeticionActual'] = $this->input->post('cartID');
        $this->load->view('pago_cancelado',$data); //Equivale al cancel.php
    }

}
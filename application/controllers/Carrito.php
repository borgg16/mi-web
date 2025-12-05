<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carrito extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Carrito_model');
    }

    //mostramos la vista del carrito
    public function index()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url('#login-modal')); //si no esta logueado, fuera
        }

        $id_usuario = $this->session->userdata('id_usuario');
        $data['titulo'] = 'Tu Cesta';

        //Pedimos los datos al modelo
        $data['items'] = $this->Carrito_model->obtener_cesta($id_usuario);

        //Calculamos el total aquí para enviarlo ya sumado a la vista
        $data['total'] = 0;
        foreach ($data['items'] as $item) {
            $data['total'] += ($item->precio * $item->cantidad);
        }

        $this->load->view('cesta_view', $data);
    }

    //Recibimos el formulario de "Añadir"
    public function agregar()
    {
        //Solo si se está loggeado
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url('#login-modal')); //si no esta logueado, fuera
        }

        $data = array(
            'usuario_id' => $this->session->userdata('id_usuario'),
            'producto_id' => $this->input->post('producto_id'),
            'cantidad' => $this->input->post('cantidad')
        );

        $this->Carrito_model->agregar($data);

        redirect('Carrito');
    }

    public function borrar($id_cesta){
        $this->Carrito_model->eliminar_item($id_cesta);
        redirect('Carrito'); //Recargamos la pagina para que no se siga mostrando el articulo
    }

    public function finalizar_compra(){
        $id_usuario = $this->session->userdata('id_usuario');
        $this->Carrito_model->vaciar_cesta($id_usuario);
        redirect(base_url());
    }



}
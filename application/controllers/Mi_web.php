<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mi_web extends CI_Controller {
	public function index()
	{
		$data['titulo']='Pagina Principal';

		// Cargar modelo y obtener productos destacados para la vista principal
		$this->load->model('detalleProducto_model');
		$data['producto_home1'] = $this->detalleProducto_model->obtener_producto(1);
		$data['producto_home2'] = $this->detalleProducto_model->obtener_producto(2);
		$data['producto_home3'] = $this->detalleProducto_model->obtener_producto(3);
		$data['producto_home4'] = $this->detalleProducto_model->obtener_producto(4);
		$this->load->view('pagina-principal',$data);
	}

	public function contacto()
	{
		$data['titulo']='Contacto';

		$this->load->view('contacto',$data);
	}

	public function ver_producto($id)
	{
		$this->load->model('detalleProducto_model');
		$data['producto']=$this->detalleProducto_model->obtener_producto($id);

		if(empty($data['producto'])){
			show_404();
		}

		$data['titulo'] = $data['producto']['nombre'];

		$this->load->view('detalleProducto',$data);
	}

}

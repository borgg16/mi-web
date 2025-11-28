<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mi_web extends CI_Controller {
	public function __construct() {
		parent ::__construct();
		// Cargar modelo y obtener productos destacados para la vista principal
		$this->load->model('detalleProducto_model');
	}
	public function index()
	{
		$data['titulo']='Pagina Principal';

		$data['producto_home1'] = $this->detalleProducto_model->obtener_producto(1);
		$data['producto_home2'] = $this->detalleProducto_model->obtener_producto(2);
		$data['producto_home3'] = $this->detalleProducto_model->obtener_producto(3);
		$data['producto_home4'] = $this->detalleProducto_model->obtener_producto(4);
		$this->load->view('pagina-principal',$data);
	}

	public function contacto()
	{
		$data['titulo']='Contacto';
		$data['categoria_actual'] = 'contacto';

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

	public function percusion() {
		$data['titulo'] = 'Instrumentos de Percusion';
		$data['categoria_actual'] = 'percusion';
		$data['productos'] = $this->detalleProducto_model->obtener_por_categoria('percusion');

		$this->load->view('categoria_view',$data);
	}
	
	public function viento() {
		$data['titulo'] = 'Instrumentos de Viento';
		$data['categoria_actual'] = 'viento';
		$data['productos'] = $this->detalleProducto_model->obtener_por_categoria('viento');

		$this->load->view('categoria_view',$data);
	}

	public function accesorios() {
		$data['titulo'] = 'Accesorios de Instrumentos';
		$data['categoria_actual'] = 'accesorios';
		$data['productos'] = $this->detalleProducto_model->obtener_por_categoria('accesorios');

		$this->load->view('categoria_view',$data);
	}

}

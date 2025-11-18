<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mi_web extends CI_Controller {
	public function index()
	{
		$data['titulo']='Pagina Principal';

		$this->load->view('pagina-principal',$data);
	}
}

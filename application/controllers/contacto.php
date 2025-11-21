<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class contacto extends CI_Controller {
	public function index()
	{
		$data['titulo']='Contacto';

		$this->load->view('contacto',$data);
	}
}

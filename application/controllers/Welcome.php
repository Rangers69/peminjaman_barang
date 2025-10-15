<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	public function index()
	{

		$this->load->view('master/header');
		$this->load->view('master/sidebar');
		$this->load->view('home');
		$this->load->view('master/footer');
	}
}

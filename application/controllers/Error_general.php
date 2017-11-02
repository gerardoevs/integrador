<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error_general extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('form_validation');
	}

	public function index()
	{
		
		if($this->session->userdata('username'))
		{

			$this->load->view('header');
			$this->load->view('top-menu');
			$this->load->view('menu-lateral');
			$this->load->view('error_general');
			$this->load->view('footer');
		}else
		{
			redirect('main');
		}
	}




}

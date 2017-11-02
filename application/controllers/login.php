<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->form_validation->set_rules('user', 'Usuario', 'required');
        $this->form_validation->set_rules('pass', 'Contraseña', 'required');
		if($this->session->userdata('username'))
		{
			redirect('main');
		}
		if ($this->form_validation->run() == FALSE)
        {
			$this->load->view('login');
        }
        else
        {
        		$contraseña = sha1($_POST['pass']);
				$llave = sha1("ave");
				$entrada = sha1($contraseña.$llave);
				$this->load->model('login_model');
				if($this->login_model->verificar($_POST['user'],$entrada))
				{
					$this->session->set_userdata("username",$_POST['user']);
					redirect('main');
				}else
				{
					$data["error"]="Usuario o contraseña invalido";
					$this->load->view('login',$data);
				}	
        }
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

	public function nombre()
	{
		$a = $this->session->item();
		return $a;
	}



}

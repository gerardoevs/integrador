<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_usuarios extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->database();
		$this->load->helper('url');
	}

	public function index()
	{
		
		if($this->session->userdata('username'))
		{
			$query = $this->db->get("usuarios"); 
	        $data['records'] = $query->result(); 
			$this->load->view('header');
			$this->load->view('top-menu');
			$this->load->view('menu-lateral');
			$this->load->view('administracion/usuarios/adm_usuarios',$data);
			$this->load->view('footer');
		}else
		{
			redirect('main');
		}
	}

	public function add()
	{
		
		if($this->session->userdata('username'))
		{
			$this->load->view('header');
			$this->load->view('top-menu');
			$this->load->view('menu-lateral');
			$this->load->view('administracion/usuarios/adm_usuarios_add');
			$this->load->view('footer');
		}else
		{
			redirect('main');
		}

	}

	public function update_view()
	{
		
		if($this->session->userdata('username'))
		{
			$id = $this->uri->segment('3'); 
			$query = $this->db->get_where("usuarios",array("userID"=>$id));
        	$data['records'] = $query->result(); 
			$this->load->view('header');
			$this->load->view('top-menu');
			$this->load->view('menu-lateral');
			$this->load->view('administracion/usuarios/adm_usuarios_edit',$data);
			$this->load->view('footer');
		}else
		{
			redirect('main');
		}

	}

        
      public function agregar(){
			if(isset($_POST['submit']))
				{
				$this->load->model('adm_usuarios/adm_usuarios_model');
				if($this->adm_usuarios_model->add($_POST['usr'],$_POST['pwd']))
				{
					redirect('adm_usuarios');
				}else
				{
					redirect('maina');
				}
			}else
			{
				$this->load->view('administracion/conductor/Adm_conductor_add');
			}
	}

	public function modificar()
         {
			if(isset($_POST['submit']))
				{
				if($_POST['pwd'] == $_POST['pwd2'])
				{
					$this->load->model('adm_usuarios/adm_usuarios_model');
					if($this->adm_usuarios_model->update($_POST['id'],$_POST['usr'],$_POST['pwd']))
					{
						redirect('adm_usuarios');
					}else
					{
						redirect('maina');
					}
				}else{

				}
			}else
			{
				$this->load->view('administracion/conductor/Adm_conductor_add');
			}
	}

	public function eliminar()
        {
			$this->load->model('adm_usuarios/adm_usuarios_model');
				$id = $this->uri->segment('3'); 
				if($this->adm_usuarios_model->del($id))
				{
					redirect('adm_usuarios');
				}else
				{
					redirect('maina');
				}
	}




}

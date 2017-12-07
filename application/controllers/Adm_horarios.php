<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_horarios extends CI_Controller {

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
			$query = $this->db->query("SELECT * FROM horarios WHERE estado = 1");
			$data["horarios"] = $query->result();
            
			$this->load->view('header');
			$this->load->view('top-menu');
			$this->load->view('menu-lateral');
			$this->load->view('administracion/horarios/Adm_horarios',$data);
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
			$query = $this->db->query("SELECT id, num_ruta FROM ruta");
			$data["rutas"] = $query->result();



			$this->load->view('header');
			$this->load->view('top-menu');
			$this->load->view('menu-lateral');
			$this->load->view('administracion/horarios/adm_horarios_add',$data);
			$this->load->view('footer');
		}else
		{
			redirect('main');
		}

	}

	public function agregar(){
			$this->form_validation->set_rules('salida', 'Hora de salida', 'required');
			$this->form_validation->set_rules('llegada', 'Hora de llegada', 'required');
			$this->form_validation->set_rules('ruta', 'ruta', 'required');
			$this->form_validation->set_rules('ruta', 'unidad', 'required');
	        if ($this->form_validation->run() == FALSE)
			{
				$query = $this->db->query("SELECT id, num_ruta FROM ruta");
				$data["rutas"] = $query->result();
				
				$this->load->view('header');
				$this->load->view('top-menu');
				$this->load->view('menu-lateral');
				$this->load->view('administracion/horarios/adm_horarios_add',$data);
				$this->load->view('footer');
			}else
			{
				$this->load->model('adm_horarios/adm_horarios_model');
				if($this->adm_horarios_model->add($_POST['salida'],$_POST['llegada'],$_POST['ruta'],$_POST['unidad']))
				{
					redirect('adm_horarios');
				}else
				{
					redirect('Error_general');
				}
			}
	}






}

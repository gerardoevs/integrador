<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_terminal extends CI_Controller {

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
			$query = $this->db->query("SELECT terminales.terminalnombre, terminales.id,departamentos.nombre FROM terminales INNER JOIN departamentos on departamentos.idDepartamentos = terminales.idDepartamento"); 
	        $data['records'] = $query->result(); 
			$this->load->view('header');
			$this->load->view('top-menu');
			$this->load->view('menu-lateral');
			$this->load->view('administracion/terminal/adm_terminal',$data);
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
			$query = $this->db->query('SELECT * FROM departamentos');
        	$data['departamentos'] = $query->result(); 
			$this->load->view('header');
			$this->load->view('top-menu');
			$this->load->view('menu-lateral');
			$this->load->view('administracion/terminal/adm_terminal_add',$data);
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
			$query = $this->db->get_where("terminales",array("id"=>$id));
        	$data['records'] = $query->result(); 
			$query = $this->db->query("SELECT terminales.terminalnombre, terminales.id,departamentos.nombre, departamentos.idDepartamentos FROM terminales INNER JOIN departamentos on departamentos.idDepartamentos = terminales.idDepartamento WHERE id=$id"); 
			$data['departamento'] = $query->result(); 
			$query = $this->db->query("SELECT * FROM departamentos"); 
			$data['dep'] = $query->result(); 
			$this->load->view('header');
			$this->load->view('top-menu');
			$this->load->view('menu-lateral');
			$this->load->view('administracion/terminal/adm_terminal_edit',$data);
			$this->load->view('footer');
		}else
		{
			redirect('main');
		}

	}

        
      public function agregar(){
			$this->form_validation->set_rules('nombre', 'Nombre de Terminal', 'required');
	        if ($this->form_validation->run() == FALSE)
			{
				$query = $this->db->query('SELECT * FROM departamentos');
	        	$data['departamentos'] = $query->result(); 
				$this->load->view('header');
				$this->load->view('top-menu');
				$this->load->view('menu-lateral');
				$this->load->view('administracion/terminal/adm_terminal_add',$data);
			}else
			{
				$this->load->model('adm_terminal/adm_terminal_model');
				if($this->adm_terminal_model->add($_POST['nombre'],$_POST['dep'],$_POST['lat_terminal'],$_POST['lon_terminal']))
				{
					redirect('adm_terminal');
				}else
				{
					redirect('Error_general');
				}
			}
	}

	public function modificar()
         {
			$this->form_validation->set_rules('nombre', 'Nombre de Terminal', 'required');
	        if ($this->form_validation->run() == FALSE)
			{
				$id = $_POST['id']; 
				$query = $this->db->get_where("terminales",array("id"=>$id));
	        	$data['records'] = $query->result(); 
				$query = $this->db->query("SELECT terminales.terminalnombre, terminales.id,departamentos.nombre, departamentos.idDepartamentos FROM terminales INNER JOIN departamentos on departamentos.idDepartamentos = terminales.idDepartamento WHERE id=$id"); 
				$data['departamento'] = $query->result(); 
				$query = $this->db->query("SELECT * FROM departamentos"); 
				$data['dep'] = $query->result(); 
				$this->load->view('header');
				$this->load->view('top-menu');
				$this->load->view('menu-lateral');
				$this->load->view('administracion/terminal/adm_terminal_edit',$data);
				$this->load->view('footer');
			}else
			{
				$this->load->model('adm_terminal/adm_terminal_model');
				if($this->adm_terminal_model->update($_POST['id'],$_POST['nombre'],$_POST['dep'],$_POST['lat_terminal'],$_POST['lon_terminal']))
				{
					redirect('adm_terminal');
				}else
				{
					redirect('Error_general');
				}
			}
	}

	public function eliminar()
        {
			$this->load->model('adm_terminal/adm_terminal_model');
				$id = $this->uri->segment('3'); 
				if($this->adm_terminal_model->del($id))
				{
					redirect('adm_terminal');
				}else
				{
					redirect('Error_general');
				}
	}




}

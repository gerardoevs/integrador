<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_departamentos extends CI_Controller {

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
			$query = $this->db->get("departamentos"); 
	        $data['records'] = $query->result(); 
			$this->load->view('header');
			$this->load->view('top-menu');
			$this->load->view('menu-lateral');
			$this->load->view('administracion/departamentos/adm_departamentos',$data);
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
			$this->load->view('administracion/departamentos/adm_departamentos_add');
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
			$query = $this->db->get_where("departamentos",array("idDepartamentos"=>$id));
        	$data['records'] = $query->result();
			$this->load->view('header');
			$this->load->view('top-menu');
			$this->load->view('menu-lateral');
			$this->load->view('administracion/departamentos/adm_departamentos_edit',$data);
			$this->load->view('footer');
		}else
		{
			redirect('main');
		}

	}

        
      public function agregar(){
			$this->form_validation->set_rules('nombre', 'Nombre de departamento', 'required');		
	        if ($this->form_validation->run() == FALSE)
	        {
				$this->load->view('header');
				$this->load->view('top-menu');
				$this->load->view('menu-lateral');
				$this->load->view('administracion/departamentos/adm_departamentos_add');
				$this->load->view('footer');
			}else{
				$nombre=$_POST['nombre'];
				$datos = array(
				'nombre' => $nombre,
				);
		 		$query =$this->db->insert('departamentos',$datos);
				$query = $this->db->get("departamentos"); 
	       		$data['records'] = $query->result();
	       		$data['mensaje'] = "Departamento agregado exitosamente";
				$this->load->view('header');
				$this->load->view('top-menu');
				$this->load->view('menu-lateral');
				$this->load->view('administracion/departamentos/adm_departamentos',$data);
				$this->load->view('footer');
			}		
	}

	public function modificar()
    {
			$this->form_validation->set_rules('nombre', 'Nombre de departamento', 'required');		
	        if ($this->form_validation->run() == FALSE)
	        {
	        	$id = $_POST['id']; 
				$query = $this->db->get_where("departamentos",array("idDepartamentos"=>$id));
	        	$data['records'] = $query->result();
				$this->load->view('header');
				$this->load->view('top-menu');
				$this->load->view('menu-lateral');
				$this->load->view('administracion/departamentos/adm_departamentos_edit',$data);
				$this->load->view('footer');
	        }
	        else{
	        	$nombre=$_POST['nombre'];
	        	$id=$_POST['id'];
	        	$datos = array(
				'nombre' => $nombre,
				);
				$this->db->set($datos); 
		        $this->db->where("idDepartamentos", $id); 
		        $this->db->update("departamentos", $datos);
		        $query = $this->db->get("departamentos"); 
		        $data['records'] = $query->result(); 
				$this->load->view('header');
				$this->load->view('top-menu');
				$this->load->view('menu-lateral');
				$this->load->view('administracion/departamentos/adm_departamentos',$data);
				$this->load->view('footer');
	        }
	}

	public function eliminar()
        {
			
			$id = $this->uri->segment('3'); 
			$this->db->delete("departamentos", "idDepartamentos = ".$id);
		}




}

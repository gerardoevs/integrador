<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_empleados extends CI_Controller {

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

	        $query = $this->db->get('empleados');
			$data['records'] = $query->result();
			$this->load->view('header');
			$this->load->view('top-menu');
			$this->load->view('menu-lateral');
			$this->load->view('administracion/empleados/adm_empleados', $data);
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
			$this->load->view('administracion/conductor/Adm_conductor_add');
			$this->load->view('footer');
		}else
		{
			redirect('main');
		}

	}

	public function update()
	{
		
		if($this->session->userdata('username'))
		{
			$query = $this->db->get("conductores"); 
	        $data['records'] = $query->result(); 
			$this->load->view('header');
			$this->load->view('top-menu');
			$this->load->view('menu-lateral');
			$this->load->view('administracion/conductor/Adm_conductor_update',$data);
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
			$query = $this->db->get_where("conductores",array("id"=>$id));
        	$data['records'] = $query->result(); 
			$this->load->view('header');
			$this->load->view('top-menu');
			$this->load->view('menu-lateral');
			$this->load->view('administracion/conductor/adm_conductor_edit',$data);
			$this->load->view('footer');
		}else
		{
			redirect('main');
		}

	}

	public function agregar()
         {
         	$this->form_validation->set_rules('nombre', 'Nombre', 'required');
	        $this->form_validation->set_rules('apellido', 'Apellido', 'required');
	        $this->form_validation->set_rules('edad', 'Edad', 'required');
	        $this->form_validation->set_rules('dir', 'Dirección', 'required');
	        $this->form_validation->set_rules('dui', 'DUI', 'required');
	        $this->form_validation->set_rules('nit', 'NIT', 'required');
	        $this->form_validation->set_rules('numLicencia', 'Numero de Licencia', 'required');
	        $this->form_validation->set_rules('fechaExpe', 'Fecha de Expedicion de Licencia', 'required');
	        $this->form_validation->set_rules('fechaExpira', 'Fecha de Expiracion de Licencia', 'required');
	        $this->form_validation->set_rules('tipoLicencia', 'Tipo de Licencia', 'required');		
	        if ($this->form_validation->run() == FALSE)
	        {
				$this->load->view('header');
				$this->load->view('top-menu');
				$this->load->view('menu-lateral');
				$this->load->view('administracion/conductor/Adm_conductor_add');
				$this->load->view('footer');
	        }
	        else
	        {
				$this->load->model('adm_conductor/adm_conductor_model');
				if($this->adm_conductor_model->add($_POST['nombre'],$_POST['apellido'],$_POST['edad'],$_POST['dir'],$_POST['dui'],$_POST['nit'],$_POST['numLicencia'],$_POST['fechaExpe'],$_POST['fechaExpira'],$_POST['tipoLicencia'],0))
				{
					$data["mensaje"]="Agregado Correctamente";
					$query = $this->db->get('conductores');
					$data['records'] = $query->result();
					$this->load->view('header');
					$this->load->view('top-menu');
					$this->load->view('menu-lateral');
					$this->load->view('administracion/conductor/adm_conductor', $data);
					$this->load->view('footer');
				}else
				{
					$data["error"]="Error al agregar";
					$this->load->view('administracion/conductor/adm_conductor',$data);
				}
	        }
	}
        
     public function modificar()
         {
         	$this->form_validation->set_rules('nombre', 'Nombre', 'required');
	        $this->form_validation->set_rules('apellido', 'Apellido', 'required');
	        $this->form_validation->set_rules('edad', 'Edad', 'required');
	        $this->form_validation->set_rules('dir', 'Dirección', 'required');
	        $this->form_validation->set_rules('dui', 'DUI', 'required');
	        $this->form_validation->set_rules('nit', 'NIT', 'required');
	        $this->form_validation->set_rules('numLicencia', 'Numero de Licencia', 'required');
	        $this->form_validation->set_rules('fechaExpe', 'Fecha de Expedicion de Licencia', 'required');
	        $this->form_validation->set_rules('fechaExpira', 'Fecha de Expiracion de Licencia', 'required');
	        $this->form_validation->set_rules('tipoLicencia', 'Tipo de Licencia', 'required');		
	        if ($this->form_validation->run() == FALSE)
	        {
				$id = $_POST['id']; 
				$query = $this->db->get_where("conductores",array("id"=>$id));
	        	$data['records'] = $query->result(); 
				$this->load->view('header');
				$this->load->view('top-menu');
				$this->load->view('menu-lateral');
				$this->load->view('administracion/conductor/adm_conductor_edit',$data);
				$this->load->view('footer');
	        }
	        else
	        {
				$this->load->model('adm_conductor/adm_conductor_model');
				if($this->adm_conductor_model->update($_POST['id'],$_POST['nombre'],$_POST['apellido'],$_POST['edad'],$_POST['dir'],$_POST['dui'],$_POST['nit'],$_POST['numLicencia'],$_POST['fechaExpe'],$_POST['fechaExpira'],$_POST['tipoLicencia']))
				{
					$data["success"]="Modificado Correctamente";
					$query = $this->db->get('conductores');
					$data['records'] = $query->result();
					$this->load->view('header');
					$this->load->view('top-menu');
					$this->load->view('menu-lateral');
					$this->load->view('administracion/conductor/adm_conductor_update', $data);
					$this->load->view('footer');
				}else
				{
					$data["mensaje"]="SE HA PRODUCIDO UN ERROR";
					$this->load->view('administracion/conductor/adm_conductor',$data);
				}
	        }
	}

	public function eliminar()
    {
		$this->load->model('adm_conductor/adm_conductor_model');
			$id = $this->uri->segment('3'); 
			if($this->adm_conductor_model->del($id))
			{
				$data["successdel"]="Eliminado Correctamente";
				$query = $this->db->get('conductores');
				$data['records'] = $query->result();
				$this->load->view('header');
				$this->load->view('top-menu');
				$this->load->view('menu-lateral');
				$this->load->view('administracion/conductor/adm_conductor_update', $data);
				$this->load->view('footer');
			}else
			{
				redirect('maina');
			}
	}
}

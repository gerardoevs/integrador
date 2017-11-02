<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_paradas extends CI_Controller {

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
			$query = $this->db->query("SELECT * FROM paradas"); 
		    $data['records'] = $query->result(); 
 
			$this->load->view('header');
			$this->load->view('top-menu');
			$this->load->view('menu-lateral');
			$this->load->view('administracion/paradas/adm_paradas',$data);
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
			$this->load->view('administracion/paradas/adm_paradas_add');
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
			$query = $this->db->get_where("paradas",array("id"=>$id));
        	$data['records'] = $query->result();
			$this->load->view('header');
			$this->load->view('top-menu');
			$this->load->view('menu-lateral');
			$this->load->view('administracion/paradas/adm_paradas_edit',$data);
			$this->load->view('footer');
		}else
		{
			redirect('main');
		}

	}

        
      public function agregar(){
			$this->form_validation->set_rules('nom_parada', 'Nombre de Parada', 'required');
			$this->form_validation->set_rules('lat_parada', 'Latitud', 'required');	
			$this->form_validation->set_rules('lon_parada', 'Longitud', 'required');		
	        if ($this->form_validation->run() == FALSE)
	        {	
	        	
				$this->load->view('header');
				$this->load->view('top-menu');
				$this->load->view('menu-lateral');
				$this->load->view('administracion/paradas/adm_paradas_add');
				$this->load->view('footer');
			}else{
				$nombre=$_POST['nom_parada'];
				$lt=$_POST['lat_parada'];
				$ln=$_POST['lon_parada'];
				$datos = array(
				'nombre' => $nombre,
				'latitud' => $lt,
				'longitud' => $ln,
				);
		 		$query =$this->db->insert('paradas',$datos);
				$query = $this->db->get("paradas"); 
	       		$data['records'] = $query->result();
	       		$data['mensaje'] = "Parada de autobuses agregada exitosamente";
				$this->load->view('header');
				$this->load->view('top-menu');
				$this->load->view('menu-lateral');
				$this->load->view('administracion/paradas/adm_paradas',$data);
				$this->load->view('footer');
			}
	}

	public function modificar(){
			$this->form_validation->set_rules('nom_parada', 'Nombre de Parada', 'required');
			$this->form_validation->set_rules('lat_parada', 'Latitud', 'required');	
			$this->form_validation->set_rules('lon_parada', 'Longitud', 'required');		
	        if ($this->form_validation->run() == FALSE)
	        {
				$this->load->view('header');
				$this->load->view('top-menu');
				$this->load->view('menu-lateral');
				$this->load->view('administracion/paradas/adm_paradas_add');
				$this->load->view('footer');
			}else{
				$id = $_POST['id'];
				$nombre=$_POST['nom_parada'];
				$lt=$_POST['lat_parada'];
				$ln=$_POST['lon_parada'];
				$this->load->model('adm_paradas/adm_paradas_model');
				if($this->adm_paradas_model->update($id, $nombre, $lt, $ln))
				{
					$query = $this->db->get("paradas"); 
					$data['records'] = $query->result(); 
					$data['mensaje'] = "parada Modificada Exitosamente";
					$this->load->view('header');
					$this->load->view('top-menu');
					$this->load->view('menu-lateral');
					$this->load->view('administracion/paradas/adm_paradas',$data);
					$this->load->view('footer');
				}else
				{
					redirect('adm_paradas');
				}
			}
	}


	public function eliminar()
        {	
			$id = $this->uri->segment('3'); 
			$this->load->model('adm_paradas/adm_paradas_model');	
			if($this->adm_paradas_model->del($id))
			{
				redirect('adm_paradas');
			}else
			{
				redirect('Error_general');
			}
	}




}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_rutas extends CI_Controller {

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
			$query = $this->db->get("ruta"); 
	        $data['records'] = $query->result();
 
			$this->load->view('header');
			$this->load->view('top-menu');
			$this->load->view('menu-lateral');
			$this->load->view('administracion/rutas/adm_rutas',$data);
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
			$query = $this->db->query("SELECT * FROM terminales"); 
	        $data['terminales'] = $query->result(); 

			$this->load->view('header');
			$this->load->view('top-menu');
			$this->load->view('menu-lateral');
			$this->load->view('administracion/rutas/adm_rutas_add',$data);
			$this->load->view('footer');
		}else
		{
			redirect('main');
		}

	}

	public function ver_ruta()
	{
		
		if($this->session->userdata('username'))
		{
			$id = $this->uri->segment('3'); 
			$query = $this->db->get_where("ruta",array("id"=>$id));
        	$data['records'] = $query->result();

        	$query = $this->db->query("SELECT terminales.id, terminales.lat, terminales.lon, terminales.terminalnombre, ruta.origen, ruta.destino FROM `terminales` INNER JOIN ruta on ruta.origen = terminales.id WHERE ruta.id =$id"); 
			$data['origen'] = $query->result(); 

			$query = $this->db->query("SELECT terminales.id, terminales.lat, terminales.lon, terminales.terminalnombre, ruta.origen, ruta.destino FROM `terminales` INNER JOIN ruta on ruta.destino = terminales.id WHERE ruta.id =$id"); 
			$data['destino'] = $query->result(); 

        	$query = $this->db->query("SELECT * FROM terminales"); 
			$data['terminales'] = $query->result(); 
			$this->load->view('header');
			$this->load->view('top-menu');
			$this->load->view('menu-lateral');
			$this->load->view('administracion/rutas/adm_rutas_ver',$data);
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
			$query = $this->db->get_where("ruta",array("id"=>$id));
        	$data['records'] = $query->result();

        	$query = $this->db->query("SELECT terminales.id, terminales.lat, terminales.lon, terminales.terminalnombre, ruta.origen, ruta.destino FROM `terminales` INNER JOIN ruta on ruta.origen = terminales.id WHERE ruta.id =$id"); 
			$data['origen'] = $query->result(); 

			$query = $this->db->query("SELECT terminales.id, terminales.lat, terminales.lon, terminales.terminalnombre, ruta.origen, ruta.destino FROM `terminales` INNER JOIN ruta on ruta.destino = terminales.id WHERE ruta.id =$id"); 
			$data['destino'] = $query->result(); 

        	$query = $this->db->query("SELECT * FROM terminales"); 
			$data['terminales'] = $query->result(); 
			$this->load->view('header');
			$this->load->view('top-menu');
			$this->load->view('menu-lateral');
			$this->load->view('administracion/rutas/adm_rutas_edit',$data);
			$this->load->view('footer');
		}else
		{
			redirect('main');
		}

	}

        
      public function agregar(){
			if(isset($_POST['submit']))
			{
				$origen=$_POST['Origen'];
				$destino=$_POST['Destino'];
				if( $origen == "none" or $destino =="none"){
					$query = $this->db->query("SELECT * FROM terminales"); 
					$data['terminales'] = $query->result(); 
					$data['error'] = "Debe de seleccionar una terminal";
					$this->load->view('header');
					$this->load->view('top-menu');
					$this->load->view('menu-lateral');
					$this->load->view('administracion/rutas/adm_rutas_add',$data);
					$this->load->view('footer');
				}else
				{
					if($_POST['Origen'] == $_POST['Destino']){
						$query = $this->db->query("SELECT * FROM terminales"); 
					    $data['terminales'] = $query->result(); 
					    $data['error'] = "Origen y Destino no deben de ser iguales!";
						$this->load->view('header');
						$this->load->view('top-menu');
						$this->load->view('menu-lateral');
						$this->load->view('administracion/rutas/adm_rutas_add',$data);
						$this->load->view('footer');
					}else{
						$this->load->model('adm_rutas/adm_rutas_model');
						if($this->adm_rutas_model->add($_POST['num_ruta'],$_POST['Origen'],$_POST['Destino']))
						{
							$query = $this->db->get("ruta"); 
					        $data['records'] = $query->result(); 
					        $data['mensaje'] = "Ruta agregada Exitosamente";
							$this->load->view('header');
							$this->load->view('top-menu');
							$this->load->view('menu-lateral');
							$this->load->view('administracion/rutas/adm_rutas',$data);
						}else
						{
							redirect('adm_rutas');
						}
						
					}
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
				if($_POST['Origen'] == $_POST['Destino'])
				{
					$query = $this->db->query("SELECT * FROM terminales"); 
					$data['terminales'] = $query->result(); 
					$data['error'] = "Origen y Destino no deben de ser iguales!";
					$id = $_POST['id']; 
					$query = $this->db->get_where("ruta",array("id"=>$id));
		        	$data['records'] = $query->result();
		        	$query = $this->db->query("SELECT * FROM terminales"); 
					$data['terminales'] = $query->result(); 
					$this->load->view('header');
					$this->load->view('top-menu');
					$this->load->view('menu-lateral');
					$this->load->view('administracion/rutas/adm_rutas_edit',$data);
					$this->load->view('footer');
				}else
				{
					$this->load->model('adm_rutas/adm_rutas_model');
					if($this->adm_rutas_model->update($_POST['id'],$_POST['num_ruta'],$_POST['Origen'],$_POST['Destino']))
					{
						$query = $this->db->get("ruta"); 
					    $data['records'] = $query->result(); 
					    $data['mensaje'] = "Ruta Modificada Exitosamente";
						$this->load->view('header');
						$this->load->view('top-menu');
						$this->load->view('menu-lateral');
						$this->load->view('administracion/rutas/adm_rutas',$data);
						$this->load->view('footer');
					}else
					{
						redirect('adm_rutas');
					}		
				}				
			}else
			{
				$this->load->view('administracion/conductor/Adm_conductor_add');
			}
	}

	public function eliminar()
        {
			$this->load->model('adm_rutas/adm_rutas_model');
				$id = $this->uri->segment('3'); 
				if($this->adm_rutas_model->del($id))
				{
					redirect('adm_rutas');
				}else
				{
					redirect('Error_general');
				}
	}




}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_conductor extends CI_Controller {

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

	        $this->load->model('adm_conductor/adm_conductor_model');
			$data['records'] = $this->adm_conductor_model->conductoresEstado1();

			$this->load->view('header');
			$this->load->view('top-menu');
			$this->load->view('menu-lateral');
			$this->load->view('administracion/conductor/adm_conductor', $data);
			$this->load->view('footer');
		}else
		{
			redirect('main');
		}

	}

	public function busqueda()
	{
		
		if($this->session->userdata('username'))
		{

			$this->load->view('header');
			$this->load->view('top-menu');
			$this->load->view('menu-lateral');
			$this->load->view('administracion/conductor/adm_conductor_bucar');
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
			$this->load->model('adm_conductor/adm_conductor_model');
			$data['records'] = $this->adm_conductor_model->conductoresEstado1(); 
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
	        $this->load->model('adm_conductor/adm_conductor_model');	
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
	        	$nombre_img = $_FILES['file']['name'];
				$tipo = $_FILES['file']['type'];
				$tamano = $_FILES['file']['size'];

				if (($nombre_img == !NULL) && ($_FILES['file']['size'] <= 2000000)) 
				{
				   //indicamos los formatos que permitimos subir a nuestro servidor
				   if (($_FILES["file"]["type"] == "image/gif")
				   || ($_FILES["file"]["type"] == "image/jpeg")
				   || ($_FILES["file"]["type"] == "image/jpg")
				   || ($_FILES["file"]["type"] == "image/png"))
				   {
				      // Ruta donde se guardarán las imágenes que subamos
				      $directorio = 'C:/xampp/htdocs/integrador/assets/fotos/';
				      // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
				      move_uploaded_file($_FILES['file']['tmp_name'],$directorio.$nombre_img);
				      if($this->adm_conductor_model->add(
				      	$_POST['nombre'],$_POST['apellido'],
				      	$_POST['edad'],$_POST['dir'],$_POST['dui'],
				      	$_POST['nit'],$_POST['numLicencia'],
				      	$_POST['fechaExpe'],$_POST['fechaExpira'],
				      	$_POST['tipoLicencia'],$_POST['tel'],0, $nombre_img))
						{
							$data["mensaje"]="Agregado Correctamente";
							$data['records'] = $data['records'] = $this->adm_conductor_model->conductoresEstado1();
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
				    else 
				    {
				       //si no cumple con el formato
				    	$data["error"]="No se puede subir una imagen con ese formato ";
				    	$this->load->view('header');
						$this->load->view('top-menu');
						$this->load->view('menu-lateral');
						$this->load->view('administracion/conductor/Adm_conductor_add',$data);
						$this->load->view('footer');
				    }
				}
				else 
				{
				   //si existe la variable pero se pasa del tamaño permitido
				   if($nombre_img == !NULL) echo "La imagen es demasiado grande "; 
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
	        $this->load->model('adm_conductor/adm_conductor_model');		
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
				
				if($this->adm_conductor_model->update($_POST['id'],$_POST['nombre'],$_POST['apellido'],$_POST['edad'],$_POST['dir'],$_POST['dui'],$_POST['nit'],$_POST['numLicencia'],$_POST['fechaExpe'],$_POST['fechaExpira'],$_POST['tipoLicencia']))
				{
					$data["success"]="Modificado Correctamente";
					$data['records'] = $this->adm_conductor_model->conductoresEstado1();
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
				$this->load->model('adm_conductor/adm_conductor_model');
				$data['records'] = $this->adm_conductor_model->conductoresEstado1();
				$this->load->view('header');
				$this->load->view('top-menu');
				$this->load->view('menu-lateral');
				$this->load->view('administracion/conductor/adm_conductor_update', $data);
				$this->load->view('footer');
			}else
			{
				redirect('Error_general');
			}
	}

	public function conductorMes()
	{
		
		if($this->session->userdata('username'))
		{
			$this->load->model('adm_conductor/adm_conductor_model');
		    $data['conductor'] = $this->adm_conductor_model->conductoresDelMes(); 
			$data['records'] = $this->adm_conductor_model->conductoresEstado1(); 

			$this->load->view('header');
			$this->load->view('top-menu');
			$this->load->view('menu-lateral');
			$this->load->view('administracion/conductor/adm_conductor_mes',$data);
			$this->load->view('footer');
		}else
		{
			redirect('main');
		}
	}

	public function AddConductorMes()
	{
		
			$this->form_validation->set_rules('condutor', 'Conductor', 'required');
	        $this->form_validation->set_rules('motivo', 'Motivo', 'required');
	        $this->load->model('adm_conductor/adm_conductor_model');	
	        if ($this->form_validation->run() == FALSE)
	        {
				
				$data['records'] = $this->adm_conductor_model->conductoresEstado1();
		    	$data['conductor'] = $data['conductor'] = $this->adm_conductor_model->conductoresDelMes(); 

				$this->load->view('header');
				$this->load->view('top-menu');
				$this->load->view('menu-lateral');
				$this->load->view('administracion/conductor/adm_conductor_mes',$data);
				$this->load->view('footer');
	        }
	        else
	        {
				if($this->adm_conductor_model->addConductorMes($_POST['condutor'],$_POST['motivo']))
				{
		    		$data['conductor'] = $data['conductor'] = $this->adm_conductor_model->conductoresDelMes(); 
					$data["success"]="Agregado Correctamente";
					$data['records'] = $this->adm_conductor_model->conductoresEstado1();

					$this->load->view('header');
					$this->load->view('top-menu');
					$this->load->view('menu-lateral');
					$this->load->view('administracion/conductor/adm_conductor_mes', $data);
					$this->load->view('footer');
				}else
				{
					$data["error"]="Error al agregar";
					$this->load->view('administracion/conductor/adm_conductor_mes',$data);
				}
	        }
	}

	
}

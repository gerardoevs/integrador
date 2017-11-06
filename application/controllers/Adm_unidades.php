<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_unidades extends CI_Controller {

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
            $query = $this->db->get('unidades');
			$data['records'] = $query->result();
			$this->load->view('header');
			$this->load->view('top-menu');
			$this->load->view('menu-lateral');
			$this->load->view('administracion/unidades/Adm_unidades', $data);
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
			$this->load->view('administracion/unidades/adm_unidades_add');
			$this->load->view('footer');
		}else
		{
			redirect('main');
		}

	}

	public function asignar()
	{
		
		if($this->session->userdata('username'))
		{
			//consultas a la base de datos
			$query = $this->db->query("SELECT * FROM unidades WHERE idConductor IS NULL OR idTerminal IS NULL OR idRuta IS NULL"); 
	        $data['records'] = $query->result();

	        $query = $this->db->query("SELECT unidades.id, unidades.placa, unidades.tipo, unidades.idConductor, unidades.idRuta, unidades.idTerminal, conductores.nombre, ruta.num_ruta, terminales.terminalnombre FROM `unidades` INNER JOIN conductores on unidades.idConductor = conductores.id INNER JOIN ruta on unidades.idRuta = ruta.id INNER JOIN terminales on unidades.idTerminal = terminales.id"); 
	        $data['unidades'] = $query->result();

	        $query = $this->db->query("SELECT * FROM conductores WHERE asignado=0"); 
	        $data['conductores'] = $query->result(); 

	        $query = $this->db->query("SELECT * FROM conductores");
		    $data['conductor'] = $query->result(); 

	        $query = $this->db->get("ruta"); 
	        $data['rutas'] = $query->result();

	        $query = $this->db->get("terminales"); 
	        $data['terminales'] = $query->result();  

			$this->load->view('header');
			$this->load->view('top-menu');
			$this->load->view('menu-lateral');
			$this->load->view('administracion/unidades/Adm_unidades_asignar',$data);
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
			$query = $this->db->get("unidades"); 
	        $data['records'] = $query->result(); 
			$this->load->view('header');
			$this->load->view('top-menu');
			$this->load->view('menu-lateral');
			$this->load->view('administracion/unidades/Adm_unidades_update',$data);
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
			$query = $this->db->get_where("unidades",array("id"=>$id));
        	$data['records'] = $query->result(); 
			$this->load->view('header');
			$this->load->view('top-menu');
			$this->load->view('menu-lateral');
			$this->load->view('administracion/unidades/adm_unidades_edit',$data);
			$this->load->view('footer');
		}else
		{
			redirect('main');
		}

	}

        
        public function agregarUnidad(){

        	$this->form_validation->set_rules('marca', 'Marca', 'required');
	        $this->form_validation->set_rules('placa', 'Placa', 'required');
	        $this->form_validation->set_rules('capacidad', 'Capaciad', 'required');
	        $this->form_validation->set_rules('año', 'Año', 'required');
	        $this->form_validation->set_rules('tipo', 'Tipo de Vehiculo', 'required');
	        $this->form_validation->set_rules('num_tarjeta', 'Numero de tarjera', 'required');	
	        if ($this->form_validation->run() == FALSE)
	        {
				$this->load->view('header');
				$this->load->view('top-menu');
				$this->load->view('menu-lateral');
				$this->load->view('administracion/unidades/adm_unidades_add');
				$this->load->view('footer');
	        }
	        else
	        {
				$this->load->model('adm_unidad/adm_unidad_model');
				if($this->adm_unidad_model->add($_POST['marca'],$_POST['placa'],$_POST['capacidad'],$_POST['año'],$_POST['tipo'],$_POST['num_tarjeta']))
				{
					$sql = "SELECT * from UNIDADES order by id DESC limit 1"; 
					$query = $this->db->query($sql)	;
					$fila = $query->row_array(); 
					$datos = '
						<?php
						$file = "../gps_log/gps-position-bus'.$fila['id'].'.txt";
						echo $file;
						if ( isset($_GET["lat"]) && preg_match("/^-?\d+.\d+$/", $_GET["lat"])
						    && isset($_GET["lon"]) && preg_match("/^-?\d+.\d+$/", $_GET["lon"]) ) {
						$f = fopen($file,"w");
						//fwrite($f, date("Y-m-d H:i:s")."_".$_GET["lat"]."_".$_GET["lon"]);
						fputs($f,date("Y-m-d H:i:s")."_".$_GET["lat"]."_".$_GET["lon"]);
						fclose($f);
						    echo "OK";
						} else {
						    echo "Error en la comunicacion con el gps";
						}
					';
					file_put_contents("assets/gps/gps".$fila['id'].".php", $datos);  
					$data["mensaje"]="Agregado Correctamente";
					$query = $this->db->get('unidades');
					$data['records'] = $query->result();
					$this->load->view('header');
					$this->load->view('top-menu');
					$this->load->view('menu-lateral');
					$this->load->view('administracion/unidades/Adm_unidades', $data);
					$this->load->view('footer');
				}else
				{
					$data["error"]="SE HA PRODUCIDO UN ERROR";
					$this->load->view('administracion/unidades/adm_unidades',$data);
				}
	        }
	}

	public function modificar()
         {
         	$this->form_validation->set_rules('marca', 'Marca', 'required');
	        $this->form_validation->set_rules('placa', 'Placa', 'required');
	        $this->form_validation->set_rules('capacidad', 'Capaciad', 'required');
	        $this->form_validation->set_rules('año', 'Año', 'required');
	        $this->form_validation->set_rules('tipo', 'Tipo de Vehiculo', 'required');
	        $this->form_validation->set_rules('num_tarjeta', 'Numero de tarjera', 'required');	
	        if ($this->form_validation->run() == FALSE)
	        {
	        	$id = $_POST['id']; 
	        	$query = $this->db->get_where("unidades",array("id"=>$id));
        		$data['records'] = $query->result(); 
				$this->load->view('header');
				$this->load->view('top-menu');
				$this->load->view('menu-lateral');
				$this->load->view('administracion/unidades/Adm_unidades_edit',$data);
				$this->load->view('footer');
	        }
	        else
	        {
				$this->load->model('adm_unidad/adm_unidad_model');
				if($this->adm_unidad_model->update($_POST['id'],$_POST['marca'],$_POST['placa'],$_POST['capacidad'],$_POST['año'],$_POST['tipo'],$_POST['num_tarjeta']))
				{
					$data["mensaje"]="Modificado Correctamente";
					$query = $this->db->get('unidades');
					$data['records'] = $query->result();
					$this->load->view('header');
					$this->load->view('top-menu');
					$this->load->view('menu-lateral');
					$this->load->view('administracion/unidades/Adm_unidades_update', $data);
					$this->load->view('footer');
				}else
				{
					$data["error"]="SE HA PRODUCIDO UN ERROR";
					$this->load->view('administracion/unidades/adm_unidades_update',$data);
				}
	        }



			if(isset($_POST['submit']))
				{
				
			}else
			{
				$this->load->view('administracion/conductor/Adm_conductor_add');
			}
	}

	public function reasignacion()
         {	
         	if(isset($_POST['idss'])){
         		$id = $_POST['idss'];
         		$idviejo = $_POST['idconductor_quitar'];
	         	$nombre = $_POST['condutor'];
	         	$ruta = $_POST['nruta'];
	         	$terminal = $_POST['nterminal'];

	         	
	         	$query = $this->db->query("UPDATE unidades SET unidades.idConductor=$nombre, unidades.idRuta=$ruta, unidades.idTerminal=$terminal WHERE id=$id"); 
	         	$data["mensaje"]="Unidad ".$id." Modificada con exito!";

	         	$query = $this->db->query("UPDATE conductores SET asignado=0 WHERE id=$idviejo");
	         	$query = $this->db->query("UPDATE conductores SET asignado=1 WHERE id=$nombre");  

	         	$query = $this->db->query("SELECT * FROM unidades WHERE idConductor IS NULL OR idTerminal IS NULL OR idRuta IS NULL"); 
		        $data['records'] = $query->result();

		        $query = $this->db->query("SELECT unidades.id, unidades.placa, unidades.tipo, unidades.idConductor, unidades.idRuta, unidades.idTerminal, conductores.nombre, ruta.num_ruta, terminales.terminalnombre FROM `unidades` INNER JOIN conductores on unidades.idConductor = conductores.id INNER JOIN ruta on unidades.idRuta = ruta.id INNER JOIN terminales on unidades.idTerminal = terminales.id"); 
		        $data['unidades'] = $query->result();

		        $query = $this->db->query("SELECT * FROM conductores WHERE asignado=0"); 
		        $data['conductores'] = $query->result();

		        $query = $this->db->query("SELECT * FROM conductores");
		        $data['conductor'] = $query->result(); 

		        $query = $this->db->get("ruta"); 
		        $data['rutas'] = $query->result();

		        $query = $this->db->get("terminales"); 
		        $data['terminales'] = $query->result();  

				$this->load->view('header');
				$this->load->view('top-menu');
				$this->load->view('menu-lateral');
				$this->load->view('administracion/unidades/Adm_unidades_asignar',$data);
				$this->load->view('footer');
         	}else{

         		$query = $this->db->query("SELECT * FROM unidades WHERE idConductor IS NULL OR idTerminal IS NULL OR idRuta IS NULL"); 
		        $data['records'] = $query->result();

		        $query = $this->db->query("SELECT unidades.id, unidades.placa, unidades.tipo, unidades.idConductor, unidades.idRuta, unidades.idTerminal, conductores.nombre, ruta.num_ruta, terminales.terminalnombre FROM `unidades` INNER JOIN conductores on unidades.idConductor = conductores.id INNER JOIN ruta on unidades.idRuta = ruta.id INNER JOIN terminales on unidades.idTerminal = terminales.id"); 
		        $data['unidades'] = $query->result();

		        $query = $this->db->query("SELECT * FROM conductores WHERE asignado=0"); 
		        $data['conductores'] = $query->result(); 

		        $query = $this->db->get("ruta"); 
		        $data['rutas'] = $query->result();

		        $query = $this->db->get("terminales"); 
		        $data['terminales'] = $query->result(); 
         		$this->load->view('header');
				$this->load->view('top-menu');
				$this->load->view('menu-lateral');
				$this->load->view('administracion/unidades/Adm_unidades_asignar',$data);
				$this->load->view('footer');
         	}
         	
	}

	public function asignacion()
         {	
         	if(isset($_POST['idss'])){
         		$id = $_POST['idss'];
	         	$nombre = $_POST['condutor'];
	         	$ruta = $_POST['nruta'];
	         	$terminal = $_POST['nterminal'];

	         	if($nombre != "none" or $ruta != "none" or $terminal != "none"){
	         		
	         		$query = $this->db->query("UPDATE conductores SET asignado=1 WHERE id=$nombre");  
		         	$query = $this->db->query("UPDATE unidades SET unidades.idConductor=$nombre, unidades.idRuta=$ruta, unidades.idTerminal=$terminal WHERE id=$id"); 
		         	
		         	$data["mensaje"]="Unidad ".$id." Asignada con exito!";

		         	$query = $this->db->query("SELECT * FROM unidades WHERE idConductor IS NULL OR idTerminal IS NULL OR idRuta IS NULL"); 
			        $data['records'] = $query->result();

			        $query = $this->db->query("SELECT unidades.id, unidades.placa, unidades.tipo, unidades.idConductor, unidades.idRuta, unidades.idTerminal, conductores.nombre, ruta.num_ruta, terminales.terminalnombre FROM `unidades` INNER JOIN conductores on unidades.idConductor = conductores.id INNER JOIN ruta on unidades.idRuta = ruta.id INNER JOIN terminales on unidades.idTerminal = terminales.id"); 
			        $data['unidades'] = $query->result();

			        $query = $this->db->query("SELECT * FROM conductores WHERE asignado=0"); 
			        $data['conductores'] = $query->result();

			        $query = $this->db->query("SELECT * FROM conductores");
			        $data['conductor'] = $query->result(); 

			        $query = $this->db->get("ruta"); 
			        $data['rutas'] = $query->result();

			        $query = $this->db->get("terminales"); 
			        $data['terminales'] = $query->result();  

					$this->load->view('header');
					$this->load->view('top-menu');
					$this->load->view('menu-lateral');
					$this->load->view('administracion/unidades/Adm_unidades_asignar',$data);
					$this->load->view('footer');
	         	}else{
					$query = $this->db->query("SELECT * FROM unidades WHERE idConductor IS NULL OR idTerminal IS NULL OR idRuta IS NULL"); 
			        $data['records'] = $query->result();

			        $query = $this->db->query("SELECT unidades.id, unidades.placa, unidades.tipo, unidades.idConductor, unidades.idRuta, unidades.idTerminal, conductores.nombre, ruta.num_ruta, terminales.terminalnombre FROM `unidades` INNER JOIN conductores on unidades.idConductor = conductores.id INNER JOIN ruta on unidades.idRuta = ruta.id INNER JOIN terminales on unidades.idTerminal = terminales.id"); 
			        $data['unidades'] = $query->result();

			        $query = $this->db->query("SELECT * FROM conductores WHERE asignado=0"); 
			        $data['conductores'] = $query->result(); 

			        $query = $this->db->query("SELECT * FROM conductores");
				    $data['conductor'] = $query->result(); 

			        $query = $this->db->get("ruta"); 
			        $data['rutas'] = $query->result();

			        $query = $this->db->get("terminales"); 
			        $data['terminales'] = $query->result();  
			        
	         		$data["error"]="Debe de seleccionar CONDUCTOR, RUTA, TERMINAL";
	         		$this->load->view('header');
					$this->load->view('top-menu');
					$this->load->view('menu-lateral');
					$this->load->view('administracion/unidades/Adm_unidades_asignar',$data);
					$this->load->view('footer');

	         		
	         	}
	         	
         	}else{

         		$query = $this->db->query("SELECT * FROM unidades WHERE idConductor IS NULL OR idTerminal IS NULL OR idRuta IS NULL"); 
		        $data['records'] = $query->result();

		        $query = $this->db->query("SELECT unidades.id, unidades.placa, unidades.tipo, unidades.idConductor, unidades.idRuta, unidades.idTerminal, conductores.nombre, ruta.num_ruta, terminales.terminalnombre FROM `unidades` INNER JOIN conductores on unidades.idConductor = conductores.id INNER JOIN ruta on unidades.idRuta = ruta.id INNER JOIN terminales on unidades.idTerminal = terminales.id"); 
		        $data['unidades'] = $query->result();

		        $query = $this->db->query("SELECT * FROM conductores WHERE asignado=0"); 
		        $data['conductores'] = $query->result(); 

		        $query = $this->db->get("ruta"); 
		        $data['rutas'] = $query->result();

		        $query = $this->db->get("terminales"); 
		        $data['terminales'] = $query->result(); 
         		$this->load->view('header');
				$this->load->view('top-menu');
				$this->load->view('menu-lateral');
				$this->load->view('administracion/unidades/Adm_unidades_asignar',$data);
				$this->load->view('footer');
         	}
         	
	}

	public function eliminar()
        {
			$this->load->model('adm_unidad/adm_unidad_model');
				
				$id = $this->uri->segment('3'); 
				if($this->adm_unidad_model->del($id))
				{
					$data["mensaje"]="Eliminado Correctamente";
					$query = $this->db->get('unidades');
					$data['records'] = $query->result();
					$this->load->view('header');
					$this->load->view('top-menu');
					$this->load->view('menu-lateral');
					$this->load->view('administracion/unidades/Adm_unidades_update', $data);
					$this->load->view('footer');
				}else
				{
					$data["error"]="SE HA PRODUCIDO UN ERROR";
					$query = $this->db->get('unidades');
					$data['records'] = $query->result();
					$this->load->view('header');
					$this->load->view('top-menu');
					$this->load->view('menu-lateral');
					$this->load->view('administracion/unidades/Adm_unidades_update', $data);
					$this->load->view('footer');
				}
	}




}

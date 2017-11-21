<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

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
			$query = $this->db->query("SELECT nombre FROM conductores WHERE id=(SELECT id_conductor FROM conductor_estrella)"); 
		    $data['conductor'] = $query->result(); 

		    $query = $this->db->query("SELECT * FROM paradas"); 
		    $data['paradas'] = $query->result(); 

			$query = $this->db->query("SELECT unidades.id, unidades.placa, unidades.tipo, unidades.idConductor, unidades.idRuta, unidades.idTerminal, conductores.nombre, ruta.num_ruta, ruta.destino, terminales.terminalnombre FROM `unidades` INNER JOIN conductores on unidades.idConductor = conductores.id INNER JOIN ruta on unidades.idRuta = ruta.id INNER JOIN terminales on unidades.idTerminal = terminales.id"); 
	        $data['unidades'] = $query->result();

	       	$this->load->view('header');
			$this->load->view('top-menu');
			$this->load->view('menu-lateral');
			$this->load->view('administracion/main',$data);
			$this->load->view('footer');
		}else
		{
			redirect('login');
		}

	}



}

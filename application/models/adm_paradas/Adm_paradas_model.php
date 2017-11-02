<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_paradas_model extends CI_Model 
{

	public function __construct()
	{
		parent::__construct();
	}


	public function add($num_ruta, $lat, $lon)
	{
		$datos = array(
			'nombre' => $num_ruta,
			'latitud' => $lat,
			'longitud' => $lon,
			);
		 $this->db->insert('paradas',$datos);
		 return true;
	}
        
        public function update($id,$num_ruta, $lat, $lon)
        {
	      	$datos = array(
			'nombre' => $num_ruta,
			'latitud' => $lat,
			'longitud' => $lon,
			);
			 $this->db->set($datos); 
	         $this->db->where("id", $id); 
	         $this->db->update("paradas", $datos);
	         return true;
        }

         public function del($id)
        {
			if ($this->db->delete("paradas", "id = ".$id)) { 
	           return true; 
	        } 
        }



}

?>
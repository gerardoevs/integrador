<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_terminal_model extends CI_Model 
{

	public function __construct()
	{
		parent::__construct();
	}


	public function add($nombre, $departamento, $lat, $lon)
	{
		$datos = array(
			'terminalnombre' => $nombre,
			'idDepartamento' => $departamento,
			'lat' => $lat,
			'lon' => $lon
			);
		 $this->db->insert('terminales',$datos);
		 return true;
	}
        
        public function update($id,$nombre, $departamento,$lat, $lon)
        {
	      	$datos = array(
			'terminalnombre' => $nombre,
			'idDepartamento' => $departamento,
			'lat' => $lat,
			'lon' => $lon
			);
			 $this->db->set($datos); 
	         $this->db->where("id", $id); 
	         $this->db->update("terminales", $datos);
	         return true;
        }

         public function del($id)
        {
			if ($this->db->delete("terminales", "id = ".$id)) { 
	           return true; 
	        } 
        }



}

?>

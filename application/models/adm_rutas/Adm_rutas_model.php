<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_rutas_model extends CI_Model 
{

	public function __construct()
	{
		parent::__construct();
	}


	public function add($num_ruta, $origen, $destino)
	{
		$datos = array(
			'num_ruta' => $num_ruta,
			'origen' => $origen,
			'destino' => $destino,
			);
		 $this->db->insert('ruta',$datos);
		 return true;
	}
        
        public function update($id,$num_ruta, $origen, $destino)
        {
	      	$datos = array(
			'num_ruta' => $num_ruta,
			'origen' => $origen,
			'destino' => $destino,
			);
			 $this->db->set($datos); 
	         $this->db->where("id", $id); 
	         $this->db->update("ruta", $datos);
	         return true;
        }

         public function del($id)
        {
			if ($this->db->delete("ruta", "id = ".$id)) { 
	           return true; 
	        } 
        }



}

?>

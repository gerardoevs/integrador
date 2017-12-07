<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_horarios_model extends CI_Model 
{

	public function __construct()
	{
		parent::__construct();
	}


	public function add($salida, $llegada, $id_ruta,$id_unidad)
	{
		$datos = array(
			'horaSalida' => $salida,
			'horaLlegada' => $llegada,
			'idRuta' => $id_ruta,
			'idUnidad' => $id_unidad,
			'estado' => 1
			);
		 $this->db->insert('horarios',$datos);
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
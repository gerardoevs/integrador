<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_unidad_model extends CI_Model 
{

	public function __construct()
	{
		parent::__construct();
	}


	public function add($marca, $placa, $capacidad, $year, $tipo, $numTarjeta)
	{
		$datos = array(
			'marca' => $marca,
			'placa' => $placa,
			'capacidad' => $capacidad,
			'year' => $year,
			'tipo' => $tipo,
			'num_tarjeta' => $numTarjeta,

			);
		 $this->db->insert('unidades',$datos);
		 return true;
	}

	public function update($id,$marca, $placa, $capacidad, $year, $tipo, $numTarjeta)
        {
	        $datos = array(
			'marca' => $marca,
			'placa' => $placa,
			'capacidad' => $capacidad,
			'year' => $year,
			'tipo' => $tipo,
			'num_tarjeta' => $numTarjeta,

			);
			 $this->db->set($datos); 
	         $this->db->where("id", $id); 
	         $this->db->update("unidades", $datos);
	         return true;
        }
        
         public function del($id)
        {
			if ($this->db->delete("unidades", "id = ".$id)) { 
	           return true; 
	        } 
        }
}

?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_conductor_model extends CI_Model 
{

	public function __construct()
	{
		parent::__construct();
	}


	public function add($nombre, $apellido, $edad, $direccion, $dui, $nit, $licencia, $f_expedicion, $f_expiracion, $tipo,$asignar)
	{
		$datos = array(
			'nombre' => $nombre,
			'apellido' => $apellido,
			'edad' => $edad,
			'direccion' => $direccion,
			'dui' => $dui,
			'nit' => $nit,
			'numLicencia' => $licencia,
			'fechaExpedicion' => $f_expedicion,
			'fechaExpiracion' => $f_expiracion,
			'tipoLicencia' => $tipo,
			'asignado' => $asignar
			);
		 $this->db->insert('conductores',$datos);
		 return true;
	}
        
        public function update($id,$nombre, $apellido, $edad, $direccion, $dui, $nit, $licencia, $f_expedicion, $f_expiracion, $tipo)
        {
	        $datos = array(
				'nombre' => $nombre,
				'apellido' => $apellido,
				'edad' => $edad,
				'direccion' => $direccion,
				'dui' => $dui,
				'nit' => $nit,
				'numLicencia' => $licencia,
				'fechaExpedicion' => $f_expedicion,
				'fechaExpiracion' => $f_expiracion,
				'tipoLicencia' => $tipo
				);
			 $this->db->set($datos); 
	         $this->db->where("id", $id); 
	         $this->db->update("conductores", $datos);
	         return true;
        }

         public function del($id)
        {
			if ($this->db->delete("conductores", "id = ".$id)) { 
	           return true; 
	        } 
        }

    public function addConductorMes($id_conductor, $motivo)
	{
		$datos = array(
			'id_conductor' => $id_conductor,
			'motivo' => $motivo,
			);
		 $this->db->set($datos); 
	     $this->db->where("id", 1); 
	     $this->db->update("conductor_estrella", $datos);
		 return true;
	}



}

?>

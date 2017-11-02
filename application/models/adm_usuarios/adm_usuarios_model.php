<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_usuarios_model extends CI_Model 
{

	public function __construct()
	{
		parent::__construct();
	}


	public function add($usuario, $contraseña)
	{
		$contraseña = sha1($contraseña);
		$llave = sha1("ave");
		$entrada = sha1($contraseña.$llave);
		$datos = array(
			'usr' => $usuario,
			'pwd' => $entrada,
			);
		 $this->db->insert('usuarios',$datos);
		 return true;
	}
        
        public function update($id,$usuario, $contraseña)
        {

	      	$contraseña = sha1($contraseña);
			$llave = sha1("ave");
			$entrada = sha1($contraseña.$llave);
			$datos = array(
				'usr' => $usuario,
				'pwd' => $entrada,
				);
			 $this->db->set($datos); 
	         $this->db->where("userID", $id); 
	         $this->db->update("usuarios", $datos);
	         return true;
        }

         public function del($id)
        {
			if ($this->db->delete("usuarios", "userID = ".$id)) { 
	           return true; 
	        } 
        }



}

?>
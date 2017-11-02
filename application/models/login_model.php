<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model 
{

	public function __construct()
	{
		parent::__construct();
	}

	public function verificar($user, $password)
	{
		$this->db->where('usr',$user);
		$this->db->where('pwd',$password);
		$query = $this->db->get('usuarios');
		if($query->num_rows()>0)
		{
			return true;
		}else
		{
			return false;
		}
	}
}

?>
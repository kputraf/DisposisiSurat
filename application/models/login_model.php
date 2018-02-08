<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	public function checkuser()
	{

		$query = $this->db
		->where('username',$this->input->post('username'))
		->get('user');



		if(password_verify($this->input->post('password'), $query->row()->password))
		{

			$login = $query->row();
			$session=array(
				'logged_in'	=>	TRUE,
				'username'	=> $login->username,
				'id'		=> $login->id
			);
			$this->session->set_userdata($session);
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	
}

/* End of file login_model.php */
/* Location: ./application/models/login_model.php */
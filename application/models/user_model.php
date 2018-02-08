<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	public function tampilkan()
	{
		return $this->db
		->get('user')->result();
	}
	public function tambah()
	{
		$data=array(
				'username'=>$this->input->post('username'),
				'password'=>password_hash($this->input->post('username'),PASSWORD_DEFAULT),
				'fullname'=>$this->input->post('fullname'),
				'level'=>$this->input->post('level')
		);
		$this->db->insert('user',$data);
		if($this->db->affected_rows()>0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	public function hapus($id)
	{
		$this->db->where('id',$id)->delete('user');
		if($this->db->affected_rows()>0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	public function update($id)
	{
		$data=array(
			'username'=>$this->input->post('username'),
			'fullname'=>$this->input->post('fullname'),
			'level'=>$this->input->post('level')
		);

		$this->db->where('id',$id)->update('user',$data);

		if($this->db->affected_rows()>0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
}

/* End of file pegawai_model.php */
/* Location: ./application/models/pegawai_model.php */
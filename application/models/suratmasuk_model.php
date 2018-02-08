<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class suratmasuk_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	public function tampilkan()
	{
		return $this->db
		->join('mail_type','mail.mail_typeid=mail_type.id')
		->get('mail')->result();
	}
	public function cari($cari)
	{
		return $this->db
		->join('mail_type','mail.mail_typeid=mail_type.id')
		->like('mail_code',$cari)
		->or_like('mail_from',$cari)
		->or_like('mail_to',$cari)
		->get('mail')->result();
	}
	public function tambah($surat)
	{
		$data=array(
				'mail_code'=>$this->input->post('mail_code'),
				'incoming_at'=>$this->input->post('incoming_at'),
				'mail_from'=>$this->input->post('mail_from'),
				'mail_to'=>$this->input->post('mail_to'),
				'mail_subject'=>$this->input->post('mail_subject'),
				'description'=>$this->input->post('description'),
				'file_upload'=>$surat['file_name'],
				'mail_typeid'=>$this->input->post('mail_typeid'),
				'userid'=>$this->input->post('userid')

		);
		$this->db->insert('mail',$data);
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
		$this->db->where('id',$id)->delete('mail');
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
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
		->select('*,mail.id')
		->join('mail_type','mail.mail_typeid=mail_type.id')
		->get('mail')->result();
	}
	public function tampilkantipe()
	{
		return $this->db->get('mail_type')->result();
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
	public function lihatupdate($update)
	{
		return $this->db->where('id',$update)->get('mail')->row();
	}
	public function dataupdatefile($surat)
	{
		$data = array(
				'file_upload' => $surat['file_name']
		);
		$this->db->where('id',$this->input->post('update_file_upload'))
				 ->update('mail',$data);


	}
	public function dataupdate($update)
	{
		$data=array(
				'mail_code'=>$this->input->post('mail_code'),
				'incoming_at'=>$this->input->post('incoming_at'),
				'mail_from'=>$this->input->post('mail_from'),
				'mail_to'=>$this->input->post('mail_to'),
				'mail_subject'=>$this->input->post('mail_subject'),
				'description'=>$this->input->post('description'),
				'mail_typeid'=>$this->input->post('mail_typeid'),
				'userid'=>$this->input->post('userid')

		);
		$this->db->where('id',$update);
		$this->db->update('mail',$data);
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
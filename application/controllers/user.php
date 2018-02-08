<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}
	public function index()
	{
		$data['main_view']='user/index';
		$data['user'] = $this->user_model->tampilkan();
		$this->load->view('template',$data);
	}

	public function tambah()
	{
		$this->form_validation->set_rules('username','username', 'trim|required');
		$this->form_validation->set_rules('fullname','fullname', 'trim|required');
		$this->form_validation->set_rules('level','level', 'trim|required');

		if($this->form_validation->run()==TRUE)
		{
			if($this->user_model->tambah()==TRUE)
			{
				$this->session->set_flashdata('notif','Tambah User Berhasil!');
				redirect('user/index');
			}
			else
			{
				$this->session->set_flashdata('notif','Tambah User Gagal!');
				redirect('user/index');
			}
		}
		else
		{
			$this->session->set_flashdata('notif', validation_errors());
			redirect('user/index');
		}

	}

	public function hapus($id)
	{
		if($this->user_model->hapus($id)==TRUE)
		{
			$this->session->set_flashdata('notif', 'Hapus User berhasil!');
			redirect('user/index');
		}
		else
		{
			$this->session->set_flashdata('notif', 'Hapus User gagal!');
			redirect('user/index');
		}
	}
	public function getUser($id)
	{
		if($this->session->userdata('logged_in')==TRUE)
		{

		}
		else
		{
			
		}
	}
	public function update($id)
	{
			
	}
	
}

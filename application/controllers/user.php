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
		if($this->session->userdata('logged_in')==TRUE)
		{
			$data['main_view']='user/index';
			$data['user'] = $this->user_model->datauser();
			$this->load->view('template',$data);
		}
		else
		{
			redirect('login/index');
		}
	}

	public function tambah()
	{
		if($this->session->userdata('logged_in')==TRUE)
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
		else
		{
			redirect('login');
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
	public function lihatupdate()
	{
		if($this->session->userdata('logged_in')==TRUE)
		{
			$data['main_view']='user/update';
			$update = $this->uri->segment(3);
			$data['updateuser'] = $this->user_model->lihatupdate($update);
			$this->load->view('template',$data);
		}
		else
		{
			redirect('login');
		}
	}
	public function dataupdate()
	{
		$update = $this->uri->segment(3);
		$data['updateuser'] = $this->user_model->dataupdate($update);
		if($this->input->post('submit') && $this->session->userdata('logged_in')==TRUE)
		{
			if($this->user_model->datauser($update)==TRUE)
			{
				$this->session->set_flashdata('notif','Berhasil Update Data');
				redirect('user');
			}
			else
			{
				$this->session->set_flashdata('notif','Gagal Update Data');
				redirect('user');	
			}
		}
		else
		{
			$this->session->set_flashdata('notif',validation_errors());
				redirect('user');
		}
	}
	
}

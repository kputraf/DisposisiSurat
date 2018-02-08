<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
	}

	public function index()
	{
		if($this->session->userdata('logged_in')==TRUE)
		{
			redirect('dashboard');
		}
		else
		{
			$this->load->view('login/index');
		}
	
	}
	public function do_login()
	{
		if($this->session->userdata('logged_in')==TRUE)
		{
			redirect('dashboard');
		}
		else
		{
			$this->form_validation->set_rules('username','username','trim|required');
			$this->form_validation->set_rules('password','password','trim|required');

			if($this->form_validation->run()==TRUE)
			{
				if($this->login_model->checkuser()==TRUE)
				{
					$this->session->set_flashdata('notif','login berhasil');
					redirect('dashboard');
				}	
				else
				{
					$this->session->set_flashdata('notif','login gagal');
					redirect('login');
				}
			}
			else
			{
				$this->session->set_flashdata('notif',validation_errors());
			}
		}
	}
	public function logout()
	{
		if($this->session->userdata('logged_in')==TRUE)
		{
			$this->session->sess_destroy();
			redirect('login');
		}
	}
	
}

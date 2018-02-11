<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class suratmasuk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('suratmasuk_model');
	}
	public function index()
	{
		$data['main_view']='suratmasuk/index';
		$data['suratmasuk'] = $this->suratmasuk_model->tampilkan();
		$this->load->view('template',$data);
	}
	public function cari()
	{
		$cari=$this->input->get('cari');
		$data['main_view']='suratmasuk/index';
		$data['suratmasuk'] = $this->suratmasuk_model->cari($cari);
		$this->load->view('template',$data);
	}
	public function tambah()
	{
		$this->form_validation->set_rules('mail_code','mail_code', 'trim|required');
		$this->form_validation->set_rules('incoming_at','incoming_at', 'trim|required');
		$this->form_validation->set_rules('mail_from','mail_from', 'trim|required');
		$this->form_validation->set_rules('mail_to','mail_to', 'trim|required');
		$this->form_validation->set_rules('mail_subject','mail_subject', 'trim|required');
		$this->form_validation->set_rules('description','description', 'trim|required');
		$this->form_validation->set_rules('mail_typeid','mail_typeid','trim|required');
		$this->form_validation->set_rules('userid','userid', 'trim|required');

		if($this->form_validation->run())
		{
			$config['upload_path']='./uploads/';
			$config['allowed_types']='pdf|png|jpeg';
			$config['max_size']='5000';
			
			$this->load->library('upload',$config);

			if($this->upload->do_upload('surat'))
			{

				if($this->suratmasuk_model->tambah($this->upload->data())==TRUE)
				{
					$this->session->set_flashdata('notif','Tambah Surat Berhasil!');
					redirect('suratmasuk/index');
				}
				else
				{
					$this->session->set_flashdata('notif','Tambah Surat Gagal!');
					redirect('suratmasuk/index');
				}
		  }
		  else
		  {
		  	$this->session->set_flashdata('notif',$this->upload->display_errors());
				redirect('suratmasuk/index');
		  }
		}
		else
		{
			$this->session->set_flashdata('notif', validation_errors());
			redirect('suratmasuk/index');
		}

	}
	public function hapus($id)
	{
		if($this->suratmasuk_model->hapus($id)==TRUE)
		{
			$this->session->set_flashdata('notif','Hapus Surat Berhasil!');
			redirect('suratmasuk');
		}
		else
		{
			$this->session->set_flashdata('notif','Hapus Surat Gagal!');
			redirect('suratmasuk');
		}
	}
	public function lihatupdate()
	{
		if($this->session->userdata('logged_in')==TRUE)
		{
			$data['main_view']='suratmasuk/update';
			$update = $this->uri->segment(3);
			$data['tipesurat'] = $this->suratmasuk_model->tampilkantipe();
			$data['updatesurat']=$this->suratmasuk_model->lihatupdate($update);
			$this->load->view('template',$data);
		}
		else
		{
			redirect('login');
		}
	}
	public function dataupdatefile($update)
	{
		$config['upload_path']='./uploads/';
		$config['allowed_types']='pdf';
		$config['max_size']=5000;
		$this->load->library('upload',$config);

		if($this->upload->do_upload('surat'))
		{
			if($this->suratmasuk_model->dataupdatefile($this->upload->data())==TRUE)
			{
				$this->session->set_flashdata('notif','Ubah File Berhasil');
				redirect('suratmasuk');
			}
			else
			{
				$this->session->set_flashdata('notif','Ubah File Gagal');
				redirect('suratmasuk');	
			}
		}
		else
		{
			$this->session->set_flashdata('notif', validation_errors());
				redirect('suratmasuk');
		}
	}
	public function dataupdate()
	{
		$update = $this->uri->segment(3);
		$data['updatesurat'] = $this->suratmasuk_model->dataupdate($update);
		if($this->input->post('submit') && $this->session->userdata('logged_in') == TRUE)
		{
			if($this->suratmasuk_model->dataupdate($update)==TRUE)
			{
				$this->session->set_flashdata('notif','Update Data Surat berhasil');
				redirect('suratmasuk');
			}
			else
			{
				$this->session->set_flashdata('notif','Update Data Surat Berhasil');
				redirect('suratmasuk');
			}
		}
		else
		{
			$this->session->set_flashdata('notif',validation_errors());
				redirect('suratmasuk');
		}
	}
	
}

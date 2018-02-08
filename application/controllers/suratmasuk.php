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
	
}

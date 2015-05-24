<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

		function __construct() {
        parent::__construct();
		$this->load->model('admin_model');
        if($this->session->userdata('role')!="2"){
		redirect('/user/login', 'refresh');
		}
       }
	
	public function index()
	{
		$data['user']=$this->session->userdata('username');
		$this->load->view('admin/head');
		$this->load->view('admin/nav', $data);
		$this->load->view('admin/index');
	}
	
	public function tambah_berita()
	{
		$data['user']=$this->session->userdata('username');
		$this->load->view('admin/head');
		$this->load->view('admin/nav', $data);
		$this->load->view('admin/berita', array('error' => ' ' ));
	}
	
	
	public function edit_berita()
	{
		$datas['user']=$this->session->userdata('username');
		$data['h'] = $this->admin_model->show_edit_berita();
		$this->load->view('admin/head');
		$this->load->view('admin/nav', $datas);
		$this->load->view('admin/edit_berita', $data);
	}
	
	public function edit_berita_($id)
	{
		$datas['user']=$this->session->userdata('username');
		$data=array(
		'h'=>$this->admin_model->show_edit_berita_($id),
		'error'=>''
		);
		//$data['h'] = $this->admin_model->show_edit_berita();
		$this->load->view('admin/head');
		$this->load->view('admin/nav', $datas);
		$this->load->view('admin/berita_edit_', $data);
	}
			
	public function submit_isi()
	{
	
	$this->admin_model->onclic();
	}
				
}

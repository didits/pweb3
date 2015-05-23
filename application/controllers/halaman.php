<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Halaman extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('user_model');
    }
	
	public function index($halaman)
	{
		$data['status']='';
		if($this->session->userdata('logged_in')==""){
		$data['status']='login';
		}else 
		$data['status']='logout';
		$this->load->view('header');
		$this->load->view('nav', $data);
		$this->load->view('halaman');
		$this->load->view('footer');
	}
	
	public function berita($posting)
	{
		$data['status']='';
		if($this->session->userdata('logged_in')==""){
		$data['status']='login';
		}else 
		$data['status']='logout';
		
		$datas['h'] = $this->user_model->halaman_berita($posting);
		$this->load->view('header');
		$this->load->view('nav', $data);
		$this->load->view('halaman', $datas);
		$this->load->view('footer');
	}
}
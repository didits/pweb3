<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Donasi extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('donasi_model');
    }
	public function index()
	{
		$data['status']='';
		if($this->session->userdata('logged_in')==""){
		$data['status']='login';
		}else 
		$data['status']='logout';
		$datas=array(
		//'h' => $this->user_model->show_berita(1),
		);
		$this->load->view('header');
		$this->load->view('nav', $data);
		$this->load->view('donasi', $datas);
		$this->load->view('footer');
	}
	
	public function form_donasi(){
		$data['status']='';
		if($this->session->userdata('logged_in')==""){
		$data['status']='login';
		}else 
		$data['status']='logout';
		$datas=array(
		//'h' => $this->user_model->show_berita(1),
		);
		$this->load->view('header');
		$this->load->view('nav', $data);
		$this->load->view('form_donasi', $datas);
		$this->load->view('footer');
	}
	
}

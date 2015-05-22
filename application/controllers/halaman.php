<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Halaman extends CI_Controller {
	function __construct() {
        parent::__construct();
        //$this->load->model('register');
    }
	
	public function index()
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
}
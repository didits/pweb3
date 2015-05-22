<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index()
	{
		$data['status']='';
		if($this->session->userdata('logged_in')==""){
		$data['status']='login';
		}else 
		$data['status']='logout';
		$this->load->view('header');
		$this->load->view('nav', $data);
		$this->load->view('index');
	}
}

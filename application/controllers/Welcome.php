<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('user_model');
		$this->load->helper('date');
    }
	public function index()
	{
		$data['status']='';
		if($this->session->userdata('logged_in')==""){
		$data['status']='login';
		}else 
		$data['status']='logout';
		$datas=array(
		'h' => $this->user_model->show_berita(1),
		'b'=> 2,
		'c'=>0		);
		$this->load->view('header');
		$this->load->view('nav', $data);
		$this->load->view('index', $datas);
		$this->load->view('footer');
	}
	public function home($f)
	{
		$data['status']='';
		if($this->session->userdata('logged_in')==""){
		$data['status']='login';
		}else 
		$data['status']='logout';
		$datas=array(
		'h' => $this->user_model->show_berita($f),
		'b'=> $f +1,
		'c'=>$f - 1
		);
		$this->load->view('header');
		$this->load->view('nav', $data);
		$this->load->view('index', $datas);
		$this->load->view('footer');
	}
	
}

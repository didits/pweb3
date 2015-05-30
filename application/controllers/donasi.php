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
		$data['status']='LOGIN';
		}else 
		$data['status']='LOGOUT';
		$datas=array(
		'h' => $this->donasi_model->list_donasi(),
		);
		$this->load->view('header');
		$this->load->view('nav', $data);
		$this->load->view('donasi', $datas);
		$this->load->view('footer');
	}
	
	public function form_donasi($id)
	{
		$data['status']='';
		if($this->session->userdata('logged_in')==""){
			$data['status']='LOGIN';
			$this->load->view('header');
			$this->load->view('nav', $data);
			$this->load->view('harus_login');
			$this->load->view('footer');
		}else 
		$data['status']='LOGOUT';
		$datas=array(
		'b' => $this->donasi_model->list_donasi_($id),
		'h' => $this->donasi_model->show_user($this->session->userdata('username')),
		);
		$this->load->view('header');
		$this->load->view('nav', $data);
		$this->load->view('form_donasi', $datas);
		$this->load->view('footer');
	}
	
	public function submit_donasi(){
		$id=$this->input->post('id');
		$user=$this->input->post('username');
		$program=$this->input->post('program');
		$dana=$this->input->post('harga');
		$tanggal=$this->input->post('tanggal');
		$deskrip=$this->input->post('deskrip');
		$this->donasi_model->donate($id,$user, $program, $tanggal, $dana, $deskrip);
		$this->sukses_donasi($id);
		}
		
	public function sukses_donasi($id)
	{
		$data['status']='';
		if($this->session->userdata('logged_in')==""){
			$data['status']='LOGIN';
			$this->load->view('header');
			$this->load->view('nav', $data);
			$this->load->view('harus_login');
			$this->load->view('footer');
		}else 
		$data['status']='LOGOUT';
		$datas=array(
		//'b' => $this->donasi_model->list_donasi_($id),
		'h' => $this->donasi_model->sukses_donasi($id, $this->session->userdata('username')),
		);
		$this->load->view('header');
		$this->load->view('nav', $data);
		$this->load->view('sukses_donasi', $datas);
		$this->load->view('footer');
	}
	
}

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
		$this->load->view('admin/head');
		$this->load->view('admin/nav');
		$this->load->view('admin/index');
	}
	
	public function tambah_berita()
	{
		$this->load->view('admin/head');
		$this->load->view('admin/nav');
		$this->load->view('admin/berita', array('error' => ' ' ));
	}
	
	public function edit_berita()
	{
		$this->load->view('admin/head');
		$this->load->view('admin/nav');
		$this->load->view('admin/edit_berita', array('error' => ' ' ));
	}
	
	public function submit_fp()
		{
			$judul=$this->input->post('judul');
			$nrp1=$this->input->post('nrp1');
			$nrp2=$this->input->post('nrp2');
			$nrp3=$this->input->post('nrp3');
			$nrp4=$this->input->post('nrp4');
			$nrp5=$this->input->post('nrp5');
			$nrp6=$this->input->post('nrp6');
			$deskripsi=$this->input->post('deskripsi');
			$semester=$this->input->post('semester');
			$nip=$this->input->post('nip');
			$matkul=$this->input->post('matkul');
			$screenshot=$this->input->post('screenshot');
			$video=$this->input->post('video');
			$demo=$this->input->post('demo');
				
				$this->insert_model->infp($judul,$nrp1,$nrp2,$nrp3,$nrp4,$nrp5,$nrp6,$deskripsi,$semester,$nip,$matkul,$screenshot,$video,$demo);
		
			$this->load->view('admin/header');
			$this->load->view('admin/finalproject');
			$this->load->view('admin/footer');
		}
		
		    public function submit_isi()
    		{
			//$datestring = "Year: %Y Month: %m Day: %d - %h:%i %a";
			//$time = time();
			//$tanggal = mdate($datestring, $time);
			//$judul=$this->input->post('judul');
			//$deskripsi=$this->input->post('deskripsi');	
			
		    $this->admin_model->onclic();
    		}
				
}

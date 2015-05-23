<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

		function __construct() {
        parent::__construct();
<<<<<<< HEAD
        $this->load->model('insert_model');
=======
		$this->load->model('admin_model');
        if($this->session->userdata('role')!="2"){
		redirect('/user/login', 'refresh');
		}
>>>>>>> 6540d2c990c4e95eb1ab1eed56e61313bbc5533d
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
		$data['h'] = $this->admin_model->show_edit_berita();
		$this->load->view('admin/head');
		$this->load->view('admin/nav');
		$this->load->view('admin/edit_berita');
	}
    
    //menambah postingan oleh admin
    public function tambah_thread()
	{
		$this->load->view('admin/head');
		$this->load->view('admin/nav');
		$this->load->view('admin/tambah_thread_v', $data);
	}
    
    //memproses tambah thread
    public function proses_tambah_thread()
	{
        //menerima input
        $judul=$this->input->post('judul');
        $u_name=$this->input->post('u_name');
        $isi=$this->input->post('isi');
        $tipe=$this->input->post('tipe');
        
        //load ke model
        $this->admin_model>tambah_thread($judul, $u_name, $isi, $tipe);
        
        //load model konfirmasi
		$this->load->view('admin/head');
		$this->load->view('admin/nav');
		$this->load->view('admin/konfirm_tambah_thread_v', $data);
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

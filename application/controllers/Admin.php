<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

		function __construct() {
        parent::__construct();
        //$this->load->model('insert_model');
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
	
	public function tambah_donasi()
	{
		$data['user']=$this->session->userdata('username');
		$this->load->view('admin/head');
		$this->load->view('admin/nav', $data);
		$this->load->view('admin/tambah_donasi', array('error' => ' ' ));
	}
	
	
	public function edit_berita()
	{
		$datas['user']=$this->session->userdata('username');
		$data['h'] = $this->admin_model->show_edit_berita();
		$this->load->view('admin/head');
		$this->load->view('admin/nav', $datas);
		$this->load->view('admin/edit_berita', $data);
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
    
    //edit thread yang sudah ada
    public function edit_thread()
    {
        //ambil semua thread dari database
        $data['e_thread'] = $this->admin_model->show_edit_thread()
        //buka halaman edit thread
        $this->load->view('admin/head');
		$this->load->view('admin/nav');
        $this->load->view('admin/edit_thread_v');
    }
    
    public function proses_edit_thread()
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

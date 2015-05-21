<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Halaman extends CI_Controller {
	function __construct() {
        parent::__construct();
        //$this->load->model('register');
    }
	
	public function index()
	{
		$this->load->view('header');
		$this->load->view('nav');
		$this->load->view('halaman');
		$this->load->view('footer');
	}
}
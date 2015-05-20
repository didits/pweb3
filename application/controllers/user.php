
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct() {
        parent::__construct();
        //$this->load->model('register');
    }
	
	public function index()
	{
		$this->load->view('header');
		$this->load->view('nav');
		$this->load->view('login');
		$this->load->view('footer');
	}
	
	public function login()
	{
		$this->load->view('header');
		$this->load->view('nav');
		$this->load->view('login');
		$this->load->view('footer');
	}
	
	public function signup()
	{
		$this->load->view('header');
		$this->load->view('nav');
		$this->load->view('signup');
		$this->load->view('footer');
	}
}
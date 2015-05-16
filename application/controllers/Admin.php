<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function index()
	{
		$this->load->view('admin/head');
		$this->load->view('admin/nav');
		$this->load->view('admin/footer');
	}
}

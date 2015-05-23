
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('user_model');
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
		$this->load->view('login');
		$this->load->view('footer');
	}
	
	public function thank()
	{
		$data['status']='';
		if($this->session->userdata('logged_in')==""){
		$data['status']='login';
		}else 
		$data['status']='logout';
		$this->load->view('header');
		$this->load->view('nav', $data);
		$this->load->view('thank');
		$this->load->view('footer');
	}
	
	public function login()
	{
		$data['status']='';
		if($this->session->userdata('logged_in')==""){
		$data['status']='login';
		}else 
		$data['status']='logout';
		$this->load->view('header');
		$this->load->view('nav', $data);
		$this->load->view('login');
		$this->load->view('footer');
	}
	
	public function login_submit()
	{
		$user=$this->input->post('user_name');
		$password=md5($this->input->post('pass'));

		$result=$this->user_model->login($user,$password);
		if($result && $this->session->userdata('role')=="2") redirect('/admin', 'refresh');
		else  
		if($result && $this->session->userdata('role')=="1") redirect('/welcome', 'refresh');
		      $this->index();
	}
	
	public function signup()
	{
		$data['status']='';
		if($this->session->userdata('logged_in')==""){
		$data['status']='login';
		}else 
		$data['status']='logout';
		$this->load->view('header');
		$this->load->view('nav', $data);
		$this->load->view('signup');
		$this->load->view('footer');
	}
	
	public function registration()
	{
		$this->load->library('form_validation');
		// field name, error message, validation rules
		$this->form_validation->set_rules('user_name', 'User Name', 'trim|required|min_length[4]|callback_check_user_ci');
		$this->form_validation->set_rules('email_address', 'Your Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('con_password', 'Password Confirmation', 'trim|required|matches[password]');

		if($this->form_validation->run() == FALSE)
		{
			$this->signup();
		}
		else
		{
			$this->user_model->add_user();
			$this->thank();
		}
	}
	
	public function check_user_ci()
	{
		$usr=$this->input->post('user_name');
        $result=$this->user_model->check_user_exist($usr);
        if($result)
		{
			$this->form_validation->set_message('check_user', 'User Name already exit.');
			return false;
		}
		else
		{
			return true;
		}
	}
	
	public function check_user()
	{
		$usr=$this->input->post('name');
        $result=$this->user_model->check_user_exist($usr);
        if($result)
        {
			echo "false";
			
        }
        else{
			
			echo "true";
        }
	}
	
	public function logout()
	{
		$newdata = array(
		'username'   =>'',
		'email'  =>'',
		'role'     => '',
		'logged_in' => '',
		);
		$this->session->unset_userdata($newdata);
		$this->session->sess_destroy();
		$this->logout_sukses();
	}
	
	public function logout_sukses()
	{
		$data['status']='';
		if($this->session->userdata('logged_in')==""){
		$data['status']='login';
		}else 
		$data['status']='logout';
		$this->load->view('header');
		$this->load->view('nav', $data);
		$this->load->view('logout');
		$this->load->view('footer');
	}
}
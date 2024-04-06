<?php

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('main_model');
		$this->load->helper(array('form', 'url', 'url_helper'));
		$this->load->library('session');
	}

	public function signin()
	{
		$this->load->view('admin/login');
	} 

	public function login_user()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$count = $this->main_model->authenticate_user($username, $password);

	if ($count == 1)
	{ 
		$_SESSION = array(
		'username' => $username,
	);
	}
		else
		{ 
			$this->load->view('admin/login');
		}
	
		if (isset($_SESSION['username']))
		{		
			redirect('main/panel');		
		}
	}

}	
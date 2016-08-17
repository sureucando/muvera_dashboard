<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->home();
	}

	public function home()
	{
		$data['title'] = 'Login';

		$this->load->view('template/dashboard_header.php', $data);
		$this->load->view('login/login.php', $data);
		$this->load->view('template/dashboard_footer.php', $data);
	}

}
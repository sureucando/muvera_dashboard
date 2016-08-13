<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_us extends CI_Controller {

	public function index()
	{
		$this->home();
	}

	public function home()
	{
		$data['title'] = 'Contact Us';

		$this->load->view('template/dashboard_header.php', $data);
		$this->load->view('contact_us/contact_us.php', $data);
		$this->load->view('template/dashboard_footer.php', $data);
	}

}
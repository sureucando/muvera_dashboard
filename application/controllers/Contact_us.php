<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_us extends CI_Controller {

	public function index()
	{
		if ( ! $this->session->userdata('logged_in'))
        {
			$this->logged_out();
        }
        else
        {
			$this->logged_in();
        }
	}

	public function logged_in()
	{
		$data['title'] = 'Contact Us';

		$this->load->view('template/dashboard_headerv2.php', $data);
		$this->load->view('contact_us/contact_us.php', $data);
		$this->load->view('template/dashboard_footer.php', $data);
	}

	public function logged_out()
	{
		$data['title'] = 'Contact Us';

		$this->load->view('template/dashboard_header.php', $data);
		$this->load->view('contact_us/contact_us.php', $data);
		$this->load->view('template/dashboard_footer.php', $data);
	}

	public function sent_message()
	{
		redirect('contact_us', 'location');
	}

}
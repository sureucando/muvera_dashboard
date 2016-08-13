<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

	public function index()
	{
		$this->home();
	}

	public function home()
	{
		$data['title'] = 'MUVERA';

		$this->load->view('landing.php', $data);
	}

}
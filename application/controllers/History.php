<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        if ( ! $this->session->userdata('logged_in'))
        { 
            redirect('login', 'location');
        }
    }

	public function index()
	{
		$this->home();
	}

	public function home()
	{
		$data['title'] = 'History';

		$this->load->view('template/dashboard_headerv2.php', $data);
		$this->load->view('history/history.php', $data);
		$this->load->view('template/dashboard_footer.php', $data);
	}

}
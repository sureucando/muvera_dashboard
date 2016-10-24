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
		$this->load->model('model_history');
		$data['title'] = 'History';

		$username = $this->session->userdata('username');
		$result = $this->model_history->getHistory($username);
		
		$this->load->view('template/dashboard_headerv2.php', $data);
		if($result == NULL){
			$this->load->view('history/history.php', $data);
		}
		else{
			$i = 0;
			foreach($result as $row){
				$countData[$i] = array (
					"keyword" => explode(',', $row->keyword),
					"filename" => $row->filename,
					"tanggal" => $row->hit_time
				);
				$i++;
			}
			$data['rowdata'] = $countData;
			$data['item'] = $i;
			$this->load->view('history/history.php', $data);
		}
		$this->load->view('template/dashboard_footer.php', $data);
	}

}
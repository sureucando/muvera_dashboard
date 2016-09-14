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
			$this->load->view('history/historyv2.php', $data);
		}
		$this->load->view('template/dashboard_footer.php', $data);
	}

	public function downloadPNG()
	{
		$filedata = file_get_contents(APPPATH.'generated_chart/'.$this->session->userdata('filename').'.png');
		$filepath = APPPATH.'generated_chart/'.$this->session->userdata('filename').'.png';
		force_download($filepath, $filedata);
	}

	public function downloadPDF()
	{
		$filedata = file_get_contents(APPPATH.'generated_report/'.$this->session->userdata('filename').'.pdf');
		$filepath = APPPATH.'generated_report/'.$this->session->userdata('filename').'.pdf';
		force_download($filepath, $filedata);
	}

	public function downloadCSV()
	{
		$filedata = file_get_contents(APPPATH.'generated_file/'.$this->session->userdata('filename').'.csv');
		$filepath = APPPATH.'generated_file/'.$this->session->userdata('filename').'.csv';
		force_download($filepath, $filedata);
	}

}
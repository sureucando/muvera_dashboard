<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media_online extends CI_Controller {

	public function index()
	{
		$this->home();
	}

	public function save_search()
	{
		$form_data = $this->input->post();
	}

	public function home()
	{
		$this->load->helper('form');
		
		$data['title'] = 'Dashboard';

		$this->load->model('model_cnnidn');
		$this->load->model('model_detik');
		$this->load->model('model_kompas');
		$this->load->model('model_liputan6');
		$this->load->model('model_merdeka');
		$this->load->model('model_republika');
		$this->load->model('model_sindo');
		$this->load->model('model_tempo');
		$this->load->model('model_tribun');
		$this->load->model('model_viva');

		$data['count_cnnidn'] = $this->model_cnnidn->countCNNIdnData();
		$data['count_detik'] = $this->model_detik->countDetikData();
		$data['count_kompas'] = $this->model_kompas->countKompasData();
		$data['count_liputan6'] = $this->model_liputan6->countLiputan6Data();
		$data['count_merdeka'] = $this->model_merdeka->countMerdekaData();
		$data['count_republika'] = $this->model_republika->countRepublikaData();
		$data['count_sindo'] = $this->model_sindo->countSindoData();
		$data['count_tempo'] = $this->model_tempo->countTempoData();
		$data['count_tribun'] = $this->model_tribun->countTribunData();
		$data['count_viva'] = $this->model_viva->countVivaData();

		$input = array(
			'main-word' => $this->input->post('main-word'),
			);

		$this->load->view('template/dashboard_header', $data);
		$this->load->view('media_online/media_main', $data);
		$this->load->view('media_online/search_word', $input);
		$this->load->view('media_online/media_report', $data);
		$this->load->view('template/dashboard_footer', $data);
	}

	/*public function data()
	{
		$this->load->model('model_cnnidn');
		$this->load->model('model_detik');
		$this->load->model('model_kompas');
		$this->load->model('model_liputan6');
		$this->load->model('model_merdeka');
		$this->load->model('model_republika');
		$this->load->model('model_sindo');
		$this->load->model('model_tempo');
		$this->load->model('model_tribun');
		$this->load->model('model_viva');

		$data['title'] = 'Data';
		
		$data['count_cnnidn'] = $this->model_cnnidn->countCNNIdnData();
		$data['count_detik'] = $this->model_detik->countDetikData();
		$data['count_kompas'] = $this->model_kompas->countKompasData();
		$data['count_liputan6'] = $this->model_liputan6->countLiputan6Data();
		$data['count_merdeka'] = $this->model_merdeka->countMerdekaData();
		$data['count_republika'] = $this->model_republika->countRepublikaData();
		$data['count_sindo'] = $this->model_sindo->countSindoData();
		$data['count_tempo'] = $this->model_tempo->countTempoData();
		$data['count_tribun'] = $this->model_tribun->countTribunData();
		$data['count_viva'] = $this->model_viva->countVivaData();

		$this->load->view('data_view', $data);	
	}*/
	
	/*public function Query($type = ''){
		//if($type === "ajax_refresh"){
			$output = array(
			"message" => "Hei Berhasil AJAX",
			"status" => TRUE
			);
			echo json_encode($output);
		//}
	}*/
}

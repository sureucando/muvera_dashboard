<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media_online extends CI_Controller {

	public function index()
	{
		$this->home();
	}

	public function home()
	{
		$this->load->model('model_media_online');

		$data['title'] = 'Dashboard';
		$data['antara_data'] = $this->model_media_online->getAntaraData();
		$data['count_cnnidn'] = $this->model_media_online->countCNNIdnData();
		$data['count_detik'] = $this->model_media_online->countDetikData();
		$data['count_kompas'] = $this->model_media_online->countKompasData();
		$data['count_liputan6'] = $this->model_media_online->countLiputan6Data();
		$data['count_merdeka'] = $this->model_media_online->countMerdekaData();
		$data['count_republika'] = $this->model_media_online->countRepublikaData();
		$data['count_sindo'] = $this->model_media_online->countSindoData();
		$data['count_tempo'] = $this->model_media_online->countTempoData();
		$data['count_tribun'] = $this->model_media_online->countTribunData();
		$data['count_viva'] = $this->model_media_online->countVivaData();

		$this->load->view('template/dashboard_header', $data);
		$this->load->view('media_online', $data);
		$this->load->view('template/dashboard_footer', $data);
	}

	public function data()
	{
		$this->load->model('model_media_online');

		$data['title'] = 'Data';

		$this->load->view('data_view', $data);	
	}
}

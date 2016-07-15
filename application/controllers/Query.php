<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Query extends CI_Controller {
	
	public function ajax_refresh(){
		$query1 = array (
			'mainword' => $this->input->post('main-word'),
			'firsttax' => $this->input->post('first-tax'),
			'secondtax' => $this->input->post('second-tax'),
			'thirdtax' => $this->input->post('third-tax'),
			'fourthtax' => $this->input->post('fourth-tax'),
			'datefrom' => $this->input->post('date-from'),
			'timefrom' => $this->input->post('time-from'),
			'dateto' => $this->input->post('date-to'),
			'timeto' => $this->input->post('time-to'),
			'media' => $this->input->post('media')
			);
		$countData = [];
		foreach($query1['media'] as &$tablename){	
			$countData[$tablename] = $this->data($query1['mainword'],$query1['firsttax'],$query1['secondtax'],$query1['thirdtax'],$query1['fourthtax'],$query1['datefrom'].' '.$query1['timefrom'], $query1['dateto'].' '.$query1['timeto'],$tablename);
		}
		$output = array(
				"message" => "Hei Berhasil AJAX",
				"word1" => $query1['mainword'],
				"word2" => $query1['firsttax'],
				"word3" => $query1['secondtax'],
				"word4" => $query1['thirdtax'],
				"word5" => $query1['fourthtax'],
				"datefrom" => $query1['datefrom'],
				"timefrom" => $query1['timefrom'],
				"dateto" => $query1['dateto'],
				"timeto" => $query1['timeto'],
				"media" => $query1['media'],
				"status" => TRUE,
				"count" => $countData
		);
		echo json_encode($output);
	}
	
	public function index(){
		echo "bangke";
	}
	
	private function data($k1,$k2,$k3,$k4,$k5,$datefrom,$dateto,$tablename){
		$this->load->model('model_query');
		
		return $this->model_query->getCountBasedKeyword($k1,$k2,$k3,$k4,$k5,$datefrom,$dateto,$tablename);
	}
}
?>
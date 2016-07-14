<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Query extends CI_Controller {
	
	public function ajax_refresh(){
		$query1 = $this->input->post('main-word');
		$output = array(
				"message" => "Hei Berhasil AJAX",
				"word1" => $query1,
				"status" => TRUE
		);
		echo json_encode($output);
	}
	
	public function index(){
		echo "bangke";
	}
}
?>
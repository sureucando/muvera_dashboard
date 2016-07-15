<?php
	class Model_cnnidn extends CI_Model {
		
		function __construct() {
			parent::__construct();
		}

		function getCNNIdnData() {

			$query = $this->db->query('SELECT * FROM cnnindo_data');

			if ($query->num_rows() > 0) {
				return $query->result();
			}
			else {
				return NULL;
			}
		}

		function countCNNIdnData() {
			$query = $this->db->query('SELECT COUNT(*) AS total FROM cnnindo_data');

			if ($query->num_rows() > 0) {
				return $query->result();
			}
			else {
				return NULL;
			}
		}
		
		function getCountBasedKeyword($k1, $k2, $k3, $k4, $k5, $table_name){
			$query = "select count(*) as total from $table_name where content like '%$k1%' and content like '%$k2%' and content like '%$k3%' and content like '%$k4%' and content like '%$k5%' ";
			if ($query->num_rows() > 0) {
				return $query->result();
			}
			else {
				return NULL;
			}
		}
	}
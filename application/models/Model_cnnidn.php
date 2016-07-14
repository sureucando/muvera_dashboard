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
	}
<?php
	class Model_liputan6 extends CI_Model {
		
		function __construct() {
			parent::__construct();
		}

		function getLiputan6Data() {

			$query = $this->db->query('SELECT * FROM liputan6_data');

			if ($query->num_rows() > 0) {
				return $query->result();
			}
			else {
				return NULL;
			}
		}

		function countLiputan6Data() {
			$query = $this->db->query('SELECT COUNT(*) AS total FROM liputan6_data');

			if ($query->num_rows() > 0) {
				return $query->result();
			}
			else {
				return NULL;
			}
		}
	}
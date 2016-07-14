<?php
	class Model_merdeka extends CI_Model {
		
		function __construct() {
			parent::__construct();
		}

		function getMerdekaData() {

			$query = $this->db->query('SELECT * FROM merdeka_data');

			if ($query->num_rows() > 0) {
				return $query->result();
			}
			else {
				return NULL;
			}
		}

		function countMerdekaData() {
			$query = $this->db->query('SELECT COUNT(*) AS total FROM merdeka_data');

			if ($query->num_rows() > 0) {
				return $query->result();
			}
			else {
				return NULL;
			}
		}
	}
<?php
	class Model_sindo extends CI_Model {
		
		function __construct() {
			parent::__construct();
		}

		function getSindoData() {

			$query = $this->db->query('SELECT * FROM sindonews_data');

			if ($query->num_rows() > 0) {
				return $query->result();
			}
			else {
				return NULL;
			}
		}

		function countSindoData() {
			$query = $this->db->query('SELECT COUNT(*) AS total FROM sindonews_data');

			if ($query->num_rows() > 0) {
				return $query->result();
			}
			else {
				return NULL;
			}
		}
	}
<?php
	class Model_detik extends CI_Model {
		
		function __construct() {
			parent::__construct();
		}

		function getDetikData() {

			$query = $this->db->query('SELECT * FROM detik_data');

			if ($query->num_rows() > 0) {
				return $query->result();
			}
			else {
				return NULL;
			}
		}

		function countDetikData() {
			$query = $this->db->query('SELECT COUNT(*) AS total FROM detik_data');

			if ($query->num_rows() > 0) {
				return $query->result();
			}
			else {
				return NULL;
			}
		}
	}
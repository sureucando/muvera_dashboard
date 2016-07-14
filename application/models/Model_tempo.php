<?php
	class Model_tempo extends CI_Model {
		
		function __construct() {
			parent::__construct();
		}

		function getTempoData() {

			$query = $this->db->query('SELECT * FROM tempo_data');

			if ($query->num_rows() > 0) {
				return $query->result();
			}
			else {
				return NULL;
			}
		}

		function countTempoData() {
			$query = $this->db->query('SELECT COUNT(*) AS total FROM tempo_data');

			if ($query->num_rows() > 0) {
				return $query->result();
			}
			else {
				return NULL;
			}
		}
	}
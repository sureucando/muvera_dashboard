<?php
	class Model_kompas extends CI_Model {
		
		function __construct() {
			parent::__construct();
		}

		function getKompasData() {

			$query = $this->db->query('SELECT * FROM kompas_data');

			if ($query->num_rows() > 0) {
				return $query->result();
			}
			else {
				return NULL;
			}
		}

		function countKompasData() {
			$query = $this->db->query('SELECT COUNT(*) AS total FROM kompas_data');

			if ($query->num_rows() > 0) {
				return $query->result();
			}
			else {
				return NULL;
			}
		}
	}
<?php
	class Model_viva extends CI_Model {
		
		function __construct() {
			parent::__construct();
		}

		function getVivaData() {

			$query = $this->db->query('SELECT * FROM viva_data');

			if ($query->num_rows() > 0) {
				return $query->result();
			}
			else {
				return NULL;
			}
		}

		function countVivaData() {
			$query = $this->db->query('SELECT COUNT(*) AS total FROM viva_data');

			if ($query->num_rows() > 0) {
				return $query->result();
			}
			else {
				return NULL;
			}
		}
	}
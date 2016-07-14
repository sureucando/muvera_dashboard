<?php
	class Model_republika extends CI_Model {
		
		function __construct() {
			parent::__construct();
		}

		function getRepublikaData() {

			$query = $this->db->query('SELECT * FROM republika_data');

			if ($query->num_rows() > 0) {
				return $query->result();
			}
			else {
				return NULL;
			}
		}

		function countRepublikaData() {
			$query = $this->db->query('SELECT COUNT(*) AS total FROM republika_data');

			if ($query->num_rows() > 0) {
				return $query->result();
			}
			else {
				return NULL;
			}
		}
	}
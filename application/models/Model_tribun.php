<?php
	class Model_tribun extends CI_Model {
		
		function __construct() {
			parent::__construct();
		}

		function getTribunData() {

			$query = $this->db->query('SELECT * FROM tribunnews_data');

			if ($query->num_rows() > 0) {
				return $query->result();
			}
			else {
				return NULL;
			}
		}

		function countTribunData() {
			$query = $this->db->query('SELECT COUNT(*) AS total FROM tribunnews_data');

			if ($query->num_rows() > 0) {
				return $query->result();
			}
			else {
				return NULL;
			}
		}
	}
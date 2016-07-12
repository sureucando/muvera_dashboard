<?php
	class Model_media_online extends CI_Model {
		
		function __construct() {
			parent::__construct();
		}

		function getAntaraData() {

			$query = $this->db->query('SELECT * FROM antaranews_data');

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

		function countDetikData() {
			$query = $this->db->query('SELECT COUNT(*) AS total FROM detik_data');

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

		function countLiputan6Data() {
			$query = $this->db->query('SELECT COUNT(*) AS total FROM liputan6_data');

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

		function countRepublikaData() {
			$query = $this->db->query('SELECT COUNT(*) AS total FROM republika_data');

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

		function countTempoData() {
			$query = $this->db->query('SELECT COUNT(*) AS total FROM tempo_data');

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
<?php
require_once(APPPATH.'third_party/ChromePhp.php');
	class Model_query extends CI_Model {
		
		function __construct() {
			parent::__construct();
		}
		
		function getCountBasedKeyword($k1, $k2, $k3, $k4, $k5, $datefrom, $dateto, $table_name){
			$query = $this->db->query("select count(*) as total from $table_name where content like '%$k1%' and content like '%$k2%' and content like '%$k3%' and content like '%$k4%' and content like '%$k5%' and date between '$datefrom' and '$dateto' ");
			if ($query->num_rows() > 0) {
				return $query->result();
			}
			else {
				return NULL;
			}
		}
		
		function getCountTimeSeriesBasedKeyword($k1, $k2, $k3, $k4, $k5, $datefrom, $dateto, $table_name){
			$query = $this->db->query("select date(date) as tanggal, count(*) as total from $table_name where content like '%$k1%' and content like '%$k2%' and content like '%$k3%' and content like '%$k4%' and content like '%$k5%' and date between '$datefrom' and '$dateto' group by date(date) ");
			ChromePhp::log("select date(date) as tanggal, count(*) as total from $table_name where content like '%$k1%' and content like '%$k2%' and content like '%$k3%' and content like '%$k4%' and content like '%$k5%' and date between '$datefrom' and '$dateto' group by date(date) ");
			if ($query->num_rows() > 0) {
				return $query->result();
			}
			else {
				return NULL;
			}
		}
		
		function getRawData($k1, $k2, $k3, $k4, $k5, $datefrom, $dateto, $table_name,$limit){
			$query = $this->db->query("select title,date,link,content from $table_name where content like '%$k1%' and content like '%$k2%' and content like '%$k3%' and content like '%$k4%' and content like '%$k5%' and date between '$datefrom' and '$dateto' limit $limit");
			if ($query->num_rows() > 0) {
				return $query->result();
			}
			else {
				return NULL;
			}
		}
	}
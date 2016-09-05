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
		
		function getCountBasedKeywordOneTable($k1, $k2, $k3, $k4, $k5, $datefrom, $dateto, $table_name){
			$query = $this->db->query("select media, count(*) as total from (select media, content from media_data where date between '$datefrom' and '$dateto' and media in ($table_name)) as temp where content like '%$k1%' and content like '%$k2%' and content like '%$k3%' and content like '%$k4%' and content like '%$k5%' group by media ");
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
		
		function getRawDataOneTable($k1, $k2, $k3, $k4, $k5, $datefrom, $dateto, $table_name){
			$query = $this->db->query("select * from (select media, title, date, link, content, quote1, quote2, quote3, quote4, quote5 from media_data where date between '$datefrom' and '$dateto' and media in ($table_name)) as temp where content like '%$k1%' and content like '%$k2%' and content like '%$k3%' and content like '%$k4%' and content like '%$k5%'");
			if ($query->num_rows() > 0) {
				return $query->result();
			}
			else {
				return NULL;
			}
		}

		function storeReportHistory($username, $keywords, $datefrom, $dateto, $table_name, $hit_time){
			$time = str_replace('-','', $hit_time);
			$time = str_replace(':','', $time);
			$time = str_replace('AM','', $time);
			$time = str_replace('PM','', $time);
			$time = str_replace(' ','', $time);
			$history = array (
				'username' => $username,
				'keyword' => $keywords,
				'media' => $table_name,
				'filename' => $username.'_'.$time,
				'date_range_start' => $datefrom,
				'date_range_end' => $dateto,
				'hit_time' => $hit_time
			);
			$session_data  = array('filename' => $username.'_'.$time);
			$this->session->set_userdata($session_data);
			$this->db->insert('report_history', $history);

			//$query = $this->db->query("insert into report_history (username, keyword, media, filename, date_range_start, date_range_end) values ('$username','$keywords', '$table_name', '', '$dateform', '$dateto')");
		}
	}
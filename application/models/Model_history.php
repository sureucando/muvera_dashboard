<?php
require_once(APPPATH.'third_party/ChromePhp.php');
	class Model_history extends CI_Model {
		
		function __construct() {
			parent::__construct();
		}
		
		public function getHistory($username)
	    {
	    	$condition = "username =" . "'" . $username . "'";
	        $this->db->select('*');
	        $this->db->from('report_history');
	        $this->db->where($condition);
	        $this->db->order_by('hit_time', 'ASC');
	        $query = $this->db->get();
	        
	        if ($query->num_rows() > 0) {
				return $query->result();
			}
			else {
				return NULL;
			}
	    }
		
	}
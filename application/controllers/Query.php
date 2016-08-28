<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'third_party/ChromePhp.php');

class Query extends CI_Controller {
	
	public function ajax_refresh(){

		$query1 = array (
			'mainword' => $this->input->post('main-word'),
			'firsttax' => $this->input->post('first-tax'),
			'secondtax' => $this->input->post('second-tax'),
			'thirdtax' => $this->input->post('third-tax'),
			'fourthtax' => $this->input->post('fourth-tax'),
			'datefrom' => $this->input->post('date-from'),
			'hourfrom' => $this->input->post('hour-from'),
			'minutefrom' => $this->input->post('minute-from'),
			'periodfrom' => $this->input->post('from-period'),
			'hourto' => $this->input->post('hour-to'),
			'minuteto' => $this->input->post('minute-to'),
			'periodto' => $this->input->post('to-period'),
			'dateto' => $this->input->post('date-to'),
			'media' => $this->input->post('media')
			);
		$countData = [];
		$countTime = array();
		$timefrom = '';
		$timeto = '';
		$datefrom = new DateTime($query1['datefrom']);
		$dateto = new DateTime($query1['dateto']);
		$interval = new DateInterval('P1D');
		$period = new DatePeriod($datefrom, $interval, $dateto);
	
		/*initiate value for count every day each media*/
		foreach($period as $dt){
			$value = [];
			foreach($query1['media'] as &$tablename){
				$table = explode("_",$tablename);
				$value = $value + array(ucfirst($table[0]) => 0);
			}
			$temp = array ($dt->format('Y-m-d') => $value);
			$countTime = $countTime + $temp;
		}

		if (trim($query1['periodfrom']) === 'am'){
			if($query1['hourfrom'] === '12'){
				$timefrom = '00:'.str_pad($query1['minutefrom'],2,'0',STR_PAD_LEFT).':00';
			}
			else{
				$timefrom = str_pad($query1['hourfrom'],2,'0',STR_PAD_LEFT).':'.str_pad($query1['minutefrom'],2,'0',STR_PAD_LEFT).':00';
			}
		}
		else {
			if($query1['hourfrom'] === '12'){
				$timefrom = '12:'.str_pad($query1['minutefrom'],2,'0',STR_PAD_LEFT).':00';
			}
			else{
				$hour = (int)$query1['hourfrom'] + 12;
				$timefrom = str_pad((string)$hour,2,'0',STR_PAD_LEFT).':'.str_pad($query1['minutefrom'],2,'0',STR_PAD_LEFT).':00';
			}
		}
		if (trim($query1['periodto']) === 'am'){
			if($query1['hourto'] === '12'){
				$timeto = '00:'.str_pad($query1['minuteto'],2,'0',STR_PAD_LEFT).':00';
			}
			else{
				$timeto = str_pad($query1['hourto'],2,'0',STR_PAD_LEFT).':'.str_pad($query1['minuteto'],2,'0',STR_PAD_LEFT).':00';
			}
		}
		else {
			if($query1['hourto'] == '12'){
				$timeto = '12:'.str_pad($query1['minuteto'],2,'0',STR_PAD_LEFT).':00';
			}
			else{
				$hour = (int)$query1['hourto'] + 12;
				$timeto= str_pad((string)$hour,2,'0',STR_PAD_LEFT).':'.str_pad($query1['minuteto'],2,'0',STR_PAD_LEFT).':00';
			}
		}
		$i = 0;
		/*foreach($query1['media'] as &$tablename){	
			$result = $this->data($query1['mainword'],$query1['firsttax'],$query1['secondtax'],$query1['thirdtax'],$query1['fourthtax'],$datefrom->format('Y-m-d').' '.$timefrom, $dateto->format('Y-m-d').' '.$timeto,$tablename);
			$table = explode("_",$tablename);
			$countData[$i] = array ("tablename" => ucfirst($table[0]), "total" => (int)$result[0]->total);
			if ((int)$result[0]->total > 0){
				$result2 = $this->data2($query1['mainword'],$query1['firsttax'],$query1['secondtax'],$query1['thirdtax'],$query1['fourthtax'],$datefrom->format('Y-m-d').' '.$timefrom, $dateto->format('Y-m-d').' '.$timeto,$tablename);
				
				foreach($result2 as $row){
					$countTime[$row->tanggal][ucfirst($table[0])] = $row->total;
				}
			}
			$i++;
		}*/
		$includeTable = "";
		$totalMedia = count($query1['media']);
		foreach($query1['media'] as &$tablename){
			$i++;
			if ($i < $totalMedia) {
				$includeTable =  $includeTable."'".$tablename."', ";
			}
			else{
				$includeTable =  $includeTable."'".$tablename."'";
			}
		}
		
		$result = $this->dataOneTable($query1['mainword'],$query1['firsttax'],$query1['secondtax'],$query1['thirdtax'],$query1['fourthtax'],$datefrom->format('Y-m-d').' '.$timefrom, $dateto->format('Y-m-d').' '.$timeto,$includeTable);
		
		$i = 0;
		if ($result != NULL){
			foreach($result as $row){
				$countData[$i] = array ("tablename" => $row->media, "total" => (int)$row->total);
				$i++;
			}
		}
		
		$output = array(
			"message" => "Hei Berhasil AJAX",
			"word1" => $query1['mainword'],
			"word2" => $query1['firsttax'],
			"word3" => $query1['secondtax'],
			"word4" => $query1['thirdtax'],
			"word5" => $query1['fourthtax'],
			"datefrom" => $query1['datefrom'],
			"timefrom" => $timefrom,
			"dateto" => $query1['dateto'],
			"timeto" => $timeto,
			"media" => $query1['media'],
			"status" => TRUE,
			//"countTime" => $countTime,
			"count" => $countData
			);
		echo json_encode($output);
	}
	
	public function getXLS(){
		$filecsv = fopen(APPPATH."generated_file/example_001.csv", 'w');
		fputcsv($filecsv, array('media', 'title','date','link','content', 'quote1', 'quote2', 'quote3', 'quote4', 'quote5'));
		$query1 = array (
			'mainword' => $this->input->post('main-word'),
			'firsttax' => $this->input->post('first-tax'),
			'secondtax' => $this->input->post('second-tax'),
			'thirdtax' => $this->input->post('third-tax'),
			'fourthtax' => $this->input->post('fourth-tax'),
			'datefrom' => $this->input->post('date-from'),
			'hourfrom' => $this->input->post('hour-from'),
			'minutefrom' => $this->input->post('minute-from'),
			'periodfrom' => $this->input->post('from-period'),
			'hourto' => $this->input->post('hour-to'),
			'minuteto' => $this->input->post('minute-to'),
			'periodto' => $this->input->post('to-period'),
			'dateto' => $this->input->post('date-to'),
			'media' => $this->input->post('media')
			);
		$total = 0;
		$countData = [];
		$timefrom = '';
		$timeto = '';
		$datefrom = new DateTime($query1['datefrom']);
		$dateto = new DateTime($query1['dateto']);
		
		/*get all media want to query*/
		$includeTable = "";
		$totalMedia = count($query1['media']);
		$i=0;
		foreach($query1['media'] as &$tablename){
			$i++;
			if ($i < $totalMedia) {
				$includeTable =  $includeTable."'".$tablename."', ";
			}
			else{
				$includeTable =  $includeTable."'".$tablename."'";
			}
		}
		
		if (trim($query1['periodfrom']) === 'am'){
			if($query1['hourfrom'] === '12'){
				$timefrom = '00:'.str_pad($query1['minutefrom'],2,'0',STR_PAD_LEFT).':00';
			}
			else{
				$timefrom = str_pad($query1['hourfrom'],2,'0',STR_PAD_LEFT).':'.str_pad($query1['minutefrom'],2,'0',STR_PAD_LEFT).':00';
			}
		}
		else {
			if($query1['hourfrom'] === '12'){
				$timefrom = '12:'.str_pad($query1['minutefrom'],2,'0',STR_PAD_LEFT).':00';
			}
			else{
				$hour = (int)$query1['hourfrom'] + 12;
				$timefrom = str_pad((string)$hour,2,'0',STR_PAD_LEFT).':'.str_pad($query1['minutefrom'],2,'0',STR_PAD_LEFT).':00';
			}
		}
		if (trim($query1['periodto']) === 'am'){
			if($query1['hourto'] === '12'){
				$timeto = '00:'.str_pad($query1['minuteto'],2,'0',STR_PAD_LEFT).':00';
			}
			else{
				$timeto = str_pad($query1['hourto'],2,'0',STR_PAD_LEFT).':'.str_pad($query1['minuteto'],2,'0',STR_PAD_LEFT).':00';
			}
		}
		else {
			if($query1['hourto'] == '12'){
				$timeto = '12:'.str_pad($query1['minuteto'],2,'0',STR_PAD_LEFT).':00';
			}
			else{
				$hour = (int)$query1['hourto'] + 12;
				$timeto= str_pad((string)$hour,2,'0',STR_PAD_LEFT).':'.str_pad($query1['minuteto'],2,'0',STR_PAD_LEFT).':00';
			}
		}
		$i = 0;
		/*foreach($query1['media'] as &$tablename){	
			$result = $this->data($query1['mainword'],$query1['firsttax'],$query1['secondtax'],$query1['thirdtax'],$query1['fourthtax'],$datefrom->format('Y-m-d').' '.$timefrom, $dateto->format('Y-m-d').' '.$timeto,$tablename);
			$table = explode("_",$tablename);
			$countData[$i] = array ("tablename" => $tablename, "total" => (int)$result[0]->total);
			$i++;
		}*/
		if ($total > 10000){
			for($i=0;$i<count($countData);$i++){
				$limit = floor(10000 * ($countData[$i]['total'] / $total));
				$result = $this->xlsdata($query1['mainword'],$query1['firsttax'],$query1['secondtax'],$query1['thirdtax'],$query1['fourthtax'],$datefrom->format('Y-m-d').' '.$timefrom, $dateto->format('Y-m-d').' '.$timeto,$countData[$i]['tablename'],$limit);
				if($result){
					foreach ($result as $row){
						$array = Array($row->title,$row->date, $row->link, $row->content);
						fputcsv($filecsv, $array);
					}
				}
			}
		}
		else{
			$result = $this->xlsdataOneTable($query1['mainword'],$query1['firsttax'],$query1['secondtax'],$query1['thirdtax'],$query1['fourthtax'],$datefrom->format('Y-m-d').' '.$timefrom, $dateto->format('Y-m-d').' '.$timeto,$includeTable);
			if($result){
				foreach ($result as $row){
					$array = Array($row->media, $row->title,$row->date, $row->link, $row->content, $row->quote1, $row->quote2, $row->quote3, $row->quote4, $row->quote5);
					fputcsv($filecsv, $array);
				}
			}
			/*for($i=0;$i<count($countData);$i++){
				$limit = $countData[$i]['total'];
				$result = $this->xlsdata($query1['mainword'],$query1['firsttax'],$query1['secondtax'],$query1['thirdtax'],$query1['fourthtax'],$datefrom->format('Y-m-d').' '.$timefrom, $dateto->format('Y-m-d').' '.$timeto,$countData[$i]['tablename'],$limit);
				
				if($result){
					foreach ($result as $row){
						$array = Array($row->title,$row->date, $row->link, $row->content);
						fputcsv($filecsv, $array);
					}
				}
			}*/
		}
		fclose($filecsv);
		echo "filename : generated_file/example_001.csv";
	}
	
	public function index(){
		echo "bangke";
	}
	
	private function data($k1,$k2,$k3,$k4,$k5,$datefrom,$dateto,$tablename){
		$this->load->model('model_query');
		
		return $this->model_query->getCountBasedKeyword($k1,$k2,$k3,$k4,$k5,$datefrom,$dateto,$tablename);
	}
	
	private function dataOneTable($k1,$k2,$k3,$k4,$k5,$datefrom,$dateto,$includeTable){
		$this->load->model('model_query');
		
		$username = $this->session->userdata('username');
		/* Marge Keyword*/
		$keywords =  "'".$k1."', '".$k2."', '".$k3."', '".$k4."', '".$k5."'";
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d h:i:s a', time());
		$this->model_query->storeReportHistory($username,$keywords,$datefrom,$dateto,$includeTable,$date);

		
		return $this->model_query->getCountBasedKeywordOneTable($k1,$k2,$k3,$k4,$k5,$datefrom,$dateto,$includeTable);

	}
	
	private function data2($k1,$k2,$k3,$k4,$k5,$datefrom,$dateto,$tablename){
		$this->load->model('model_query');
		
		return $this->model_query->getCountTimeSeriesBasedKeyword($k1,$k2,$k3,$k4,$k5,$datefrom,$dateto,$tablename);
	}
	
	private function xlsdataOneTable($k1,$k2,$k3,$k4,$k5,$datefrom,$dateto,$tablename){
		$this->load->model('model_query');
		
		return $this->model_query->getRawDataOneTable($k1,$k2,$k3,$k4,$k5,$datefrom,$dateto,$tablename);
	}

}
?>
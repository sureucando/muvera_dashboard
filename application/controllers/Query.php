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
		foreach($query1['media'] as &$tablename){	
			$result = $this->data($query1['mainword'],$query1['firsttax'],$query1['secondtax'],$query1['thirdtax'],$query1['fourthtax'],$datefrom->format('Y-m-d').' '.$timefrom, $dateto->format('Y-m-d').' '.$timeto,$tablename);
			$result2 = $this->data2($query1['mainword'],$query1['firsttax'],$query1['secondtax'],$query1['thirdtax'],$query1['fourthtax'],$datefrom->format('Y-m-d').' '.$timefrom, $dateto->format('Y-m-d').' '.$timeto,$tablename);
			$table = explode("_",$tablename);
			$countData[$i] = array ("tablename" => ucfirst($table[0]), "total" => (int)$result[0]->total);
			foreach($result2 as $row){
				$countTime[$row->tanggal][ucfirst($table[0])] = $row->total;
			}
			$i++;
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
			"count" => $countData,
			"countTime" => $countTime
			);
		echo json_encode($output);
	}
	
	public function getXLS(){
		$filecsv = fopen(APPPATH."generated_file/example_001.csv", 'w');
		fputcsv($filecsv, array('title','date','link','content'));
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
		foreach($query1['media'] as &$tablename){	
			$result = $this->data($query1['mainword'],$query1['firsttax'],$query1['secondtax'],$query1['thirdtax'],$query1['fourthtax'],$datefrom->format('Y-m-d').' '.$timefrom, $dateto->format('Y-m-d').' '.$timeto,$tablename);
			$table = explode("_",$tablename);
			$countData[$i] = array ("tablename" => $tablename, "total" => (int)$result[0]->total);
			$i++;
		}
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
			for($i=0;$i<count($countData);$i++){
				$limit = $countData[$i]['total'];
				$result = $this->xlsdata($query1['mainword'],$query1['firsttax'],$query1['secondtax'],$query1['thirdtax'],$query1['fourthtax'],$datefrom->format('Y-m-d').' '.$timefrom, $dateto->format('Y-m-d').' '.$timeto,$countData[$i]['tablename'],$limit);
				
				if($result){
					foreach ($result as $row){
						$array = Array($row->title,$row->date, $row->link, $row->content);
						fputcsv($filecsv, $array);
					}
				}
			}
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
	
	private function data2($k1,$k2,$k3,$k4,$k5,$datefrom,$dateto,$tablename){
		$this->load->model('model_query');
		
		return $this->model_query->getCountTimeSeriesBasedKeyword($k1,$k2,$k3,$k4,$k5,$datefrom,$dateto,$tablename);
	}
	
	private function xlsdata($k1,$k2,$k3,$k4,$k5,$datefrom,$dateto,$tablename,$limit){
		$this->load->model('model_query');
		
		return $this->model_query->getRawData($k1,$k2,$k3,$k4,$k5,$datefrom,$dateto,$tablename,$limit);
	}
}
?>
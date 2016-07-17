<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH.'third_party/tcpdf/tcpdf.php');
require_once(APPPATH.'third_party/ChromePhp.php');


class Print_report extends CI_Controller {
	function printPDF(){
				
		// create new PDF document
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Muvera');
		$pdf->SetTitle('Muvera - Media Monitoring Dashboard');
		$pdf->SetKeywords('muvera, media monitoring');

		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
		$pdf->setFooterData(array(0,64,0), array(0,64,128));

		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set some language-dependent strings (optional)
		if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
			require_once(dirname(__FILE__).'/lang/eng.php');
			$pdf->setLanguageArray($l);
		}

		// ---------------------------------------------------------

		// set default font subsetting mode
		$pdf->setFontSubsetting(true);

		// Set font
		// dejavusans is a UTF-8 Unicode font, if you only need to
		// print standard ASCII chars, you can use core fonts like
		// helvetica or times to reduce file size.
		$pdf->SetFont('dejavusans', '', 14, '', true);

		// Add a page
		// This method has several options, check the source code documentation for more information.
		$pdf->AddPage();

		// set text shadow effect
		$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

		// Set some content to print
		
		$html = file_get_contents('php://input');
		
		//print the barchart
		$array1 = explode('</label>',$html);
		$array2 = explode('<div', $array1[1]);
		ChromePhp::log($array2[0]);
		$pdf->ImageSVG('@' . $array2[0], $x=15, $y=30, $w='', $h='', $link='', $align='', $palign='', $border=0, $fitonpage=true);
		$pdf->Write(0, $txt='', '', 0, 'L', true, 0, false, false, 0);
		/*
		//print the piechart
		$arraySVG = explode('</svg>',$html);
		$pdf->ImageSVG('@' . $arraySVG[0]."</svg>", $x=15, $y=30, $w='', $h='', $link='', $align='', $palign='', $border=0, $fitonpage=true);
		$pdf->Write(0, $txt='', '', 0, 'L', true, 0, false, false, 0);
		
		//print the legend
		$pdf->ImageSVG('@' . $arraySVG[1]."</svg>", $x=15, $y=45, $w='', $h='', $link='', $align='', $palign='', $border=0, $fitonpage=true);
		$pdf->Write(0, $txt='', '', 0, 'L', true, 0, false, false, 0);
		*/
		// Print text using writeHTMLCell()
		//$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

		// ---------------------------------------------------------

		// Close and output PDF document
		// This method has several options, check the source code documentation for more information.
		$pdf->Output(APPPATH.'generated_report/example_001.pdf', 'F');

		//============================================================+
		// END OF FILE
		//============================================================+
		//$this->download("generated_report/example_001.pdf");
		echo "filename : generated_report/example_001.pdf";
	}
	
	function printPNG(){		
		$imgdata = file_get_contents('php://input');
		if ($imgdata) {
			$filename = APPPATH.'generated_chart\example_001.png';
			$imgfile = imagecreatefrompng($imgdata);
			// integer representation of the color black (rgb: 0,0,0)
			$background = imagecolorallocate($imgfile, 0, 0, 0);
			// removing the black from the placeholder
			imagecolortransparent($imgfile, $background);

			// turning off alpha blending (to ensure alpha channel information 
			// is preserved, rather than removed (blending with the rest of the 
			// image in the form of black))
			imagealphablending($imgfile, false);

			// turning on alpha channel information saving (to ensure the full range 
			// of transparency is preserved)
			imagesavealpha($imgfile, true);
			imagepng($imgfile,$filename);
			echo "filename : generated_chart/example_001.png";
			imagedestroy($imgfile);
		}
		else{
			echo "error";
		}
	}
	
	function download(){
		$this->load->helper('download');
		$data = file_get_contents(APPPATH.$this->uri->segment(3)."/".$this->uri->segment(4)); // Read the file's contents
		$name = $this->uri->segment(4);
		force_download($name, $data);
	}
}

?>
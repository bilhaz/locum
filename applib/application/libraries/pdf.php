<head><meta charset=utf-8></head>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require('fpdf.php');
class Pdf extends FPDF
{
	
	// Extend FPDF using this class
	// More at fpdf.org -> Tutorials

	function __construct($orientation='P', $unit='mm', $size='A4')
	{
		// Call parent constructor
		parent::__construct($orientation,$unit,$size);
	}
	function Header()
    {
    	$underline = str_repeat('.',300);
    	$this->SetRightMargin(25);
		  	$this->SetFont('JameelNooriNastaleeq_gdi.ttf','U',7);
		$this->MultiCell(0,0,'REGISTERED',0,'R');
		 $this->Ln(5);
		 $this->SetRightMargin(0);
		$logo = 'assets/img/mask.png';
        $this->Image($logo,35,10,18);
       	$this->SetFont('Arial','B',12);
		$title = 'DIRECTORATE GENERAL OF MINES & MINERALS';
		$this->MultiCell(0,0,$title,0,'C');
        $this->SetFont('Arial','B',10);
	    $this->Ln(5);
		 $this->MultiCell(0,0,'KHYBER PAKHTUNKHWA, PESHAWAR',0,'C');
		$this->Ln(5);
        $this->SetFont('Arial','',9);
		$this->MultiCell(0,0,'Attached Department near Judicial Complex, Khyber Road, Peshawar',0,'C');       
		$this->Ln(4);
        $this->SetFont('Arial','',8);
		$this->MultiCell(0,0,'Ph: 091-9211146/ 9211153     Fax: 091-9210236',0,'C');       
		$this->Ln(5);
		
	    $this->Ln(10);
    }

	function Footer()
	{
		
		 //$this->Ln(13);
		 $this->SetY(-15);
        $this->SetFont('Arial','I',10);
		$this->SetTextColor(224,224,224);
		$this->SetFont('Arial','','I',8);
		//$this->MultiCell(0,0,'Precise Technology',0,'R');
		//$this->SetFont('Arial','','I',8);
		 $this->Cell(0,10,'Page No. ' .$this->PageNo(),0,0,'C');
		 // Page No. along with  Toal pages then write bolow code 
		 //$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        $this->Ln();
	}

}
?>
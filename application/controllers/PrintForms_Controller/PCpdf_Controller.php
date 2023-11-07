<?php
defined('BASEPATH') or exit('No direct script access allowed');
require('assets/fpdf/fpdf.php');

class PCpdf_Controller extends CI_Controller
{
    public function PCform()
    {
        $pdf = new PDF();
            $pdf->AddPage();
            $pdf->SetFont('times', 'B', 14);
            $pdf->setLineWidth(0.4);
            $pdf->Cell(0, 10, 'PROPERTY CARD', 0, 1, 'C');
            $pdf->Ln(7);
            $pdf->SetFont('times', 'B', 12);
            $pdf->Cell(27, 8, 'Entity Name:', '', 0, 'L');
            $pdf->SetFont('times', '', 12);
            $pdf->Cell(95, 8, 'SOUTHERN LUZON STATE UNIVERSITY', 'B', 0, 'C');
            $pdf->SetFont('times', '', 12);
            $pdf->Cell(65, 8, '', '', 0, 'C');
            $pdf->SetFont('times', 'B', 12);
            $pdf->Cell(28, 8, 'Fund Cluster:', '', 0, 'C');
            $pdf->SetFont('times', '', 12);
            $pdf->Cell(62, 8, '', 'B', 1, 'L');

            $pdf->SetFont('times', '', 10);

            $x = $pdf->GetX();
            $y = $pdf->GetY() + 3; 

            $contentWidth = 277;
            $contentHeight = 145;
            $pdf->Rect($x, $y, $contentWidth, $contentHeight);

            $pdf->SetXY($x, $y);
            $pdf->SetFont('times', 'B', 12); 
            $pdf->Cell(61, 10, 'Property, Plant and Equipment :', 'LTRB', 0, 'L');
            $pdf->Cell(128, 10, '', 'LTRB', 0, 'L');
            $pdf->Cell(35, 20, 'Property Number:', 'LTRB', 0, 'L');
            $pdf->Cell(53, 13, '', 'B', 0, 'L');
            $pdf->SetXY($x, $y + 10);
            $pdf->Cell(61, 10, 'Description:', 'LTRB', 0, 'L');
            $pdf->Cell(128, 10, '', 'B', 0, 'L');
            $pdf->Cell(88, 10, '', 'B', 0, 'L');            

          

        
            $pdf->SetFont('times', '', 9);
          
          
            
            $pdf->Output(); 

        
    }
}

class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('times', 'I', 12);
        $this->Cell(0, 10, 'Appendix 69', 0, 1, 'R');
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('times', '', 10);
        $this->Cell(0, 10, '169', 0, 0, 'C');
    }

    function __construct()
    {
        parent::__construct('L', 'mm', 'A4'); // 'L' for landscape orientation, 'A4' for paper size
    }
}

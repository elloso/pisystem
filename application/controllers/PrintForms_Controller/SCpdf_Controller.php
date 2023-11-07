<?php
defined('BASEPATH') or exit('No direct script access allowed');
require('assets/fpdf/fpdf.php');

class SCpdf_Controller extends CI_Controller
{
    public function SCform()
    {
        $pdf = new PDF();
            $pdf->AddPage();
            $pdf->SetFont('times', 'B', 14);
            $pdf->setLineWidth(0.4);
            $pdf->Cell(0, 10, 'STOCK CARD', 0, 1, 'C');
            $pdf->Ln(7);
            $pdf->SetFont('times', 'B', 12);
            $pdf->Cell(25, 8, 'Entity Name:', '', 0, 'L');
            $pdf->SetFont('times', '', 12);
            $pdf->Cell(85, 8, 'SOUTHERN LUZON STATE UNIVERSITY', 'B', 0, 'C');
            $pdf->SetFont('times', 'B', 12);
            $pdf->Cell(33, 8, 'Fund Cluster:', '', 0, 'R');
            $pdf->SetFont('times', '', 12);
            $pdf->Cell(47, 8, '', 'B', 1, 'L');

            $pdf->SetFont('times', '', 10);

            $x = $pdf->GetX();
            $y = $pdf->GetY() + 3; 

            $contentWidth = 190;
            $contentHeight = 220;
            $pdf->Rect($x, $y, $contentWidth, $contentHeight);

            $pdf->SetXY($x, $y); 
            $pdf->Cell(10, 8, 'Item :', 'B', 0, 'L');
            $pdf->Cell(100, 8, '', 'RB', 0, 'C');
            $pdf->Cell(18, 8, 'Stock No. :', 'B', 0, 'L');
            $pdf->Cell(62, 8, '', 'B', 0, 'C');
            $pdf->SetXY($x, $y + 8); 
            $pdf->Cell(22, 8, 'Description :', 'B', 0, 'L');
            $pdf->Cell(88, 8, '', 'BR', 0, 'C');
            $pdf->Cell(25, 8, 'Re-order Point :', 'B', 0, 'L');
            $pdf->Cell(55, 8, '', 'B', 0, 'C');
            $pdf->SetXY($x, $y + 16); 
            $pdf->Cell(35, 8, 'Unit of Measurement :', '', 0, 'L');
            $pdf->Cell(75, 8, '', 'R', 0, 'C');
            $pdf->Cell(80, 8, '', '', 0, 'L');
           
            $pdf->Line(28, 268, 28, 82);
            $pdf->Line(53, 268, 53, 82);
            $pdf->Line(73, 268, 73, 82);
            $pdf->Line(120, 268, 120, 82);
            $pdf->Line(150, 268, 150, 82);
          

            $pdf->SetXY($x, $y + 24); 
            $pdf->Cell(18, 10, 'Date', 'TB', 0, 'C');
            $pdf->Cell(25, 10, 'Reference', 'LTRB', 0, 'C');
            $pdf->Cell(20, 5, 'Receipt', 'T', 0, 'C');
            $pdf->SetXY($x + 43, $y + 29); 
            $pdf->Cell(20, 5, 'Qty.', 'TB', 0, 'C');
            $pdf->SetXY($x + 63, $y + 29); 
            $pdf->Cell(20, 5, 'Qty.', 'LB', 0, 'C');
            $pdf->SetXY($x + 83, $y + 29); 
            $pdf->Cell(27, 5, 'Office', 'LB', 0, 'C');
            $pdf->SetXY($x + 110, $y + 29); 
            $pdf->Cell(30, 5, 'Qty.', 'LTB', 0, 'C');
            $pdf->SetXY($x + 63, $y + 24);
            $pdf->Cell(47, 5, 'Issue', 'LTRB', 0, 'C');
            $pdf->Cell(30, 5, 'Balance', 'T', 0, 'C');
            $pdf->Cell(50, 10, 'No. of Days to Consume', 'LTRB', 0, 'C');
            

          

        
            $pdf->SetFont('times', '', 9);
          
            
            $pdf->Output(); 

        
    }
}

class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('times', 'I', 12);
        $this->Cell(0, 10, 'Appendix 58 ', 0, 1, 'R');
    }
    function Footer()
    {
        $this->SetY(-15); 
        $this->SetFont('times', '', 10);
        $this->Cell(0, 10, '147' , 0, 0, 'C');
    }
}

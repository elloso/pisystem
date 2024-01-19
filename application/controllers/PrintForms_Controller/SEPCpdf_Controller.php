<?php
defined('BASEPATH') or exit('No direct script access allowed');
require('assets/fpdf/fpdf.php');

class SEPCpdf_Controller extends CI_Controller
{
    public function PCform()
    {
        $pdf = new PDF();
            $pdf->AddPage();
            $pdf->SetFont('times', 'B', 14);
            $pdf->setLineWidth(0.4);
            $pdf->Cell(0, 10, 'SEMI-EXPENDABLE PROPERTY CARD', 0, 1, 'C');
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
            $pdf->SetFont('times', 'B', 10); 
            $pdf->Cell(50, 10, 'Semi-Expendable Property :', '', 0, 'L');
            $pdf->Cell(157, 10, '', 'R', 0, 'L');
            $pdf->Cell(70, 10, 'Semi expendable Property Number :', '', 1, 'L');

            $pdf->SetXY($x, $y+10);
            $pdf->Cell(20, 10, 'Description:', 'T', 0, 'L');
            $pdf->SetXY($x, $y+20);
            $pdf->Cell(20, 10, '', '', 0, 'L');
            $pdf->SetXY($x, $y+30);
            $pdf->Cell(20, 10, '', '', 0, 'L');
            $pdf->SetXY($x+20, $y+10);
            $pdf->multicell(187, 30, '', 'TR', 'L');
            $pdf->SetXY($x+207, $y+10);
            $pdf->Cell(70, 30, '', 'B', 0, 'C');
            $pdf->SetXY($x, $y+40);
            $pdf->Cell(20, 10, 'Date', 'TRB', 0, 'C');
            $pdf->SetXY($x+20, $y+40);
            $pdf->Cell(30, 10, 'Reference/ICS No.', 'TRB', 0, 'C');

            $pdf->SetXY($x+50, $y+40);
            $pdf->Cell(67, 5, 'Receipt', 'RTB', 0, 'C');
            $pdf->SetXY($x+50, $y+45);
            $pdf->Cell(15, 5, 'Qty', 'BR', 0, 'C');
            $pdf->SetXY($x+65, $y+45);
            $pdf->Cell(25, 5, 'Unit Cost', 'B', 0, 'C');
            $pdf->SetXY($x+90, $y+45);
            $pdf->Cell(27, 5, 'Total Cost', 'LBR', 0, 'C');

            $pdf->SetXY($x+117, $y+40);
            $pdf->Cell(70, 5, 'Issue/Transfer/ Disposal', 'RTB', 0, 'C');
            $pdf->SetXY($x+117, $y+45);
            $pdf->Cell(13, 5, 'Qty', 'BR', 0, 'C');
            $pdf->SetXY($x+130, $y+45);
            $pdf->Cell(45, 5, 'Office/Officer', 'LTRB', 0, 'C');
            $pdf->SetXY($x+175, $y+45);
            $pdf->Cell(12, 5, 'Qty', 'LTRB', 0, 'C');

            $pdf->SetXY($x+187, $y+40);
            $pdf->Cell(20, 10, 'Balance', 'TRB', 0, 'C');

            $pdf->SetXY($x+207, $y+40);
            $pdf->Cell(35, 10, 'Amount ', 'LTRB', 0, 'C');

            $pdf->SetXY($x+242, $y+40);
            $pdf->multicell(35, 5, 'Remarks / Estimated Useful Life ', 'LTRB', 'C');

            
         
          
            // $pdf->Cell(128, 10, '', 'BR', 0, 'L');
            // $pdf->Cell(35, 20, 'Property Number:', '', 0, 'L');
            // $pdf->Cell(53, 13, '', 'B', 0, 'L');
            // $pdf->SetXY($x, $y + 10);
            // $pdf->Cell(24, 10, 'Description:', 'B', 0, 'L');
            // $pdf->Cell(165, 10, '', 'B', 0, 'L');
            // $pdf->Cell(88, 10, '', 'LB', 0, 'L');  
            
            // $pdf->SetXY($x, $y + 20); 
            // $pdf->SetFont('times', 'B', 12); 
            // $pdf->Cell(20, 10, 'Date', 'B', 0, 'C');
            // $pdf->SetXY($x + 20, $y + 20);
            // $pdf->multicell(31, 5, 'Reference/ PAR No.', 'LBR','C');
            // $pdf->SetXY($x + 51, $y + 20);
            // $pdf->cell(22, 5, 'Receipt', 'BR',0,'C');
            // $pdf->SetXY($x + 51, $y + 25);
            // $pdf->cell(22, 5, 'Qty.', 'BR   ',0,'C');
            // $pdf->SetXY($x + 73, $y + 20);
            // $pdf->cell(94, 5, 'Issue/Transfer/Disposal', 'B',0,'C');
            // $pdf->SetXY($x + 167, $y + 20);
            // $pdf->multicell(22, 5, 'Balance', 'LR','C');
            // $pdf->SetXY($x + 167, $y + 25);
            // $pdf->multicell(22, 5, 'Qty.', 'LTRB','C');
            // $pdf->SetXY($x + 73, $y + 25);
            // $pdf->cell(22, 5, 'Qty.', 'BR',0,'C');
            // $pdf->SetXY($x + 95, $y + 25);
            // $pdf->cell(72, 5, 'Office/Officer', 'B',0,'C');
            // $pdf->SetXY($x + 188, $y + 20);
            // $pdf->Cell(40, 10, 'Amount', 'BR', 0, 'C');
            // $pdf->SetXY($x + 228, $y + 20);
            // $pdf->Cell(49, 10, 'Remarks', 'B', 0, 'C');

             
            // $pdf->Line(30, 193, 30, 78);
            // $pdf->Line(61, 193, 61, 78);
            // $pdf->Line(83, 193, 83, 78);
            // $pdf->Line(105, 193, 105, 78);
            // $pdf->Line(177, 193, 177, 78);
            // $pdf->Line(199, 193, 199, 78);
            // $pdf->Line(238, 193, 238, 78);

          

        
            // $pdf->SetFont('times', '', 9);
          
          
            
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

<?php
defined('BASEPATH') or exit('No direct script access allowed');
require('assets/fpdf/fpdf.php');

class SEPCpdf_Controller extends CI_Controller
{
    public function PCform($po_id,$id)
    {
       
    $sepc_data = $this->Fpdf_Model->fetchSEPCDataByPOID($po_id,$id);
    $Datas = $this->Fpdf_Model->fetchSEPCDataResult($po_id,$id);
    
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
            $pdf->Cell(62, 8, $sepc_data->ics_fund, 'B', 1, 'L');

            $pdf->SetFont('times', '', 10);

              //Line
              $pdf->Line(30, 98, 30, 188);
              $pdf->Line(60, 98, 60, 188);
              $pdf->Line(75, 98, 75, 188);
              $pdf->Line(100, 98, 100, 188);
              $pdf->Line(132, 98, 132, 188);
              $pdf->Line(145, 98, 145, 188);
              $pdf->Line(207, 98, 207, 188);
              $pdf->Line(227, 58, 227, 188);
              $pdf->Line(252, 98, 252, 188);

            $x = $pdf->GetX();
            $y = $pdf->GetY() + 3; 

            $contentWidth = 277;
            $contentHeight = 140;
            $pdf->Rect($x, $y, $contentWidth, $contentHeight);

            $pdf->SetXY($x, $y);
            $pdf->SetFont('times', 'B', 10); 
            $pdf->Cell(50, 10, 'Semi-Expendable Property :', '', 0, 'L');
            $pdf->Cell(167, 10, '', '', 0, 'L');
            $pdf->multicell(60, 10, 'Semi expendable Property Number :', 'L', 'L');
            $pdf->SetXY($x, $y+10);
            $pdf->Cell(20, 7.5, 'Description:', 'T', 0, 'L');
            $pdf->SetXY($x, $y+20);
            $pdf->Cell(20, 10, '', '', 0, 'L');
            $pdf->SetXY($x, $y+30);
            $pdf->Cell(20, 10, '', '', 0, 'L');
            $pdf->SetFont('times', '', 10); 
            $pdf->SetXY($x+20, $y+10);
            $pdf->multicell(197, 7.5, $sepc_data->item_description, 'T', 'L');
            $pdf->SetFont('times', 'B', 10); 
            //For Property Number
            $pdf->SetXY($x+217, $y+10);
            $pdf->Cell(60, 30, $sepc_data->property_no, '', 0, 'C');
            $pdf->SetXY($x, $y+40);
            $pdf->Cell(20, 10, 'Date', 'TRB', 0, 'C');
            $pdf->SetXY($x+20, $y+40);
            $pdf->Cell(30, 10, 'Reference/ICS No.', 'TRB', 0, 'C');

            $pdf->SetXY($x+50, $y+40);
            $pdf->Cell(72, 5, 'Receipt', 'RTB', 0, 'C');
            $pdf->SetXY($x+50, $y+45);
            $pdf->Cell(15, 5, 'Qty', 'BR', 0, 'C');
            $pdf->SetXY($x+65, $y+45);
            $pdf->Cell(25, 5, 'Unit Cost', 'B', 0, 'C');
            $pdf->SetXY($x+90, $y+45);
            $pdf->Cell(32, 5, 'Total Cost', 'LBR', 0, 'C');

            $pdf->SetXY($x+122, $y+40);
            $pdf->Cell(75, 5, 'Issue/Transfer/ Disposal', 'RTB', 0, 'C');
            $pdf->SetXY($x+122, $y+45);
            $pdf->Cell(13, 5, 'Qty', 'BR', 0, 'C');
            $pdf->SetXY($x+135, $y+45);
            $pdf->Cell(62, 5, 'Office/Officer', 'LTBR', 0, 'C');
            

            $pdf->SetXY($x+197, $y+40);
            $pdf->Cell(20, 5, 'Balance', 'TBR', 0, 'C');
            $pdf->SetXY($x+197, $y+45);
            $pdf->Cell(20, 5, 'Qty', 'BR', 0, 'C');
            $pdf->SetXY($x+217, $y+40);
            $pdf->Cell(25, 10, 'Amount ', 'TB', 0, 'C');
            $pdf->SetXY($x+242, $y+40);
            $pdf->multicell(35, 5, 'Remarks / Estimated Useful Life ', 'TBL', 'C');


            foreach ($Datas as $Data) {
                if ($pdf->GetY() + 10 > $pdf->GetPageHeight() - $pdf->getBottomMargin()) {
                    $pdf->AddPage();
                    $y = $pdf->getTopMargin() - 30;
                }
                $pdf->SetFont('times', '', 10); 
                                
                $pdf->SetXY($x, $y+50);
                $pdf->multicell(20, 10, $Data->date, 'B','C');
            
                $pdf->SetXY($x+20, $y+50);
                $pdf->multicell(30, 10, $Data->ics_no, 'B','C');
            
                $pdf->SetXY($x+50, $y+50);
                $pdf->multicell(15, 10, $Data->quantity, 'B','C');
            
                $pdf->SetXY($x+65, $y+50);
                $pdf->multicell(25, 10, $Data->unit_cost, 'B','C');
            
                $pdf->SetXY($x+90, $y+50);
                $pdf->multicell(32, 10, $Data->total_unit_cost, 'B','C');
            
                $pdf->SetXY($x+122, $y+50);
                $pdf->multicell(13, 10, $Data->issued_quantity, 'B','C');
            
                $pdf->SetXY($x+135, $y+50);
                $pdf->multicell(62, 10, $Data->assignee, 'B', 'C');
                            
                $pdf->SetXY($x+197, $y+50);
                $pdf->multicell(20, 10, $Data->balance_quantity, 'B', 'C');
            
                $pdf->SetXY($x+217, $y+50);
                $pdf->multicell(25, 10, $Data->issued_quantity * $Data->unit_cost , 'B','C');
            
                $pdf->SetXY($x+242, $y+50);
                $pdf->multicell(35, 10, $Data->useful_life, 'B', 'C');
                
                // Increment $y for the next row
                $y += 10; // Adjust as needed
            }
            
            $pdf->Output(); 
    }
}

class PDF extends FPDF
{
    private $topMargin; // Store the top margin
    function Header()
    {
        $this->SetFont('times', 'I', 12);
        $this->Cell(0, 10, 'Appendix 69', 0, 1, 'R');
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('times', '', 10);
        $this->Cell(0, 10, '', 0, 0, 'C');
    }

    function __construct()
    {
        parent::__construct('L', 'mm', 'A4'); // 'L' for landscape orientation, 'A4' for paper size
    }
    // Method to retrieve the top margin
    function getTopMargin() {
        return $this->topMargin;
    }
    function getBottomMargin() {
        return $this->bMargin;
    }

}

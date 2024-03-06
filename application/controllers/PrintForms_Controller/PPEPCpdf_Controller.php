<?php
defined('BASEPATH') or exit('No direct script access allowed');
require('assets/fpdf/fpdf.php');

class PPEPCpdf_Controller extends CI_Controller
{
    public function PPEPCform($po_id)
    {
       
    $ppepc_data = $this->Fpdf_Model->fetchPPEPCDataByPOID($po_id);
    $Datas = $this->Fpdf_Model->fetchPPEPCDataResult($po_id);
    
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
            $pdf->Cell(62, 8, $ppepc_data->par_fund, 'B', 1, 'L');

            $pdf->SetFont('times', '', 10);

            $x = $pdf->GetX();
            $y = $pdf->GetY() + 3; 

            $contentWidth = 277;
            $contentHeight = 157;
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
            $pdf->multicell(197, 7.5, $ppepc_data->item_description, 'T', 'L');
            $pdf->SetFont('times', 'B', 10); 
            //For Property Number
            $pdf->SetXY($x+217, $y+10);
            $pdf->Cell(60, 30, $ppepc_data->property_no, '', 0, 'C');
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
                $pdf->SetFont('times', '', 10); 
                                
                $pdf->SetXY($x, $y+50);
                $pdf->multicell(20, 10, $Data->date, 'B','C');
            
                $pdf->SetXY($x+20, $y+50);
                $pdf->multicell(30, 10, $Data->par_no, 'B','C');
            
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
            
               

            //Line
            $pdf->Line(30, 98, 30, 205);
            $pdf->Line(60, 98, 60, 205);
            $pdf->Line(75, 98, 75, 205);
            $pdf->Line(100, 98, 100, 205);
            $pdf->Line(132, 98, 132, 205);
            $pdf->Line(145, 98, 145, 205);
            $pdf->Line(207, 98, 207, 205);
            $pdf->Line(227, 58, 227, 205);
            $pdf->Line(252, 98, 252, 205);
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
        $this->Cell(0, 10, '', 0, 0, 'C');
    }

    function __construct()
    {
        parent::__construct('L', 'mm', 'A4'); // 'L' for landscape orientation, 'A4' for paper size
    }
}

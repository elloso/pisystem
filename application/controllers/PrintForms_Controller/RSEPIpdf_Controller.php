<?php
defined('BASEPATH') or exit('No direct script access allowed');
require('assets/fpdf/fpdf.php');

class RSEPIpdf_Controller extends CI_Controller
{
    public function RSEPIform()
    {

        $Property = $this->input->post('PropertyDropdown');
        $PropertyYear = $this->input->post('YearDropdown');
        $RegSPIDatas = $this->Fpdf_Model->regspi_item($Property,$PropertyYear);
       

        $pdf = new PDF();
            $pdf->AddPage();
            $pdf->SetFont('times', 'B', 12);
            $pdf->setLineWidth(0.4);
            $pdf->Cell(0, 10, 'REGISTRY OF SEMI-EXPENDABLE PROPERTY ISSUED', 0, 1, 'C');
            $pdf->Ln(7);
            $pdf->SetFont('times', 'B', 10);
            $pdf->Cell(22, 10, 'Entity Name:', '', 0, 'L');
            $pdf->SetFont('times', '', 10);
            $pdf->Cell(80, 8, 'SOUTHERN LUZON STATE UNIVERSITY', 'B', 0, 'L');
            $pdf->SetFont('times', '', 10);
            $pdf->Cell(85, 10, '', '', 0, 'C');
            $pdf->SetFont('times', 'B', 10);
            $pdf->Cell(28, 10, 'Fund Cluster:', '', 0, 'R');
            $pdf->SetFont('times', '', 10);
            $pdf->Cell(62, 8, ' RF MOOE/ STF', 'B', 1, 'L');
            $pdf->Ln(0);
            
            $pdf->SetFont('times', 'B', 10);
            $pdf->Cell(43, 10, 'Semi-expendable Property:', '', 0, 'L');
            $pdf->SetFont('times', '', 10);
            $pdf->Cell(59, 8, $Property, 'B', 0, 'C');
            $pdf->SetFont('times', '', 10);
            $pdf->Cell(85, 10, '', '', 1, 'C');
            $pdf->SetFont('times', '', 8);
            
            $x = $pdf->GetX();
            $y = $pdf->GetY() + 3; 

            $contentWidth = 277;
            $contentHeight = 110;
            $pdf->Rect($x, $y, $contentWidth, $contentHeight);

            $pdf->SetXY($x, $y); 
            $pdf->Cell(15, 14, 'Date', 'RB', 0, 'C');
            $pdf->SetXY($x + 15, $y); 
            $pdf->Cell(40, 4, 'Reference', 'B', 0, 'C');
            $pdf->SetXY($x + 15, $y+4); 
            $pdf->MultiCell(18, 5, 'ICS/RSSP No.', 'RB', 'C');
            $pdf->SetXY($x + 33, $y+4); 
            $pdf->MultiCell(22, 5, 'Semi-expendable Property No.', 'B', 'C');
            $pdf->SetXY($x + 55, $y); 
            $pdf->Cell(55, 14, 'Item Description', 'LB', 0, 'C');
            $pdf->SetXY($x + 110, $y); 
            $pdf->MultiCell(15, 7, 'Estimated Useful Life', 'LB', 'C');

            $pdf->SetXY($x + 125, $y); 
            $pdf->Cell(30, 4, 'Issued', 'L', 0, 'C');
            $pdf->SetXY($x + 125, $y+4); 
            $pdf->MultiCell(8, 10, 'Qty.', 'LTB', 'C');
            $pdf->SetXY($x + 133, $y+4); 
            $pdf->MultiCell(22, 10, 'Office/Officer', 'TLB', 'C');
            $pdf->SetXY($x + 50, $y); 

            $pdf->SetXY($x + 155, $y); 
            $pdf->Cell(30, 4, 'Returned', 'RL', 0, 'C');
            $pdf->SetXY($x + 155, $y+4); 
            $pdf->MultiCell(8, 10, 'Qty.', 'LTB', 'C');
            $pdf->SetXY($x + 163, $y+4); 
            $pdf->MultiCell(22, 10, 'Office/Officer', 'LTB', 'C');
            $pdf->SetXY($x + 50, $y); 

            $pdf->SetXY($x + 185, $y); 
            $pdf->Cell(30, 4, 'Re-Issued', 'BR', 0, 'C');
            $pdf->SetXY($x + 185, $y+4); 
            $pdf->MultiCell(10, 10, 'Qty.', 'LRB', 'C');
            $pdf->SetXY($x + 195, $y+4); 
            $pdf->MultiCell(20, 10, 'Office/Officer', 'BR', 'C');
            $pdf->SetXY($x + 50, $y); 

            $pdf->SetXY($x + 215, $y); 
            $pdf->Cell(14, 4, 'Disposed', 'RB', 0, 'C');
            $pdf->SetXY($x + 215, $y+4); 
            $pdf->Cell(14, 10, 'Qty.', 'RB', 0, 'C');
            $pdf->SetXY($x + 229, $y); 
            $pdf->Cell(14, 4, 'Balance', 'RB', 0, 'C');
            $pdf->SetXY($x + 229, $y+4); 
            $pdf->Cell(14, 10, 'Qty.', 'RB', 0, 'C');

            $pdf->SetXY($x + 243, $y); 
            $pdf->Cell(17, 14, 'Amount', 'RB', 0, 'C');

            $pdf->SetXY($x + 260, $y); 
            $pdf->Cell(17, 14, 'Remarks', 'B', 0, 'C');

            $pdf->Line(25, 186, 25, 90);
            $pdf->Line(43, 186, 43, 90);
            $pdf->Line(65, 186, 65, 90);
            $pdf->Line(120, 186, 120, 90);
            $pdf->Line(135, 186, 135, 90);
            $pdf->Line(143, 186, 143, 90);
            $pdf->Line(165, 186, 165, 90);
            $pdf->Line(173, 186, 173, 90);
            $pdf->Line(195, 186, 195, 90);
            $pdf->Line(205, 186, 205, 90);
            $pdf->Line(225, 186, 225, 90);
            $pdf->Line(239, 186, 239, 90);
            $pdf->Line(253, 186, 253, 90);
            $pdf->Line(270, 186, 270, 90);

            foreach($RegSPIDatas as $Data){
                $Total = $Data->issued_quantity * $Data->unit_cost;
                $totalUnitCost = number_format($Total, 2);
              
                $pdf->SetXY($x, $y);

                $descriptionWidth = 55;
                $descriptionText = '* ' . $Data->item_description;
                $descriptionLines = ceil($pdf->GetStringWidth($descriptionText) / $descriptionWidth);
                $descriptionHeight = 6 * $descriptionLines;

                if ($y + $descriptionHeight > 170) {
                    $pdf->AddPage();
                    $y = 15; 
                    $pdf->SetFont('times', 'B', 12);
                    $pdf->setLineWidth(0.4);
                    $pdf->Cell(0, 10, 'REGISTRY OF SEMI-EXPENDABLE PROPERTY ISSUED', 0, 1, 'C');
                    $pdf->Ln(7);
                    $pdf->SetFont('times', 'B', 10);
                    $pdf->Cell(22, 10, 'Entity Name:', '', 0, 'L');
                    $pdf->SetFont('times', '', 10);
                    $pdf->Cell(80, 8, 'SOUTHERN LUZON STATE UNIVERSITY', 'B', 0, 'L');
                    $pdf->SetFont('times', '', 10);
                    $pdf->Cell(85, 10, '', '', 0, 'C');
                    $pdf->SetFont('times', 'B', 10);
                    $pdf->Cell(28, 10, 'Fund Cluster:', '', 0, 'R');
                    $pdf->SetFont('times', '', 10);
                    $pdf->Cell(62, 8, ' RF MOOE/ STF', 'B', 1, 'L');
                    $pdf->Ln(0);
                    
                    $pdf->SetFont('times', 'B', 10);
                    $pdf->Cell(43, 10, 'Semi-expendable Property:', '', 0, 'L');
                    $pdf->SetFont('times', '', 10);
                    $pdf->Cell(59, 10, '', 'B', 0, 'C');
                    $pdf->SetFont('times', '', 10);
                    $pdf->Cell(85, 10, '', '', 1, 'C');
        
                    $pdf->SetFont('times', '', 8);
                    
                    $x = $pdf->GetX();
                    $y = $pdf->GetY() + 3; 
        
                    $contentWidth = 277;
                    $contentHeight = 110;
                    $pdf->Rect($x, $y, $contentWidth, $contentHeight);
        
                    $pdf->SetXY($x, $y); 
                    $pdf->Cell(15, 14, 'Date', 'RB', 0, 'C');
                    $pdf->SetXY($x + 15, $y); 
                    $pdf->Cell(40, 4, 'Reference', 'B', 0, 'C');
                    $pdf->SetXY($x + 15, $y+4); 
                    $pdf->MultiCell(18, 5, 'ICS/RSSP No.', 'RB', 'C');
                    $pdf->SetXY($x + 33, $y+4); 
                    $pdf->MultiCell(22, 5, 'Semi-expendable Property No.', 'B', 'C');
                    $pdf->SetXY($x + 55, $y); 
                    $pdf->Cell(55, 14, 'Item Description', 'LB', 0, 'C');
                    $pdf->SetXY($x + 110, $y); 
                    $pdf->MultiCell(15, 7, 'Estimated Useful Life', 'LB', 'C');
        
                    $pdf->SetXY($x + 125, $y); 
                    $pdf->Cell(30, 4, 'Issued', 'L', 0, 'C');
                    $pdf->SetXY($x + 125, $y+4); 
                    $pdf->MultiCell(8, 10, 'Qty.', 'LTB', 'C');
                    $pdf->SetXY($x + 133, $y+4); 
                    $pdf->MultiCell(22, 10, 'Office/Officer', 'TLB', 'C');
                    $pdf->SetXY($x + 50, $y); 
        
                    $pdf->SetXY($x + 155, $y); 
                    $pdf->Cell(30, 4, 'Returned', 'RL', 0, 'C');
                    $pdf->SetXY($x + 155, $y+4); 
                    $pdf->MultiCell(8, 10, 'Qty.', 'LTB', 'C');
                    $pdf->SetXY($x + 163, $y+4); 
                    $pdf->MultiCell(22, 10, 'Office/Officer', 'LTB', 'C');
                    $pdf->SetXY($x + 50, $y); 
        
                    $pdf->SetXY($x + 185, $y); 
                    $pdf->Cell(30, 4, 'Re-Issued', 'BR', 0, 'C');
                    $pdf->SetXY($x + 185, $y+4); 
                    $pdf->MultiCell(10, 10, 'Qty.', 'LRB', 'C');
                    $pdf->SetXY($x + 195, $y+4); 
                    $pdf->MultiCell(20, 10, 'Office/Officer', 'BR', 'C');
                    $pdf->SetXY($x + 50, $y); 
        
                    $pdf->SetXY($x + 215, $y); 
                    $pdf->Cell(14, 4, 'Disposed', 'RB', 0, 'C');
                    $pdf->SetXY($x + 215, $y+4); 
                    $pdf->Cell(14, 10, 'Qty.', 'RB', 0, 'C');
                    $pdf->SetXY($x + 229, $y); 
                    $pdf->Cell(14, 4, 'Balance', 'RB', 0, 'C');
                    $pdf->SetXY($x + 229, $y+4); 
                    $pdf->Cell(14, 10, 'Qty.', 'RB', 0, 'C');
        
                    $pdf->SetXY($x + 243, $y); 
                    $pdf->Cell(17, 14, 'Amount', 'RB', 0, 'C');
        
                    $pdf->SetXY($x + 260, $y); 
                    $pdf->Cell(17, 14, 'Remarks', 'B', 0, 'C');
        
                    $pdf->Line(25, 186, 25, 90);
                    $pdf->Line(43, 186, 43, 90);
                    $pdf->Line(65, 186, 65, 90);
                    $pdf->Line(120, 186, 120, 90);
                    $pdf->Line(135, 186, 135, 90);
                    $pdf->Line(143, 186, 143, 90);
                    $pdf->Line(165, 186, 165, 90);
                    $pdf->Line(173, 186, 173, 90);
                    $pdf->Line(195, 186, 195, 90);
                    $pdf->Line(205, 186, 205, 90);
                    $pdf->Line(225, 186, 225, 90);
                    $pdf->Line(239, 186, 239, 90);
                    $pdf->Line(253, 186, 253, 90);
                    $pdf->Line(270, 186, 270, 90);
        
                }

                $pdf->SetFont('times', '', 7);
                $pdf->SetXY($x, $y + 14); 
                $pdf->multicell(15, 6, $Data->invoice_date, '','C'); 
                $pdf->SetFont('times', '', 8);
                $pdf->SetXY($x+15, $y + 14); 
                $pdf->multicell(18, 6, $Data->ics_no, '','C'); 
                $pdf->SetXY($x+33, $y + 14); 
                $pdf->multicell(23, 6, $Data->quantity_property_no, '','C'); 
                $pdf->SetXY($x+55, $y + 14); 
                $pdf->multicell($descriptionWidth, 5, $descriptionText, '','L'); 
                $pdf->SetXY($x+110, $y + 14); 
                $pdf->multicell(15, 6, $Data->useful_life, '','C'); 
                $pdf->SetXY($x+125, $y + 14); 
                $pdf->multicell(8, 6, $Data->issued_quantity, '','C'); 
                $pdf->SetXY($x+133, $y + 14); 
                $pdf->multicell(22, 6, $Data->assignee, '','C'); 


                $pdf->SetXY($x+229, $y + 14); 
                $pdf->multicell(14, 6, $Data->issued_quantity, '','C');
                $pdf->SetXY($x+243, $y + 14); 
                $pdf->multicell(17, 6, $totalUnitCost , '','C');  
                $pdf->SetFont('times', '', 7);
                $pdf->SetXY($x+260, $y + 14); 
                $pdf->multicell(17, 6, $Data->remarksFC , '','C');  

                $y += max(9, $descriptionHeight);
 
            }
            $pdf->Output(); 
    }
}

class PDF extends FPDF
{
    function Header()
    {
        $imagePath = 'assets/img/slsu/slsu_logo.png'; 
        $this->Image($imagePath, $this->GetX() + 4, $this->GetY(), 25);
        $this->SetFont('times', 'I', 12);
        $this->Cell(0, 10, 'Annex A.4', 0, 1, 'R');
        $this->SetFont('times', 'B', 12);
        $this->Cell(0, 6, 'Republic of the Philippines', 0, 1, 'C');
        $this->Cell(0, 6, 'SOUTHERN  LUZON STATE  UNIVERSITY', 0, 1, 'C');
        $this->Cell(0, 6, 'Lucban, Quezon', 0, 1, 'C');
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

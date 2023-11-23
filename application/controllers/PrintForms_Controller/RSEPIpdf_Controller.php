<?php
defined('BASEPATH') or exit('No direct script access allowed');
require('assets/fpdf/fpdf.php');

class RSEPIpdf_Controller extends CI_Controller
{
    public function RSEPIform($po_id,$id_tblpo_item)
    {
        $actual_po_id = $po_id;
        $actual_id_tblpo_item = $id_tblpo_item;
        $Datas = $this->Fpdf_Model->DataRSEPI($actual_po_id,$actual_id_tblpo_item);
        $pdf = new PDF();
            $pdf->AddPage();
            $pdf->SetFont('times', 'B', 12);
            $pdf->setLineWidth(0.4);
            $pdf->Cell(0, 10, 'REGISTRY OF SEMI-EXPENDABLE PROPERTY ISSUED', 0, 1, 'C');
            $pdf->Ln(7);
            $pdf->SetFont('times', 'B', 10);
            $pdf->Cell(22, 10, 'Entity Name:', '', 0, 'L');
            $pdf->SetFont('times', '', 10);
            $pdf->Cell(80, 10, 'SOUTHERN LUZON STATE UNIVERSITY', 'B', 0, 'L');
            $pdf->SetFont('times', '', 10);
            $pdf->Cell(85, 10, '', '', 0, 'C');
            $pdf->SetFont('times', 'B', 10);
            $pdf->Cell(28, 10, 'Fund Cluster:', '', 0, 'R');
            $pdf->SetFont('times', '', 10);
            $pdf->Cell(62, 10, '', 'B', 1, 'L');
            $pdf->Ln(0);
            $pdf->SetFont('times', 'B', 10);
            $pdf->Cell(43, 10, 'Semi-expendable Property:', '', 0, 'L');
            $pdf->SetFont('times', '', 10);
            $pdf->Cell(59, 10, '', 'B', 0, 'C');
            $pdf->SetFont('times', '', 10);
            $pdf->Cell(85, 10, '', '', 0, 'C');
            $pdf->SetFont('times', 'B', 10);
            $pdf->Cell(28, 10, 'Sheet No.:', '', 0, 'R');
            $pdf->SetFont('times', '', 10);
            $pdf->Cell(62, 10, '', 'B', 1, 'L');

            $pdf->SetFont('times', '', 8);
            
            $x = $pdf->GetX();
            $y = $pdf->GetY() + 3; 

            $contentWidth = 277;
            $contentHeight = 14;
            $pdf->Rect($x, $y, $contentWidth, $contentHeight);

            $pdf->SetXY($x, $y); 
            $pdf->Cell(15, 14, 'Date', 'R', 0, 'C');
            $pdf->SetXY($x + 15, $y); 
            $pdf->Cell(45, 4, 'Reference', 'B', 0, 'C');
            $pdf->SetXY($x + 15, $y+4); 
            $pdf->MultiCell(18, 5, 'ICS/RSSP No.', 'R', 'C');
            $pdf->SetXY($x + 33, $y+4); 
            $pdf->MultiCell(27, 5, 'Semi-expendable Property No.', '', 'C');
            $pdf->SetXY($x + 60, $y); 
            $pdf->Cell(50, 14, 'Item Description', 'L', 0, 'C');
            $pdf->SetXY($x + 110, $y); 
            $pdf->MultiCell(15, 7, 'Estimated Useful Life', 'L', 'C');

            $pdf->SetXY($x + 125, $y); 
            $pdf->Cell(30, 4, 'Issued', 'L', 0, 'C');
            $pdf->SetXY($x + 125, $y+4); 
            $pdf->MultiCell(8, 10, 'Qty.', 'LT', 'C');
            $pdf->SetXY($x + 133, $y+4); 
            $pdf->MultiCell(22, 10, 'Office/Officer', 'TL', 'C');
            $pdf->SetXY($x + 50, $y); 

            $pdf->SetXY($x + 155, $y); 
            $pdf->Cell(30, 4, 'Returned', 'RL', 0, 'C');
            $pdf->SetXY($x + 155, $y+4); 
            $pdf->MultiCell(8, 10, 'Qty.', 'LT', 'C');
            $pdf->SetXY($x + 163, $y+4); 
            $pdf->MultiCell(22, 10, 'Office/Officer', 'LT', 'C');
            $pdf->SetXY($x + 50, $y); 

            
            $pdf->SetXY($x + 185, $y); 
            $pdf->Cell(30, 4, 'Re-Issued', 'BR', 0, 'C');
            $pdf->SetXY($x + 185, $y+4); 
            $pdf->MultiCell(10, 10, 'Qty.', 'LR', 'C');
            $pdf->SetXY($x + 193, $y+4); 
            $pdf->MultiCell(22, 10, 'Office/Officer', 'R', 'C');
            $pdf->SetXY($x + 50, $y); 

            $pdf->SetXY($x + 215, $y); 
            $pdf->Cell(14, 4, 'Disposed', 'RB', 0, 'C');
            $pdf->SetXY($x + 215, $y+4); 
            $pdf->Cell(14, 10, 'Qty.', 'R', 0, 'C');
            $pdf->SetXY($x + 229, $y); 
            $pdf->Cell(14, 4, 'Balance', 'RB', 0, 'C');
            $pdf->SetXY($x + 229, $y+4); 
            $pdf->Cell(14, 10, 'Qty.', 'R', 0, 'C');

            $pdf->SetXY($x + 243, $y); 
            $pdf->Cell(17, 14, 'Amount', 'R', 0, 'C');

            $pdf->SetXY($x + 260, $y); 
            $pdf->Cell(17, 14, 'Remarks', '', 0, 'C');

            foreach ($Datas as $Data) {
                $pdf->SetFont('times', '', 6);
                $pdf->SetXY($x, $y + 14); 
                $pdf->Cell(15, 5, $Data->date_acquired, 'LBR', 0, 'C'); // Use Cell instead of MultiCell
                $y += 5; // Increment Y coordinate for the next iteration

                $pdf->SetXY($x + 15, $y + 9); 
                $pdf->Cell(18, 5, $Data->ics_no, 'RB', 0, 'C'); // Use Cell instead of MultiCell
                
                $pdf->SetXY($x + 33, $y + 9); 
                $pdf->Cell(27, 5, $Data->rsepi_property_no, 'BR', 0, 'C'); // Use Cell instead of MultiCell

                $pdf->SetXY($x + 60, $y + 9); 
                $pdf->Cell(50, 5, $Data->item_description, 'BR', 0, 'L'); // Use Cell instead of MultiCell
                
                $pdf->SetXY($x + 110, $y + 9); 
                $pdf->Cell(15, 5, $Data->useful_life, 'RB', 0, 'C'); // Use Cell instead of MultiCell

                $pdf->SetXY($x + 125, $y + 9); 
                $pdf->Cell(8, 5, '', 'BR', 0, 'C'); // Use Cell instead of MultiCell

                $pdf->SetXY($x + 133, $y + 9); 
                $pdf->Cell(22, 5, $Data->ics_receivedby, 'BR', 0, 'C'); // Use Cell instead of MultiCell

                $pdf->SetXY($x + 155, $y + 9); 
                $pdf->Cell(8, 5, '', 'RB', 0, 'C'); // Use Cell instead of MultiCell
                
                $pdf->SetXY($x + 163, $y + 9); 
                $pdf->Cell(22, 5, $Data->returned, 'BR', 0, 'C'); // Use Cell instead of MultiCell

                $pdf->SetXY($x + 185, $y + 9); 
                $pdf->Cell(10, 5, '', 'BR', 0, 'C'); // Use Cell instead of MultiCell

                $pdf->SetXY($x + 195, $y + 9); 
                $pdf->Cell(20, 5, $Data->reissued, 'BR', 0, 'C'); // Use Cell instead of MultiCell

                $pdf->SetXY($x + 215, $y + 9); 
                $pdf->Cell(14, 5, '', 'BR', 0, 'C'); // Use Cell instead of MultiCell

                $pdf->SetXY($x + 229, $y + 9); 
                $pdf->Cell(14, 5, '', 'BR', 0, 'C'); // Use Cell instead of MultiCell
                
                $pdf->SetXY($x + 243, $y + 9); 
                $pdf->Cell(17, 5, $Data->unit_cost, 'BR', 0, 'C'); // Use Cell instead of MultiCell

                $pdf->SetXY($x + 260, $y + 9); 
                $pdf->Cell(17, 5, $Data->remarks, 'BR', 0, 'C'); // Use Cell instead of MultiCell
                

            }
            
            
            
            
           
            

            

        

            
            $pdf->SetFont('times', '', 9);
            $pdf->Output(); 

        
    }
}

class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('times', 'I', 12);
        $this->Cell(0, 10, 'Annex A.4', 0, 1, 'R');
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

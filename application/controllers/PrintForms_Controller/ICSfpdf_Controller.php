<?php
defined('BASEPATH') or exit('No direct script access allowed');
require('assets/fpdf/fpdf.php');
class ICSfpdf_Controller extends CI_Controller
{
    public function ICSform($icsForm)
    {
        $pdf = new PDF();
        $ics_form = $this->Fpdf_Model->ics_form($icsForm);
        $po_items = $this->Fpdf_Model->ics_item($icsForm);
        $pdf->AddPage();
        $pdf->SetFont('times', 'B', 14);
        $pdf->Cell(0, 10, '', 0, 1, 'C');
        $pdf->Cell(0, 6, 'INVENTORY CUSTODIAN SLIP', 0, 1, 'C');
        $pdf->Cell(0, 10, '', 0, 1, 'C');

        $x = $pdf->GetX();
        $y = $pdf->GetY(); 
        $contentWidth = 190;
        $contentHeight = 220;
        $pdf->Rect($x, $y, $contentWidth, $contentHeight);

        $pdf->SetFont('times', '', 10);
        $pdf->Cell(30, 10, 'Supplier :', 'BR', 0, 'L');
        $pdf->SetFont('times', 'B', 10);
        $pdf->Cell(100, 10, $ics_form->supplier, 'BR', 0, 'L');
        $pdf->SetFont('times', '', 10);
        $pdf->Cell(30, 10, 'ICS No. :', 'BR', 0, 'C');
        $pdf->SetFont('times', 'B', 10);
        $pdf->Cell(30, 10, $ics_form->ics_no, 'B', 1, 'C');

        $pdf->SetFont('times', '', 10);
        $pdf->Cell(30, 10, 'Fund Cluster :', 'BR', 0, 'L');
        $pdf->SetFont('times', 'B', 10);
        $pdf->Cell(100, 10, $ics_form->ics_fund, 'BR', 0, 'L');
        $pdf->SetFont('times', '', 10);
        $pdf->Cell(30, 10, 'IAR No. :', 'BR', 0, 'C');
        $pdf->SetFont('times', 'B', 10);
        $pdf->Cell(30, 10, $ics_form->ics_iar_no, 'B', 1, 'C');

        $pdf->Cell(30, 10, '', 'BR', 0, 'L');
        $pdf->Cell(100, 10, '', 'BR', 0, 'L');
        $pdf->SetFont('times', '', 10);
        $pdf->Cell(30, 10, 'PO No. :', 'BR', 0, 'C');
        $pdf->SetFont('times', 'B', 10);
        $pdf->Cell(30, 10, $ics_form->po_number, 'B', 1, 'C');

        $pdf->Cell(15, 10, 'Qty', 'BR', 0, 'C');    
        $pdf->Cell(15, 10, 'Unit', 'BR', 0, 'C');   
        $pdf->Cell(65, 10, 'Description', 'BR', 0, 'C');  

        $pdf->Cell(35, 5, 'Amount', 'BR', 0, 'C'); 
        $pdf->SetXY($x + 95 , $y + 35); 
        $pdf->Cell(17, 5, 'Unit', 'BR', 0, 'C'); 
        $pdf->SetXY($x + 112 , $y + 35);
        $pdf->Cell(18, 5, 'Price', 'BR', 0, 'C'); 
        $pdf->SetXY($x + 130 , $y + 30);
        $pdf->Multicell(30, 5, 'Inventory Item No.', 'BR',  'C');
        $pdf->SetXY($x + 160 , $y + 30);
        $pdf->Multicell(30, 5, 'Estimated Useful Life', 'BR',  'C');

        $pdf->SetXY($x, $y + 170); 
        $pdf->Cell(95, 10, '', 'T', 0, 'L');
        $pdf->Cell(95, 10, '', 'T', 0, 'L');

        $pdf->SetFont('times', '', 10);
        $pdf->SetXY($x, $y + 170); 
        $pdf->Cell(30, 7, 'Received from :', '', 0, 'L');
        $pdf->Cell(55, 7, '', '', 0, 'C');
        $pdf->Cell(10, 7, '', '', 0, 'L');

        $pdf->Cell(30, 7, 'Received by :', '', 0, 'L');
        $pdf->Cell(55, 7, '', '', 0, 'C');
        $pdf->Cell(10, 7, '', '', 0, 'L');

        $pdf->SetXY($x + 22, $y + 182); 
        $pdf->SetFont('times', 'B', 10);
        $pdf->Cell(60, 5, $ics_form->ics_receivedfrom, 'B',0, 'C');
        $pdf->SetFont('times', '', 10);
        $pdf->SetXY($x + 22, $y + 188); 
        $pdf->Cell(60, 5, 'Supply and/or Property Custodian', '',0, 'C');
        $pdf->SetFont('times', 'I', 10);
        $pdf->SetXY($x + 22, $y + 193); 
        $pdf->Cell(60, 5, 'HEAD,  Supply and Property  Custodian ', '',0, 'C');
        $pdf->SetFont('times', '', 10);
        $pdf->SetXY($x + 22, $y + 198); 
        $pdf->Cell(60, 5, 'Position/Office', '',0, 'C');
        $pdf->SetXY($x + 32, $y + 202); 
        $pdf->Cell(40, 5, $ics_form->ics_receivedfrom_date, 'B',0, 'C');
        $pdf->SetXY($x + 22, $y + 207); 
        $pdf->Cell(60, 5, 'Date', '',0, 'C');

        $pdf->SetXY($x + 120, $y + 182); 
        $pdf->SetFont('times', 'B', 10);
        $pdf->Cell(60, 5,  $ics_form->ics_receivedby, 'B',0, 'C');
        $pdf->SetFont('times', '', 10);
        $pdf->SetXY($x + 120, $y + 188); 
        $pdf->Cell(60, 5, 'Signature Over Printed Name of End-User', '',0, 'C');
        $pdf->SetXY($x + 120, $y + 193); 
        $pdf->SetFont('times', 'I', 10);
        $pdf->Cell(60, 5, $ics_form->ics_position, '',0, 'C');
        $pdf->SetFont('times', '', 10);
        $pdf->SetXY($x + 120, $y + 198); 
        $pdf->Cell(60, 5, 'Position/Office', '',0, 'C');
        $pdf->SetXY($x + 130, $y + 202); 
        $pdf->Cell(40, 5, $ics_form->ics_received_date, 'B',0, 'C');
        $pdf->SetXY($x + 120, $y + 207); 
        $pdf->Cell(60, 5, 'Date', '',0, 'C');

        $pdf->SetFont('times', '', 10);
        $pdf->SetXY($x + 95 , $y + 165); 
        $pdf->Cell(17, 5, 'Total', 'T', 0, 'C');
        
        $pdf->SetXY($x + 112 , $y + 165);
        $formattedtotal_cost = number_format($ics_form->total_cost, 2);
        $pdf->Cell(18, 5, $formattedtotal_cost , 'T', 0, 'C');  
       
        foreach ($po_items as $item) {
            $pdf->SetXY($x, $y);
        
            $descriptionWidth = 65;
            $descriptionText = '* ' . $item->item_description;
            $descriptionLines = ceil($pdf->GetStringWidth($descriptionText) / $descriptionWidth);
            $descriptionHeight = 7 * $descriptionLines;

            $UnitCost = number_format($item->unit_cost, 2);
            $totalUnitCost = number_format($item->total_unit_cost, 2);
        
            $propertyNoWidth = 30 * ($descriptionWidth / 80); 
            $pdf->SetFont('times', '', 10);
            $pdf->SetXY(5, $y + 40); 
            $pdf->MultiCell($propertyNoWidth, 6, $item->quantity, 0, 'C');

            $pdf->SetXY(20, $y + 40); 
            $pdf->MultiCell($propertyNoWidth, 6, $item->unit, 0, 'C');

            $pdf->SetXY(101, $y + 40); 
            $pdf->MultiCell($propertyNoWidth, 6, $UnitCost, 0, 'C');

            $pdf->SetXY(119, $y + 40); 
            $pdf->MultiCell($propertyNoWidth, 6, $totalUnitCost, 0, 'C');
        
            $pdf->SetXY(143, $y + 40); 
            $pdf->MultiCell($propertyNoWidth, 6, $item->property_no, 0, 'C');

            $pdf->SetXY(174, $y + 40); 
            $pdf->MultiCell($propertyNoWidth, 6, $item->useful_life, 0, 'C');
        
            $pdf->SetXY(40, $y + 40);
            $pdf->MultiCell($descriptionWidth, 6, $descriptionText, 0, 'L');
        
            $y += max(8, $descriptionHeight);
        }
        

        //Line
        $pdf->Line(25, 104, 25, 234);
        $pdf->Line(40, 104, 40, 234);
        $pdf->Line(105, 104, 105, 284);
        $pdf->Line(122, 104, 122, 234);
        $pdf->Line(140, 104, 140, 234);
        $pdf->Line(170, 104, 170, 234);

    


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
        $this->Cell(0, 10, 'Appendix 59', 0, 1, 'R');
        $this->SetFont('times', 'B', 12);
        $this->Cell(0, 6, 'Republic of the Philippines', 0, 1, 'C');
        $this->Cell(0, 6, 'SOUTHERN  LUZON STATE  UNIVERSITY', 0, 1, 'C');
        $this->Cell(0, 6, 'Lucban, Quezon', 0, 1, 'C');
    }
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', '', 8);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(0, 10, 'AFA-SAP-1.01F2 Inventory Custodian Slip', 0, 0, 'L');
    }
}

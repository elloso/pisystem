<?php
defined('BASEPATH') or exit('No direct script access allowed');
require('assets/fpdf/fpdf.php');
class PARfpdf_Controller extends CI_Controller
{
    public function PARform($parForm)
    {
        $pdf = new PDF();
        $par_form = $this->Fpdf_Model->par_form($parForm);
        $po_items = $this->Fpdf_Model->par_item($parForm);
        $pdf->AddPage();
        $pdf->SetFont('times', 'B', 14);
        $pdf->Cell(0, 10, '', 0, 1, 'C');
        $pdf->Cell(0, 6, 'PROPERTY ACKNOWLEDGEMENT RECEIPT', 0, 1, 'C');
        $pdf->Cell(0, 6, 'Supply and Property Office', 0, 1, 'C');
        $pdf->Ln(4);
        $x = $pdf->GetX();
        $y = $pdf->GetY(); 
        $contentWidth = 190;
        $contentHeight = 220;
        $pdf->Rect($x, $y, $contentWidth, $contentHeight);

       
        $pdf->SetFont('times', '', 10);
        $pdf->Cell(30, 8, 'Fund Cluster:', 'BR', 0, 'L');
        $pdf->SetFont('times', 'B', 10);
        $pdf->Cell(80, 8, $par_form->par_fund, 'BR', 0, 'L');
        $pdf->SetFont('times', '', 10);
        $pdf->Cell(25, 8, 'PAR No. :', 'BR', 0, 'C');
        $pdf->SetFont('times', 'B', 10);
        $pdf->Cell(55, 8, $par_form->par_no, 'B', 1, 'C');

        $pdf->SetFont('times', '', 10);
        $pdf->Cell(30, 8, 'Supplier :', 'BR', 0, 'L');
        $pdf->SetFont('times', 'B', 10);
        $pdf->Cell(80, 8, $par_form->supplier, 'BR', 0, 'L');
        $pdf->SetFont('times', '', 10);
        $pdf->Cell(25, 8, 'IAR No. :', 'BR', 0, 'C');
        $pdf->SetFont('times', 'B', 10);
        $pdf->Cell(55, 8, $par_form->par_iarno, 'B', 1, 'C');

        $pdf->SetFont('times', '', 10);
        $pdf->Cell(30, 8, '', 'B', 0, 'L');
        $pdf->SetFont('times', 'B', 10);
        $pdf->Cell(80, 8, '', 'RB', 0, 'L');
        $pdf->SetFont('times', '', 10);
        $pdf->Cell(25, 8, 'PO No. :', 'BR', 0, 'C');
        $pdf->SetFont('times', 'B', 10);
        $pdf->Cell(55, 8, $par_form->po_number, 'B', 1, 'C');

        $pdf->Cell(15, 8, 'Qty', 'BR', 0, 'C');
        $pdf->Cell(15, 8, 'Unit', 'BR', 0, 'C');
        $pdf->Cell(80, 8, 'Description', 'BR', 0, 'C');
        $pdf->Multicell(25, 4, 'Property Number', 'BR', 'C');
        $pdf->SetXY($x + 135, $y + 24); 
        $pdf->Multicell(20, 4, 'Date Acquired', 'BR', 'C');
        $pdf->SetXY($x + 155, $y + 24); 
        $pdf->Multicell(18, 8, 'Unit Price', 'BR', 'C');
        $pdf->SetXY($x + 173, $y + 24); 
        $pdf->Multicell(17, 8, 'Amount', 'B', 'C');

        $pdf->SetXY($x, $y + 170); 
        $pdf->Cell(95, 10, '', 'T', 0, 'L');
        $pdf->Cell(95, 10, '', 'T', 0, 'L');

        $pdf->SetFont('times', '', 10);
        $pdf->SetXY($x, $y + 170); 
        $pdf->Cell(30, 7, 'Received by :', '', 0, 'L');
        $pdf->Cell(55, 7, '', '', 0, 'C');
        $pdf->Cell(10, 7, '', '', 0, 'L');

        $pdf->Cell(30, 7, 'Issued by :', '', 0, 'L');
        $pdf->Cell(55, 7, '', '', 0, 'C');
        $pdf->Cell(10, 7, '', '', 0, 'L');

        $pdf->SetXY($x + 22, $y + 182); 
        $pdf->SetFont('times', 'B', 10);
        $pdf->Cell(60, 5, $par_form->par_receivedby, 'B',0, 'C');
        $pdf->SetFont('times', '', 10);
        $pdf->SetXY($x + 22, $y + 188); 
        $pdf->Cell(60, 5, 'Signature Over Printed Name of End-User', '',0, 'C');
        $pdf->SetFont('times', 'I', 10);
        $pdf->SetXY($x + 22, $y + 193); 
        $pdf->Cell(60, 5, $par_form->par_position, '',0, 'C');
        $pdf->SetFont('times', '', 10);
        $pdf->SetXY($x + 22, $y + 198); 
        $pdf->Cell(60, 5, 'Position/Office', '',0, 'C');
        $pdf->SetXY($x + 32, $y + 202); 
        $pdf->Cell(40, 5, $par_form->par_received_date, 'B',0, 'C');
        $pdf->SetXY($x + 22, $y + 207); 
        $pdf->Cell(60, 5, 'Date', '',0, 'C');

        $pdf->SetXY($x + 120, $y + 182); 
        $pdf->SetFont('times', 'B', 10);
        $pdf->Cell(60, 5,  $par_form->par_receivedfrom, 'B',0, 'C');
        $pdf->SetFont('times', '', 10);
        $pdf->SetXY($x + 120, $y + 188); 
        $pdf->Cell(60, 5, 'Supply and/or Property Custodian', '',0, 'C');
        $pdf->SetXY($x + 120, $y + 193); 
        $pdf->SetFont('times', 'I', 10);
        $pdf->Cell(60, 5, 'Head, Supply and Property', '',0, 'C');
        $pdf->SetFont('times', '', 10);
        $pdf->SetXY($x + 120, $y + 198); 
        $pdf->Cell(60, 5, 'Position/Office', '',0, 'C');
        $pdf->SetXY($x + 130, $y + 202); 
        $pdf->Cell(40, 5, $par_form->par_receivedfrom_date, 'B',0, 'C');
        $pdf->SetXY($x + 120, $y + 207); 
        $pdf->Cell(60, 5, 'Date', '',0, 'C');

        $pdf->SetXY($x + 110, $y + 165); 
        $pdf->SetFont('times', 'B', 10);
        $pdf->Cell(45, 5, 'Total Amount', 'TR',0, 'C');

        $pdf->SetXY($x + 155, $y + 165); 
        $pdf->SetFont('times', '', 10);
        $formattedtotal_cost = number_format($par_form->total_cost, 2);
        $pdf->Cell(35, 5, $formattedtotal_cost, 'T',0, 'C');

        foreach ($po_items as $item) {
            $pdf->SetXY($x, $y);
            $descriptionWidth = 65;
            $descriptionText = $item->item_description;
            $descriptionLines = ceil($pdf->GetStringWidth($descriptionText) / $descriptionWidth);
            $descriptionHeight = 7 * $descriptionLines;

            $UnitCost = number_format($item->unit_cost, 2);
            $TotalUnitCost = number_format($item->total_unit_cost, 2);
            
            $pdf->SetX(16);
            $pdf->Cell(35, 70, $item->quantity, 0, 0, 'L');
            $pdf->SetX(29);
            $pdf->Cell(35, 70, $item->unit, 0, 0, 'L');
            

            $pdf->SetXY(120,$y + 32);
            $pdf->MultiCell(25, 6, $item->property_no, 0, 'L');
            $pdf->SetXY(142,$y + 32);
            $pdf->MultiCell(25, 6, $item->date_acquired, 0, 'C');
            $pdf->SetXY(161,$y + 32);
            $pdf->MultiCell(25, 6, $UnitCost, 0, 'C');
            $pdf->SetXY(179,$y + 32);
            $pdf->MultiCell(25, 6, $TotalUnitCost, 0, 'C');
            $pdf->SetXY(41,$y + 32);
            $pdf->MultiCell($descriptionWidth, 6, '* ' . $descriptionText, 0, 'L');
           
           
            // $pdf->SetX(37);
            // $pdf->Cell(0, $descriptionHeight, $item->unit, 0, 0);
            // $pdf->SetX(52);
            // $pdf->MultiCell($descriptionWidth, 6, '* ' . $descriptionText, 0, 'L');
            // $pdf->SetXY(120,$y);
            // $pdf->MultiCell($descriptionWidth, 6, $item->property_no, 0, 'L');
            // $pdf->SetXY(150,$y);
            // $pdf->MultiCell($descriptionWidth, 6, $item->date_acquired, 0, 'L');
            // $pdf->SetXY(176, $y);
            // $cellWidth = 40;
            // $pdf->Cell($cellWidth, $descriptionHeight, $totalUnitCost, 0, 0);
            $y += max(8, $descriptionHeight);
        }

        //Line
        $pdf->Line(25, 96, 25, 234);
        $pdf->Line(40, 96, 40, 234);
        $pdf->Line(120, 96, 120, 234);
        $pdf->Line(145, 96, 145, 229);
        $pdf->Line(165, 96, 165, 229);
        $pdf->Line(183, 96, 183, 229);
       

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
        $this->Cell(0, 10, 'Appendix 71', 0, 1, 'R');
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
        $this->Cell(0, 10, 'AFA-SAP-1.01F3 Property Acknowledgement Receipt', 0, 0, 'L');
    }
}

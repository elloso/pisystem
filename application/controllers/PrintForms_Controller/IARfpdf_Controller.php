<?php
defined('BASEPATH') or exit('No direct script access allowed');
require('assets/fpdf/fpdf.php');

class IARfpdf_Controller extends CI_Controller
{
    public function IARform($iar_po_id)
    {

    $actual_iar_po_id = $iar_po_id;
    $iar_data = $this->Fpdf_Model->fetchDataByPOID($actual_iar_po_id);
    $iar_data_array = $this->Fpdf_Model->fetchDataByPOID_Array($actual_iar_po_id);
    

    if ($iar_data) {
        $pdf = new PDF();
            $pdf->AddPage();
            $pdf->SetFont('times', 'B', 14);
            $pdf->Cell(0, 10, '', 0, 1, 'C');
            $pdf->Cell(0, 6, 'INSPECTION AND ACCEPTANCE REPORT', 0, 1, 'C');
            $pdf->Cell(0, 6, 'Supply and Property Office', 0, 1, 'C');

            $pdf->Ln(7);
            $pdf->SetFont('times', 'B', 10);
            $pdf->Cell(25, 7, 'Entity Name :', 'LTR', 0, 'L');
            $pdf->Cell(110, 7, 'SOUTHERN LUZON STATE UNIVERSITY', 'TR', 0, 'L');
            $pdf->Cell(25, 7, 'Fund Cluster:', 'T', 0, 'C');
            $pdf->Cell(28, 7, '', 'TB', 0, 'R');
            $pdf->Cell(2, 7, '', 'TR', 1, 'R');

            $pdf->Cell(25, 7, '', 'LB', 0, 'L');
            $pdf->Cell(110, 7, '', 'LRB', 0, 'L');
            $pdf->Cell(55, 7, $iar_data->fund_cluster, 'BR', 1, 'C');

            $pdf->SetFont('times', '', 10);
            $pdf->Cell(25, 7, 'Supplier :', 'L', 0, 'L');
            $pdf->SetFont('times', 'B', 10);
            $pdf->Cell(110, 7, $iar_data->iar_supplier, 'L', 0, 'L');
            $pdf->SetFont('times', '', 10);
            $pdf->Cell(21, 7, 'IAR No. :', 'L', 0, 'L');
            $pdf->SetFont('times', 'B', 10);
            $pdf->Cell(34, 7, $iar_data->iar_number, 'LR', 1, 'C');

            $pdf->SetFont('times', '', 10);
            $pdf->Cell(25, 7, 'PO No. / Date :', 'LT', 0, 'L');
            $pdf->SetFont('times', 'B', 10);
            $pdf->Cell(110, 7, $iar_data->iar_po_number." / ".$iar_data->po_date, 'LT', 0, 'L');
            $pdf->SetFont('times', '', 10);
            $pdf->Cell(21, 7, 'Date :', 'LT', 0, 'L');
            $pdf->SetFont('times', 'B', 10);
            $pdf->Cell(34, 7, $iar_data->iar_date, 'LTR', 1, 'C');

            $pdf->SetFont('times', '', 10);
            $pdf->Cell(35, 7, 'Requisitioning Office:', 'LT', 0, 'L');
            $pdf->SetFont('times', 'B', 10);
            $pdf->Cell(100, 7, $iar_data->office_dept, 'LT', 0, 'L');
            $pdf->SetFont('times', '', 10);
            $pdf->Cell(21, 7, 'Invoice No. :', 'LT', 0, 'L');
            $pdf->SetFont('times', 'B', 10);
            $pdf->Cell(34, 7, $iar_data->invoice_number, 'LTR', 1, 'C');

            $pdf->SetFont('times', '', 10);
            $pdf->Cell(35, 7, 'Responsibility :', 'LT', 0, 'L');
            $pdf->SetFont('times', 'B', 10);
            $pdf->Cell(100, 7, $iar_data->rcc, 'LT', 0, 'L');
            $pdf->SetFont('times', '', 10);
            $pdf->Cell(21, 7, 'Date :', 'LT', 0, 'L');
            $pdf->SetFont('times', 'B', 10);
            $pdf->Cell(34, 7, $iar_data->invoice_date, 'LTR', 1, 'C');

            $x = $pdf->GetX();
            $y = $pdf->GetY(); 

            $contentWidth = 190;
            $contentHeight = 175;
            $pdf->Rect($x, $y, $contentWidth, $contentHeight);
           
            $pdf->SetXY($x, $y); 
            $pdf->Cell(35, 10, 'Stock/Property No.', 'RB', 0, 'C');
            $pdf->SetXY($x + 35, $y); 
            $pdf->Cell(18, 10, 'Item No.', 'BR', 0, 'C');
            $pdf->SetXY($x + 53, $y); 
            $pdf->Cell(82, 10, 'Description', 'BR', 0, 'C');
            $pdf->SetXY($x + 135, $y); 
            $pdf->Cell(21, 10, 'Unit', 'BR', 0, 'C');
            $pdf->SetXY($x + 156, $y); 
            $pdf->Cell(34, 10, 'Quantity', 'B', 0, 'C');

            $pdf->SetXY($x, $y + 110); 
            $pdf->Cell(95, 10, 'INSPECTION', 'TRB', 0, 'L');
            $pdf->Cell(95, 10, 'ACCEPTANCE', 'LTB', 0, 'L');

            $pdf->SetXY($x, $y + 120); 

            $pdf->Cell(30, 7, 'Date Inspected :', '', 0, 'L');
            $pdf->Cell(55, 7, $iar_data->inspection_date, 'B', 0, 'C');
            $pdf->Cell(10, 7, '', '', 0, 'L');
            
            $pdf->Cell(30, 7, 'Date Received :', '', 0, 'L');
            $pdf->Cell(55, 7, $iar_data->acceptance_date, 'B', 0, 'C');
            $pdf->Cell(10, 7, '', '', 0, 'L');

            $pdf->CheckBox($x + 20, $y + 132, false);
            $pdf->SetX($x + 30); 
            $pdf->MultiCell(60, 5, 'Inspected, verified and found in order as to quantity and specifications.', '', 'L');

            $pdf->CheckBox($x + 110, $y + 132, false);
            $pdf->SetX($x + 120); 
            $pdf->MultiCell(60, 5, 'Completed', '', 'L');

            $pdf->CheckBox($x + 110, $y + 142, false);
            $pdf->SetX($x + 120); 
            $pdf->MultiCell(60, 5, 'CPartial (pls. specify quantity)', '', 'L');

            $pdf->SetXY($x + 22, $y + 156); 
            $pdf->Cell(60, 5, $iar_data->inspection_officer, '',0, 'C');
            $pdf->SetXY($x + 22, $y + 156); 
            $pdf->Cell(60, 5, '', 'B', 'C');
            
            $pdf->SetXY($x + 20, $y + 162); 
            $pdf->Cell(60, 5, 'Inspection Officer/ Inspection Committee', '', 'C');

            $pdf->SetXY($x + 110, $y + 157); 
            $pdf->Cell(60, 5, $iar_data->acceptance_custodian, '',0, 'C');
            $pdf->SetXY($x + 110, $y + 157); 
            $pdf->Cell(60, 5, '', 'B', 'C');

            $pdf->SetXY($x + 113, $y + 162); 
            $pdf->Cell(60, 5, 'Supply and/or Property Custodian', '', 'C');

            $pdf->SetFont('times', '', 9);
            foreach ($iar_data_array as $item) {
                $pdf->SetXY($x, $y + 44);
            
                $descriptionWidth = 80;
                $descriptionText = $item->item_description;
                $descriptionLines = ceil($pdf->GetStringWidth($descriptionText) / $descriptionWidth);
                $descriptionHeight = 7 * $descriptionLines;
            
                $itemNoWidth = 30 * ($descriptionWidth / 80);
                $unitWidth = 20 * ($descriptionWidth / 80);
                $quantityWidth = 60 * ($descriptionWidth / 80);
            
                $xItemNo = $x;
                $xDescription = $xItemNo + $itemNoWidth;
                $xUnit = $xDescription + $descriptionWidth;
                $xQuantity = $xUnit + $unitWidth;
            
                $pdf->SetXY(10, $y + 13);
                $pdf->MultiCell($itemNoWidth, 6, $item->property_no, 0, 'L');
            
                $pdf->SetXY($xDescription + 12, $y + 13);
                $pdf->MultiCell($descriptionWidth, 7, $item->item_no, 0, 'L');
            
                $pdf->SetXY($xUnit + 26, $y + 13); 
                $pdf->MultiCell($unitWidth, 7, $item->unit, 0, 'C');
            
                $pdf->SetXY($xQuantity + 14, $y + 13); 
                $pdf->MultiCell($quantityWidth, 7, $item->quantity, 0, 'C');
            
                $pdf->SetXY(65, $y + 13);
                $pdf->MultiCell($descriptionWidth, 7, "* " . $item->item_description, 0, 'L');
            
                $y += max(8, $descriptionHeight);
            }
            
            //Line
            $pdf->Line(45, 119, 45, 219);
            $pdf->Line(63, 119, 63, 219);
            $pdf->Line(145, 119, 145, 219);
            $pdf->Line(166, 119, 166, 219);
            $pdf->Line(105, 228, 105, 284);

            $pdf->Output(); 
    }else{
        echo "No data found for the given iar_po_id.";

    }
        
    }
}

class PDF extends FPDF
{
    function Header()
    {
        $imagePath = 'assets/img/slsu/slsu_logo.png'; 
        $this->Image($imagePath, $this->GetX() + 4, $this->GetY(), 25);
        $this->SetFont('times', 'I', 12);
        $this->Cell(0, 10, 'Appendix 62', 0, 1, 'R');
        $this->SetFont('times', 'B', 12);
        $this->Cell(0, 6, 'Republic of the Philippines', 0, 1, 'C');
        $this->Cell(0, 6, 'SOUTHERN  LUZON STATE  UNIVERSITY', 0, 1, 'C');
        $this->Cell(0, 6, 'Lucban, Quezon', 0, 1, 'C');
    }
    function CheckBox($x, $y, $checked)
    {
        $this->SetXY($x, $y);
        $this->Rect($x, $y, 5, 5, 'D');
        if ($checked) {
            $this->Text($x + 1, $y + 4, 'X');
        }
    }
    function Footer()
    {
        $this->SetY(-15); 
        $this->SetFont('times', '', 10);
        $this->Cell(0, 10, 'AFA-SAP-1.01F1, Rev. 3' , 0, 0, 'L');
    }
}

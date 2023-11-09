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
            $pdf->setLineWidth(0.4);
            $pdf->Cell(0, 10, 'INSPECTION AND ACCEPTANCE REPORT', 0, 1, 'C');
            $pdf->Ln(7);
            $pdf->SetFont('times', 'B', 12);
            $pdf->Cell(25, 8, 'Entity Name:', '', 0, 'L');
            $pdf->SetFont('times', '', 12);
            $pdf->Cell(85, 8, 'SOUTHERN LUZON STATE UNIVERSITY', 'B', 0, 'C');
            $pdf->SetFont('times', 'B', 12);
            $pdf->Cell(33, 8, 'Fund Cluster:', '', 0, 'R');
            $pdf->SetFont('times', '', 12);
            $pdf->Cell(47, 8, $iar_data->fund_cluster, 'B', 1, 'L');

            $pdf->SetFont('times', '', 10);

            $x = $pdf->GetX();
            $y = $pdf->GetY() + 3; 

            $contentWidth = 190;
            $contentHeight = 220;
            $pdf->Rect($x, $y, $contentWidth, $contentHeight);

            $pdf->SetXY($x, $y); 
            $pdf->Cell(15, 8, 'Supplier :', '', 0, 'L');
            $pdf->Cell(85, 8, $iar_data->iar_supplier, 'B', 0, 'C');
            $pdf->Cell(10, 8, '', '', 0, 'C');
            $pdf->Cell(15, 8, 'IAR No. :', '', 0, 'L');
            $pdf->Cell(55, 8, $iar_data->iar_number, 'B', 0, 'C');
            $pdf->Cell(10, 8, '', '', 0, 'L');
            $pdf->SetXY($x, $y + 8); 
            $pdf->Cell(22, 8, 'PO No./Date :', '', 0, 'L');
            $pdf->Cell(78, 8, $iar_data->po_date, 'B', 0, 'C');
            $pdf->Cell(10, 8, '', '', 0, 'C');
            $pdf->Cell(10, 8, 'Date :', '', 0, 'L');
            $pdf->Cell(60, 8, $iar_data->iar_date, 'B', 0, 'C');
            $pdf->Cell(10, 8, '', '', 0, 'L');
            $pdf->SetXY($x, $y + 16); 
            $pdf->Cell(45, 8, 'Requisitioning Office/Dept. :', '', 0, 'L');
            $pdf->Cell(55, 8, $iar_data->office_dept, 'B', 0, 'C');
            $pdf->Cell(10, 8, '', '', 0, 'C');
            $pdf->Cell(20, 8, 'Invoice No.', '', 0, 'L');
            $pdf->Cell(50, 8, $iar_data->invoice_number, 'B', 0, 'C');
            $pdf->Cell(10, 8, '', '', 0, 'L');
            $pdf->SetXY($x, $y + 24); 
            $pdf->Cell(45, 8, 'Responsibility Center Code :', '', 0, 'L');
            $pdf->Cell(55, 8, $iar_data->rcc, 'B', 0, 'C');
            $pdf->Cell(10, 8, '', '', 0, 'C');
            $pdf->Cell(10, 8, 'Date :', '', 0, 'L');
            $pdf->Cell(60, 8, $iar_data->invoice_date, 'B', 0, 'C');
            $pdf->Cell(10, 8, '', '', 0, 'L');
            $pdf->SetXY($x, $y + 34); 
            
            $pdf->Cell(30, 10, 'Stock/Property No.', 'LTRB', 0, 'C');
            $pdf->Line(40, 208, 40, 90);
            $pdf->Cell(80, 10, 'Description', 'LTRB', 0, 'C');
            $pdf->Line(120, 208, 120, 90);
            $pdf->Cell(20, 10, 'Unit', 'LTRB', 0, 'C');
            $pdf->Line(140, 208, 140, 90);
            $pdf->Cell(60, 10, 'Quantity', 'LTRB', 0, 'C');
            $pdf->SetFont('times', 'I', 13);
            $pdf->SetXY($x, $y + 160); 
            $pdf->Cell(95, 10, 'INSPECTION', 'TRB', 0, 'C');
            $pdf->Cell(95, 10, 'ACCEPTANCE', 'LTB', 0, 'C');
            $pdf->SetFont('times', '', 10);

            $pdf->SetXY($x, $y + 170); 

            $pdf->Cell(30, 7, 'Date Inspected :', '', 0, 'L');
            $pdf->Cell(55, 7, $iar_data->inspection_date, 'B', 0, 'C');
            $pdf->Cell(10, 7, '', '', 0, 'L');

            $pdf->Cell(30, 7, 'Date Received :', '', 0, 'L');
            $pdf->Cell(55, 7, $iar_data->acceptance_date, 'B', 0, 'C');
            $pdf->Cell(10, 7, '', '', 0, 'L');

            $pdf->CheckBox($x + 20, $y + 185, false);
            $pdf->SetX($x + 30); 
            $pdf->MultiCell(60, 5, 'Inspected, verified and found in order as to quantity and specifications', '', 'L');

            $pdf->CheckBox($x + 110, $y + 185, false);
            $pdf->SetX($x + 120); 
            $pdf->MultiCell(60, 5, 'Completed', '', 'L');

            $pdf->SetXY($x + 20, $y + 213   ); 
            $pdf->Cell(60, 5, 'Inspection Officer/ Inspection Committee', '', 'C');
            $pdf->SetXY($x + 20, $y + 205   ); 
            $pdf->Cell(60, 7, $iar_data->inspection_officer, 'B', 0, 'C');

            $pdf->CheckBox($x + 110, $y + 195, false);
            $pdf->SetX($x + 120); 
            $pdf->MultiCell(60, 5, 'Partial (pls. specify quantity)', '', 'L');

            $pdf->SetXY($x + 110, $y + 213   );
            $pdf->Cell(60, 5, 'Supply and/or Property Custodian', '', 'C');
            $pdf->SetXY($x + 110, $y + 205   ); 
            $pdf->Cell(60, 7, $iar_data->acceptance_custodian, 'B', 0, 'C');

        
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
            
                $pdf->Cell($itemNoWidth, $descriptionHeight, $item->property_no, 0, 0, 'C'); 
                $pdf->SetXY($xDescription, $y + 44);
                $pdf->MultiCell($descriptionWidth, 7,'* '. $descriptionText, 0, 'L'); 
                $pdf->SetXY($xUnit, $y + 44);
                $pdf->Cell($unitWidth, $descriptionHeight, $item->unit, 0, 0, 'C'); 
                $pdf->SetXY($xQuantity, $y + 44);
                $pdf->Cell($quantityWidth, $descriptionHeight, $item->quantity, 0, 0, 'C'); 
           
                $y += max(8, $descriptionHeight);
            }
            
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
        $this->SetFont('times', 'I', 12);
        $this->Cell(0, 10, 'Appendix 62', 0, 1, 'R');
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
        $this->Cell(0, 10, '155' , 0, 0, 'C');
    }
}

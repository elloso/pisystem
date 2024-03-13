<?php
defined('BASEPATH') or exit('No direct script access allowed');
require('assets/fpdf/fpdf.php');

class RSPIICSpdf_Controller extends CI_Controller
{
    public function RSPIform()
    {

    $selectMonth = $this->input->post('MonthDropdown');
    $selectYear = $this->input->post('YearDropdown');

    if($selectMonth == 1){
        $txtMonth = "January";
    }
    elseif ($selectMonth == 2){
        $txtMonth = "February";
    }
    elseif ($selectMonth == 3){
        $txtMonth = "March";
    }
    elseif ($selectMonth == 4){
        $txtMonth = "April";
    }
    elseif ($selectMonth== 5){
        $txtMonth = "May";
    }
    elseif ($selectMonth == 6){
        $txtMonth = "June";
    }
    elseif ($selectMonth == 7){
        $txtMonth = "July";
    }
    elseif ($selectMonth == 8){
        $txtMonth = "August";
    }
    elseif ($selectMonth== 9){
        $txtMonth = "September";
    }
    elseif ($selectMonth == 10){
        $txtMonth = "October";
    }
    elseif ($selectMonth == 11){
        $txtMonth = "November";
    }
    elseif ($selectMonth == 12){
        $txtMonth = "December";
    }
    else {
        $txtMonth = "";
    }
   
    $rspidatas = $this->Fpdf_Model->rspi_item($selectMonth,$selectYear);
    $rspidatarows = $this->Fpdf_Model->rspi_data($selectMonth,$selectYear);
   
            $pdf = new PDF();
            $pdf->AddPage();
            $pdf->SetFont('times', 'B', 14);
            $pdf->setLineWidth(0.4);
            $pdf->Cell(0, 10, 'REPORT OF SEMI-EXPENDABLE PROPERTY ISSUED', 0, 1, 'C');
            $pdf->Ln(7);
            $pdf->SetFont('times', 'B', 12);
            $pdf->Cell(25, 8, 'Entity Name:', '', 0, 'L');
            $pdf->SetFont('times', '', 12);
            $pdf->Cell(85, 8, 'SOUTHERN LUZON STATE UNIVERSITY', 'B', 0, 'C');
            $pdf->SetFont('times', 'B', 12);
            $pdf->Cell(33, 8, 'Serial No.:', '', 0, 'R');
            $pdf->SetFont('times', '', 12);
            $pdf->Cell(47, 8, $selectYear.'-'.$selectMonth.'-0001', 'B', 1, 'C');
            $pdf->SetFont('times', 'B', 12);
            $pdf->Cell(25, 8, 'Fund Cluster:', '', 0, 'L');
            $pdf->SetFont('times', '', 12);
            $pdf->Cell(85, 8, '  RF/MOOE & STF', '', 0, 'L');
            $pdf->SetFont('times', 'B', 12);
            $pdf->Cell(33, 8, 'Date:', '', 0, 'R');
            $pdf->SetFont('times', '', 12);
            $pdf->Cell(47, 8, $txtMonth.', '.$selectYear, '', 1, 'L');

            $pdf->SetFont('times', '', 10);

            $x = $pdf->GetX();
            $y = $pdf->GetY(); 

            $contentWidth = 190;
            $contentHeight = 200;
            $pdf->Rect($x, $y, $contentWidth, $contentHeight);

                
            $pdf->SetXY($x, $y); 
            $pdf->SetFont('times', 'I', 8);
            $pdf->Cell(150, 5, 'To filled out by the Property and /or Supply Division/ Unit', 'BR', 0, 'C');
            $pdf->SetFont('times', 'I', 7.5);
            $pdf->SetXY($x + 150, $y); 
            $pdf->Cell(40, 5, 'To filled out by the Accounting Unit', 'B', 0, 'C');

            $pdf->SetFont('times', '', 10);
            $pdf->SetXY($x, $y + 5); 
            $pdf->multicell(30, 10, 'ICS No.', 'BR', 'C');
            $pdf->SetXY($x + 30, $y + 5); 
            $pdf->multicell(23, 5, 'Responsibility Center Code', 'BR','C');
            $pdf->SetXY($x + 53, $y + 5); 
            $pdf->multicell(28, 5, 'Semi-expendable Property No.', 'BR','C');
            $pdf->SetXY($x + 81, $y + 5); 
            $pdf->multicell(39, 10, 'Item Description', 'BR','C');
            $pdf->SetXY($x + 120, $y + 5); 
            $pdf->multicell(13, 10, 'Unit', 'BR', 'C');
            $pdf->SetXY($x + 133, $y + 5); 
            $pdf->multicell(17, 5, 'Quantity Issued', 'BR', 'C');
            $pdf->SetXY($x + 150, $y + 5); 
            $pdf->Cell(20, 10, 'Unit Cost', 'BR', 0, 'C');
            $pdf->SetXY($x + 170, $y + 5); 
            $pdf->Cell(20, 10, 'Amount', 'BR', 0, 'C');

            $pdf->SetFont('times', '', 10);
            $pdf->SetXY($x, $y + 165); 
            $pdf->Cell(120, 35, '', 'TR', 0, 'C');
            $pdf->SetXY($x + 120, $y + 165); 
            $pdf->Cell(70, 35, '', 'T', 0, 'C');

            $pdf->SetXY($x + 38, $y + 165); 
            $pdf->Cell(50, 10, 'I hereby certify to the correctness of the above information', '', 0, 'C');
            $pdf->SetXY($x + 28, $y + 172); 
            $pdf->Cell(70, 10, '', 'B', 0, 'C');
            $pdf->SetXY($x + 38, $y + 180); 
            $pdf->Cell(50, 10, 'Signature over Printed Name and/or Supply Custodian', '', 0, 'C');

            $pdf->SetXY($x + 120, $y + 165); 
            $pdf->Cell(20, 10, 'Posted by:', '', 0, 'L');
            $pdf->SetXY($x + 130, $y + 172); 
            $pdf->Cell(50, 10, '', 'B', 0, 'C');
            $pdf->SetXY($x + 130, $y + 180); 
            $pdf->Cell(50, 10, 'Signature over Printed Name of', '', 0, 'C');
            $pdf->SetXY($x + 130, $y + 185); 
            $pdf->Cell(50, 10, 'Designated Accounting staff', '', 0, 'C');

            $pdf->Line(40, 236, 40, 86);
            $pdf->Line(63, 236, 63, 86);
            $pdf->Line(91, 236, 91, 86);
            $pdf->Line(130, 236, 130, 86);
            $pdf->Line(143, 236, 143, 86);
            $pdf->Line(160, 236, 160, 86);
            $pdf->Line(180, 236, 180, 86);
            // $pdf->Line(200, 236, 10, 236);

            // Initialize page number
            $pageNumber = 2;

            foreach($rspidatas as $Datas){
                // Check if adding this item will exceed the page height
                $descriptionWidth = 39;
                $descriptionText = '* ' . $Datas->item_description;
                $descriptionLines = ceil($pdf->GetStringWidth($descriptionText) / $descriptionWidth);
                $descriptionHeight = 7 * $descriptionLines;

                if ($y + $descriptionHeight > 220) {
                    $pdf->AddPage();
                    $y = 15; 
                    $pdf->SetFont('times', 'B', 14);
                    $pdf->setLineWidth(0.4);
                    $pdf->Cell(0, 10, 'REPORT OF SEMI-EXPENDABLE PROPERTY ISSUED', 0, 1, 'C');
                    $pdf->Ln(7);
                    $pdf->SetFont('times', 'B', 12);
                    $pdf->Cell(25, 8, 'Entity Name:', '', 0, 'L');
                    $pdf->SetFont('times', '', 12);
                    $pdf->Cell(85, 8, 'SOUTHERN LUZON STATE UNIVERSITY', 'B', 0, 'C');
                    $pdf->SetFont('times', 'B', 12);
                    $pdf->Cell(33, 8, 'Serial No.:', '', 0, 'R');
                    $pdf->SetFont('times', '', 12);
                    $pdf->Cell(47, 8, $selectYear . '-' . $selectMonth . '-' . str_pad($pageNumber, 4, '0', STR_PAD_LEFT), 'B', 1, 'C');
                    $pageNumber++;
                    $pdf->SetFont('times', 'B', 12);
                    $pdf->Cell(25, 8, 'Fund Cluster:', '', 0, 'L');
                    $pdf->SetFont('times', '', 12);
                    $pdf->Cell(85, 8, '', '', 0, 'C');
                    $pdf->SetFont('times', 'B', 12);
                    $pdf->Cell(33, 8, 'Date:', '', 0, 'R');
                    $pdf->SetFont('times', '', 12);
                    $pdf->Cell(47, 8, '', '', 1, 'L');
        
                    $pdf->SetFont('times', '', 10);
        
                    $x = $pdf->GetX();
                    $y = $pdf->GetY(); 
        
                    $contentWidth = 190;
                    $contentHeight = 200;
                    $pdf->Rect($x, $y, $contentWidth, $contentHeight);
        
                    $pdf->SetXY($x, $y); 
                    $pdf->SetFont('times', 'I', 8);
                    $pdf->Cell(150, 5, 'To filled out by the Property and /or Supply Division/ Unit', 'BR', 0, 'C');
                    $pdf->SetFont('times', 'I', 7.5);
                    $pdf->SetXY($x + 150, $y); 
                    $pdf->Cell(40, 5, 'To filled out by the Accounting Unit', 'B', 0, 'C');
        
                    $pdf->SetFont('times', '', 10);
                    $pdf->SetXY($x, $y + 5); 
                    $pdf->multicell(30, 10, 'ICS No.', 'BR', 'C');
                    $pdf->SetXY($x + 30, $y + 5); 
                    $pdf->multicell(23, 5, 'Responsibility Center Code', 'BR','C');
                    $pdf->SetXY($x + 53, $y + 5); 
                    $pdf->multicell(28, 5, 'Semi-expendable Property No.', 'BR','C');
                    $pdf->SetXY($x + 81, $y + 5); 
                    $pdf->multicell(39, 10, 'Item Description', 'BR','C');
                    $pdf->SetXY($x + 120, $y + 5); 
                    $pdf->multicell(13, 10, 'Unit', 'BR', 'C');
                    $pdf->SetXY($x + 133, $y + 5); 
                    $pdf->multicell(17, 5, 'Quantity Issued', 'BR', 'C');
                    $pdf->SetXY($x + 150, $y + 5); 
                    $pdf->Cell(20, 10, 'Unit Cost', 'BR', 0, 'C');
                    $pdf->SetXY($x + 170, $y + 5); 
                    $pdf->Cell(20, 10, 'Amount', 'BR', 0, 'C');
        
                    $pdf->SetFont('times', '', 10);
                    $pdf->SetXY($x, $y + 165); 
                    $pdf->Cell(120, 35, '', 'TR', 0, 'C');
                    $pdf->SetXY($x + 120, $y + 165); 
                    $pdf->Cell(70, 35, '', 'T', 0, 'C');
        
                    $pdf->SetXY($x + 38, $y + 165); 
                    $pdf->Cell(50, 10, 'I hereby certify to the correctness of the above information', '', 0, 'C');
                    $pdf->SetXY($x + 28, $y + 172); 
                    $pdf->Cell(70, 10, '', 'B', 0, 'C');
                    $pdf->SetXY($x + 38, $y + 180); 
                    $pdf->Cell(50, 10, 'Signature over Printed Name and/or Supply Custodian', '', 0, 'C');
        
                    $pdf->SetXY($x + 120, $y + 165); 
                    $pdf->Cell(20, 10, 'Posted by:', '', 0, 'L');
                    $pdf->SetXY($x + 130, $y + 172); 
                    $pdf->Cell(50, 10, '', 'B', 0, 'C');
                    $pdf->SetXY($x + 130, $y + 180); 
                    $pdf->Cell(50, 10, 'Signature over Printed Name of', '', 0, 'C');
                    $pdf->SetXY($x + 130, $y + 185); 
                    $pdf->Cell(50, 10, 'Designated Accounting staff', '', 0, 'C');
        
                    $pdf->Line(40, 236, 40, 86);
                    $pdf->Line(63, 236, 63, 86);
                    $pdf->Line(91, 236, 91, 86);
                    $pdf->Line(130, 236, 130, 86);
                    $pdf->Line(143, 236, 143, 86);
                    $pdf->Line(160, 236, 160, 86);
                    $pdf->Line(180, 236, 180, 86);
           
                }
                $pdf->SetXY($x, $y);
                $UnitCost = number_format($Datas->unit_cost, 2);
                $Total = $Datas->issued_quantity * $Datas->unit_cost;
                $totalUnitCost = number_format($Total, 2);

                $pdf->SetFont('times', '', 10);
                $pdf->SetXY($x, $y + 15); 
                $pdf->MultiCell(30, 6, $Datas->ics_no,'', 'C');
    
                $pdf->SetXY($x+30, $y + 15); 
                $pdf->MultiCell(23, 6, $Datas->rcc,'', 'C');
    
                $pdf->SetXY($x+53, $y + 15); 
                $pdf->multicell(28, 6, $Datas->quantity_property_no, '', 'C');

                $pdf->SetXY($x+81, $y + 15); 
                $pdf->MultiCell($descriptionWidth, 6, $descriptionText,'', 'L');
    
                $pdf->SetXY($x+120, $y + 15); 
                $pdf->multicell(13, 10, $Datas->unit, '', 'C');

                $pdf->SetXY($x+133, $y + 15); 
                $pdf->multicell(17, 10, $Datas->issued_quantity, '', 'C');

                $pdf->SetXY($x+150, $y + 15); 
                $pdf->multicell(20, 10, $UnitCost, '', 'C');

                $pdf->SetXY($x+170, $y + 15); 
                $pdf->multicell(20, 10, $totalUnitCost , '', 'C');
            
                $y += max(8, $descriptionHeight);
            
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
        $this->Cell(0, 10, 'Annex A.7', 0, 1, 'R');
        $this->SetFont('times', 'B', 12);
        $this->Cell(0, 6, 'Republic of the Philippines', 0, 1, 'C');
        $this->Cell(0, 6, 'SOUTHERN  LUZON STATE  UNIVERSITY', 0, 1, 'C');
        $this->Cell(0, 6, 'Lucban, Quezon', 0, 1, 'C');
    }
    function Footer()
    {
     
    }
}

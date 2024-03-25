<?php
defined('BASEPATH') or exit('No direct script access allowed');
require('assets/fpdf/fpdf.php');

class RPCSEPpdf_Controller  extends CI_Controller
{
    public function RPCSEPform()
    {

        $rpcsepdata = $this->Fpdf_Model->rpcsep_data();


        $pdf = new PDF();
        $pdf->AddPage();
        $pdf->Ln(7);
        $pdf->SetFont('times', '', 10);
        $pdf->Cell(23, 8, 'Fund Cluster:', '', 0, 'L');
        $pdf->Cell(35, 5, 'RF MOOE/ PRE STF', 'B', 1, 'L');
        
        $pdf->SetFont('times', '', 10);
        $pdf->cell(190, 6, '', '',1,'L');
        $pdf->cell(15.5, 5, 'For which', '',0,'L');
        $pdf->SetFont('times', 'B', 10);
        $pdf->cell(40, 4, 'Victor V. Villalon', 'B',0,'C');
        $pdf->SetFont('times', '', 10);
        $pdf->cell(2, 4, ',', '',0,'L');
        $pdf->cell(120, 4, 'Head, Supply and Property Office,  Southern Luzon State University is accountable,', 'B',0,'L');
        $pdf->cell(56, 4, 'having assumed such accountability on', '',0,'L');
        $pdf->cell(20, 4, 'July 12, 2023.', 'B',0,'L');
        $pdf->cell(190, 7, '', '',1,'L');
        
        $pdf->SetFont('times', '', 10);

        $x = $pdf->GetX();
        $y = $pdf->GetY(); 

        $contentWidth = 277;
        $contentHeight = 125;
        $pdf->Rect($x, $y, $contentWidth, $contentHeight);

            
        $pdf->SetXY($x, $y); 

        $pdf->SetFont('times', '', 10);
        $pdf->SetXY($x, $y); 
        $pdf->multicell(15, 10, 'Article', 'BR', 'C');
        $pdf->SetXY($x + 15, $y ); 
        $pdf->multicell(50, 10, 'Description', 'BR', 'C');
        $pdf->SetXY($x + 65, $y ); 
        $pdf->multicell(31, 10, 'Stock Number', 'BR', 'C');
        $pdf->SetXY($x + 95, $y ); 
        $pdf->multicell(20, 5, 'Unit of Measure', 'BR', 'C');
        $pdf->SetXY($x + 115, $y ); 
        $pdf->multicell(25, 10, 'Unit Value', 'BR', 'C');
        $pdf->SetXY($x + 140, $y ); 
        $pdf->SetFont('times', '', 8);
        $pdf->multicell(20, 3.5, 'Balance Per Card', 'BR', 'C');
        $pdf->SetXY($x + 140, $y +7); 
        $pdf->multicell(20, 3, 'Quantity', 'BR', 'C');
        $pdf->SetXY($x + 160, $y ); 
        $pdf->multicell(20, 3.5, 'On Hand Per Count', 'BR', 'C');
        $pdf->SetXY($x + 160, $y + 7 ); 
        $pdf->multicell(20, 3, 'Quantity', 'BR', 'C');
        $pdf->SetXY($x + 180, $y ); 
        $pdf->SetFont('times', '', 10);
        $pdf->multicell(40, 7, 'Shortage/Overage', 'BR', 'C');
        $pdf->SetFont('times', '', 8);
        $pdf->SetXY($x + 180, $y +7 ); 
        $pdf->multicell(15, 3, 'Quantity', 'BR', 'C');
        $pdf->SetXY($x + 195, $y +7 ); 
        $pdf->multicell(25, 3, 'Value', 'BR', 'C');
        $pdf->SetXY($x + 220, $y); 
        $pdf->multicell(57, 4, 'Remarks', 'B', 'C');
        $pdf->SetFont('times', '', 8);
        $pdf->SetXY($x + 220, $y + 4); 
        $pdf->multicell(17, 6, 'Whereabouts', 'BR', 'C');
        $pdf->SetXY($x + 237, $y + 4); 
        $pdf->multicell(20, 6, 'Condition', 'BR', 'C');
        $pdf->SetXY($x + 257, $y + 4); 
        $pdf->multicell(20, 6, 'Custodian', 'B', 'C');

        $pdf->Line(25, 188, 25, 73);
        $pdf->Line(75, 188, 75, 73);
        $pdf->Line(106, 188, 106, 73);
        $pdf->Line(125, 188, 125, 73);
        $pdf->Line(150, 188, 150, 73);
        $pdf->Line(170, 188, 170, 73);
        $pdf->Line(190, 188, 190, 73);
        $pdf->Line(205, 188, 205, 73);
        $pdf->Line(230, 188, 230, 73);
        $pdf->Line(247, 188, 247, 73);
        $pdf->Line(267, 188, 267, 73);

        foreach($rpcsepdata as $data){

            $descriptionWidth = 50;
            $descriptionText = '* ' . $data->item_description;
            $descriptionLines = ceil($pdf->GetStringWidth($descriptionText) / $descriptionWidth);
            $descriptionHeight = 6 * $descriptionLines;

            if ($y + $descriptionHeight > 183) {
                $pdf->AddPage();
                $pdf->Ln(7);
                $pdf->SetFont('times', '', 10);
                $pdf->Cell(23, 8, 'Fund Cluster:', '', 0, 'L');
                $pdf->Cell(35, 5, 'RF MOOE/ PRE STF', 'B', 1, 'L');
                
                $pdf->SetFont('times', '', 10);
                $pdf->cell(190, 6, '', '',1,'L');
                $pdf->cell(15.5, 5, 'For which', '',0,'L');
                $pdf->SetFont('times', 'B', 10);
                $pdf->cell(40, 4, 'Victor V. Villalon', 'B',0,'C');
                $pdf->SetFont('times', '', 10);
                $pdf->cell(2, 4, ',', '',0,'L');
                $pdf->cell(120, 4, 'Head, Supply and Property Office,  Southern Luzon State University is accountable,', 'B',0,'L');
                $pdf->cell(56, 4, 'having assumed such accountability on', '',0,'L');
                $pdf->cell(20, 4, 'July 12, 2023.', 'B',0,'L');
                $pdf->cell(190, 7, '', '',1,'L');
                
                $pdf->SetFont('times', '', 10);

                $x = $pdf->GetX();
                $y = $pdf->GetY(); 

                $contentWidth = 277;
                $contentHeight = 125;
                $pdf->Rect($x, $y, $contentWidth, $contentHeight);

                    
                $pdf->SetXY($x, $y); 

                $pdf->SetFont('times', '', 10);
                $pdf->SetXY($x, $y); 
                $pdf->multicell(15, 10, 'Article', 'BR', 'C');
                $pdf->SetXY($x + 15, $y ); 
                $pdf->multicell(50, 10, 'Description', 'BR', 'C');
                $pdf->SetXY($x + 65, $y ); 
                $pdf->multicell(31, 10, 'Stock Number', 'BR', 'C');
                $pdf->SetXY($x + 95, $y ); 
                $pdf->multicell(20, 5, 'Unit of Measure', 'BR', 'C');
                $pdf->SetXY($x + 115, $y ); 
                $pdf->multicell(25, 10, 'Unit Value', 'BR', 'C');
                $pdf->SetXY($x + 140, $y ); 
                $pdf->SetFont('times', '', 8);
                $pdf->multicell(20, 3.5, 'Balance Per Card', 'BR', 'C');
                $pdf->SetXY($x + 140, $y +7); 
                $pdf->multicell(20, 3, 'Quantity', 'BR', 'C');
                $pdf->SetXY($x + 160, $y ); 
                $pdf->multicell(20, 3.5, 'On Hand Per Count', 'BR', 'C');
                $pdf->SetXY($x + 160, $y + 7 ); 
                $pdf->multicell(20, 3, 'Quantity', 'BR', 'C');
                $pdf->SetXY($x + 180, $y ); 
                $pdf->SetFont('times', '', 10);
                $pdf->multicell(40, 7, 'Shortage/Overage', 'BR', 'C');
                $pdf->SetFont('times', '', 8);
                $pdf->SetXY($x + 180, $y +7 ); 
                $pdf->multicell(15, 3, 'Quantity', 'BR', 'C');
                $pdf->SetXY($x + 195, $y +7 ); 
                $pdf->multicell(25, 3, 'Value', 'BR', 'C');
                $pdf->SetXY($x + 220, $y); 
                $pdf->multicell(57, 4, 'Remarks', 'B', 'C');
                $pdf->SetFont('times', '', 8);
                $pdf->SetXY($x + 220, $y + 4); 
                $pdf->multicell(17, 6, 'Whereabouts', 'BR', 'C');
                $pdf->SetXY($x + 237, $y + 4); 
                $pdf->multicell(20, 6, 'Condition', 'BR', 'C');
                $pdf->SetXY($x + 257, $y + 4); 
                $pdf->multicell(20, 6, 'Custodian', 'B', 'C');
                
                $pdf->Line(25, 188, 25, 73);
                $pdf->Line(75, 188, 75, 73);
                $pdf->Line(106, 188, 106, 73);
                $pdf->Line(125, 188, 125, 73);
                $pdf->Line(150, 188, 150, 73);
                $pdf->Line(170, 188, 170, 73);
                $pdf->Line(190, 188, 190, 73);
                $pdf->Line(205, 188, 205, 73);
                $pdf->Line(230, 188, 230, 73);
                $pdf->Line(247, 188, 247, 73);
                $pdf->Line(267, 188, 267, 73);
       
            }
            $UnitCost = number_format($data->unit_cost, 2);
            $Quality_unitcost = $data->quantity * $data->unit_cost;
            $TotalUnit = number_format($Quality_unitcost, 2);

            $pdf->SetXY($x + 15, $y + 10 ); 
            $pdf->multicell(50, 5, $descriptionText, '', 'L');
            $pdf->SetXY($x + 65, $y + 10 ); 
            $pdf->multicell(31, 7, $data->property_no, '', 'L');
            $pdf->SetXY($x + 96, $y + 10 ); 
            $pdf->multicell(19, 7, $data->unit, '', 'C');
            $pdf->SetXY($x + 115, $y + 10 ); 
            $pdf->multicell(25, 7, $UnitCost, '', 'C');
            $pdf->SetXY($x + 140, $y + 10 ); 
            $pdf->multicell(20, 7, $data->quantity, '', 'C');
            $pdf->SetXY($x + 160, $y + 10 ); 
            $pdf->multicell(20, 7, '', '', 'C');
            $pdf->SetXY($x + 180, $y + 10 ); 
            $pdf->multicell(15, 7, '', '', 'C');
            $pdf->SetXY($x + 195, $y + 10 ); 
            $pdf->multicell(25, 7, $TotalUnit, '', 'C');

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
        $this->Cell(0, 10, 'Annex A.8', 0, 1, 'R');
        $this->SetFont('times', 'B', 12);
        $this->Cell(0, 6, 'REPORT ON THE PHYSICAL COUNT OF SEMI-EXPENDABLE PROPERTTY', 0, 1, 'C');
        $this->Cell(0, 6, 'INFORMATION & COMMUNICATION TECHNOLOGY', 0, 1, 'C');
        $this->SetFont('times', 'B', 10);
        $this->Cell(0, 6, 'As of DECEMBER 31, 2023', 0, 1, 'C');
    }
    function __construct()
    {
        parent::__construct('L', 'mm', 'A4'); 
    }
}

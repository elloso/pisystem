<?php
defined('BASEPATH') or exit('No direct script access allowed');
require('assets/fpdf/fpdf.php');

class Fpdf_Controller extends CI_Controller
{
    public function IARform()
    {
        
        $pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('times', 'B', 14);
$pdf->Cell(0, 10, 'INSPECTION AND ACCEPTANCE REPORT', 0, 1, 'C');
$pdf->Ln(7);
$pdf->SetFont('times', 'B', 12);
$pdf->Cell(25, 8, 'Entity Name:', '', 0, 'L');
$pdf->SetFont('times', '', 12);
$pdf->Cell(58, 8, '', 'B', 0, 'R');
$pdf->SetFont('times', 'B', 12);
$pdf->Cell(60, 8, 'Fund Cluster:', '', 0, 'R');
$pdf->SetFont('times', '', 12);
$pdf->Cell(43, 8, '', 'B', 1, 'L'); // This '1' in the last parameter causes a line break after the Cell.

$pdf->SetFont('times', '', 10);

// Set the position for the content
$x = $pdf->GetX();
$y = $pdf->GetY() + 3; // Adjust the Y position for content alignment.

// Set the dimensions for the content
$contentWidth = 190;
$contentHeight = 220;

// Draw a border around the content
$pdf->Rect($x, $y, $contentWidth, $contentHeight);

// Move the cursor to the content area
$pdf->SetXY($x, $y); 
$pdf->Cell(15, 8, 'Supplier :', '', 0, 'L');
$pdf->Cell(85, 8, '', 'B', 0, 'C');
$pdf->Cell(10, 8, '', '', 0, 'C');
$pdf->Cell(15, 8, 'IAR No. :', '', 0, 'L');
$pdf->Cell(65, 8, '', 'B', 0, 'L');
$pdf->SetXY($x, $y + 8); 
$pdf->Cell(22, 8, 'PO No./Date :', '', 0, 'L');
$pdf->Cell(78, 8, '', 'B', 0, 'C');
$pdf->Cell(10, 8, '', '', 0, 'C');
$pdf->Cell(10, 8, 'Date :', '', 0, 'L');
$pdf->Cell(70, 8, '', 'B', 0, 'L');
$pdf->SetXY($x, $y + 16); 
$pdf->Cell(45, 8, 'Requisitioning Office/Dept. :', '', 0, 'L');
$pdf->Cell(55, 8, '', 'B', 0, 'C');
$pdf->Cell(10, 8, '', '', 0, 'C');
$pdf->Cell(20, 8, 'Invoice No.', '', 0, 'L');
$pdf->Cell(60, 8, '', 'B', 0, 'L');
$pdf->SetXY($x, $y + 24); 
$pdf->Cell(45, 8, 'Responsibility Center Code :', '', 0, 'L');
$pdf->Cell(55, 8, '', 'B', 0, 'C');
$pdf->Cell(10, 8, '', '', 0, 'C');
$pdf->Cell(10, 8, 'Date :', '', 0, 'L');
$pdf->Cell(70, 8, '', 'B', 0, 'L');
$pdf->SetXY($x, $y + 34); 
$pdf->Cell(30, 10, 'Stock/Property No.', 'LTRB', 0, 'C');
$pdf->Cell(80, 10, 'Description', 'LTRB', 0, 'C');
$pdf->Cell(20, 10, 'Unit', 'LTRB', 0, 'C');
$pdf->Cell(60, 10, 'Quantity', 'LTRB', 0, 'C');

$pdf->SetFont('times', 'I', 13);
$pdf->SetXY($x, $y + 160); 
$pdf->Cell(95, 10, 'INSPECTION', 'TRB', 0, 'C');
$pdf->Cell(95, 10, 'ACCEPTANCE', 'LTB', 0, 'C');
$pdf->SetFont('times', '', 10);

$pdf->SetXY($x, $y + 170); 

$pdf->Cell(30, 7, 'Date Inspected :', '', 0, 'L');
$pdf->Cell(55, 7, '', 'B', 0, 'L');
$pdf->Cell(10, 7, '', '', 0, 'L');

$pdf->Cell(30, 7, 'Date Received :', '', 0, 'L');
$pdf->Cell(55, 7, '', 'B', 0, 'L');
$pdf->Cell(10, 7, '', '', 0, 'L');

$pdf->CheckBox($x + 10, $y + 190, false);




$pdf->SetFont('times', '', 12);
$pdf->Output();
        
    }
}

class PDF extends FPDF
{
    function Header()
    {

        $this->SetFont('times', 'I', 12);
        $this->Cell(0, 10, 'Appendix 62', 0, 1, 'R');
    }
    function CheckBox($x, $y, $checked) {
        $this->SetXY($x, $y);
        $this->Rect($x, $y, 5, 5, 'D');
        if ($checked) {
            $this->Text($x + 1, $y + 4, 'X');
        }
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');
require('assets/fpdf/fpdf.php');

class RSPIICSpdf_Controller extends CI_Controller
{
    public function RSPIform()
    {
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
            $pdf->Cell(47, 8, '', 'B', 1, 'L');
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
            $pdf->Cell(145, 5, 'To filled out by the Property and /or Supply Division/ Unit', 'BR', 0, 'C');
            $pdf->SetFont('times', 'I', 8);
            $pdf->SetXY($x + 145, $y); 
            $pdf->Cell(45, 5, 'To filled out by the Accounting Unit', 'B', 0, 'C');

            $pdf->SetXY($x, $y + 5); 
            $pdf->Cell(30, 8, '', 'BR', 0, 'C');
            $pdf->SetXY($x + 30, $y + 5); 
            $pdf->Cell(30, 8, '', 'BR', 0, 'C');
            $pdf->SetXY($x + 60, $y + 5); 
            $pdf->Cell(30, 8, '', 'BR', 0, 'C');
            $pdf->SetXY($x + 90, $y + 5); 
            $pdf->Cell(30, 8, '', 'BR', 0, 'C');
            $pdf->SetXY($x + 120, $y + 5); 
            $pdf->Cell(13, 8, '', 'BR', 0, 'C');
            $pdf->SetXY($x + 133, $y + 5); 
            $pdf->Cell(12, 8, '', 'BR', 0, 'C');

            $pdf->SetXY($x + 145, $y + 5); 
            $pdf->Cell(23, 8, '', 'LTRB', 0, 'C');
            $pdf->SetXY($x + 168, $y + 5); 
            $pdf->Cell(22, 8, '', 'LTRB', 0, 'C');

            $pdf->SetFont('times', '', 10);
            $pdf->SetXY($x, $y + 165); 
            $pdf->Cell(120, 35, '', 'TR', 0, 'C');
            $pdf->SetXY($x + 120, $y + 165); 
            $pdf->Cell(70, 35, '', 'T', 0, 'C');

       

           
            // $pdf->Line(28, 268, 28, 82);
            // $pdf->Line(53, 268, 53, 82);
            // $pdf->Line(73, 268, 73, 82);
            // $pdf->Line(120, 268, 120, 82);
            // $pdf->Line(150, 268, 150, 82);
          

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

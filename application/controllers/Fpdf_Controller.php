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
        $pdf->SetFont('times', '', 12);
        $pdf->Cell(25, 8, 'Entity Name:', '', 0, 'L');
        $pdf->SetFont('times', '', 12);
        $pdf->Cell(66, 8, '', 'B', 0, 'R');
        $pdf->SetFont('times', '', 12);
        $pdf->Cell(50, 8, 'Fund Cluster:', '', 0, 'R');
        $pdf->SetFont('times', '', 12);
        $pdf->Cell(34, 8, '', 'B', 0, 'L');
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
}

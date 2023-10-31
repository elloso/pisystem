<?php
defined('BASEPATH') or exit('No direct script access allowed');
require('assets/fpdf/fpdf.php');

class ICSfpdf_Controller extends CI_Controller
{
    public function ICSform()
    {
        $pdf = new PDF();
        $pdf->AddPage();
        $pdf->SetFont('times', 'B', 14);
        $pdf->Cell(0, 10, 'INVENTORY CUSTODIAN SLIP', 0, 1, 'C');
        $pdf->Ln(7);
        $pdf->SetFont('times', '', 12);
        $pdf->Cell(25, 6, 'Entity Name:', '', 0, 'L');
        $pdf->SetFont('times', '', 12);
        $pdf->Cell(66, 6, '', 'B', 0, 'L'); // Entity Name input field
        $pdf->Ln(7);
        $pdf->Cell(25, 6, 'Fund Cluster:', '', 0, 'L');
        $pdf->SetFont('times', '', 12);
        $pdf->Cell(66, 6, '', 'B', 0, 'L'); // Fund Cluster input field
        $pdf->Cell(35);
        $pdf->Cell(16, 6, 'ICS No:', '', 0, 'L');
        $pdf->SetFont('times', '', 12);
        $pdf->Cell(46, 8, '', 'B', 0, 'L'); // ICS No input field
        $pdf->Ln(9);
        $pdf->SetFont('times', 'B', 12);
        $pdf->Cell(20, 14, 'Quantity', 1, 0, 'C');
        $pdf->Cell(20, 14, 'Unit', 1, 0, 'C');
        $pdf->Cell(40, 5, 'Amount', 1, 0, 'C'); // Increase the height to match the Quantity and Unit cells
        $pdf->Cell(20, 14, 'Unit Cost', 1, 0, 'C');
        $pdf->Cell(20, 14, 'Total Cost', 1, 0, 'C');
        $pdf->Cell(40, 14, 'Description', 1, 1, 'C'); // Increase the height to match the other cells
        $pdf->Output();
    }
}
class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('times', 'I', 12);
        $this->Cell(0, 10, 'Appendix 59', 0, 1, 'R');
    }
}

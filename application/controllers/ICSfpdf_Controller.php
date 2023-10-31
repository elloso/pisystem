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
        $pdf->Cell(66, 6, '', 'B', 0, 'L');
        $pdf->Ln(7);
        $pdf->Cell(25, 6, 'Fund Cluster:', '', 0, 'L');
        $pdf->SetFont('times', '', 12);
        $pdf->Cell(66, 6, '', 'B', 0, 'L');
        $pdf->Cell(35);
        $pdf->Cell(16, 6, 'ICS No:', '', 0, 'L');
        $pdf->SetFont('times', '', 12);
        $pdf->Cell(46, 6, '', 'B', 0, 'L');
        $pdf->SetLineWidth(0.4);
        $pdf->Rect(10, 53, 190, 220);
        $pdf->Line(10, 230, 200, 230);
        $middleX = $pdf->GetPageWidth() / 2;
        $pdf->Line($middleX, 230, $middleX, 273);
        $pdf->Ln(9);
        $pdf->SetFont('times', '', 12);
        $pdf->Cell(20, 14, 'Quantity', 1, 0, 'C');
        $pdf->Cell(10, 14, 'Unit', 1, 0, 'C',);
        $pdf->Cell(42, 5, 'Amount', 1, 1, 'C');
        $pdf->Cell(30);
        $pdf->Cell(20, 9, 'Unit Cost', 1, 0, 'C',);
        $pdf->Cell(22, 9, 'Total Cost', 1, 0, 'C',);
        $pdf->SetY(53);
        $pdf->SetX(82);
        $pdf->Cell(68, 14, 'Description', 1, 0, 'C');
        $pdf->MultiCell(20, 7, 'Inventory Item No.', 1, 'C');
        $pdf->SetY(53);
        $pdf->SetX(170);
        $pdf->MultiCell(30, 7, 'Estimated Useful Life', 1, 'C');
        $pdf->SetY(230);
        $pdf->SetFont('times', '', 11);
        $pdf->SetLineWidth(0.3);
        $pdf->Cell(20, 9, 'Received from:', 0, 0, 'L');
        $pdf->SetY(242);
        $pdf->Line(20, 245, 95, 245);
        $pdf->SetX(30);
        $pdf->Cell(20, 11, 'Signature Over Printed Name', 0, 0, 'L');
        $pdf->SetY(252);
        $pdf->Line(20, 255, 95, 255);
        $pdf->SetX(40);
        $pdf->Cell(20, 11, 'Position/Office', 0, 0, 'L');
        $pdf->SetY(262);
        $pdf->Line(20, 265, 95, 265);
        $pdf->SetX(45);
        $pdf->Cell(20, 11, 'Date', 0, 0, 'L');
        $pdf->SetY(230);
        $pdf->SetX(105);
        $pdf->SetFont('times', '', 11);
        $pdf->SetLineWidth(0.3);
        $pdf->Cell(20, 9, 'Received by:', 0, 0, 'L');
        $pdf->SetY(242);
        $pdf->Line(115, 245, 188, 245);
        $pdf->SetX(127);
        $pdf->Cell(20, 11, 'Signature Over Printed Name', 0, 0, 'L');
        $pdf->SetY(252);
        $pdf->Line(115, 255, 188, 255);
        $pdf->SetX(137);
        $pdf->Cell(20, 11, 'Position/Office', 0, 0, 'L');
        $pdf->SetY(262);
        $pdf->Line(115, 265, 188, 265);
        $pdf->SetX(145);
        $pdf->Cell(20, 11, 'Date', 0, 0, 'L');

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
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(0, 10, '149', 0, 0, 'C');
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');
require('assets/fpdf/fpdf.php');
class ICSfpdf_Controller extends CI_Controller
{
    public function ICSform($icsForm)
    {
        $pdf = new PDF();
        $ics_form = $this->Fpdf_Model->ics_form($icsForm);
        $po_items = $this->Fpdf_Model->ics_item($icsForm);
        $pdf->AddPage();
        $pdf->SetFont('times', 'B', 14);
        $pdf->Cell(0, 10, 'INVENTORY CUSTODIAN SLIP', 0, 1, 'C');
        $pdf->Ln(7);
        $pdf->SetFont('times', '', 12);
        $pdf->Cell(25, 6, 'Entity Name:', '', 0, 'L');
        $pdf->SetFont('times', '', 12);
        $pdf->Cell(66, 6, 'Southern Luzon State University', 'B', 0, 'L');
        $pdf->Ln(7);
        $pdf->Cell(25, 6, 'Fund Cluster:', '', 0, 'L');
        $pdf->SetFont('times', '', 12);
        $pdf->Cell(66, 6, $ics_form->ics_fund, 'B', 0, 'L');
        $pdf->Cell(35);
        $pdf->Cell(16, 6, 'ICS No:', '', 0, 'L');
        $pdf->SetFont('times', '', 12);
        $pdf->Cell(46, 6, $ics_form->ics_no, 'B', 0, 'L');
        $pdf->SetLineWidth(0.4);
        $pdf->Rect(10, 53, 190, 220);
        $pdf->Line(10, 230, 200, 230);
        $middleX = $pdf->GetPageWidth() / 2;
        $pdf->Line($middleX, 230, $middleX, 273);
        $pdf->Line(30, 53, 30, 230);
        $pdf->Line(40, 53, 40, 230);
        $pdf->Line(60, 58, 60, 230);
        $pdf->Line(82, 53, 82, 230);
        $pdf->Line(150, 53, 150, 230);
        $pdf->Line(170, 53, 170, 230);
        $pdf->Ln(9);
        $pdf->SetFont('times', 'B', 10);
        $pdf->Cell(20, 14, 'Quantity', 'RB', 0, 'C');
        $pdf->Cell(10, 14, 'Unit', 'RB', 0, 'C',);
        $pdf->Cell(42, 5, 'Amount', 'RB', 1, 'C');
        $pdf->Cell(30);
        $pdf->Cell(20, 9, 'Unit Cost', 'RB', 0, 'C',);
        $pdf->Cell(22, 9, 'Total Cost', 'RB', 0, 'C',);
        $pdf->SetY(53);
        $pdf->SetX(82);
        $pdf->Cell(68, 14, 'Description', 'RB', 0, 'C');
        $pdf->MultiCell(20, 7, 'Inventory Item No.', 'RB', 'C');
        $pdf->SetY(53);
        $pdf->SetX(170);
        $pdf->MultiCell(30, 7, 'Estimated Useful Life', 'RB', 'C');
        $pdf->SetY(230);
        $pdf->SetFont('times', '', 10);
        $pdf->SetLineWidth(0.3);
        $pdf->Cell(20, 9, 'Received from:', 0, 0, 'L');
        $pdf->SetY(239);
        $pdf->SetX(20);
        $pdf->SetFont('times', 'B', 10);
        $pdf->Cell(75, 6, $ics_form->ics_receivedfrom, 'B', 0, 'C');
        $pdf->SetY(242);
        $pdf->SetX(30);
        $pdf->SetFont('times', '', 10);
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
        $pdf->SetFont('times', '', 10);
        $pdf->SetLineWidth(0.3);
        $pdf->Cell(20, 9, 'Received by:', 0, 0, 'L');
        $pdf->SetY(239);
        $pdf->SetX(115);
        $pdf->SetFont('times', 'B', 10);
        $pdf->Cell(73, 6, $ics_form->ics_receivedby, 'B', 0, 'C');
        $pdf->SetFont('times', '', 10);
        $pdf->SetY(242);
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
        $x = 1;
        $y = 67;
        $pdf->SetFont('times', '', 9);
        foreach ($po_items as $item) {
            $pdf->SetXY($x, $y);
            $descriptionWidth = 65;
            $descriptionText = $item->item_description;
            $descriptionLines = ceil($pdf->GetStringWidth($descriptionText) / $descriptionWidth);
            $descriptionHeight = 7 * $descriptionLines;
            $pdf->Cell(35, $descriptionHeight, $item->quantity, 0, 0, 'C');
            $pdf->SetX(31);
            $pdf->Cell(0, $descriptionHeight, $item->unit, 0, 0);
            $pdf->SetX(40);
            $pdf->Cell(0, $descriptionHeight, $item->unit_cost, 0, 0);
            $pdf->SetX(60);
            $pdf->Cell(0, $descriptionHeight, $item->total_unit_cost, 0, 0);
            $pdf->SetXY(82, $y);
            $pdf->MultiCell($descriptionWidth, 6,'* '. $descriptionText, 0, 'L');
            $pdf->SetXY(157, $y);
            $pdf->Cell(0, $descriptionHeight, $item->item_no, 0, 0);
            $pdf->SetXY(183, $y);
            $pdf->Cell(0, $descriptionHeight, $item->useful_life, 0, 0);
            $y += max(8, $descriptionHeight);
        }
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
        $this->SetFont('Arial', '', 8);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(0, 10, '149', 0, 0, 'C');
    }
}

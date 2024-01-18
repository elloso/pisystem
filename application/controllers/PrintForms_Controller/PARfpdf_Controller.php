<?php
defined('BASEPATH') or exit('No direct script access allowed');
require('assets/fpdf/fpdf.php');
class PARfpdf_Controller extends CI_Controller
{
    public function PARform($parForm)
    {
        $pdf = new PDF();
        $par_form = $this->Fpdf_Model->par_form($parForm);
        $po_items = $this->Fpdf_Model->par_item($parForm);
        $pdf->AddPage();
        $pdf->SetFont('times', 'B', 14);
        $pdf->Cell(0, 10, '', 0, 1, 'C');
        $pdf->Cell(0, 6, 'PROPERTY ACKNOWLEDGEMENT RECEIPT', 0, 1, 'C');
        $pdf->Cell(0, 6, 'Supply and Property Office', 0, 1, 'C');
        $pdf->Ln(4);
        $x = $pdf->GetX();
        $y = $pdf->GetY(); 
        $contentWidth = 190;
        $contentHeight = 220;
        $pdf->Rect($x, $y, $contentWidth, $contentHeight);

       
        $pdf->SetFont('times', '', 10);
        $pdf->Cell(30, 8, 'Fund Cluster:', 'BR', 0, 'L');
        $pdf->SetFont('times', 'B', 10);
        $pdf->Cell(80, 8, $par_form->par_fund, 'BR', 0, 'L');
        $pdf->SetFont('times', '', 10);
        $pdf->Cell(25, 8, 'PAR No. :', 'BR', 0, 'C');
        $pdf->SetFont('times', 'B', 10);
        $pdf->Cell(55, 8, $par_form->par_no, 'B', 1, 'C');

        $pdf->SetFont('times', '', 10);
        $pdf->Cell(30, 8, 'Supplier :', 'BR', 0, 'L');
        $pdf->SetFont('times', 'B', 10);
        $pdf->Cell(80, 8, $par_form->supplier, 'BR', 0, 'L');
        $pdf->SetFont('times', '', 10);
        $pdf->Cell(25, 8, 'IAR No. :', 'BR', 0, 'C');
        $pdf->SetFont('times', 'B', 10);
        $pdf->Cell(55, 8, $par_form->par_iarno, 'B', 1, 'C');

        $pdf->SetFont('times', '', 10);
        $pdf->Cell(30, 8, '', 'B', 0, 'L');
        $pdf->SetFont('times', 'B', 10);
        $pdf->Cell(80, 8, '', 'RB', 0, 'L');
        $pdf->SetFont('times', '', 10);
        $pdf->Cell(25, 8, 'PO No. :', 'BR', 0, 'C');
        $pdf->SetFont('times', 'B', 10);
        $pdf->Cell(55, 8, $par_form->po_number, 'B', 1, 'C');

        $pdf->Cell(15, 8, 'Qty', 'BR', 0, 'C');
        $pdf->Cell(15, 8, 'Unit', 'BR', 0, 'C');
        $pdf->Cell(80, 8, 'Description', 'BR', 0, 'C');
        $pdf->Multicell(25, 4, 'Property Number', 'BR', 'C');
        $pdf->SetXY($x + 135, $y + 24); 
        $pdf->Multicell(20, 4, 'Date Acquired', 'BR', 'C');
        $pdf->SetXY($x + 155, $y + 24); 
        $pdf->Multicell(18, 8, 'Unit Price', 'BR', 'C');
        $pdf->SetXY($x + 173, $y + 24); 
        $pdf->Multicell(17, 8, 'Amount', 'B', 'C');














        $pdf->SetXY($x, $y + 170); 
        $pdf->Cell(95, 10, '', 'T', 0, 'L');
        $pdf->Cell(95, 10, '', 'T', 0, 'L');

        $pdf->SetFont('times', '', 10);
        $pdf->SetXY($x, $y + 170); 
        $pdf->Cell(30, 7, 'Received by :', '', 0, 'L');
        $pdf->Cell(55, 7, '', '', 0, 'C');
        $pdf->Cell(10, 7, '', '', 0, 'L');

        $pdf->Cell(30, 7, 'Issued by :', '', 0, 'L');
        $pdf->Cell(55, 7, '', '', 0, 'C');
        $pdf->Cell(10, 7, '', '', 0, 'L');

        $pdf->SetXY($x + 22, $y + 182); 
        $pdf->SetFont('times', 'B', 10);
        $pdf->Cell(60, 5, $par_form->par_receivedby, 'B',0, 'C');
        $pdf->SetFont('times', '', 10);
        $pdf->SetXY($x + 22, $y + 188); 
        $pdf->Cell(60, 5, 'Supply and/or Property Custodian', '',0, 'C');
        $pdf->SetFont('times', 'I', 10);
        $pdf->SetXY($x + 22, $y + 193); 
        $pdf->Cell(60, 5, '', '',0, 'C');
        $pdf->SetFont('times', '', 10);
        $pdf->SetXY($x + 22, $y + 198); 
        $pdf->Cell(60, 5, 'Position/Office', '',0, 'C');
        $pdf->SetXY($x + 32, $y + 202); 
        $pdf->Cell(40, 5, '', 'B',0, 'C');
        $pdf->SetXY($x + 22, $y + 207); 
        $pdf->Cell(60, 5, 'Date', '',0, 'C');

        $pdf->SetXY($x + 120, $y + 182); 
        $pdf->SetFont('times', 'B', 10);
        $pdf->Cell(60, 5,  $par_form->par_receivedfrom, 'B',0, 'C');
        $pdf->SetFont('times', '', 10);
        $pdf->SetXY($x + 120, $y + 188); 
        $pdf->Cell(60, 5, 'Signature Over Printed Name of End-User', '',0, 'C');
        $pdf->SetXY($x + 120, $y + 193); 
        $pdf->SetFont('times', 'I', 10);
        $pdf->Cell(60, 5, 'Head, Supply and Property', '',0, 'C');
        $pdf->SetFont('times', '', 10);
        $pdf->SetXY($x + 120, $y + 198); 
        $pdf->Cell(60, 5, 'Position/Office', '',0, 'C');
        $pdf->SetXY($x + 130, $y + 202); 
        $pdf->Cell(40, 5, '', 'B',0, 'C');
        $pdf->SetXY($x + 120, $y + 207); 
        $pdf->Cell(60, 5, 'Date', '',0, 'C');

        //Line
        $pdf->Line(25, 96, 25, 234);
        $pdf->Line(40, 96, 40, 234);
        $pdf->Line(120, 96, 120, 234);
        $pdf->Line(145, 96, 145, 234);
        $pdf->Line(165, 96, 165, 234);
        $pdf->Line(183, 96, 183, 234);
       

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
        $this->Cell(0, 10, 'Appendix 71', 0, 1, 'R');
        $this->SetFont('times', 'B', 12);
        $this->Cell(0, 6, 'Republic of the Philippines', 0, 1, 'C');
        $this->Cell(0, 6, 'SOUTHERN  LUZON STATE  UNIVERSITY', 0, 1, 'C');
        $this->Cell(0, 6, 'Lucban, Quezon', 0, 1, 'C');
    }
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', '', 8);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(0, 10, 'AFA-SAP-1.01F3 Property Acknowledgement Receipt', 0, 0, 'L');
    }
}

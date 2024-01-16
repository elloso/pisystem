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
            $pdf->Cell(0, 10, '', 0, 1, 'C');
            $pdf->Cell(0, 6, 'INSPECTION AND ACCEPTANCE REPORT', 0, 1, 'C');
            $pdf->Cell(0, 6, 'Supply and Property Office', 0, 1, 'C');

            $pdf->Ln(7);
            $pdf->SetFont('times', 'B', 12);
            $pdf->Cell(25, 15, 'Entity Name:', 'LTB', 0, 'L');
            $pdf->SetFont('times', '', 12);
            $pdf->Cell(85, 15, 'SOUTHERN LUZON STATE UNIVERSITY', 'TB', 0, 'C');
            $pdf->SetFont('times', 'B', 12);
            $pdf->Cell(33, 15, 'Fund Cluster:', 'LTB', 0, 'R');
            $pdf->SetFont('times', '', 12);
            $pdf->Cell(47, 15, $iar_data->fund_cluster, 'TRB', 1, 'L');

            $pdf->Cell(25, 8, 'Supplier:', 'LTRB', 0, 'L');
            $pdf->SetFont('times', '', 12);
            $pdf->Cell(85, 8, $iar_data->iar_supplier, 'LTRB', 0, 'L');
            $pdf->SetFont('times', 'B', 12);
            $pdf->Cell(33, 8, 'IAR No.', 'LTRB', 0, 'R');
            $pdf->SetFont('times', '', 12);
            $pdf->Cell(47, 8, $iar_data->iar_number, 'LTRB', 1, 'L');

            $pdf->Cell(25, 8, 'Supplier:', 'LTRB', 0, 'L');
            $pdf->SetFont('times', '', 12);
            $pdf->Cell(85, 8, $iar_data->iar_supplier, 'LTRB', 0, 'L');
            $pdf->SetFont('times', 'B', 12);
            $pdf->Cell(33, 8, 'IAR No.', 'LTRB', 0, 'R');
            $pdf->SetFont('times', '', 12);
            $pdf->Cell(47, 8, $iar_data->iar_number, 'LTRB', 1, 'L');
           

            $pdf->SetFont('times', '', 10);

            $x = $pdf->GetX();
            $y = $pdf->GetY() + 3; 
          
           
            
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
        $imagePath = 'assets/img/slsu/slsu_logo.png'; 
        $this->Image($imagePath, $this->GetX() + 4, $this->GetY(), 25);
        $this->SetFont('times', 'I', 12);
        $this->Cell(0, 10, 'Appendix 62', 0, 1, 'R');
        $this->SetFont('times', 'B', 12);
        $this->Cell(0, 6, 'Republic of the Philippines', 0, 1, 'C');
        $this->Cell(0, 6, 'SOUTHERN  LUZON STATE  UNIVERSITY', 0, 1, 'C');
        $this->Cell(0, 6, 'Lucban, Quezon', 0, 1, 'C');
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

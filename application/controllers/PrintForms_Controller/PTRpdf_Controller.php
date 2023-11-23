<?php
defined('BASEPATH') or exit('No direct script access allowed');
require('assets/fpdf/fpdf.php');
class PTRpdf_Controller extends CI_Controller
{
    public function PTRform($po_id,$id_tblpo_item)
    {

        $actual_po_id = $po_id;
        $actual_icsrsepi_po_id = $id_tblpo_item;
        $rsepi_data = $this->Fpdf_Model->DataRSEPI_PTR($po_id,$actual_icsrsepi_po_id);
        $dataFromDatabase = $this->Fpdf_Model->getCheckboxData($actual_icsrsepi_po_id);
       
       
        $pdf = new PDF();
        $pdf->AddPage();
        $pdf->SetFont('times', 'B', 12);
        $pdf->Cell(0, 10, 'PROPERTY TRANSFER REPORT', 0, 1, 'C');
        $pdf->Ln(7);
        $pdf->SetFont('times', 'B', 10);
        $pdf->Cell(23, 8, 'Entity Name:', '', 0, 'L');
        $pdf->SetFont('times', '', 10);
        $pdf->Cell(68, 8, 'SOUTHERN LUZON STATE UNIVERSITY', 'B', 0, 'L');
        $pdf->SetFont('times', '', 10);
        $pdf->Cell(29, 8, '', '', 0, 'L');
        $pdf->SetFont('times', 'B', 10);
        $pdf->Cell(25, 8, 'Fund Cluster:', '', 0, 'R');
        $pdf->SetFont('times', '', 10);
        $pdf->Cell(45, 8, $rsepi_data->ics_fund, 'B', 1, 'L');
        
        $pdf->SetFont('times', '', 10);
        $x = $pdf->GetX();
        $y = $pdf->GetY() + 3; 

        $contentWidth = 190;
        $contentHeight = 225;
        $pdf->Rect($x, $y, $contentWidth, $contentHeight);

        $pdf->SetXY($x, $y);
        $pdf->Cell(190, 14, '', 'B', 1, 'L');
        $pdf->SetXY($x, $y);
        $pdf->Cell(125, 14, '', 'R', 1, 'L');

        $pdf->SetXY($x, $y);
        $pdf->SetFont('times', '', 9);
        $pdf->Cell(65, 6, 'From Accountable Officer/Agency/Fund Cluster :', '', 1, 'L');
        $pdf->SetXY($x+65, $y);
        $pdf->Cell(50, 6, $rsepi_data->ics_receivedby, 'B', 1, 'L');
        $pdf->SetXY($x+110, $y);
        $pdf->Cell(11, 6, '', '', 1, 'L');
        $pdf->SetXY($x+120, $y);
        $pdf->Cell(20, 6, 'ITR No. :', '', 1, 'R');
        $pdf->SetXY($x+140, $y);
        $pdf->Cell(40, 6, $rsepi_data->itr_no, 'B', 1, 'L');
        $pdf->SetXY($x+180, $y);
        $pdf->Cell(10, 6, '', '', 1, 'L');
        $pdf->SetXY($x, $y+6);
        $pdf->Cell(65, 6, 'To Accountable Officer/Agency/Fund Cluster:', '', 1, 'L');
        $pdf->SetXY($x+65, $y+6);
        $pdf->Cell(50, 6, $rsepi_data->received, 'B', 1, 'L');
        $pdf->SetXY($x+115, $y+6);   
        $pdf->Cell(5, 6, '', '', 1, 'L');  

        $pdf->SetXY($x+120, $y+6);
        $pdf->Cell(20, 6, 'Date :', '', 1, 'R'); 
        $pdf->SetXY($x+140, $y+6);
        $pdf->Cell(40, 6, $rsepi_data->date_transfer, 'B', 1, 'L');
        $pdf->SetXY($x+180, $y+6);
        $pdf->Cell(10, 6, '', '', 1, 'L');

        $pdf->SetFont('times', '', 8);
        $pdf->SetXY($x, $y+15);
        $pdf->Cell(190, 14, '', 'B', 1, 'L');
        $pdf->SetXY($x, $y+14);
        $pdf->Cell(40, 6, 'Transfer Type: (check only one)', '', 1, 'L');

        $donationChecked = ($rsepi_data->transfer_type == "Donation") ? true : false;
        $reassignmentChecked = ($rsepi_data->transfer_type == "Reassignment") ? true : false;
        $relocateChecked = ($rsepi_data->transfer_type == "Relocate") ? true : false;
        $othersChecked = ($rsepi_data->transfer_type == "Others (Specify)") ? true : false;
       
        $pdf->CheckBox($x + 50, $y +15, $donationChecked);
        $pdf->SetXY($x+56, $y+15.5);
        $pdf->Cell(30, 5, 'Donation', '', 1, 'L');
        
        $pdf->CheckBox($x + 50, $y +22, $reassignmentChecked);
        $pdf->SetXY($x+56, $y+22);
        $pdf->Cell(30, 5, 'Reassignment', '', 1, 'L');
        
        $pdf->CheckBox($x + 100, $y +15, $relocateChecked);
        $pdf->SetXY($x+107, $y+22);
        $pdf->Cell(30, 5, 'Others (Specify)', '', 1, 'L');
       
        $pdf->CheckBox($x + 100, $y +22, $othersChecked);
        $pdf->SetXY($x+107, $y+15);
        $pdf->Cell(30, 5, 'Relocate', '', 1, 'L');

        $pdf->SetXY($x+128, $y+22);
        $pdf->Cell(30, 5, $rsepi_data->others_specifiy, 'B', 1, 'L');

        $pdf->SetXY($x, $y+29);
        $pdf->SetFont('times', '', 10);
        $pdf->Cell(25, 8, 'Date Acquired', 'B', 1, 'C');
        $pdf->SetXY($x+25, $y+29);
        $pdf->Cell(25, 8, 'Item No.', 'LBR', 1, 'C');
        $pdf->SetXY($x+50, $y+29);
        $pdf->Cell(25, 8, 'ICS No./Date', 'BR', 1, 'C');
        $pdf->SetXY($x+75, $y+29);
        $pdf->Cell(50, 8, 'Description', 'BR', 1, 'C');

        $pdf->SetXY($x+125, $y+29);
        $pdf->Cell(30, 8, 'Amount', 'B', 1, 'C');
        $pdf->SetXY($x+155, $y+29);
        $pdf->Cell(35, 8, 'Condition of Inventory', 'LB', 1, 'C');

        $pdf->SetXY($x, $y+160);
        $pdf->Cell(190, 60, '', 'T', 0, 'C');
        $pdf->SetXY($x, $y+160);
        $pdf->Cell(35, 8, 'Reason/s for Transfer:', '', 1, 'C');
        $pdf->SetXY($x+40, $y+161);
        $pdf->Cell(110, 8, $rsepi_data->reason_transfer, 'B', 1, 'L');
        $pdf->SetXY($x+40, $y+166);
        $pdf->Cell(110, 8, '', 'B', 1, 'L');
        $pdf->SetXY($x+40, $y+171);
        $pdf->Cell(110, 8, '', 'B', 1, 'L');
        $pdf->SetXY($x+40, $y+176);
        $pdf->Cell(110, 8, '', 'B', 1, 'L');
        
        $pdf->SetFont('times', '', 8);
        $pdf->SetXY($x+35, $y+195);
        $pdf->SetFont('times', 'B', 9);
        $pdf->Cell(30, 5, 'Approved by:', '', 0, 'L');
        $pdf->SetFont('times', '', 8);
        $pdf->SetXY($x, $y+190);
        $pdf->Cell(190, 30, '', 'T', 0, 'C');
        $pdf->SetXY($x, $y+200);
        $pdf->Cell(20, 5, 'Signature :', '', 0, 'L');
        $pdf->SetXY($x+20, $y+200);
        $pdf->Cell(15, 5, '', '', 0, 'L');
        $pdf->SetXY($x+35, $y+200);
        $pdf->Cell(50, 5, '', 'B', 0, 'L');
        $pdf->SetXY($x+85, $y+200);
        $pdf->Cell(5, 5, '', '', 0, 'L');
        $pdf->SetXY($x+90, $y+200);
        $pdf->Cell(50, 5, '', 'B', 0, 'L');
        $pdf->SetXY($x+140, $y+200);
        $pdf->Cell(5, 5, '', '', 0, 'L');
        $pdf->SetXY($x+145, $y+200);
        $pdf->Cell(45, 5, '', 'B', 0, 'L');

        $pdf->SetXY($x+90, $y+195);
        $pdf->SetFont('times', 'B', 9);
        $pdf->Cell(30, 5, 'Release/Issued by:', '', 0, 'L');
        $pdf->SetFont('times', '', 8);
        $pdf->SetXY($x, $y+205);
        $pdf->Cell(20, 5, 'Printed Name :', '', 0, 'L');
        $pdf->SetXY($x+20, $y+205);
        $pdf->Cell(15, 5, '', '', 0, 'L');
        $pdf->SetXY($x+35, $y+205);
        $pdf->Cell(50, 5, $rsepi_data->approved, 'B', 0, 'L');
        $pdf->SetXY($x+85, $y+205);
        $pdf->Cell(5, 5, '', '', 0, 'L');
        $pdf->SetXY($x+90, $y+205);
        $pdf->Cell(50, 5, $rsepi_data->released, 'B', 0, 'L');
        $pdf->SetXY($x+140, $y+205);
        $pdf->Cell(5, 5, '', '', 0, 'L');
        $pdf->SetXY($x+145, $y+205);
        $pdf->Cell(45, 5, $rsepi_data->received, 'B', 0, 'L');

        $pdf->SetXY($x+145, $y+195);
        $pdf->SetFont('times', 'B', 9);
        $pdf->Cell(30, 5, 'Received by:', '', 0, 'L');
        $pdf->SetFont('times', '', 8);
        $pdf->SetXY($x, $y+210);
        $pdf->Cell(20, 5, 'Designation :', '', 0, 'L');
        $pdf->SetXY($x+20, $y+210);
        $pdf->Cell(15, 5, '', '', 0, 'L');
        $pdf->SetXY($x+35, $y+210);
        $pdf->Cell(50, 5, '', 'B', 0, 'L');
        $pdf->SetXY($x+85, $y+210);
        $pdf->Cell(5, 5, '', '', 0, 'L');
        $pdf->SetXY($x+90, $y+210);
        $pdf->Cell(50, 5, '', 'B', 0, 'L');
        $pdf->SetXY($x+140, $y+210);
        $pdf->Cell(5, 5, '', '', 0, 'L');
        $pdf->SetXY($x+145, $y+210);
        $pdf->Cell(45, 5, '', 'B', 0, 'L');

        $pdf->SetXY($x, $y+215);
        $pdf->Cell(20, 5, 'Date :', '', 0, 'L');
        $pdf->SetXY($x+20, $y+215);
        $pdf->Cell(15, 5, '', '', 0, 'L');
        $pdf->SetXY($x+35, $y+215);
        $pdf->Cell(50, 5, '', 'B', 0, 'L');
        $pdf->SetXY($x+85, $y+215);
        $pdf->Cell(5, 5, '', '', 0, 'L');
        $pdf->SetXY($x+90, $y+215);
        $pdf->Cell(50, 5, '', 'B', 0, 'L');
        $pdf->SetXY($x+140, $y+215);
        $pdf->Cell(5, 5, '', '', 0, 'L');
        $pdf->SetXY($x+145, $y+215);
        $pdf->Cell(45, 5, '', 'B', 0, 'L');

        $pdf->Line(35, 85, 35, 208);
        $pdf->Line(60, 85, 60, 208);
        $pdf->Line(85, 85, 85, 208);
        $pdf->Line(135, 85, 135 , 208);
        $pdf->Line(165, 85, 165 , 208);

        //Data
        $pdf->SetXY($x, $y+37);
        $pdf->Cell(25, 10, $rsepi_data->date_acquired, '', 0, 'C');
        $pdf->SetXY($x+25, $y+37);
        $pdf->Cell(25, 10, $rsepi_data->rsepi_property_no, '', 0, 'C');
        $pdf->SetXY($x+50, $y+37);
        $pdf->Cell(25, 10, $rsepi_data->ics_no, '', 0, 'C');
        $pdf->SetXY($x+75, $y+37);
        $pdf->multicell(50, 10, $rsepi_data->item_description, 'C');
        $pdf->SetXY($x+125, $y+37);
        $pdf->Cell(30, 10, $rsepi_data->unit_cost, '', 0, 'C');
        $pdf->SetXY($x+155, $y+37);
        $pdf->Cell(35, 10, $rsepi_data->condition_inventory, '', 0, 'C');
     
        $pdf->Output();
    }
}
class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('times', 'I', 12);
        $this->Cell(0, 10, 'Annex A.5', 0, 1, 'R');
    }function CheckBox($x, $y, $checked)
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
        $this->SetFont('Arial', '', 8);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(0, 10, '', 0, 0, 'C');
    }
}

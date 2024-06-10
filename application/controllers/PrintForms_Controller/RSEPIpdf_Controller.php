<?php
defined('BASEPATH') or exit('No direct script access allowed');
require('assets/fpdf/fpdf.php');

class RSEPIpdf_Controller extends CI_Controller
{
    public function RSEPIform()
    {

        $Property = $this->input->post('PropertyDropdown');
        $PropertyYear = $this->input->post('YearDropdown');
        $RegSPIDatas = $this->Fpdf_Model->regspi_item($Property,$PropertyYear);
      
        $pdf = new PDF();
            $pdf->AddPage();
            $pdf->SetFont('times', 'B', 12);
            $pdf->setLineWidth(0.4);
            $pdf->Cell(0, 10, 'REGISTRY OF SEMI-EXPENDABLE PROPERTY ISSUED', 0, 1, 'C');
            $pdf->Ln(7);
            $pdf->SetFont('times', 'B', 10);
            $pdf->Cell(22, 10, 'Entity Name:', '', 0, 'L');
            $pdf->SetFont('times', '', 10);
            $pdf->Cell(80, 8, 'SOUTHERN LUZON STATE UNIVERSITY', 'B', 0, 'L');
            $pdf->SetFont('times', '', 10);
            $pdf->Cell(85, 10, '', '', 0, 'C');
            $pdf->SetFont('times', 'B', 10);
            $pdf->Cell(28, 10, 'Fund Cluster:', '', 0, 'R');
            $pdf->SetFont('times', '', 10);
            $pdf->Cell(62, 8, ' RF MOOE/ STF', 'B', 1, 'L');
            $pdf->Ln(0);
            
            $pdf->SetFont('times', 'B', 10);
            $pdf->Cell(43, 10, 'Semi-expendable Property:', '', 0, 'L');
            $pdf->SetFont('times', '', 10);
            $pdf->Cell(59, 8, $Property, 'B', 0, 'C');
            $pdf->SetFont('times', '', 10);
            $pdf->Cell(85, 10, '', '', 1, 'C');
            $pdf->SetFont('times', '', 8);
            
            $x = $pdf->GetX();
            $y = $pdf->GetY() + 3; 

            $contentWidth = 277;
            $contentHeight = 110;
            $pdf->Rect($x, $y, $contentWidth, $contentHeight);

            $pdf->SetXY($x, $y); 
            $pdf->Cell(15, 14, 'Date', 'RB', 0, 'C');
            $pdf->SetXY($x + 15, $y); 
            $pdf->Cell(40, 4, 'Reference', 'B', 0, 'C');
            $pdf->SetXY($x + 15, $y+4); 
            $pdf->MultiCell(18, 5, 'ICS/RSSP No.', 'RB', 'C');
            $pdf->SetXY($x + 33, $y+4); 
            $pdf->MultiCell(22, 5, 'Semi-expendable Property No.', 'B', 'C');
            $pdf->SetXY($x + 55, $y); 
            $pdf->Cell(40, 14, 'Item Description', 'LB', 0, 'C');
            $pdf->SetXY($x + 95, $y); 
            $pdf->MultiCell(15, 7, 'Estimated Useful Life', 'LRB', 'C');

            $pdf->SetXY($x + 110, $y); 
            $pdf->Cell(45, 4, 'Issued', '', 0, 'C');
            $pdf->SetXY($x + 110, $y+4); 
            $pdf->MultiCell(8, 10, 'Qty.', 'TB', 'C');
            $pdf->SetXY($x + 118, $y+4); 
            $pdf->MultiCell(27, 10, 'Office/Officer', 'TLB', 'C');
            $pdf->SetXY($x + 50, $y); 

            $pdf->SetXY($x + 145, $y); 
            $pdf->Cell(35, 4, 'Returned', 'RL', 0, 'C');
            $pdf->SetXY($x + 145, $y+4); 
            $pdf->MultiCell(8, 10, 'Qty.', 'LTB', 'C');
            $pdf->SetXY($x + 153, $y+4); 
            $pdf->MultiCell(27, 10, 'Office/Officer', 'LTB', 'C');
            $pdf->SetXY($x + 50, $y); 

            $pdf->SetXY($x + 180, $y); 
            $pdf->Cell(35, 4, 'Re-Issued', 'BR', 0, 'C');
            $pdf->SetXY($x + 180, $y+4); 
            $pdf->MultiCell(10, 10, 'Qty.', 'LRB', 'C');
            $pdf->SetXY($x + 190, $y+4); 
            $pdf->MultiCell(25, 10, 'Office/Officer', 'BR', 'C');
            $pdf->SetXY($x + 50, $y); 

            $pdf->SetXY($x + 215, $y); 
            $pdf->Cell(14, 4, 'Disposed', 'RB', 0, 'C');
            $pdf->SetXY($x + 215, $y+4); 
            $pdf->Cell(14, 10, 'Qty.', 'RB', 0, 'C');
            $pdf->SetXY($x + 229, $y); 
            $pdf->Cell(14, 4, 'Balance', 'RB', 0, 'C');
            $pdf->SetXY($x + 229, $y+4); 
            $pdf->Cell(14, 10, 'Qty.', 'RB', 0, 'C');

            $pdf->SetXY($x + 243, $y); 
            $pdf->Cell(17, 14, 'Amount', 'RB', 0, 'C');

            $pdf->SetXY($x + 260, $y); 
            $pdf->Cell(17, 14, 'Remarks', 'B', 0, 'C');

            $pdf->Line(25, 186, 25, 90);
            $pdf->Line(43, 186, 43, 90);
            $pdf->Line(65, 186, 65, 90);
            $pdf->Line(105, 186, 105, 90);
            $pdf->Line(120, 186, 120, 90);
            $pdf->Line(128, 186, 128, 90);
            $pdf->Line(155, 186, 155, 90);
            $pdf->Line(163, 186, 163, 90);
            $pdf->Line(190, 186, 190, 90);
            $pdf->Line(200, 186, 200, 90);
            $pdf->Line(225, 186, 225, 90);
            $pdf->Line(239, 186, 239, 90);
            $pdf->Line(253, 186, 253, 90);
            $pdf->Line(270, 186, 270, 90);

            foreach($RegSPIDatas as $Data){
                $Total = $Data->issued_quantity * $Data->unit_cost;
                $totalUnitCost = number_format($Total, 2);
              
                $descriptionWidth = 40;
                $descriptionText = '* ' . $Data->item_description;
                $descriptionLines = ceil($pdf->GetStringWidth($descriptionText) / $descriptionWidth);
                $descriptionHeight = 6 * $descriptionLines;

                //Returned Qty
                $dataquantity_returned = $this->Fpdf_Model->get_data_by_pcid($Data->pcid);
                $count = count($dataquantity_returned);

                //Reissued Qty
                $dataquantity_reissued = $this->Fpdf_Model->get_data_by_pcid_reissued($Data->pcid);
                $countReissued = count($dataquantity_reissued);

                 //Reissued Qty
                 $dataquantity_disposal = $this->Fpdf_Model->get_data_by_pcid_disposal($Data->pcid);
                 $countDisposal = count($dataquantity_disposal);

                //Returned Name
                $data_from_other_table = $this->Fpdf_Model->get_names_by_pcid($Data->pcid);

                //Reissued Name
                $data_from_other_table_reissued = $this->Fpdf_Model->get_names_by_pcidreissued($Data->pcid);

                // $additionalLines = count($data_from_other_table);
                // $additionalHeight = 5 * $additionalLines;
                
                // if ($y + $descriptionHeight > 195 || $y + $additionalHeight > 195) {
                if ($y + $descriptionHeight > 195) {
                    $pdf->AddPage();
                    $y = 15; 
                    $pdf->SetFont('times', 'B', 12);
                    $pdf->setLineWidth(0.4);
                    $pdf->Cell(0, 10, 'REGISTRY OF SEMI-EXPENDABLE PROPERTY ISSUED', 0, 1, 'C');
                    $pdf->Ln(7);
                    $pdf->SetFont('times', 'B', 10);
                    $pdf->Cell(22, 10, 'Entity Name:', '', 0, 'L');
                    $pdf->SetFont('times', '', 10);
                    $pdf->Cell(80, 8, 'SOUTHERN LUZON STATE UNIVERSITY', 'B', 0, 'L');
                    $pdf->SetFont('times', '', 10);
                    $pdf->Cell(85, 10, '', '', 0, 'C');
                    $pdf->SetFont('times', 'B', 10);
                    $pdf->Cell(28, 10, 'Fund Cluster:', '', 0, 'R');
                    $pdf->SetFont('times', '', 10);
                    $pdf->Cell(62, 8, ' RF MOOE/ STF', 'B', 1, 'L');
                    $pdf->Ln(0);
                    
                    $pdf->SetFont('times', 'B', 10);
                    $pdf->Cell(43, 10, 'Semi-expendable Property:', '', 0, 'L');
                    $pdf->SetFont('times', '', 10);
                    $pdf->Cell(59, 8, $Property, 'B', 0, 'C');
                    $pdf->SetFont('times', '', 10);
                    $pdf->Cell(85, 10, '', '', 1, 'C');
                    $pdf->SetFont('times', '', 8);
                    
                    $x = $pdf->GetX();
                    $y = $pdf->GetY() + 3; 

                    $contentWidth = 277;
                    $contentHeight = 110;
                    $pdf->Rect($x, $y, $contentWidth, $contentHeight);

                    $pdf->SetXY($x, $y); 
                    $pdf->Cell(15, 14, 'Date', 'RB', 0, 'C');
                    $pdf->SetXY($x + 15, $y); 
                    $pdf->Cell(40, 4, 'Reference', 'B', 0, 'C');
                    $pdf->SetXY($x + 15, $y+4); 
                    $pdf->MultiCell(18, 5, 'ICS/RSSP No.', 'RB', 'C');
                    $pdf->SetXY($x + 33, $y+4); 
                    $pdf->MultiCell(22, 5, 'Semi-expendable Property No.', 'B', 'C');
                    $pdf->SetXY($x + 55, $y); 
                    $pdf->Cell(40, 14, 'Item Description', 'LB', 0, 'C');
                    $pdf->SetXY($x + 95, $y); 
                    $pdf->MultiCell(15, 7, 'Estimated Useful Life', 'LRB', 'C');

                    $pdf->SetXY($x + 110, $y); 
                    $pdf->Cell(45, 4, 'Issued', '', 0, 'C');
                    $pdf->SetXY($x + 110, $y+4); 
                    $pdf->MultiCell(8, 10, 'Qty.', 'TB', 'C');
                    $pdf->SetXY($x + 118, $y+4); 
                    $pdf->MultiCell(27, 10, 'Office/Officer', 'TLB', 'C');
                    $pdf->SetXY($x + 50, $y); 

                    $pdf->SetXY($x + 145, $y); 
                    $pdf->Cell(35, 4, 'Returned', 'RL', 0, 'C');
                    $pdf->SetXY($x + 145, $y+4); 
                    $pdf->MultiCell(8, 10, 'Qty.', 'LTB', 'C');
                    $pdf->SetXY($x + 153, $y+4); 
                    $pdf->MultiCell(27, 10, 'Office/Officer', 'LTB', 'C');
                    $pdf->SetXY($x + 50, $y); 

                    $pdf->SetXY($x + 180, $y); 
                    $pdf->Cell(35, 4, 'Re-Issued', 'BR', 0, 'C');
                    $pdf->SetXY($x + 180, $y+4); 
                    $pdf->MultiCell(10, 10, 'Qty.', 'LRB', 'C');
                    $pdf->SetXY($x + 190, $y+4); 
                    $pdf->MultiCell(25, 10, 'Office/Officer', 'BR', 'C');
                    $pdf->SetXY($x + 50, $y); 

                    $pdf->SetXY($x + 215, $y); 
                    $pdf->Cell(14, 4, 'Disposed', 'RB', 0, 'C');
                    $pdf->SetXY($x + 215, $y+4); 
                    $pdf->Cell(14, 10, 'Qty.', 'RB', 0, 'C');
                    $pdf->SetXY($x + 229, $y); 
                    $pdf->Cell(14, 4, 'Balance', 'RB', 0, 'C');
                    $pdf->SetXY($x + 229, $y+4); 
                    $pdf->Cell(14, 10, 'Qty.', 'RB', 0, 'C');

                    $pdf->SetXY($x + 243, $y); 
                    $pdf->Cell(17, 14, 'Amount', 'RB', 0, 'C');

                    $pdf->SetXY($x + 260, $y); 
                    $pdf->Cell(17, 14, 'Remarks', 'B', 0, 'C');

                    $pdf->Line(25, 186, 25, 90);
                    $pdf->Line(43, 186, 43, 90);
                    $pdf->Line(65, 186, 65, 90);
                    $pdf->Line(105, 186, 105, 90);
                    $pdf->Line(120, 186, 120, 90);
                    $pdf->Line(128, 186, 128, 90);
                    $pdf->Line(155, 186, 155, 90);
                    $pdf->Line(163, 186, 163, 90);
                    $pdf->Line(190, 186, 190, 90);
                    $pdf->Line(200, 186, 200, 90);
                    $pdf->Line(225, 186, 225, 90);
                    $pdf->Line(239, 186, 239, 90);
                    $pdf->Line(253, 186, 253, 90);
                    $pdf->Line(270, 186, 270, 90);
                }

                $pdf->SetXY($x, $y);

                $pdf->SetFont('times', '', 7);
                $pdf->SetXY($x, $y + 14); 
                $pdf->multicell(15, 6, $Data->invoice_date, '','C'); 
                $pdf->SetFont('times', '', 8);
                $pdf->SetXY($x+15, $y + 14); 
                $pdf->multicell(18, 6, $Data->ics_no, '','C'); 
                $pdf->SetXY($x+33, $y + 14); 
                $pdf->multicell(23, 6, $Data->quantity_property_no, '','C'); 
                $pdf->SetXY($x+55, $y + 14); 
                $pdf->multicell($descriptionWidth, 6, $descriptionText, '','L'); 
                $pdf->SetXY($x+95, $y + 14); 
                $pdf->multicell(15, 6, $Data->useful_life, '','C'); 
                $pdf->SetXY($x+110, $y + 14); 
                $pdf->multicell(8, 6, $Data->issued_quantity, '','C'); 
                $pdf->SetXY($x+118, $y + 14); 
                $pdf->multicell(27, 6, $Data->assignee, '','L'); 

                $pdf->SetXY($x+229, $y + 14); 
                $pdf->multicell(14, 6, ($Data->issued_quantity-$count), '','C');
                $pdf->SetXY($x+243, $y + 14); 
                $pdf->multicell(17, 6, $totalUnitCost , '','C');

                $pdf->SetXY($x+145, $y + 14); 
                $pdf->multicell(8, 6, $count , '','C');  

                $pdf->SetXY($x+153, $y + 14); 
                $data_from_other_table_filtered = array_filter($data_from_other_table);
                $pdf->MultiCell(27, 4, implode("\n",$data_from_other_table_filtered), '', 'L');

                $pdf->SetXY($x+180, $y + 14); 
                $pdf->multicell(10, 6, $countReissued , '','C');  

                $pdf->SetXY($x+190, $y + 14); 
                $data_from_other_table_filtered_reissued = array_filter($data_from_other_table_reissued);
                $pdf->MultiCell(25, 4, implode("\n",$data_from_other_table_filtered_reissued), ' ', 'L');
                
                $pdf->SetXY($x+215, $y + 14); 
                $pdf->multicell(14, 6, $countDisposal , '','C');  
             
                $pdf->SetXY($x+260, $y + 14); 
                $pdf->multicell(17, 6, $Data->remarksFC , '','C');  

                $y += max(9,$descriptionHeight);
 
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
        $this->Cell(0, 10, 'Annex A.4', 0, 1, 'R');
        $this->SetFont('times', 'B', 12);
        $this->Cell(0, 6, 'Republic of the Philippines', 0, 1, 'C');
        $this->Cell(0, 6, 'SOUTHERN  LUZON STATE  UNIVERSITY', 0, 1, 'C');
        $this->Cell(0, 6, 'Lucban, Quezon', 0, 1, 'C');
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('times', '', 10);
        $this->Cell(0, 10, '', 0, 0, 'C');
    }

    function __construct()
    {
        parent::__construct('L', 'mm', 'A4'); // 'L' for landscape orientation, 'A4' for paper size
    }
}

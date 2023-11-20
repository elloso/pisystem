<?php
defined('BASEPATH') or exit('No direct script access allowed');
require('assets/fpdf/fpdf.php');

class RSEPIpdf_Controller extends CI_Controller
{
    public function RSEPIform()
    {

        $Datas = $this->Fpdf_Model->DataRSEPI();
        $pdf = new PDF();
            $pdf->AddPage();
            $pdf->SetFont('times', 'B', 12);
            $pdf->setLineWidth(0.4);
            $pdf->Cell(0, 10, 'REGISTRY OF SEMI-EXPENDABLE PROPERTY ISSUED', 0, 1, 'C');
            $pdf->Ln(7);
            $pdf->SetFont('times', 'B', 10);
            $pdf->Cell(22, 10, 'Entity Name:', '', 0, 'L');
            $pdf->SetFont('times', '', 10);
            $pdf->Cell(80, 10, 'SOUTHERN LUZON STATE UNIVERSITY', 'B', 0, 'L');
            $pdf->SetFont('times', '', 10);
            $pdf->Cell(85, 10, '', '', 0, 'C');
            $pdf->SetFont('times', 'B', 10);
            $pdf->Cell(28, 10, 'Fund Cluster:', '', 0, 'R');
            $pdf->SetFont('times', '', 10);
            $pdf->Cell(62, 10, '', 'B', 1, 'L');
            $pdf->Ln(0);
            $pdf->SetFont('times', 'B', 10);
            $pdf->Cell(43, 10, 'Semi-expendable Property:', '', 0, 'L');
            $pdf->SetFont('times', '', 10);
            $pdf->Cell(59, 10, '', 'B', 0, 'C');
            $pdf->SetFont('times', '', 10);
            $pdf->Cell(85, 10, '', '', 0, 'C');
            $pdf->SetFont('times', 'B', 10);
            $pdf->Cell(28, 10, 'Sheet No.:', '', 0, 'R');
            $pdf->SetFont('times', '', 10);
            $pdf->Cell(62, 10, '', 'B', 1, 'L');

            $pdf->SetFont('times', '', 8);
            
            $x = $pdf->GetX();
            $y = $pdf->GetY() + 3; 

            $contentWidth = 277;
            $contentHeight = 14;
            $pdf->Rect($x, $y, $contentWidth, $contentHeight);

            $pdf->SetXY($x, $y); 
            $pdf->Cell(15, 14, 'Date', 'R', 0, 'C');
            $pdf->SetXY($x + 15, $y); 
            $pdf->Cell(35, 4, 'Reference', 'BR', 0, 'C');
            $pdf->SetXY($x + 15, $y+4); 
            $pdf->MultiCell(13, 5, 'ICS/RSSP No.', 'R', 'C');
            $pdf->SetXY($x + 28, $y+4); 
            $pdf->MultiCell(22, 5, 'Semi-expendable Property No.', 'R', 'C');
            $pdf->SetXY($x + 50, $y); 
            $pdf->Cell(25, 14, 'Item Description', 'R', 0, 'C');
            $pdf->SetXY($x + 75, $y); 
            $pdf->MultiCell(20, 7, 'Estimated Useful Life', 'R', 'C');

            $pdf->SetXY($x + 95, $y); 
            $pdf->Cell(40, 4, 'Issued', 'R', 0, 'C');
            $pdf->SetXY($x + 95, $y+4); 
            $pdf->MultiCell(18, 10, 'Qty.', 'TR', 'C');
            $pdf->SetXY($x + 113, $y+4); 
            $pdf->MultiCell(22, 10, 'Office/Officer', 'RT', 'C');
            $pdf->SetXY($x + 50, $y); 

            $pdf->SetXY($x + 135, $y); 
            $pdf->Cell(40, 4, 'Returned', 'BR', 0, 'C');
            $pdf->SetXY($x + 135, $y+4); 
            $pdf->MultiCell(18, 10, 'Qty.', 'R', 'C');
            $pdf->SetXY($x + 153, $y+4); 
            $pdf->MultiCell(22, 10, 'Office/Officer', 'R', 'C');
            $pdf->SetXY($x + 50, $y); 

            
            $pdf->SetXY($x + 175, $y); 
            $pdf->Cell(40, 4, 'Re-Issued', 'BR', 0, 'C');
            $pdf->SetXY($x + 175, $y+4); 
            $pdf->MultiCell(18, 10, 'Qty.', 'R', 'C');
            $pdf->SetXY($x + 193, $y+4); 
            $pdf->MultiCell(22, 10, 'Office/Officer', 'R', 'C');
            $pdf->SetXY($x + 50, $y); 

            $pdf->SetXY($x + 215, $y); 
            $pdf->Cell(14, 4, 'Disposed', 'RB', 0, 'C');
            $pdf->SetXY($x + 215, $y+4); 
            $pdf->Cell(14, 10, 'Qty.', 'R', 0, 'C');
            $pdf->SetXY($x + 229, $y); 
            $pdf->Cell(14, 4, 'Balance', 'RB', 0, 'C');
            $pdf->SetXY($x + 229, $y+4); 
            $pdf->Cell(14, 10, 'Qty.', 'R', 0, 'C');

            $pdf->SetXY($x + 243, $y); 
            $pdf->Cell(17, 14, 'Amount', 'R', 0, 'C');

            $pdf->SetXY($x + 260, $y); 
            $pdf->Cell(17, 14, 'Remarks', '', 0, 'C');

            foreach ($Datas as $Data) {
                $pdf->SetFont('times', '', 8);
                $pdf->SetXY($x, $y+14); 
                $pdf->MultiCell(15, 5, $Data->rsepi_property_no, 'LTRB', 'C');
                
            }
          
            
            
            
           
            

            

        

            
            $pdf->SetFont('times', '', 9);
            $pdf->Output(); 

        
    }
}

class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('times', 'I', 12);
        $this->Cell(0, 10, 'Annex A.4', 0, 1, 'R');
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

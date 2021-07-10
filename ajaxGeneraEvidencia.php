<?php

require('pdf/fpdf.php');
$img = "img/4/20210708/11/foto.jpg";
$pdf=new FPDF();

for ($i=0; $i < 10; $i++) { 
    list($width, $height, $type, $attr) = getimagesize($img);
    $pdf->AddPage('P', array($width, $height));
    $pdf->SetFont('Arial','B',16);
    $widthPage = $pdf ->GetPageWidth();
    $heigthPage = $pdf ->GetPageHeight();
    //$pdf->Cell(40,10,$type);
    $pdf->Image($img, 0 ,0, $widthPage , $heigthPage,'JPG');
}
$pdf->Output();
?>

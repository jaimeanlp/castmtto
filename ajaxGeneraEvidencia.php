<?php

require('pdf/fpdf.php');
$img = "img/3/20210710/15/foto.jpg";
$pdf=new FPDF();

$titulo = $_GET['orden'];
$titulo .= ".pdf";
for ($i=0; $i < 10; $i++) { 
    list($width, $height, $type, $attr) = getimagesize($img);
    $pdf->AddPage('P', array($width, $height));
    $pdf->SetFont('Arial','B',16);
    $widthPage = $pdf ->GetPageWidth();
    $heigthPage = $pdf ->GetPageHeight();
    //$pdf->Cell(40,10,$type);
    $pdf->Image($img, 0 ,0, $widthPage , $heigthPage,'JPG');
    $pdf->SetTitle($titulo);
}
$pdf->Output($titulo,"I");
?>

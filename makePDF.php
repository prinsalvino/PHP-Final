<?php
require_once "fpdf/fpdf.php"; 
require_once "fpdf-barcode.php";
session_start();
$email = $_SESSION['email'];
$product = $_SESSION['product'];
$price = $_SESSION['price'];
$pdf = new PDF_BARCODE('p','mm','A4');
$pdf->AddPage();
$pdf->EAN13(10,30,'123456789012',10,0.35,9);
$pdf->SetFont('Arial','B',14);

//Cell(width, height, text, border, endline, align)
$pdf->Cell(130 ,5 ,'Welcome ' .$email , 0, 1);
$pdf->Cell(130 ,5 ,'Your Product is' .$product , 0, 1);
$pdf->Cell(130 ,5 ,'Price: ' .$price , 0, 1);


$pdf->Output('I', "receipt.pdf");

?>
<?php 
//if(!email){}
require('fpdf.php');
require('FPDI-2.3.6/src/fpdi.php');
require('FPDI-2.3.6/src/FpdfTpl.php');
require('FPDI-2.3.6/src/FpdiTrait.php');

extract($_POST);
if(!$email || !$password){
	header("Location:index.html");
}

$filename = "PDF/user_".$username.".pdf";

$pdf->AddPage();
$pdf->SetFont('Arial','B',16);

$pdf->Cell(40,10, "Email ".$email );
$pdf->Cell(40,10, "Password ".$password );

$pdf->Output($filename);

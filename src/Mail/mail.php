<?php


require_once('PHPMailer/PHPMailerAutoload.php');

define('GUSER', 'robin.perez@ucr.ac.cr');
define('GPWD', '');

global $error;

$mail = new PHPMailer();

$mail->isSMTP();

$mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true;  // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
$mail->Host = 'smtp.ucr.ac.cr';
$mail->Port = 465; 
$mail->Username = GUSER;  
$mail->Password = GPWD;           
$mail->SetFrom($_POST['from'], 'Andrey');
$mail->Subject = 'Hacked!!';
$mail->Body = $_POST['message'];
$mail->AddAddress($_POST['to']);
/**$mail->AddCC('jocajime@gmail.com');
$mail->AddCC('jfonseca1510@gmail.com');
$mail->AddCC('baycfran42@gmail.com');
$mail->AddCC('kakiandrea@gmail.com');
$mail->AddCC('jedups95@gmail.com');
$mail->AddCC('andresvm9@gmail.com');
**/
if(!$mail->Send()) {
	$error = 'Mail error: '.$mail->ErrorInfo; 
	return false;
} else {
	$error = 'Message sent!';
	return true;
}

?>
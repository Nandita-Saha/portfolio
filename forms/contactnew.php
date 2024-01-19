<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../assets/vendor/phpmailer/PHPMailer/src/Exception.php';
require '../assets/vendor/phpmailer/PHPMailer/src/PHPMailer.php';
require '../assets/vendor/phpmailer/PHPMailer/src/SMTP.php';

// require '../vendor/autoload.php';
// error_reporting(E_ALL);

require '../assets/vendor/autoload.php';

$mail = new PHPMailer(true);

try {
	$mail->SMTPOptions = array(
		'ssl' => array(
			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => true
		)
	);
	// $mail->SMTPDebug = 2;									 
	$mail->isSMTP();										 
	$mail->Host	 = 'sandbox.smtp.mailtrap.io';				 
	$mail->SMTPAuth = true;							 
	$mail->Username = '33227305d7b58e';				 
	$mail->Password = '8d5962188ed1c5';					 
	$mail->SMTPSecure = 'tls';							 
	$mail->Port	 = 2525; 

	$mail->setFrom( $_POST['email'], $_POST['name']);		 
	$mail->addAddress('sahan4648@gmail.com');
	
	
	$mail->isHTML(true);								 
	$mail->Subject = $_POST['subject'];

    $body = '<p>HTML message body in <b>bold</b></p>';

	$mail->Body = $_POST['message'];
	$mail->AltBody = strip_tags($body);


	$mail->send();

	echo "Mail has been sent successfully!";

	http_response_code(200);


} catch (Exception $e) {
	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


?>

<?php
ini_set('display_errors', '1');
require '/var/www/html/phpmailer/PHPMailerAutoload.php';
//require '/home/globapzx/public_html/advise/PHPMailer-master/PHPMailerAutoload.php';

	$mail = new PHPMailer;
	
	$email = "mayurdhepe@gmail.com";
	
	//$mail->SMTPDebug = 3;                               // Enable verbose debug output
	
	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'localhost';  		// Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'testuser062017@gmail.com';                 // SMTP username
	$mail->Password = 'testuser@gse';                           // SMTP password
	//$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	//$mail->Port = 587;                                    // TCP port to connect to
	
	$mail->setFrom('testuser062017@gmail.com', 'G.S.E');
	$mail->addAddress($email);
	          
	
	$mail->isHTML(true);                                  // Set email format to HTML
	
	$mail->Subject = 'REQUEST MADE FOR THE CALL';
	$mail->Body    = 'CONTACT YOU SHORTLY';
	//$mail->AltBody = 'PLAIN TEXT FOR NON-HTML CLIENT';
	
	if(!$mail->send()) {
	    echo 'Message could not be sent.';
	    echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
	    echo 'Message has been sent';
	
	}

?>
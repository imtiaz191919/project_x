<?php 
    include("../config.php");
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	use PHPMailer\PHPMailer\SMTP;
	require '../phpmailer/Exception.php';
	require '../phpmailer/PHPMailer.php';
    require '../phpmailer/SMTP.php';
    

    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
	
	$mail = new PHPMailer;
	$mail->isSMTP();
	$mail->SMTPAuth = true;
	$mail->Host = $host;
	$mail->Username = $username;
	$mail->Password = $password;
	$mail->SMTPSecure = $SMTPsecure;
	$mail->Port = $port;

	$mail->addAddress($email);
	$mail->From = 'imtiaz1919@gmail.com';
	$mail->Subject = $subject;
	$mail->Body = $message;

	if(!$mail->Send()) {
		echo 'Message could not be sent.';
		echo 'Mailer Error: ' . $mail->ErrorInfo;
		exit;
	}
	echo 'Message has been sent';
?>
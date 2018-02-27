<?php
if(isset($_POST['email'])) {
	require_once(dirname(__FILE__) . '/smtp/PHPMailerAutoload.php');
	$body = "New message from web
			<br><br>
			FROM: ".$_POST['email']."<br>
			NAME: ".$_POST['author']."<br>
			COMMENTS: ".$_POST['message']."<br>";


	//YOU NEED TO CHANGE FOLLOWING SETTINGS
	$mail = new PHPMailer;

	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'you.smtp.server.com';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'your-username';                 // SMTP username
	$mail->Password = 'yourpassword';                           // SMTP password
	$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 465;                                    // TCP port to connect to

	$mail->From = $_POST['email'];
	$mail->FromName = $_POST['author'];


	$mail->addAddress('your-email@company.com', 'My Name');     // Add a recipient
	$mail->isHTML(true);                                  // Set email format to HTML

	$mail->Subject = 'New message from web';
	$mail->Body    = $body;

	$mail->send();
} ?>

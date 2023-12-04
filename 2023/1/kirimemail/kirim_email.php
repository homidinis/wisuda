<?php

	require_once('class.phpmailer.php');

	// define('GUSER', 'care@unika.ac.id'); // GMail username	
	define('GUSER', 'wisuda@unika.ac.id'); // GMail username
	define('GPWD', 'janganlupaaku'); // GMail password

	function smtpmailer($to, $from, $from_name, $subject, $body) {
		$mail = new PHPMailer();  // create a new object
		$mail->IsSMTP(); // enable SMTP
		$mail->SMTPDebug = 1;  // debugging: 1 = errors and messages, 2 = messages only
		$mail->SMTPAuth = true;  // authentication enabled
		$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 465;

		$mail->Username = GUSER;
		$mail->Password = GPWD;
		$mail->SetFrom($from, $from_name);
		$mail->Subject = $subject;
		$mail->Body = $body;
		$mail->IsHTML(true);
		//$mail->AddAddress($to);
		$addr = explode(',',$to);

		foreach ($addr as $address) {
			$mail->AddAddress($address);
		}


		if(!$mail->Send()) {
			$GLOBALS['error'] = 'Mail error: '.$mail->ErrorInfo;
			echo 'Mail error: '.$mail->ErrorInfo;;
			echo $to;
			return false;
		} else {
			$GLOBALS['error'] = "";
			return true;
		}
	}


?>
<?php
 
if(isset($_POST['email'])) {
	// Require the Swift Mailer library
	require_once 'lib/swift_required.php';
	
	$transport = Swift_SmtpTransport::newInstance('smtp.sendgrid.net', 587, 'tls' )
	  ->setUsername('azure_b50243d281e6b1cdf9b71794b389bc48@azure.com')     
	  ->setPassword('k9KytqV99GOmEZc');

	
	$mailer = Swift_Mailer::newInstance($transport);

	$messageText = '';

	foreach ($_POST as $key => $value)
		$messageText .= ucfirst($key).": ".$value."\n\n";
	
	
	
	
	// You can change "A message from Pivot Template Form" to your own subject if you want.
	$message = Swift_Message::newInstance('Contact Aexid Formation')
	  ->setFrom(array($_POST['email'] => $_POST['name']))
	  ->setTo(array('contact-formation@cinq-s.com' => 'Aexid Formation'))->setBody($messageText);

	  

	// Send the message or catch an error if it occurs.
	try{
		echo($mailer->send($message));
	}
	catch(Exception $e){
		echo($e->getMessage());
	}
	exit;
}
 
?>
<?php
	header('Content-type: application/json');
	$status = array(
		'type'=>'success',
		'message'=>'Thank you for contact us. As early as possible  we will contact you '
	);
	
	$error = array(
		'type'=>'error',
		'message'=>'Error in sending message.'
	);
	
	

    $name = @trim(stripslashes($_POST['name'])); 
    $email = @trim(stripslashes($_POST['email'])); 
    $subject = @trim(stripslashes($_POST['subject'])); 
    $message = @trim(stripslashes($_POST['message'])); 
	$phone = @trim(stripslashes($_POST['phone'])); 
	$companyname = @trim(stripslashes($_POST['companyname'])); 
	$captcha = @trim(stripslashes($_POST['captchacode'])); 

try
{	
	session_start();
	$sessioncaptcha = $_SESSION['captchastore'] ;
	if(strcmp($captcha, $sessioncaptcha) != 0)
	{
		$CaptchaError = array(
			'type'=>'CaptchaError',
			'message'=>'Invalid Captcha. Please try again.'
		);
		echo json_encode($CaptchaError);
		die;
	}
	
    $email_from = $email;
    $email_to = 'contact@ashwameghgroup.in';//replace with your email

    $body = 'Company Name: ' . $companyname . "\n\n" . 'Name: ' . $name . "\n\n" . 'Phone: ' . $phone . "\n\n" . 'Email: ' . $email . "\n\n" . 'Subject: ' . $subject . "\n\n" . 'Message: ' . $message;

    $success = @mail($email_to, $subject, $body, 'From: <'.$email_from.'>');

    echo json_encode($status);
    die;
}
catch (\Exception $e)
{
    echo json_encode($status);
    die;
}
?>
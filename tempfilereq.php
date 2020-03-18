<?php

require("libs/constants.php");
require("libs/config.php");

	header('Content-type: application/json');
	$status = array(
		'type'=>'success',
		'message'=>'Login Successfull'
	);
	
	$error = array(
		'type'=>'error',
		'message'=>'Error in Login.'
	);

    $name = @trim(stripslashes($_POST['name'])); 
    $passwordtemp = @trim(stripslashes($_POST['password'])); 
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
	
	$query = mysqli_query($conn,DB_QUERY_GET_USER_LOGIN_INFO);
	while($rs = mysqli_fetch_object($query)){
		if(strcmp($name, $rs->user_name) != 0)
		{
			$InvalidUsername = array(
				'type'=>'InvalidUsername',
				'message'=>'Invalid Username. Please Contact Developer.'
			);
			echo json_encode($InvalidUsername);
			die;
		}
		
		if(strcmp($passwordtemp, $rs->password) != 0)
		{
			$InvalidPassword = array(
				'type'=>'InvalidPassword',
				'message'=>'Invalid Password. Please Contact Developer.'
			);
			echo json_encode($InvalidPassword);
			die;
		}
	}
	
	$_SESSION['luser'] = $name;
	$_SESSION['start'] = time(); // Taking now logged in time.
	$_SESSION['expire'] = $_SESSION['start'] + ( 5 * 60 ) ; // 5 min.
			
    echo json_encode($status);
    die;
}
catch (\Exception $e)
{
    echo json_encode($status);
    die;
}
?>
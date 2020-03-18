<?php

require 'config.php';

$session_expire  = array(
						'type'=>'Session_Expire',
						'message'=>'Session Expired. Please Login Again.'
					);
					
$session_valid  = array(
						'type'=>'Session_Valid',
						'message'=>'Session Valid. Valid user.'
					);

session_start();
if (!isset($_SESSION['luser'])) {
	echo json_encode($session_expire) ;
	exit() ;
}
else {
	$now = time(); // Checking the time now when home page starts.

        if ($now > $_SESSION['expire']) {
            session_destroy();
            echo json_encode($session_expire) ;
			exit() ;
        }
        else {
			
			$_SESSION['start'] = time(); // Taking now last activity time.
			$_SESSION['expire'] = $_SESSION['start'] + ( 5 * 60 ) ; // 5 min.
			
			$post = $_POST;
			$sql = "INSERT INTO catalougeinfo (catalouge_name) 
				VALUES ('".$post['title']."')";
			$result = $mysqli->query($sql);
			$sql = "SELECT * FROM catalougeinfo Order by id desc LIMIT 1"; 
			$result = $mysqli->query($sql);
			$data = $result->fetch_assoc();
			echo json_encode($session_valid);
			exit() ;
		}
}

?>
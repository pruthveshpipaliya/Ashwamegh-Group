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
			
			 $id  = $_POST['id'];
			 
			 $sql = "SELECT image_path FROM productdata WHERE id='".$id."'" ;
			 $result = $mysqli->query($sql);
			 $dirpath = realpath(dirname(getcwd())) ;
			 while($row = $result->fetch_assoc()){
				$fileToDel = $dirpath . '/' . $row['image_path'] ;
				unlink($fileToDel);
			 }
			 
			 $sql = "DELETE FROM productdata WHERE id = '".$id."'";
			 $result = $mysqli->query($sql);

			 echo json_encode($session_valid);
			 exit() ;
		}
}
?>
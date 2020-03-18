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
			
		  $id  = $_POST["id"];
		  $post = $_POST;

		  $catalouge_name = '' ;
		  $sql = "SELECT catalouge_name FROM catalougeinfo WHERE id = '".$id."'"; 
		  $query = mysqli_query($conn,$sql);
		  while($rs = mysqli_fetch_object($query)){
			$catalouge_name = $rs->catalouge_name ;
		  }
		  
		  $sql = "UPDATE productdata SET catalouge_name = '".$post['title']."'
			WHERE catalouge_name = '".$catalouge_name."'";

		  $result = $mysqli->query($sql);
		  
		  $sql = "UPDATE catalougeinfo SET catalouge_name = '".$post['title']."'
			WHERE id = '".$id."'";

		  $result = $mysqli->query($sql);

		  $sql = "SELECT * FROM catalougeinfo WHERE id = '".$id."'"; 

		  $result = $mysqli->query($sql);

		  $data = $result->fetch_assoc();

		  echo json_encode($session_valid);
		  exit() ;
		}
}
?>
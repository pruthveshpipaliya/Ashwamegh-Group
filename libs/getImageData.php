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
	
			$num_rec_per_page = 5;

			if (isset($_GET["image_page"])) { $image_page  = $_GET["image_page"]; } else { $image_page=1; };

			$start_from = ($image_page-1) * $num_rec_per_page;
			$catalouge = $_GET["catalouge"] ;
			$sql = "SELECT id,image_path FROM productdata WHERE catalouge_name='".$catalouge."' Order By id desc LIMIT $start_from, $num_rec_per_page" ;
			
			$result = $mysqli->query($sql);

			  while($row = $result->fetch_assoc()){

				 $json[] = $row;

			  }

			  $data['data'] = $json;

			$sqlTotal = "SELECT * FROM productdata WHERE catalouge_name='".$catalouge."'";
			$result =  mysqli_query($mysqli,$sqlTotal);

			$data['total'] = mysqli_num_rows($result);
			$data['type'] = 'Session_Valid' ;

			echo json_encode($data);
		}
}
?>
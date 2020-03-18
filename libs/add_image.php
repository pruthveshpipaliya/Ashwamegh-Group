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
					
$attach_image_error = array(
							'type'=>'Image_Error',
							'message'=>'Please Attach Image.'
						);
						
$invalid_image_error = array(
							'type'=>'Image_Error',
							'message'=>'Unable to Read Image.'
						);					
						
$upload_error = array(
					'type'=>'Image_Error',
					'message'=>'Unable to Upload Image.'
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

			foreach($_FILES as $file)
			{
				$img_file = $file["name"];
				$dirpath = realpath(dirname(getcwd())) ;
				$folderName = 'images/uploads/' ;
				$validExt = array("jpg", "png", "jpeg", "bmp", "gif");
				$catalouge_name = $_POST["catalouge_name"] ;
				
				if ( $img_file == "") {
					echo json_encode($attach_image_error) ;
					exit() ;
				} else if ($file["size"] <= 0 ) {
					echo json_encode($invalid_image_error) ;
					exit() ;
				} else {
					$ext = strtolower(end(explode(".", $img_file)));
					
					if ( !in_array($ext, $validExt) )  {
						echo json_encode($invalid_image_error) ;
						exit() ;
					} else {
						$filePath = $folderName . rand(10000, 990000). '_'. time().'.'.$ext;
						$filePathToUpload = $dirpath . '/' . $filePath ;
						if ( move_uploaded_file( $file["tmp_name"], $filePathToUpload)) {
							
							// ---------- Include Universal Image Resizing Function --------
							include_once("image_resize.php");
							pk_img_resize($filePathToUpload, $filePathToUpload, 0, 700, $ext);

							$sql = "INSERT INTO productdata VALUES (NULL ,'".prepare_input($catalouge_name) ."', '".prepare_input($filePath) ."')";
							
							if( mysqli_query($conn,$sql))
							{
								$session_valid['message'] = $catalouge_name ;
								echo json_encode($session_valid) ;
								exit() ;
							}
							else
							{
								echo json_encode($upload_error) ;
								exit() ;
							}
							
						} else {
							echo json_encode($upload_error) ;
							exit() ;
						}
						
					}
				}
			}

		}
}		

?>
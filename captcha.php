<?php 
  session_start(); // start a session
  $image = imagecreate(60, 23); //create blank image (width, height)
  $bgcolor = imagecolorallocate($image, 255, 255, 255); //add background color with RGB.
  $textcolor = imagecolorallocate($image, 200, 0, 0); //add text/code color with RGB.
	$num = rand(1, 9);
	$num2 = rand(1, 9);     
	$verif = $num . " + " . $num2;
	
  $_SESSION['captchastore'] = ($num + $num2); //add the random number to session 'code'
  imagestring($image, 10, 8, 3, $verif, $textcolor); //create image with all the settings above.
  header ("Content-type: image/png"); // define image type
  imagepng($image); //display image as PNG
?>
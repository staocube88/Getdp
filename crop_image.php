<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['read'])) {
	$_SESSION['imageData'] = $_POST['read'];
	
	if(isset($_SESSION['temp_image'])){
			unlink($_SESSION['temp_image']);
	}
	
	if(substr_compare($_SESSION['imageData'],'data:image/png;base64,',0,18) == 0){
		$img = str_replace('data:image/png;base64,' , '' , $_SESSION['imageData']);
		
		$img = str_replace(' ' , '+' , $img);
		$img = base64_decode($img);
		
		$_SESSION['temp_image'] = 'output/tmp/'.rand().time().'.jpg';
		$image = file_put_contents($_SESSION['temp_image'], $img);
		
		//$image1 = imagecreatefrompng($_SESSION['temp_image']);
		//imagejpeg($image1, $_SESSION['temp_image'], 100);
		
		echo 'ok';
	} else {
		echo 'notok';
		$_SESSION['temp_image'] = "";
	}
	
	
	
	
}


?>
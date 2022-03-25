<?php
session_start();
include 'z_db.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST'){

		if(isset($_SESSION['thumb_img'])){
			unlink($_SESSION['thumb_img']);
			unset($_SESSION['thumb_img']);
		}
		
		
		if(isset($_SESSION['output_img'])){
			unlink($_SESSION['output_img']);
			unset($_SESSION['output_img']);
		}
		
		$kore = create_image($_POST['bg'], $_POST['bottom_color'], $_POST['fname'], $_POST['dogname'], '255,255,255', $_POST['fname_pos'], $_POST['mode_type']);

		echo $kore;
		
		$_SESSION['output_img'] = $kore;
		
		if($_POST['mode_type'] == "create_img"){
			//save picture name to db
			$to_save = explode('/', $kore);
			$sql2 = mysqli_query($con, "UPDATE users SET image_name = '".$to_save[1]."' WHERE mobile ='".hex2bin($_SESSION['user_id'])."'");
		}
	
}



function create_image($background = 'blue', $bottom_color = 'brown', $fname = 'Chika', $dogname='max', $color = '255,255,255', $fname_pos=10, $mode_type){
	
	$working_folder = "./assets/img/edit/";

	include_once('edit/ImageEditor.php');
	
	$filename = $working_folder."bg-".$background.".jpg";
	$filename1 = $working_folder."bottom-".$bottom_color.".png";
	$filename2 = $_SESSION['temp_image'];
	
	$outputname = rand().time();
	$save = "output/".$outputname.".jpg";
	$thumb = "output/thumb/t_".$outputname.".jpg";
	
	//$imageEditor = new imageEditor;
	
	$image = ImageEditor::createFromFile($filename);
	$image1 = ImageEditor::createFromFile($filename1);
	$image2 = ImageEditor::createFromFile($filename2);
	
	//rotate user image
	$image2->rotate(-13);
	
	$image->placeImageAt(44, 346, $image2);     //user image
	$image->placeImageAt(0, 800, $image1);    //bottom placeholder
	
	$image->save($save, 'png');

	$image1 = imagecreatefrompng($save);
	imagejpeg($image1, $save, 100);	

	header('Content-type: image/jpeg');
	$font_dog = 'assets/fonts/ac.ttf';
	$font_bold = 'assets/fonts/appleberry_with_cyrillic.ttf';
	
	$jpg_image = imagecreatefromjpeg($save);
	
	//get color values
	$color = explode(',',$color);
	
	$color_img1 = imagecolorallocate($jpg_image, $color[0], $color[1], $color[2]);
	$color_img2 = imagecolorallocate($jpg_image, $color[0], $color[1], $color[2]);
	
	$text1 = strtoupper($fname);   //user name
	$text2 = strtoupper($dogname);   //dog name
	
	imagettftext($jpg_image, 30, 0, 117 + $fname_pos, 950, $color_img1, $font_bold, $text1);
	imagettftext($jpg_image, 35, -20, 691, 480, $color_img2, $font_dog, $text2);
	imagejpeg($jpg_image, $save);
	imagedestroy($jpg_image);
	imagedestroy($image1);
	//echo "<img src='".$save."' width='250px'/>";

	if($mode_type == 'create_img'){
		$image99 = ImageEditor::createFromFile($save);
		$image99->resize(140, 140);
		echo $mode_type. "k";
		$image99->save($thumb, 'jpg');
		
		
		$_SESSION['thumb_img'] = $thumb;
	}
	
	
	return $save;
	
}


	
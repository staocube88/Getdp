<?php
session_start();

// if($_SESSION['logged']!=true || $_SESSION['account']!="staff")
	// header("Location:index.php");

include 'z_db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['post_type'] == 'register') {
	//filtering the post requests
	$fname = mysqli_real_escape_string($con, stripslashes($_POST['fname']));
	$dog_name = mysqli_real_escape_string($con, stripslashes($_POST['dog_name']));
	$email = mysqli_real_escape_string($con, stripslashes($_POST['email']));
	$mobile = mysqli_real_escape_string($con, stripslashes($_POST['mobile']));
	$facebook = mysqli_real_escape_string($con, stripslashes($_POST['facebook']));
	$twitter = mysqli_real_escape_string($con, stripslashes($_POST['twitter']));
	$instagram = mysqli_real_escape_string($con, stripslashes($_POST['instagram']));
	$today = time();
	
	//validate user for duplicates
		$sql22 = mysqli_query($con, "SELECT * FROM users WHERE email ='".$email."' or mobile ='".$mobile."'");
		if (mysqli_num_rows($sql22) > 0) {
			echo "existed";
		} else {
			//Register user
			$sqli = mysqli_query($con, "INSERT INTO users(fname,dog_name,email,mobile,facebook,twitter,instagram,date_created) VALUES('$fname','$dog_name','$email','$mobile','$facebook','$twitter','$instagram','$today')");
			if($sqli){
				$_SESSION['user_id'] = bin2hex($mobile);
				$_SESSION['username'] = $fname;
				$_SESSION['dogname'] = $dog_name;
				echo 'ok';
			} else {
				echo 'notok';
			}
		}
	
	
}



// if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['validate'])) {
	// //check if customer with meter number exists
	// $meter_no = mysql_real_escape_string(stripslashes($_POST['validate']));
	// $sql = mysql_query("SELECT * FROM users WHERE meter_number ='".$meter_no."'");
	// if(mysql_num_rows($sql) > 0){
		// $res = mysql_fetch_assoc($sql);
		// echo $res['prev_reading'];
	// } else {
		// echo 'notok';
	// }
// } else if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['read'])) {
	
	// $prev_bal = $multiplier = $adc = $vat = $adjustment = $account_name = $account_number= $dials = $fixed_charge = $payments = $energy_rate =$energy_rate2 = $meter_no = $contact_email = $et_arrears= $phone='';
	// $last_m_reading = $pre_m_reading = $consumption = $current_charge = $lar_date = $net_arrears = $msg = '';
	
	// //filtering the post requests
	// $last_m_reading = mysql_real_escape_string(stripslashes($_POST['prev_input']));
	// $pre_m_reading = mysql_real_escape_string(stripslashes($_POST['curr_input']));
	// $meter_no = mysql_real_escape_string(stripslashes($_POST['read']));
	// $staffLocation = mysql_real_escape_string(stripslashes($_POST['location']));
	
	
    // //fetch customer info
	// $sql = mysql_query("SELECT * FROM users JOIN location on users.location = location.id WHERE meter_number ='".$meter_no."'");
	// if (mysql_num_rows($sql) > 0) {
		// while($row = mysql_fetch_array($sql)){
			// $uid = $row['unique_id'];
			// $account_number = $row['acct_number'];
			// $userDistrict = $row['district'];
			// $userStreet = $row['street'];
			// $to = $row['contact_email'];
			// $name = $row['acct_name'];
			// $userLocation = $userStreet.", ".$userDistrict;
		// }
		// //echo "yes";
	// }
	
	// // compare staff present location with customer's permanent address
	// $ko = strripos($staffLocation, $userDistrict);
	// if($ko != false) {
			
		// //fetch customer net arrears
		// $sql22 = mysql_query("SELECT total_due FROM bills WHERE uid ='".$uid."' ORDER BY id DESC LIMIT 1");
		// if (mysql_num_rows($sql22) > 0) {
			// while($row22 = mysql_fetch_array($sql22)){
			// $prev_bal = $row22['total_due'];
			
			// }
			// //echo "yes";
		// } else {
			// $prev_bal = 0;
		// }

		// //calculating the bill
		
		// $multiplier = 1;
		// $energy_rate = 26;
		// $energy_rate2 = 26;
		// $payments = 0;
		// $adc = 5;
		// $adjustment = 0;
		// $net_arrears = $prev_bal + $adjustment - $payments;
		// $lar_date = ''; //date meter was read
		// $fixed_charge = 500;
		// $dials = 5;
		// $max_due_date = 7;
		// $consumption = ($pre_m_reading - $last_m_reading);
		// $current_charge = ($energy_rate * $consumption) + $fixed_charge;
		// $vat = 0.05 * $current_charge;
		// $total_due = $net_arrears + $current_charge + $vat;

		// //Selecting staff id 
		// $staff = mysql_query("SELECT id FROM staff WHERE email ='".$_SESSION['user']."'");
		// if (mysql_num_rows($staff) > 0) {
			// while($query = mysql_fetch_array($staff)){
				// $staff_id = $query['id'];
			// }
		// }
	
		// //inserting & updating bill values to the database
		// $sqli = mysql_query("INSERT INTO bills(acct_number,enr,lar,fixed_charge,consumption,total_due,due_date,net_arrears,prev_bal,adc,dials,enr2,dlar,adjustment,current_charge,uid,staff_id) 
		// VALUES('$account_number','$energy_rate','$pre_m_reading','$fixed_charge','$consumption','$total_due', NOW(),'$net_arrears','$prev_bal','$adc','$dials','$energy_rate2',NOW(),'$adjustment','$current_charge','$uid','$staff_id')");
		// if($sqli){
			// $sql2 = mysql_query("UPDATE users SET prev_reading = '".$pre_m_reading."' WHERE unique_id ='".$uid."'");
			// if($sql2){
				// echo 'ok';
				// require_once('../genBill/PHPMailer/class.phpmailer.php'); //where your phpmailer folder is
					// $mail = new PHPMailer();
					// $mail->From = "noreply@energyprompter.com";
					// $mail->FromName = "Energy Prompter";
					// $mail->AddAddress($to);
					// $mail->AddReplyTo("support@energyprompter.com", "Support team");
					// //$mail->AddAttachment();
					// // attach pdf that was saved in a folder
					// $mail->Subject = "Meter Reading Notification";
					// $mail->Body = "Dear " . $name . "\n\n Our staffs has read your bill today. Kindly pay your bills to avoid disconnection. Thanks";
					// if($mail->Send())
					// {
						// $msg = "ok";
					// }
					// else
					// {
						// $msg =  "Error: The meter could not be read";
					// }
			// }
		// }
	
	// } else {
		// //echo 'You cannot read this bill<br>because you are at '.$staffLocation.' but customer lives at '.$userStreet.','.$userDistrict;
		// echo 'You cannot read this bill because you are not at customer\'s address';
	// }
// }

?>
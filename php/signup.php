<?php
	$msg = "";
	include_once 'global.php';
	if (@$_SESSION['logged_in'] == true) {
		echo '<script>window.location="../?view=home"</script>';
	}
	if (isset($_POST['email'])) {
		$_SESSION['username'] = $_POST['username'];
		$_SESSION['firstname'] = $_POST['firstname'];
		$_SESSION['lastname'] = $_POST['lastname'];
		$_SESSION['email'] = $_POST['email'];
		$_SESSION['phone'] = $_POST['phone'];
			// else{
				// securing the data
				// $username = preg_replace("#[^0-9a-z]#i", "", $username);
				// $fname = preg_replace("#[^0-9a-z]#i", "", $fname);
				// $lname = preg_replace("#[^0-9a-z]#i", "", $lname);
				// $pass1 = sha1($pass1);
				// $email = mysql_real_escape_string($email);

		// Escape all $_POST variables to protect against SQL injections
		$username = mysqli_real_escape_string($con, $_POST['username']);
		$firstname = mysqli_real_escape_string($con, $_POST['firstname']);
		$lastname = mysqli_real_escape_string($con, $_POST['lastname']);
		$email = mysqli_real_escape_string($con, $_POST['email']);
		$phone = mysqli_real_escape_string($con, $_POST['phone']);
		$password = mysqli_real_escape_string($con, password_hash($_POST['password'], PASSWORD_BCRYPT));
		$hash = mysqli_real_escape_string($con, md5( rand(0,1000) ) );

		// check for duplicates
		$user_query = mysqli_query($con, "SELECT username FROM accounts WHERE username='$username' LIMIT 1") or die("Could not check Username");
		$count_username = mysqli_num_rows($user_query);
		$email_query = mysqli_query($con, "SELECT email FROM accounts WHERE email='$email' LIMIT 1") or die("Could not check Username");
		$count_email = mysqli_num_rows($email_query);

		if ($count_username > 0) {
			echo '<div class="app_error_msg magictime vanishIn" style="background:#E80909;">Your username is already in use</div>';
		}else if ($count_email > 0) {
			echo '<div class="app_error_msg magictime vanishIn" style="background:#E80909;">Your email is already in use</div>';
		}else{
			// insert members
			$folder = "users/".$firstname;
			$ip_address = $_SERVER['REMOTE_ADDR'];
			$sql = mysqli_query($con, "INSERT INTO accounts (username, firstname,  lastname, email, phone, password, hash, ip_address, sign_up_date, folder)
									VALUES ('$username', '$firstname', '$lastname', '$email', '$phone', '$password', '$hash', '$ip_address', CURRENT_TIMESTAMP(), '$folder')") 
									or die("Ouch couldn't insert your data <br><br>".$con->error);
			$member_id = mysqli_insert_id($con);
			
			if ($sql){
		    	mkdir("../".$folder, 0755);
				// $msg = "You have now been signed up";

		        $_SESSION['active'] = 0; //0 until user activates their account with verify.php
		        $_SESSION['logged_in'] = true; // So we know the user has logged in
		        $_SESSION['message'] =
		                
		                "Confirmation link has been sent to $email, please verify
		                 your account by clicking on the link in the message!";

		        // Send registration confirmation link (verify.php)
             	ini_set('smtp_port',25);
             	$headers =  'MIME-Version: 1.0' . "\r\n"; 
				$headers .= 'From: Your name <info@address.com>' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		        $to      = $email;
		        $subject = 'Account Verification ( IAO Platform )';
		        $message_body = '
			        Hello '.$firstname.',

			        Thank you for signing up!

			        Please click this link to activate your account:

			        http://localhost/apps/slashaconcepts/?view=verify&email='.$email.'&hash='.$hash;  

			    print('<script>window.location.href="./../"</script>');
		        mail( $to, $subject, $message_body, $headers );

		    }else {
		        echo '<div class="app_error_msg magictime vanishIn" style="background:#E80909;">Registration Failed!</div>';   
		    }
		}
	}

	echo $msg;
?>

<head>
	<meta charset="utf-8">
	<meta name="theme-color" content="#333">
	<meta name="msapplication-navbutton-color" content="#333">
	<meta name="apple-mobile-web-app-status-bar-style" content="#333">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>IAO Notification Platform</title>
	<link rel="stylesheet" type="text/css" href="../css/reset.css">
	<link rel="stylesheet" type="text/css" href="../css/frontuiux.css">
	<link rel="stylesheet" type="text/css" href="../css/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/magic.min.css">
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/jquery.ui.js"></script>
	<script type="text/javascript" src="../js/front.iao.js"></script>
	<script type="text/javascript" src="../js/search.js"></script>
</head>

<script>
	$(function () {
		setInterval(function(){
			window.location.href='..//?view=signup';
		}, 11000);
	})
</script>
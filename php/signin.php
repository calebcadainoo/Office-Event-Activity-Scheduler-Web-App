<?php
	/* User login process, checks if user exists and password is correct */
	$msg = "";
	include_once 'global.php';
	if (isset($_POST['email'])) {
		// Escape email to protect against SQL injections
		$email = mysqli_escape_string($con, $_POST['email']);
		$sql = mysqli_query($con, "SELECT * FROM accounts WHERE email='$email' LIMIT 1");

		if ( mysqli_num_rows($sql) == 0 ){ // User doesn't exist
		    echo '<div class="app_error_msg magictime vanishIn" style="background:#E80909;">User with that email does not exist!</div>';
		}else { // User exists
		    $user = mysqli_fetch_assoc($sql);
		    
		    if ( password_verify($_POST['password'], $user['password']) ) {
		        
		        $_SESSION['id'] = $user['id'];
		        $_SESSION['email'] = $user['email'];
		        $_SESSION['firstname'] = $user['firstname'];
		        $_SESSION['lastname'] = $user['lastname'];
		        $_SESSION['userpic'] = $user['profile_pic'];
		        $_SESSION['active'] = $user['active'];

		        if (isset($_POST['remember'])) {
		        	# code...
		        }
		        
		        // This is how we'll know the user is logged in
		        $_SESSION['logged_in'] = true;

		        echo '<script>window.location="../?view=home"</script>';
		    }else {
		    	echo '<div class="app_error_msg magictime vanishIn" style="background:#E80909;">You have entered wrong password, try again!</div>'; // error
		    }
		}
	}

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
			window.location.href='../';
		}, 11000);
	})
</script>
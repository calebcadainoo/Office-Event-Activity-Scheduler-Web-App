	<head>
		<meta charset="utf-8">
		<meta name="theme-color" content="#003398">
		<meta name="msapplication-navbutton-color" content="#003398">
		<meta name="apple-mobile-web-app-status-bar-style" content="#003398">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Error</title>
		<link rel="stylesheet" type="text/css" href="../css/reset.css">
		<link rel="stylesheet" type="text/css" href="../css/frontuiux.css">
		<link rel="stylesheet" type="text/css" href="../css/style.css">
		<link rel="stylesheet" type="text/css" href="../css/magic.min.css">
		<script type="text/javascript" src="../js/jquery.min.js"></script>
		<script type="text/javascript" src="../js/front.ifcia.js"></script>
	</head>

	<div class="signback"><div class="signback_overlay">
	<!-- form paper -->
	<section class="form_paper">
		<h1 class="form_h1" style="color: #e50000;">Error</h1>
		<div class="liner1" style="background: #e50000;"></div><br>
		<section class="error_msg">
			<?php 
	            if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ): 
	                echo $_SESSION['message'];    
	            else:
	                header( "location: ./" );
	            endif;
	        ?>

		</section><br>
	</section></div>
	<!-- end of form paper -->
	</div>
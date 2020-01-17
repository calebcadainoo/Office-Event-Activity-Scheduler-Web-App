<?php
	include_once './php/global.php';
	// session_start();

	// Check if user is logged in using the session variable
	if ( @$_SESSION['logged_in'] != 1 ) {
	 	$_SESSION['message'] = "You must log in before viewing your profile page!";
	 	echo '<script>window.location.href="./?view=signin";</script>';  
	}else {
	    // Makes it easier to read
	    $ID = $_SESSION['id'];
	    $firstname = $_SESSION['firstname'];
	    $lastname = $_SESSION['lastname'];
	    $FULLNAME = $firstname.' '.$lastname;
	    $email = $_SESSION['email'];
	    $userpic = $_SESSION['userpic'];
	    $active = $_SESSION['active'];
	    include 'php/connect.php';
	    $sql = mysqli_query($con, "SELECT * FROM accounts WHERE id='$ID' LIMIT 1");
		while ($row = mysqli_fetch_assoc($sql)){
	    	$userpic = $row['profile_pic'];
	    	$phone = $row['phone'];
	    }
	}
?>

<!-- slide menu -->
<aside class="slide_menu">
	<!-- overlay -->
	<article class="slide_overlay">
		<!-- header -->
		<header class="slide_head">
			<!-- office logo --><a href="./">
			<figure class="office_logo imgfx">
				<img src="ico/ifcia iao.png">
			</figure></a>
			<!-- office name -->
			<div class="office_name">
				Institutional Affiliation Office
			</div>
		</header> <!-- end of header -->

		<section class="menulinkbx">
			<!-- home -->
			<a href="?view=home"><div class="menulink home">Home</div></a>
			<!-- file list -->
			<a href="?view=calendar"><div class="menulink cal">Calendar</div></a>
			<!-- file list -->
			<a href="?view=filelist"><div class="menulink file">File List</div></a>
			<!-- schools -->
			<a href="?view=schools"><div class="menulink sch">Schools</div></a>
			<!-- letters -->
			<a href="?view=letters"><div class="menulink let">Letters</div></a>
			<!-- moderators -->
			<a href="?view=moderators"><div class="menulink mod">Moderators</div></a>
			<!-- users -->
			<a href="?view=users"><div class="menulink usr">Users</div></a>
			<!-- settings -->
			<a href="?view=settings"><div class="menulink set">Settings</div></a>
			<!-- logout -->
			<div class="menulink lgt">Logout</div>
		</section>
	</article>
</aside>
<!-- end of slide menu -->
<style>
	body{
		overflow: hidden;
	}
</style>
<article class="page_wrapper">
	<!-- banner -->
	<div class="signback banner">
		<div class="signback_overlay">
			<!-- navigation -->
			<div class="nav_bar">
				<!-- tap menu -->
				<figure class="tap_menu imgfx">
					<img src="ico/menu.png">
				</figure>

				<!-- search box -->
				<div class="nav_searchbx">
					<input type="text" id="search_text" name="search_text" autofocus class="txtsearchbox" placeholder="Search Item..." >
					
					<!-- <span class="filter-icon"></span> -->
					<!-- <article class="filterbx">
						<div class="filters">FileList</div>
						<div class="filters">Schools</div>
						<div class="filters">Letters</div>
						<div class="filters">Moderators</div>
					</article> -->
				</div>

				<!-- notify -->
				<div class="nav_rounditem nav-notify new_notify" title="Notification"></div>
				<!-- logout -->
				<div class="nav_rounditem nav-logout" title="Logout"></div>
			</div>
		</div>
	</div>
	<!-- notification bag -->
	<aside class="notify_bag">
		<?php

			$sql = mysqli_query($con, "SELECT * FROM notification ORDER BY id DESC ");
			while ($row = mysqli_fetch_assoc($sql)) {
				# code...
				print('
					<a href="?view=calendar"><div id="noti-12" class="notify_item">
						<figure class="noti_img imgfx">
							<img src="'.$row['schlogo'].'" alt="">
						</figure>
						<div class="noti_text">
							'.$row['subject'].' '.$row['noti_text'].'
						</div>
					</div></a>
				');
			}
		?>
	</aside> <!-- end of notification bag -->

	<?php
		$view = "";
		if (isset($_GET['view'])) {
			$view = $_GET['view'];
		}

		switch ($view) {
			case 'home':
				include 'views/welcome.php';
				#print('<style>.tap_menu{visibility:hidden;}</style>');
				break;
			case 'filelist':
				include 'views/filelist.php';
				break;
			case 'schools':
				include 'views/schools.php';
				break;
			case 'letters':
				include 'views/letters.php';
				break;
			case 'moderators':
				include 'views/moderators.php';
				break;
			case 'calendar':
				include 'views/calendar.php';
				break;
			case 'users':
				include 'views/users.php';
				break;
			case 'logs':
				include 'views/logs.php';
				break;
			case 'settings':
				include 'views/settings.php';
				break;
			case 'logout':
				include './php/logout.php';
				break;

			default:
				include 'views/welcome.php';
				break;
		}

	?>

	<div class="spacerB"></div>
	<!-- floating notification -->
	<!-- <article class="float_noti"> -->
		<!-- school logo -->
		<!-- <figure class="float_schlogo imgfx"><img src="schools/5b3cd55b51fbf_optics.jpg"></figure> -->
		<!-- close button -->
		<!-- <div class="noti_close" title="Close Notification"></div> -->
		<!-- noti message/ -->
		<!-- <section class="noti_msg">
			Pre and Post Examination Moderation Exercises: School of Anaesthesia on <b>31st July, 2018</b>
		</section> -->
	<!-- </article> -->
	<!-- end of floating notification -->
</article>

<?php
	// include 'php/notify.php';
?>
	<script>
		var now = new Date(); //Create Calendar-Object
		var hour = now.getHours();
		var minute = now.getMinutes();
		var second = now.getSeconds();
		var notifyTimer = setInterval(function(){
			getFeedback();
		}, 15000);

		// clearInterval(notifyTimer);

		function getFeedback(){
		    var feedback = $.ajax({
		        type: "POST",
		        url: "php/notify_cal.php",
		        async: false
		    }).success(function(data){
		        setTimeout(function(){getFeedback();}, 15000);
		        $('.spacerB').text(data);
		    }).responseText;
		    // alert('Ha');
		}
		
	</script>
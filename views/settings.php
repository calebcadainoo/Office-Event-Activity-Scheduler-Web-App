<?php
	include 'php/connect.php';
	$sql = "SELECT * FROM settings WHERE id = 1";
	$result = mysqli_query($con, $sql);
	while ($row = mysqli_fetch_assoc($result)) {
		$email = $row['notifymail'];
		$cc_email = $row['ccnotifymail'];
	}

	if (isset($_POST['email'])) {
		$email = mysqli_real_escape_string($con, $_POST['email']);
		$cc_email = mysqli_real_escape_string($con, $_POST['cc_email']);
		$sql = mysqli_query($con, "UPDATE settings SET notifymail='$email', ccnotifymail='$cc_email' WHERE id=1 ");
		if ($sql) {
			echo '<div class="app_error_msg magictime vanishIn">Updated</div>';
		}else{
			echo '<div class="app_error_msg magictime vanishIn" style="background:#E80909;">Unable to update please check connection</div>';
		}
	}

?>

	<!-- home paper -->
	<section class="centroid home_paper">
		<!-- window headers -->
		<header class="window_headers">
			<!-- logo -->
			<figure class="window_logo push_l imgfx">
				<img src="img/ifcia logo.png">
			</figure>

			<aside class="window_name">Settings</aside>

			<!-- logo -->
			<figure class="window_logo push_r imgfx">
				<img src="img/ucc_logo.gif">
			</figure>
		</header> <!-- end of window headers -->

		<aside class="grid_container">
			<article class="centroid_500 settings_center">
				<form method="post" action="">
					<h1 class="form_h1">Notification Email &bull; IAO</h1>
					<br>
					<!-- email -->
					 <div class="form_textbx mail">
					 	<input type="text" class="form_el_txtbx" name="email" required="required" placeholder="Email to Send Notification..." title="Email to Send Notification..." value="<?php print($email); ?>">
					 </div><br>

					<!-- <h1 class="form_h1">CC Email &bull; IAO</h1> -->
					<!-- <br> -->
					<!-- email -->
					 <div class="form_textbx mail hidebx">
					 	<input type="text" class="form_el_txtbx" name="cc_email" placeholder="Email to Send Copy of Notification..." title="Email to Send Copy of Notification..." value="<?php print($cc_email); ?>">
					 </div><br>
					 <!-- button -->
					 <center>
					 	<input type="submit" name="btnSend" class="btnSend" value="Save Changes">
					 </center><br>
				</form>
				</article>
		</aside>

	</section>
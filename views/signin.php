<?php
	if (isset($_SESSION['logged_in'])) {
		if ( $_SESSION['logged_in'] == 1 ) {
		 	print('<script>window.location.href="./?view=home";</script>');
		}
	}
?>	

	<div class="signback"><div class="signback_overlay">
	<!-- form paper -->
	<section class="form_paper">
		<h1 class="form_h1">Sign In &bull; IAO</h1>
		 <div class="liner1"></div><br><br>
		 <form method="post" action="php/signin.php">
		 	<!-- email -->
			 <div class="form_textbx mail">
			 	<input type="text" class="form_el_txtbx" name="email" required="required" placeholder="Email Address...">
			 </div><br>
			 <!-- password -->
			 <div class="form_textbx password">
			 	<input type="password" class="form_el_txtbx" name="password" required="required" placeholder="Password...">
			 </div>
			 <label class="lblrem"><input type="checkbox" name="remember" value="yes">&nbsp; Keep me logged in? </label>
			 <a class="forgot_pass" href="?view=forgotpass">Forgot Password?</a>
			 <div class="front_clrfx"></div>
			 <!-- button -->
			 <center>
			 	<input type="submit" name="btnSend" class="btnSend" value="Sign In">
			 </center><br>
			 <!-- single liner -->
			 <div class="single_liner"></div>
			 <a class="signup_a" href="?view=signup">Sign Up</a>
		 </form><div class="spacerB"></div>
	</section></div>
	<!-- end of form paper -->
	</div>
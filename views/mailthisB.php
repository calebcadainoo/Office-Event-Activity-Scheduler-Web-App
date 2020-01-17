<?php
	$from_name = "Caleb";
	$encoding = "utf-8";
	$from_mail = "calcronoo@gmail.com";
	$header = "Content-type: text/html; charset=".$encoding." \r\n";
    $header .= "From: ".$from_name." <".$from_mail."> \r\n";
    $header .= "MIME-Version: 1.0 \r\n";
    $header .= "Content-Transfer-Encoding: 8bit \r\n";
    $header .= "Date: ".date("r (T)")." \r\n";
	if (mail('calcronoo@gmail.com', 'IAO Notification Platform', 'Haha something interesting', $header)) {
		print('done');
	}else{
		print('not sent');
	}

	// $uri = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	// echo $uri;
	$hostname = 'http://'.$_SERVER['HTTP_HOST'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="theme-color" content="#333">
	<meta name="msapplication-navbutton-color" content="#333">
	<meta name="apple-mobile-web-app-status-bar-style" content="#333">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>IAO Notification Platform</title>
	<!-- <link rel="stylesheet" type="text/css" href="../css/reset.css"> -->
</head>
<body>
	<section style="max-width: 800px; margin: auto !important; padding: 10px; box-sizing: border-box; position: relative; z-index: 33; width: 95%; background: #fff; padding: 50px; padding-top: 40px;  box-sizing: border-box; margin-bottom: 30px; transition: 0.3s all ease-in-out; -webkit-transition: 0.3s all ease-in-out; overflow: auto;">
		<header style="border-bottom: 1px solid rgba(0, 0, 0, 0.1); max-width: 1200px; margin: auto; overflow: auto; min-height: 120px;">
			<!-- logo -->
			<!-- <figure class="window_logo push_l imgfx" style="width: 60px; height: 60px; overflow: hidden; position: absolute; left: -20px;">
				<img src="http://www.iaoucc.com/img/ifcia logo.png" style="max-width: 100%; min-height: 100%;">
			</figure> -->

			<figure class="window_logo push_r imgfx" style="width: 60px; height: 60px; overflow: hidden; text-align: center; margin: auto;">
				<img src="http://www.iaoucc.com/img/ucc_logo.gif" style="max-width: 100%; min-height: 100%;">
			</figure>

			<aside style="margin-top: 30px; text-align: center; font-family: LatoLight, sans-serif; letter-spacing: 1px; font-weight: bold; font-size: 1.6em; line-height: 1.3em; margin-bottom: 29px; transition: 0.3s all ease-in-out; -webkit-transition: 0.3s all ease-in-out;">IAO Planned Calendar</aside>

			<!-- logo -->
			<!-- <figure class="window_logo push_r imgfx" style="width: 60px; height: 60px; overflow: hidden; position: absolute; right: -20px; top: 10px;">
				<img src="http://www.iaoucc.com/img/ucc_logo.gif" style="max-width: 100%; min-height: 100%;">
			</figure> -->
		</header>

		<article>
			<br><br>
			<center>
				<!-- date -->
				<div style="background:#00AA00; width: 120px; height: 100px; color: #fff; text-align: center; border-radius: 10px; overflow: hidden; font-family: LatoLight, sans-serif; box-shadow: 0px 3px 12px -6px rgba(0, 0, 0, 0.6);">
					<span style="display: block; height: 55%; box-sizing: border-box; padding: 8px; font-size: 40px;"><?php print(date("j")) ?></span>
					<span style="height: 28%; text-transform: uppercase;"><?php print(date("M")) ?></span>
					<span style="height: 17%; font-size: 14px; display: block; padding-top: 7px; font-family: Montserrat, sans-serif; letter-spacing: 1px; box-sizing: border-box; position: relative; top: -7px;"><?php print(date("Y")) ?></span>
				</div><br>
				<!-- description -->
				<aside style="font-family: Montserrat, sans-serif; max-width: 400px;">
					Set up meeting with boss
				</aside><br><br><br>
				<!-- button -->
				<a href="http://www.iaoucc.com" style="text-decoration:none; color: inherit;"><div class="platform_button" style="background: #003398; padding: 12px 12px; color: #fff; font-family: LatoLight, sans-serif; max-width: 120px; cursor: pointer; letter-spacing: 0.5px; border-radius: 20px 0px 20px 0px;">
					View Calendar
				</div></a>
			<br><br>
			<footer class="mailcopyright" style="color: rgba(0, 0, 0, 0.5); font-family: LatoLight, sans-serif; font-size: 0.8em; ">
				IAO Notification Platform <br>
				Institutional Affiliation Office <br>
				Developed with Passion by: <a href="tel:+233571357788" style="text-decoration: none; color: inherit;">Crosby</a><br>
				(<a href="tel:+233571357788" style="text-decoration: none; color: inherit;">+233571357788</a>)
			</footer>
			</center><br>
		</article>
	</section>
</body>
</html>
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
	<section class="centroid home_paper">
		<header class="window_headers">
			<!-- logo -->
			<figure class="window_logo push_l imgfx">
				<img src="<?php print($hostname); ?>/img/ifcia logo.png">
			</figure>

			<aside class="window_name">IAO Planned Calendar</aside>

			<!-- logo -->
			<figure class="window_logo push_r imgfx">
				<img src="<?php print($hostname); ?>/img/ucc_logo.gif">
			</figure>
		</header>

		<article class="mail_body">
			<br><br>
			<center>
				<!-- date -->
				<div class="sided-cal cal_date" style="background:#00AA00;">
					<span class="cal_day"><?php print(date("j")) ?></span>
					<span class="cal_month"><?php print(date("M")) ?></span>
					<span class="cal_year"><?php print(date("Y")) ?></span>
				</div><br>
				<!-- description -->
				<aside class="mail_desc">
					Set up meeting with boss
				</aside><br><br><br>
				<!-- button -->
				<a href="#"><div class="platform_button">
					View Calendar
				</div></a>
			<br><br>
			<footer class="mailcopyright">
				IAO Notification Platform <br>
				Institutional Affiliation Office <br>
				Developed with Passion by: <a href="#">Crosby</a><br>
				(<a href="#">+233571357788</a>)
			</footer>
			</center><br>
		</article>

		<style type="text/css">
			@font-face {
			    font-family: Lato;
			    src: url(../fonts/Lato-Regular.ttf);
			}
			@font-face {
			    font-family: LatoLight;
			    src: url(../fonts/Lato-Light.ttf);
			}
			@font-face {
			    font-family: Montserrat;
			    src: url(../fonts/Montserrat-Regular.ttf);
			}
			.home_paper {
			    position: relative;
			    /*top: -70px;*/
			    z-index: 33;
			    width: 95%;
			    background: #fff;
			    padding: 50px;
			    padding-top: 40px;
			    padding-bottom: 30px;
			    box-shadow: 0 10px 32px -13px rgba(0 , 0, 0, 0.5);
			    border-radius: 3px;
			    box-sizing: border-box;
			    border: 1px solid rgba(0, 0, 0, 0.1);
			    margin-bottom: 30px;
			    transition: 0.3s all ease-in-out;
			    -webkit-transition: 0.3s all ease-in-out;
			    overflow: auto;
			}
			.centroid{
			    max-width: 800px;
			    margin: auto !important;
			    padding: 10px;
			    box-sizing: border-box;
			}
			.window_headers{
				border-bottom: 1px solid rgba(0, 0, 0, 0.1);
				max-width: 1200px;
				margin: auto;
				overflow: auto;
				min-height: 120px;
			}.push_l {
			    position: absolute;
			    left: -20px;
			}.push_r {
			    position: absolute;
			    right: -20px;
			    top: 10px;
			}
			.window_logo {
			    width: 80px;
			    height: 80px;
			}.imgfx img {
			    max-width: 100%;
			    min-height: 100%;
			}

			.window_name {
				margin-top: 30px;
			    text-align: center;
			    font-family: LatoLight;
			    letter-spacing: 1px;
			    font-weight: bold;
			    font-size: 1.6em;
			    line-height: 1.3em;
			    margin-bottom: 29px;
			    transition: 0.3s all ease-in-out;
			    -webkit-transition: 0.3s all ease-in-out;
			}

			.cal_date {
			    width: 120px;
			    height: 100px;
			    background: #003398;
			    color: #fff;
			    text-align: center;
			    border-radius: 10px;
			    overflow: hidden;
			    font-family: LatoLight;
			    box-shadow: 0px 3px 12px -6px rgba(0, 0, 0, 0.6);
			}.cal_day {
			    display: block;
			    height: 55%;
			    box-sizing: border-box;
			    padding: 8px;
			    font-size: 40px;
			}.cal_month {
			    height: 30%;
			    text-transform: uppercase;
			}.cal_year {
			    height: 15%;
			    font-size: 14px;
			    display: block;
			    padding-top: 10px;
			    font-family: Montserrat;
			    letter-spacing: 1px;
			    box-sizing: border-box;
			    position: relative;
			    top: -7px;
			}

			.mail_desc{
				font-family: Montserrat;
				max-width: 400px;
			}

			.platform_button{
				background: #003398;
				padding: 12px 12px;
				color: #fff;
				font-family: LatoLight;
				max-width: 120px;
				cursor: pointer;
				letter-spacing: 0.5px;
				border-radius: 20px 0px 20px 0px;
			}a{text-decoration: none; color: inherit;}
			a:hover{
				color: #DB2B29;
			}

			.mailcopyright{
				color: rgba(0, 0, 0, 0.5);
				font-family: LatoLight;
				font-size: 0.8em;
			}

			@media screen and (max-width: 699px){
				.window_logo {
				    width: 50px;
				    height: 50px;
				}

				.window_name{
					font-size: 1.1em;
				}
			}
			@media screen and (max-width: 399px){
				.window_name{
					margin-top: 78px;
				}
			}
		</style>
	</section>
</body>
</html>
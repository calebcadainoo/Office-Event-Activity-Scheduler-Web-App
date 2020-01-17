<?php
	include 'connect.php';
	// create month shorthand
	function sayMonth($num){
		if ($num == 1) { return "JAN"; }
		elseif ($num == 2) { return "FEB"; }
		elseif ($num == 3) { return "MAR"; }
		elseif ($num == 4) { return "APR"; }
		elseif ($num == 5) { return "MAY"; }
		elseif ($num == 6) { return "JUN"; }
		elseif ($num == 7) { return "JUL"; }
		elseif ($num == 8) { return "AUG"; }
		elseif ($num == 9) { return "SEPT"; }
		elseif ($num == 10) { return "OCT"; }
		elseif ($num == 11) { return "NOV"; }
		elseif ($num == 12) { return "DEC"; }
	}
	$date = date_default_timezone_get('Accra/Ghana');
	$todays_date = date('m/d/Y', strtotime($date . ' -0 day'));
	// query settings database for info
	$sqlA = "SELECT * FROM settings WHERE id=1 LIMIT 1";
	$resultsA = mysqli_query($con, $sqlA);
	while ($rowA = mysqli_fetch_array($resultsA)) {
		$destination_mail = $rowA['notifymail'];
		$cc_email = $rowA['ccnotifymail'];
	}
	// query database for notification info
	$sql = "SELECT * FROM calendar WHERE notifydate='$todays_date' ";
	$results = mysqli_query($con, $sql);
	$row_count = mysqli_num_rows($results);
	// print($row_count);
	while ($row = mysqli_fetch_array($results)) {
		$notifydate = DateTime::createFromFormat('m/d/Y', $row['startdate'])->format('jS F, Y');
		$calsch = $row['calsch'];
		$caldesc = $row['caldesc'];
		$startdate = date_create(date('m/d/Y', strtotime($row['startdate'])));
		$startdate = date_format($startdate, 'jS F, Y');
		$enddate = "";
		if ($row['enddate'] != "") {
			$enddate = ' to <b>'.DateTime::createFromFormat('m/d/Y', $row['enddate'])->format('jS F, Y');
		}
		$written_format = $row['caldesc'].'<br>'.'tomorrow <b>'.$startdate.'</b>'.$enddate.'</b><br><br>('.$calsch.')';

		$day = substr($row['startdate'], 3, 2);
		$month = sayMonth(substr($row['startdate'], 0, 2));
		$year = substr($row['startdate'], 6);
		// echo '\n'.$month;
		$count = mysqli_query($con, "SELECT id FROM notification WHERE noti_text = '$caldesc'");

		// mail details | info
		$from_name = "IAO Notification Platform";
		$encoding = "utf-8";
		$from_mail = "notify@iaoucc.com";
		$headers = "Content-type: text/html; charset=".$encoding." \r\n";
	    $headers .= "From: ".$from_name." <".$from_mail."> \r\n";
	    $headers .= "MIME-Version: 1.0 \r\n";
	    $headers .= "Content-Transfer-Encoding: 8bit \r\n";
	    $headers .= "Date: ".date("r (T)")." \r\n";
	    // $to      = 'ifcia@ucc.edu.gh';
	    $to      = $destination_mail;
        $subject = $from_name;

        $message_content = '
        	<!DOCTYPE html>
			<html>
			<head>
				<meta charset="utf-8">
				<meta name="theme-color" content="#333">
				<meta name="msapplication-navbutton-color" content="#333">
				<meta name="apple-mobile-web-app-status-bar-style" content="#333">
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<title>IAO Notification Platform</title>
			</head>
			<body>
				<section style="max-width: 800px; margin: auto !important; padding: 10px; box-sizing: border-box; position: relative; z-index: 33; width: 95%; background: #fff; box-sizing: border-box; margin-bottom: 30px; transition: 0.3s all ease-in-out; -webkit-transition: 0.3s all ease-in-out; overflow: auto;">
					<header style="border-bottom: 1px solid rgba(0, 0, 0, 0.1); max-width: 1200px; margin: auto; overflow: auto; min-height: 120px;">
						<figure class="window_logo push_r imgfx" style="width: 60px; height: 60px; overflow: hidden; text-align: center; margin: auto;">
							<img src="http://www.iaoucc.com/img/ucc_logo.gif" style="max-width: 100%; min-height: 100%;">
						</figure>

						<aside style="margin-top: 30px; text-align: center; font-family: LatoLight, sans-serif; letter-spacing: 1px; font-weight: bold; font-size: 1.6em; line-height: 1.3em; margin-bottom: 29px; transition: 0.3s all ease-in-out; -webkit-transition: 0.3s all ease-in-out;">IAO Planned Calendar</aside>

					</header>

					<article>
						<br><br>
						<center>
							<!-- date -->
							<div style="background:#1DDB04; width: 120px; height: 100px; color: #fff; text-align: center; border-radius: 10px; overflow: hidden; font-family: LatoLight, sans-serif; box-shadow: 0px 3px 5px rgba(0, 0, 0, 0.5);">
								<span style="display: block; height: 55%; box-sizing: border-box; font-size: 40px;">'.$day.'</span>
								<span style="height: 28%; text-transform: uppercase;">'.$month.'</span>
								<span style="height: 17%; font-size: 14px; display: block; font-family: Montserrat, sans-serif; letter-spacing: 1px; box-sizing: border-box; position: relative; top: -7px;">'.$year.'</span>
							</div><br>
							<!-- description -->
							<aside style="font-family: Montserrat, sans-serif; font-size:15px; max-width: 400px;">
								'.$written_format.'
							</aside><br><br><br>
							<!-- button -->
							<a href="http://www.iaoucc.com?view=calendar" style="text-decoration:none; color: inherit;"><button style="border: none; font-size: 14px; background:#003398; padding:12px 24px; color:#fff; font-family:LatoLight,sans-serif; box-shadow: 0px 3px 5px rgba(0, 0, 0, 0.5); letter-spacing:0.5px; border-radius:20px 0px 20px 0px">
								View Calendar
							</button></a>
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
        ';
		
		if(mysqli_num_rows($count) == 0) { // write notification if it isn't written already
		     // row not found, do stuff...
			$sql = mysqli_query($con, "INSERT INTO notification (subject, noti_text, schlogo,  letter_image, status) 
												VALUES ('IAO Notification Platform', '$caldesc', '$notifydate', '', '0') ");
			mail( $to, $subject, $message_content, $headers);
		}else{ // send 2 extra mails if notification is written
			if (date('H:i') == '6:30') {
				mail( $to, $subject, $message_content, $headers);
			}elseif (date('H:i') == '12:00') {
				mail( $to, $subject, $message_content, $headers);
				echo "<br><br>12 o'clock";
			}
		}
	}
?>
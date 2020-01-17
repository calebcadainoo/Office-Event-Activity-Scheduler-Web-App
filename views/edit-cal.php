<?php
	include '../php/global.php';
	if (isset($_GET['item_id'])) {
		# code...
		$fileID = $_GET['item_id'];
		$sql = mysqli_query($con, "SELECT * FROM calendar WHERE id='$fileID' ");
		while ($row = mysqli_fetch_assoc($sql)) {
			# code...
			$caldesc = $row['caldesc'];
			$startdate = $row['startdate'];
			$enddate = $row['enddate'];
			$calsch = $row['calsch'];
		}

		#******* UPDATE CALENDAR ******
		if (isset($_POST['cal_desc'])) {
			$caldesc = $_POST['cal_desc'];
			$caldesc = replaceAll($caldesc);
			$start_date = mysqli_escape_string($con, $_POST['start_date']);
			echo $start_date;
			$before_date = date('m/d/Y', strtotime($start_date . ' -1 day'));
			$enddate = $_POST['end_date'];
			$calsch = mysqli_escape_string($con, $_POST['calsch']);

	    	$sql = mysqli_query($con, "UPDATE calendar SET caldesc='$caldesc', startdate='$start_date', enddate='$enddate', notifydate='$before_date', calsch='$calsch'
									   WHERE id=$fileID") or die("Ouch couldn't insert your data <br><br>".mysqli_error($con));
    		if ($sql) {
        		echo "Done Text Only";
        		// go back to dashboard
        		echo '<script>window.location.href="../?view=calendar";</script>';
        	}else{
        		echo "Couldnt Update Work, Please Check Connection";
        	}
		}
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
	<link rel="stylesheet" type="text/css" href="../css/reset.css">
	<link rel="stylesheet" type="text/css" href="../css/frontuiux.css">
	<link rel="stylesheet" type="text/css" href="../css/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/jquery.ui.js"></script>
	<script type="text/javascript" src="../js/front.iao.js"></script>
</head>
<body>

	<!-- add moderators block -->
	<section class="create_overlay item_overlay" style="display: block;">
		<!-- close -->
		<div class="closebtn" title="Close" onclick='window.location.href="../?view=calendar";'></div>

		<div class="form_paper calendar_paper">
			<div class="cal2_form_paper"><form method="post" action="" enctype="multipart/form-data">
				<h1 class="form_h1">Edit &bull; Calendar</h1>
		 		<div class="liner1"></div><br>
				<div class="form_contentbx clearout">
					<!-- calendar title -->
					 <div class="form_textarea info">
					 	<textarea name="cal_desc" placeholder="Calendar Description..."><?php print($caldesc); ?></textarea>
					 </div>
					 <!-- start date -->
					 <div class="form_textbx info">
					 	<input id="datepickerC" type="text" class="form_el_txtbx" name="start_date" required="required" placeholder="Start Date..." value="<?php print($startdate) ?>">
					 </div>
					 <!-- end date -->
					 <div class="form_textbx info">
					 	<input id="datepickerD" type="text" class="form_el_txtbx" name="end_date" placeholder="End Date(optional)..." value="<?php print($enddate) ?>">
					 </div>
					 <!-- school for moderation -->
					<div class="form_textbx info">
					 	<select class="form_combo form_el_txtbx" name="calsch" required="required" title="Please Select The School For Moderation">
					 		<option value="<?php print($calsch); ?>"><?php print($calsch); ?></option>
					 		<option value="">-- Select School --</option>
					 		<?php
					 			$sql = mysqli_query($con, "SELECT * FROM schools ORDER BY schname ");
								while ($row=mysqli_fetch_assoc($sql)) {
		 				print('
		 					<option value="'.$row['schname'].'">'.$row['schname'].'</option>
		 				');
					 			}
					 			mysqli_close($con);
					 		?>
					 	</select>
					</div>
				</div><br>
				<div class="front_clrfx"></div>
				<center>
					<input type="submit" name="btnSend" class="btnSend btnLetter" value="Update Calendar" style="float: none;">
				</center>
			</form></div><br><br>
		</div>
	</section>

	<script>
		
		$(function() {
			$( "#datepickerC" ).datepicker({
				dateFormat: "mm/dd/yy"
			});

			$( "#datepickerD" ).datepicker({
				dateFormat: "mm/dd/yy"
			});
		});
	 
	 </script>
	<!-- end of add moderators block -->

</body>
</html>
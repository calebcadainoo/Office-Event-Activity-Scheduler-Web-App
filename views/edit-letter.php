<?php
	include '../php/global.php';
	if (isset($_GET['item_id'])) {
		# code...
		$letterID = $_GET['item_id'];
		$sql = mysqli_query($con, "SELECT * FROM letters WHERE id='$letterID' ");
		while ($row = mysqli_fetch_assoc($sql)) {
			# code...
			$scannedletter = $row['scanned_letter'];
			$lettertitle = $row['letter_title'];
			$letterrefnum = $row['letter_refno'];
			$letterschool = $row['letter_school'];
			// $date = date_create($row[0]);
			$letterdeadline = $row['letter_deadline'];
			$letterdate = $row['letter_date'];

		}

		#******* UPDATE LETTER ******
		if (isset($_POST['lettertitle'])) {
			// image
			$img_path = uniqid().'_'.$_FILES["imgfile"]["name"];
			$letterImg = 'letters/'.$img_path;
			$img_save_loc = '../'.$letterImg;
			// text
			$lettertitle = $_POST['lettertitle'];
			$letterrefnum = $_POST['letterrefnum'];
			$letterschool = $_POST['letterschool'];
			// dates
			$letterdeadline = $_POST['letterdeadline'];	
			// dates
			$letterdate = $_POST['letterdate'];	

			// check and upload image
			if ((($_FILES["imgfile"]["type"] == "image/gif")|| ($_FILES["imgfile"]["type"] == "image/jpeg") || ($_FILES["imgfile"]["type"] == "image/png")  || ($_FILES["imgfile"]["type"] == "image/pjpeg")) && ($_FILES["imgfile"]["size"] < (500 * 10000))){
		        if(file_exists($_FILES["imgfile"]["name"])){
		        	// file exist
		        	echo "file exist";
		        	$sql = mysqli_query($con, "UPDATE letters SET letter_title='$lettertitle',  letter_refno='$letterrefnum',  letter_deadline='$letterdeadline',  letter_date='$letterdate',  letter_school='$letterschool' WHERE id=$letterID") or die("Ouch couldn't insert your data <br><br>".mysqli_error($con));
		        	if ($sql) {
		        		echo "done text only";
		        	}else{
		        		echo "cudnt upload";
		        	}
		            $upload_img = 0;
		        }else{
		        	$img_path = uniqid().'_'.$_FILES["imgfile"]["name"];
					$letterImg = 'letters/'.$img_path;
					$img_save_loc = '../'.$letterImg;
		            if (move_uploaded_file($_FILES["imgfile"]["tmp_name"], $img_save_loc)) {
		            	// upload image + text
		            	$sql = mysqli_query($con, "UPDATE letters SET scanned_letter='$letterImg', letter_title='$lettertitle',  letter_refno='$letterrefnum',  letter_deadline='$letterdeadline',  letter_date='$letterdate',  letter_school='$letterschool' WHERE id=$letterID") or die("Ouch couldn't insert your data <br><br>".mysqli_error($con));
			        	if ($sql) {
							echo "Nice Data Saved And Published!";
							// go back to school page
							echo '<script>window.location.href="../?view=letters";</script>';
						}
			        }
		        }
		    }else{
            	$sql = mysqli_query($con, "UPDATE letters SET letter_title='$lettertitle',  letter_refno='$letterrefnum',  letter_deadline='$letterdeadline',  letter_date='$letterdate',  letter_school='$letterschool' WHERE id=$letterID") or die("Ouch couldn't insert your data <br><br>".mysqli_error($con));
        		if ($sql) {
	        		echo "Done Text Only";
	        		// go back to dashboard
	        		echo '<script>window.location.href="../?view=letters";</script>';
	        	}else{
	        		echo "Couldnt Update LETTER, Please Check Connection";
	        	}
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
	<link rel="stylesheet" type="text/css" href="../css/magic.min.css">
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/jquery.ui.js"></script>
	<script type="text/javascript" src="../js/front.ifcia.js"></script>
</head>
<body>

		<!-- add letter block -->
	<section class="create_overlay item_overlay" style="display: block;">
		<!-- close -->
		<a href="../?view=letters"><div class="closebtn" title="Close"></div></a>

		<div class="preview_letter_bx">
			<div class="create_form_paper"><form method="post" action="" enctype="multipart/form-data">
				<h1 class="form_h1">Edit &bull; Letter</h1>
		 		<div class="liner1"></div><br><br>
				<div class="form_contentbx clearout">
					<!-- image -->
					<figure class="scan_upload scanned_letter imgfx">
						<label class="upload_img" title="Upload Image"><input type="file" class="hidebx" id="imgfile" name="imgfile" value="<?php print($scannedletter); ?>" ></label>
						<img id="imgPreview" src="../<?php print($scannedletter); ?>" alt="">
					</figure>

					<script>
						function readURL(input) {
							if (input.files && input.files[0]) {
								var reader = new FileReader();
							    reader.onload = function(e) {
							      $('#imgPreview').attr('src', e.target.result);
							    }
							    reader.readAsDataURL(input.files[0]);
							}
						}

						$("#imgfile").change(function() {
						  readURL(this);
						});
					</script>
					<!-- text -->
					<aside class="scanned_letter_info">
						<!-- letter title -->
						<div class="form_textbx info">
						 	<input type="text" class="form_el_txtbx" name="lettertitle" required="required" placeholder="Letter Title..." title="Letter Title" value="<?php print($lettertitle) ?>">
						</div>
						 <!-- letter ref no -->
						<div class="form_textbx info">
						 	<input type="text" class="form_el_txtbx" name="letterrefnum" required="required" placeholder="Letter Reference Number..." title="Letter Reference Number" value="<?php print($letterrefnum) ?>">
						</div>
						<!-- letter date -->
						<div class="form_textbx info">
						 	<input type="text" id="datepickerA" class="form_el_txtbx" name="letterdate" required="required" placeholder="Letter Date eg. DD/MM/YYYY..." title="Letter Date eg. DD/MM/YYYY" value="<?php print($letterdate) ?>">
						</div>
						<!-- school for moderation -->
						<div class="form_textbx info">
						 	<!-- <input type="text" class="form_el_txtbx" name="letterschool" required="required" placeholder="School for Moderation eg. CSIR..." title="School for Moderation eg. CSIR"> -->
						 	<select class="form_combo form_el_txtbx" name="letterschool" required="required" title="Please Select The School For Moderation">
						 		<option value="<?php print($letterschool); ?>"><?php print($letterschool); ?></option>
						 		<option value="">-- Select School --</option>
						 		<?php
					 				include '../php/global.php';
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
						<!-- letter deadline -->
						<div class="form_textbx info">
						 	<input type="text" id="datepickerB" class="form_el_txtbx" name="letterdeadline" required="required" placeholder="Letter Deadline eg. DD/MM/YYYY..." title="Letter Deadline eg. DD/MM/YYYY" value="<?php print($letterdeadline) ?>">
						</div>
					</aside>
				</div>
				<br><div class="front_clrfx"></div>
				<input type="submit" name="btnSend" class="btnSend btnLetter" value="Update Letter">
			</form></div>
		</div>
	</section>

	<script>
		$( function() {
			$( "#datepickerA" ).datepicker({
				dateFormat: "dd/mm/yy"
			});

			$( "#datepickerB" ).datepicker({
				dateFormat: "dd/mm/yy"
			});
		});
	 </script>
	<!-- end of add letter block -->

</body>
</html>
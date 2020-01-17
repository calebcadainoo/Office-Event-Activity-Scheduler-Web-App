<?php
	include '../php/global.php';
	if (isset($_GET['item_id'])) {
		# code...
		$schID = $_GET['item_id'];
		$sql = mysqli_query($con, "SELECT * FROM schools WHERE id='$schID' ");
		while ($row = mysqli_fetch_assoc($sql)) {
			# code...
			$schname = $row['schname'];
			$schlogo = $row['schlogo'];
			$schpobox = $row['schpobox'];
			$schloc = $row['schloc'];
			$schshorthand = $row['schshorthand'];
			$schmail = $row['schmail'];
			$schtel = $row['schtel'];
			$schrefno = $row['schrefno'];
			$schfileno = $row['schfileno'];
		}

		#******* UPDATE SCHOOL ******
		if (isset($_POST['schname'])) {
			// image
			$img_path = uniqid().'_'.$_FILES["imgfile"]["name"];
			$schlogo = 'schools/'.$img_path;
			$img_save_loc = '../'.$schlogo;
			// text
			$schname = $_POST['schname'];
			$schpobox = $_POST['schpobox'];
			// $schpobox = replaceAll($schpobox);
			$schloc = $_POST['schloc'];
			// $schloc = replaceAll($schloc);
			$schshorthand = $_POST['schshorthand'];
			$schmail = $_POST['schmail'];
			$schtel = $_POST['schtel'];
			$schrefno = $_POST['schrefno'];
			$schfileno = $_POST['schfileno'];

			// check and upload image
			if ((($_FILES["imgfile"]["type"] == "image/gif")|| ($_FILES["imgfile"]["type"] == "image/jpeg") || ($_FILES["imgfile"]["type"] == "image/png")  || ($_FILES["imgfile"]["type"] == "image/pjpeg")) && ($_FILES["imgfile"]["size"] < (500 * 10000))){
		        if(file_exists($_FILES["imgfile"]["name"])){
		        	// file exist
		        	echo "file exist";
		        	$sql = mysqli_query($con, "UPDATE schools SET schname='$schname', schpobox='$schpobox', schloc='$schloc', schshorthand='$schshorthand', schmail='$schmail', schtel='$schtel', schrefno='$schrefno', schfileno='$schfileno'
										   WHERE id=$schID") or die("Ouch couldn't insert your data <br><br>".mysqli_error($con));
		        	if ($sql) {
		        		echo "done text only";
		        	}else{
		        		echo "cudnt upload";
		        	}
		            $upload_img = 0;
		        }else{
		        	$img_path = $_FILES["imgfile"]["name"];
					$schlogo = 'schools/'.$img_path;
					$img_save_loc = '../'.$schlogo;
		            if (move_uploaded_file($_FILES["imgfile"]["tmp_name"], $img_save_loc)) {
		            	// upload image + text
		            	$sql = mysqli_query($con, "UPDATE schools SET schlogo='$schlogo', schname='$schname', schpobox='$schpobox', schloc='$schloc', schshorthand='$schshorthand', schmail='$schmail', schtel='$schtel', schrefno='$schrefno', schfileno='$schfileno'
										   WHERE id=$schID") or die("Ouch couldn't insert your data <br><br>".mysqli_error($con));
		        	if ($sql) {
							echo "Nice Data Saved And Published!";
							// go back to school page
							echo '<script>window.location.href="../?view=schools";</script>';
						}
		            }
		        }
		    }else{
		    	$sql = mysqli_query($con, "UPDATE schools SET schname='$schname', schpobox='$schpobox', schloc='$schloc', schshorthand='$schshorthand', schmail='$schmail', schtel='$schtel', schrefno='$schrefno', schfileno='$schfileno'
										   WHERE id=$schID") or die("Ouch couldn't insert your data <br><br>".mysqli_error($con));
		        		if ($sql) {
		        		echo "Done Text Only";
		        		// go back to dashboard
		        		echo '<script>window.location.href="../?view=schools";</script>';
		        	}else{
		        		echo "Couldnt Update Work, Please Check Connection";
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
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/magic.min.css">
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/front.ifcia.js"></script>
</head>
<body>

	<!-- add school block -->
	<section class="create_overlay item_overlay" style="display: block;">
		<!-- close -->
		<a href="../?view=schools">
			<div class="closebtn" title="Close"></div>
		</a>

		<div class="preview_letter_bx">
			<div class="create_form_paper"><form method="post" action="" enctype="multipart/form-data">
				<h1 class="form_h1">Edit &bull; School</h1>
		 		<div class="liner1"></div><br><br>
				<div class="form_contentbx clearout">
					<!-- image -->
					<figure class="scan_upload scanned_letter imgfx">
						<label class="upload_img" title="Upload Image"><input type="file" class="hidebx" id="imgfile" name="imgfile" value="<?php print($schlogo); ?>"></label>
						<img id="imgPreview" src="<?php print('../'.$schlogo) ?>" alt="">
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
						<!-- school name -->
						 <div class="form_textbx info">
						 	<input type="text" class="form_el_txtbx" name="schname" required="required" placeholder="School Name..." value="<?php print($schname) ?>" title="School Name">
						 </div>
						 <!-- school address line 2 -->
						 <div class="form_textbx info">
						 	<input type="text" class="form_el_txtbx" name="schpobox" required="required" placeholder="P. O. Box XXXX..." value="<?php print($schpobox) ?>" title="P. O. Box XXXX">
						 </div>
						 <!-- school address line 3 -->
						 <div class="form_textbx info">
						 	<input type="text" class="form_el_txtbx" name="schloc" required="required" placeholder="Town-Region(Address)..." value="<?php print($schloc) ?>" title="Town-Region(Address)">
						 </div>
						 <!-- school short hand -->
						 <div class="form_textbx info">
						 	<input type="text" class="form_el_txtbx" name="schshorthand" required="required" placeholder="Shorthand eg.BMFI or Ashesi..." value="<?php print($schshorthand) ?>" title="Shorthand eg.BMFI or Ashesi">
						 </div>
						 <!-- school mail -->
						 <div class="form_textbx info">
						 	<input type="text" class="form_el_txtbx" name="schmail" required="required" placeholder="Email..." value="<?php print($schmail) ?>" title="Email">
						 </div>
						 <!-- school tel -->
						 <div class="form_textbx info">
						 	<input type="text" class="form_el_txtbx" name="schtel" required="required" placeholder="Contact Number..." value="<?php print($schtel) ?>" title="Contact Number">
						 </div>
						 <!-- school ref no -->
						 <div class="form_textbx info">
						 	<input type="text" class="form_el_txtbx" name="schrefno" required="required" placeholder="School Ref. No..." value="<?php print($schrefno) ?>" title="School Ref. No.">
						 </div>
						 <!-- school file num -->
						 <div class="form_textbx info">
						 	<input type="text" class="form_el_txtbx" name="schfileno" required="required" placeholder="School File No..." value="<?php print($schfileno) ?>" title="School File No.">
						 </div>
					</aside>
				</div>
				<br><div class="front_clrfx"></div>
				<input type="submit" name="btnSend" class="btnSend btnLetter" value="Update Info">
			</form></div>
		</div>
	</section>
	<!-- end of add school block -->

</body>
</html>
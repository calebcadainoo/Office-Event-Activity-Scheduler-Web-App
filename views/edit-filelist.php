<?php
	include '../php/global.php';
	if (isset($_GET['item_id'])) {
		# code...
		$fileID = $_GET['item_id'];
		$sql = mysqli_query($con, "SELECT * FROM filelist WHERE id='$fileID' ");
		while ($row = mysqli_fetch_assoc($sql)) {
			# code...
			$filename = $row['filename'];
			$fileshorthand = $row['fileshorthand'];
			$filerefno = $row['filerefno'];
			$fileno = $row['fileno'];
		}

		#******* UPDATE SCHOOL ******
		if (isset($_POST['filename'])) {
			// image
			// $img_path = $_FILES["imgfile"]["name"];
			// $schlogo = 'schools/'.$img_path;
			// $img_save_loc = '../'.$schlogo;
			// text
			$filename = $_POST['filename'];
			$fileshorthand = $_POST['fileshorthand'];
			$filerefno = $_POST['filerefno'];
			$fileno = $_POST['fileno'];

			// check and upload image
			// if ((($_FILES["imgfile"]["type"] == "image/gif")|| ($_FILES["imgfile"]["type"] == "image/jpeg") || ($_FILES["imgfile"]["type"] == "image/png")  || ($_FILES["imgfile"]["type"] == "image/pjpeg")) && ($_FILES["imgfile"]["size"] < (500 * 10000))){
		 //        if(file_exists($_FILES["imgfile"]["name"])){
		 //        	// file exist
		 //        	echo "file exist";
		 //        	$sql = mysqli_query($con, "UPDATE filelist SET filename='$filename', fileshorthand='$fileshorthand', filerefno='$filerefno', fileno='$fileno'
			// 							   WHERE id=$fileID") or die("Ouch couldn't insert your data <br><br>".mysqli_error($con));
		 //        	if ($sql) {
		 //        		echo "done text only";
		 //        	}else{
		 //        		echo "cudnt upload";
		 //        	}
		 //            $upload_img = 0;
		 //        }else{
		 //        	$img_path = $_FILES["imgfile"]["name"];
			// 		$schlogo = 'schools/'.$img_path;
			// 		$img_save_loc = '../'.$schlogo;
		 //            if (move_uploaded_file($_FILES["imgfile"]["tmp_name"], $img_save_loc)) {
		 //            	// upload image + text
		 //            	$sql = mysqli_query($con, "UPDATE filelist SET filelogo='$filelogo', filename='$filename', fileshorthand='$fileshorthand', filerefno='$filerefno', fileno='$fileno'
			// 							   WHERE id=$fileID") or die("Ouch couldn't insert your data <br><br>".mysqli_error($con));
		 //        	if ($sql) {
			// 				echo "Nice Data Saved And Published!";
			// 				// go back to school page
			// 				// echo '<script>window.location.href="../?view=filelist";</script>';
			// 			}
		 //            }
		 //        }
		 //    }else{
		    	$sql = mysqli_query($con, "UPDATE filelist SET filename='$filename', fileshorthand='$fileshorthand', filerefno='$filerefno', fileno='$fileno'
										   WHERE id=$fileID") or die("Ouch couldn't insert your data <br><br>".mysqli_error($con));
		        		if ($sql) {
		        		echo "Done Text Only";
		        		// go back to dashboard
		        		// echo '<script>window.location.href="../?view=filelist";</script>';
		        	}else{
		        		echo "Couldnt Update Work, Please Check Connection";
		        	}
		    // }
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
		<a href="../?view=filelist">
			<div class="closebtn" title="Close"></div>
		</a>

		<div class="preview_letter_bx">
			<div class="create_form_paper"><form method="post" action="" enctype="multipart/form-data">
				<h1 class="form_h1">Edit &bull; File</h1>
		 		<div class="liner1"></div><br><br>
				<div class="form_contentbx clearout">
					<!-- image -->
					<figure class="scan_upload scanned_letter imgfx">
						<!-- <label class="upload_img" title="Upload Image"><input type="file" class="hidebx" id="imgfile" name="imgfile" value="<?php #print($schlogo); ?>"></label> -->
						<img id="imgPreview" src="<?php print('../img/filelist.png') ?>" alt="">
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
						<!-- file name -->
						 <div class="form_textbx info">
						 	<input type="text" class="form_el_txtbx" name="filename" required="required" placeholder="File Name..." value="<?php print($filename) ?>" title="File Name">
						 </div>
						 <!-- file short hand -->
						 <div class="form_textbx info">
						 	<input type="text" class="form_el_txtbx" name="fileshorthand" required="required" placeholder="Shorthand eg.BMFI or Ashesi..." value="<?php print($fileshorthand) ?>" title="Shorthand eg.BMFI or Ashesi">
						 </div>
						 <!-- file ref no -->
						 <div class="form_textbx info">
						 	<input type="text" class="form_el_txtbx" name="filerefno" required="required" placeholder="File Ref. No..." value="<?php print($filerefno) ?>" title="File Ref. No.">
						 </div>
						 <!-- file num -->
						 <div class="form_textbx info">
						 	<input type="text" class="form_el_txtbx" name="fileno" required="required" placeholder="File File No..." value="<?php print($fileno) ?>" title="File File No.">
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
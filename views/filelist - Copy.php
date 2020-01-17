<?php

	if (isset($_POST['filename'])) {
		# get the variables...
		$filename = $_POST['filename'];
		$fileshorthand = $_POST['fileshorthand'];
		$filerefno = $_POST['filerefno'];
		$fileno = $_POST['fileno'];
		# school logo
		// $schlogo = uniqid().'_'.$_FILES["imgfile"]["name"];
		// $image_path = 'schools/'.$schlogo;
		// $img_save_loc = './'.$image_path;

		// if ((($_FILES["imgfile"]["type"] == "image/gif")|| ($_FILES["imgfile"]["type"] == "image/jpeg") || ($_FILES["imgfile"]["type"] == "image/png")  || ($_FILES["imgfile"]["type"] == "image/pjpeg")) && ($_FILES["imgfile"]["size"] < (500 * 10000))){
	 //        if(file_exists($_FILES["imgfile"]["name"])){
	 //            echo "File name exists.";
	 //            $upload_img = 0;
	 //            echo "Hmmmm...Please Go Back";
	 //        }else{
	 //            if (move_uploaded_file($_FILES["imgfile"]["tmp_name"], $img_save_loc)) {
		// 			$sql = mysqli_query($con, "INSERT INTO filelist (filename, fileshorthand, filerefno, fileno)
		// 							VALUES ('$filename','$fileshorthand', '$filerefno', '$fileno')") 
		// 							or die("Ouch couldn't insert your data <br><br>".mysqli_error() );
	 //            }
	 //        }
	 //    }

	$sql = mysqli_query($con, "INSERT INTO filelist (filename, fileshorthand, filerefno, fileno)
									VALUES ('$filename','$fileshorthand', '$filerefno', '$fileno')") 
									or die("Ouch couldn't insert your data <br><br>".mysqli_error() );
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

			<aside class="window_name">File List</aside>

			<!-- logo -->
			<figure class="window_logo push_r imgfx">
				<img src="img/ucc_logo.gif">
			</figure>
		</header> <!-- end of window headers -->

		<br>
		<!-- <form>
			Filter: 
			<label><input type="radio" name="schname" onclick="window.location.href='./?view=schools&filter=id';"> ID</label>
			<label><input type="radio" name="schname" onclick="window.location.href='./?view=schools&filter=schname';"> School Name</label>
			<a href="./?view=schools&filter=schrefno"><label><input type="radio" name="schname"> File No.</label></a>
			<a href="./?view=schools&filter=id"><label><input type="radio" name="schname"> Ref. No.</label></a>
			<a href="./?view=schools&filter=id"><label><input type="radio" name="schname"> Location</label></a>
		</form> -->
		<section class="grid_container sch_grid_container">
			<?php
				include 'php/connect.php';
				// $filter = "";
				// if (isset($_GET['filter'])) {
				// 	$filter = $_GET['filter'];
				// }
				// $filterelement = 'schname';

				// switch ($filter) {
				// 	case 'fileno':
				// 		$filterelement = 'schrefno';
				// 		break;
				// 	case 'id':
				// 		$filterelement = 'id';
				// 		break;
				// 	case 'refno':
				// 		$filterelement = 'schfileno';
				// 		break;
				// 	case 'loc':
				// 		$filterelement = 'schloc';
				// 		break;
				// }

				$sql = mysqli_query($con, "SELECT * FROM filelist ORDER BY filename ");
				while ($row=mysqli_fetch_assoc($sql)) {
					print('
						<!-- sch grid -->
						<div class="grid-4 sch_grid">
							<section class="sch_grid_fill">
								<!-- logo -->
								<figure class="sch_logo imgfx">
									<img src="img/filelist.png" alt="'.$row['filename'].'">
								</figure>
								<div id="edit-'.$row['id'].'" class="edit-file" title="Edit File"></div>
								<div id="del-'.$row['id'].'" class="del-file" title="Delete File"></div>
								<!-- details -->
								<aside class="sch_details">
									<div class="sch_name"><b>'.$row['filename'].'</b></div><br>
									<p>Shorthand: '.$row['fileshorthand'].'</p><br>
									<p>Ref. No: '.$row['filerefno'].'</p><br>
									<p>File No: '.$row['fileno'].'</p>
								</aside>
							</section>
						</div>

					');
				}
			?>
		</section>

	</section>
	<!-- end of home paper -->

	<!-- fab add school -->
	<aside class="fab_create imgfx" title="Add New School">
		<img src="ico/create_new.png">
	</aside>
	<!-- end of fab add school -->

	<!-- add school block -->
	<section class="create_overlay item_overlay">
		<!-- close -->
		<div class="closebtn" title="Close"></div>

		<div class="preview_letter_bx">
			<div class="create_form_paper"><form method="post" action="" enctype="multipart/form-data">
				<h1 class="form_h1">Add &bull; File</h1>
		 		<div class="liner1"></div><br><br>
				<div class="form_contentbx">
					<!-- image -->
					<figure class="scan_upload scanned_letter imgfx">
						<!-- <label class="upload_img" title="Upload Image"><input type="file" class="hidebx" id="imgfile" name="imgfile" required="required"></label> -->
						<img id="imgPreview" src="img/filelist.png" alt="">
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
						 	<input type="text" class="form_el_txtbx" name="filename" required="required" placeholder="File Name..." title="File Name">
						 </div>
						 <!-- file short hand -->
						 <div class="form_textbx info">
						 	<input type="text" class="form_el_txtbx" name="fileshorthand" required="required" placeholder="Shorthand eg.BMFI or Ashesi..." title="Shorthand eg.BMFI or Ashesi">
						 </div>
						 <!-- file ref no -->
						 <div class="form_textbx info">
						 	<input type="text" class="form_el_txtbx" name="filerefno" required="required" placeholder="File Ref. No..." title="File Ref. No.">
						 </div>
						 <!-- file num -->
						 <div class="form_textbx info">
						 	<input type="text" class="form_el_txtbx" name="fileno" required="required" placeholder="File No..." title="File No.">
						 </div>
					</aside>
				</div>
				<br><div class="front_clrfx"></div>
				<input type="submit" name="btnSend" class="btnSend btnLetter" value="Add File">
			</form></div>
		</div>
	</section>
	<!-- end of add school block -->
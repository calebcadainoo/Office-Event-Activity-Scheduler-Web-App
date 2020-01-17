<?php
	
	if (isset($_POST['lettertitle'])) {
		$lettertitle = $_POST['lettertitle'];
		$letterrefnum = $_POST['letterrefnum'];
		$letterschool = $_POST['letterschool'];
		$sql = mysqli_query($con, "SELECT schlogo FROM schools WHERE schname='$letterschool' ");
		$row = mysqli_fetch_assoc($sql);
		$schlogo = $row['schlogo'];
		// dates
		$letterdeadline = $_POST['letterdeadline'];
		// dates
		$letterdate = $_POST['letterdate'];

		// echo $letterdate;

		// echo date("d-m-Y", strtotime('31-05-2018'));

		# scanned letter 
		$letter = uniqid().'_'.$_FILES["imgfile"]["name"];
		$image_path = 'letters/'.$letter;
		$img_save_loc = './'.$image_path;

		if ((($_FILES["imgfile"]["type"] == "image/gif")|| ($_FILES["imgfile"]["type"] == "image/jpeg") || ($_FILES["imgfile"]["type"] == "image/png")  || ($_FILES["imgfile"]["type"] == "image/pjpeg")) && ($_FILES["imgfile"]["size"] < (500 * 10000))){
	        if(file_exists($_FILES["imgfile"]["name"])){
	            echo "File name exists.";
	            $upload_img = 0;
	            echo "Hmmmm...Please Go Back";
	        }else{
	            if (move_uploaded_file($_FILES["imgfile"]["tmp_name"], $img_save_loc)) {
					$sql = mysqli_query($con, "INSERT INTO letters (scanned_letter,  letter_title,  letter_refno, letter_deadline,  letter_date, letter_school, schlogo)
									VALUES ('$image_path','$lettertitle', '$letterrefnum', '$letterdeadline', '$letterdate', '$letterschool', '$schlogo')") 
									or die("Ouch couldn't insert your data <br><br>".mysqli_error($con) );
	            }
	        }
	    }
	}
	
?>

	<!-- home paper -->
	<section class="centroid home_paper user_paper">
		<!-- window headers -->
		<header class="window_headers">
			<!-- logo -->
			<figure class="window_logo push_l imgfx">
				<img src="img/ifcia logo.png">
			</figure>

			<aside class="window_name">Letters</aside>

			<!-- logo -->
			<figure class="window_logo push_r imgfx">
				<img src="img/ucc_logo.gif">
			</figure>
		</header> <!-- end of window headers -->


		<div class="grid_container user_gridbx">
			<?php
				$sql = mysqli_query($con, "SELECT * FROM letters ORDER BY id DESC ");
				while ($row = mysqli_fetch_assoc($sql)) {
					# code...
					print('
						<!-- grid -->
						<div class="grid-3 scanned_letter_grid">
							<aside class="letter_grid_fill" title="'.$row['letter_title'].' <br>'.$row['letter_school'].'">
								<!-- del -->
								<div id="del-'.$row['id'].'" class="del-item" title="Delete Letter"></div>
								<!-- edit -->
								<div id="edit-'.$row['id'].'" class="edit-item" title="Edit Letter Details"></div>
								<!-- preview -->
								<div id="preview-'.$row['id'].'" class="preview-item" title="Preview Letter"></div>

								<!-- scanned letter -->
								<figure id="scanned_letter-'.$row['id'].'" class="scanned_letter imgfx">
									<img id="scanned_letter-'.$row['id'].'" src="'.$row['scanned_letter'].'" alt="">
								</figure>
								<!-- letter title -->
								<footer id="letter-'.$row['id'].'" class="letter_title">
									'.$row['letter_title'].'
								</footer>
							</aside>
						</div>
					');
				}
			?>

			
		</div>
	</section>
	<!-- end of home paper -->

	<!-- fab create letter -->
	<aside class="fab_create imgfx" title="Add New Letter">
		<img src="ico/create_new.png">
	</aside>
	<!-- end of fab create letter -->


	<!-- preview block -->
	<section class="preview_overlay item_overlay">
		<!-- close -->
		<div class="closebtn" title="Close"></div>

		<div class="preview_letter_bx">
			<!-- scanned letter title -->
			<header class="scanned_letter_title">
				Pre-Examination Moderation Exercise: CSIR College of Science And Technology, Kumasi Campus
			</header>
			<!-- scanned letter -->
			<figure class="scanned_letter_img imgfx">
				<img src="#" alt="">
			</figure>

			<div class="spacerB"></div>
		</div>
	</section>
	<!-- end of preview block -->


	<!-- add letter block -->
	<section class="create_overlay item_overlay">
		<!-- close -->
		<div class="closebtn" title="Close"></div>

		<div class="preview_letter_bx">
			<div class="create_form_paper"><form method="post" action="" enctype="multipart/form-data">
				<h1 class="form_h1">Add &bull; Letter</h1>
		 		<div class="liner1"></div><br><br>
				<div class="form_contentbx">
					<!-- image -->
					<figure class="scan_upload scanned_letter imgfx">
						<label class="upload_img" title="Upload Image"><input type="file" class="hidebx" id="imgfile" name="imgfile" required="required"></label>
						<img id="imgPreview" src="" alt="">
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
						 	<input type="text" class="form_el_txtbx" name="lettertitle" required="required" placeholder="Letter Title..." title="Letter Title">
						</div>
						 <!-- letter ref no -->
						<div class="form_textbx info">
						 	<input type="text" class="form_el_txtbx" name="letterrefnum" required="required" placeholder="Letter Reference Number..." title="Letter Reference Number">
						</div>
						<!-- letter date -->
						<div class="form_textbx info">
						 	<input type="text" id="datepickerA" class="form_el_txtbx" name="letterdate" required="required" placeholder="Letter Date eg. DD/MM/YYYY..." title="Letter Date eg. DD/MM/YYYY">
						</div>
						<!-- school for moderation -->
						<div class="form_textbx info">
						 	<!-- <input type="text" class="form_el_txtbx" name="letterschool" required="required" placeholder="School for Moderation eg. CSIR..." title="School for Moderation eg. CSIR"> -->
						 	<select class="form_combo form_el_txtbx" name="letterschool" required="required" title="Please Select The School For Moderation">
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
						<!-- letter deadline -->
						<div class="form_textbx info">
						 	<input type="text" id="datepickerB" class="form_el_txtbx" name="letterdeadline" required="required" placeholder="Moderation Date eg. DD/MM/YYYY..." title="Moderation Date eg. DD/MM/YYYY">
						</div>
					</aside>
				</div>
				<br><div class="front_clrfx"></div>
				<input type="submit" name="btnSend" class="btnSend btnLetter" value="Add Letter">
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
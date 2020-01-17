<?php 

	if (isset($_POST['moderator_number'])) {
		$moderator_name = $_POST['moderator_name'];
		$moderator_number = $_POST['moderator_number'];
		$moderator_dept = $_POST['moderator_dept'];
		$moderator_email = $_POST['moderator_email'];
		
		include 'php/connect.php';
		$sql = mysqli_query($con, "INSERT INTO moderators (mName, mNumber, mDepartment, mEmail) 
								VALUES ('$moderator_name', '$moderator_number', '$moderator_dept', '$moderator_email') ") or die("Ouch! Couldn't Insert Your Data");
		if ($sql) {
			// print('Tasty!');
		}
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

			<aside class="window_name">Moderators</aside>

			<!-- logo -->
			<figure class="window_logo push_r imgfx">
				<img src="img/ucc_logo.gif">
			</figure>
		</header> <!-- end of window headers -->

		<section id="result" class="grid_container mod_grid_container">
			<script>
				$(function(){
					load_data();
					function load_data(query){
						$.ajax({
							url:"views/fetchdata_mod.php",
							method:"post",
							data:{query:query},
							success:function(data){
								$('#result').html(data);
							}
						});
					}
					
					$('#search_text').keyup(function(){
						var search = $(this).val();
						if(search != ''){
							load_data(search);
						}else{
							load_data();			
						}
					});
				});
			</script>
		</section><br>

	</section>
	<!-- end of home paper -->

	<!-- fab add moderators -->
	<aside class="fab_create imgfx" title="Add Moderator">
		<img src="ico/create_new.png">
	</aside>
	<!-- end of fab add moderators -->


	<!-- add moderators block -->
	<section class="create_overlay item_overlay">
		<!-- close -->
		<div class="closebtn" title="Close"></div>

		<div class="preview_letter_bx moderator_paper">
			<div class="create_form_paper"><form method="post" action="" enctype="multipart/form-data">
				<h1 class="form_h1">Add &bull; Moderator</h1>
		 		<div class="liner1"></div><br><br>
				<div class="form_contentbx">
					<!-- image -->
					<figure class="scan_upload scanned_letter mod_upload_img imgfx">
						<label class="upload_img" title="Upload Image"><input type="file" class="hidebx" id="imgfile" name="imgfile"></label>
						<img id="imgPreview" src="#" alt="">
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
						<!-- moderator name -->
						 <div class="form_textbx info">
						 	<input type="text" class="form_el_txtbx" name="moderator_name" required="required" placeholder="Moderator Name...">
						 </div>
						 <!-- moderator phone number -->
						 <div class="form_textbx info">
						 	<input type="text" class="form_el_txtbx" name="moderator_number" required="required" placeholder="Moderator Phone Number...">
						 </div>
						 <!-- moderator department -->
						 <div class="form_textbx info">
						 	<input type="text" class="form_el_txtbx" name="moderator_dept" required="required" placeholder="Moderator Department...">
						 </div>

						 <!-- moderator email -->
						 <div class="form_textbx info">
						 	<input type="email" class="form_el_txtbx" name="moderator_email" placeholder="Moderator Email...">
						 </div>
					</aside>
				</div>
				<br><div class="front_clrfx"></div>
				<input type="submit" name="btnSend" class="btnSend btnLetter" value="Add Moderator">
			</form></div>
		</div>
	</section>
	<!-- end of add moderators block -->
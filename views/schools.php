<?php

	if (isset($_POST['schname'])) {
		# get the variables...
		$schname = $_POST['schname'];
		$schaddrline1 = $_POST['schaddrline1'];
		// $schaddrline1 = replaceAll($schaddrline1);
		$schaddrline2 = $_POST['schaddrline2'];
		// $schaddrline2 = replaceAll($schaddrline2);
		$schshorthand = $_POST['schshorthand'];
		$schmail = $_POST['schmail'];
		$schrefno = $_POST['schrefno'];
		$schfileno = $_POST['schfileno'];
		$schtel = $_POST['schtel'];
		# school logo
		$schlogo = uniqid().'_'.$_FILES["imgfile"]["name"];
		$image_path = 'schools/'.$schlogo;
		$img_save_loc = './'.$image_path;

		if ((($_FILES["imgfile"]["type"] == "image/gif")|| ($_FILES["imgfile"]["type"] == "image/jpeg") || ($_FILES["imgfile"]["type"] == "image/png")  || ($_FILES["imgfile"]["type"] == "image/pjpeg")) && ($_FILES["imgfile"]["size"] < (500 * 10000))){
	        if(file_exists($_FILES["imgfile"]["name"])){
	            echo "File name exists.";
	            $upload_img = 0;
	            echo "Hmmmm...Please Go Back";
	        }else{
	            if (move_uploaded_file($_FILES["imgfile"]["tmp_name"], $img_save_loc)) {
					$sql = mysqli_query($con, "INSERT INTO schools (schlogo, schname, schpobox, schloc, schshorthand, schmail, schtel, schrefno, schfileno)
									VALUES ('$image_path','$schname', '$schaddrline1', '$schaddrline2', '$schshorthand', '$schmail', '$schtel', '$schrefno', '$schfileno')") 
									or die("Ouch couldn't insert your data <br><br>".mysqli_error($con) );
	            }
	        }
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

			<aside class="window_name">Schools (Affliated Institutions)</aside>

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
		<section id="result" class="grid_container sch_grid_container">
			<!-- <input type="text" id="search_text" name="search_text" class="" placeholder="Search Item..." value="haha" onkeyup="load_data();"> -->
			<?php #include "fetchdata.php"; ?>
			<!-- list of schools -->
			<script>
				$(function(){
					load_data();
					function load_data(query){
						$.ajax({
							url:"views/fetchdata_sch.php",
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
		</section>
	</section>
	<?php #print('hello '.$i); ?> 
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
				<h1 class="form_h1">Add &bull; School</h1>
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
						<!-- school name -->
						 <div class="form_textbx info">
						 	<input type="text" class="form_el_txtbx" name="schname" required="required" placeholder="School Name..." title="School Name">
						 </div>
						 <!-- school address line 2 -->
						 <div class="form_textbx info">
						 	<input type="text" class="form_el_txtbx" name="schaddrline1" required="required" placeholder="P. O. Box XXXX..." title="P. O. Box XXXX">
						 </div>
						 <!-- school address line 3 -->
						 <div class="form_textbx info">
						 	<input type="text" class="form_el_txtbx" name="schaddrline2" required="required" placeholder="Town-Region(Address)..." title="Town-Region(Address)">
						 </div>
						 <!-- school short hand -->
						 <div class="form_textbx info">
						 	<input type="text" class="form_el_txtbx" name="schshorthand" required="required" placeholder="Shorthand eg.BMFI or Ashesi..." title="Shorthand eg.BMFI or Ashesi">
						 </div>
						 <!-- school mail -->
						 <div class="form_textbx info">
						 	<input type="text" class="form_el_txtbx" name="schmail" required="required" placeholder="Email..." title="Email">
						 </div>
						 <!-- school tel -->
						 <div class="form_textbx info">
						 	<input type="text" class="form_el_txtbx" name="schtel" required="required" placeholder="Contact Number..." title="Contact Number">
						 </div>
						 <!-- school ref no -->
						 <div class="form_textbx info">
						 	<input type="text" class="form_el_txtbx" name="schrefno" required="required" placeholder="School Ref. No..." title="School Ref. No.">
						 </div>
						 <!-- school file num -->
						 <div class="form_textbx info">
						 	<input type="text" class="form_el_txtbx" name="schfileno" required="required" placeholder="School File No..." title="School File No.">
						 </div>
					</aside>
				</div>
				<br><div class="front_clrfx"></div>
				<input type="submit" name="btnSend" class="btnSend btnLetter" value="Add School">
			</form></div>
		</div>
	</section>
	<!-- end of add school block -->

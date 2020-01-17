<?php
	if (isset($_POST['cal_desc'])) {
		$cal_desc = mysqli_escape_string($con, $_POST['cal_desc']);
		$start_date = mysqli_escape_string($con, $_POST['start_date']);
		// echo $start_date;
		$before_date = date('m/d/Y', strtotime($start_date . ' -1 day'));
		// echo $before_date;
		$end_date = $_POST['end_date'];
		$calsch = mysqli_escape_string($con, $_POST['calsch']);

		include 'php/connect.php';
		$sql = mysqli_query($con, "INSERT INTO calendar (caldesc, startdate, enddate, notifydate, calsch) 
							 VALUES ('$cal_desc', '$start_date', '$end_date', '$before_date', '$calsch') ") or die("Ouch! Couldn't Insert Your Data");
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

			<aside class="window_name">IAO Planned Calendar</aside>

			<!-- logo -->
			<figure class="window_logo push_r imgfx">
				<img src="img/ucc_logo.gif">
			</figure>
		</header> <!-- end of window headers -->

		<section id="result" class="grid_container mod_grid_container">
			<?php
				include './php/global.php';

				function sayMonth($num){
					if ($num == 1) { return "Jan"; }
					elseif ($num == 2) { return "Feb"; }
					elseif ($num == 3) { return "Mar"; }
					elseif ($num == 4) { return "Apr"; }
					elseif ($num == 5) { return "May"; }
					elseif ($num == 6) { return "Jun"; }
					elseif ($num == 7) { return "Jul"; }
					elseif ($num == 8) { return "Aug"; }
					elseif ($num == 9) { return "Sept"; }
					elseif ($num == 10) { return "Oct"; }
					elseif ($num == 11) { return "Nov"; }
					elseif ($num == 12) { return "Dec"; }
				}
	
				$query = "SELECT * FROM calendar ORDER BY  startdate";
				$result = mysqli_query($con, $query);
				$ci = 0;
				$colors = ["#0088AA", "#00AA00", "#FE4545", "#601cdd", "#003398"];
				while($row = mysqli_fetch_array($result)){
					$ci++;
					if ($ci > (count($colors) - 1)) { $ci = 0; }
					date_default_timezone_set("Africa/Accra");
					print('
							<!-- calendar event -->
					<secion class="grid-4 cal_grid"><div class="cal_eventbx">
						<!-- date -->
						<div class="sided-cal cal_date" style="background:' .$colors[$ci].';">
							<span class="cal_day">'.substr($row['startdate'], 3, 2).'</span>
							<span class="cal_month">'.sayMonth(substr($row['startdate'], 0, 2)).'</span>
							<span class="cal_year">'.substr($row['startdate'], 6).'</span>
						</div>
						<!-- event -->
						<aside class="cal_event_desc">
							 '.$row['caldesc'].'
						</aside>
						<footer class="cal_footer">
							<div id="del-'.$row["id"].'" class="cal_del" title="Delete Item">Delete</div>
							<a href = "views/edit-cal.php?item_id='.$row["id"].'"><div id="edit-'.$row["id"].'" class="cal_edit" title="Edit Item">Edit</div></a>
						</footer>
					</div></secion> <!-- end of calendar event -->
					');
				}
			?>
		
			</div></secion> <!-- end of calendar event -->
		</section><br>

	</section>
	<!-- end of home paper -->

	<!-- fab add moderators -->
	<aside class="fab_create imgfx" title="Add To Calendar">
		<img src="ico/create_new.png">
	</aside>
	<!-- end of fab add moderators -->


	<!-- add moderators block -->
	<section class="create_overlay item_overlay">
		<!-- close -->
		<div class="closebtn" title="Close"></div>

		<div class="form_paper calendar_paper">
			<div class="cal2_form_paper"><form method="post" action="" enctype="multipart/form-data">
				<h1 class="form_h1">Add &bull; To Calendar</h1>
		 		<div class="liner1"></div><br>
				<div class="form_contentbx">
					<!-- calendar title -->
					 <div class="form_textarea info">
					 	<textarea name="cal_desc" placeholder="Calendar Description..."></textarea>
					 </div>
					 <!-- start date -->
					 <div class="form_textbx info">
					 	<input id="datepickerA" type="text" class="form_el_txtbx" name="start_date" required="required" placeholder="Start Date...">
					 </div>
					 <!-- end date -->
					 <div class="form_textbx info">
					 	<input id="datepickerB" type="text" class="form_el_txtbx" name="end_date" placeholder="End Date(optional)...">
					 </div>

					<!-- school for moderation -->
					<div class="form_textbx info">
					 	<!-- <input type="text" class="form_el_txtbx" name="letterschool" required="required" placeholder="School for Moderation eg. CSIR..." title="School for Moderation eg. CSIR"> -->
					 	<select class="form_combo form_el_txtbx" name="calsch" required="required" title="Please Select The School For Moderation">
					 		<option value="">-- Select School --</option>
					 		<option value="Institutional Affiliation Office">Institutional Affiliation Office</option>
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
					<input type="submit" name="btnSend" class="btnSend btnLetter" value="Add To Calendar" style="float: none;">
				</center>
			</form></div><br><br>
		</div>
	</section>

	<script>
		
		$( function() {
			$( "#datepickerA" ).datepicker({
				dateFormat: "mm/dd/yy"
			});

			$( "#datepickerB" ).datepicker({
				dateFormat: "mm/dd/yy"
			});

			$('.cal_del').click(function () {
				$objectID = $(this).closest('.cal_del').attr("id").substring(4);
				// alert($objectID);
				if (confirm("Are You Sure You Want To Delete This Item?")) {
					// alert($objectID);
					window.location.href = "php/delete.php?page=calendar&item_id="+$objectID;
				}
			});
		});
	 
	 </script>
	<!-- end of add moderators block -->
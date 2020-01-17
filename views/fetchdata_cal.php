<?php
	include '../php/global.php';
	$output = '';
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
	if(isset($_POST["query"])){
		$search = mysqli_real_escape_string($con, $_POST["query"]);
		$query = "
		SELECT * FROM calendar 
		WHERE caldesc LIKE '%".$search."%'
		OR startdate LIKE '%".$search."%' 
		OR enddate LIKE '%".$search."%' 
		OR calsch LIKE '%".$search."%' 
		";
	}else{
		$query = "SELECT * FROM calendar ORDER BY  startdate";
	}
	$result = mysqli_query($con, $query);
	$ci = 0;
	$colors = ["#0088AA", "#00AA00", "#FE4545", "#601cdd", "#003398"];
	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_array($result)){
			$ci++;
			if ($ci > (count($colors) - 1)) { $ci = 0; }
			date_default_timezone_set("Africa/Accra");
			$output .= '
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
					<div id="edit-'.$row["id"].'" class="cal_edit" title="Edit Item">Edit</div>
				</footer>
			</div></secion> <!-- end of calendar event -->
			';
		}
		echo $output;
	}else{
		echo 'Data Not Found';
	}
	mysqli_close($con);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<script type="text/javascript" src="./js/jquery.min.js"></script>
	<script type="text/javascript" src="./js/jquery.ui.js"></script>
	<!-- <script type="text/javascript" src="./js/front.iao.js"></script> -->
</head>
</html>
<script>
	$(function(){
		// ****** CALENDAR ******
		$('.cal_del').click(function () {
			$objectID = $(this).closest('.cal_del').attr("id").substring(4);
			// alert($objectID);
			if (confirm("Are You Sure You Want To Delete This Item?")) {
				// alert("Boya!");
				window.location.href = "php/delete.php?page=calendar&item_id="+$objectID;
			}
		});

		$('.cal_edit').click(function () {
			$objectID = $(this).closest('.cal_edit').attr("id").substring(5);
			// alert($objectID);
			window.location.href = "views/edit-cal.php?item_id="+$objectID;
		});
	});
</script>
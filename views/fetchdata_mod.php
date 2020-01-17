<?php
	include '../php/global.php';
	$output = '';
	if(isset($_POST["query"])){
		$search = mysqli_real_escape_string($con, $_POST["query"]);
		$query = "
		SELECT * FROM moderators 
		WHERE mName LIKE '%".$search."%'
		OR mNumber LIKE '%".$search."%' 
		OR mDepartment LIKE '%".$search."%' 
		OR mEmail LIKE '%".$search."%' 
		";
	}else{
		$query = "SELECT * FROM moderators ORDER BY mDepartment";
	}
	$result = mysqli_query($con, $query);
	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_array($result)){
			$output .= '
				<!-- grid -->
				<div class="grid-4 mod_grid">
					<div class="mod_grid_fill">
						<!-- del -->
						<div id="del-'.$row['id'].'" class="del-mod" title="Delete Moderator"></div>
						<!-- edit -->
						<div id="edit-'.$row['id'].'" class="edit-mod" title="Edit Moderator Details"></div>
						<!-- pic --><a href="tel:'.$row['mNumber'].'">
						<figure class="mod_pic">
							<img src="" alt="">
						</figure></a>
						<!-- details -->
						<aside class="mod_details_box">
							<div class="mod_name">'.$row['mName'].'</div>
							<div class="mod_contact"><a href="tel:
							'.$row['mNumber'].'">'.$row['mNumber'].'</a></div>
							<div class="mod_email">'.$row['mDepartment'].'.</div>
							<a href="mailto:'.$row['mEmail'].'"><div class="mod_email mod_mail">'.$row['mEmail'].'.</div></a>
						</aside>
					</div>
				</div>
			';
		}
		echo $output;
	}else{
		echo 'Data Not Found';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<script type="text/javascript" src="./js/jquery.min.js"></script>
	<script type="text/javascript" src="./js/jquery.ui.js"></script>
	<script type="text/javascript" src="./js/front.iao.js"></script>
	<!-- <script type="text/javascript" src="./js/search.js"></script> -->
</head>
</html>
<?php
	include '../php/global.php';
	$output = '';
	if(isset($_POST["query"])){
		$search = mysqli_real_escape_string($con, $_POST["query"]);
		$query = "
		SELECT * FROM filelist 
		WHERE filename LIKE '%".$search."%'
		OR fileshorthand LIKE '%".$search."%' 
		OR filerefno LIKE '%".$search."%' 
		OR fileno LIKE '%".$search."%' 
		";
	}else{
		$query = "SELECT * FROM filelist ORDER BY  filename";
	}
	$result = mysqli_query($con, $query);
	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_array($result)){
			$output .= '
				<!-- grid -->
				<div class="grid-4 sch_grid">
					<section class="sch_grid_fill">
						<!-- logo -->
						<figure class="sch_logo imgfx">
							<img src="img/filelist.png" alt="'.$row['filename'].'">
						</figure>
						<div id="edit-'.$row['id'].'" class="edit-file" title="Edit File" onclick="$objectID = $(this).closest(".edit-file").attr("id").substring(5); window.location.href = "views/edit-filelist.php?item_id="+$objectID;"></div>
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
	<!-- <script type="text/javascript" src="./js/front.iao.js"></script> -->
</head>
</html>
<script>
	$(function(){
		$('.del-file').click(function () {
			$objectID = $(this).closest('.del-file').attr("id").substring(4);
			// alert($objectID);
			if (confirm("Are You Sure You Want To Delete This Item?")) {
				// alert("Boya!");
				window.location.href = "php/delete.php?page=filelist&item_id="+$objectID;
			}
		});

		$('.edit-file').click(function () {
			$objectID = $(this).closest('.edit-file').attr("id").substring(5);
			// alert($objectID);
			window.location.href = "views/edit-filelist.php?item_id="+$objectID;
		});
	});
</script>
<?php
	include 'global.php';
	$output = '';
	$sql = "SELECT * FROM schools WHERE schname LIKE '%".$_POST['search']."%'";
	$result = mysqli_query($con, $sql);
	if (mysqli_num_rows($result) > 0) {
		# code...
		// $output .= ''
		while ($row = mysqli_fetch_array($result)) {
			# code...
			$output .= $row['schname'].'<br>';
		}
		echo $output;
	}else{
		echo "Data Not Found";
	}


?>
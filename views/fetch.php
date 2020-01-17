<?php
	include '../php/global.php';
	$output = '';
	$sql = "SELECT * FROM schools WHERE schname LIKE '%".$_POST['txtsearchbox']."%'";
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

<a href="../php/global.php">thank you lord</a>
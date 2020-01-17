<?php
	include 'global.php';
	date_default_timezone_set('Africa/Accra');
	$timenow = date('d/m/Y', strtotime('now'));
	$sql = "SELECT * FROM letters WHERE letter_deadline=$timenow ";
	$results = mysqli_query($con, $sql);
	$row_count = mysqli_num_rows($results);
	// print($row_count);
	while ($row = mysqli_fetch_array($results)) {
		$deadline = DateTime::createFromFormat('d/m/Y', $row['letter_deadline'])->format('jS F, Y');
			$letterSchool = '</b> on <b>'.$deadline.'</b>';
			$scannedLetter = $row['schlogo'];
			$letterImage = $row['scanned_letter'];
			$letterTitle = $row['letter_title'];

			print($row['scanned_letter'].'<br>'.$deadline);

			$sql = "SELECT id FROM notification WHERE noti_text = $letterSchool ";
			$count = mysqli_query($con, $sql);
			if(mysqli_num_rows($count) == 0) {
			     // row not found, do stuff...
				$sql = mysqli_query($con, "INSERT INTO notification (subject, noti_text, schlogo,  letter_image, status) 
													VALUES ('$letterTitle', '$letterSchool', '$scannedLetter', '$letterImage', '0') ");
			}
		}
?>
<?php

	$sql = mysqli_query($con, "INSERT INTO notification (subject, noti_text, schlogo, status) 
											VALUES ('Moderation', '$letterSchool', '$scannedLetter', '0') ");

?>
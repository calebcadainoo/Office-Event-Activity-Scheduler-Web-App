<?php 
	$date = date_default_timezone_get('Accra/Ghana');
	$before_date = date('Y-m-d', strtotime($date . ' -1 day'));
	print($before_date);
?>
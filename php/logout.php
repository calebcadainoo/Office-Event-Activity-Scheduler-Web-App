<?php
	include 'global.php';
	unset($_SESSION);
	session_destroy();
	session_write_close();
	print('<script>window.location.href="./";</script>');
	die;
?>
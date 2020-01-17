<?php
/* Log out process, unsets and destroys session variables */
include 'php/global.php';
session_unset();
session_destroy(); 
print('<script>window.location.href="./"</script>');
?>

<title>IAO Notification Platform</title>
<?php
	include 'connect.php';
	if (isset($_GET['page']) && isset($_GET['item_id'])) {
		$page = $_GET['page'];
		$id = $_GET['item_id'];

		switch ($page) {
			case 'schools':
				// read and delete service image
				$sql = mysqli_query($con, "SELECT * FROM schools WHERE id='$id' ") or die("Oops Try Reloading the Page");
				while ($row = mysqli_fetch_assoc($sql)) {
					$img_path = '../'.$row['schlogo'];
					if (!unlink($img_path)) {
						echo "not deleted<br>";
					}else{
						echo 'done deleting<br>';
					}
				}
				// delete school record
				$sql = "DELETE FROM schools WHERE id=$id";
				if (mysqli_query($con, $sql) === TRUE){
				    echo "School deleted successfully";
				    echo '<script>window.location.href="../?view=schools"</script>';
				}else{    
					echo "Error deleting record: " . mysqli_error($con);
				}
				mysqli_close($con);
				break;
			case 'moderators':
				// delete moderator record
				$sql = "DELETE FROM moderators WHERE id=$id";
				if (mysqli_query($con, $sql) === TRUE){
				    echo "School deleted successfully";
				    echo '<script>window.location.href="../?view=moderators"</script>';
				}else{    
					echo "Error deleting record: " . mysqli_error($con);
				}
				mysqli_close($con);
				break;
			case 'filelist':
				// delete filelist record
				$sql = "DELETE FROM filelist WHERE id=$id";
				if (mysqli_query($con, $sql) === TRUE){
				    echo "School deleted successfully";
				    echo '<script>window.location.href="../?view=filelist"</script>';
				}else{    
					echo "Error deleting record: " . mysqli_error($con);
				}
				mysqli_close($con);
				break;
			case 'calendar':
				// delete filelist record
				$sql = "DELETE FROM calendar WHERE id=$id";
				if (mysqli_query($con, $sql) === TRUE){
				    echo "Calendar Item deleted successfully";
				    echo '<script>window.location.href="../?view=calendar"</script>';
				}else{    
					echo "Error deleting record: " . mysqli_error($con);
				}
				mysqli_close($con);
				break;
			case 'letters':
				// read and delete service image
				$sql = mysqli_query($con, "SELECT * FROM letters WHERE id='$id' ") or die("Oops Try Reloading the Page");
				while ($row = mysqli_fetch_assoc($sql)) {
					$img_path = '../'.$row['scanned_letter'];
					if (!unlink($img_path)) {
						echo "not deleted<br>";
					}else{
						echo 'done deleting<br>';
					}
				}
				// delete filelist record
				$sql = "DELETE FROM letters WHERE id=$id";
				if (mysqli_query($con, $sql) === TRUE){
				    echo "School deleted successfully";
				    echo '<script>window.location.href="../?view=letters"</script>';
				}else{    
					echo "Error deleting record: " . mysqli_error($con);
				}
				mysqli_close($con);
				break;
			default:
				# code...
				break;
		}
	}
?>
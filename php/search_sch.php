<?php
include 'global.php';
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM schools 
	WHERE schname LIKE '%".$search."%'
	OR schpobox LIKE '%".$search."%' 
	OR schloc LIKE '%".$search."%' 
	OR schrefno LIKE '%".$search."%' 
	OR schshorthand LIKE '%".$search."%'
	OR schfileno LIKE '%".$search."%'
	";
}
else
{
	$query = "
	SELECT * FROM schools ORDER BY schname";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<!-- sch grid -->
			<div class="grid-4 sch_grid">
				<section class="sch_grid_fill">
					<!-- logo -->
					<figure class="sch_logo imgfx">
						<img src="'.$row['schlogo'].'" alt="'.$row['schname'].'">
					</figure>
					<div id="edit-'.$row['id'].'" class="edit-sch" title="Edit School"></div>
					<div id="del-'.$row['id'].'" class="del-sch" title="Delete School"></div>
					<!-- details -->
					<aside class="sch_details">
						<div class="sch_name"><b>'.$row['schname'].'</b></div>
						<p>'.$row['schpobox'].'</p>
						<p>'.$row['schloc'].'</p><br>
						<p>Shorthand: '.$row['schshorthand'].'</p>
						<p>Email: <a href="mailto:'.$row['schmail'].'">'.$row['schmail'].'</a></p>
						<p>Tel. No: '.$row['schtel'].'</p>
						<p>Ref. No: '.$row['schrefno'].'</p>
						<p>File No: '.$row['schfileno'].'</p>
					</aside>
				</section>
			</div>
		';
	}
	echo $output;
}
else
{
	echo 'Data Not Found';
}
?>
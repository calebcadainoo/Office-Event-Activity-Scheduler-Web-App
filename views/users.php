

	<!-- home paper -->
	<section class="centroid home_paper">
		<!-- window headers -->
		<header class="window_headers">
			<!-- logo -->
			<figure class="window_logo push_l imgfx">
				<img src="img/ifcia logo.png">
			</figure>

			<aside class="window_name">Users</aside>

			<!-- logo -->
			<figure class="window_logo push_r imgfx">
				<img src="img/ucc_logo.gif">
			</figure>
		</header> <!-- end of window headers -->

		<aside class="grid_container">
			<?php
				include 'php/connect.php';
				$sql = mysqli_query($con, "SELECT * FROM accounts ") or die("Oops Try Reloading the Page");
				while ($row = mysqli_fetch_assoc($sql)) {
					print('
						<!-- grid -->
						<div class="grid-4 user_grid">
							<div class="user_grid_fill">
								<!-- pic -->
								<figure class="user_pic imgfx">
									<img src="'.$row['profile_pic'].'" alt="">
								</figure>
								<!-- details -->
								<footer class="user_detailsbx">
									<div class="user_username" title="Username">@'.$row['username'].'</div>
									<!-- info -->
									<div class="user_detail_list user_cap person">
										<span class="list_title">Full Name</span>
										'.$row['firstname'].' '.$row['lastname'].'
									</div>
									<!-- info -->
									<div class="user_detail_list mail">
										<span class="list_title">Email</span>
										<a href="mailto:'.$row['email'].'" title="Send mail to '.$row['username'].'?">
											'.$row['email'].'
										</a>
									</div>
									<!-- info -->
									<div class="user_detail_list phone">
										<span class="list_title">Phone</span>
										<a href="tel:'.$row['phone'].'" title="Call '.$row['username'].'?">'.$row['phone'].'</a>
									</div>
								</footer>
							</div>
						</div>
					');
				}
			?>
		</aside>

	</section>
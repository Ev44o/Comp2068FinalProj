<!--
File Name: nav.php
Author Name: Jordan Cooper
Website Name: nav.php
Description: This is an included asset, this will house the navigation bar for our site
		     allowing for change to be done quickly as changes will be done here instead of
			 on each individual page.
 -->

		<!-- Navigation Bar  NOTE: id="current-page" changes from page to page, highlights the current page-->
    	<!-- as the view port shrinks so does the navagation bar, to compensate for this all items are placed in 
    	a drop down menu (except for the home page) when the viewport becomes too small to hold all the text -->
	<div class="row">
			<nav class="top-bar" data-topbar>
				<ul class="title-area">
					<li class="name">
						<h1 id="<?php echo $home; ?>"><a href="home.php">Home</a></h1>
					</li>
					<li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
				</ul>
				<section class="top-bar-section">
					<ul class="left">
					    <li><a id="<?php echo $login; ?>" href="login1.php">Log In</a></li>
						<li><a id="<?php echo $create_user; ?>"href="register1.php">Join Survey Savy</a></li>
						<li><a id="<?php echo $create_survey; ?>"href="create_survey.php">Create a Survey</a></li>
						<li><a id="<?php echo $edit_user; ?>"href="edit_user.php">Edit Account</a></li>
						<li><a id="<?php echo $statistics; ?>"href="statistics.php">Survey Statistics</a></li>
						<li><a id="<?php echo $logout; ?>"href="logout.php">Logout</a></li>
					</ul>
				</section>
			</nav>
		</div>
		



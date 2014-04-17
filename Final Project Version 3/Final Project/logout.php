<!--
File Name: logout.php
Author Names: Jordan Cooper, Evan Pugh
Website Name: Survey Site
Description: This page runs when the user clicks
logout. It removes the session and redirects to 
the home page.
-->
<?php
 $title = "Welcome";
 $home ="";
 $logout ="current-page";
 $create_survey ="";
 $create_user ="";
 include 'includes/header.php'; 
//open the session
session_start();
	// make sure the user is logged before trying to logout
	if(isset($_SESSION['session_id']))
	{
		//destroy the session
		session_destroy();
		//redirect
		echo '
		<div class="row">
			<div class="large 12-columns center-title ">
				You are now logged out. <br>
				You will be redirected to the home page momentarily.
			</div>
		</div>';
		header('Refresh: 5; url=home.php');
		exit();
	}
	else
	{// notify the user they need to login to
		echo '
		<div class="row">
			<div class="large 12-columns center-title ">
				<p>You are not logged in.</p>
			</div>
		</div>
		';
		header('Refresh: 3;url=home.php');
	}

?>
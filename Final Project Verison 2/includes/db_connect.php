<!--
File Name: home.html
Author: Jordan Cooper
Web	Site: home.html, the home page
Description: This is the database connection.
--> 
<?php
	$connect = mysqli_connect("localhost","admin", "password");
	if (!$connect) {
		die(mysqli_error());
	}
	mysqli_select_db($connect,"survey_db");
?>
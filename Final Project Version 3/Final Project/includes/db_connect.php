<!--
File Name: home.html
Author: Jordan Cooper
Web	Site: home.html, the home page
Description: This is the database connection.
--> 
<?php
	$connect = mysqli_connect("localhost","db200198596", "910208");
	if (!$connect) {
		die(mysqli_error($connect));
	}
	mysqli_select_db($connect,"db200198596");
?>
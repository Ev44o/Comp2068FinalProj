<!--
File Name: home.html
Author: Jordan Cooper
Web	Site: home.html, the home page
Description: This is the database connection.
-->
<?php
	$connect = mysqli_connect("webdesign4","db200198596", "910208");
	if (!$connect) {
		die(mysqli_error());
	}
	mysqli_select_db($connect,"db200198596");
?>
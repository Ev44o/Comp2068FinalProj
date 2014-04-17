<!--
File Name: create_survey_table.php
Author: Jordan Cooper, Evan Pugh
Web	Site: create_survey_table.php
Description: this takes the user's data and creates the table
			 and inputs the values given into the appropreate tables. --> 
<?php
	session_start();
	
	$title = "Welcome";
	$home ="";
	$login ="";
	$create_survey ="current-page";
	$create_user ="";
	include 'includes/header.php';
	
	// define variables from create_survey.php
	$name = $_POST['name'];
	$survey_type = $_POST['survey_type'];
	$end_date = $_POST['end_date'];
	$question1 = $_POST['question1'];
	$question2 = $_POST['question2'];
	$question3 = $_POST['question3'];
	$question4 = $_POST['question4'];
	$question5 = $_POST['question5'];
	
	// connect to the database
	include 'includes/db_connect.php';
	
	$table_name = mysqli_real_escape_string($connect,$name);
	$question1  = mysqli_real_escape_string($connect,$question1);
	$question2  = mysqli_real_escape_string($connect,$question2);
	$question3  = mysqli_real_escape_string($connect,$question3);
	$question4  = mysqli_real_escape_string($connect,$question4);
	$question5  = mysqli_real_escape_string($connect,$question5);
  
	$sql_table="CREATE TABLE $table_name (
	  `survey_id` int(4) NOT NULL AUTO_INCREMENT,
	  `questions` varchar(255),
	  PRIMARY KEY (`survey_id`)
	  )";
	$create_table = mysqli_query($connect,$sql_table);
	if (!$create_table) 
	{
	die('<div class="row large-12 columns center-title">Invalid Table Name</div>' . mysql_error());
	}
	else
	{
	echo '<div class="row large-12 columns center-title">Success!</div>';
	$sql_insert1="INSERT INTO $table_name (questions) VALUES
		('$question1'),
		('$question2'),
		('$question3'),
		('$question4'),
		('$question5')";
	
	// assign the session id to a variable
	$id = $_SESSION['session_id'];
	// get session owner name
	$sql_get_owner = "SELECT username FROM users WHERE id ='$id'";
	// get the results of the query by connecting to the db then running the string
	$result_owner = mysqli_query($connect, $sql_get_owner) or die('Error querying database.');
	// put the results in an array
	$row_owner = mysqli_fetch_array($result_owner);
	// assign owner name to a variable
	$username = $row_owner['username'];
	
	$sql_insert2="INSERT INTO surveys (survey_owner,survey_name,survey_type,end_date) VALUES('$username','$name','$survey_type','$end_date')";
	 // Execute query;
	mysqli_query($connect,$sql_insert1);
	mysqli_query($connect,$sql_insert2);
	
	
	}
	header('Refresh: 10;url=home.php');
	
?>
<?php include 'includes/footer.php';?>
		
		
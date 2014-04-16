<!--
File Name: create_survey_table.php
Author: Jordan Cooper
Web	Site: create_survey_table.php
Description: this takes the user's data and creates the table
			 and inputs the values given into the appropreate tables. --> 
			 <?php
			 $title = "Welcome";
			 $home ="";
			 $login ="";
			 $create_survey ="current-page";
			 $create_user ="";
			 include 'includes/header.php';?>
<?php 
			
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
			
			$name = mysqli_real_escape_string($connect,$name);
		  
			$sql_table="CREATE TABLE $name (
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
			  $sql_insert1="INSERT INTO $name (questions) VALUES
			  ('$question1'),
			  ('$question2'),
			  ('$question3'),
			  ('$question4'),
			  ('$question5')";

			  $sql_insert2="INSERT INTO surveys (survey_owner,survey_name,survey_type,end_date) VALUES('$name','$name','$survey_type','$end_date')";
			 // Execute query;
			mysqli_query($connect,$sql_insert1);
			mysqli_query($connect,$sql_insert2);
			
			
			}
			header('Refresh: 10;url=home.php');
			
		?>
		<?php include 'includes/footer.php';?>
		
		
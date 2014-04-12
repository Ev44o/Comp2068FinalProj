<!--
File Name: create_survey_table.php
Author: Jordan Cooper
Web	Site: create_survey_table.php
Description: this takes the user's data and creates the table
			 and inputs the values given into the appropreate tables. --> 
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
			
			$name = mysqli_real_escape_string($name);

			$sql_table="CREATE TABLE IF NOT EXISTS $name (
			  `survey_id` int(4) NOT NULL AUTO_INCREMENT,
			  `question1` varchar(255),
			  `question2` varchar(255),
			  `question3` varchar(255),
			  `question4` varchar(255),
			  `question5` varchar(255),
			  PRIMARY KEY (`survey_id`)
			  )";
			  
			  $sql_insert1="INSERT INTO $name (question1,question2,question3,question4,question5) VALUES('$question1','$question2','$question3','$question4','$question5')";
			  $sql_insert2="INSERT INTO surveys (name,survey_type) VALUES('$name','$survey_type')";
			 // Execute query
 			mysqli_query($sql_table);
			mysqli_query($sql_insert1);
			mysqli_query($sql_insert2);
			
		?>
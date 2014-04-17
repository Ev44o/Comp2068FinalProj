<!--
File Name: take_survey_table.php
Author: Jordan Cooper
Web	Site: take_survey_table.php
Description: this takes the user's data and creates the table
			 and inputs the values given into the appropreate tables. --> 
			 			 
			 <!-- Header + required info for nav -->
			 <?php
			 $title = "Thanks for taking a survey!";
			 $home ="";
			 $login ="";
			 $create_survey ="current-page";
			 $create_user ="";
			 include 'includes/header.php';?>
<?php 
		
			// define variables from take_survey.php
		    $name = $_GET['id'];
			$question1 = $_POST['question1'];
			$question2 = $_POST['question2'];
			$question3 = $_POST['question3'];
			$question4 = $_POST['question4'];
			$question5 = $_POST['question5'];
			
			$answer1 = $_POST['answer1'];
			$answer2 = $_POST['answer2'];
			$answer3 = $_POST['answer3'];
			$answer4 = $_POST['answer4'];
			$answer5 = $_POST['answer5'];
			
			// connect to the database
			include 'includes/db_connect.php';
			
			//remove special characters from inputs
			$name = mysqli_real_escape_string($connect,$name);
			$question1  = mysqli_real_escape_string($connect,$question1);
			$question2  = mysqli_real_escape_string($connect,$question2);
			$question3  = mysqli_real_escape_string($connect,$question3);
			$question4  = mysqli_real_escape_string($connect,$question4);
			$question5  = mysqli_real_escape_string($connect,$question5);
			
			$answer1  = mysqli_real_escape_string($connect,$answer1);
			$answer2  = mysqli_real_escape_string($connect,$answer2);
			$answer3  = mysqli_real_escape_string($connect,$answer3);
			$answer4  = mysqli_real_escape_string($connect,$answer4);
			$answer5  = mysqli_real_escape_string($connect,$answer5);
		  
		  	// create a table to house the user's answers
			$sql_table="CREATE TABLE $name (
			  `survey_id` int(4) NOT NULL AUTO_INCREMENT,
			  `questions` varchar(255),
			  `answers` varchar(255),
			  PRIMARY KEY (`survey_id`)
			  )";
			
			// execute the command  
			$create_table = mysqli_query($connect,$sql_table);

			//input the user's answers into the survey
			$sql_insert1="INSERT INTO $name (questions,answers) VALUES
			  ('$question1','$answer1'),
			  ('$question2','$answer2'),
			  ('$question3','$answer3'),
			  ('$question4','$answer4'),
			  ('$question5','$answer5')";

			 // Execute query
			mysqli_query($connect,$sql_table);
 			mysqli_query($connect,$sql_insert1);
			
			// thank the user for taking a survey
			echo '
			<div class="row">
				<div class="large-12 columns center-title">
					<p>Thank you for completing one of our surveys! <br>
					You will be redirected to the home page shortly</p>
				</div>
			</div>';
			
			//redirect the user to the home page after 5 seconds (enough time to read the thank you)
			header('Refresh: 5;url=home.php');
			
		?>
		<?php include 'includes/footer.php';?>
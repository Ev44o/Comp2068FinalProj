<!doctype html>
<!--
File Name: register.php
Author Names: Jordan Cooper, Evan Pugh
Website Name: Survey Site
Description: This page checks the entered information from the register.html
page and makes sure it is valid. It then inserts the information into the database.
The user is then redirected to the login.
-->
<html>
	<head>
		<title>Survey Site - Register</title>
		<meta charset="utf-8">
		<?php
		 $title = "Welcome";
		 $home ="";
		 $login ="";
		 $statistics ="current-page";
		 $create_user ="";
		 include 'includes/header.php'; 
		?>
		<div class="row">
			<div class="large-12 columns center-title">
				<h2>Statistics</h2>
			</div>
		</div>
	</head>
	<body>
		<?php
			session_start();
			// make sure the user is logged in to see the content
			if(!isset($_SESSION['session_id']))
			{	// tell them they cannot view this page
				echo '
				<div class="row">
					<div class="large 12-columns center-title ">
						<p>You are not logged in. Please<br>
						login to view this page.</p>
					</div>
				</div>
				';
				header('Refresh: 4;url=login1.php');
			}
			else
			{
				?>
				<div class="row">
				  <div id="table" class="large-12 columns" align="center">
					  <table border="1px">
						<tbody>
							<tr>
								<td>End Date(Y/M/D)</td>
								<td>Title</td>
								<td>Owner</td>
								<td>Type</td>
								<td># of Agrees</td>
								<td># of Disagrees</td>
								<td># of Short Answers</td>
							</tr>
						  	<?php
							include 'includes/db_connect.php';
							
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
							
							$sql="SELECT * FROM surveys WHERE survey_owner ='". $username ."'";
							$result = mysqli_query($connect,$sql);
							
							while($row = mysqli_fetch_array($result)) 
							{
								
							?>
							  <tr>
								<td><?php echo $row['end_date'];?></td>
								<td><?php echo $row['survey_name'];?></td>
								<td><?php echo $row['survey_owner'];?></td>
								<td><?php echo $row['survey_type'];?></td>
								<td><?php // gets the number of agrees
									$sql_questions_agree="SELECT COUNT(answers) FROM '".$row['survey_name']."_results WHERE answers = 'agree'";
									$result_agree = mysqli_query($connect,$sql_questions_agree);
									// # of disagrees
									$sql_questions_disagree="SELECT COUNT(answers) FROM '".$row['survey_name']."_results WHERE answers = 'disagree'";
									$result_disagree = mysqli_query($connect,$sql_questions_disagree);
									// short answer
									$sql_questions_disagree="SELECT COUNT(answers) FROM '".$row['survey_name']."_results WHERE answers = 'disagree'";
									$count_short_answer = mysqli_query($connect,$sql_questions_disagree);
									
									echo $count_agree;// output count
									?></td>
								<td><?php echo $count_disagree;?></td>// output count
								<td><?php echo $count_short_answer;?></td>// output count
							  </tr>
							<?php
							}
							?>
						</tbody>
					  </table>
					</form>
				  </div>
				 </div>
				<?php
				
				$sql = "SELECT username FROM users WHERE id ='". $_SESSION['session_id'] ."'";
				// get the results of the query by connecting to the db then running the string
				$result = mysqli_query($connect, $sql) or die('Error querying database.');
				// put the results in an array
				$row = mysqli_fetch_array($result);
				// assign the array information to variables
				$username = $row['username'];
				
				$sql2 = "SELECT * FROM users WHERE id ='". $_SESSION['session_id'] ."'";
				// close the connection
				mysqli_close($connect);
			}?>
	</body>
</html>
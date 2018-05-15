<!doctype html>
<html>
	<head>
		<title>Registry</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</head>
	<body>
		<div class="container">
			<ul class="nav nav-pills">
				<li class="nav-item">
					<a class="nav-link" href="index.php">Users List</a>
				</li>
				<li class="nav-item">
					<a class="nav-link active" href="register.php">Register</a>
				</li>
			</ul>
		
			<h1 class="display-1">Registry - Register yourself</h1><br/>
			<!--
				http://localhost:8084/ex3-registry/register.php
				http://getbootstrap.com/docs/4.1/components/forms/
			-->
			
			<?php
				//if submit_btn was pressed
				if (isset($_POST['submit_btn'])) {
					$first_name = $_POST['first_name'];
					$last_name = $_POST['last_name'];
					
					if (empty($first_name) || empty($last_name)) {
						echo "<div class=\"alert alert-warning\"> You need to enter both your first and last name</div>";
					}
					else {
						$link = mysqli_connect("localhost", "root", "", "registry", 3307);
						if (mysqli_connect_errno()) {
							echo "<div class=\"alert alert-error\">Error connecting to DB...".mysqli_connect_error()."</div>";
							exit;
						}
						
						//create insert statement
						$statement = "INSERT INTO users (first_name, last_name) VALUES('$first_name', '$last_name')";
						//send statement to mysql
						$result = mysqli_query($link, $statement);
						
						//check if 1 row was added...
						if (mysqli_affected_rows($link) == 1) {
							echo "<div class=\"alert alert-success\">Thank you! You were registered!</div>";
						}
						else {
							echo "<div class=\"alert alert-warning\">Oops! Something went wrong!</div>";
						}
					}
				}
			?>
			
			<form action="register.php" method="post">
				<div class="form-group">
					<label for="first_name">First Name</label>
					<input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter your first name">
				</div>
				<div class="form-group">
					<label for="last_name">Last Name</label>
					<input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter your last name">
				</div>
				<button type="submit" name="submit_btn" class="btn btn-primary">Submit</button>
			</form>
		
		</div>
	</body>
</html>
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
					<a class="nav-link active" href="index.php">Users List</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="register.php">Register</a>
				</li>
			</ul>
			
			<h1 class="display-1">Registry</h1><br/>
			<!--
				http://localhost:8084/ex3-registry/index.php
			-->
			
			<?php
				//index.php?deleted=_ or not
				if (isset($_GET['deleted'])) {
					$deleted = $_GET['deleted'];
					
					if ($deleted == 1) {
						echo "<div class=\"alert alert-success\">User deleted!</div><br/>";
					}
					else {
						echo "<div class=\"alert alert-danger\">User not deleted!</div><br/>";
					}
					
				}
				
				//connect to MySQL DB
				//host, username, password, db_name, !port!
				$link = mysqli_connect("localhost", "root", "", "registery", 3307);
				if (mysqli_connect_errno()) {
					echo "<div class=\"alert alert-error\">Error connecting to DB...".mysqli_connect_error()."</div>";
					
					exit;
				}
				else {
					echo "<div class=\"alert alert-success\">Connection OK!</div><br/>";			
				}
				
				//create the SQL statement
				$query = "SELECT * FROM users";
				
				//pass the $query to MySQL through the connection ($link)
				$result = mysqli_query($link, $query);
				
				echo "<h2>List of Users in the table</h2><br/>";
			?>
			<table class="table">
				<tr>
					<th>ID</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Delete</th>
				</tr>
				<?php
					//process $result
					while ($row = mysqli_fetch_assoc($result)) {
						echo "<tr>";
							echo "<td>".$row['id']."</td>";
							echo "<td>".$row['first_name']."</td>";
							echo "<td>".$row['last_name']."</td>";
							echo "<td><a class=\"btn btn-danger\" href=\"delete.php?id=".$row['id']."\">Delete</a></td>";
						echo "</tr>";
					}
					
				?>
			</table>
			
			
		</div>
	</body>
</html>
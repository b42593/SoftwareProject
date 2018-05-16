<!doctype html>
<html>
	<head>
		<title>Welcome to The Restaurant</title>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
	</head>
	<body>
        <nav class="navbar navbar-inverse navbar-dark bg-dark p-3 mb-4">
            <div class="container">
                <p class="navbar-brand"><i class="fab fa-grunt text-danger" aria-hidden="true"></i> The Restaurant</p>
            </div>
        </nav>

		<div class="jumbotron container">
            <center><h1 class="display-3">Register yourself</h1></center><br/>
			<!--
				http://localhost:8084/WebApp/register.php
				http://getbootstrap.com/docs/4.1/components/forms/
			-->
			
			<?php
				//if submit_btn was pressed
				if (isset($_POST['submit_btn'])) {
					$name = $_POST['name'];
					$surname = $_POST['surname'];
					$mobileNo = $_POST['mobileNo'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $email = $_POST['email'];
                    
					if (empty($name) || empty($surname) || empty($mobileNo) || empty($username) || empty($password) || empty($email)) {
						echo "<div class=\"alert alert-warning\"> You need to enter both your first and last name</div>";
					}
					else {
						$link = mysqli_connect("localhost", "root", "", "booking", 3307);
						if (mysqli_connect_errno()) {
							echo "<div class=\"alert alert-error\">Error connecting to DB...".mysqli_connect_error()."</div>";
							exit;
						}
						
						//create insert statement
						$statement = "INSERT INTO customer (name, surname, mobileNo, username, password, email) VALUES('$name', '$surname', '$mobileNo', '$username', '$password', '$email')";
				        //send statement to mysql
						$result = mysqli_query($link, $statement);
						
						//check if 1 row was added...
						if (mysqli_affected_rows($link) == 1) {
							echo "<div class=\"alert alert-success\">Thank you! You were registered!</div>";
              ?>
                            <a class="btn btn-info" href="index.php">Go Back to Login</a>
                            <br />
                            <br />
             <?php            
                        
                        }                   
						else {
							echo "<div class=\"alert alert-warning\">Oops! Something went wrong!</div>";
						}
					}
				}
			?>
			
			<form action="register.php" method="post">
				<div class="form-group">
					<label for="name">First Name</label>
					<input type="text" class="form-control" name="name" id="name" placeholder="Enter your first name">
				</div>
				<div class="form-group">
					<label for="surname">Surname</label>
					<input type="text" class="form-control" name="surname" id="surname" placeholder="Enter your surname">
				</div>
                <div class="form-group">
					<label for="mobileNo">Mobile Number</label>
					<input type="tel" class="form-control" name="mobileNo" id="mobileNo" placeholder="Enter your mobile number">
				</div>
                <div class="form-group">
					<label for="username">Username</label>
					<input type="text" class="form-control" name="username" id="username" placeholder="Enter your username">
				</div>
                <div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" name="password" id="password" placeholder="Enter your password">
				</div>
                <div class="form-group">
					<label for="email">Email</label>
					<input type="email" class="form-control" name="email" id="email" placeholder="Enter your email">
				</div>
				<button type="submit" name="submit_btn" class="btn btn-success">Submit</button>
                <br/>
                <br/>
                <div>
                    <a href= "index.php"><button type="button" name="back_btn" class="btn btn-primary">Go Back to Login</button></a>
                </div>
			</form>
        </div>
		<?php include("footer.php"); ?>
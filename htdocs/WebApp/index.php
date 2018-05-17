<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Welcome to The Restaurant</title>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        
        <link rel="shortcut icon" href="myIcon.ico" type="image/x-icon" />
        
	
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
            <center><h1>Login</h1>
            <?php
                //check if ?login=-1.. if so, show the message
                if (isset($_GET['login']) && $_GET['login'] == -1) {
                echo "<div class=\"alert alert-warning\"> You need to enter information in all fields to proceed</div>";
                }
            ?>
            
            <?php
                //check if ?login=0.. if so, show the message
                if (isset($_GET['login']) && $_GET['login'] == 0) {
                echo "<div class=\"alert alert-warning\">Oops! Incorrect Login!</div>";
                }
            ?>
                
            <?php
                //check if ?logout=1.. if so, user got back from logout.php and therefore show the message
                if (isset($_GET['logout']) && $_GET['logout'] == 1) {
                    echo "You have been logged out!<hr/>";
                
            ?>
                
            <a class="btn btn-info" href="index.php">Go Back to Login</a>
            <?php
                
                }

                else {
                    echo 'You are not logged in. Fill in this form to login:'

                    ?>

                    <form action="login.php" method="post">
                        Username:
                        <input type="text" name="username" />
                        <br />
                        <br />
                        
                        Password:
                        <input type="password" name="password" />
                        
                        <br />
                        <br />

                        <input type="submit" name="submit" value="Login" />
                    </form>
                
                    <br />
                    <br />
                    <a href="register.php">Create an Account</a>

                    <!-- In your database, add username and password fields -->

                    <?php
                }
            ?>
            </center>
        </div>
    <?php include("footer.php"); ?>
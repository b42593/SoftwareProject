<!DOCTYPE html>

<html>
	<head>
		<title>Booking App</title>
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
                <a class="navbar-brand" href="home.php"><i class="fab fa-grunt text-danger" aria-hidden="true"></i> The Restaurant</a>
                
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="food.php">Menu</a>
                        </li>
                        <li class="nav-item" >
                            <a class="navbar-brand" href="https://www.facebook.com/"><i class="fab fa-facebook text-primary" aria-hidden="true"></i></a>
                        </li>
                        <li class="nav-item" >
                            <a class="navbar-brand" href="https://www.twitter.com/"><i class="fab fa-twitter text-primary" aria-hidden="true" ></i></a>
                        </li>
                        <li class="nav-item">
                            <?php
                                //check if ?logout=1.. if so, user got back from logout.php and therefore show the message
                                if (isset($_GET['logout']) && $_GET['logout'] == 1) {
                                    echo "You have been logged out!<hr/>";
                                }

                                //check if user is logged in!
                                if (isset($_SESSION['username'])) {
                                    echo  '<i class="fas fa-check-circle text-success" aria-hidden="true"> You are logged in as </i>';
                                    echo " ";
                                    echo  '<i class = "text-success">' .$_SESSION['username']. '</i>';
                                    echo " ";
                                    echo '<a href="logout.php">Click here to logout</a>';
                                }
                            ?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
			
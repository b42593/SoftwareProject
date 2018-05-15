<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Session</title>
	</head>
	<body>
		<h1>Homepage</h1>
		<?php
			//check if ?logout=1.. if so, user got back from logout.php and therefore show the message
			if (isset($_GET['logout']) && $_GET['logout'] == 1) {
				echo "You have been logged out!<hr/>";
			}
		
			//check if user is logged in!
			if (isset($_SESSION['username'])) {
				echo "You are logged in as ".$_SESSION['username'].' <a href="logout.php">Click here to logout</a>';
			}
			else {
				echo 'You are not logged in. Fill in this form to login:'
				
				?>
				
				<form action="login.php" method="post">
					Username:
					<input type="text" name="username" /><br />
					Password:
					<input type="password" name="password" /><br />
					
					<input type="submit" name="submit" value="Login" />
				</form>
				
				<!-- In your registry database, add username and password fields -->
				
				<?php
			}
		?>
	</body>
</html>
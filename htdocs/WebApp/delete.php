<?php
	//test the following by creating the following GET request:
	//delete.php?id=blablabla
	if (isset($_GET['id'])) {
		
		$id = $_GET['id'];
		
		//connect to DB
		$link = mysqli_connect("localhost", "root", "", "registry", 3307);
		if (mysqli_connect_errno()) {
			echo "<div class=\"alert alert-error\">Error connecting to DB...".mysqli_connect_error()."</div>";
			exit;
		}
	
		$sql = "DELETE FROM users WHERE id='$id'";
		$result = mysqli_query($link, $sql);
						
		//check if 1 row was delete...
		if (mysqli_affected_rows($link) == 1) {
			$deleted = 1;
		}
		else {
			$deleted = 0;
		}

		//redirect user back to index.php
		header("Location: index.php?deleted=$deleted");
	}
	else {
		echo "'id' not set!";
	}

?>
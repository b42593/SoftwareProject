<?php

$link = mysqli_connect("localhost", "root", "", "booking", 8084);
if (mysqli_connect_errno()) {
	echo "<div class=\"alert alert-error\">Error connecting to DB...".mysqli_connect_error()."</div>";
	
	exit;
}

?>
<?php
	session_start();
		
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (empty($username) || empty($password)) {
            header("location:index.php?login=-1");
        }
        else {
            //connect to DB
            require("connect.php");

            $sql = "SELECT * FROM customer WHERE username='$username' AND password='$password'";
            //$customerID = "SELECT customerID FROM customer WHERE username = '$username'";

            $result = mysqli_query($link, $sql) or die(mysqli_error($link));

            if (mysqli_num_rows($result) == 1) {
                //log user in!
                $_SESSION['username'] = $username;
                $row = mysqli_fetch_assoc($result);
                $_SESSION['customerID'] = $row["customerID"];
                header("location:home.php?login=1");
            }
            else {
                header("location:index.php?login=0");
                
            }
        }	
	}
?>

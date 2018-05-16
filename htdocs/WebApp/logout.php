<?php
session_start();

//empty the session
$_SESSION = array();

//destroy the session
session_destroy();

//redirect to homepage
header("location: index.php?logout=1");


?>
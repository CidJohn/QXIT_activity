<?php

$lname= "localhost";
$fname= "root";
$passd = "";

$db_name = "interviewdb";

$conn = mysqli_connect($lname, $fname, $passd, $db_name);

if (!$conn) {
	echo "Connection failed!";
}
?>

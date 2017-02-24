<?php

$dbhost = 'db:3306';
$dbuser = $_SERVER['MYSQL_USER'];
$dbpass = $_SERVER['MYSQL_PASSWORD'];
// $dbpass = "123";

//Open a new connection to the MySQL server
$mysqli = new mysqli($dbhost, $dbuser, $dbpass, "containerator");

//Output any connection error
if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}

?>

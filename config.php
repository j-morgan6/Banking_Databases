<?php
/* Database credentials. */
$servername = "localhost";
$username = "root";
$password = "";
$db = "mysql";
 
/* Attempt to connect to MySQL database */
$mysqli = new mysqli($servername, $username, $password, $db);
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
?>
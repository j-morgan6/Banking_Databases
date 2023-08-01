<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "Banking_DB";

if(!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)){
    die("failed");
}


?>
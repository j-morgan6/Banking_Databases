<html>
<style>
table, th, td {
  border: 1px solid black;
}
</style>
<body>
<h1 class="my-5">Hi, Welcome to the University Bank System.</h1>
    <p><nav class="nav justify-content-center">
    <a href="home.php">Home</a>
    <a href="Customer-serch.php">Customer-serch</a>
    <a href="Bank-serch.php">Bank-serch</a>
    <a href="Accounts-serch.php">Accounts-serch</a>
    <a href="Loan-serch.php">Loan-serch</a>
    <a href="Employee-serch.php">Employee-serch</a>
</nav>
<p><h2>University Bank Search:</h2>
<h3><a href="Delete-bank.php">Delete-bank</a></h3></p>
<form action="Bank-serch.php" method=get>
	Enter Bank name: <input type=text size=20 name="name">
	<p>Enter Bank ID number: <input type=text size=5 name="id">
        <p> <input type=submit value="submit">
                <input type="hidden" name="form_submitted" value="1" >
</form>
<?php
include 'config.php';

if (!isset($_GET["form_submitted"]))
{
		echo "Hello. Please enter a Bank name or ID number and submit the form.";
}
else {
 $mysqli = new mysqli($servername, $username, $password,$db);
 // Check connection
 if ($mysqli->connect_error) {
   die("Connection failed: " . $mysqli->connect_error);
 }
$mysqli->set_charset('utf8');
if (!empty($_GET["name"]))
{
  $profName = $_GET["name"]; //gets name from the form
  $sql = "SELECT Bank_ID, Bank_Name, Bank_Address FROM Bank where Bank_Name ='$profName'";
  $result = $mysqli->query($sql);
}
elseif (!empty($_GET["id"]))
{
  $profID = $_GET["id"]; //gets name from the form
  $sql = "SELECT Bank_ID, Bank_Name, Bank_Address FROM Bank where Bank_ID = $profID";
  $result = $mysqli->query($sql);
}
else {
    echo "<b>Please enter a Bank_Name or an ID number</b>";
}
if ($result->num_rows > 0) {
    echo "<table><tr><th>Bank_ID</th><th>Bank_Name</th><th>Bank_Address</th></tr>";   
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["Bank_ID"]."</td><td>".$row["Bank_Name"]."</td><td> ".$row["Bank_Address"]."</td></tr>";
    }
    echo "</table>"; // close the table
    echo "There are ". $result->num_rows . " results.";
} else {
        echo "0 results";
    }
$mysqli->close();
}

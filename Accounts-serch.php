<html>
<style>
table, th, td {
  border: 1px solid black;
}
</style>
<body>
<p><h2>University Bank Search:</h2>
<h3><a href="Delete-accounts.php">Delete-accounts</a></h3></p>
<form action="Accounts-serch.php" method=get>
	Enter Account_Number: <input type=text size=20 name="name">
	<p>Enter Customer_ID: <input type=text size=5 name="id">
        <p> <input type=submit value="submit">
                <input type="hidden" name="form_submitted" value="1" >
</form>
<?php
include 'config.php';

if (!isset($_GET["form_submitted"]))
{
		echo "Hello. Please enter an Account_Number or a Customer_ID number and submit the form.";
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
  $profName = $_GET["name"];
  $sql = "SELECT Account_Number, Account_Balance, Customer_ID FROM accounts where Account_Number =$profName";
  $result = $mysqli->query($sql);
}
elseif (!empty($_GET["id"]))
{
  $profID = $_GET["id"]; 
  $sql = "SELECT Account_Number, Account_Balance, Customer_ID FROM accounts where Customer_ID = $profID";
  $result = $mysqli->query($sql);
}
else {
    echo "<b>Please enter an Account_Number or a Customer_ID number</b>";
}
if ($result->num_rows > 0) {
    echo "<table><tr><th>Account_Number</th><th>Account_Balance</th><th>Customer_ID</th></tr>";   
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["Account_Number"]."</td><td>".$row["Account_Balance"]."</td><td> ".$row["Customer_ID"]."</td></tr>";
    }
    echo "</table>"; // close the table
    echo "There are ". $result->num_rows . " results.";
} else {
        echo "0 results";
    }
$mysqli->close();
}
<html>
<style>
table, th, td {
  border: 1px solid black;
}
</style>
<body>
<p><h2>University Bank Search:</h2>
<h3><a href="Delete-loan.php">Delete-loan</a></h3></p>
<form action="Loan-serch.php" method=get>
	Enter Loan_ID: <input type=text size=20 name="name">
	<p>Enter Customer_ID: <input type=text size=5 name="id">
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
  $profName = $_GET["name"];
  $sql = "SELECT Loan_ID, Loan_Amount, Customer_ID FROM loan where Account_Number =$profName";
  $result = $mysqli->query($sql);
}
elseif (!empty($_GET["id"]))
{
  $profID = $_GET["id"]; 
  $sql = "SELECT Loan_ID, Loan_Amount, Customer_ID FROM loan where Customer_ID = $profID";
  $result = $mysqli->query($sql);
}
else {
    echo "<b>Please enter a name or an ID number</b>";
}
if ($result->num_rows > 0) {
    echo "<table><tr><th>Loan_ID</th><th>Loan_Amount</th><th>Customer_ID</th></tr>";   
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["Loan_ID"]."</td><td>".$row["Loan_Amount"]."</td><td> ".$row["Customer_ID"]."</td></tr>";
    }
    echo "</table>"; // close the table
    echo "There are ". $result->num_rows . " results.";
} else {
        echo "0 results";
    }
$mysqli->close();
}
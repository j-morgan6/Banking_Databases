<html>
<style>
table, th, td {
  border: 1px solid black;
}
</style>
<body>
<p><h2>University Bank Search:</h2></p>
<form action="Employee-serch.php" method=get>
	Enter Employee_ID: <input type=text size=20 name="Employee_ID">
	<p>Enter Bank_ID: <input type=text size=5 name="Bank_ID">
        <p> <input type=submit value="submit">
                <input type="hidden" name="form_submitted" value="1" >
</form>
<?php
include 'config.php';

if (!isset($_GET["form_submitted"]))
{
		echo "Hello. Please enter a Employee_ID or Bank_ID number and submit the form.";
}
else {
 $mysqli = new mysqli($servername, $username, $password,$db);
 // Check connection
 if ($mysqli->connect_error) {
   die("Connection failed: " . $mysqli->connect_error);
 }
$mysqli->set_charset('utf8');

if (!empty($_GET["Employee_ID"]))
{
  $profName = $_GET["Employee_ID"];
  $sql = "SELECT Employee_ID, Employee_Name, Employee_Address, Employee_Salary,Bank_ID FROM employee where Employee_ID =$profName";
  $result = $mysqli->query($sql);
}
elseif (!empty($_GET["Bank_ID"]))
{
  $profID = $_GET["Bank_ID"]; 
  $sql = "SELECT Employee_ID, Employee_Name, Employee_Address, Employee_Salary,Bank_ID FROM employee where Bank_ID = $profID";
  $result = $mysqli->query($sql);
}
else {
    echo "<b>Please enter a name or an ID number</b>";
}
if ($result->num_rows > 0) {
    echo "<table><tr><th>Employee_ID</th><th>Employee_Name</th><th>Employee_Address</th><th>Employee_Salary</th><th>Bank_ID</th></tr>";   
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["Employee_ID"]."</td><td>".$row["Employee_Name"]."</td>
        <td> ".$row["Employee_Address"]."</td><td> ".$row["Employee_Salary"]."</td><td> ".$row["Bank_ID"]."</td></tr>";
    }
    echo "</table>"; // close the table
    echo "There are ". $result->num_rows . " results.";
} else {
        echo "0 results";
    }
$mysqli->close();
}
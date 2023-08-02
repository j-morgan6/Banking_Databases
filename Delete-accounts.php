<html>
<style>
table, th, td {
  border: 1px solid black;
}
</style>
<?php
include 'config.php';

$conn = new mysqli($servername, $username, $password, $db);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
function displayFaculty() {
    global $conn; //reference the global connection object (scope)
    $sql = "SELECT Account_Number, Account_Balance, Customer_ID FROM accounts";
        $result = $conn->query($sql);

       if ($result->num_rows > 0) {
          // Setup the table and headers
          echo "<table class=\"center\"><tr><th>Account_Number</th><th>Account_Balance</th><th>Customer_ID</th><th>Click To Remove</th></tr>";
         // output data of each row into a table row
         while($row = $result->fetch_assoc()) {
             echo "<tr><td>".$row["Account_Number"]."</td><td>".$row["Account_Balance"]."</td>
             <td> ".$row["Customer_ID"]."</td><td><a href=\"Delete-accounts.php?form_submitted=1&id=".$row["Customer_ID"]."\">Remove</a></td></tr>";
             }
        echo "</table>"; // close the table
        echo "There are ". $result->num_rows . " results.";
       // Don't render the table if no results found
      } else {
        echo "0 results";
                                                                                                                          }
 }
 ?>
<body>
<p><h2>University accounts Delete:</h2></p>
<p><h2>List of Bank:</h2></p>
<?php
displayFaculty();
?>
<form action="Delete-accounts.php" method=get>
                <input type="hidden" name="form_submitted" >
                <input type="hidden" name="Customer_ID" >
</form>
<?php

if (isset($_GET["form_submitted"])){
  if (!empty($_GET["Customer_ID"]) && !empty($_GET["form_submitted"]))
{
   $profID = $_GET["id"]; //gets id from the form
   $sqlstatement = $conn->prepare("DELETE FROM accounts where id =?"); //prepare the statement
   $sqlstatement->bind_param("i",$profID); //insert the variables into the ? in the above statement
   $sqlstatement->execute(); //execute the query
   echo $sqlstatement->error; //print an error if the query fails
   $sqlstatement->close();
 }
 else {
	 echo "<b> Error: Something went wrong with the form.</b>";
 }
header("Refresh:0;url=Delete-accounts.php"); //refresh the page to show the faculty is gone
}
   $conn->close();
   ?> <!-- this is the end of our php code -->
   </body>
   </html>
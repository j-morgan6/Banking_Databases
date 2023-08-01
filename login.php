<?php
session_start();

    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //something was posted
        $Employee_email = $_POST['Employee_email'];
        $Password = $_POST['Password'];

        if(!empty($Employee_email) && !empty($Password) && !is_numeric($Employee_email))
        {
            //read from db
            $query = "select * from Employee where Employee_email = '$Employee_email' limit 1";

            $result = mysqli_query($con, $query);
            if($result)
            {
                if($result && mysqli_num_rows($result) > 0)
                {
                    $user_data = mysqli_fetch_assoc($result);
                    if($user_data['Password'] == $Password)
                    {
                        $_SESSION['Employee_ID'] = $user_data['Employee_ID'];
                         header("Location: index.php");
                        die;
                    }
                }
            }
            echo"Invalid Information";
        }
        else
        {
            echo"Invalid Information";
        }
    }

    ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kent State Banking - Login</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <!-- Menu Bar -->
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="personal_banking.php">Personal Banking</a></li>
            <li><a href="#php">Login</a></li>
        </ul>
    </nav>

    <!-- Login -->
    <section id="login">
        <h2>Login</h2>
        <form>
            <label for="username">Email:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Login">
        </form>
    </section>
</body>

</html>
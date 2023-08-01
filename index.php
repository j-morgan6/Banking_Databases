<?php
session_start();
    $_SESSION;

    include("connection.php");
    include("functions.php");
    //$user_data = check_login($con);


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kent State Banking</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <!-- Menu Bar -->
    <nav>
        <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="personal_banking.php">Personal Banking</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </nav>

    <!-- Bank Title -->
    <section id="home">
        <h1>Kent State Banking</h1>
        <p>Secure and Convenient Banking Solutions for You</p>
    </section>

    <!-- About Us -->
    <section id="about">
        <h2>About Kent State Banking</h2>
        <ul>
            <li>A Trusted Name in Banking Since 2023</li>
            <li>Committed to Excellence and Customer Satisfaction</li>
        </ul>
    </section>

    <!-- Services -->
    <section id="services">
        <h2>Our Services</h2>
        <h3>Personal Banking</h3>
        <ul>
            <li>Savings Accounts</li>
            <li>Checking Accounts</li>
            <li>Loans</li>
            <li>Online Banking</li>
        </ul>
    </section>

    <!-- Personal Banking -->
    <section id="personal">
        <h2>Personal Banking Solutions Tailored to You</h2>
        <ul>
            <li>Securely Manage Your Finances</li>
            <li>Explore Our Range of Savings and Checking Accounts</li>
            <li>Fair Loan Rates for Your Needs</li>
            <li>Convenient Online and Mobile Banking Services</li>
        </ul>
    </section>
</body>

</html>
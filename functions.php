<?php

//checks if session login exists if not redirect
function check_login($con)
{
    if(isset($_SESSION['Employee_ID']))
    {
        $id = $_SESSION['Employee_ID'];
        $query = "select * from users where Employee_ID = '$id' limit 1";

        $result = mysqli_query($con, $query);
        if($result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }
    header("Location: login.php");
    exit;

}

?>
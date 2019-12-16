<?php
session_start();
require_once "config.php";

$message = "";
$role="";
if(isset($_POST['loginbtn'])){

    $username=$_POST["txtusername"];
    $password=$_POST["txtpassword"];
    
    $query= "SELECT * FROM multilogin WHERE username='$username' 
    AND password='$password'";
    $result =mysqli_query($conn,$query);

    if(mysqli_num_rows($result) > 0)
    {
        while($row =mysqli_fetch_assoc($result))
        {
            if($row["Role"] == "admin")
        {
           $_SESSION['User'] = $row["username"];
           $_Session['Role'] = $row["Role"];
           header('Location: admin.php');
        }
        else
        {
            $_SESSION['User'] = $row["username"];
            $_Session['Role'] = $row["Role"];
            header('Location: clerk.php');
        }
    }
    
    }
    else {
        header('Location: index.php');
    }

}

?>

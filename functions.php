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
           $_SESSION['Role'] = $row["Role"];
           header('Location: admin.php');
        }
        else
        {
            $_SESSION['User'] = $row["username"];
            $_SESSION['Role'] = $row["Role"];
            header('Location: clerk.php');
        }
    }
    
    }
    else {
        header('Location: index.php');
    }

}

if(isset($_POST['add_history'])){
    $nn=$_POST["nic"];
    $loctn =  "Location: http://localhost/MSS/patients_history.php?id={$nn}";
    $nic = "123456789v";
    $symtoms=$_POST["sytm"];
    $diagnosis=$_POST["dia"];
    $change_d=$_POST["c_d"];
    $remarks=$_POST["rmks"];

    $query= "INSERT INTO `patient_history` (`NIC`, `symtoms`, `Diagnosis`, `change details`, `remarks`, `r_id`, `p_id`) VALUES ('$nn', '$symtoms', '$diagnosis', '$change_d', '$remarks', NULL, NULL);";
    $result =mysqli_query($conn,$query);

    if($result){
        header($loctn);
    }
}


/*if(isset($_POST['yt'])){
    header('Location: doctor.php');
}*/
  
?>

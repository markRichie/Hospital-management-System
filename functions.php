<?php
session_destroy();
session_start();
require_once "config.php";

$message = "";
$role="";
if(isset($_POST['loginbtn'])){

    $username=$_POST["txtusername"];
    $password=$_POST["txtpassword"];
    
    $query= "SELECT * FROM login WHERE username='$username' 
    AND password='$password'";
    $result =mysqli_query($conn,$query);

    if(mysqli_num_rows($result) > 0)
    {
        while($row =mysqli_fetch_assoc($result))
        {

            if($row["role"] == "doctor")
        {
           $_SESSION['idi'] = $row["id"];
           $_SESSION['role'] = $row["role"];
           header('Location: appointment.php');
        }
        elseif($row["role"] == "front office clerk")
        {
            //$_SESSION['idi'] = $row["username"];
            $_SESSION['role'] = $row["role"];
            header('Location: appointment.php');
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
    $report = $_POST["rType"];

    $query= "INSERT INTO `patient_history` (`NIC`, `symtoms`, `Diagnosis`, `change details`, `remarks`, `r_id`, `p_id`, `r_type`) VALUES ('$nn', '$symtoms', '$diagnosis', '$change_d', '$remarks', NULL, NULL, '$report');";
    $result =mysqli_query($conn,$query);

    if($result){
        header($loctn);
    }
}


/*if(isset($_POST['yt'])){
    header('Location: doctor.php');
}*/
  
?>

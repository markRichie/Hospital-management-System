<?php
session_start();
include_once 'config.php';

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

if(isset($_POST['appointmentbtn'])){

    $txtfullname=$_POST["txtfullname"];
    $txtNIC=$_POST["txtNIC"]; 
    $txtcontact=$_POST["txtcontact"];
    $event_date=$_POST["event_date"]; 
    $txttime=$_POST["txttime"]; 
    $valuedoctors=$_POST["valuedoctors"]; 
    $txtdocid=$_POST["txtdocid"]; 

    $sql = "INSERT INTO appointment(Name, NIC, Contact, date, time, d_id, patients_doc) VALUES ('$txtfullname', '$txtNIC', '$txtcontact', '$event_date', '$txttime','$txtdocid','$valuedoctors');";
    mysqli_query($conn, $sql);
    header("Location:clerk.php?sucess");
}
if(isset($_POST['tablebtn'])){
    header("Location:table.php");
}
 
if(isset($_POST['btnadd_doc'])){

    $txtfname=$_POST["txtfname"];
    $txtdoc_username=$_POST["txtdoc_username"]; 
    $txtdoc_pass=$_POST["txtdoc_pass"];

    $sql = "INSERT INTO doctor(name, username, password) VALUES ('$txtfname', '$txtdoc_username', '$txtdoc_pass');";
    mysqli_query($conn, $sql);
    header("Location:admin.php?sucess");
}

if(isset($_POST['btndelete_doc'])){
    header("Location:delete_doctor.php");
}
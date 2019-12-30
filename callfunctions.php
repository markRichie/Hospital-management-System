<?php
session_start();
include_once 'config.php';

 //doctor
if(isset($_POST['registerdoc_btn'])){

    $doctor_id=$_POST["doctor_id"];
    $txtdoc_username=$_POST["txtdoc_username"];
    $doctor_role=$_POST["doctor_role"]; 
    $txtdoc_password=$_POST["txtdoc_password"]; 
   
    $sql = "INSERT INTO `login`(password, username, role, id) VALUES ('$txtdoc_password', '$txtdoc_username', '$doctor_role','$doctor_id');";
    mysqli_query($conn, $sql);
    header("Location:register_doctor.php?sucess");
}

if(isset($_POST['btnadd_doc'])){

    $txtdoc_fname=$_POST["txtdoc_fname"];
    $txtdoc_fees=$_POST["txtdoc_fees"]; 
 
    $sql = "INSERT INTO doctor(name, fees) VALUES ('$txtdoc_fname', '$txtdoc_fees');";
    mysqli_query($conn, $sql);
    header("Location:register_doctor.php");
}

if(isset($_POST['btndelete_doc'])){
    header("Location:delete_doctor.php");
}

if(isset($_POST['btncreatedoc'])){
    header("Location:register_doctor.php");
}


//clerk
if(isset($_POST['btnadd_clerk'])){

    $txtclerk_fname=$_POST["txtclerk_fname"];
    $txtclerk_role=$_POST["txtclerk_role"];
    $txtclerk_password=$_POST["txtclerk_password"];
    $txtclerk_id=$_POST["txtclerk_id"];

    $sql = "INSERT INTO  `front office clerk`(name) VALUES ('$txtclerk_fname');";
    mysqli_query($conn, $sql);
    header("Location:register_clerk.php");
}

if(isset($_POST['btndelete_clerk'])){
    header("Location:delete_clerk.php");
}
if(isset($_POST['btncreateclerk'])){
    header("Location:register_clerk.php");
}

if(isset($_POST['registerclerk_btn'])){

    $clerk_id=$_POST["clerk_id"];
    $txtclerk_username=$_POST["txtclerk_username"];
    $clerk_role=$_POST["clerk_role"]; 
    $txtclerk_password=$_POST["txtclerk_password"]; 
   
    $sql = "INSERT INTO `login`(password, username, role, id) VALUES ('$txtclerk_password', '$txtclerk_username', '$clerk_role','$clerk_id');";
    mysqli_query($conn, $sql);
    header("Location:register_clerk.php?sucess");
}

<?php
session_start();
include_once 'config.php';

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

    $txtdoc_fname=$_POST["txtdoc_fname"];
    $txtdoc_fees=$_POST["txtdoc_fees"]; 
 
    $sql = "INSERT INTO doctor(name, fees) VALUES ('$txtdoc_fname', '$txtdoc_fees');";
    mysqli_query($conn, $sql);
    header("Location:admin.php?sucess");
}

if(isset($_POST['btndelete_doc'])){
    header("Location:delete_doctor.php");
}

if(isset($_POST['btnadd_clerk'])){

    $txtclerk_fname=$_POST["txtclerk_fname"];


    $sql = "INSERT INTO  `front office clerk`(name) VALUES ('$txtclerk_fname');";
    mysqli_query($conn, $sql);
    header("Location:admin.php?sucess");
}

if(isset($_POST['btndelete_clerk'])){
    header("Location:delete_clerk.php");
}
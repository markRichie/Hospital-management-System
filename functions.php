<?php
if(isset($_SESSION['role'])){
    session_destroy();
}

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
            elseif($row["role"] == "lab_technician")
            {
                //$_SESSION['idi'] = $row["username"];
                $_SESSION['role'] = $row["role"];
                $_SESSION['t_id'] = $row["id"];
                header('Location: request_reports.php');
            }
            elseif($row["role"] == "pharmacist")
            {
                //$_SESSION['idi'] = $row["username"];
                $_SESSION['role'] = $row["role"];
                $_SESSION['t_id'] = $row["id"];
                header('Location: pharmacy.php');
            }
            elseif($row["role"] == "admin")
            {
                //$_SESSION['idi'] = $row["username"];
                $_SESSION['role'] = $row["role"];
                header('Location: admin.php');
            }
            
        }
    
    }
    else {
        header('Location: index.php');
    }

}

if(isset($_POST['add_history'])){
    echo "voila";
    $nn=$_POST["nic"];
    $loctn =  "Location: http://localhost/MSS/patients_history.php?id={$nn}";
    $nic = "123456789v";
    $symtoms=$_POST["sytm"];
    $diagnosis=$_POST["dia"];
    $change_d=$_POST["c_d"];
    $remarks=$_POST["rmks"];
    $report = $_POST["rType"];
    $numb = rand();

    $med = $_POST['mt'];
    $qty = $_POST['qt'];


    $query= "INSERT INTO `patient_history` (`NIC`, `symtoms`, `Diagnosis`, `change details`, `remarks`, `r_type`) VALUES ('$nn', '$symtoms', '$diagnosis', '$change_d', '$remarks','$report');";
    $query1= "INSERT INTO `presciption` (`NIC`,`medicine`, `qty`, `order_no`) VALUES ('$nn','$med', '$qty', '$numb');";
    $result =mysqli_query($conn,$query);
    

    if($result){
       $result1 =mysqli_query($conn,$query1);
       if($result1){
            header($loctn);
       }
        
    }
    else{
        echo mysqli_error($conn);
    }
}


/*if(isset($_POST['yt'])){
    header('Location: doctor.php');
}*/

if(isset($_POST['add_report'])){
    $nn=$_POST["nic"];
    $loctn =  "Location: http://localhost/MSS/request_reports.php";
    $typ = $_POST["type"];
    $results=$_POST["rslts"];
    $rdate=$_POST["r_date"];
    $tdate=$_POST["t_date"];
    $rmks=$_POST["remarks"];
    $fs=$_POST["fees"];
    $lnk = $_POST["link"];
    $tid = $_POST["td"];

   

    $query= "INSERT INTO `report` (`type`, `results`, `s_received_date`, `s_tested_date`, `technician_remarks`, `fees`, `link_to_softcopy`, `t_id`, `NIC`) VALUES ('$typ', '$results', '$rdate', '$tdate', '$rmks', '$fs', '$lnk', '$tid', '$nn');";
    
    $result =mysqli_query($conn,$query);
    //$result1=mysqli_query($conn,$query);

    if($result){
        header($loctn);
    }
}

if(isset($_POST['del'])){
    //$nn=$_POST["nic"];
    $loctn =  "Location: http://localhost/MSS/pharmacy.php";
    //$lnk = $_POST["link"];
    $mid = $_POST["medi"];
    //echo $tid;

    $query= "DELETE FROM medicine WHERE m_id = '$mid'";
    $result =mysqli_query($conn,$query);

    if($result){
        header($loctn);
    }
}


//adding appointment
if(isset($_POST['appointmentbtn'])){
    $nn=$_POST["txtNIC"];
    $loc =  "Location: http://localhost/MSS/appointment.php.php";
    $fullnme = $_POST["txtfullname"];
    $telno=$_POST["txtcontact"];
    $age=$_POST["txtage"];
    $edate=$_POST["event_date"];
    $tme=$_POST["atime"];
    $dnme=$_POST["valuedoctors"];
   
    //echo $dnme;
    $query5= "INSERT INTO patient(`NIC`, `name`, `age`, `tel_no`) VALUES('$nn', '$fullnme', '$age', '$telno')";
    //$query2= "SELECT d_id from doctor where name='$dnme'";
    //$query1= "INSERT INTO appointment(`date`, `time`, `d_id`, `c_id`,`NIC`) VALUES('$edate', '$tme', '', ' ', '$nn')";
    
    $result4 =mysqli_query($conn,$query5);
    //$result1=mysqli_query($conn,$query);
    
    
    if($result4){
        echo "voila";
        //$result1 =mysqli_query($conn,$query2);
        $query2= "SELECT * from doctor where name='$dnme'";
        $result1=mysqli_query($conn,$query2);
        while ($row = mysqli_fetch_array($result1)) {
            $er = $row['d_id'];
        }

        $query1= "INSERT INTO appointment(`date`, `time`, `d_id`,`NIC`) VALUES('$edate', '$tme', '$er','$nn')";
        $result3=mysqli_query($conn,$query1);

        if($result3){
            echo "voila";
            header("Location: http://localhost/MSS/appointment.php");
        }
        else{
            echo mysqli_error($conn);
        }
    }
    else{
        echo mysqli_error($conn);
    }
}


?>

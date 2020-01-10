<?php
// Start the session
session_start();
$rle = $_SESSION["role"];

if ($rle == "doctor"){
  $id =  $_SESSION["idi"];
}

include "new_appointment.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Hello, world!</title>
    <style>
      .headg{
        margin-left: 30px;
        margin-right: 30px;
      }
      h1{
        margin-top: 20px;
        margin-bottom: 20px;
      }
      #ph{
        margin-top: 5px;
      }
      #nw{
        margin-bottom: 10px;
      }
      #sr{
        margin-right: 10px;
      }
      #ct{
        overflow: hidden;
        width: 100%;
      }
    </style>
    <script>
      function al(){
        modal.style.display = "block";
      }
      function tr(uid){
        //alert("voila")
        window.location.href="http://localhost/MSS/patients_history.php?id="+uid;
      }
      function insertParam(key, value)
      {
        key = encodeURI(key); value = encodeURI(value);
        var kvp = document.location.search.substr(1).split('&');

        var i=kvp.length; var x; while(i--) 
        {
            x = kvp[i].split('=');

            if (x[0]==key)
            {
                x[1] = value;
                kvp[i] = x.join('=');
                break;
            }
        }

        if(i<0) {kvp[kvp.length] = [key,value].join('=');}

        //this will reload the page, it's likely better to store this until finished
        document.location.search = kvp.join('&'); 
      }
    </script>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <h5 style="color: #808281;">Asceso Hospitals</h5>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor03">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#"><span class="sr-only">(current)</span></a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <button class="btn btn-info my-2 my-sm-0" type="submit">Sign out</button>
          </form>
        </div>
    </nav>
  <div class="headg" >
    <h1>Appointments</h1>
    <div class="alert alert-dismissible alert-info">
    <?php
      if($rle == "doctor"){
        echo"<strong>Welcome Doctor!</strong>
        <p>Total number of Appointments: </p>  </div>";
      }
      else{
        echo"<strong>Welcome clerk!</strong>  </div>";
        echo"<button type='button' id='nw' class='btn btn-info' data-toggle='modal' data-target='#new_history'>New patient</button>       ";
        echo"<button type='button' id='nw' class='btn btn-info' data-toggle='modal' data-target='#new_istory'>New Appointment</button>";
       
      }
    ?>
    
   

    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Patient no</th>
          <th scope="col">Patient Name</th>
          <th scope="col">Patient age</th>
          <?php if($rle == "front office clerk"){
              echo "<th scope='col'>doctor</th>";
          }
          ?>
          <?php if($rle == "doctor"){
              echo "<th scope='col'>history</th>";
          }
          ?>
        </tr>
      </thead>
      <!-- replace php code with config when common database-->
      <tbody>
        <?php

          if($rle == "doctor"){
              $conn = mysqli_connect("localhost", "root", "","hospital_db");
              $query = mysqli_query($conn,"select * from patient where NIC in (select NIC from appointment where d_id='$id')");
              //echo $query;
              

              $num = 1;
              while ($row = mysqli_fetch_array($query)) {
                echo"<tr>";
                  echo"<td>".$num."</td>";
                  echo"<td>".$row['name']."</td>";
                  echo"<td>".$row['age']."</td>";
                  echo"<form method='post' action=".$_SERVER['PHP_SELF'].">";
                  echo"<input type='hidden' id=".$num." value=".$num.">";
                  echo"<td><button type='button' id=".$row['NIC']." class='btn btn-info' onclick='tr(this.id)'>view history</button></td>";
                  echo"</form>";
                echo"</tr>";
                $num++;
              }
          }elseif($rle == "front office clerk"){
            $conn = mysqli_connect("localhost", "root", "","hospital_db");
            $query = mysqli_query($conn,"select * from patient where NIC in (select NIC from appointment)");
            //echo $query;
            

            $num = 1;
            while ($row = mysqli_fetch_array($query)) {
              echo"<tr>";
                echo"<td>".$num."</td>";
                echo"<td>".$row['name']."</td>";
                echo"<td>".$row['age']."</td>";
                
                $nnic = $row['NIC'];
                $conn1 = mysqli_connect("localhost", "root", "","hospital_db");
                $query1 = mysqli_query($conn,"select * from doctor where d_id in (select d_id from appointment where NIC = '$nnic')");
                $row1 = mysqli_fetch_array($query1);

                echo"<td>".$row1['name']."</td>";
                echo"<form method='post' action=".$_SERVER['PHP_SELF'].">";
                //echo"<input type='hidden' id=".$num." value=".$num.">";
                //echo"<td><button type='button' id=".$row['NIC']." class='btn btn-info' onclick='tr(this.id)'>view history</button></td>";
                echo"</form>";
              echo"</tr>";
              $num++;
            }
          }
        ?>
      </tbody>
    </table> 
  </div>
 <script></script>
  
  <div class="modal" id="patientModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Patient history<?php echo $myPhpVar= $_COOKIE['myJavascriptVar']; ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="text" class="form-control" id="recipient-name">
        
        <?php
        $id = intval($_GET['id']);
        $conn = mysqli_connect("localhost", "root", "","hospital_db");
        $query = mysqli_query($conn,"select * from patient_history");

        while ($row = mysqli_fetch_array($query)) {
          echo"<div class='card' id='ph'>";
            echo"<div class='card-body'>";
              echo"<table style = 'width:100%;'>";
                echo"<tr>";
                  echo"<th>".$id."</th>";
                  echo"<td>".$row['date_Time']."</td>";
                echo"</tr>";
                echo"<tr>";
                  echo"<th>Symtoms</th>";
                  echo"<td>".$row['symtoms']."</td>";
                echo"</tr>";
                echo"<tr>";
                  echo"<th>Diagnosis</th>";
                  echo"<td>".$row['Diagnosis']."</td>";
                echo"</tr>";
                echo"<tr>";
                  echo"<th>Change details</th>";
                  echo"<td>".$row['change details']."</td>";
                echo"</tr>";
                echo"<tr>";
                  echo"<th>Remarks</th>";
                  echo"<td>".$row['remarks']."</td>";
                echo"</tr>";
                
              echo"</table>";


              //<a href="#" class="card-link">Card link</a>
              //<a href="#" class="card-link">Another link</a>
            echo"</div>";
          echo"</div>";} ?>
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#new_history" data-dismiss="modal">new</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


  <form class="form-group" action="functions.php"  method="POST">
    <div class="modal" id="new_history">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">New history</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            
                          <h6>Symtoms</h6>
                          <textarea class="form-control" name="sytm" id="exampleTextarea" rows="3"></textarea>
                          <h6>Diagnosis</h6>
                          <textarea class="form-control" name="dia" id="exampleTextarea" rows="3"></textarea>
                          <h6>Change details</h6>
                          <textarea class="form-control" name="c_d" id="exampleTextarea" rows="3"></textarea>
                          <h6>Remarks</h6>
                          <textarea class="form-control" name="rmks" id="exampleTextarea" rows="3"></textarea>
                          
                        
          </div>  
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name="add_history">Save changes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </form>
  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
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
    </style>
    <script>
      function al(){
        modal.style.display = "block";
      }
    </script>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#" >Aeso Hospital</a>
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
    <strong>Welcome Doctor!</strong>
    <p>Total number of Appointments: </p>
    </div>

    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Patient no</th>
          <th scope="col">Patient Name</th>
          <th scope="col">Patient age</th>
          <th scope="col">history</th>
        </tr>
      </thead>
      <!-- replace php code with config when common database-->
      <tbody>
        <?php

          $conn = mysqli_connect("localhost", "root", "","hospital_db");
          $query = mysqli_query($conn,"select * from patient");

          $num = 1;
          while ($row = mysqli_fetch_array($query)) {
            echo"<tr>";
              echo"<td>".$num."</td>";
              echo"<td>".$row['name']."</td>";
              echo"<td>".$row['age']."</td>";
              echo"<td><button type='button' class='btn btn-info' data-toggle='modal' data-target='#patientModal'>view history</button></td>";
            echo"</tr>";
            $num++;
          }
        ?>
      </tbody>
    </table> 
  </div>
  
  
  
  <div class="modal" id="patientModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Patient history</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        
        <?php
        $conn = mysqli_connect("localhost", "root", "","hospital_db");
        $query = mysqli_query($conn,"select * from patient_history");

        while ($row = mysqli_fetch_array($query)) {
          echo"<div class='card' id='ph'>";
            echo"<div class='card-body'>";
              echo"<table style = 'width:100%;'>";
                echo"<tr>";
                  echo"<th>Date</th>";
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
                        <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
                        <h6>Diagnosis</h6>
                        <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
                        <h6>Change details</h6>
                        <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
                        <h6>Remarks</h6>
                        <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
                        
                      
        </div>  
        <div class="modal-footer">
          <button type="button" class="btn btn-primary">Save changes</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
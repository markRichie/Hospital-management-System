<?php 
session_start();
//echo $_SESSION['color']; 
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
        margin-bottom: 20px;
      }
      #qty{
        width: 50%;
        margin-left: 20px;
      }
      
    </style>
    <script>
      function al(){
        modal.style.display = "block";
      }
      
      /*$( document ).ready(function() {
            $('#e_table').SetEditable({
              columnsEd: "0,1,2,3,4,5,6",
              onEdit: function(columnsEd) {
              var empId = columnsEd[0].childNodes[1].innerHTML;
                  var empName = columnsEd[0].childNodes[3].innerHTML;
                  var gender = columnsEd[0].childNodes[5].innerHTML;
                  var age = columnsEd[0].childNodes[7].innerHTML;
                  var skills = columnsEd[0].childNodes[9].innerHTML;
              var address = columnsEd[0].childNodes[11].innerHTML;
              $.ajax({
                type: 'POST',			
                url : "functions.php",	
                dataType: "json",					
                data: {id:empId, name:empName, gender:gender, age:age, skills:skills, address:address, action:'edit'},			
                success: function (response) {
                  if(response.status) {
                  }						
                }
              });
              },
              onBeforeDelete: function(columnsEd) {
              var empId = columnsEd[0].childNodes[1].innerHTML;
              $.ajax({
                type: 'POST',			
                url : "functions.php",
                dataType: "json",					
                data: {id:empId, action:'delete'},			
                success: function (response) {
                  if(response.status) {
                  }			
                }
              });
              },
            });
          });*/
    </script>
  </head>
  <body>
    <?php 
        /*$somevar = $_GET["id"]; 
        $conn = mysqli_connect("localhost", "root", "","hospital_db");
        $query = mysqli_query($conn,"select * from patient where NIC='$somevar'");
        
        $num = 1;
            while ($row = mysqli_fetch_array($query)) {

                $name = $row['name'];
                $age = $row['age'];
                $num++;
            }
    */
    ?>
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
    <h1>Pharmacy</h1>
    <div class="alert alert-dismissible alert-info">
    <strong>pharmacist : </strong>
    </div>
    
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#home">Prescriptions</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#profile">Inventory</a>
      </li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane fade show active" id="home">
        
      </div>
      <div class="tab-pane fade" id="profile">

        
      <table id = "e_table" class="table table-hover">
        <thead>
            <tr>
            <th scope="col">no</th>
            <th scope="col">name</th>
            <th scope="col">quantity</th>
            <th scope="col">price per</th>
            </tr>
        </thead>
        <!-- replace php code with config when common database-->
        <tbody>
            <?php
            //$somevar = "123456789v";
            $conn = mysqli_connect("localhost", "root", "","hospital_db");
            $query = mysqli_query($conn,"select * from medicine");

            $num = 1;
            while ($row = mysqli_fetch_array($query)) {
                echo"<tr>";
                echo"<td>".$num."</td>";
                echo"<td>".$row['name']."</td>";
                echo"<td>".$row['qty']."</td>";
                echo"<td>".$row['price']."</td>";
                echo"<form class='form-group' action='functions.php'  method='POST'>";
                $mid = $row['m_id'];
                echo"<td><button type='submit' name='edit' class='btn btn-info'>edit</button>
                <input type='hidden' name='medi' value='$mid'>
                <button type='submit' name='del' class='btn btn-info'>delete</button></td> </form>";
                echo"</tr>";
                $num++;
            }
            ?>
        </tbody>
        </table> 


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
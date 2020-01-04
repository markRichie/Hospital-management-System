<?php

// Start the session
session_start();
$rle = $_SESSION["role"];
if (!$rle == "admin"){
 
}

$connect = mysqli_connect("localhost", "root", "", "hospital_db");  
$query ="SELECT * FROM `doctor`";  

// for method 

$result2 = mysqli_query($connect, $query);

$options = "";

while($row2 = mysqli_fetch_array($result2))
{
    $options = $options."<option>$row2[0]</option>";
}

?>
<!DOCTYPE HTML>
<html>
<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="css/bootstrap.min.css">

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
          <form class="form-inline my-2 my-lg-0" > 
          <a class="btn btn-info my-2 my-sm-0" href="logout.php" role="button" >Sign Out</a>            

          </form>
        </div>
    </nav>

<div class="container-fluid" style="margin-top:50px;" >
    <div class="row" >
  <div class="col-md-4">
    <div class="list-group" id="list-tab" role="tablist"  >
      <a class="list-group-item list-group-item-action active" id="list-doctor-list" data-toggle="list" href="#list-doctor" role="tab" aria-controls="home" >Manage Doctor</a>
      <a class="list-group-item list-group-item-action"  id="list-clerk-list" data-toggle="list" href="#list-clerk" role="tab" aria-controls="profile" >Manage Clerk</a>
      <a class="list-group-item list-group-item-action" id="list-lab-list" data-toggle="list" href="#list-lab" role="tab" aria-controls="messages"> Manage Lab Techniciant</a>
      <a class="list-group-item list-group-item-action" id="list-pharmacist-list" data-toggle="list" href="#list-pharmacist" role="tab" aria-controls="settings" >Manage Pharmacist</a>
    </div><br>
  </div>
  <div class="col-md-8" >
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active"  id="list-doctor" role="tabpanel" aria-labelledby="list-doctor-list">
        <div class="container-fluid">
          <div class="card" >
            <div class="card-body">
              <center><h4>Add Doctor</h4></center><br>
              <form class="form-group" action="callfunctions.php"  method="POST">
                <div class="row">
                  <div class="col-md-4"><label>Full Name:</label></div>
                  <div class="col-md-8"><input type="text" class="form-control"  name="txtdoc_fname" placeholder="Enter Doctors Full Name"required></div><br><br>
                  <div class="col-md-4"><label>Fees:</label></div>
                  <div class="col-md-8"><input type="text"  class="form-control" name="txtdoc_fees" placeholder="Enter Doctors Fees"required></div><br><br>
                  
                  <div class="col-md-7">
                    <input type="submit" name="btnadd_doc" value="Register Doctor" class="btn btn-primary" id="inputbtn">
                    <input type="submit" formnovalidate name="btndelete_doc" value="Delete Doctor" class="btn btn-primary" id="inputbtn">
                    <input type="submit" formnovalidate name="btncreatedoc" value="Create Account" class="btn btn-primary" id="inputbtn">
                  </div>
                  <div class="col-md-8"></div>                  
                </div>
              </form>
            </div>
          </div>
        </div><br>
      </div>
        <div class="tab-pane fade"  id="list-clerk" role="tabpanel" aria-labelledby="list-clerk-list">
        <div class="card">
          <div class="card-body">
          <center><h4>Add Clerk</h4></center><br>
              <form class="form-group" action="callfunctions.php"  method="POST">
                <div class="row">
                  <div class="col-md-4"><label>Full Name:</label></div>
                  <div class="col-md-8"><input type="text" class="form-control"  name="txtclerk_fname" placeholder="Enter Clerks Full Name"required></div><br><br>
                  <div class="col-md-7">
                  <br>
                    <input type="submit" name="btnadd_clerk" value="Register Clerk" class="btn btn-primary" id="inputbtn">
                    <input type="submit" formnovalidate name="btndelete_clerk" value="Delete Clerk" class="btn btn-primary" id="inputbtn">
                    <input type="submit" formnovalidate name="btncreateclerk" value="Create Account" class="btn btn-primary" id="inputbtn">
                  </div>
                  <div class="col-md-8"></div>                  
                </div>
              </form>
            </div>
          </div>
        </div><br>
        <div class="tab-pane fade"  id="list-lab" role="tabpanel" aria-labelledby="list-lab-list">
        <div class="card">
          <div class="card-body">
          <center><h4>Add Lab Technician</h4></center><br>
              <form class="form-group" action="callfunctions.php"  method="POST">
                <div class="row">
                  <div class="col-md-4"><label>Full Name:</label></div>
                  <div class="col-md-8"><input type="text" class="form-control"  name="txtlab_fname" placeholder="Enter Lab Technicians Full Name"required></div><br><br>
                  <div class="col-md-7">
                  <br>
                    <input type="submit" name="btnadd_lab" value="Register Lab Tech" class="btn btn-primary" id="inputbtn">
                    <input type="submit" formnovalidate name="btndelete_lab" value="Delete Technician" class="btn btn-primary" id="inputbtn">
                    <input type="submit" formnovalidate name="btncreate_lab" value="Create Account" class="btn btn-primary" id="inputbtn">
                  </div>
                  <div class="col-md-8"></div>                  
                </div>
              </form>
            </div>
          </div>
        </div><br>
        <div class="tab-pane fade"  id="list-pharmacist" role="tabpanel" aria-labelledby="list-pharmacist-list">
        <div class="card">
          <div class="card-body">
          <center><h4>Add Pharmacist</h4></center><br>
              <form class="form-group" action="callfunctions.php"  method="POST">
                <div class="row">
                  <div class="col-md-4"><label>Full Name:</label></div>
                  <div class="col-md-8"><input type="text" class="form-control"  name="txtphar_fname" placeholder="Enter Pharmacist Full Name"required></div><br><br>
                  <div class="col-md-7">
                  <br>
                    <input type="submit" name="btnadd_phar" value="Register Pharmacist" class="btn btn-primary" id="inputbtn">
                    <input type="submit" formnovalidate name="btndelete_phar" value="Delete Pharmacist" class="btn btn-primary" id="inputbtn">
                    <input type="submit" formnovalidate name="btncreate_phar" value="Create Account" class="btn btn-primary" id="inputbtn">
                  </div>
                  <div class="col-md-8"></div>                  
                </div>
              </form>
            </div>
          </div>
        </div><br>
      </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" 
integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
   
</body>
</html>

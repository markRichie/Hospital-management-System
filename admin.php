<?php
session_start();
if(isset($_SESSION['Role']))
{
  if($_SESSION['Role'] != 'admin')
  {
    header('Location: clerk.php');
  }
}
else
{
  header('Location: index.php');
}

$connect = mysqli_connect("localhost", "root", "", "hmsdb");  
$query ="SELECT * FROM `doctor`";  

// for method 

$result2 = mysqli_query($connect, $query);

$options = "";

while($row2 = mysqli_fetch_array($result2))
{
    $options = $options."<option>$row2[0]</option>";
}

echo !$_SESSION['User'];
?>
<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<div class="jumbotron" style="background:url('images/Adminpanel.jpg') 
no-repeat;background-size:cover;height:200px;"></div>
<div class="container-fluid">
<div class="container-fluid" style="margin-top:50px;">
    <div class="row">
  <div class="col-md-4">
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" id="list-doctor-list" data-toggle="list" href="#list-doctor" role="tab" aria-controls="home">Manage Doctor</a>
      <a class="list-group-item list-group-item-action" id="list-clerk-list" data-toggle="list" href="#list-clerk" role="tab" aria-controls="profile">Manage Clerk</a>
      <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Prescription</a>
      <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Doctors Section</a>
       <a class="list-group-item list-group-item-action" id="list-attend-list" data-toggle="list" href="#list-attend" role="tab" aria-controls="settings">Attendance</a>
    </div><br>
  </div>
  <div class="col-md-8">
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="list-doctor" role="tabpanel" aria-labelledby="list-doctor-list">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <center><h4>Add Doctor</h4></center><br>
              <form class="form-group" action="functions.php"  method="POST">
                <div class="row">
                  <div class="col-md-4"><label>Full Name:</label></div>
                  <div class="col-md-8"><input type="text" class="form-control"  name="txtdoc_fname" placeholder="Enter Doctors Full Name"required></div><br><br>
                  <div class="col-md-4"><label>Username:</label></div>
                  <div class="col-md-8"><input type="text"  class="form-control" name="txtdoc_username" placeholder="Enter Doctors Username"required></div><br><br>
                  <div class="col-md-4"><label>Password:</label></div>
                  <div class="col-md-8"><input type="password" class="form-control"  name="txtdoc_pass" placeholder="Enter Doctors Password"required></div><br><br>
                  <div class="col-md-4">
                    <input type="submit" name="btnadd_doc" value="Register Doctor" class="btn btn-primary" id="inputbtn">
                    <input type="submit" formnovalidate name="btndelete_doc" value="Delete Doctor" class="btn btn-primary" id="inputbtn">
                  </div>
                  <div class="col-md-8"></div>                  
                </div>
              </form>
            </div>
          </div>
        </div><br>
      </div>
      <div class="tab-pane fade" id="list-clerk" role="tabpanel" aria-labelledby="list-clerk-list">
        <div class="card">
          <div class="card-body">
          <center><h4>Add Clerk</h4></center><br>
              <form class="form-group" action="functions.php"  method="POST">
                <div class="row">
                  <div class="col-md-4"><label>Full Name:</label></div>
                  <div class="col-md-8"><input type="text" class="form-control"  name="txtclerk_fname" placeholder="Enter Clerks Full Name"required></div><br><br>
                  <div class="col-md-4"><label>Username:</label></div>
                  <div class="col-md-8"><input type="text"  class="form-control" name="txtclerk_username" placeholder="Enter Clerks Username"required></div><br><br>
                  <div class="col-md-4"><label>Password:</label></div>
                  <div class="col-md-8"><input type="password" class="form-control"  name="txtclerk_pass" placeholder="Enter Clerks Password"required></div><br><br>
                  <div class="col-md-4">
                    <input type="submit" name="btnadd_clerk" value="Register Clerk" class="btn btn-primary" id="inputbtn">
                    <input type="submit" formnovalidate name="btndelete_clerk" value="Delete Clerk" class="btn btn-primary" id="inputbtn">
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

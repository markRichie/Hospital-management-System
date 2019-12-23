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
  
  <div class="row">
    <div class="col-md-3">
    <div class="list-group">
    <a href="" class="list-group-item active" style="background-color:#3498DB; 
    color:white;border-color:#3498DB">Add Doctor</a>
    <a href= "" class="list-group-item">pending admisson</a>
    <a href= "" class="list-group-item">Manage Doctors</a>
    <a href= "" class="list-group-item">Reports</a>
    <a href= "" class="list-group-item">Prescription</a>
    </div>
    <hr>
    </div>
<div class="col-md-8">
<div class="card">
    <div class="card-body" style="background-color:#3498DB;color:#3498DB;"></div>
    <div class="card-body">
        <center><h4>Add Doctor</h4></center><br>
              <form class="form-group" action="functions.php"  method="POST">
                <div class="row">
                  <div class="col-md-4"><label>Full Name:</label></div>
                  <div class="col-md-8"><input type="text" class="form-control"  name="txtfname" placeholder="Enter Doctors Full Name"required></div><br><br>
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
</div>
<div class="col-md-1"></div>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" 
integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>   
</body>
</html>

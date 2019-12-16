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
  <?php echo $_SESSION['User']; ?>
  <div class="row">
    <div class="col-md-3">
    <div class="list-group">
    <a href="" class="list-group-item active" style="background-color:#C70039; 
    color:white;border-color:#C70039">Appoiments</a>
    <a href= "" class="list-group-item">pending admisson</a>
    <a href= "" class="list-group-item">Manage Doctors</a>
    <a href= "" class="list-group-item">Reports</a>
    <a href= "" class="list-group-item">Prescription</a>
    </div>
    <hr>
    <div class="list-group">
    <a href="" class="list-group-item active" style="background-color:#C70039; 
    color:white;border-color:#C70039">Stafff</a>
    <a href= "" class="list-group-item">Staff Details</a>
    <a href= "" class="list-group-item">Add New Staff</a>
    <a href= "" class="list-group-item">Delete Staff</a>
  
    </div>
    </div>
<div class="col-md-8">
<div class="card">
    <div class="card-body" style="background-color:#C70039;color:pink;"></div>
    <div class="card-body"></div>

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
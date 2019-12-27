<?php

?> 
<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<!--<body style="background:url('Images/login.jpg') no-repeat; background-size:cover;">-->
<body>
<style>
  .pics {
    position: absolute;
    right: 10%; 
    top: 12%;
  
  }
  .frm{
    position: absolute;
    left: 13%; 
    top: 26%;
  }
</style>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <h1 style="color: #808281;">Asceso Hospitals</h1>
  <div class="collapse navbar-collapse" id="navbarColor03">
  </div>
</nav>

<div style="height: 100%; width: 100%" >
<div class="frm">
<div class="container" style="width:420px; top: 50%; bottom: 50%;" >
<div class="card bg-light mb-3">
<!--<img src="Images/index.jpg" class="card-card-top">-->
<div class="card-body ">
    
    <h2>Login</h2><br>
    <form class="form-group" method="POST" action="functions.php" >
        <label>Username :</label><br>
        <input type="text" name="txtusername" class="form-control" placeholder="Enter Username"><br>
        <label>Password :</label><br>
        <input type="text" name="txtpassword" class="form-control" placeholder="Enter Password"><br>
        <p class="text-center" style="color:red"> 
        </p>
        <div class="form-group">
        <input type="submit" name="loginbtn" class="btn btn-primary form-control" value="Login">
        </div>
    </form>
</div>
</div>
</div>

</div>
<div class="pics">

    <img src="Images/log.jpg" alt="medical staff image" style="width:500px;height:500px;"><br>
    <a style="font-size: 6px;" href="https://www.freepik.com/free-photos-vectors/people">People vector created by rawpixel.com - www.freepik.com</a>
    
    </div>
</div> <!--common div -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" 
integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>   
</body>
</html>
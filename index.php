<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body style="background:url('Images/login.jpg') no-repeat; background-size:cover;">
<div class="container" style="width:420px;margin-top:30px;">
<div class="card">
<img src="Images/index.jpg" class="card-card-top">
<div class="card-body">
    

    <form class="form-group" method="POST" action="functions.php" >
        <label>Username :</label><br>
        <input type="text" name="txtusername" class="form-control" placeholder="Enter Username"><br>
        <label>Password :</label><br>
        <input type="password" name="txtpassword" class="form-control" placeholder="Enter Password"><br>
        <p class="text-center" style="color:red"> 
        </p>
        <div class="form-group">
        <input type="submit" name="loginbtn" class="btn btn-primary" value="Login">
        </div>
    </form>
</div>
</div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" 
integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>   
</body>
</html>

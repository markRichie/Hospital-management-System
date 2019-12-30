<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "hospital_db");  
$query ="SELECT * FROM `front office clerk`";  
$result = mysqli_query($connect, $query);  
$query = "SELECT * FROM `front office clerk`";
// for method 
$result2 = mysqli_query($connect, $query);
$clerkid = "";


while($row2 = mysqli_fetch_array($result2))
{
    $clerkid = $clerkid."<option>$row2[0]</option>";
}
?>
<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="lib/bootstrap-datepicker.css" >
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
 <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
<link rel="stylesheet" href="jquery-timepicker/jquery.timepicker.min.css">
<script src="jquery-timepicker/jquery.timepicker.min.js"></script>
     
     <a class="nav-link" href="admin.php" style="color:white;"><i class="fa fa-signout"
     aria-hidden="true"></i>Back</a>

</head>
<body style="background-color:#3498DB;">
<div class="container" style="width:350px;margin-top:20px; float:left;" >
<div class="card">
<div class="card-body">
    <form class="form-group" action="callfunctions.php"  method="POST">
    <h4 align="center">Create Account</h4>  
    <br>
        <label>Select Clerk ID :</label><br>
        <select name="clerk_id"class="form-control">
        <option value="" disabled selected hidden>Select Clerk ID</option>
            <?php echo $clerkid;?>
        </select>
        <br>
        <label>Select Role :</label><br>
        <select name="clerk_role"class="form-control">
        <option value="clerk" >front office clerk</option>
        </select>
        <br>
        <label>Clerk Username</label><br>
        <input type="text" name="txtclerk_username" class="form-control" placeholder="Clerk Username"required><br>
    
        <label>Clerk Password</label><br>
        <input type="password" name="txtclerk_password" class="form-control" placeholder="Clerk Password"required><br>
       
        <input type="submit" name="registerclerk_btn" class="btn btn-primary" value="Register Account">
        </div>
        </div>
        </div>    
    </form>
    
</div>
</div>
</div>
<div class="container"  style="margin-top:20px; float:right;">
   <div class="card">
<div class="card-body">
                <h3 align="center">Registered Clerks</h3>  

                     <table id="appointment" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                               <td>Clerk ID</td>  
                                    <td>Clerk Name</td>  
                
                            
                               
                           
                               </tr>  
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo'  
                               <tr>  
                               <td>'.$row["c_id"].'</td>  
                               <td>'.$row["name"].'</td>  
                      
                               </tr>  
                               ';  
                          }  
                          
                          ?>  
                     </table>  
                </div>  
           </div>  
                         </div>
                         </div>

      </body>  
      <script>  
 $(document).ready(function(){  
      $('#appointment').DataTable();  
 });  
</script>
</html>

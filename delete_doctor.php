<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "hospital_db");  
$query ="SELECT * FROM doctor";  
$result = mysqli_query($connect, $query);  
$d_id = "";

// connect to mysql database
try{
    $connect = mysqli_connect("localhost", "root", "", "hospital_db");  
} catch (mysqli_sql_exception $ex) {
    echo 'Error';
}

// get values from the form
function getPosts()
{
    $posts = array();
    $posts[0] = $_POST['d_idtxt'];

    return $posts;
}

if(isset($_POST['delete']))
{
    $data = getPosts();
    $delete_Query = "DELETE FROM `doctor` WHERE `d_id` = $data[0]";
    try{
        $delete_Result = mysqli_query($connect, $delete_Query);
        
        if($delete_Result)
        {
            if(mysqli_affected_rows($connect) > 0)
            {
                echo 'Data Deleted';
            }else{
                echo 'Data Not Deleted';
            }
        }
    } catch (Exception $ex) {
        echo 'Error Delete '.$ex->getMessage();
    }
}
?>
<!DOCTYPE Html>
<html>
    <head>
    <a class="nav-link" href="admin.php" style="color:black;"><i class="fa fa-signout"
     aria-hidden="true"></i>Back</a>
    
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
      </head>  
    
    </head>
<body><div class="container" style="width:350px;margin-top:50px; float:center;" >
<div class="card">
<div class="card-body">
        <form class="form-group" action="delete_doctor.php" method="post">
        <label>Enter Doctor ID</label><br>
            <input type="text" name="d_idtxt" placeholder="Id" value="  <?php if(isset($d_id)){echo $d_id;}?>"><br><br>
            <div>
                <input type="submit" name="delete" value="Delete" class="btn btn-primary">
                <input type="submit" name="refresh" value="Refresh" class="btn btn-primary" onClick="window.location.href=window.location.href"> 

            </div>
        </form>
</div>
</div>
</div>
        <div class="container" action="functions.php" >  
                <h3 align="center">Registered Doctors</h3>  
                <br />  
                <div class="table-responsive">  
                     <table id="doctor_table" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td>Doctor ID</td>  
                                    <td>Full Name</td>  
                                    <td>Username</td>  
                               </tr>  
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo'  
                               <tr>  
                                    <td>'.$row["d_id"].'</td>  
                                    <td>'.$row["name"].'</td>  
    
                                   
                               </tr>  
                               ';  
                          }  
                          
                          ?>  
                     </table>  
                </div>  
           </div>  

    </body>
    <script>  
 $(document).ready(function(){  
      $('#doctor_table').DataTable();  
 });  
 </script>
</html>

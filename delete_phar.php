<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "hospital_db");  
$query ="SELECT * FROM `pharmacist`";  
$result = mysqli_query($connect, $query);  
$ph_id = "";

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
    $posts[0] = $_POST['ph_idtxt'];
    return $posts;
}

if(isset($_POST['delete']))
{
    $data = getPosts();
    $delete_Query = "DELETE FROM `pharmacist` WHERE `ph_id` = $data[0]";
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
        <form class="form-group" action="delete_phar.php" method="post">
        <label>Enter Pharmacist  ID</label><br>
            <input type="text" name="ph_idtxt" placeholder="Id" value="  <?php if(isset($ph_id)){echo $ph_id;}?>"><br><br>
            <div>
                <input type="submit" name="delete" value="Delete" class="btn btn-primary">
                <input type="submit" name="refresh" value="Refresh" class="btn btn-primary" onClick="window.location.href=window.location.href"> 

            </div>
        </form>
</div>
</div>
</div>
        <div class="container" action="functions.php" >  
                <h3 align="center">Registered Pharmacist</h3>  
                <br />  
                <div class="table-responsive">  
                     <table id="phar_table" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td>Pharmacist ID</td>  
                                    <td>Name</td>  
                        
                               </tr>  
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo'  
                               <tr>  
                                    <td>'.$row["ph_id"].'</td>  
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
      $('#phar_table').DataTable();  
 });  
 </script>

</html>
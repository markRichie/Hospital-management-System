<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "hmsdb");  
$query ="SELECT * FROM appointment";  
$result = mysqli_query($connect, $query);  
 ?>
<!DOCTYPE html>  
 <html>  
      <head>  
           <title>Test Table</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
      </head>  
      <body>  
           <br /><br />  
           <div class="container" action="func.php" >  
                <h3 align="center">Test Table</h3>  
                <br />  
                <div class="table-responsive">  
                     <table id="appointment" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td>appointment ID</td>  
                                    <td>Name</td>  
                                    <td>NIC</td>  
                                    <td>Contact</td>  
                                    <td>Date</td>  
                               
                           
                               </tr>  
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo'  
                               <tr>  
                                    <td>'.$row["a_id"].'</td>  
                                    <td>'.$row["Name"].'</td>  
                                    <td>'.$row["NIC"].'</td>  
                                    <td>'.$row["Contact"].'</td>  
                                    <td>'.$row["date"].'</td>  
                                   
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
      $('#appointment').DataTable();  
 });  
 </script>
 </html>  

 

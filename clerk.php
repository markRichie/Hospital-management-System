<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "hmsdb");  
$query ="SELECT * FROM `doctor`";  
$result = mysqli_query($connect, $query);  
$query = "SELECT * FROM `doctor`";
// for method 
$result2 = mysqli_query($connect, $query);
$options = "";
while($row2 = mysqli_fetch_array($result2))
{
    $options = $options."<option>$row2[1]</option>";
}
?>
<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="lib/bootstrap-datepicker.js"></script>
<link rel="stylesheet" type="text/css" href="lib/bootstrap-datepicker.css" >
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
 <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
<link rel="stylesheet" href="jquery-timepicker/jquery.timepicker.min.css">
<script src="jquery-timepicker/jquery.timepicker.min.js"></script>
  <script>
$(document).ready(function(){
    $('#time').timepicker({
        timeFormat: 'h:mm p',
        interval: 15,
        minTime: '10',
        maxTime: '6:00pm',
        startTime: '10:00',
        defaultTime: '11',
        scrollbar: true
    });
});</script>
	<script>
			$(function() {
			$('.dates #usr1').datepicker({
				'format': 'yyyy-mm-dd',
				'autoclose': true
			});
		});
   </script>      
     <a class="nav-link" href="logout.php" style="color:white;"><i class="fa fa-signout"
     aria-hidden="true"></i>Logout</a>

</head>
<body style="background-color:#3498DB;">
<div class="container" style="width:350px;margin-top:20px; float:left;" >
<div class="card">
<div class="card-body">
    <form class="form-group" action="functions.php"  method="POST">
        <label>Full Name :</label><br>
        <input type="text" name="txtfullname" class="form-control" placeholder="Enter Patients Full Name" required><br>
        <label>NIC :</label><br>
        <input type="text" name="txtNIC" class="form-control" placeholder="Enter Patients NIC"required><br>
        <label>Contact Number :</label><br>
        <input type="text" name="txtcontact" class="form-control" placeholder="Enter Patients Phone Number"required><br>
        <div class="dates" class="form-control">
        <label>Choose Date</label>
        <input type="text" class="form-control" id="usr1" name="event_date" placeholder="YYYY-MM-DD" autocomplete="off" required>
        <br>
        <label>Select Time:</label><br>
        <input type="text" class="form-control" id="time" name="txttime">
        <br>
        <label>Select Doctor:</label><br>
        <select name="valuedoctors"class="form-control">
        <option value="" disabled selected hidden>Select Doctor</option>
            <?php echo $options;?>
        </select>
        <br>
        <label>Doctor ID</label><br>
        <input type="text" name="txtdocid" class="form-control" placeholder="Enter Doctors ID from the Table"required><br>
        <div class="dates" class="form-control">
        <div class="form-group">
        <input type="submit" name="appointmentbtn" class="btn btn-primary" value="Book Appointment">
        <input type="submit" name="tablebtn" formnovalidate class="btn btn-primary" value="View Appoinments">
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
                <h3 align="center">Registered Doctors</h3>  

                     <table id="appointment" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                               <td>Doctor ID</td>  
                                    <td>Doctor Name</td>  
                                    <td>Fees</td>  
                            
                               
                           
                               </tr>  
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo'  
                               <tr>  
                               <td>'.$row["d_id"].'</td>  
                               <td>'.$row["name"].'</td>  
                               <td>'.$row["fees"].'</td>   
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
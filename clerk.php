
<?php
session_start();



?>
<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="lib/bootstrap-datepicker.js"></script>
	<link rel="stylesheet" type="text/css" href="lib/bootstrap-datepicker.css" >
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script>
			$(function() {
			$('.dates #usr1').datepicker({
				'format': 'yyyy-mm-dd',
				'autoclose': true
			});
		});
   </script>                    
</head>
<div class="container" style="width:420px;margin-top:30px;">
<div class="card">
<div class="card-body">
    <form class="form-group" action="functions.php"  method="POST">
        <label>Full Name :</label><br>
        <input type="text" name="txtfullname" class="form-control" placeholder="Enter Patients Full Name"><br>
        <label>NIC :</label><br>
        <input type="text" name="txtNIC" class="form-control" placeholder="Enter Patients NIC"><br>
        <label>Contact Number :</label><br>
        <input type="text" name="txtcontact" class="form-control" placeholder="Enter Patients Phone Number"><br>
        <div class="dates" class="form-control">
        <label>Choose Date</label>
        <input type="text" class="form-control" id="usr1" name="event_date" placeholder="YYYY-MM-DD" autocomplete="off" >
        <br>
        <label>Time</label><br>
        <input type="text" name="txttime" class="form-control" placeholder="Enter Appointment Time"><br>
        <br>
        
        
        <div class="form-group">
        <input type="submit" name="appointmentbtn" class="btn btn-primary" value="Add">
        </div>
        </div>
        </div>    
        </br>
       
    </form>
</div>
</div>
</div>
</body>
</html>

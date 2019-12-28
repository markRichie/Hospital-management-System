
<?php
//session_start();
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
        timepicker: true,
				'format': 'yyyy-mm-dd',
				'autoclose': true
			});
		});
   </script>                    

<div class="modal" id="new_history">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New record</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

    <form class="form-group" action="functions.php"  method="POST">
    <label>NIC :</label><br>
    <input type="text" name="txtNIC" class="form-control" placeholder="Enter Patients NIC"required>
    <input type="submit" name="chk_nic" class="btn btn-primary" value="search">
    </form>
    <form class="form-group" action="functions.php"  method="POST">
        
        <label>Full Name :</label>
        <input type="text" name="txtfullname" class="form-control" placeholder="Enter Patients Full Name" required>
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
        
        <select name="valuedoctors"class="form-control">
        <option value="" disabled selected hidden>Select Doctor</option>
            <?php echo $options;?>
        </select>
        <br><br><br>
        <div class="form-group">
        <input type="submit" name="appointmentbtn" class="btn btn-primary" value="Add">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
        </div>    
    </form>
    



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


<?php
//session_start();
$connect = mysqli_connect("localhost", "root", "", "hospital_db");  
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
        
        <label>Full Name :</label>
        <input type="text" name="txtfullname" class="form-control" placeholder="Enter Patients Full Name" required>
        <label>NIC :</label><br>
        <input type="text" name="txtNIC" class="form-control" placeholder="Enter Patients NIC"required><br>
        <label>Contact Number :</label><br>
        <input type="text" name="txtcontact" class="form-control" placeholder="Enter Patients Phone Number"required><br>
        <label>Age: </label><br>
        <input type="text" name="txtage" class="form-control" placeholder="Enter Patients age"required><br>

        <div class="dates" class="form-control">
        <label>Date</label>
        <input type="text" class="form-control" id="usr1" name="event_date" placeholder="YYYY-MM-DD" autocomplete="off" required>
        <br>
            <label for="exampleSelect1">Select Time</label>
            <select class="form-control" id="exampleSelect1" name="atime">
                <option>3.00</option>
                <option>4.00</option>
                <?php if(1==1){
                    //echo"<option>4.25</option>";
                }?>
                <option>5.00</option>
                <option>6.00</option>
                <option>7.00</option>
                <option>8.00</option>
            </select>
        <br>
        
        <select name="valuedoctors" class="form-control">
        <option value="" disabled selected hidden >Select Doctor</option>
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


        <div class="modal" id="new_istory">
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
        <input type="text" name="txtNIC" class="form-control" placeholder="Enter Patients NIC"required><br>
        
        <div class="dates" class="form-control">
        <label>Date</label>
        <input type="text" class="form-control" id="usr1" name="event_date" placeholder="YYYY-MM-DD" autocomplete="off" required>
        <br>
            <label for="exampleSelect1">Select Time</label>
            <select class="form-control" id="exampleSelect1" name="atime">
                <option>3.00</option>
                <option>4.00</option>
                <?php if(1==1){
                    //echo"<option>4.25</option>";
                }?>
                <option>5.00</option>
                <option>6.00</option>
                <option>7.00</option>
                <option>8.00</option>
            </select>
        <br>
        
        <select name="valuedoctors" class="form-control">
        <option value="" disabled selected hidden >Select Doctor</option>
            <?php echo $options;?>
        </select>
        <br><br><br>
        <div class="form-group">
        <input type="submit" name="appointbtn" class="btn btn-primary" value="Add">
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

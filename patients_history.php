<?php 
session_start();
//echo $_SESSION['color']; 
?> 

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Hello, world!</title>
    <style>
      .headg{
        margin-left: 30px;
        margin-right: 30px;
      }
      h1{
        margin-top: 20px;
        margin-bottom: 20px;
      }
      #ph{
        margin-top: 5px;
      }
      #nw{
        margin-bottom: 20px;
      }
      #qty{
        width: 50%;
        margin-left: 20px;
      }
    </style>
    <script>
      function al(){
        modal.style.display = "block";
      }
      function tr(){
        //alert("voila")
      var url_string = window.location.href;
      var url = new URL(url_string);
      var c = url.searchParams.get("id");
      console.log(c);

        window.location.href="http://localhost/MSS/reports?id="+c;
      }
      function insertParam(key, value)
      {
        key = encodeURI(key); value = encodeURI(value);
        var kvp = document.location.search.substr(1).split('&');

        var i=kvp.length; var x; while(i--) 
        {
            x = kvp[i].split('=');

            if (x[0]==key)
            {
                x[1] = value;
                kvp[i] = x.join('=');
                break;
            }
        }

        if(i<0) {kvp[kvp.length] = [key,value].join('=');}

        //this will reload the page, it's likely better to store this until finished
        document.location.search = kvp.join('&'); 
      }
    </script>
  </head>
  <body>
    <?php 
        $somevar = $_GET["id"]; 
        $conn = mysqli_connect("localhost", "root", "","hospital_db");
        $query = mysqli_query($conn,"select * from patient where NIC='$somevar'");
        
        $num = 1;
            while ($row = mysqli_fetch_array($query)) {

                $name = $row['name'];
                $age = $row['age'];
                $num++;
            }
    
    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <h5 style="color: #808281;">Asceso Hospitals</h5>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor03">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#"><span class="sr-only">(current)</span></a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <button class="btn btn-info my-2 my-sm-0" type="submit">Sign out</button>
      </form>
    </div>
  </nav>
  <div class="headg" >
    <h1>Patients History</h1>
    <div class="alert alert-dismissible alert-info">
    <?php echo"<strong>Name : ".$name."</strong>";
    echo"<p>Age : ".$age."</p>"; ?>
    </div>
    
    <button type="button" id="nw" class="btn btn-info" data-toggle="modal" data-target="#tst">New</button>
    <button type="button"  id="nw" class="btn btn-info" onclick="tr()">View reports</button>

        <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">num</th>
            <th scope="col">Date</th>
            <th scope="col">Symtoms</th>
            <th scope="col">Diagnosis</th>
            <th scope="col">Change details</th>
            <th scope="col">Remarks</th>
            </tr>
        </thead>
        <!-- replace php code with config when common database-->
        <tbody>
            <?php
            //$somevar = "123456789v";
            //$conn = mysqli_connect("localhost", "root", "","hospital_db");
            $query = mysqli_query($conn,"select * from patient_history where NIC='$somevar'");

            $num = 1;
            while ($row = mysqli_fetch_array($query)) {
                echo"<tr>";
                echo"<td>".$num."</td>";
                echo"<td>".$row['date_Time']."</td>";
                echo"<td>".$row['symtoms']."</td>";
                echo"<td>".$row['Diagnosis']."</td>";
                echo"<td>".$row['change details']."</td>";
                echo"<td>".$row['remarks']."</td>";
                echo"</tr>";
                $num++;
            }
            ?>
        </tbody>
        </table> 
    </div>
    

    <form class="form-group" action="functions.php"  method="POST">
        <div class="modal" id="tst">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New record</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                            <?php echo"<input type='hidden' name='nic' value='$somevar'>"; ?>
                            <h6>Symtoms</h6>
                            <textarea class="form-control" name="sytm" id="exampleTextarea" rows="3"></textarea>
                            <h6>Diagnosis</h6>
                            <textarea class="form-control" name="dia" id="exampleTextarea" rows="3"></textarea>
                            <h6>Change details</h6>
                            <textarea class="form-control" name="c_d" id="exampleTextarea" rows="3"></textarea>
                            <h6>Remarks</h6>
                            <textarea class="form-control" name="rmks" id="exampleTextarea" rows="3"></textarea><br>
                            <h6>Reports</h6>
                            <input type="text" class="form-control" name="rType" id="staticEmail" placeholder="report type"><br>
                            <h6>Prescription</h6>
                            <table>
                            <tr>
                            <td><input type="text" class="form-control" name="mt" id="med" placeholder="medicine"></td>
                            <td><input type="text" class="form-control" name="qt" id="qty" placeholder="qty"></td>
                            </tr>
                            <tr>
                            <td><input type="text" class="form-control" name="mt1"  id="med" placeholder="medicine"></td>
                            <td><input type="text" class="form-control" name="qt1" id="qty" placeholder="qty"></td>
                            </tr>
                            <tr>
                            <td><input type="text" class="form-control" name="mt2"  id="med" placeholder="medicine"></td>
                            <td><input type="text" class="form-control" name="qt2" id="qty" placeholder="qty"></td>
                            </tr>
                            <tr>
                            <td><input type="text" class="form-control" name="mt3"  id="med" placeholder="medicine"></td>
                            <td><input type="text" class="form-control" name="qt3" id="qty" placeholder="qty"></td>
                            </tr>
                            </table>
                  
                            
                            
            </div>  
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="add_history">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>
    </form>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
<?php 
session_start();

$somevar = $_GET["id"];
$rle = $_SESSION["idi"];
$prsn = $_SESSION["role"];
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

    </script>
  </head>
  <body>
    <?php 
        /*$somevar = $_GET["id"]; 
        $conn = mysqli_connect("localhost", "root", "","hospital_db");
        $query = mysqli_query($conn,"select * from patient where NIC='$somevar'");
        
        $num = 1;
            while ($row = mysqli_fetch_array($query)) {

                $name = $row['name'];
                $age = $row['age'];
                $num++;
            }
    */
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
            <button class="btn btn-info my-2 my-sm-0">Sign out</button>
          </form>
        </div>
    </nav>
  <div class="headg" >
    <h1>Reports</h1>
    <div class="alert alert-dismissible alert-info">
    <strong>welcome!</strong>
    <p></p>
    </div>
    
    <?php
    if($prsn == "lab_technician"){
    echo"<button type='button' id='nw' class='btn btn-info' data-toggle='modal' data-target='#new_history'>New</button>";
    }
    ?>

        <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">no</th>
            <th scope="col">Type</th>
            <th scope="col">results</th>
            <th scope="col">sample received date</th>
            <th scope="col">sample tested date</th>
            <th scope="col">Remarks</th>
            <th scope="col">link</th>
            </tr>
        </thead>
        <!-- replace php code with config when common database-->
        <tbody>
            <?php
            //$somevar = "123456789v";
            $conn = mysqli_connect("localhost", "root", "","hospital_db");
            $query = mysqli_query($conn,"select * from report");

            $num = 1;
            while ($row = mysqli_fetch_array($query)) {
                echo"<tr>";
                echo"<td>".$num."</td>";
                echo"<td>".$row['type']."</td>";
                echo"<td>".$row['results']."</td>";
                echo"<td>".$row['s_received_date']."</td>";
                echo"<td>".$row['s_tested_date']."</td>";
                echo"<td>".$row['technician_remarks']."</td>";
                echo"<td>".$row['link_to_softcopy']."</td>";
                echo"</tr>";
                $num++;
            }
            ?>
        </tbody>
        </table> 
    </div>
    

    <form class="form-group" action="functions.php"  method="POST">
        <div class="modal" id="new_history">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New report</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                            <?php echo"<input type='hidden' name='nic' value='$somevar'>";
                                  echo"<input type='hidden' name='td' value='$rle'>"; ?>
                            <h6>Type</h6>
                            <textarea class="form-control" name="type" id="exampleTextarea" rows="2"></textarea>
                            <h6>results</h6>
                            <textarea class="form-control" name="rslts" id="exampleTextarea" rows="3"></textarea>
                            <h6>Sample received Date</h6>
                            <input type="text" class="form-control" name="r_date" id="staticEmail" placeholder="YYYY-MM-DD" ><br>
                            <h6>Sample Tested Date</h6>
                            <input type="text" class="form-control" name="t_date" id="staticEmail" placeholder="YYYY-MM-DD" ><br>
                            <h6>Remarks</h6>
                            <input type="text" class="form-control" name="remarks" id="staticEmail" placeholder="report type"><br>
                            <h6>Fees</h6>
                            <input type="text" class="form-control" name="fees" id="staticEmail" placeholder="report type"><br>
                            <h6>link to softcopy</h6>
                            <input type="text" class="form-control" name="link" id="staticEmail" ><br>
                            
                            
            </div>  
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="add_report">Save changes</button>
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
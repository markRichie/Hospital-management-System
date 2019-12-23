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
    </style>
    <script>
      function al(){
        modal.style.display = "block";
      }
      function tr(uid){
        //alert("voila")
        window.location.href="http://localhost/MSS/reports.php?id="+uid;
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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#" >Aeso Hospital</a>
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
    <h1>Report requests</h1>
    <div class="alert alert-dismissible alert-info">
    <strong>Lab technician : </strong>
    <p>number of report request : </p>
    </div>


    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Patient no</th>
          <th scope="col">Patient Name</th>
          <th scope="col">Type of report requested </th>
          <th scope="col"></th>
        </tr>
      </thead>
      <!-- replace php code with config when common database-->
      <tbody>
        <?php

          $conn = mysqli_connect("localhost", "root", "","hospital_db");
          $query = mysqli_query($conn,"select * from patient_history where r_type IS NOT NULL");
          //echo $query;
          

          $num = 1;
          while ($row = mysqli_fetch_array($query)) {
            echo"<tr>";
              echo"<td>".$num."</td>";
              echo"<td>".$row['NIC']."</td>";
              echo"<td>".$row['r_type']."</td>";
              echo"<form method='post' action=".$_SERVER['PHP_SELF'].">";
              echo"<input type='hidden' id=".$num." value=".$num.">";
              echo"<td><button type='button' id=".$row['NIC']." class='btn btn-info' onclick='tr(this.id)'>create report</button></td>";
              echo"</form>";
            echo"</tr>";
            $num++;
          }
        ?>
      </tbody>
    </table> 
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
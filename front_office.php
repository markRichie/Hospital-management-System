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
        margin-bottom: 10px;
      }
      #sr{
        margin-right: 10px;
      }
      #ct{
        overflow: hidden;
        width: 100%;
      }
    </style>
    <script>
      function al(){
        modal.style.display = "block";
      }
      function tr(uid){
        //alert("voila")
        window.location.href="http://localhost/MSS/patients_history.php?id="+uid;
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
    <h1>Appointments</h1>

    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="appointment.php">Appointments</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="appointment.php">Admisions</a>
        </li>
    </ul>

  </div>
 </body>
</html>
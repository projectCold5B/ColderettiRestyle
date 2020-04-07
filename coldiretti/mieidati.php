<?php
require 'php/db.php';
$db = new database;
require 'php/obj.php';
$obj= new objectclass;
$U=$db->CheckLog();
if(!$U){
  echo "<script>alert('effettua il login');</script>".file_get_contents("index.php");}
 ?>

<html lang="it">
<head>
  <title>I miei dati</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/navbar.css">
  <link rel="stylesheet" href="css/sidenav.css">
  <link rel="stylesheet" href="css/footer.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<?php 
  $obj->Navbar($U);
?>

  <div class="container-fluid text-center">
    <div class="row content">
      <div class="col-sm-2 sidenav">
        <p><a href="#">Link</a></p>
        <p><a href="#">Link</a></p>
        <p><a href="#">Link</a></p>
      </div>
    <div class="col-sm-8 text-left">
      <h1>I tuoi dati</h1><br>

  <table class="table table-bordered">
    <thead>
      <tr>
      <th>Nome</th>
      <th>Cognome</th>
      <th>Email</th>
      <th>Telefono</th>
      <th>Via</th>
      <th>Città</th>
      <th>Cap</th>
      <th>Password</th>
      </tr>
    </thead>

<?php
  // Check connection
  $connection=$db->Connect();
  if (!$connection) die(mysqli_connect_error());

  $query = "SELECT * FROM clienti WHERE Email='$_SESSION[email]'";
  $result = mysqli_query($connection, $query);
  if (@mysqli_num_rows($result)==1) {
  // output
  while($row = $result->fetch_assoc()) {
  echo "<tr><td>" . $row["Nome"]. "</td><td>" . $row["Cognome"] . "</td><td>" . $row["Email"]. "</td><td>". $row["Telefono"]. "</td><td>" . $row["Via"]. "</td><td>". $row["Citta"]. "</td><td>". $row["CAP"]. "</td><td><a href='CambiaPassword_form.php' >Cambia Password</a></td></tr>";
  }
  echo "</table></div>";
  }
  else
  echo "0 results";

  $db->Disconnect($connection);
?>
    <div class="col-sm-2 sidenav">
      <div class="well">
        <p>ADS</p>
      </div>
      <div class="well">
        <p>ADS</p>
      </div>
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>

</body>
</html>

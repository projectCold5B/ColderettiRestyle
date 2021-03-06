<?php
require 'php/db.php';
$db = new database;
require 'php/obj.php';
$obj= new objectclass;
$U=$db->CheckLog();
if(!$U)
  echo "<script>alert('effettua il login');</script>".file_get_contents("index.php");
?>

<!DOCTYPE html>
<html lang="it">
<head>
  <title>I Miei Ordini</title>
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
      <h1>I tuoi ordini</h1>
      <p>In questa pagina puoi consultare la lista dei tuoi precedenti ordini</p>

       <?php

       //connessione al db
       $connection=$db->Connect();
       if (!$connection) die(mysqli_connect_error());

       $query = "SELECT * FROM ordini WHERE EmailCliente='$_SESSION[email]'";
       $result = mysqli_query($connection, $query);
       if (@mysqli_num_rows($result)>=1) {
       // output
       while($row = $result->fetch_assoc()) {
       echo "
             <table class='table table-bordered'>
               <thead>
                 <tr>
                   <th>Id ordine</th>
                   <th>Data Ordine</th>
                   <th>Data Consegna </th>
                   <th>Note</th>
                </tr>
              </thead>
             <tr><td>" . $row["IDOrdine"]. "</td><td>" . $row["DataOrdine"] . "</td><td>" . $row["DataConsegnaPrevista"]. "</td><td>".$row["Note"]. "</td></tr>";
       }
       echo "</table></div>";
       }
       else
       {
         echo "</table><p>Non hai ancora effettuato un ordine, clicca <a href='nuovoOrdine.php'>QUI</a> per effettuarne uno</p></div>";
       }

       //disconnessione dal db
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

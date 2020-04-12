<?php
require 'php/db.php';
$db = new database;
require 'php/obj.php';
$obj= new objectclass;
$U=$db->CheckLog();
if(!$U)
  echo "<script>alert('effettua il login');</script>".file_get_contents("index.php");





if(isset($_POST['number_remove'])) {  

$i=$_POST['number_remove'];
$tina=count($_SESSION['cart']);

$_SESSION['cart'][$i]=$_SESSION['cart'][($tina-1)];
unset($_SESSION['cart'][($tina-1)]);
 echo "<script>alert('elemento rimosso');</script>";
    
} 
?>

<!DOCTYPE html>
<html lang="it">
<head>
  <title>Nuovo ordine</title>
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
      <h1>Nuovo ordine</h1>
      <p>In questa pagina puoi effettuare un nuovo ordine</p>
      <div class="w-100 container-fluid">


       <?php

       $max=sizeof($_SESSION['cart']);
       if ($max>=1) {

      for($i=0; $i<$max; $i++){ 
             echo "<form method='post' id='".$_SESSION['cart'][$i][0]."' action='".htmlentities($_SERVER['PHP_SELF'])."' >
  <div class='card' style=' border :1px solid rgba(0,0,0,.125);'>
  <input type='hidden' name='Nome' value='".$_SESSION['cart'][$i][0]."'>
  <input type='hidden' name='number_remove' value='".$i."'>


  <h5 class='card-title'>".$_SESSION['cart'][$i][0]." - quantita : ".$_SESSION['cart'][$i][1]."</h5>
  <div class='card-body' style='display:flex;flex-direction:row-reverse'>
    <input  class='btn' type='submit' value='Rimuovi'>



  </div>
  </div></form>";
        }
    
       }
       else
       {
         echo "</table><p>Non ci sono prodotti nel carrello</form>";
       }

       //disconnessione dal db
      
       ?>
</div></div>
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

<?php
require 'php/db.php';
$db = new database;
require 'php/obj.php';
$obj= new objectclass;
$U=$db->CheckLog();
if(!$U)
  echo "<script>alert('effettua il login');</script>".file_get_contents("index.php");






if ($_SERVER["REQUEST_METHOD"] == "POST") {


  if($U){

if(isset( $_REQUEST['Nome'])&&isset( $_REQUEST['quantity']) )
 $name = $_REQUEST['Nome'];
$quantity = $_REQUEST['quantity'];
    if(isset($_SESSION['cart']))
      {


       $q= count($_SESSION['cart']);
       $Modify=false;
       for($i=0; $i<$q; $i++) { 


  if($_SESSION['cart'][$i][0]==$name){
        $_SESSION['cart'][$i][1]+=$quantity;
        $Modify=true;
        $R=false;
        }


}
        if( $Modify==false){
        

            $_SESSION['cart'][$q]=array();

           array_push($_SESSION['cart'][$q],$name,$quantity);
           echo "<script>alert('nuovo item aggiunto');</script>";
        }
        else
          echo "<script>alert('eseguito');</script>";

       
      }
  }

  else
  {
 echo "<script>alert('Effettua il login);   </script>";
                 
  }
    // collect value of input field
   
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

       //connessione al db
       $connection=$db->Connect();
       if (!$connection) die(mysqli_connect_error());

       $query = "SELECT Nome FROM prodotti";

       $result = mysqli_query($connection, $query);
       if (@mysqli_num_rows($result)>=1) {

        while ($c=mysqli_fetch_array($result)) {
             echo "<form method='post' id='".$c[0]."' action='".htmlentities($_SERVER['PHP_SELF'])."' >
  <div class='card' style=' border :1px solid rgba(0,0,0,.125);'>
  <input type='hidden' name='Nome' value='".$c[0]."'>

  <h5 class='card-title'>".$c[0]."</h5>
  <div class='card-body' style='display:flex;flex-direction:row-reverse'>
    <input  class='btn' type='submit' value='aggiungi'>
  <input style='width:40px' type='number' id='quantity' name='quantity' min='0' max='10' step='1' value='1'>

  </div>
  </div></form>";
        }
    
       }
       else
       {
         echo "</table><p>Non ci sono prodotti disponibili</form>";
       }

       //disconnessione dal db
       $db->Disconnect($connection);
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

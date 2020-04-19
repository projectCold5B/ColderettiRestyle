<?php



require 'php/db.php';
$db = new database;

require 'php/obj.php';
$obj= new objectclass;


 ?>

<!DOCTYPE html>
<html lang="it">
<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/navbar.css">
  <link rel="stylesheet" href="css/carousel.css">
  <link rel="stylesheet" href="css/sidenav.css">
  <link rel="stylesheet" href="css/footer.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/homeAmministratore.css">
</head>
<body>

<?php

$obj->Navbar($db->CheckLog());

?>
  
<h1 class="hA">Home Amministratore</h1>
<p class="hA">Clicca sull'operazione da effettuare</p>
  <div class="hA">
    <a href="aggiungiProdotti.php">Modifica il catalogo</a>
  </div>
  <p class="hA">Aggiungi o rimuovi un prodotto dal catalogo</p>
  <div class="hA">
    <a href="ordiniInSospeso.php">Spedizioni effettuate</a>
  </div>
  <p class="hA">Visualizza tutti gli ordini attualmente in spedizione</p>
  <div class="hA">
    <a href="ordiniArrivati.php">Spedizioni completate</a>
  </div>
  <p class="hA">Visualizza tutti gli ordini consegnati ai clienti</p>
  <div class="hA">
    <a href="ordiniInAttesa.php">Spedizioni in attesa</a>
  </div>
  <p class="hA">Visualizza tutti gli ordini in attesa della spedizione</p>
<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>

</body>
</html>


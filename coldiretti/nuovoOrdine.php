<?php



require 'php/db.php';
$db = new database;

require 'php/obj.php';
$obj= new objectclass;
$U=$db->CheckLog();
if(!$U){
  echo "<script>alert('effettua il login');</script>".file_get_contents("index.php");

}
 ?>
<!DOCTYPE html>
<html lang="it">
<head>
  <title>Nuovo Ordine</title>
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
      <h1>Nuovo ordine</h1><br>

    <form action="/action_page.php">
      <table class="table table-bordered">
        <thead>
        <tr>
          <th>Prodotto</th>
          <th>Quantità</th>
          <th>Descrizione</th>
        </tr>
        </thead>
        <tr>
          <td><input type="checkbox" name="carote"><label for="carote">Carote</label><br></td>
          <td><input type="textbox" name="quantitàC" placeholder="Inserisci la quantità"></td>
          <td></td>
        </tr>
        <tr>
          <td><input type="checkbox" name="finocchi"><label for="finocchi">Finocchi</label><br></td>
          <td><input type="textbox" name="quantitàFi" placeholder="Inserisci la quantità"></td>
          <td></td>
        </tr>
        <tr>
          <td><input type="checkbox" name="uova"><label for="uova">Uova</label><br></td>
          <td><input type="textbox" name="quantitàU" placeholder="Inserisci la quantità"></td>
          <td></td>
        </tr>
        <tr>
          <td><input type="checkbox" name="banane"><label for="banane">Banane</label><br></td>
          <td><input type="textbox" name="quantitàB" placeholder="Inserisci la quantità"></td>
          <td></td>
        </tr>
         <tr>
          <td><input type="checkbox" name="mele"><label for="mele">Mele</label><br></td>
          <td><input type="textbox" name="quantitàM" placeholder="Inserisci la quantità"></td>
          <td></td>
        </tr>
         <tr>
          <td><input type="checkbox" name="fragole"><label for="fragole">Fragole</label><br></td>
          <td><input type="textbox" name="quantitàFr" placeholder="Inserisci la quantità"></td>
          <td></td>
        </tr>
         <tr>
          <td><input type="checkbox" name="iceberg"><label for="iceberg">Iceberg</label><br></td>
          <td><input type="textbox" name="quantitàI" placeholder="Inserisci la quantità"></td>
          <td></td>
        </tr>
         <tr>
          <td><input type="checkbox" name="arance"><label for="arance">Arance</label><br></td>
          <td><input type="textbox" name="quantitàA" placeholder="Inserisci la quantità"></td>
          <td></td>
        </tr>
      </table>
    </form>
    </div>

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

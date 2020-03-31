<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login script</title>
  </head>
  <body>
<?php

$tipoAccount=$_POST['tipoaccount'];
$nome=($_POST['nome']);
$cognome=($_POST['cognome']);
$cf=($_POST['Password']);
$email=($_POST['email']);
$dataNascita=($_POST['nascita']);
$telefono=($_POST['telefono']);
$specializzazione=($_POST['specializzazione']);


if ($nome==null||$cognome==null||$Password==null||$email==null||$dataNascita==null||$telefono==null)
  echo file_get_contents("index.html");
  else {
    autenticazione();
  }

function autenticazione()
{
  $host="localhost";
  $user_db="account1";
  $psw_db="";
  $db="utenti";

  global $tipoAccount, $nome, $cognome, $Password, $email, $dataNascita, $telefono, $specializzazione;

  $connection=mysqli_connect($host, $user_db, $psw_db, $db);
  if (!$connection) die(mysqli_connect_error());

  $query="INSERT INTO  () Username='$username' AND Password='$password'";
  $result=mysqli_query($connection, $query);
  if (@mysqli_num_rows($result)==1)
      echo file_get_contents("home.html");
    else
      echo "<center>Riprovare</center>".file_get_contents("index.html");
}
 ?>

</body>
</html>

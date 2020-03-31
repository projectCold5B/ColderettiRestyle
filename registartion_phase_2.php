<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Script conferma registrazione</title>
  </head>
  <body>
<?php
//Raccolgo dati dell'utente
$email=($_POST['email']);
$password=($_POST['password']);

//Controllo che i campi siano tutti pieni
if ($email==null||$password==null)
echo "Verifica che tutti i campi siano compilati". file_get_contents("index.html");
  else
  confermaRegistrazione();

function confermaRegistrazione()
{
  $host="localhost";
  $user_db="account1";
  $psw_db="";
  $db="coldiretti";

  global $email, $password;

  $connection=mysqli_connect($host, $user_db, $psw_db, $db);
  if (!$connection) die(mysqli_connect_error());

  $query="SELECT * FROM utenti WHERE Emai=$email AND Password=$password";

  $result=mysqli_query($connection, $query);
  if (@mysqli_num_rows($result)==1)
  {
    $query="UPDATE clienti SET Conferma=true WHERE Email=$email AND Password=$password";
    $result=mysqli_query($connection, $query);
    if ($result)
      echo file_get_contents("registrationConfirmed.html");
    else
      echo "<center>Si è verificato un errore. Riprovare</center>".file_get_contents("index.html");
  }
  else
    echo "<center>Email o password sbagliata. Riprovare</center>".file_get_contents("index.html");
}
 ?>

</body>
</html>

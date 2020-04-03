<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Script conferma registrazione</title>
  </head>
  <body>
<?php
require 'db.php';
$db = new database;
//Raccolgo dati dell'utente
$email=$_GET['email'];
$password=$_GET['password'];

//Controllo che i campi siano tutti pieni
if ($email==null||$password==null)
echo "<center>Si è verificato un errore, riprova o contatta l'assistenza</center>";
  else
  //Se i campi sono pieni allora avvia la funzione di conferma registrazione
  confermaRegistrazione();

function confermaRegistrazione()
{
  //parametri connessione database


  //rendo globali le variabili relative ai dati dell'utente
  global $email, $password;

  //mi connetto al database
  $connection=$db->Connect();

  //controllo che la connessione sia riuscita
  if (!$connection) die(mysqli_connect_error());

  //query di confronto tra i dati dell'utente e quelli nel database
  $query="SELECT * FROM utenti WHERE Emai=$email AND Password=$password";

  //scarico la query in result
  $result=mysqli_query($connection, $query);
  //se il risultato è positivo (match tra mail e password dell'utente e di una riga del database)...
    $db->Disconnect($connection);

  if (@mysqli_num_rows($result)==1)
  {
    //query per rendere attivo il profilo utente del cliente in questione
    $query="UPDATE clienti SET Conferma=true WHERE Email=$email AND Password=$password";
    //scarico la query in result
    $result=mysqli_query($connection, $query);
    //se la query è andata a buon fine allora...
    if ($result){
      $db->Clear($result);
      echo "<center><br><br><br>Registrazione confermata</center>";
    }
     //se la query non è andata a buon fine allora...
    else
      {
        $db->Clear($result);
        echo "<center>Si è verificato un errore. Riprovare</center>";
      }
  }
  //se non c'è il match allora...
  else
    echo "<center>Errore nella procedura, riprovare o contattare l'assistenza</center>";
}
 ?>

</body>
</html>

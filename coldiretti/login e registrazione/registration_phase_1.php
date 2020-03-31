<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login script</title>
  </head>
  <body>
<?php

//Raccolgo dati dell'utente
$nome=($_POST['nome']);
$cognome=($_POST['cognome']);
$email=($_POST['email']);
$telefono=($_POST['telefono']);
$indirizzo=($_POST['indirizzo']);
$password=($_POST['password']);
$confpassword=($_POST['confpass']);

//Controllo che i campi siano tutti pieni
if ($nome==null||$cognome==null||$email==null||$telefono==null||$password==null||$confpassword==null||$indirizzo==null)
echo "<center>Verifica che tutti i campi siano riempiti</center>".file_get_contents("index.html");
  else
  if($password!=$confpassword)
    echo "<center>Le due password non conincidono</center>".file_get_contents("index.html");
    else
    registrazione();

function registrazione()
{
  //parametri connessione database
  $host="localhost";
  $user_db="account1";
  $psw_db="";
  $db="Coldiretti";

  //rendo globali le variabili relative ai dati inseriti dall'utente
  global $nome, $cognome, $email, $telefono, $password, $indirizzo;

  //connessione al database
  $connection=mysqli_connect($host, $user_db, $psw_db, $db);
  if (!$connection) die(mysqli_connect_error());

  //query di inserimento dati
  $query="INSERT INTO utenti (nome, cognome,password,email,telefono,conferma, indirizzo) VALUES ($nome, $cognome,$email, $telefono, $password, false, '$indirizzo')";

  //lancio la query
  $result=mysqli_query($connection, $query);
  //se la query è andata a buon fine allora...
  if ($result)
      {
          //efinisco mittente e destinatario della mail
          $nome_mittente = "";
          $mail_mittente = "";
          $mail_destinatario = $email;

          //definisco il subject e il body della mail
          $mail_oggetto = "Conferma registrazione account Coldiretti";
          $mail_corpo = "
                          <center>
                            <h2>Conferma registrazione Coldiretti</h2>
                            <br><br><br>
                            <p>Clicca il il testo qui sotto per confermare la registrazione<p>
                            <br><br>
                            <a href='registration_phase_2.php?email='$email'&password='md5($password)''>Conferma</a>
                          </center>
                        ";

          //aggiusto un po' le intestazioni della mail
          //E' in questa sezione che deve essere definito il mittente (From)
          //ed altri eventuali valori come Cc, Bcc, ReplyTo e X-Mailer
          $mail_headers = "Da: ".$nome_mittente." <". $mail_mittente. ">\r\n";
          $mail_headers.= "No-Reply: ".$mail_mittente . "\r\n";
          $mail_headers.= "X-Mailer: PHP/" . phpversion();

          if (mail($mail_destinatario, $mail_oggetto, $mail_corpo, $mail_headers))
          echo "Messaggio inviato con successo a ".$mail_destinatario;
            else
              echo "Errore. Nessun messaggio inviato.";
      }
      //se la query non è andata a buon fine allora...
    else
      echo "<center>Si è verificato un errore nella registrazione. <br> Per favore, riprovare</center>".file_get_contents("index.html");
}
 ?>

</body>
</html>

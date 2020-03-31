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
$password=($_POST['password']);
$confpassword=($_POST['confpassword']);

//Controllo che i campi siano tutti pieni
if ($nome==null||$cognome==null||$email==null||$telefono==null||$password==null||$Confpassword==null)
echo "Verifica che tutti i campi siano riempiti" . file_get_contents("index.html");
  else
  if($password!=$confpassword)
    echo "Le due password non conincidono".file_get_contents("index.html");
    else
    registrazione();

function registrazione()
{
  $host="localhost";
  $user_db="account1";
  $psw_db="";
  $db="coldiretti";

  global $nome, $cognome, $email, $telefono, $password;

  $connection=mysqli_connect($host, $user_db, $psw_db, $db);
  if (!$connection) die(mysqli_connect_error());

  $query="INSERT INTO utenti (nome, cognome,password,email,telefono,conferma) VALUES ($nome, $cognome,$email, $telefono, $password, "false" )";

  $result=mysqli_query($connection, $query);
  if ($result)
      {
          //efinisco mittente e destinatario della mail
          $nome_mittente = "Mio nome";
          $mail_mittente = "Mia mail";
          $mail_destinatario = $email;

          //definisco il subject e il body della mail
          $mail_oggetto = "Conferma registrazione account Coldiretti";
          $mail_corpo = "<center>Congratulazioni!<br>Conferma l'iscrizione a Coldiretti cliccando qui e inserendo mail e password</center>";

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
    else
      echo "<center>Si è verificato un errore nella registrazione. <br> Per favore, riprovare</center>".file_get_contents("index.html");
}
 ?>

</body>
</html>

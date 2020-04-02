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
$confpassword=($_POST['confpass']);
$via=$_POST['via'];
$cap=$_POST['cap'];
$citta=$_POST['citta'];
$civico=$_POST['civico'];

//controllo che la mail non sia già stata usata
if (controlloMail($email)==false)
  echo "<center>Mail già utilizzata</center>".file_get_contents("registration.php");

//Controllo che i campi siano tutti pieni
if ($nome==null||$cognome==null||$email==null||$telefono==null||$password==null||$confpassword==null||$indirizzo==null||$via==null||$citta==null||$civico==null||$cap==null)
echo "<center>Verifica che tutti i campi siano riempiti</center>".file_get_contents("registration.php");
  else
  if($password!=$confpassword)
    echo "<center>Le due password non conincidono</center>".file_get_contents("registration.php");
    else
    registrazione();

function registrazione()
{
//richiamo alla classe database per la connessione
require 'db.php';
$db = new database;

  //rendo globali le variabili relative ai dati inseriti dall'utente
  global $nome, $cognome, $email, $telefono, $password, $citta, $civico, $via, $cap;

  //connessione al database
  $connection=$db->Connect();
  if (!$connection) die(mysqli_connect_error());

  //query di inserimento dati
  $query="INSERT INTO clienti (Nome, Cognome, Password, Email, Telefono, Conferma, Via, Ncivico, Citta, CAP) VALUES ($nome, $cognome,$password, $email, $telefono, false, $via, $civico, $citta, $cap)";

  //lancio la query
  $result=mysqli_query($connection, $query);
  //se la query è andata a buon fine allora...
  if ($result)
      {
          //efinisco mittente e destinatario della mail
          $nome_mittente = "Coldiretti";
          $mail_mittente = "Mail Coldiretti";
          $mail_destinatario = $email;

          //definisco il subject e il body della mail
          $mail_oggetto = "Conferma registrazione account Coldiretti";
          $mail_corpo = "
                          <html>
                          <head>
                          <title>Recupero password</title>
                          </head>
                          <body>
                          <center>
                            <h2>Conferma registrazione Coldiretti</h2>
                            <br><br><br>
                            <p>Clicca il testo qui sotto per confermare la registrazione<p>
                            <br><br>
                            <a href='registration_phase_2.php?email='$email'&password='md5($password)''>CONFERMA</a>
                          </center>
                          </body>
                          </html>
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

//funzione per verificare l'unicità della mail, ovvero che non sia già stata usata per la registrazione
function controlloMail($email)
{

  //richiamo alla classe database per la connessione
  require 'db.php';
  $db = new database;

   //connessione al database
   $connection=$db->Connect();
   if (!$connection) die(mysqli_connect_error());

   //query che cerca una mail già presente sul databse
   $query="SELECT * FROM clienti WHERE email=$email";
   $result=mysqli_query($connection, $query);
   if (@mysqli_num_rows($result)==1)
    return true;
   else
     return false;
}

 ?>

</body>
</html>
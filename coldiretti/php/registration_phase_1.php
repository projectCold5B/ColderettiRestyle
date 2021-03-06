<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login script</title>
  </head>
  <body>
<?php
//richiamo alla classe database per la connessione
require 'db.php';
$db = new database;

require 'checkmail.php';

//Raccolgo dati dell'utente
$nome=($_POST['nome']);
$cognome=addslashes(stripslashes($_POST["cognome"]));
$email=($_POST['email']);
$telefono=$_POST['telefono'];
$password=addslashes(stripslashes($_POST["password"]));
$confpassword=addslashes(stripslashes($_POST["confpass"]));
$via=addslashes(stripslashes($_POST["via"]));
$cap=$_POST['cap'];
$citta=addslashes(stripslashes($_POST["citta"]));

//controllo che la mail non sia già stata usata
if (controlloMail($email)==true)
{
  echo "<script>
        alert('Attenzione, mail già utilizzata');
        window.location.href = '../registration.php';
        </script>";
}
$check=chkEmail($email);
//controllo che la mail sia valida
if ($check==false)
{
  echo "<script>
        alert('Attenzione, utilizzare una mail valida');
        window.location.href = '../registration.php';
        </script>";
}

//Controllo che i campi siano tutti pieni
if ($nome==null||$cognome==null||$email==null||$telefono==null||$password==null||$confpassword==null||$via==null||$citta==null||$cap==null)
{
  echo "<script>
        alert('Verifica che tutti i campi siano compilati');
        window.location.href = '../registration.php';
        </script>";
}
  else
  if($password!=$confpassword)
    {
      echo "<script>
            alert('Attenzione, le due password non coincidono');
            window.location.href = '../registration.php';
            </script>";
    }
    else
    registrazione();

function registrazione()
{


  //rendo globali le variabili relative ai dati inseriti dall'utente
  global $nome, $cognome, $email, $telefono, $password, $citta, $via, $cap, $db;

  //connessione al database
  $connection=$db->Connect();
  if (!$connection) die(mysqli_connect_error());

  $password=md5($password);
  //query di inserimento dati
  $query="INSERT INTO clienti (Nome, Cognome, Password, Email, Telefono, Conferma, Via, Citta, CAP) VALUES ('$nome', '$cognome','$password', '$email', '$telefono', '0', '$via', '$citta', '$cap')";

  //lancio la query
  $result=mysqli_query($connection, $query);

  $db->Disconnect($connection);

  //se la query è andata a buon fine allora...
  if ($result)
      {
        //efinisco mittente e destinatario della mail
        $nome_mittente = "Coldiretti";
        $mail_mittente = "NONRISPONDERE@Coldiretti.IT";
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
                          <a href='morenomadeddu.it/php/registration_phase_2.php?email=".$email."&password=".$password."'>CONFERMA</a>

                        </center>
                        </body>
                        </html>
                      ";




        //aggiusto un po' le intestazioni della mail
        //E' in questa sezione che deve essere definito il mittente (From)
        //ed altri eventuali valori come Cc, Bcc, ReplyTo e X-Mailer
        $mail_headers = "From: ".$nome_mittente." <". $mail_mittente. ">\r\n";
        $mail_headers.= "No-Reply: ".$mail_mittente . "\r\n";
        $mail_headers.= "X-Mailer: PHP/" . phpversion() . "\r\n";
        $mail_headers .= "MIME-Version: 1.0\r\n";
        $mail_headers .= "Content-type: text/html; charset=iso-8859-1";

        if (mail($mail_destinatario, $mail_oggetto, $mail_corpo, $mail_headers))
        echo "Messaggio inviato con successo a ".$mail_destinatario;
          else
            echo "Errore. Nessun messaggio inviato.";
      }
      //se la query non è andata a buon fine allora...
    else
      echo "<center>Si è verificato un errore nella registrazione. <br> Per favore, riprovare</center>";
}

//funzione per verificare l'unicità della mail, ovvero che non sia già stata usata per la registrazione
function controlloMail($email)
{
  global $db;
   //connessione al database
   $connection=$db->Connect();
   if (!$connection) die(mysqli_connect_error());

   //query che cerca una mail già presente sul databse
   $query="SELECT * FROM clienti WHERE email='$email'";
   $result=mysqli_query($connection, $query);
   if (@mysqli_num_rows($result)==1){
    //$db->Clear($result);
        return true;
        $db->Disconnect($connection);
   }

   else{
     //$db->Clear($result);
     return false;
     $db->Disconnect($connection);
   }
}

 ?>

</body>
</html>

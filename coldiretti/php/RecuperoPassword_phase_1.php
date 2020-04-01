<!DOCTYPE html>
<html>
<head>
	<title>Recupero password</title>
</head>
<body>
<?php


//Recupero la mail tramite il metodo post
$mail_destinatario=POST_['email'];

//mi connetto al db
require 'db.php';
$db = new database;
$connection=$db->Connect();

//controllo che la mail sia presente sul db
$query="SELECT Email FROM clienti WHERE email='".$email."'";
$result=mysqli_query($connection, $query);

if(mysql_num_rows($result) == 1)
{
	//Creo la password temporanea e la inserisco come password per l'account che ha richiesto il recupero
	$PassTemporanea=GeneraPsw();
	$query1="UPDATE clienti SET password='".$passTemporanea."' WHERE email='".$mail_destinatario."'";

	//Definisco il nome e la mail del mittente
	$nome_mittente = "Coldiretti";
    $mail_mittente = "mail@coldiretti.com";

    //Definisco oggetto e corpo della mail
    $mail_oggetto = "Recupero password d'accesso Coldiretti";

    $mail_corpo = "
                <html>
                <head>
                <title>Recupero password</title>
                </head>
                <body>
                La tua nuova password è:".$PassTemporanea. "Effettua di nuovo l'accesso al sito utilizzando la password che ti abbiamo fornito. Successivamente cambiala con una più sicura.
                </body>
                </html>";
    
    $mail_headers = "From: " .  $nome_mittente . " <" .  $mail_mittente . ">\r\n";

    $mail_headers .= "MIME-Version: 1.0\r\n";
    $mail_headers .= "Content-type: text/html; charset=iso-8859-1";

    //Controllo che la mail sia stata inviata con successo
      if (mail($mail_destinatario, $mail_oggetto, $mail_corpo, $mail_headers))
         echo "<h2>Messaggio inviato con successo a " . $mail_destinatario."</h2>";
      
      else 
      	 echo "Errore. Nessun messaggio inviato. Verificare che l'indirizzo inserito sia corretto";
          
}



//Funzione che genera una password casuale di 10 caratteri
function GeneraPsw() {
	$lunghezza=10;
    $caratteri = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $stringaRandom = '';
    for ($i = 0; $i < $lunghezza; $i++) {
        $stringaRandom .= $caratteri[rand(0, strlen($caratteri) - 1)];
    }
    return $stringaRandom;
}
?>
</body>
</html>
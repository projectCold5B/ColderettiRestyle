<!DOCTYPE html>
<html>
<head>
	<title>Cambia Password</title>
</head>
<body>
<?php
Session_start();
//Prendo i dati inseriti nel form e li salvo in 3 variabili
$PassVecchia=POST_["passVecchia"];
$PassNuova=POST_["PassNuova"];
$ConfermaPass=POST_["confPassNuova"];

//Connessione al db
require 'db.php';
$db = new database;
$connection=$db->Connect();

//Tramite la sessione ricavo la mail dell'utente loggato che sta richiedendo il cambio password
$user = $_SESSION['email'];
$query="SELECT Password FROM clienti WHERE email='".$user."'";
//$result=mysqli_query($connection, $query);
$row = mysql_fetch_assoc($query);
$PassDB=$row['password'];

//Faccio 2 controlli:
//La password che l'utente ha inserito el primo campo del form è uguale a quella pesente nel db?;
//La nuova password e la conferma coincidono?

if($PassDB!=$PassVecchia || $PassNuova!=$ConfermaPass)
	echo "<center> Errore! Controlla che le nuove password coincidano e che la password vecchia sia scritta correttamente</center>".file_get_contents("../CambiaPassword.html");
//Aggiorno il campo password dell'utente
else 
	{
		$query1="UPDATE clienti SET password='".$PassNuova."' WHERE email='".$user."'";
		echo "Password cambiata con successo!"
	}
	
}

?>
</body>
</html>
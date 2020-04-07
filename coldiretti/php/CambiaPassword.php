<!DOCTYPE html>
<html>
<head>
	<title>Cambia Password</title>
</head>
<body>
<?php
Session_start();
//Prendo i dati inseriti nel form e li salvo in 3 variabili
$PassVecchia=md5($_POST["passVecchia"]);
$PassNuova=$_POST["passNuova"];
$ConfermaPass=$_POST["confPassNuova"];

//Connessione al db
require 'db.php';
$db = new database;
$connection=$db->Connect();

//Tramite la sessione ricavo la mail dell'utente loggato che sta richiedendo il cambio password
$user = $_SESSION['email'];
$query="SELECT password FROM clienti WHERE email='".$user."'";

$result=mysqli_query($connection, $query);



$row = mysqli_fetch_assoc($result);
$PassDB=$row['password'];

  	 $db->Clear($result);


//Faccio 2 controlli:
//La password che l'utente ha inserito el primo campo del form è uguale a quella pesente nel db?;
//La nuova password e la conferma coincidono?

if($PassDB!=$PassVecchia || $PassNuova!=$ConfermaPass){
	echo "<script> alert('Controlla che le nuove password coincidano e che la password vecchia sia scritta correttamente');   window.history.back();</script>";
$db->Disconnect($connection);
}
//Aggiorno il campo password dell'utente
else 
	{
	
		$query1="UPDATE clienti SET password='".md5($PassNuova)."' WHERE email='".$user."'";
		if($result=mysqli_query($connection, $query1)){
			echo "<script> alert('Password Cambiata Con Successo');    window.location.href = '../mieidati.php';</script>";
			$db->Disconnect($connection);
				 $db->Clear($result);
	}
}
		
	


?>
</body>
</html>
<?php


//file per la connessione del database


class database{


//Credenziali da impostare singolarmente sulla macchina, queste sono generiche
	private $dbhost = "localhost";
	private $dbuser = "root";
	private $dbpass = "";
	private $dbname = "coldiretti";





	public function Connect(){

		$conn = new mysqli($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
		if ($conn) {
			
			return $conn;

		} 
		else {
			die('Errore:' . $conn->connect_error);
		}

	}


public function login_session( $email,$password)
{
	if($this->CheckLog()){
		echo "<script>alert('Gia Loggato');  window.history.back();</script>";
	}
	else
	{



  $connection=$this->Connect();
  if (!$connection) die(mysqli_connect_error());

  $query="SELECT * FROM Clienti WHERE Email='$email' AND Password='$password'";
  $result=mysqli_query($connection, $query);
  if (@mysqli_num_rows($result)==1){
  	session_start();

  	 $_SESSION['email']=$email;
  	 echo "ok";
     return true;

    
  }
    else{
    	 return false;
    }
   

	}
}

public function CheckLog(){

	if (session_status() == 1)
	 {

 		 session_start();
   			 if (isset($_SESSION['email'])) 
   			 {
   			 
 			 return true;
			} 
	else
	{

   return false;
	}
   }

 
 }  

}
	?>
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

	}}
	?>
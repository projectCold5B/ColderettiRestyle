<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login script</title>
  </head>
  <body>
<?php

$email=$_POST['email'];
$password=$_POST['password'];

if ($email==null||$password==null)
  echo "</center>Attenzione, compilare tutti i campi<center>".file_get_contents("login.html");
  else {
    autenticazione();
  }

function autenticazione()
{

require '../php/db.php';
$db = new database;

  global $email;
  global $password;

  $connection=$db->Connect();
  if (!$connection) die(mysqli_connect_error());

  $query="SELECT * FROM credenziali WHERE Email='$email' AND Password='$password'";
  $result=mysqli_query($connection, $query);
  if (@mysqli_num_rows($result)==1)
      echo file_get_contents("index.html");
    else
      echo "<center>Riprovare</center>".file_get_contents("login.html");
}
 ?>

</body>
</html>

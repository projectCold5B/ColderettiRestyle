<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login script</title>
  </head>
  <body>
<?php

$username=$_POST['username'];
$password=md5($_POST['password']);

if ($username==null||$password==null)
  echo file_get_contents("index.html");
  else {
    autenticazione();
  }

function autenticazione()
{

  $host="localhost";
  $user_db="account1";
  $psw_db="";
  $db="utenti";

  global $username;
  global $password;

  $connection=mysqli_connect($host, $user_db, $psw_db, $db);
  if (!$connection) die(mysqli_connect_error());

  $query="SELECT * FROM credenziali WHERE Username='$username' AND Password='$password'";
  $result=mysqli_query($connection, $query);
  if (@mysqli_num_rows($result)==1)
      echo file_get_contents("home.html");
    else
      echo "<center>Riprovare</center>".file_get_contents("index.html");
}
 ?>

</body>
</html>

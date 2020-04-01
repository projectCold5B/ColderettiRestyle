<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login script</title>
  </head>
  <body>
<?php
require 'db.php';
$db = new database;
$email=$_POST['email'];
$password=$_POST['password'];

if ($email==null||$password==null)
  echo "</center>Attenzione, compilare tutti i campi<center>".file_get_contents("login.html");
  else {
   if($db->login_session($email,$password))
   {
  
       echo "<script>
alert('loggato');
   window.location.href = '../index.php ';
</script>";
   
   }
   else
   {
   echo "<script>
alert('riprova');
   window.location.href = '../index.php ';
</script>";

   }
  }

 ?>

</body>
</html>

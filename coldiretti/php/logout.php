
<?php 


require 'db.php';
$db = new database;

if($db->CheckLog()){


}

else{
echo "<script>alert('EFFETTUA IL LOGIN');   </script>";
                      echo "<script>
                       window.location.href = '../index.php ';
                         </script>";}
?>
	
<?php  

session_unset();
session_destroy();



 echo "<script>
alert('Logout completato');
    window.location.href = '../index.php ';
    </script>";



?>


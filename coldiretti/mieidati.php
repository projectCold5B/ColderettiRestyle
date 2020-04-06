<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<style>
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #588c7e;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<body>
<table>
<tr>
<th>Nome</th>
<th>Cognome</th>
<th>Email</th>
<th>Telefono</th>
<th>Via</th>
<th>Città</th>
<th>Cap</th>
<th>Password</th>
</tr>
<?php
Session_start();

require 'php/db.php';
$db = new database;

// Check connection
$connection=$db->Connect();
if (!$connection) die(mysqli_connect_error());

$query = "SELECT * FROM clienti WHERE Email='$_SESSION[email]'";
$result = mysqli_query($connection, $query);
if (@mysqli_num_rows($result)==1) {
// output
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["Nome"]. "</td><td>" . $row["Cognome"] . "</td><td>" . $row["Email"]. "</td><td>"."</td><td>" . $row["Telefono"]. "</td><td>"."</td><td>" . $row["Via"]. "</td><td>".
"</td><td>" . $row["Citta"]. "</td><td>"."</td><td>" . $row["CAP"]. "</td><td>"."</td><td>" . $row["Password"]. "</td><td>";
}
echo "</table>";
} else { echo "0 results"; }
$db->Disconnect($connection);
?>
</table>
</body>
</html>

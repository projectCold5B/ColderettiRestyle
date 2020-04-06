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
<th>Codice</th>
<th>Data Ordine</th>
<th>Data Consegna </th>
<th>Note</th>
<th>Stato</th>
</tr>
<?php
Session_start();

require 'php/db.php';
$db = new database;

$connection=$db->Connect();
if (!$connection) die(mysqli_connect_error());

$query = "SELECT * FROM ordini WHERE Email='$_SESSION[email]'";
$result = mysqli_query($connection, $query);
if (@mysqli_num_rows($result)>=1) {
// output
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["Codice"]. "</td><td>" . $row["DataOrdine"] . "</td><td>" . $row["DataConsegnaPrevista"]. "</td><td>"."</td><td>" . $row["Note"]. "</td><td>"."</td><td>";
}

echo "</table>";
} else { echo "0 results"; }
$db->Disconnect($connection);

?>
</table>
</body>
</html>

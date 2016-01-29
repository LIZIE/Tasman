<?php
$server = 'localhost';
$user = 'lizie';
$pass= '1234';
$db_name = 'tasman';


// Create connection
$conn = mysql_connect($server, $user, $pass);

// Check connection
if (!$conn) {
    die("Connection failed");
}

mysql_select_db($db_name);

$query = "DELETE FROM test WHERE id = ".$_GET['id'];
mysql_query($query);

header("Location: week3.php");

?>
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

$query = "SELECT * FROM test";
$result = mysql_query($query);
if ($result) {
	if (mysql_num_rows($result) > 0) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Student Data List</title>
    <link href="style.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body role="document">
<div class="container-fluid">
<h2 class="text-center">Student List</h2>
<table class="table table-striped">
	<colgroup>
		<col width="10%">
		<col width="20%">
		<col width="34%">
		<col width="20%">
		<col width="6%">
		<col width="10%">
	</colgroup>
	<thead>
		<tr class="warning">
			<th>ID</th>
			<th>Name</th>
			<th>Email</th>
			<th>Phone</th>
			<th colspan="2">Edit / Delete</th>
		</tr>
	</thead>
	<tbody>
<?php
		while($row = mysql_fetch_array($result)) {
			print "
		<tr>
			<td>".$row['id']."</td>
			<td>".$row['name']."</td>
			<td>".$row['email']."</td>
			<td>".$row['phone']."</td>
			<td><a href='edit.php?id=".$row['id']."'>
			<button type=\"button\" class=\"btn btn-primary btn-xs\">Edit</button>
			</a></td>
			<td><a href='delete.php?id=".$row['id']."'>
			<button type=\"button\" class=\"btn btn-danger btn-xs\">Delete</button>
			</a></td>
		</tr>
";
		}
?>
	</tbody>
</table>
<div class="add">
<a href="add.php">
 <button type="button" class="btn btn-warning">Add information</button>
 </a>
 </div>
<?php
	} else {
		echo 'empty';
	}
} else {
	echo 'no result';
}
?>
</div>
</body>
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

// Check for form submission
if (isset($_POST['edit'])) {
	$query = "UPDATE test SET name = '".$_POST['name']."', email = '".$_POST['email']."', phone = '".$_POST['phone']."' WHERE id = ".$_GET['id'];
	mysql_query($query);
	header("Location: week3.php");
}

$query = "SELECT * FROM test WHERE id = ".$_GET['id'];
$result = mysql_query($query);

if ($result) {
	$data = mysql_fetch_array($result);

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
<form method="POST" class="form-horizontal">
<h2 class="text-center">Edit</h2>
<div class="jumbotron">
	<div class="form-group">
		<label class="col-sm-1 control-label">Name</label>
		<div class="col-sm-11">
		<input type="text" name="name" value="<?php echo $data['name'];?>" class="form-control" id="inputPassword3"  />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-1 control-label">Email</label>
		<div class="col-sm-11">
		<input type="text" name="email" value="<?php echo $data['email'];?>"  class="form-control" id="inputPassword3" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-1 control-label">Phone</label>
		<div class="col-sm-11">
		<input type="text" name="phone" value="<?php echo $data['phone'];?>"  class="form-control" id="inputPassword3" />
		</div>
	</div>
	 <div class="form-group">
      <div class="text-center">
        <button type="submit" class="btn btn-info" name="edit" value="Edit">Edit</button>
      </div>
    </div>
</form>
</div>
</div>
</body>

<?php
} else {
	echo 'error';
}

?>
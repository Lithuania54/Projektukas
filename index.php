<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>LKL žaidėjų statistika</title>
</head>
<body>

	<a href="logout.php">Atsijungti</a>
	<a href="PRADINIS.html">Į pradinį</a>
	<h1>Prisijungei!</h1>

	<br>
	Sveikas prisijungęs, <?php echo $user_data['user_name']; ?>
</body>
</html>
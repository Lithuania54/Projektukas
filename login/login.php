<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LKL žaidėjų statistika</title>
  <meta name="description" content="kazka reiks sugalvot">
</head>
	<style type="text/css">
	
	#text{
		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{
		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
	}

	#box{
		background-color: black;
		margin: auto;
		width: 300px;
		padding: 20px;
	}

	#aaa{
		padding-top: 12%;
	}

	</style>

<header id="aaa"> 

</header>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Prisijungimas</div>

			<input id="text" type="text" name="user_name"><br><br>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Prisijungti"><br><br>

			<a href="signup.php">Registracija</a><br><br>
			<a href="PRADINIS.html">Į pradinį</a><br><br>
		</form>
	</div>
	
</body>
</html>

<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//pagrindinis
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//databaze
			$query = "select * from vartotojai where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "Neteisingas slapyvardis arba slaptažodis";
		}else
		{
			echo "Neteisingas slapyvardis arba slaptažodis";
		}
	}

?>
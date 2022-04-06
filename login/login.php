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
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LKL žaidėjų statistika</title>
  <meta name="description" content="kazka reiks sugalvot">
  <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.css">
  <link rel="stylesheet" href="css/stylesprisijungti.css">
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

	</style>

<main>
    <div style="padding: 3.5vw;">
      <div class="text-center">
        <img src="images/kamuolys.png" class="img-fluid rotate" alt="Pradinis logo">
      </div>
    </div>
    <div class="position-absolute top-50 start-50 translate-middle">
      <div class="card">
        <div class="card-body" style="width: 25rem;">
          <form class="px-4 py-3">
            <div class="mb-3">
              <label for="exampleDropdownFormEmail1" class="form-label">Slapyvardis</label>
              <input type="email" class="form-control" id="exampleDropdownFormEmail1" placeholder="Slapyvardis">
            </div>
            <div class="mb-3">
              <label for="exampleDropdownFormPassword1" class="form-label">Slaptažodis</label>
              <input type="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Slaptažodis">
            </div>
            <div class="mb-3">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="dropdownCheck">
                <label class="form-check-label" for="dropdownCheck">
                  Prisiminti
                </label>
              </div>
            </div>
            <button type="submit" class="btn btn-dark">Prisijungti</button>
          </form>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="REGISTRACIJA.html">Registracija</a>
          <a class="dropdown-item" href="#">Pamiršau salptažodį</a>
          <a class="dropdown-item" href="PRADINIS.html">Į pradinį</a>
        </div>
      </div>
    </div>
  </main>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Login</div>

			<input id="text" type="text" name="user_name"><br><br>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Login"><br><br>

			<a href="signup.php">Registracija</a><br><br>
			<a href="signup.php">Click to Signup</a><br><br>
		</form>
	</div>
	<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
   <script src="bootstrap-5.1.3-dist/js/bootstrap.bundle.js"></script>
	
</body>
</html>
<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

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
  <link rel="stylesheet" href="css2/statistika.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body>
  <div>    
    <header class="nav justify-content-center">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">
            <a class="nav-link" style="color: black; font-size: 20px; padding-left: 0%; padding-right: 2%;" href="index.php">PRADINIS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav"> 
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" style="color: black; font-size: 20px;" href="X.html" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    STATISTIKA
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="PERDAVIMAI2.php">Perdavimai</a></li>
                    <li><a class="dropdown-item" href="TASKAI2.php">Pelnomi taškai</a></li>
                    <li><a class="dropdown-item" href="KAMUOLIAI2.php">Atkovoti kamuoliai</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="GERIAUSI2.php">Sezono geriausi</a></li>
                  </ul>
                </li>
                <a href="index.php">
                    <img class="rotate" src="images/kamuolys.png" alt="Pradinis logo">
                  </a>
                <li class="nav-item">
                  <a class="nav-link" style="color: black; font-size: 20px;" href="PROFILIS.php">PROFILIS</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" style="color: black; font-size: 20px;" href="logout.php">ATSIJUNGTI</a>
                </li>
                <ul class="nav justify-content-end">
                </ul>
              </ul>
            </div>
          </div>
        </nav>
  </header>
  </div>

  <main>
    <h1>Pelnomi taškai</h1>
  </main>

  <table class="table">
    <thead>
      <tr>
        <th scope="col"></th>
        <th scope="col">Žaidėjas</th>
        <th scope="col">Komanda</th>
        <th scope="col">Rungtynės</th>
        <th scope="col">Suma</th>
        <th scope="col">Vidurkis</th>
      </tr>
    </thead>
    <tbody id="TASKAI">
      
    </tbody>
  </table>

  <footer>
    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-center">
        <li class="page-item"><a class="page-link btn-outline-dark" href="#" style="color: black;" >Į pradžią</a></li>
      </ul>
    </nav>
  </footer>

  <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
  <script src="bootstrap-5.1.3-dist/js/bootstrap.js"></script>
  <script src="scrapinam/TASKAI.js
  "></script>

</body>

</html>
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
	<title>Krepšinio namai - Lietuva</title>
    <meta name="description" content="kazka reiks sugalvot">
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="css2/lentele.css">
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
                      <li><a class="dropdown-item" href="LENTELE.php">Turnyrinė lentelė</a></li>
                    </ul>
                  </li>
                  <a href="index.php">
                    <img class="rotate" src="images/kamuolys.png" alt="Pradinis logo">
                  </a>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" style="color: black; font-size: 20px;" href="X.html" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      REKORDAI
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="REKORDAI.php">Pergalės</a></li>
                      <li><a class="dropdown-item" href="REKORDAI2.php">Taškai</a></li>
                    </ul>
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

        <caption><h1 class="header2">2021-2022 Sezono rungtynių rekordai</h1></caption>
    
	<main>
		<table class="table table-responsive-sm table-hover caption-top">
			<h1 class="header3">Taškai per rungtynes</h1>
				<thead>
					<tr style="background-color: #f5f5f4;">
						<th scope="col"></th>
						<th scope="col" style="text-align: center; font-size: 25px;">Vertė</th>
						<th scope="col" style="text-align: center; font-size: 25px;">Namų komanda</th>
						<th scope="col" style="text-align: center; font-size: 25px;">Svečių komanda</th>
						<th scope="col" style="text-align: center; font-size: 25px;">Data</th>
						<th scope="col" style="text-align: center; font-size: 25px;">Rezultatas</th>
					</tr>
				</thead>
			<tbody class="tbodytrys"></tbody>
		</table>
		<table class="table table-responsive-sm table-hover caption-top">
			<h1 class="header3">Laimėjimai didžiausiu skirtumu</h1>
			<thead>
			<tr style="background-color: #f5f5f4;">
				<th scope="col"></th>
				<th scope="col" style="text-align: center; font-size: 25px;">Vertė</th>
				<th scope="col" style="text-align: center; font-size: 25px;">Namų komanda</th>
				<th scope="col" style="text-align: center; font-size: 25px;">Svečių komanda</th>
				<th scope="col" style="text-align: center; font-size: 25px;">Data</th>
				<th scope="col" style="text-align: center; font-size: 25px;">Rezultatas</th>
			</tr>
			</thead>
		<tbody class="tbodypenki"></tbody>
		</table>
		<script>
			let http = new XMLHttpRequest();
			http.open('get', 'scrapinam/TPR.json', true);
			http.send();
			http.onload = function(){
				if(this.readyState == 4 && this.status == 200){
					let products = JSON.parse(this.responseText);
					let output = "";
					for(let item of products){
					output += `
						<tr>
							<td style="text-align: center; color:black; font-weight: bold;">
								<span style="padding: 3%; border-radius: 5px">${item.Nuopelnai}</span>
							</td>
							<td style="text-align: center; color:#15803d; font-weight: bold;">
								<span style="background-color: #dcfce7; padding: 1%; border-radius: 5px">${item.Verte}</span>
							</td>
							<td style="text-align: center; color:#991b1b; font-weight: bold;">
								<span style="background-color: #fee2e2; padding: 1%; border-radius: 5px">${item.Namukomanda}</span>
							</td>
							<td style="text-align: center; color:#991b1b; font-weight: bold;">
								<span style="background-color: #fee2e2; padding: 1%; border-radius: 5px">${item.Sveciukomanda}</span>
							</td>
							<td style="text-align: center; color:#991b1b; font-weight: bold;">
								<span style="background-color: #fee2e2; padding: 1%; border-radius: 5px">${item.Data}</span>
							</td>
							<td style="text-align: center; color:#991b1b; font-weight: bold;">
								<span style="background-color: #fee2e2; padding: 1%; border-radius: 5px">${item.Rezultatas}</span>
							</td>
						</tr>
					`;
					}
					document.querySelector(".tbodytrys").innerHTML = output;
				}
				let http = new XMLHttpRequest();
				http.open('get', 'scrapinam/LDS.json', true);
				http.send();
				http.onload = function(){
					if(this.readyState == 4 && this.status == 200){
						let products = JSON.parse(this.responseText);
						let output = "";
						for(let item of products){
						output += `
						<tr>
								<td style="text-align: center; color:black; font-weight: bold;">
									<span style="padding: 3%; border-radius: 5px">${item.Nuopelnai}</span>
								</td>
								<td style="text-align: center; color:#15803d; font-weight: bold;">
									<span style="background-color: #dcfce7; padding: 1%; border-radius: 5px">${item.Verte}</span>
								</td>
								<td style="text-align: center; color:#991b1b; font-weight: bold;">
									<span style="background-color: #fee2e2; padding: 1%; border-radius: 5px">${item.Namukomanda}</span>
								</td>
								<td style="text-align: center; color:#991b1b; font-weight: bold;">
									<span style="background-color: #fee2e2; padding: 1%; border-radius: 5px">${item.Sveciukomanda}</span>
								</td>
								<td style="text-align: center; color:#991b1b; font-weight: bold;">
									<span style="background-color: #fee2e2; padding: 1%; border-radius: 5px">${item.Data}</span>
								</td>
								<td style="text-align: center; color:#991b1b; font-weight: bold;">
									<span style="background-color: #fee2e2; padding: 1%; border-radius: 5px">${item.Rezultatas}</span>
								</td>
							</tr>
						`;
						}
						document.querySelector(".tbodypenki").innerHTML = output;
					}
				}
			}
		</script>
		</table>
        </main>

    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
    <script src="bootstrap-5.1.3-dist/js/bootstrap.js"></script>

</body>
</html>
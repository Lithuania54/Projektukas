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
    <link rel="stylesheet" type="text/css" href="css2/stylesindex.css">
</head>

<body>
    <div>    
      <header class="nav justify-content-center">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
              <a class="nav-link" style="color: black; font-size: 20px; padding-left: 0%; padding-right: 2%;" href="PRADINISS.html">PRADINIS</a>
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

		<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
			<symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
				<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
			</symbol>
			<symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
				<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
			</symbol>
			<symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
				<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
			</symbol>
		</svg>

		<main>
			<div class="alert alert-success d-flex alert-dismissible fade show" role="alert">
  				<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
  				<div>
					Sveikas prisijungęs, <?php echo $user_data['user_name']; ?>!
  				</div>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="text-align: right"></button>
			</div>
            <h1 class="display-1">LKL žaidėjų statistika</h1>
            <figure class="text-center">
              <blockquote class="blockquote">
                <p>Krepšinis yra tarsi fotografija, jei nesusikoncentruoji, viskas, ką turi, yra neigiama. </p>
              </blockquote>
              <figcaption class="blockquote-footer">
                <cite title="Source Title">Dan Frisby</cite>
              </figcaption>
            </figure>
        </main>

        <footer >  
          <div class="row row-cols-md-3">
            <div class="col">
              <div class="card h-100" style="width: 20rem;">
                <img src="images/rytas.png" class="card-img-top" alt="logo">
                <div class="card-body">
                  <h5 class="card-title">Vilniaus „Rytas“</h5>
                  <p class="card-text">Profesionalus Lietuvos krepšinio klubas, įsikūręs Vilniuje, Lietuvoje. Klubas buvo įkurtas 1997 metais iš kito klubo „Statyba“ ir tapo vienu sėkmingiausių Lietuvos krepšinio klubų. „Rytas“ iškovojo du Europos taurės titulus, penkis Lietuvos lygos titulus, tris Lietuvos taures ir tris Baltijos šalių čempionatus.</p>
                  <div class="btn-sm">
                    <a href="LENTELE.php" class="nav-link btn btn-dark" style="color: white;" role="button">
                      Daugiau
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100" style="width: 20rem;">
                <img src="images/BC_Žalgiris_logo.svg.png" class="card-img-top" alt="logo">
                <div class="card-body">
                  <h5 class="card-title">Kauno „Žalgiris“</h5>
                  <p class="card-text">Seniausias ir tituluočiausias krepšinio klubas Lietuvoje įsikūręs Kaune. „Žalgiris“ jau 19 metų iš eilės atstovauja Lietuvai Eurolygoje. Žalgiriečiai 1998–1999 m. sezone tapo Eurolygos čempionais. Klubas įkurtas 1944 metais, tai viena iš seniausių Eurolygos komandų.</p>
                  <div class="btn-sm">
                    <a href="LENTELE.php" class="nav-link btn btn-dark" style="color: white;" role="button">
                      Daugiau
                    </a>
                  </div>
                </div>
              </div>
            </div>
              <div class="card h-200" id="pozicija" style="width: 20rem;">
                <img src="images/Juventus2021.png" class="card-img-top" alt="logo">
                <div class="card-body">
                  <h5 class="card-title">Utenos „Uniclub Casino - Juventus“</h5>
                  <p class="card-text">Profesionalus Utenos miesto vyrų krepšinio klubas, įkurtas 2000 m. Klubas dalyvauja LKL ir BBL pirmenybėse nuo 2009 m. 2021-2022 metų sezone šiuo metu komanda LKL turnyrinėje lentelėje užima 5 vietą. Utenos „Juventus“ nuo 2012 m. turi talismaną Juvį. Juvis yra raudonos spalvos velnias, kuris mūvi mėlynos spalvos sportbačius ir su savimi nešiojasi pasagos formos geltonas šakes, kurios simbolizuoja utenos herbą. </p>
                  <div class="btn-sm">
                    <a href="LENTELE.php" class="nav-link btn btn-dark" style="color: white;" role="button">
                      Daugiau
                    </a>
                  </div>
                </div>
              </div>
            </div>
      </footer>
    </div>

    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
    <script src="bootstrap-5.1.3-dist/js/bootstrap.js"></script>
    
</body>
</html>
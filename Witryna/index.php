<?php
session_start();
$conn = new mysqli("localhost","root","","aplikacje");

if($conn->connect_error) {
	die("Conn Fail: ".$conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="pl">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>BuldoRex</title>
		<meta name="description" content="Wypożyczalnia pojazdów budowlanych">
		<meta name="keywords" content="wypożyczalnia pojazdów budowlanych, budowa, koparka">
		<meta name="author" content="Przemek Kawa">
		<!-- bootstrap -->
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- fontello -->
		<link rel="stylesheet" href="css/fontello.css" type="text/css" />
		<!-- personal css -->
		<link rel="stylesheet" href="css/style.css">
		<link rel="icon" href="img/Ikony/logo.jpg">
	</head>
	
	<body>


	<nav class="navbar sticky-top navbar-dark bg-dark">
		<div class="container">
				<ul class="nav justify-content-end">
					<li class="nav-item">
						<a class="nav-link" href="index.php#demo">Start</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="index.php#my">O Nas</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="index.php#Kontakt">Kontakt</a>
					</li>
					<?php if (isset($_SESSION['login']))
					{	?>
					<li class="nav-item Dropdown">
						<div class="dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Konto</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="chhaslo.php">Zmień hasło</a>
							<a class="dropdown-item" href="Pklienta.php">Panel Klienta</a>
							<a class="dropdown-item" href="Wform.php">Formularz Wypożyczenia</a>
						</div
						</div>
					</li>
					<?php
					} elseif (isset($_SESSION['prac']))
					{ ?>
						<li class="nav-item">
							<a class="nav-link" href="PPrac.php">Zamówienia</a>
						</li>
			<?php   }	?>
				</ul>
				<div class="my-2 d-inline">
				<?php if ((isset($_SESSION['login'])) or (isset($_SESSION['prac'])))
				{
				?>
					<a class="nav-link" href="logout.php" role="button" >
						 Wyloguj</a>
				<?php 
				}
				else 
				{ ?>	
			
					<div class="nav-link d-inline"> <a class="text-white" href="loginForm.php" class="btn-xs uppercase" data-togle="modal">Logowanie</a></div>
					<div class="nav-link d-inline"> <a class="text-white" href="rejestracjaForm.php" class="btn-xs uppercase" data-togle="modal">Rejestracja</a></div>
					
			<?php	} ?>
				</div>
			</div>

	</nav>
 <div class="row content"  >
    <div class="col-sm-2" >

    </div>
	<div class="col-sm-8 text-center" >  
		<div id="demo" class="carousel slide" data-ride="carousel" >

		  <!-- Indicators -->
		  <ul class="carousel-indicators">
			<li data-target="#demo" data-slide-to="0" class="active"></li>
			<li data-target="#demo" data-slide-to="1"></li>
			<li data-target="#demo" data-slide-to="2"></li>
		  </ul>

		  <!-- The slideshow -->
		  <div class="carousel-inner">
			<div class="carousel-item active">
			  <img src="img/strona/top1.jpg" alt="Not found">
			  <div class="carousel-caption">
				<h3>Koparki</h3>
			 </div>
			</div>
			<div class="carousel-item">
			  <img src="img/strona/top2.jpg" alt="Not found">
			  <div class="carousel-caption">
				<h3>Więcej Koparek</h3>
				<p>Tak dokładnie WIĘCEJ Koparek</p>
			 </div>
			</div>
			<div class="carousel-item">
			  <img src="img/strona/top3.png" alt="Not found">
			  <div class="carousel-caption">
				<h3>Betoniarka?</h3>
				<p>To nie jest Koparka</p>
			 </div>
			</div>
		  </div>

		  <!-- Left and right controls -->
		  <a style="filter: invert(100%)" class="carousel-control-prev" href="#demo" data-slide="prev">
			<span class="carousel-control-prev-icon"></span>
		  </a>
		  <a style="filter: invert(100%)" class="carousel-control-next" href="#demo" data-slide="next">
			<span class="carousel-control-next-icon"></span>
		  </a>

		</div>
	</div>
	<div class="col-sm-2">

      </div>
 </div>
<div class="container text-center  bg-dark text-white">    
 <div id="my">
	<br>
	<h3 class="text-center">Dlaczego my?</h3>
	<br>
	<div class="container">
		<div class="row text-center">
			<div class="col-md-3">
				<i class="icon-shopping-basket"></i>
				<h4>Tylko Kilka kroków</h4>
				<p>
					i masz sprzęt którego potrzebujesz
				</p>
			</div>

			<div class="col-md-3">
				<i class="icon-dollar"></i>
				<h4>
					Brak Kaucji
				</h4>
				<p>
					za wypożyczenie
				</p>

			</div>

			<div class="col-md-3">
				<i class="icon-truck"></i>
				<h4>
					Podstawienie za darmo
				</h4>
				<p>
					W 1 dzień
				</p>


			</div>
			<div class="col-md-3">
				<i class="icon-clock-alt"></i>
				<h4>
					Całodobowa obsługa
				</h4>
				<p>
					chętnie pomoże Ci w każdej sytaucji
				</p>

			</div>
		</div>
	</div>
	<br>
</div>
</div>
<div class="container bg-secondary">  <br>
</div>
<div class="container text-center bg-dark text-white">    
 <div id="Kontakt">
	<br>
		<div class="container">
			<div class="row ">
				<div class="col-sm-12 col-md-4">
					<h3 class="text-center">Kontakt</h3>
					<p>BuldoRex sp. z o. o.</p>
					<p>tel. 888 888 888</p>
					<p>Kwiatowa 307</p>
					<p>32-712 Rzeszów</p>
				</div>
				<div class="col-sm-12 col-md-4">
					
				</div>
				<div class="col-sm-12 col-md-4">
					<h3 class="text-center">Znajdz nas na:</h3>
					<a class="text-white" href="https://www.facebook.com" target="_blank"><i style="font-size: 40px" class="icon-facebook-squared"></i></a>
					<a class="text-white" href="https://www.youtube.com" target="_blank"><i style="font-size: 40px" class="icon-youtube-squared"></i></a>
					<a class="text-white" href="https://github.com/UR-INF/AI_LAB2_Przemek_Kawa" target="_blank"><i style="font-size: 40px" class="icon-github-squared"></i></a>
				</div>
			</div>
		</div>
		<br>
	</div>
</div>


<footer class="container-fluid text-center">
  <p> Przemysław Kawa &copy; 2020</p>
</footer>

</body>
</html>
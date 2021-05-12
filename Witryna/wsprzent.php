<?php
session_start();
$conn = new mysqli("localhost","root","","aplikacje");

if($conn->connect_error) {
	die("Conn Fail: ".$conn->connect_error);
}
if(!isset($_SESSION['login']))
{
	$conn->close();
	header('Location: index.php');
	exit;
}
$odb = $_SESSION['dataodb'];
$zwr = $_SESSION['datazwr'];
$sql = "SELECT s.id_sprzet,marka,model,typ_sprzetu,cena,kaucja,zdjecie,status FROM sprzet s left join wypozyczenia w ON s.id_sprzet = w.id_sprzet where status = 'Oddany' OR  status is NULL;";
$res = $conn->query($sql);



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
						</div>
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
 <div class="row content">
    
		<div class = "container">
		<hr>
		<h2 class = "text-center"> Aktualnie dostepny sprzęt</h2>
		<hr>
		</div>
		<div class = "container">
			<?php 
				while ($row = $res->fetch_assoc()) {
					?>
					<div class="row">
						<div class="col-sm-1"></div>
						<div class="col-sm-5  text-center">
							<h4> <?php echo $row['marka'].' '.$row['model']; ?></h4>
							<img src="img/big_img/<?php echo $row['zdjecie']; ?>.jpg" alt="" class="w-100">
							
						</div>
						<div class="col-sm-5 text-center">
							<ul class="list-group">
								<li class="list-group-item list-group-item-dark"><?php echo $row['typ_sprzetu']?></li>
								<li class="list-group-item list-group-item-dark">Cena za dzień: <?php echo $row['cena']?></li>
								<li class="list-group-item list-group-item-dark">Kaucja: <?php echo $row['kaucja']?> PLN</li>

								<li class="list-group-item list-group-item-dark">
								Koszt: <?php echo (((strtotime($_SESSION['datazwr']) - strtotime($_SESSION['dataodb'])) / (60 * 60 * 24)+1)*$row['cena'] )?> PLN
								</li>
							</ul>
							<form action ="transation.php" method="post">
								<input name="id_sp" type="hidden" value="<?php echo $row['id_sprzet']?>">
								<button name="MojButton" class="btn btn-dark btn-lg">Wypożycz</button>
							</form>
						</div>
						<div class="col-sm-1"></div>

					</div>
					<hr>
					<?php
				}
				$conn->close();
				?>
		</div>
	</div>
	
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
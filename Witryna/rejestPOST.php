<?php
session_start();

if(!isset($_POST['rejestr']))
{
	header('Location: index.php');
	exit;
}

$imie=$_POST['imie'];
    $nazwisko=$_POST['nazwisko'];
    $email=$_POST['email'];
    $haslo=md5($_POST['password']);
	$haslo2=md5($_POST['confirmpassword']);
    $nr_tel=$_POST['nr_tel'];
	$rp=0;
	$rk=0;
$conn = new mysqli("localhost","root","","aplikacje");

if($conn->connect_error) {
	die("Conn Fail: ".$conn->connect_error);
}

$sql = "select id_klient from klient where email='$email'";
$res = $conn->query($sql);
while($row = $res->fetch_assoc())
{
	$rk = $row['id_klient'];
}
$sql = "select id_pracownik from pracownicy where email='$email'";
$res = $conn->query($sql);
while($row = $res->fetch_assoc())
{
	$rp = $row['id_pracownik'];
}
if(($rk == 0) and ($rp == 0))
{
	if($haslo == $haslo2)
	{
		$sql="INSERT INTO klient (imie,nazwisko,email,haslo,nr_telefonu) VALUES ('$imie','$nazwisko',LOWER('$email'),'$haslo','$nr_tel')";
		$magic=mysqli_query($conn,$sql);
		
		
		
		if($magic)
		{
			$_SESSION['rejsukces']='<hr><h2 class="text-center">Utworzono Konto!</h2><hr>';
			unset($_SESSION['badmail']);
			unset($_SESSION['notmatch']);
			
		}
		else
		{
			$_SESSION['Grrr']='<hr><h2 class="text-center text-red">Nie wprowadzono konta błąd nieznany</h2><hr>';
		}
	}
	else
	{
		$_SESSION['notmatch']='<h5 class="text-center text-red">hasła nie pasują</h25>';
	}
	
}
else
{
	$_SESSION['badmail']='<h5 class="text-center text-red">konto istnieje</h25>';
}
 header('Location: rejestracjaForm.php') ;  
 mysqli_close($conn);   
   
                  

?>
<?php
session_start();
$conn = new mysqli("localhost","root","","aplikacje");

if($conn->connect_error) {
	die("Conn Fail: ".$conn->connect_error);
}

if(isset($_POST['login']))
{

    $email=$_POST['email'];
    $haslo=md5($_POST['password']);
	
    $sql="SELECT id_klient FROM klient WHERE email=LOWER('$email') and haslo='$haslo'";
    $query = $conn->query($sql);
	$test=0;
	while($row = $query->fetch_assoc())
	{
		$test = $row['id_klient'];
	}
	if($test > 0)
	{
		$conn->close();
		$_SESSION['login']=$email;
		header('Location: index.php');
	}
	else
	{
		$sql="SELECT id_pracownik FROM pracownicy WHERE email=LOWER('$email') and haslo='$haslo'";
		$query = $conn->query($sql);
		while($row = $query->fetch_assoc())
		{
		$test = $row['id_pracownik'];
		}
		if($test >0)
		{
			$conn->close();
			$_SESSION['prac']=$email;
			header('Location: index.php');
		}
		else
		{
			$conn->close();
			$_SESSION['Grrr']='<hr><h2 class="text-center text-red">Nie istineje taka kobinacja loginu i hasła</h2><hr><p><a href="fogpass.php">Zapominałeś hasło?</a></p>';
			header('Location: loginForm.php');
		}
	}
    
   
                  
}
  
$conn->close();
?>



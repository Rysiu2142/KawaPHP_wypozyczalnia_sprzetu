<?php 
session_start();
	  if(isset($_POST['email']))
	  {
		 $conn = new mysqli("localhost","root","","aplikacje");

		if($conn->connect_error) {
			die("Conn Fail: ".$conn->connect_error);
		}
		$email=$_POST['email'];
		$oldpass=md5($_POST['oldpass']);
		$haslo=md5($_POST['password']);
		$haslo2=md5($_POST['ppassword']);
		
		$sql="SELECT id_klient FROM klient WHERE email=LOWER('$email') and haslo='$oldpass'";
		$res = $conn->query($sql);
		$rk =0;
		while($row = $res->fetch_assoc())
		{
			$rk = $row['id_klient'];
		}
		if($rk != 0)
		{
			if($haslo == $haslo2)
			{
				$sql="UPDATE klient SET haslo='$haslo2' WHERE id_klient='$rk'" ;
				$magic=mysqli_query($conn,$sql);
				$_SESSION['Grrr']='<hr><h2>Succes!</h2><hr>';
				
			}
			else
			{
				$_SESSION['Grrr']='<hr><h2 class="text-red">Hasła nie pasują!</h2><hr>';
			}
		}
		else
		{
			$_SESSION['Grrr']='<hr><h2 class="text-red">Nie znaleziono emaila</h2><hr>';
		}
		unset($_POST['reset']);
		$conn->close();
		header('Location: chhaslo.php');
	  }
	  ?>
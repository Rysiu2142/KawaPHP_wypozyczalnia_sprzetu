<?php
session_start();
$conn = new mysqli("localhost","root","","aplikacje");

if($conn->connect_error) {
	die("Conn Fail: ".$conn->connect_error);
}
$id=$_POST['id_wyp'];
$sql = "UPDATE wypozyczenia SET status = 'Oddany' WHERE id_wypozyczenia='$id'";
mysqli_query($conn,$sql);

$_SESSION['Grrr']='<hr><h2 class="text-center">Oddano Sprzęt!</h2><hr>';
header('Location: PPrac.php');

$conn->close();
?>
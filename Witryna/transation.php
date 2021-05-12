<?php
session_start();
if (!isset($_POST['MojButton']))
{
	header('Location: index.php');
	exit();
}

$id_sp=$_POST['id_sp'];
$emailk=$_SESSION['login'];

$conn = new mysqli("localhost","root","","aplikacje");

if($conn->connect_error) {
	die("Conn Fail: ".$conn->connect_error);
}

$sql = "SELECT id_klient FROM klient WHERE email=LOWER('$emailk')";
$res = $conn->query($sql);



$odb = $_SESSION['dataodb'];
$zwr = $_SESSION['datazwr'];

while($row = $res->fetch_assoc()) {
	$id_klient = $row['id_klient'];
}

$sql = "INSERT INTO wypozyczenia (id_sprzet, id_klient,data_odb,data_zwr,status) VALUES ('$id_sp','$id_klient','$odb','$zwr','Wypożyczony')";

mysqli_query($conn,$sql);
$conn->close();
header('Location: Pklienta.php');
?>
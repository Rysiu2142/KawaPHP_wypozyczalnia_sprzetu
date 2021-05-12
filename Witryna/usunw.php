<?php
session_start();
$conn = new mysqli("localhost","root","","aplikacje");

if($conn->connect_error) {
	die("Conn Fail: ".$conn->connect_error);
}
$id=$_POST['id_wyp'];
$sql = "delete from wypozyczenia where id_wypozyczenia='$id'";
mysqli_query($conn,$sql);

$_SESSION['Grrr']='<hr><h2 class="text-center">Usuniento Rekord!</h2><hr>';
header('Location: PPrac.php');

$conn->close();
?>
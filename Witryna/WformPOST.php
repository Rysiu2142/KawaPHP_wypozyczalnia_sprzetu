<?php
session_start();
if (!isset($_POST['szukaj']))
{
	header('Location: index.php');
	exit();
}
$dataodb = $_POST['dataodb'];
$datazwr = $_POST['datazwr'];

if ((strtotime($datazwr) - strtotime($dataodb)) / (60 * 60 *24) <0)
{
	$_SESSION['Grrr']='<hr><h2 class="text-center text-red">Niewłaściwe daty!</h2><hr>';
	header('Location: Wform.php');
}
else
{
	$_SESSION['dataodb']= $dataodb;
	$_SESSION['datazwr']= $datazwr;
	
	header('Location: wsprzent.php');
}
?>
<?php 
	session_start();
	$_SESSION['Userid'] = "";
	session_destroy();
	//$_SESSION = array();
	header('Location: index.php');
?>
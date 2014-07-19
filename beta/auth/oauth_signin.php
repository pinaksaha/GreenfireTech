<?php 
	
	include_once("../lib/lib.php");
	session_start();
	
	$username = $_REQUEST['username'];
	$password = $_REQUEST['password'];
	
	$users  = getUserByUsername($username);
	
	//print "<pre>";print_r($users);print "</pre>";
	
	 if($users[0][password] == hash('sha256', $password))
	 {
	 	 $_SESSION['loginerror'] = '';	
		 $_SESSION['Userid'] = $users[0][id];
		 header('Location: ../admin/index.php');
	 }
	 
	 else
	 {
	 	 $_SESSION['loginerror'] = "Username or Password Incorrect Try again!";
		 header('Location: ../index.php');
	 }
?>

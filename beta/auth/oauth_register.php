<?php 
	
	include_once("../lib/lib.php");
	session_start();
	
	$username = $_REQUEST['username']; 
	$password = $_REQUEST['password'];
	$re_password = $_REQUEST['re_password'];
	//print $username . " =>". $password . "=>". $re_password;
	
	$users = getUserByUsername($username);
	
	if(empty($username))
	{
		$_SESSION['registererror'] = "Username cant be empty";
		header('Location: ../index.php');
	}
	elseif(strlen($username)<= 5)
	{
		$_SESSION['registererror'] = "Username must be at least 6 characters long";
		header('Location: ../index.php');
	}
	elseif(empty($password))
	{
		$_SESSION['registererror'] = "Passwords Didnt match";
		 header('Location: ../index.php');
	}
	elseif(strlen($password)<= 5)
	{
		$_SESSION['registererror'] = "Password must be at least 6 characters long";
		header('Location: ../index.php');	
	}
	elseif($password != $re_password)
	{
		$_SESSION['registererror'] = "Passwords Didn't match";
		 header('Location: ../index.php');
	}
	
	elseif(!empty($users))
	{
		$_SESSION['registererror'] = "Username is taken";
		 header('Location: ../index.php');

	}
	
	else
	{
		$hash = hash("sha256", $password);
		
		createUser($username,$hash);
		$users = getUserByUsername($username);
		
		 $_SESSION['registererror'] = '';	
		 $_SESSION['Userid'] = $users[0][id];
		 header('Location: ../mkview/mkprofile.php');
		 
	}
	
?>